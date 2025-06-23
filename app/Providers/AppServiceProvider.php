<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Helper untuk menangani URL gambar dengan fallback
        if (!function_exists('image_url')) {
            function image_url($path) {
                if (!$path) return null;

                // Coba Storage::url() terlebih dahulu
                $storageUrl = \Storage::url($path);

                // Jika file tidak ada di storage, coba asset()
                if (!\Storage::disk('public')->exists($path)) {
                    return asset('storage/' . $path);
                }

                return $storageUrl;
            }
        }

        // Blade directive untuk menangani URL gambar
        Blade::directive('imageUrl', function ($expression) {
            return "<?php echo image_url($expression); ?>";
        });
    }
}
