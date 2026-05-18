@extends('layouts.app')

@section('content')

<div class="bg-gray-50 p-6 font-sans">

    {{-- Header --}}
    <div class="mb-3">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard Overview</h1>
        <p class="text-gray-500 mt-1">Welcome back, {{ auth()->user()->name ?? 'Dara' }}. Here's what's happening today.</p>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">

        <x-stat-card
            label="Total Tasks"
            :value="$totalTasks"
            :change="'+' . $newTasksThisWeek . ' from last week'"
            iconBg="bg-blue-50">
            <x-slot:icon>
                <svg class="w-5 h-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.429 9.75 2.25 12l4.179 2.25m0-4.5 5.571 3 5.571-3m-11.142 0L2.25 7.5 12 2.25l9.75 5.25-4.179 2.25m0 0L21.75 12l-4.179 2.25m0 0 4.179 2.25L12 21.75 2.25 16.5l4.179-2.25m11.142 0-5.571 3-5.571-3" />
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            label="Completed"
            :value="$completedTasks"
            :change="$completionRate . '% completion rate'"
            iconBg="bg-green-50">
            <x-slot:icon>
                <svg class="w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            label="Pending"
            :value="$pendingTasks"
            change="Needs attention"
            iconBg="bg-gray-50">
            <x-slot:icon>
                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </x-slot:icon>
        </x-stat-card>

        <x-stat-card
            label="In Progress"
            :value="$inProgressTasks"
            change="Currently active"
            iconBg="bg-blue-50">
            <x-slot:icon>
                <svg class="w-5 h-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                </svg>
            </x-slot:icon>
        </x-stat-card>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 mb-8">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-4">
            <h5 class="text-base font-semibold text-gray-900">Recent Tasks</h5>
            <div class="flex items-center gap-2">
                {{-- Search --}}
                <button class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 15.803 7.5 7.5 0 0 0 15.803 15.803Z" />
                    </svg>
                </button>
                {{-- Filter --}}
                <button class="text-gray-400 hover:text-gray-600 transition">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Table --}}
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left py-3 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Task Name</th>
                    <th class="text-left py-3 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Priority</th>
                    <th class="text-left py-3 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Status</th>
                    <th class="text-left py-3 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Due Date</th>
                    <th class="text-right py-3 px-4 text-xs font-semibold text-gray-500 uppercase tracking-wide">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentTasks as $task)
                <x-task-row
                    :taskId="$task->id"
                    :name="$task->title"
                    :priority="$task->priority"
                    :status="$task->status"
                    :dueDate="\Carbon\Carbon::parse($task->due_date)->format('M d, Y')" />
                @endforeach
            </tbody>
        </table>

        {{-- Footer --}}
        <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
            <p class="text-sm text-gray-400">Showing {{ $recentTasks->count() }} of {{ $totalTasks }} tasks</p>
            <div class="flex items-center gap-2">
                <button class="text-sm text-gray-400 hover:text-gray-600 transition">Previous</button>
                <button class="text-sm text-gray-400 hover:text-gray-600 transition">Next</button>
            </div>
        </div>

    </div>

</div>

@endsection