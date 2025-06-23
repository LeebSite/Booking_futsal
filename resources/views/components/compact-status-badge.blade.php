@props(['status', 'type' => 'pill'])

@php
$statusClasses = match($status) {
    'pending' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
    'accepted', 'active', 'approved' => 'bg-green-50 text-green-700 border-green-200',
    'rejected', 'inactive', 'cancelled' => 'bg-red-50 text-red-700 border-red-200',
    'processing' => 'bg-blue-50 text-blue-700 border-blue-200',
    'completed' => 'bg-green-50 text-green-700 border-green-200',
    'draft' => 'bg-gray-50 text-gray-700 border-gray-200',
    'admin' => 'bg-purple-50 text-purple-700 border-purple-200',
    'superadmin' => 'bg-indigo-50 text-indigo-700 border-indigo-200',
    'user' => 'bg-blue-50 text-blue-700 border-blue-200',
    default => 'bg-gray-50 text-gray-700 border-gray-200'
};

$dotColors = match($status) {
    'pending' => 'bg-yellow-400',
    'accepted', 'active', 'approved' => 'bg-green-400',
    'rejected', 'inactive', 'cancelled' => 'bg-red-400',
    'processing' => 'bg-blue-400',
    'completed' => 'bg-green-400',
    'draft' => 'bg-gray-400',
    'admin' => 'bg-purple-400',
    'superadmin' => 'bg-indigo-400',
    'user' => 'bg-blue-400',
    default => 'bg-gray-400'
};

$typeClasses = match($type) {
    'dot' => 'inline-flex items-center text-xs font-medium',
    'pill' => 'inline-flex items-center px-2 py-1 rounded-full text-xs font-medium border',
    'simple' => 'inline-flex items-center px-1.5 py-0.5 rounded text-xs font-medium',
    default => 'inline-flex items-center px-2 py-1 rounded-full text-xs font-medium border'
};
@endphp

<span {{ $attributes->merge(['class' => "{$statusClasses} {$typeClasses}"]) }}>
    @if($type === 'dot')
        <span class="w-1.5 h-1.5 rounded-full mr-1.5 {{ $dotColors }}"></span>
    @endif
    {{ $slot ?: ucfirst($status) }}
</span>
