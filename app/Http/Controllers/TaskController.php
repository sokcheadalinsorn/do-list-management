<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(Request $request)
{
    $query = Task::query();

    if ($request->status) {
        $query->where('status', $request->status);
    }

    $tasks = $query->paginate(7);

    return view('tasks.index', compact('tasks'));
}
    

    public function store(Request $request)
    public function edit($id)
    {
        $task = Task::findOrFail($id);        
        return view('tasks.edit', compact('task'));
    }

    public function destroy($id)
{
    $task = Task::findOrFail($id);
    $task->delete();
    return redirect()->back()->with('success', 'Task deleted successfully!');
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

        return view('tasks.edit', compact('task'));
    }
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $task->update([
            'task_name' => $request->task_name,
            'priority' => $request->priority,
            'status' => $request->status,
            'due_date' => $request->due_date,
        ]);

        $task->save();

        return redirect()
            ->route('tasks')
            ->with('success', 'Task updated successfully!');
    }



    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks')->with('success', 'Task deleted successfully!');
    }
}
