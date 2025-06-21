<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Andi's Futsal - Premium Futsal Experience in Pekanbaru</title>
    <meta name="description" content="Experience the best futsal courts in Pekanbaru. Book your game today at Andi's Futsal - where champions are made.">

    <!-- Tailwind CSS with custom config -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0fdf4',
                            100: '#dcfce7',
                            200: '#bbf7d0',
                            300: '#86efac',
                            400: '#4ade80',
                            500: '#22c55e',
                            600: '#16a34a',
                            700: '#15803d',
                            800: '#166534',
                            900: '#14532d',
                        }
                    },
                    fontFamily: {
                        'display': ['Inter', 'system-ui', 'sans-serif'],
                        'body': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.5s ease-out',
                        'bounce-slow': 'bounce 2s infinite',
                        'pulse-slow': 'pulse 3s infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Radix UI (via CDN) -->
    <script src="https://unpkg.com/@radix-ui/react@latest/dist/index.umd.js"></script>

    <style>
        body {
            font-family: 'Inter', system-ui, sans-serif;
            overflow-x: hidden;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%);
            position: relative;
        }

        .gradient-bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.05"><circle cx="30" cy="30" r="2"/></g></svg>');
            animation: float 20s ease-in-out infinite;
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .text-shadow {
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        .card-hover {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .card-hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s;
        }

        .card-hover:hover::before {
            left: 100%;
        }

        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        .pulse-ring {
            animation: pulse-ring 2s cubic-bezier(0.455, 0.03, 0.515, 0.955) infinite;
        }

        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        @keyframes float {
            0%, 100% { transform: translateX(0px) translateY(0px); }
            33% { transform: translateX(30px) translateY(-30px); }
            66% { transform: translateX(-20px) translateY(20px); }
        }

        @keyframes pulse-ring {
            0% { transform: scale(0.33); }
            40%, 50% { opacity: 1; }
            100% { opacity: 0; transform: scale(1.33); }
        }

        .animation-delay-2000 { animation-delay: 2s; }
        .animation-delay-4000 { animation-delay: 4s; }

        /* Smooth scroll behavior */
        html { scroll-behavior: smooth; }

        /* Loading state */
        .loading {
            opacity: 0;
            transform: translateY(30px);
        }

        .loaded .loading {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.6s ease-out;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #22c55e;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #16a34a;
        }

        /* Responsive improvements */
        @media (max-width: 768px) {
            .hover-lift:hover {
                transform: translateY(-4px) scale(1.01);
            }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-slate-100 font-body">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-futbol text-white text-lg"></i>
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">
                                Andi's Futsal
                            </h1>
                            <p class="text-xs text-slate-500 font-medium">Premium Experience</p>
                        </div>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-slate-700 hover:text-primary-600 font-medium transition-colors duration-200">Home</a>
                    <a href="#features" class="text-slate-700 hover:text-primary-600 font-medium transition-colors duration-200">Features</a>
                    <a href="#info" class="text-slate-700 hover:text-primary-600 font-medium transition-colors duration-200">Info</a>
                    <a href="#contact" class="text-slate-700 hover:text-primary-600 font-medium transition-colors duration-200">Contact</a>
                </div>

                <!-- CTA Buttons -->
                <div class="flex items-center space-x-4">
                    <a href="/login" class="hidden sm:inline-flex items-center px-4 py-2 text-sm font-medium text-primary-700 bg-primary-50 hover:bg-primary-100 rounded-lg transition-all duration-200 hover-lift">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Sign In
                    </a>
                    <a href="/register" class="inline-flex items-center px-6 py-2.5 text-sm font-semibold text-white bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 rounded-lg shadow-lg hover:shadow-xl transition-all duration-200 hover-lift">
                        <i class="fas fa-user-plus mr-2"></i>
                        Get Started
                    </a>

                    <!-- Mobile menu button -->
                    <button class="md:hidden p-2 rounded-lg text-slate-600 hover:text-primary-600 hover:bg-slate-100 transition-colors duration-200" id="mobile-menu-btn">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div class="md:hidden hidden bg-white/95 backdrop-blur-lg border-t border-slate-200" id="mobile-menu">
            <div class="px-4 py-6 space-y-4">
                <a href="#home" class="block text-slate-700 hover:text-primary-600 font-medium py-2">Home</a>
                <a href="#features" class="block text-slate-700 hover:text-primary-600 font-medium py-2">Features</a>
                <a href="#info" class="block text-slate-700 hover:text-primary-600 font-medium py-2">Info</a>
                <a href="#contact" class="block text-slate-700 hover:text-primary-600 font-medium py-2">Contact</a>
                <div class="pt-4 border-t border-slate-200">
                    <a href="/login" class="block w-full text-center px-4 py-2 text-primary-700 bg-primary-50 rounded-lg mb-2">Sign In</a>
                    <a href="/register" class="block w-full text-center px-4 py-2 text-white bg-gradient-to-r from-primary-600 to-primary-700 rounded-lg">Get Started</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background with gradient -->
        <div class="absolute inset-0 gradient-bg"></div>

        <!-- Animated background elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-20 left-10 w-72 h-72 bg-white rounded-full mix-blend-multiply filter blur-xl animate-pulse-slow"></div>
            <div class="absolute top-40 right-10 w-72 h-72 bg-primary-200 rounded-full mix-blend-multiply filter blur-xl animate-pulse-slow animation-delay-2000"></div>
            <div class="absolute -bottom-8 left-20 w-72 h-72 bg-primary-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse-slow animation-delay-4000"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="animate-fade-in">
                <!-- Badge -->
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm rounded-full text-white/90 text-sm font-medium mb-8 glass-effect">
                    <i class="fas fa-star text-yellow-300 mr-2"></i>
                    Premium Futsal Experience in Pekanbaru
                </div>

                <!-- Main heading -->
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white mb-6 text-shadow">
                    <span class="block animate-slide-up">Welcome to</span>
                    <span class="block bg-gradient-to-r from-white to-primary-100 bg-clip-text text-transparent animate-slide-up" style="animation-delay: 0.2s">
                        Andi's Futsal
                    </span>
                </h1>

                <!-- Subtitle -->
                <p class="text-xl md:text-2xl text-white/90 max-w-4xl mx-auto mb-12 leading-relaxed animate-slide-up" style="animation-delay: 0.4s">
                    Experience the ultimate futsal destination in Pekanbaru. Premium courts, professional facilities, and unforgettable moments await you.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-slide-up" style="animation-delay: 0.6s">
                    <a href="#features" class="group inline-flex items-center px-8 py-4 bg-white text-primary-700 font-semibold rounded-xl shadow-2xl hover:shadow-3xl transition-all duration-300 hover-lift">
                        <i class="fas fa-play mr-3 group-hover:translate-x-1 transition-transform duration-200"></i>
                        Explore Features
                    </a>
                    <a href="/register" class="group inline-flex items-center px-8 py-4 bg-primary-500/20 text-white font-semibold rounded-xl border-2 border-white/30 backdrop-blur-sm hover:bg-white/10 transition-all duration-300 hover-lift">
                        <i class="fas fa-calendar-plus mr-3 group-hover:scale-110 transition-transform duration-200"></i>
                        Book Now
                    </a>
                </div>

                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mt-20 animate-slide-up" style="animation-delay: 0.8s">
                    <div class="text-center floating">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-2" data-count="500">0+</div>
                        <div class="text-white/80 text-sm uppercase tracking-wider">Happy Players</div>
                    </div>
                    <div class="text-center floating" style="animation-delay: 0.5s">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-2">24/7</div>
                        <div class="text-white/80 text-sm uppercase tracking-wider">Available</div>
                    </div>
                    <div class="text-center floating" style="animation-delay: 1s">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-2">5★</div>
                        <div class="text-white/80 text-sm uppercase tracking-wider">Rating</div>
                    </div>
                    <div class="text-center floating" style="animation-delay: 1.5s">
                        <div class="text-3xl md:text-4xl font-bold text-white mb-2" data-count="3">0</div>
                        <div class="text-white/80 text-sm uppercase tracking-wider">Premium Courts</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce-slow">
            <a href="#features" class="text-white/70 hover:text-white transition-colors duration-200">
                <i class="fas fa-chevron-down text-2xl"></i>
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-20">
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">
                    Why Choose <span class="bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">Andi's Futsal?</span>
                </h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    Experience premium futsal facilities with world-class amenities designed for champions
                </p>
            </div>

            <!-- Features Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group p-8 bg-gradient-to-br from-slate-50 to-white rounded-2xl border border-slate-200 hover:border-primary-300 hover:shadow-xl transition-all duration-300 hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-trophy text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Premium Courts</h3>
                    <p class="text-slate-600 leading-relaxed">Professional-grade synthetic grass courts with optimal drainage and lighting systems for the perfect game experience.</p>
                </div>

                <!-- Feature 2 -->
                <div class="group p-8 bg-gradient-to-br from-slate-50 to-white rounded-2xl border border-slate-200 hover:border-primary-300 hover:shadow-xl transition-all duration-300 hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">24/7 Availability</h3>
                    <p class="text-slate-600 leading-relaxed">Book your game anytime with our extended operating hours from 7 AM to midnight, 7 days a week.</p>
                </div>

                <!-- Feature 3 -->
                <div class="group p-8 bg-gradient-to-br from-slate-50 to-white rounded-2xl border border-slate-200 hover:border-primary-300 hover:shadow-xl transition-all duration-300 hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-mobile-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Easy Booking</h3>
                    <p class="text-slate-600 leading-relaxed">Simple online booking system with instant confirmation and flexible payment options for your convenience.</p>
                </div>

                <!-- Feature 4 -->
                <div class="group p-8 bg-gradient-to-br from-slate-50 to-white rounded-2xl border border-slate-200 hover:border-primary-300 hover:shadow-xl transition-all duration-300 hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Community</h3>
                    <p class="text-slate-600 leading-relaxed">Join our vibrant futsal community with regular tournaments, leagues, and social events for all skill levels.</p>
                </div>

                <!-- Feature 5 -->
                <div class="group p-8 bg-gradient-to-br from-slate-50 to-white rounded-2xl border border-slate-200 hover:border-primary-300 hover:shadow-xl transition-all duration-300 hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Safety First</h3>
                    <p class="text-slate-600 leading-relaxed">Comprehensive safety measures with first aid facilities, security systems, and regular equipment maintenance.</p>
                </div>

                <!-- Feature 6 -->
                <div class="group p-8 bg-gradient-to-br from-slate-50 to-white rounded-2xl border border-slate-200 hover:border-primary-300 hover:shadow-xl transition-all duration-300 hover-lift">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-teal-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Premium Service</h3>
                    <p class="text-slate-600 leading-relaxed">Exceptional customer service with professional staff, clean facilities, and complimentary amenities.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section id="info" class="py-24 bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">
                    Visit <span class="bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">Our Location</span>
                </h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    Find us in the heart of Pekanbaru with easy access and ample parking
                </p>
            </div>

            <!-- Info Cards -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <!-- Location Card -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover-lift border border-slate-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-primary-500 to-primary-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Location</h3>
                    <p class="text-slate-600 leading-relaxed mb-4">
                        Jl. Kamboja belakang gedung putih, Simpang Baru, Kec. Tampan, Kota Pekanbaru, Riau 28292
                    </p>
                    <a href="https://maps.app.goo.gl/wps5tGj4hJPZDFpN8" target="_blank" class="inline-flex items-center text-primary-600 hover:text-primary-700 font-medium">
                        <i class="fas fa-external-link-alt mr-2"></i>
                        View on Maps
                    </a>
                </div>

                <!-- Hours Card -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover-lift border border-slate-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Operating Hours</h3>
                    <div class="space-y-2 text-slate-600">
                        <div class="flex justify-between">
                            <span>Monday - Sunday</span>
                            <span class="font-medium">07:00 - 00:00</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Peak Hours</span>
                            <span class="font-medium">18:00 - 22:00</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Card -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover-lift border border-slate-200">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-phone text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Contact Us</h3>
                    <div class="space-y-3 text-slate-600">
                        <div class="flex items-center">
                            <i class="fas fa-phone-alt text-primary-500 mr-3"></i>
                            <span>0822-8940-2962</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fab fa-whatsapp text-green-500 mr-3"></i>
                            <span>0853-5577-1800</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">
                    What Our <span class="bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">Players Say</span>
                </h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    Join hundreds of satisfied players who have made Andi's Futsal their favorite destination
                </p>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gradient-to-br from-slate-50 to-white p-8 rounded-2xl border border-slate-200 hover:shadow-xl transition-all duration-300 hover-lift">
                    <div class="flex items-center mb-6">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-6 italic">
                        "Lapangan terbaik di Pekanbaru! Rumput sintetis berkualitas tinggi dan fasilitas yang sangat bersih. Tim kami selalu booking di sini."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            R
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Rizky Pratama</h4>
                            <p class="text-slate-500 text-sm">Team Captain, FC Pekanbaru</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-gradient-to-br from-slate-50 to-white p-8 rounded-2xl border border-slate-200 hover:shadow-xl transition-all duration-300 hover-lift">
                    <div class="flex items-center mb-6">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-6 italic">
                        "Sistem booking online sangat mudah dan pelayanannya excellent. Staffnya ramah dan profesional. Highly recommended!"
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            A
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Ahmad Fauzi</h4>
                            <p class="text-slate-500 text-sm">Regular Player</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-gradient-to-br from-slate-50 to-white p-8 rounded-2xl border border-slate-200 hover:shadow-xl transition-all duration-300 hover-lift">
                    <div class="flex items-center mb-6">
                        <div class="flex text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-slate-600 mb-6 italic">
                        "Tempat futsal favorit keluarga! Anak-anak suka main di sini karena lapangannya aman dan nyaman. Parkir juga luas."
                    </p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                            S
                        </div>
                        <div>
                            <h4 class="font-semibold text-slate-900">Sari Indah</h4>
                            <p class="text-slate-500 text-sm">Family Player</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Preview Section -->
    <section class="py-24 bg-gradient-to-br from-slate-50 to-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-slate-900 mb-6">
                    Affordable <span class="bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">Pricing</span>
                </h2>
                <p class="text-xl text-slate-600 max-w-3xl mx-auto">
                    Competitive rates for premium facilities. Book now and save with our special packages
                </p>
            </div>

            <!-- Pricing Cards -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">
                <!-- Regular Hours -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover-lift border border-slate-200">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Regular Hours</h3>
                        <p class="text-slate-600">07:00 - 18:00</p>
                        <div class="mt-6">
                            <span class="text-4xl font-bold text-primary-600">Rp 80K</span>
                            <span class="text-slate-500">/hour</span>
                        </div>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-500 mr-3"></i>
                            <span class="text-slate-600">Premium synthetic grass</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-500 mr-3"></i>
                            <span class="text-slate-600">Professional lighting</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-500 mr-3"></i>
                            <span class="text-slate-600">Free parking</span>
                        </li>
                    </ul>
                    <a href="/register" class="w-full bg-primary-600 text-white py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors duration-200 block text-center">
                        Book Now
                    </a>
                </div>

                <!-- Peak Hours -->
                <div class="bg-gradient-to-br from-primary-600 to-primary-700 rounded-2xl p-8 shadow-xl hover:shadow-2xl transition-all duration-300 hover-lift border-2 border-primary-500 relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-yellow-400 text-yellow-900 px-4 py-1 rounded-full text-sm font-bold">POPULAR</span>
                    </div>
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-white mb-2">Peak Hours</h3>
                        <p class="text-primary-100">18:00 - 22:00</p>
                        <div class="mt-6">
                            <span class="text-4xl font-bold text-white">Rp 120K</span>
                            <span class="text-primary-100">/hour</span>
                        </div>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-200 mr-3"></i>
                            <span class="text-white">Premium synthetic grass</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-200 mr-3"></i>
                            <span class="text-white">Professional lighting</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-200 mr-3"></i>
                            <span class="text-white">Free parking</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-200 mr-3"></i>
                            <span class="text-white">Priority booking</span>
                        </li>
                    </ul>
                    <a href="/register" class="w-full bg-white text-primary-700 py-3 rounded-lg font-semibold hover:bg-primary-50 transition-colors duration-200 block text-center">
                        Book Now
                    </a>
                </div>

                <!-- Night Hours -->
                <div class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 hover-lift border border-slate-200">
                    <div class="text-center mb-8">
                        <h3 class="text-2xl font-bold text-slate-900 mb-2">Night Hours</h3>
                        <p class="text-slate-600">22:00 - 00:00</p>
                        <div class="mt-6">
                            <span class="text-4xl font-bold text-primary-600">Rp 100K</span>
                            <span class="text-slate-500">/hour</span>
                        </div>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-500 mr-3"></i>
                            <span class="text-slate-600">Premium synthetic grass</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-500 mr-3"></i>
                            <span class="text-slate-600">Professional lighting</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-500 mr-3"></i>
                            <span class="text-slate-600">Free parking</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-primary-500 mr-3"></i>
                            <span class="text-slate-600">Night atmosphere</span>
                        </li>
                    </ul>
                    <a href="/register" class="w-full bg-primary-600 text-white py-3 rounded-lg font-semibold hover:bg-primary-700 transition-colors duration-200 block text-center">
                        Book Now
                    </a>
                </div>
            </div>

            <!-- Special Offer -->
            <div class="mt-16 text-center">
                <div class="inline-flex items-center px-6 py-3 bg-yellow-100 text-yellow-800 rounded-full font-semibold">
                    <i class="fas fa-fire mr-2"></i>
                    Special Offer: Book 5 hours, get 1 hour FREE!
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="contact" class="py-24 bg-gradient-to-r from-primary-600 to-primary-800 relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-full h-full" style="background-image: url('data:image/svg+xml,<svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><g fill="%23ffffff" fill-opacity="0.1"><circle cx="30" cy="30" r="4"/></g></svg>'); background-size: 60px 60px;"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Ready to Play?
            </h2>
            <p class="text-xl text-white/90 mb-12 max-w-2xl mx-auto">
                Join thousands of players who have made Andi's Futsal their home court. Book your game today and experience the difference.
            </p>

            <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
                <a href="/register" class="group inline-flex items-center px-8 py-4 bg-white text-primary-700 font-bold rounded-xl shadow-2xl hover:shadow-3xl transition-all duration-300 hover-lift">
                    <i class="fas fa-rocket mr-3 group-hover:translate-x-1 transition-transform duration-200"></i>
                    Start Playing Today
                </a>
                <a href="tel:+6282289402962" class="group inline-flex items-center px-8 py-4 bg-primary-500/20 text-white font-semibold rounded-xl border-2 border-white/30 backdrop-blur-sm hover:bg-white/10 transition-all duration-300 hover-lift">
                    <i class="fas fa-phone mr-3 group-hover:scale-110 transition-transform duration-200"></i>
                    Call Now
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Brand -->
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-primary-700 rounded-xl flex items-center justify-center">
                            <i class="fas fa-futbol text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold">Andi's Futsal</h3>
                            <p class="text-slate-400 text-sm">Premium Experience</p>
                        </div>
                    </div>
                    <p class="text-slate-300 mb-6 max-w-md">
                        The premier futsal destination in Pekanbaru, offering world-class facilities and unforgettable experiences for players of all levels.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-slate-800 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors duration-200">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors duration-200">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors duration-200">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 hover:bg-primary-600 rounded-lg flex items-center justify-center transition-colors duration-200">
                            <i class="fab fa-tiktok"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#home" class="text-slate-300 hover:text-primary-400 transition-colors duration-200">Home</a></li>
                        <li><a href="#features" class="text-slate-300 hover:text-primary-400 transition-colors duration-200">Features</a></li>
                        <li><a href="#info" class="text-slate-300 hover:text-primary-400 transition-colors duration-200">Location</a></li>
                        <li><a href="/login" class="text-slate-300 hover:text-primary-400 transition-colors duration-200">Sign In</a></li>
                        <li><a href="/register" class="text-slate-300 hover:text-primary-400 transition-colors duration-200">Register</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-6">Contact</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt text-primary-500 mr-3 mt-1"></i>
                            <span class="text-slate-300 text-sm">Jl. Kamboja belakang gedung putih, Simpang Baru, Tampan, Pekanbaru</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone text-primary-500 mr-3"></i>
                            <span class="text-slate-300">0822-8940-2962</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fab fa-whatsapp text-primary-500 mr-3"></i>
                            <span class="text-slate-300">0853-5577-1800</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-clock text-primary-500 mr-3"></i>
                            <span class="text-slate-300">07:00 - 00:00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-slate-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-slate-400 text-sm">
                    © 2024 Andi's Futsal. All rights reserved.
                </p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-slate-400 hover:text-primary-400 text-sm transition-colors duration-200">Privacy Policy</a>
                    <a href="#" class="text-slate-400 hover:text-primary-400 text-sm transition-colors duration-200">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Initialize on DOM load
        document.addEventListener('DOMContentLoaded', function() {
            initializeAnimations();
            initializeNavigation();
            initializeScrollEffects();
            initializeCounters();
        });

        // Navigation functionality
        function initializeNavigation() {
            const navbar = document.getElementById('navbar');
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');

            // Navbar scroll effect with smooth transition
            let ticking = false;
            function updateNavbar() {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-white/95', 'backdrop-blur-lg', 'shadow-lg');
                    navbar.classList.remove('bg-transparent');
                } else {
                    navbar.classList.remove('bg-white/95', 'backdrop-blur-lg', 'shadow-lg');
                    navbar.classList.add('bg-transparent');
                }
                ticking = false;
            }

            window.addEventListener('scroll', function() {
                if (!ticking) {
                    requestAnimationFrame(updateNavbar);
                    ticking = true;
                }
            });

            // Mobile menu toggle with animation
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                    const icon = this.querySelector('i');
                    icon.classList.toggle('fa-bars');
                    icon.classList.toggle('fa-times');
                });
            }

            // Smooth scrolling for navigation links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        const offsetTop = target.offsetTop - 80; // Account for fixed navbar
                        window.scrollTo({
                            top: offsetTop,
                            behavior: 'smooth'
                        });
                        // Close mobile menu if open
                        if (mobileMenu) {
                            mobileMenu.classList.add('hidden');
                            const icon = mobileMenuBtn.querySelector('i');
                            icon.classList.add('fa-bars');
                            icon.classList.remove('fa-times');
                        }
                    }
                });
            });
        }

        // Animation system
        function initializeAnimations() {
            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');

                        // Add staggered animation for child elements
                        const children = entry.target.querySelectorAll('.loading');
                        children.forEach((child, index) => {
                            setTimeout(() => {
                                child.classList.add('loaded');
                            }, index * 100);
                        });
                    }
                });
            }, observerOptions);

            // Observe sections and cards
            document.querySelectorAll('section, .hover-lift').forEach(element => {
                observer.observe(element);
            });

            // Add loading class to elements that should animate
            document.querySelectorAll('.hover-lift').forEach(element => {
                element.classList.add('loading');
            });
        }

        // Scroll effects
        function initializeScrollEffects() {
            let ticking = false;

            function updateScrollEffects() {
                const scrolled = window.pageYOffset;

                // Parallax effect for hero background
                const hero = document.querySelector('#home');
                if (hero) {
                    const speed = scrolled * 0.3;
                    hero.style.transform = `translateY(${speed}px)`;
                }

                // Floating elements
                const floatingElements = document.querySelectorAll('.floating');
                floatingElements.forEach((element, index) => {
                    const speed = (scrolled * (0.1 + index * 0.05));
                    element.style.transform = `translateY(${speed}px)`;
                });

                ticking = false;
            }

            window.addEventListener('scroll', function() {
                if (!ticking) {
                    requestAnimationFrame(updateScrollEffects);
                    ticking = true;
                }
            });
        }

        // Counter animation
        function initializeCounters() {
            const counters = document.querySelectorAll('[data-count]');

            const counterObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.getAttribute('data-count'));
                        const duration = 2000; // 2 seconds
                        const step = target / (duration / 16); // 60fps
                        let current = 0;

                        const timer = setInterval(() => {
                            current += step;
                            if (current >= target) {
                                current = target;
                                clearInterval(timer);
                            }
                            counter.textContent = Math.floor(current) + (counter.textContent.includes('+') ? '+' : '');
                        }, 16);

                        counterObserver.unobserve(counter);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(counter => {
                counterObserver.observe(counter);
            });
        }

        // Add some interactive effects
        document.addEventListener('mousemove', function(e) {
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach(card => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                if (x >= 0 && x <= rect.width && y >= 0 && y <= rect.height) {
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    const rotateX = (y - centerY) / 10;
                    const rotateY = (centerX - x) / 10;

                    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateZ(10px)`;
                } else {
                    card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) translateZ(0px)';
                }
            });
        });

        // Loading animation
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');

            // Trigger hero animations
            setTimeout(() => {
                document.querySelectorAll('#home .animate-slide-up').forEach((element, index) => {
                    setTimeout(() => {
                        element.style.opacity = '1';
                        element.style.transform = 'translateY(0)';
                    }, index * 200);
                });
            }, 500);
        });

        // Add click ripple effect
        document.querySelectorAll('button, .btn, a[href^="#"]').forEach(element => {
            element.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;

                ripple.style.width = ripple.style.height = size + 'px';
                ripple.style.left = x + 'px';
                ripple.style.top = y + 'px';
                ripple.classList.add('ripple');

                this.appendChild(ripple);

                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple CSS
        const style = document.createElement('style');
        style.textContent = `
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: scale(0);
                animation: ripple-animation 0.6s linear;
                pointer-events: none;
            }

            @keyframes ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>