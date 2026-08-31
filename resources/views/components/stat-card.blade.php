@props(['title', 'value', 'color' => 'gray'])

@php
    $colors = [
        'gray' => 'text-gray-800',
        'green' => 'text-green-600',
        'red' => 'text-red-600',
        'blue' => 'text-blue-600',
        'yellow' => 'text-yellow-600',
    ];
    $textColor = $colors[$color] ?? $colors['gray'];
@endphp

<div class="bg-white border border-gray-200 rounded-lg p-5">
    <p class="text-sm text-gray-500">{{ $title }}</p>
    <p class="text-2xl font-semibold {{ $textColor }} mt-1">{{ $value }}</p>
</div>