@extends('layouts.app')
 
@section('content')
<script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 
<div class="bg-gray-50 min-h-screen p-6 font-sans">
 
    {{-- Header --}}
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-3xl font-bold text-gray-900">Complete Task</h1>
    </div>
 
    {{-- Search & Filter Bar --}}
    <div class="flex gap-3 w-full mb-3">
        <div class="flex items-center gap-2 bg-white border border-gray-200 rounded-lg px-4 py-3 w-full">
            <i class="fa-solid fa-magnifying-glass text-gray-400 text-sm"></i>
            <input type="text" id="search-input" placeholder="Search Tasks..."
                class="w-full text-sm text-gray-700 outline-none bg-transparent">
        </div>
        <select id="status-filter"
            class="bg-white border border-gray-200 rounded-lg px-4 py-2 text-sm text-gray-700 outline-none">
            <option value="">All Status</option>
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
    </div>
 
    {{-- Table Card --}}
    <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
 
        {{-- Table Header --}}
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
            <h2 class="font-semibold text-gray-800">Recent Tasks</h2>
            <div class="flex gap-3 text-gray-400">
                <i class="fa-solid fa-magnifying-glass cursor-pointer hover:text-gray-600"></i>
                <i class="fa-solid fa-filter cursor-pointer hover:text-gray-600"></i>
            </div>
        </div>
 
        {{-- Column Labels --}}
        <div class="flex items-center px-5 py-3 border-b border-gray-100 bg-gray-50 text-xs font-semibold text-gray-500 uppercase tracking-wider">
            <div class="w-[30%]">Task Name</div>
            <div class="w-[15%]">Priority</div>
            <div class="w-[15%]">Status</div>
            <div class="w-[20%]">Due Date</div>
            <div class="w-[20%] text-right">Actions</div>
        </div>
 
        {{-- Rows --}}
        <div id="task-list">
            @forelse($tasks as $task)
            <div class="task-row relative flex items-center px-5 py-4 border-b border-gray-50 hover:bg-gray-50 transition-colors"
                data-name="{{ strtolower($task->title) }}"
                data-status="{{ $task->status }}">

                {{-- Strikethrough line across full row --}}
                <div id="strike-{{ $task->id }}"
                    class="absolute left-5 right-20 h-px bg-gray-400 top-1/2 pointer-events-none {{ $task->status === 'completed' ? '' : 'hidden' }}">
                </div>
 
                {{-- Task Name with Checkbox --}}
                <div class="w-[30%] text-sm text-gray-800 font-medium pr-4 flex items-center gap-3">
                    <input
                        type="checkbox"
                        {{ $task->status === 'completed' ? 'checked' : '' }}
                        onchange="markComplete({{ $task->id }}, this)"
                        class="w-4 h-4 rounded accent-indigo-600 cursor-pointer shrink-0">
                    <span id="task-name-{{ $task->id }}"
                        class="{{ $task->status === 'completed' ? 'text-gray-400' : '' }}">
                        {{ $task->title }}
                    </span>
                </div>
 
                {{-- Priority --}}
                <div class="w-[15%]">
                    @if($task->priority === 'high')
                        <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-600">High</span>
                    @elseif($task->priority === 'medium')
                        <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-600">Medium</span>
                    @else
                        <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-600">Low</span>
                    @endif
                </div>
 
                {{-- Status --}}
                <div class="w-[15%]" id="task-status-{{ $task->id }}">
                    @if($task->status === 'in_progress')
                        <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-600">In Progress</span>
                    @elseif($task->status === 'completed')
                        <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-600">Completed</span>
                    @else
                        <span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-600">Pending</span>
                    @endif
                </div>
 
                {{-- Due Date --}}
                <div class="w-[20%] text-sm text-gray-500">
                    {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}
                </div>
 
                {{-- Actions --}}
                <div class="w-[20%] flex justify-end gap-3 text-gray-400">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="hover:text-blue-500 transition-colors">
                        <i class="fa-solid fa-pen text-sm"></i>
                    </a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                        onsubmit="return confirm('Delete this task?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="hover:text-red-500 transition-colors">
                            <i class="fa-solid fa-trash text-sm"></i>
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="px-5 py-10 text-center text-sm text-gray-400">
                No tasks found.
            </div>
            @endforelse
        </div>
 
        {{-- Pagination --}}
        <div class="flex items-center justify-between px-5 py-4 border-t border-gray-100">
            <p class="text-sm text-gray-500">
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
 
<script>
function markComplete(taskId, checkbox) {
    const taskName = document.getElementById('task-name-' + taskId);
    const taskStatus = document.getElementById('task-status-' + taskId);
    const strike = document.getElementById('strike-' + taskId);

    if (checkbox.checked) {
        strike.classList.remove('hidden');
        taskName.classList.add('text-gray-400');
        taskStatus.innerHTML = '<span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-600">Completed</span>';
    } else {
        strike.classList.add('hidden');
        taskName.classList.remove('text-gray-400');
        taskStatus.innerHTML = '<span class="inline-block px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-600">Pending</span>';
    }

    fetch('/tasks/' + taskId + '/complete', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ completed: checkbox.checked })
    });
}
</script>

{{-- Live Search & Filter Script --}}
<script>
    const searchInput = document.getElementById('search-input');
    const statusFilter = document.getElementById('status-filter');
    const rows = document.querySelectorAll('.task-row');
 
    function filterRows() {
        const search = searchInput.value.toLowerCase();
        const status = statusFilter.value.toLowerCase();
 
        rows.forEach(row => {
            const name = row.dataset.name;
            const rowStatus = row.dataset.status;
 
            const matchSearch = name.includes(search);
            const matchStatus = status === '' || rowStatus === status;
 
            row.style.display = (matchSearch && matchStatus) ? '' : 'none';
        });
    }
 
    searchInput.addEventListener('input', filterRows);
    statusFilter.addEventListener('change', filterRows);
</script>
 
@endsection