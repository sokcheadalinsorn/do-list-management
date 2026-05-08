<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        dd($id);
        
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

<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 2ceec663b60be23a11833d01af6dc71db6d047e8
=======

>>>>>>> e7b9947ddbdfa1124ba4de462c89cdd18d9e7d96
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
