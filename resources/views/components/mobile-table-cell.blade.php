@props(['align' => 'left', 'minWidth' => '80px'])

@php
$alignClass = match($align) {
    'center' => 'text-center',
    'right' => 'text-right',
    default => 'text-left'
};
@endphp

<td {{ $attributes->merge(['class' => "px-2 lg:px-3 py-2 lg:py-2.5 text-xs lg:text-xs text-gray-700 {$alignClass} whitespace-nowrap"]) }} 
    style="min-width: {{ $minWidth }};">
    {{ $slot }}
</td>
