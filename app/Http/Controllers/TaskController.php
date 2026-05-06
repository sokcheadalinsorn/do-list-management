<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
{
    $tasks = Task::all();
    $showForm = $request->show == 'form';

    return view('tasks.index', compact('tasks', 'showForm'));
}

    public function show()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }
}
