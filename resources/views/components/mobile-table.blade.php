@props([
    'headers' => [],
    'searchable' => false,
    'searchPlaceholder' => 'Cari...',
    'emptyMessage' => 'Tidak ada data yang ditemukan'
])

<div class="bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100">
    @if($searchable)
    <!-- Mobile Search Bar -->
    <div class="px-3 lg:px-4 py-3 bg-gray-50/30 border-b border-gray-100 lg:hidden">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400 text-xs"></i>
            </div>
            <input type="text"
                   class="block w-full pl-8 pr-3 py-2 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500 bg-white"
                   placeholder="{{ $searchPlaceholder }}"
                   id="mobile-table-search">
        </div>
    </div>

    <!-- Desktop Search Bar -->
    <div class="hidden lg:block px-4 py-3 bg-gray-50/30 border-b border-gray-100">
        <div class="flex items-center justify-between">
            <div class="relative flex-1 max-w-sm">
                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400 text-xs"></i>
                </div>
                <input type="text"
                       class="block w-full pl-8 pr-3 py-2 border border-gray-200 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 bg-white"
                       placeholder="{{ $searchPlaceholder }}"
                       id="desktop-table-search">
            </div>
            {{ $actions ?? '' }}
        </div>
    </div>
    @endif

    <!-- Mobile Swipeable Table -->
    <div class="lg:hidden">
        <div class="overflow-x-auto scrollbar-hide" style="scrollbar-width: none; -ms-overflow-style: none;">
            <div style="width: max-content; min-width: 100%;">
                <table class="w-full">
                    @if(count($headers) > 0)
                    <thead class="bg-gray-50/30">
                        <tr>
                            @foreach($headers as $header)
                            <th scope="col" class="px-2 py-2 text-left text-xs font-semibold text-gray-600 uppercase tracking-wide whitespace-nowrap">
                                {{ $header }}
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    @endif
                    <tbody class="bg-white divide-y divide-gray-50">
                        {{ $slot }}
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Swipe Indicator -->
        <div class="px-3 py-2 bg-gray-50/50 border-t border-gray-100">
            <div class="flex items-center justify-center space-x-1">
                <i class="fas fa-arrows-alt-h text-gray-400 text-xs"></i>
                <span class="text-xs text-gray-500">Geser untuk melihat lebih banyak</span>
            </div>
        </div>
    </div>

    <!-- Desktop Table -->
    <div class="hidden lg:block overflow-x-auto">
        <table class="min-w-full">
            @if(count($headers) > 0)
            <thead class="bg-gray-50/30">
                <tr>
                    @foreach($headers as $header)
                    <th scope="col" class="px-3 py-2.5 text-left text-xs font-semibold text-gray-600 uppercase tracking-wide">
                        {{ $header }}
                    </th>
                    @endforeach
                </tr>
            </thead>
            @endif
            <tbody class="bg-white divide-y divide-gray-50">
                {{ $slot }}
            </tbody>
        </table>
    </div>

    @if(isset($pagination))
    <!-- Pagination -->
    <div class="px-3 lg:px-4 py-3 bg-gray-50/30 border-t border-gray-100">
        {{ $pagination }}
    </div>
    @endif
</div>

<style>
/* Hide scrollbar for mobile swipe */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

/* Smooth scrolling for mobile table */
.overflow-x-auto {
    scroll-behavior: smooth;
}

/* Mobile table cells */
@media (max-width: 1023px) {
    .mobile-table-cell {
        min-width: 80px;
        padding: 8px;
        font-size: 11px;
    }
}
</style>

@if($searchable)
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileSearchInput = document.getElementById('mobile-table-search');
    const desktopSearchInput = document.getElementById('desktop-table-search');
    const tableRows = document.querySelectorAll('tbody tr');

    function performSearch(searchTerm) {
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm.toLowerCase())) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    if (mobileSearchInput) {
        mobileSearchInput.addEventListener('input', function() {
            performSearch(this.value);
        });
    }

    if (desktopSearchInput) {
        desktopSearchInput.addEventListener('input', function() {
            performSearch(this.value);
        });
    }
});
</script>
@endif
