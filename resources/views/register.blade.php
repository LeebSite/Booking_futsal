<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Andi's Futsal</title>
    <meta name="description" content="Create your Andi's Futsal account and start booking premium courts today.">

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
                        'fade-in': 'fadeIn 0.6s ease-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'float': 'float 6s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                            '50%': { transform: 'translateY(-20px) rotate(180deg)' },
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

    <style>
        body { font-family: 'Inter', system-ui, sans-serif; }
        .gradient-bg { background: linear-gradient(135deg, #059669 0%, #047857 50%, #065f46 100%); }
        .glass-effect { backdrop-filter: blur(16px); background: rgba(255, 255, 255, 0.95); }
        .input-focus { transition: all 0.3s ease; }
        .input-focus:focus { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(34, 197, 94, 0.15); }
        .btn-hover { transition: all 0.3s ease; }
        .btn-hover:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(34, 197, 94, 0.4); }
        .floating { animation: float 6s ease-in-out infinite; }
        .floating-delayed { animation: float 6s ease-in-out infinite; animation-delay: -3s; }
        .floating-delayed-2 { animation: float 6s ease-in-out infinite; animation-delay: -1.5s; }

        /* Custom Scrollbar */
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }
        .scrollbar-thumb-primary-300::-webkit-scrollbar-thumb {
            background-color: #86efac;
            border-radius: 3px;
        }
        .scrollbar-track-slate-100::-webkit-scrollbar-track {
            background-color: #f1f5f9;
            border-radius: 3px;
        }
        .scrollbar-thumb-primary-300::-webkit-scrollbar-thumb:hover {
            background-color: #4ade80;
        }

        /* Mobile optimizations */
        @media (max-width: 1024px) {
            .max-h-96 {
                max-height: calc(100vh - 300px);
            }
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-slate-100 font-body overflow-hidden">
    <!-- Main Container -->
    <div class="min-h-screen flex">
        <!-- Left Side - Brand & Info (Hidden on mobile) -->
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
            <!-- Background with gradient -->
            <div class="absolute inset-0 gradient-bg"></div>

            <!-- Animated background elements -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-20 left-10 w-72 h-72 bg-white rounded-full mix-blend-multiply filter blur-xl animate-pulse-slow floating"></div>
                <div class="absolute top-40 right-10 w-72 h-72 bg-primary-200 rounded-full mix-blend-multiply filter blur-xl animate-pulse-slow floating-delayed"></div>
                <div class="absolute -bottom-8 left-20 w-72 h-72 bg-primary-300 rounded-full mix-blend-multiply filter blur-xl animate-pulse-slow floating-delayed-2"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col justify-center items-center h-full p-8 text-white text-center">
                <!-- Logo -->
                <div class="mb-8">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center mx-auto mb-3 shadow-2xl">
                        <i class="fas fa-futbol text-white text-2xl"></i>
                    </div>
                    <h1 class="text-3xl font-black mb-2 text-shadow">
                        Andi's Futsal
                    </h1>
                    <p class="text-base text-white/90 font-medium mb-2">Premium Experience</p>
                    <p class="text-sm text-white/70 max-w-xs mx-auto leading-relaxed">
                        Professional futsal courts with modern facilities for the ultimate playing experience
                    </p>
                </div>

                <!-- Benefits -->
                <div class="space-y-3 max-w-xs">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user-plus text-white text-xs"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="font-medium text-xs">Join Community</h3>
                            <p class="text-white/70 text-xs">Connect with 500+ players</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-calendar-check text-white text-xs"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="font-medium text-xs">Easy Booking</h3>
                            <p class="text-white/70 text-xs">Reserve courts instantly</p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-star text-white text-xs"></i>
                        </div>
                        <div class="text-left">
                            <h3 class="font-medium text-xs">Premium Access</h3>
                            <p class="text-white/70 text-xs">Exclusive member benefits</p>
                        </div>
                    </div>
                </div>

                <!-- Back to Home -->
                <div class="mt-6">
                    <a href="/" class="inline-flex items-center px-3 py-1.5 bg-white/20 backdrop-blur-sm text-white font-medium text-xs rounded-md border border-white/30 hover:bg-white/30 transition-all duration-300 group">
                        <i class="fas fa-arrow-left mr-1.5 text-xs group-hover:-translate-x-1 transition-transform duration-200"></i>
                        Back to Home
                    </a>
                </div>
            </div>
        </div>

        <!-- Right Side - Register Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-4 lg:p-12 relative">
            <!-- Mobile Background -->
            <div class="lg:hidden absolute inset-0 gradient-bg opacity-5"></div>

            <!-- Mobile Navigation -->
            <div class="lg:hidden absolute top-4 left-4 z-20">
                <a href="/" class="flex items-center space-x-2 group">
                    <div class="w-8 h-8 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-futbol text-white text-sm"></i>
                    </div>
                    <div>
                        <h1 class="text-lg font-bold bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text text-transparent">
                            Andi's Futsal
                        </h1>
                    </div>
                </a>
            </div>

            <!-- Register Card -->
            <div class="w-full max-w-md relative z-10">
                <div class="glass-effect rounded-2xl shadow-2xl border border-white/20 p-6 animate-fade-in max-h-screen overflow-hidden">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-primary-500 to-primary-700 rounded-lg flex items-center justify-center mx-auto mb-2 shadow-lg lg:hidden">
                            <i class="fas fa-user-plus text-white text-sm"></i>
                        </div>
                        <h2 class="text-xl lg:text-2xl font-bold text-slate-900 mb-1">Create Account</h2>
                        <p class="text-slate-600 text-xs">Join Andi's Futsal community today</p>
                    </div>

                    <!-- Scrollable Form Container -->
                    <div class="max-h-80 lg:max-h-96 overflow-y-auto pr-1 scrollbar-thin scrollbar-thumb-primary-300 scrollbar-track-slate-100">
                <!-- Registration Form -->
                <form action="{{ route('register.store') }}" method="POST" class="space-y-2.5">
                    @csrf

                    <!-- Full Name Field -->
                    <div class="space-y-1.5">
                        <label for="nama" class="block text-xs font-medium text-slate-700">Full Name</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                <i class="fas fa-user text-slate-400 text-xs"></i>
                            </div>
                            <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                                class="input-focus block w-full pl-8 pr-3 py-2 text-xs border border-slate-200 rounded-md bg-white/50 backdrop-blur-sm placeholder-slate-400 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 @error('nama') border-red-300 bg-red-50 @enderror"
                                placeholder="Enter your full name">
                        </div>
                        @error('nama')
                            <p class="text-red-600 text-xs flex items-center mt-1">
                                <i class="fas fa-exclamation-circle mr-1 text-xs"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Username Field -->
                    <div class="space-y-1.5">
                        <label for="username" class="block text-xs font-medium text-slate-700">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                <i class="fas fa-at text-slate-400 text-xs"></i>
                            </div>
                            <input type="text" id="username" name="username" value="{{ old('username') }}"
                                class="input-focus block w-full pl-8 pr-3 py-2 text-xs border border-slate-200 rounded-md bg-white/50 backdrop-blur-sm placeholder-slate-400 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 @error('username') border-red-300 bg-red-50 @enderror"
                                placeholder="Choose a username">
                        </div>
                        @error('username')
                            <p class="text-red-600 text-xs flex items-center mt-1">
                                <i class="fas fa-exclamation-circle mr-1 text-xs"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="space-y-1.5">
                        <label for="email" class="block text-xs font-medium text-slate-700">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-slate-400 text-xs"></i>
                            </div>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="input-focus block w-full pl-8 pr-3 py-2 text-xs border border-slate-200 rounded-md bg-white/50 backdrop-blur-sm placeholder-slate-400 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 @error('email') border-red-300 bg-red-50 @enderror"
                                placeholder="Enter your email">
                        </div>
                        @error('email')
                            <p class="text-red-600 text-xs flex items-center mt-1">
                                <i class="fas fa-exclamation-circle mr-1 text-xs"></i>{{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Phone & Birth Date Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <!-- Phone Number Field -->
                        <div class="space-y-1.5">
                            <label for="no_hp" class="block text-xs font-medium text-slate-700">Phone Number</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                    <i class="fas fa-phone text-slate-400 text-xs"></i>
                                </div>
                                <input type="text" id="no_hp" name="no_hp" value="{{ old('no_hp') }}"
                                    class="input-focus block w-full pl-8 pr-3 py-2 text-xs border border-slate-200 rounded-md bg-white/50 backdrop-blur-sm placeholder-slate-400 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 @error('no_hp') border-red-300 bg-red-50 @enderror"
                                    placeholder="Phone number">
                            </div>
                            @error('no_hp')
                                <p class="text-red-600 text-xs flex items-center mt-1">
                                    <i class="fas fa-exclamation-circle mr-1 text-xs"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Birth Date Field -->
                        <div class="space-y-1.5">
                            <label for="tanggal_lahir" class="block text-xs font-medium text-slate-700">Date of Birth</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar text-slate-400 text-xs"></i>
                                </div>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                    class="input-focus block w-full pl-8 pr-3 py-2 text-xs border border-slate-200 rounded-md bg-white/50 backdrop-blur-sm placeholder-slate-400 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 @error('tanggal_lahir') border-red-300 bg-red-50 @enderror">
                            </div>
                            @error('tanggal_lahir')
                                <p class="text-red-600 text-xs flex items-center mt-1">
                                    <i class="fas fa-exclamation-circle mr-1 text-xs"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Password Fields Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                        <!-- Password Field -->
                        <div class="space-y-1.5">
                            <label for="password" class="block text-xs font-medium text-slate-700">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-slate-400 text-xs"></i>
                                </div>
                                <input type="password" id="password" name="password"
                                    class="input-focus block w-full pl-8 pr-10 py-2 text-xs border border-slate-200 rounded-md bg-white/50 backdrop-blur-sm placeholder-slate-400 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300 @error('password') border-red-300 bg-red-50 @enderror"
                                    placeholder="Password">
                                <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-2.5 flex items-center">
                                    <i class="fas fa-eye text-slate-400 hover:text-slate-600 transition-colors duration-200 text-xs"></i>
                                </button>
                            </div>
                            @error('password')
                                <p class="text-red-600 text-xs flex items-center mt-1">
                                    <i class="fas fa-exclamation-circle mr-1 text-xs"></i>{{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Password Confirmation Field -->
                        <div class="space-y-1.5">
                            <label for="password_confirmation" class="block text-xs font-medium text-slate-700">Confirm Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-2.5 flex items-center pointer-events-none">
                                    <i class="fas fa-lock text-slate-400 text-xs"></i>
                                </div>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="input-focus block w-full pl-8 pr-3 py-2 text-xs border border-slate-200 rounded-md bg-white/50 backdrop-blur-sm placeholder-slate-400 text-slate-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-all duration-300"
                                    placeholder="Confirm">
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="btn-hover w-full bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 text-white font-medium py-2 px-4 rounded-md shadow-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 transition-all duration-300 text-xs">
                        <i class="fas fa-user-plus mr-1.5 text-xs"></i>
                        Create Account
                    </button>

                    <!-- Divider -->
                    <div class="my-3">
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-slate-200"></div>
                            </div>
                            <div class="relative flex justify-center text-xs">
                                <span class="px-2 bg-white text-slate-500 font-medium">Or continue with</span>
                            </div>
                        </div>
                    </div>

                    <!-- Google Register Button -->
                    <button
                        type="button"
                        class="w-full bg-white border border-slate-300 text-slate-700 font-medium py-2 px-4 rounded-md hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transform hover:scale-[1.02] transition-all duration-200 shadow-sm text-xs flex items-center justify-center"
                    >
                        <svg class="w-4 h-4 mr-1.5" viewBox="0 0 24 24">
                            <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                            <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                            <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                            <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                        </svg>
                        Sign up with Google
                    </button>
                    </form>
                    </div>

                    <!-- Fixed Bottom Section -->
                    <div class="mt-3 pt-3 border-t border-slate-200">
                        <!-- Login Link -->
                        <div class="text-center">
                            <p class="text-xs text-slate-500 mb-1">Already have an account?</p>
                            <a href="{{ route('login') }}" class="text-xs text-primary-600 hover:text-primary-700 font-medium hover:underline transition-colors duration-200">
                                Sign In Instead
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Initialize on DOM load
        document.addEventListener('DOMContentLoaded', function() {
            initializePasswordToggle();
            initializeFormAnimations();
            initializeRippleEffects();
            initializePasswordStrength();
        });

        // Password visibility toggle
        function initializePasswordToggle() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            if (togglePassword && password) {
                togglePassword.addEventListener('click', function () {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);

                    const icon = this.querySelector('i');
                    icon.classList.toggle('fa-eye');
                    icon.classList.toggle('fa-eye-slash');

                    // Add animation
                    icon.style.transform = 'scale(0.8)';
                    setTimeout(() => {
                        icon.style.transform = 'scale(1)';
                    }, 150);
                });
            }
        }

        // Form animations
        function initializeFormAnimations() {
            const inputs = document.querySelectorAll('input');

            inputs.forEach(input => {
                // Focus animations
                input.addEventListener('focus', function() {
                    this.parentElement.classList.add('focused');
                });

                input.addEventListener('blur', function() {
                    this.parentElement.classList.remove('focused');
                });

                // Floating label effect
                input.addEventListener('input', function() {
                    if (this.value) {
                        this.classList.add('has-value');
                    } else {
                        this.classList.remove('has-value');
                    }
                });
            });

            // Form submission animation
            const form = document.querySelector('form');
            const submitBtn = document.querySelector('button[type="submit"]');

            if (form && submitBtn) {
                form.addEventListener('submit', function() {
                    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating Account...';
                    submitBtn.disabled = true;
                });
            }
        }

        // Password strength indicator
        function initializePasswordStrength() {
            const password = document.querySelector('#password');
            const passwordConfirm = document.querySelector('#password_confirmation');

            if (password) {
                password.addEventListener('input', function() {
                    const strength = calculatePasswordStrength(this.value);
                    updatePasswordStrengthUI(strength);
                });
            }

            if (passwordConfirm) {
                passwordConfirm.addEventListener('input', function() {
                    const match = this.value === password.value;
                    updatePasswordMatchUI(match);
                });
            }
        }

        function calculatePasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            return strength;
        }

        function updatePasswordStrengthUI(strength) {
            // Implementation for password strength indicator
            // You can add visual feedback here
        }

        function updatePasswordMatchUI(match) {
            const confirmField = document.querySelector('#password_confirmation');
            if (match && confirmField.value.length > 0) {
                confirmField.classList.add('border-green-300', 'bg-green-50');
                confirmField.classList.remove('border-red-300', 'bg-red-50');
            } else if (confirmField.value.length > 0) {
                confirmField.classList.add('border-red-300', 'bg-red-50');
                confirmField.classList.remove('border-green-300', 'bg-green-50');
            }
        }

        // Ripple effect for buttons
        function initializeRippleEffects() {
            document.querySelectorAll('button, a').forEach(element => {
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
        }

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

            .focused {
                transform: scale(1.02);
            }

            .has-value {
                background: rgba(34, 197, 94, 0.05);
            }

            .floating-delayed-2 {
                animation: float 6s ease-in-out infinite;
                animation-delay: -1.5s;
            }
        `;
        document.head.appendChild(style);

        // Loading animation
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });
    </script>
</body>
</html>
