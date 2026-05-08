<div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-3 flex flex-col gap-1">
    <div class="flex items-center justify-between">
        <span class="text-sm text-gray-500 font-medium">{{ $label }}</span>
        <div class="w-9 h-9 rounded-xl flex items-center justify-center {{ $iconBg ?? 'bg-gray-50' }}">
            {{ $icon }}
        </div>
    </div>
    <div>
        <p class="text-3xl font-bold text-gray-900">{{ $value }}</p>
    </div>
    <div class="flex items-center gap-1">
        <span class="text-xs text-gray-400">{{ $change }}</span>
    </div>
</div>