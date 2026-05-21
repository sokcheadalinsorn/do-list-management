@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<div class="bg-gray-50 min-h-screen p-6 font-sans">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-900">My Task</h1>
        <a href="{{ route('tasks.create') }}"
            class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
            Add Task
        </a>
    </div>

    {{-- Search & Filter --}}
    <div class="flex gap-3 w-full mb-4">
        <div class="flex items-center gap-2 bg-white border border-gray-200 rounded-lg px-4 py-2 w-full">
            <i class="fa-solid fa-magnifying-glass text-gray-400 text-sm"></i>
            <input type="text" id="search-input" placeholder="Search tasks..."
                class="w-full text-sm text-gray-700 outline-none bg-transparent">
        </div>
        <form action="{{ route('tasks') }}" method="GET">
            <select name="status" onchange="this.form.submit()"
                class="bg-white border border-gray-200 rounded-lg px-4 py-2 text-sm text-gray-700 outline-none">
                <option value="">All Status</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </form>
    </div>

    {{-- Table Card --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm">

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
                @forelse($tasks as $task)
                <tr class="border-b border-gray-100 hover:bg-gray-50 transition" id="task-row-{{ $task->id }}">

                    {{-- Task Name --}}
                    <td class="py-4 px-4 text-sm text-gray-800 font-medium">{{ $task->title }}</td>

                    {{-- Priority --}}
                    <td class="py-4 px-4">
                        @if($task->priority === 'high')
                            <span class="px-3 py-1 rounded-md text-xs font-medium bg-red-100 text-red-500">High</span>
                        @elseif($task->priority === 'medium')
                            <span class="px-3 py-1 rounded-md text-xs font-medium bg-yellow-100 text-yellow-600">Medium</span>
                        @else
                            <span class="px-3 py-1 rounded-md text-xs font-medium bg-green-100 text-green-600">Low</span>
                        @endif
                    </td>

                    {{-- Status --}}
                    <td class="py-4 px-4">
                        @if($task->status === 'in_progress')
                            <span class="px-3 py-1 rounded-md text-xs font-medium bg-blue-100 text-blue-500">In Progress</span>
                        @elseif($task->status === 'completed')
                            <span class="px-3 py-1 rounded-md text-xs font-medium bg-green-100 text-green-500">Completed</span>
                        @else
                            <span class="px-3 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-500">Pending</span>
                        @endif
                    </td>

                    {{-- Due Date --}}
                    <td class="py-4 px-4 text-sm text-gray-500">
                        {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                    </td>

                    {{-- Actions --}}
                    <td class="py-4 px-4">
                        <div class="flex  align-center m-auto justify-end gap-3">
                            <a href="{{ route('tasks.edit', $task->id) }}"
                                class="text-gray-400 hover:text-blue-500 transition">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-500 transition">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-10 text-center text-sm text-gray-400">No tasks found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        <div class="flex items-center justify-between px-4 py-4 border-t border-gray-100">
            <p class="text-sm text-gray-400">
                Showing {{ $tasks->firstItem() ?? 0 }} to {{ $tasks->lastItem() ?? 0 }} of {{ $tasks->total() ?? 0 }} tasks
            </p>
            <div class="flex gap-2">
                @if($tasks->onFirstPage())
                    <span class="px-4 py-1.5 text-sm border border-gray-200 rounded-lg text-gray-300 cursor-not-allowed">Previous</span>
                @else
                    <a href="{{ $tasks->previousPageUrl() }}" class="px-4 py-1.5 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50">Previous</a>
                @endif

                @if($tasks->hasMorePages())
                    <a href="{{ $tasks->nextPageUrl() }}" class="px-4 py-1.5 text-sm border border-gray-200 rounded-lg text-gray-600 hover:bg-gray-50">Next</a>
                @else
                    <span class="px-4 py-1.5 text-sm border border-gray-200 rounded-lg text-gray-300 cursor-not-allowed">Next</span>
                @endif
            </div>
        </div>

    </div>
</div>

{{-- Live Search --}}
<script>
    const searchInput = document.getElementById('search-input');
    const rows = document.querySelectorAll('tbody tr');

    searchInput.addEventListener('input', function() {
        const search = this.value.toLowerCase();
        rows.forEach(row => {
            const name = row.querySelector('td')?.textContent.toLowerCase() ?? '';
            row.style.display = name.includes(search) ? '' : 'none';
        });
    });
</script>

@endsection