@extends('layouts.app')

@section('content')

<div class="bg-gray-50 p-6 font-sans">


        {{-- Header --}}
        <div class="flex items-center justify-between mb-1">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-base font-bold text-gray-900">Edit Task</h2>
                    <p class="text-xs text-gray-400">Update the details for your task below.</p>
                </div>
            </div>
            <a href="/dashboard" class="text-gray-400 hover:text-gray-600 transition">
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </a>
        </div>

        <hr class="my-4 border-gray-100">

        {{-- Form --}}
        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('PUT')

            {{-- Task Title --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Task Title</label>
                <input
                    type="text"
                    name="title"
                    value="{{ $task->title }}"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea
                    name="description"
                    rows="3"
                    class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none">{{ $task->description }}</textarea>
            </div>

            {{-- Due Date + Priority --}}
            <div class="grid grid-cols-2 gap-3 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Due Date</label>
                    <input
                        type="date"
                        name="due_date"
                        value="{{ $task->due_date }}"
                        class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Priority</label>
                    <select name="priority" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="high"   {{ $task->priority === 'high'   ? 'selected' : '' }}>High</option>
                        <option value="medium" {{ $task->priority === 'medium' ? 'selected' : '' }}>Medium</option>
                        <option value="low"    {{ $task->priority === 'low'    ? 'selected' : '' }}>Low</option>
                    </select>
                </div>
            </div>

            {{-- Status --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" class="w-full border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="pending"     {{ $task->status === 'pending'     ? 'selected' : '' }}>Pending</option>
                    <option value="in_progress" {{ $task->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed"   {{ $task->status === 'completed'   ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            {{-- Buttons --}}
            <div class="flex items-center justify-end gap-3">
                <a href="/dashboard" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-gray-800 transition">
                    Cancel
                </a>
                <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-xl transition flex items-center gap-2">
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>
                    Save Changes
                </button>
            </div>

        </form>
  


</div>

@endsection








