@props(['taskId', 'name', 'priority', 'status', 'dueDate'])
<tr class="border-b border-gray-100 hover:bg-gray-50 transition">

    {{-- Task Name --}}
    <td class="py-4 px-4 text-sm text-gray-800">{{ $name }}</td>

    {{-- Priority --}}
    <td class="py-4 px-4">
        @if($priority === 'high')
            <span class="px-3 py-1 rounded-md text-xs font-medium bg-red-100 text-red-500">High</span>
        @elseif($priority === 'medium')
            <span class="px-3 py-1 rounded-md text-xs font-medium bg-yellow-100 text-yellow-600">Medium</span>
        @elseif($priority === 'low')
            <span class="px-3 py-1 rounded-md text-xs font-medium bg-green-400 text-white">Low</span>
        @endif
    </td>

    {{-- Status --}}
    <td class="py-4 px-4">
        @if($status === 'in_progress')
            <span class="px-3 py-1 rounded-md text-xs font-medium bg-blue-100 text-blue-500">In Progress</span>
        @elseif($status === 'pending')
            <span class="px-3 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-500">Pending</span>
        @elseif($status === 'completed')
            <span class="px-3 py-1 rounded-md text-xs font-medium bg-green-100 text-green-500">Completed</span>
        @endif
    </td>

    {{-- Due Date --}}
    <td class="py-4 px-4 text-sm text-gray-600">{{ $dueDate }}</td>

    {{-- Actions --}}
    <td class="py-4 px-4">
        <div class="flex items-center justify-end gap-3">
            {{-- Edit --}}
            <a href="/tasks/edit/{{ $taskId }}" class="text-gray-400 hover:text-blue-500 transition">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125" />
                </svg>
            </a>
            <!-- {{-- Complete --}}
            <a href="#" class="text-gray-400 hover:text-green-500 transition">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg> -->
            </a>
            {{-- Delete --}}
            <a href="#" class="text-gray-400 hover:text-red-500 transition">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
            </a>
        </div>
    </td>

</tr>