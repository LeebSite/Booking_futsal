@props(['src' => null, 'alt' => '', 'name' => '', 'icon' => null, 'color' => 'gray'])

@php
$colorClasses = match($color) {
    'green' => 'bg-green-100 text-green-600',
    'blue' => 'bg-blue-100 text-blue-600',
    'purple' => 'bg-purple-100 text-purple-600',
    'orange' => 'bg-orange-100 text-orange-600',
    'red' => 'bg-red-100 text-red-600',
    'yellow' => 'bg-yellow-100 text-yellow-600',
    default => 'bg-gray-100 text-gray-600'
};

$initials = $name ? strtoupper(substr($name, 0, 2)) : '';
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <div class="w-6 h-6 rounded-lg flex items-center justify-center mr-2 {{ $colorClasses }} flex-shrink-0">
        @if($src)
            <img src="{{ $src }}" alt="{{ $alt }}" class="w-full h-full rounded-lg object-cover">
        @elseif($icon)
            <i class="{{ $icon }} text-xs"></i>
        @else
            <span class="text-xs font-semibold">{{ $initials }}</span>
        @endif
    </div>
    @if($name)
        <div class="min-w-0">
            <div class="font-medium text-gray-900 truncate text-xs">{{ $name }}</div>
            {{ $slot }}
        </div>
    @endif
</div>
