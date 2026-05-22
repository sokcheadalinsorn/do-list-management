<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Show all tasks
    public function index(Request $request)
    {
        $query = Task::query();

        // Filter by status
        if ($request->status) {
            $query->where('status', $request->status);
        }

        $tasks = $query->paginate(7);

        return view('tasks.index', compact('tasks'));
    }

    // Show create form
    public function create()
    {
        return view('tasks.create');
    }

    // Store new task
    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'priority'  => 'required|string',
            'status'    => 'required|string',
            'due_date'  => 'required|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'priority'  => $request->priority,
            'status'    => $request->status,
            'due_date'  => $request->due_date,
        ]);

        return redirect()
            ->route('tasks')
            ->with('success', 'Task created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $task = Task::findOrFail($id);

        return view('tasks.edit', compact('task'));
    }

    // Update task
    public function update(Request $request, $id)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'priority'  => 'required|string',
            'status'    => 'required|string',
            'due_date'  => 'required|date',
        ]);

        $task = Task::findOrFail($id);

        $task->update([
            'task_name' => $request->task_name,
            'priority'  => $request->priority,
            'status'    => $request->status,
            'due_date'  => $request->due_date,
        ]);

        return redirect()
            ->route('tasks')
            ->with('success', 'Task updated successfully!');
    }

    // Delete task
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return redirect()
            ->route('tasks')
            ->with('success', 'Task deleted successfully!');
    }
}