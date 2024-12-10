<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andi's Futsal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex-shrink-0 flex items-center">
                    <a href="/" class="text-2xl font-bold text-emerald-600">
                        Andi's Futsal
                    </a>
                </div>
                <div class="flex items-center">
                    <a href="/login" class="px-4 py-2 rounded-md text-sm font-medium text-emerald-600 bg-white hover:bg-emerald-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        Masuk
                    </a>
                    <a href="/register" class="ml-4 px-4 py-2 rounded-md text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="bg-emerald-600">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                <span class="block">Selamat Datang di</span>
                <span class="block text-emerald-200">Andi's Futsal</span>
            </h1>
            <p class="mt-6 max-w-lg text-xl text-emerald-200 sm:max-w-3xl">
                Nikmati pengalaman bermain futsal terbaik di Pekanbaru. Booking lapangan sekarang dan rasakan keseruannya!
            </p>
            <div class="mt-10">
                <a href="#info" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-emerald-600 bg-white hover:bg-emerald-50">
                    Lihat Informasi
                </a>
            </div>
        </div>
    </div>

    <!-- Info Section -->
    <div id="info" class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-gray-900">Informasi Andi's Futsal</h2>
            <div class="mt-8 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-map-marker-alt h-6 w-6 text-emerald-600"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-gray-900">Lokasi</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Jl. Kamboja belakang gedung putih, Simpang Baru, Kec. Tampan, Kota Pekanbaru, Riau 28292
                        </p>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-clock h-6 w-6 text-emerald-600"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-gray-900">Jam Operasional</h3>
                        <p class="mt-2 text-base text-gray-500">
                            Buka 07.00 - 00.00
                        </p>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-phone h-6 w-6 text-emerald-600"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-lg font-medium text-gray-900">Kontak</h3>
                        <p class="mt-2 text-base text-gray-500">
                            HP/WA: 0822-8940-2962 / 0853-5577-1800
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Smooth scrolling for the "Lihat Informasi" button
        document.querySelector('a[href="#info"]').addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>