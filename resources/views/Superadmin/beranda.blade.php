@extends('Superadmin.superadmin_layout')

@section('title', 'Dashboard - Superadmin')

@section('header', 'Dashboard Overview')

@section('content')
<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Users</p>
                <h3 class="text-2xl font-bold">1,234</h3>
            </div>
            <div class="p-3 bg-blue-100 rounded-full">
                <i class="fas fa-users text-blue-600"></i>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">Total Bookings</p>
                <h3 class="text-2xl font-bold">567</h3>
            </div>
            <div class="p-3 bg-green-100 rounded-full">
                <i class="fas fa-calendar-check text-green-600"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Activity -->
<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-semibold mb-4">Recent Activity</h3>
    <!-- Add your content here -->
</div>
@endsection