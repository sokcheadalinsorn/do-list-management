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
        <h2 class="text-2xl font-bold text-slate-800">Create New Task</h2>
        <p class="text-sm text-slate-400 mt-1 mb-6">Fill in the details below to add a task to your list</p>

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
    @csrf

    {{-- Task Title --}}
    <div>
        <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">
            Task Title
        </label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title') }}"
            required
            placeholder="e.g Design New Feature."
            class="w-full px-4 py-3 border border-slate-200 rounded-2xl bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
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
            required
            placeholder="Describe the task in detail..."
            class="w-full px-4 py-3 border border-slate-200 rounded-2xl bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 resize-none transition">{{ old('description') }}</textarea>
    </div>

    {{-- Status --}}
    <div>
        <label for="status" class="block text-sm font-semibold text-slate-700 mb-2">
            Status
        </label>

        <select
            id="status"
            name="status"
            required
            class="w-full px-4 py-3 border border-slate-200 rounded-2xl bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">

            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>
    </div>

    {{-- Due Date & Priority --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

        {{-- Due Date --}}
        <div>
            <label for="due_date" class="block text-sm font-semibold text-slate-700 mb-2">
                Due date
            </label>

            <input
                type="date"
                id="due_date"
                name="due_date"
                value="{{ old('due_date') }}"
                required
                class="w-full px-4 py-3 border border-slate-200 rounded-2xl bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">
        </div>

        {{-- Priority --}}
        <div>
            <label for="priority" class="block text-sm font-semibold text-slate-700 mb-2">
                Priority
            </label>

            <select
                id="priority"
                name="priority"
                required
                class="w-full px-4 py-3 border border-slate-200 rounded-2xl bg-white text-slate-800 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400 transition">

                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
        </div>
    </div>

    {{-- Buttons --}}
    <div class="flex items-center justify-end gap-4 pt-4">

        <a href="{{ route('tasks') }}"
            class="px-8 py-3 border border-slate-200 rounded-2xl text-slate-700 hover:bg-slate-100 transition">
            Cancel
        </a>

        <button
            type="submit"
            class="px-8 py-3 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold rounded-2xl transition">
            Save Tasks
        </button>

    </div>
</form>
    </div>
</div>

@endsection