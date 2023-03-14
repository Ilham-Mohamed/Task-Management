<?php

namespace App\Http\Controllers;
use App\Mail\OverdueTask;
use App\Mail\SignUp;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskCompleted;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Validate;
use Carbon\Carbon;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $todayDate = Carbon::now();
        $tasks = Task::when($request->duedate != null, function ($req) use ($request){
                return $req->where('duedate', $request->duedate);
            })
            ->when($request->status != null, function ($req) use ($request){
                return $req->where('status', $request->status);
            })
            ->orderBy('id', 'desc')->get();
            
        // $task = $user->task()->get();


        foreach($tasks as $task){
            $dueDate = Carbon::parse($task->duedate);
            $task->due = $todayDate->lessThanOrEqualTo($dueDate) ? false : true;
            if ($task->due == "true" && $task->status == "notcompleted"){
                Artisan::call('task:overdue-mail');
            }
        }
        
        
        return view('index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $statuses = [
            [
                'label' => 'notcompleted',
                'value' => 'notcompleted',
            ],
            [
                'label' => 'completed',
                'value' => 'completed',
            ],
        ];
        return view('create', compact('statuses'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=> 'required'
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->duedate = $request->duedate;

        $task->save();

        $user = Auth::user();
        Mail::to($user->email)->send(new SignUp($task));

        if($task->status == 'completed'){
            $user->notify(new TaskCompleted);
        }

        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $task = Task::findorFail($id);
        return view('show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $task = Task::findorFail($id);
        $statuses = [
            [
                'label' => 'notcompleted',
                'value' => 'notcompleted',
            ],
            [
                'label' => 'completed',
                'value' => 'completed',
            ],
        ];
        return view('edit', compact('task', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $task = Task::findorFail($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->duedate = $request->duedate;
        
        if($task->status == 'completed'){
                $user = Auth::user();
                $user->notify(new TaskCompleted);
        }

        

        $task->save();
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $task = Task::findorFail($id);
        $task->delete();
        return redirect()->route('index');
    }
}
