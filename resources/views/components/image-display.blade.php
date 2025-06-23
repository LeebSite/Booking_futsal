@props([
    'src' => null,
    'alt' => '',
    'size' => 'md',
    'fallbackIcon' => 'fas fa-image',
    'showFilename' => false,
    'showLink' => true
])

@php
$sizeClasses = match($size) {
    'xs' => 'w-6 h-6',
    'sm' => 'w-8 h-8',
    'md' => 'w-12 h-12',
    'lg' => 'w-16 h-16',
    'xl' => 'w-20 h-20',
    default => 'w-8 h-8'
};
@endphp

<div {{ $attributes->merge(['class' => 'flex items-center space-x-2']) }}>
    @if($src)
        <div class="relative {{ $sizeClasses }} flex-shrink-0">
            <img src="{{ Storage::url($src) }}"
                 alt="{{ $alt }}"
                 class="{{ $sizeClasses }} object-cover rounded shadow-sm"
                 onerror="this.src='{{ asset('storage/' . $src) }}'; this.onerror=function(){this.style.display='none'; this.nextElementSibling.style.display='flex';};"
                 onload="this.style.display='block'; this.nextElementSibling.style.display='none';">
            <div class="{{ $sizeClasses }} bg-gray-100 rounded flex items-center justify-center" style="display: none;">
                <i class="{{ $fallbackIcon }} text-gray-400 text-xs"></i>
            </div>
        </div>
        
        @if($showLink || $showFilename)
            <div class="flex flex-col min-w-0">
                @if($showLink)
                    <a href="{{ Storage::url($src) }}"
                       target="_blank"
                       onclick="if(!this.href.includes('storage')) this.href='{{ asset('storage/' . $src) }}'"
                       class="text-blue-600 hover:text-blue-700 text-xs font-medium">
                        <i class="fas fa-external-link-alt mr-1"></i>Lihat
                    </a>
                @endif
                @if($showFilename)
                    <small class="text-xs text-gray-400 truncate">{{ basename($src) }}</small>
                @endif
            </div>
        @endif
    @else
        <div class="{{ $sizeClasses }} bg-gray-100 rounded flex items-center justify-center flex-shrink-0">
            <i class="{{ $fallbackIcon }} text-gray-400 text-xs"></i>
        </div>
        @if($showFilename)
            <span class="text-xs text-gray-400">Tidak ada gambar</span>
        @endif
    @endif
</div>

@push('scripts')
<script>
// Debug function untuk memeriksa path gambar
function debugImagePath(imgElement) {
    console.log('Image src:', imgElement.src);
    console.log('Image natural width:', imgElement.naturalWidth);
    console.log('Image natural height:', imgElement.naturalHeight);
    console.log('Image complete:', imgElement.complete);
}

// Auto-debug untuk development
@if(config('app.debug'))
document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img[src*="storage"]');
    images.forEach(img => {
        img.addEventListener('error', function() {
            console.error('Failed to load image:', this.src);
        });
        img.addEventListener('load', function() {
            console.log('Successfully loaded image:', this.src);
        });
    });
});
@endif
</script>
@endpush
