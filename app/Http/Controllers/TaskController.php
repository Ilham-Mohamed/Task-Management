<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Validate;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tasks = Task::orderBy('id', 'desc')->get();
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
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
