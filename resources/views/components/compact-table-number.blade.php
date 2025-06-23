@props(['value', 'prefix' => '', 'suffix' => '', 'format' => 'number'])

@php
$formattedValue = match($format) {
    'currency' => 'Rp ' . number_format($value, 0, ',', '.'),
    'percentage' => number_format($value, 2) . '%',
    'decimal' => number_format($value, 2, ',', '.'),
    default => number_format($value, 0, ',', '.')
};
@endphp

<span {{ $attributes->merge(['class' => 'table-number text-xs font-medium']) }}>
    {{ $prefix }}{{ $formattedValue }}{{ $suffix }}
</span>
