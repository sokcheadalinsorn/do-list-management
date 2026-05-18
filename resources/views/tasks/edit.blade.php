@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-lg rounded-2xl shadow-lg p-8">

        {{-- Back Link --}}
        <a href="{{ route('tasks', $task->id) }}"
            class="flex items-center text-sm text-slate-500 hover:text-indigo-500 transition mb-6">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Dashboard
        </a>

        {{-- Header --}}
        <h2 class="text-2xl font-bold text-slate-800">Edit Task</h2>
        <p class="text-sm text-slate-400 mt-1 mb-6">
            Update the details of your task below
        </p>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Task Name --}}
            <div>
                <label for="task_name" class="block text-sm font-semibold text-slate-700 mb-2">
                    Task Title
                </label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ old('task_name', $task->task_name) }}"
                    placeholder="e.g Design New Feature"
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">

                @error('task_name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Describe the task in detail..."
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 resize-none transition">{{ old('description', $task->description) }}</textarea>

                @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block text-sm font-semibold text-slate-700 mb-2">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    class="w-full px-4 py-3 border border-slate-200 rounded-xl bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">

                    <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>
                        In Progress
                    </option>

                    <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>
                </select>

                @error('status')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Due Date + Priority --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                {{-- Due Date --}}
                <div>
                    <label for="due_date" class="block text-sm font-semibold text-slate-700 mb-2">
                        Due Date
                    </label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ old('due_date', $task->due_date) }}"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">

                    @error('due_date')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Priority --}}
                <div>
                    <label for="priority" class="block text-sm font-semibold text-slate-700 mb-2">
                        Priority
                    </label>

                    <select
                        id="priority"
                        name="priority"
                        class="w-full px-4 py-3 border border-slate-200 rounded-xl bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">

                        <option value="High" {{ old('priority', $task->priority) == 'High' ? 'selected' : '' }}>
                            High
                        </option>

                        <option value="Medium" {{ old('priority', $task->priority) == 'Medium' ? 'selected' : '' }}>
                            Medium
                        </option>

                        <option value="Low" {{ old('priority', $task->priority) == 'Low' ? 'selected' : '' }}>
                            Low
                        </option>
                    </select>

                    @error('priority')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex items-center justify-end gap-4">



                <button
                    type="submit"
                    class="w-full px-4 py-2.5 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Update Task
                </button>
            </div>
        </form>
    </div>
</div>

@endsection



