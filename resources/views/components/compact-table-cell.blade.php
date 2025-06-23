@props(['align' => 'left'])

@php
$alignClass = match($align) {
    'center' => 'text-center',
    'right' => 'text-right',
    default => 'text-left'
};
@endphp

<td {{ $attributes->merge(['class' => "px-3 py-2.5 text-xs text-gray-700 {$alignClass}"]) }}>
    {{ $slot }}
</td>
