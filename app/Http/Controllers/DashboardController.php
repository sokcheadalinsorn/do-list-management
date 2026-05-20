<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTasks = Task::count();
        
        $completedTasks   = Task::where('status', 'completed')->count();
        $pendingTasks     = Task::where('status', 'pending')->count();
        $inProgressTasks  = Task::where('status', 'in_progress')->count();
        $newTasksThisWeek = Task::where('created_at', '>=', now()->startOfWeek())->count();

        $completionRate = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;

        $recentTasks = Task::latest()->take(6)->get();
            

        return view('dashboard', compact('totalTasks', 'completedTasks', 'pendingTasks', 'inProgressTasks', 'newTasksThisWeek','completionRate', 'recentTasks' ));
    }

}   