<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request) 
    {
        $task_name = $request->input('task_name');
        $priority = $request->input('priority');
        $status = $request->input('status');
        $due_date = $request->input('due_date');

        Task::create([
            'task_name'   => $request->title, 
            'priority' => $priority,
            'status' => $status,
            'due_date' => $due_date,   
        ]);

        return redirect()->route('tasks')->with('success', 'Task created successfully!');

    }

    public function create(){
        
        return view('tasks.create');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }
}
