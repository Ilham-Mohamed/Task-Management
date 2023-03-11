<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::all();
        if($tasks->count() > 0){
            return response()->json([
                'Tasks' => $tasks
            ]);
        }
        else{
            return response()->json([
                'message' => "No Tasks Found"
            ]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return response()->json([
        //     'message' => "Created"
        // ]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:completed,notcompleted',
            'duedate' => 'required|string'
        ]);
        //
        if($validator->fails()){
            return response()->json([
                'error' => $validator->messages()
            ]);
        }
        else{
            $task = Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'duedate' => $request->duedate
            ]);
            if($task){
                return response()->json([
                    'message' => 'Task Created Successfully!'
                ]);
            }
            else{
                return response()->json([
                    'message' => 'Something went wrong'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        //
        $task = Task::findorFail($id);
        
        return response()->json([
            'Task' => $task
        ]);
    }
    // public function show(Task $task)
    // {
    //     return TaskResource::make($task);
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:completed,notcompleted',
            'duedate' => 'required|string'
        ]);
        //
        if($validator->fails()){
            return response()->json([
                'error' => $validator->messages()
            ]);
        }
        else{
            $task = Task::create([
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'duedate' => $request->duedate
            ]);
            if($task){
                return response()->json([
                    'message' => 'Task Created Successfully!'
                ]);
            }
            else{
                return response()->json([
                    'message' => 'Something went wrong'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $task = Task::findorFail($id);
        return response()->json([
            'message' => "Successfully Deleted!"
        ]);
    }
}
