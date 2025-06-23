@props(['size' => 'sm'])

<div {{ $attributes->merge(['class' => 'flex items-center space-x-1']) }}>
    {{ $slot }}
</div>

<!-- Compact Button Styles -->
<style>
.compact-btn-primary {
    @apply bg-green-500 text-white hover:bg-green-600 focus:ring-1 focus:ring-green-500 focus:ring-offset-1 shadow-sm;
}

.compact-btn-secondary {
    @apply bg-gray-100 text-gray-700 hover:bg-gray-200 focus:ring-1 focus:ring-gray-500 focus:ring-offset-1 border border-gray-200;
}

.compact-btn-success {
    @apply bg-green-500 text-white hover:bg-green-600 focus:ring-1 focus:ring-green-500 focus:ring-offset-1 shadow-sm;
}

.compact-btn-warning {
    @apply bg-orange-500 text-white hover:bg-orange-600 focus:ring-1 focus:ring-orange-500 focus:ring-offset-1 shadow-sm;
}

.compact-btn-danger {
    @apply bg-red-500 text-white hover:bg-red-600 focus:ring-1 focus:ring-red-500 focus:ring-offset-1 shadow-sm;
}

.compact-btn-info {
    @apply bg-blue-500 text-white hover:bg-blue-600 focus:ring-1 focus:ring-blue-500 focus:ring-offset-1 shadow-sm;
}

.compact-btn {
    @apply inline-flex items-center justify-center rounded font-medium transition-all duration-200 focus:outline-none disabled:opacity-50 disabled:cursor-not-allowed;
}

.compact-btn-xs { @apply px-1.5 py-1 text-xs min-w-[20px] h-6; }
.compact-btn-sm { @apply px-2 py-1 text-xs min-w-[24px] h-7; }
.compact-btn-md { @apply px-2.5 py-1.5 text-xs min-w-[28px] h-8; }
</style>
