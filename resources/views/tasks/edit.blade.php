//here is the edit task page
@extends('layouts.app')
@section('content')
<div class="min-h-screen bg-slate-100 flex items-center justify-center p-4">
    <div class="bg-white w-full max-w-lg rounded-2xl shadow-lg p-8">

        {{-- Back Link --}}
        <a href="{{ route('tasks') }}" class="flex items-center text-sm text-slate-500 hover:text-indigo-500 transition mb-6">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
            Back to Dashboard
        </a>
        
        {{-- Header --}}
        <h2 class="text-2xl font-bold text-slate-800">Edit Task</h2>
        <p class="text-sm text-slate-400 mt-1 mb-6">Update the details of your task below</p>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-1">Task Title</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $task->title) }}"
                    placeholder="e.g Design New feature."
                    class="w-full px-4 py-2.5 border border-slate-200 rounded-lg bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                >
                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-1">Description</label>
                <textarea
                    id="description"
                    name="description"
                    placeholder="Describe the task in detail..."
                    rows="4"
                    class="w-full px-4 py-2.5 border border-slate-200 rounded-lg bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition resize-none"
                >{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div>
                <label for="status" class="block text-sm font-semibold text-slate-700 mb-1">Status</label>
                <div class="relative">
                    <select
                        id="status"
                        name="status"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition appearance-none"
                    >
                        <option value="">Select status</option>
                        <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-400">
                        <svg class="w-4 h-4 " fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
                @error('status')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Due Date & Priority --}}
            <div class="grid grid-cols-2 gap-4">

                {{-- Due Date --}}
                <div>
                    <label for="due_date" class="block text-sm font-semibold text-slate-700 mb-1">Due Date</label>
                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                    >
                    @error('due_date')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Priority --}}
                <div>
                    <label for="priority" class="block text-sm font-semibold text-slate-700 mb-1">Priority</label>
                    <select
                        id="priority"
                        name="priority"
                        class="w-full px-4 py-2.5 border border-slate-200 rounded-lg bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition appearance-none"
                    >
                        <option value="">Select priority</option>
                        <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>High</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-slate-400">
                        <svg class="w-4 h-4 " fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                    @error('priority')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>  

            {{-- Submit Button --}}
            <div>
                <button type="submit" class="w-full py-2.5 bg-indigo-500 text-white font-semibold rounded-lg hover:bg-indigo-600 transition">Update Task</button>
            </div>
        </form>
    </div>
</div>
@endsection