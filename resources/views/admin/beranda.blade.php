@extends('admin.admin_layout')

@section('title', 'Dashboard Admin - Andi\'s Futsal')
@section('header', 'Dashboard')

@section('content')
<!-- Header Section -->
<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-semibold text-gray-900">Sales Overview</h2>
            <p class="text-gray-600 mt-1">Ringkasan penjualan dan aktivitas hari ini</p>
        </div>
        <div class="flex items-center space-x-3">
            <select class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary-500">
                <option>March 2023</option>
                <option>April 2023</option>
                <option>May 2023</option>
            </select>
            <button class="bg-primary-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-primary-600 transition-colors">
                Download
            </button>
        </div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Left Column - Chart -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-lg card-shadow p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Sales Overview</h3>
                <div class="flex items-center space-x-2">
                    <button class="text-sm text-gray-500 hover:text-gray-700">View all</button>
                </div>
            </div>

            <!-- Chart Area -->
            <div class="h-80 flex items-center justify-center bg-gray-50 rounded-lg">
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-chart-bar text-2xl text-primary-600"></i>
                    </div>
                    <p class="text-gray-600 font-medium">Chart akan ditampilkan di sini</p>
                    <p class="text-sm text-gray-400 mt-1">Data penjualan dalam bentuk grafik</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column - Stats -->
    <div class="space-y-6">
        <!-- Yearly Breakup -->
        <div class="bg-white rounded-lg card-shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Yearly Breakup</h3>
            <div class="text-center">
                <div class="text-3xl font-bold text-gray-900 mb-2">Rp {{ number_format($stats['total_revenue_month'], 0, ',', '.') }}</div>
                <div class="flex items-center justify-center space-x-1 text-sm">
                    <i class="fas fa-arrow-up text-green-500"></i>
                    <span class="text-green-600 font-medium">+9% last year</span>
                </div>

                <!-- Progress Circle Placeholder -->
                <div class="mt-6 flex justify-center">
                    <div class="w-24 h-24 bg-primary-100 rounded-full flex items-center justify-center">
                        <span class="text-primary-600 font-semibold">75%</span>
                    </div>
                </div>

                <div class="mt-4 flex items-center justify-center space-x-4 text-sm">
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-primary-500 rounded-full"></div>
                        <span class="text-gray-600">2022</span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="w-3 h-3 bg-gray-300 rounded-full"></div>
                        <span class="text-gray-600">2023</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Earnings -->
        <div class="bg-white rounded-lg card-shadow p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Monthly Earnings</h3>
            <div class="text-center">
                <div class="text-3xl font-bold text-gray-900 mb-2">Rp {{ number_format($stats['revenue_today'], 0, ',', '.') }}</div>
                <div class="flex items-center justify-center space-x-1 text-sm">
                    <i class="fas fa-arrow-down text-red-500"></i>
                    <span class="text-red-600 font-medium">+9% last year</span>
                </div>

                <!-- Mini Chart Placeholder -->
                <div class="mt-6 h-16 bg-gray-50 rounded-lg flex items-center justify-center">
                    <span class="text-gray-400 text-sm">Mini chart</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bottom Section -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-8">
    <!-- Recent Transactions -->
    <div class="bg-white rounded-lg card-shadow p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Recent Transactions</h3>
        <div class="space-y-4">
            @forelse($recentBookings as $booking)
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-arrow-down text-green-600"></i>
                    </div>
                    <div>
                        <p class="font-medium text-gray-900">Payment received from</p>
                        <p class="text-sm text-gray-500">{{ $booking->pengguna->nama ?? 'N/A' }}</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-semibold text-gray-900">+Rp {{ number_format($booking->total_biaya, 0, ',', '.') }}</p>
                    <p class="text-sm text-gray-500">{{ $booking->created_at->format('H:i') }}</p>
                </div>
            </div>
            @empty
            <div class="text-center py-8">
                <p class="text-gray-500">Belum ada transaksi terbaru</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Product Performance -->
    <div class="bg-white rounded-lg card-shadow p-6">
        <h3 class="text-lg font-semibold text-gray-900 mb-6">Product Performance</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-sm text-gray-500">
                        <th class="pb-3">Id</th>
                        <th class="pb-3">Assigned</th>
                        <th class="pb-3">Name</th>
                        <th class="pb-3">Priority</th>
                        <th class="pb-3">Budget</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <tr class="border-t border-gray-100">
                        <td class="py-3">1</td>
                        <td class="py-3">
                            <div class="flex items-center space-x-2">
                                <img src="https://ui-avatars.com/api/?name=Sunil+Joshi" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="font-medium">Sunil Joshi</p>
                                    <p class="text-gray-500 text-xs">Web Designer</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-3">Elite Admin</td>
                        <td class="py-3">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">Low</span>
                        </td>
                        <td class="py-3 font-semibold">$3.9k</td>
                    </tr>
                    <tr class="border-t border-gray-100">
                        <td class="py-3">2</td>
                        <td class="py-3">
                            <div class="flex items-center space-x-2">
                                <img src="https://ui-avatars.com/api/?name=Andrew+McDownland" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="font-medium">Andrew McDownland</p>
                                    <p class="text-gray-500 text-xs">Project Manager</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-3">Real Homes WP Theme</td>
                        <td class="py-3">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">Medium</span>
                        </td>
                        <td class="py-3 font-semibold">$24.5k</td>
                    </tr>
                    <tr class="border-t border-gray-100">
                        <td class="py-3">3</td>
                        <td class="py-3">
                            <div class="flex items-center space-x-2">
                                <img src="https://ui-avatars.com/api/?name=Christopher+Jamil" class="w-8 h-8 rounded-full">
                                <div>
                                    <p class="font-medium">Christopher Jamil</p>
                                    <p class="text-gray-500 text-xs">Project Manager</p>
                                </div>
                            </div>
                        </td>
                        <td class="py-3">MedicalPro WP Theme</td>
                        <td class="py-3">
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium">High</span>
                        </td>
                        <td class="py-3 font-semibold">$12.8k</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection