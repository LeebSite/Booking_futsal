@props(['hover' => true])

<tr {{ $attributes->merge(['class' => $hover ? 'hover:bg-gray-50 transition-colors duration-150' : '']) }}>
    {{ $slot }}
</tr>
