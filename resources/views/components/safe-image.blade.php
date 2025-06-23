@props([
    'src' => null,
    'alt' => '',
    'class' => 'w-8 h-8 object-cover rounded shadow-sm',
    'fallbackIcon' => 'fas fa-image',
    'showLink' => false
])

@if($src)
    <div class="flex items-center space-x-2">
        <div class="relative flex-shrink-0">
            <!-- Primary image dengan Storage::url() -->
            <img src="{{ Storage::url($src) }}"
                 alt="{{ $alt }}"
                 class="{{ $class }}"
                 style="display: block;"
                 onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
            
            <!-- Fallback image dengan asset() -->
            <img src="{{ asset('storage/' . $src) }}"
                 alt="{{ $alt }}"
                 class="{{ $class }}"
                 style="display: none;"
                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
            
            <!-- Final fallback icon -->
            <div class="{{ str_replace(['object-cover', 'shadow-sm'], ['', ''], $class) }} bg-gray-100 flex items-center justify-center" style="display: none;">
                <i class="{{ $fallbackIcon }} text-gray-400 text-xs"></i>
            </div>
        </div>
        
        @if($showLink)
            <a href="{{ Storage::url($src) }}"
               target="_blank"
               onclick="if(event.target.previousElementSibling.querySelector('img').style.display === 'none') { this.href='{{ asset('storage/' . $src) }}'; }"
               class="text-blue-600 hover:text-blue-700 text-xs font-medium">
                <i class="fas fa-external-link-alt mr-1"></i>Lihat
            </a>
        @endif
    </div>
@else
    <div class="flex items-center justify-center {{ str_replace(['object-cover', 'shadow-sm'], ['', ''], $class) }} bg-gray-100">
        <i class="{{ $fallbackIcon }} text-gray-400 text-xs"></i>
    </div>
@endif
