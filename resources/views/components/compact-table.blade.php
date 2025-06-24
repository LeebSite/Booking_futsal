@props([
    'headers' => [],
    'searchable' => false,
    'searchPlaceholder' => 'Cari...',
    'emptyMessage' => 'Tidak ada data yang ditemukan'
])

<div class="bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100">
    @if($searchable)
    <!-- Compact Search Bar -->
    <div class="px-4 py-3 bg-gray-50/30 border-b border-gray-100">
        <div class="flex items-center justify-between">
            <div class="relative flex-1 max-w-sm">
                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400 text-xs"></i>
                </div>
                <input type="text"
                       class="compact-search block w-full"
                       placeholder="{{ $searchPlaceholder }}"
                       id="table-search">
            </div>
            {{ $actions ?? '' }}
        </div>
    </div>
    @endif

    <!-- Compact Table -->
    <div class="overflow-x-auto max-w-full">
        <table class="min-w-full w-full">
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
    <!-- Compact Pagination -->
    <div class="px-4 py-3 bg-gray-50/30 border-t border-gray-100">
        {{ $pagination }}
    </div>
    @endif
</div>

@if($searchable)
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('table-search');
    const tableRows = document.querySelectorAll('tbody tr');

    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        tableRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            if (text.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});
</script>
@endif
