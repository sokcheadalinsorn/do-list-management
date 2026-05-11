<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function edit($id)
    {
        $task = Task::findOrFail($id);        
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update([ 'title' => $request->title, 'description' => $request->description, 'status' => $request->status, 'priority' => $request->priority, 'due_date' => $request->due_date,
        ]);
        return redirect('/dashboard');
    }
    public function index()
    {
        $tasks = Task::latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'title'       => 'required|string|max:255',
        'description' => 'nullable|string',
        'status'      => 'nullable|string',
    ]);

    $validated['status'] = $validated['status'] ?? 'Pending';

    Task::create($validated);

    return redirect()->route('tasks.index')
                     ->with('success', 'Task created successfully!');
}

}
