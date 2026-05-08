@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My task</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>

<body>

</body>

</html>
<div class="min-h-screen bg-gray-50 p-6 ml-64 font-sans">

    <div class="flex ">
        <h1 class="text-3xl font-bold text-gray-700">My Task</h1>
        <a href="{{ route('tasks.create') }}" class="ml-auto px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Add Task</a>
    </div>
    <div>
        //search and filter
            <div class="flex items-center gap-4 mt-6">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition">
                    <option value="">Filter by status</option>
                    <option value="completed">Completed</option>
                    <option value="in_progress">In Progress</option>
                    <option value="pending">Pending</option>
                </select>

    </div>
    <div class="font-sans">
        <table class="font-sans mt-7 p-5 w-full rounded-2xl  shadow-sm border border-slate-200">
            <thead class="  text-start rounded-sm bg-gray-100 text-gray-600 text-sm font-semibold tracking-wide border-b border-slate-200">
                <tr class="">
                    <th class="text-start font-bold text-2xl text-gray-600 px-2 py-2 rounded-sm py-2 px-5">Task name</th>
                    <th class="text-start font-bold text-2xl text-gray-600 px-2 py-2 rounded-sm py-2 px-5">priority</th>
                    <th class="text-start font-bold text-2xl text-gray-600 px-2 py-2 rounded-sm py-2 px-5">status</th>
                    <th class="text-start font-bold text-2xl text-gray-600 px-2 py-2 rounded-sm py-2 px-5">due date</th>
                    <th class="text-start font-bold text-2xl text-gray-600 px-2 py-2 rounded-sm py-2 px-5">action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($tasks as $task)
                <tr class="group transition-colors duration-150 hover:bg-slate-50  rounded-sm border border-slate-200 ">

                

                    <td class="py-3.5 px-5 text-lg font-semibold text-slate-800 tracking-tight">
                        {{ $task->task_name }}
                    </td>

                    <td class="py-3.5 px-5">
                        @php
                        $priorityStyles = [
                        'High' => 'bg-red-50 text-red-600 ring-1 ring-red-200',
                        'Medium' => 'bg-amber-50 text-amber-600 ring-1 ring-amber-200',
                        'Low' => 'bg-emerald-50 text-emerald-600 ring-1 ring-emerald-200',
                        ];
                        $pStyle = $priorityStyles[$task->priority] ?? 'bg-slate-100 text-slate-500 ring-1 ring-slate-200';
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold tracking-wide {{ $pStyle }}">
                            {{ $task->priority }}
                        </span>
                    </td>

                    <td class="py-3.5 px-5">
                        @php
                        $statusStyles = [
                        'Completed' => 'bg-blue-50 text-blue-600 ring-1 ring-blue-200',
                        'In Progress' => 'bg-violet-50 text-violet-600 ring-1 ring-violet-200',
                        'Pending' => 'bg-slate-100 text-slate-500 ring-1 ring-slate-200',
                        ];
                        $sStyle = $statusStyles[$task->status] ?? 'bg-slate-100 text-slate-500 ring-1 ring-slate-200';
                        @endphp
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold tracking-wide {{ $sStyle }}">
                            <span class="w-1.5 h-1.5 rounded-full bg-current opacity-70"></span>
                            {{ $task->status }}
                        </span>
                    </td>

                    <td class="py-3.5 px-5 text-sm text-slate-500 font-mono tabular-nums">
                        {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                    </td>

                    <td class="py-3.5 px-5 text-sm font-medium text-slate-600">
                        <div class="flex items-center gap-3 duration-150 ">

                            <!-- // Edit and Delete buttons -->
                            <a href="{{ route('tasks.edit', $task->id) }}"
                                class="text-slate-400 hover:text-blue-500 transition-colors">
                                <i class="fa-solid fa-pen-to-square text-lg"></i>
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline-flex">
                                @csrf
                                @method('DELETE')
                                <!-- // Delete button -->
                                <button type="submit"
                                    class="text-slate-400 hover:text-red-500 transition-colors"
                                    title="Delete task">
                                    <i class="fa-solid fa-trash text-lg"></i>
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>