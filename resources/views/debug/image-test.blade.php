<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Debug Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Image Debug Test</h1>
        
        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <h2 class="text-lg font-semibold mb-4">Configuration Info</h2>
            <div class="grid grid-cols-2 gap-4 text-sm">
                <div>
                    <strong>APP_URL:</strong> {{ config('app.url') }}
                </div>
                <div>
                    <strong>FILESYSTEM_DISK:</strong> {{ config('filesystems.default') }}
                </div>
                <div>
                    <strong>Public Disk URL:</strong> {{ config('filesystems.disks.public.url') }}
                </div>
                <div>
                    <strong>Storage Path:</strong> {{ storage_path('app/public') }}
                </div>
                <div>
                    <strong>Public Path:</strong> {{ public_path('storage') }}
                </div>
                <div>
                    <strong>Symlink Exists:</strong> {{ is_link(public_path('storage')) ? 'Yes' : 'No' }}
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <h2 class="text-lg font-semibold mb-4">Test Images</h2>
            
            @php
                $testImages = [
                    'lapangan/xz9INKi0SAyKS30EmUHsXwhZj5YItgYio1cOyRVR.jpg'
                ];
            @endphp

            @foreach($testImages as $imagePath)
                <div class="border p-4 mb-4 rounded">
                    <h3 class="font-medium mb-2">Image: {{ $imagePath }}</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="text-sm font-medium mb-2">Path Information:</h4>
                            <ul class="text-xs space-y-1">
                                <li><strong>Storage::url():</strong> {{ Storage::url($imagePath) }}</li>
                                <li><strong>asset('storage/'):</strong> {{ asset('storage/' . $imagePath) }}</li>
                                <li><strong>File exists in storage:</strong> {{ Storage::disk('public')->exists($imagePath) ? 'Yes' : 'No' }}</li>
                                <li><strong>File exists in public:</strong> {{ file_exists(public_path('storage/' . $imagePath)) ? 'Yes' : 'No' }}</li>
                                <li><strong>File size:</strong> {{ Storage::disk('public')->exists($imagePath) ? Storage::disk('public')->size($imagePath) . ' bytes' : 'N/A' }}</li>
                            </ul>
                        </div>
                        
                        <div>
                            <h4 class="text-sm font-medium mb-2">Image Display Test:</h4>
                            <div class="space-y-2">
                                <div>
                                    <p class="text-xs mb-1">Using Storage::url():</p>
                                    <img src="{{ Storage::url($imagePath) }}" 
                                         alt="Test Image" 
                                         class="w-20 h-20 object-cover border rounded"
                                         onerror="this.style.border='2px solid red'; this.alt='Failed to load';">
                                </div>
                                
                                <div>
                                    <p class="text-xs mb-1">Using asset():</p>
                                    <img src="{{ asset('storage/' . $imagePath) }}" 
                                         alt="Test Image" 
                                         class="w-20 h-20 object-cover border rounded"
                                         onerror="this.style.border='2px solid red'; this.alt='Failed to load';">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-lg font-semibold mb-4">Directory Contents</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h3 class="font-medium mb-2">storage/app/public/lapangan:</h3>
                    <ul class="text-xs space-y-1">
                        @php
                            $files = Storage::disk('public')->files('lapangan');
                        @endphp
                        @forelse($files as $file)
                            <li>{{ basename($file) }}</li>
                        @empty
                            <li class="text-gray-500">No files found</li>
                        @endforelse
                    </ul>
                </div>
                
                <div>
                    <h3 class="font-medium mb-2">public/storage/lapangan:</h3>
                    <ul class="text-xs space-y-1">
                        @php
                            $publicFiles = [];
                            if (is_dir(public_path('storage/lapangan'))) {
                                $publicFiles = array_diff(scandir(public_path('storage/lapangan')), ['.', '..']);
                            }
                        @endphp
                        @forelse($publicFiles as $file)
                            <li>{{ $file }}</li>
                        @empty
                            <li class="text-gray-500">No files found or directory doesn't exist</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Log image load events
        document.querySelectorAll('img').forEach(img => {
            img.addEventListener('load', function() {
                console.log('✅ Image loaded successfully:', this.src);
            });
            
            img.addEventListener('error', function() {
                console.error('❌ Failed to load image:', this.src);
            });
        });
    </script>
</body>
</html>
