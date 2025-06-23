@extends('Superadmin.superadmin_layout')

@section('title', 'Manage Users - Superadmin')

@section('header', 'User Management')

@section('content')
<div class="bg-white rounded-lg shadow-md">
    <!-- Table Header -->
    <div class="p-4 border-b border-gray-200">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <h3 class="text-lg font-semibold text-gray-800">All Users</h3>
            <button class="w-full md:w-auto bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                <i class="fas fa-plus mr-2"></i>Add New User
            </button>
        </div>
    </div>

    <!-- Compact Table -->
    <x-compact-table
        :headers="['#', 'User', 'Username', 'Email', 'Role', 'Joined', 'Actions']"
        searchable="true"
        searchPlaceholder="Cari user...">

        @foreach($users as $index => $user)
            <x-compact-table-row>
                <x-compact-table-cell>
                    <span class="table-row-number">{{ $index + 1 }}</span>
                </x-compact-table-cell>
                <x-compact-table-cell>
                    <x-compact-table-avatar
                        :src="'https://ui-avatars.com/api/?name=' . urlencode($user->nama) . '&background=22c55e&color=fff'"
                        :name="$user->nama"
                        :alt="$user->nama">
                        <div class="text-xs text-gray-500">ID: {{ $user->id }}</div>
                    </x-compact-table-avatar>
                </x-compact-table-cell>
                <x-compact-table-cell>
                    <div class="font-medium text-gray-800 text-xs">{{ $user->username }}</div>
                </x-compact-table-cell>
                <x-compact-table-cell>
                    <div class="text-gray-700 text-xs">{{ $user->email }}</div>
                </x-compact-table-cell>
                <x-compact-table-cell>
                    @php
                        $roleStatus = match($user->role) {
                            'superadmin' => 'superadmin',
                            'admin' => 'admin',
                            'customer' => 'user',
                            default => 'user'
                        };
                    @endphp
                    <x-compact-status-badge :status="$roleStatus" type="pill">
                        {{ ucfirst($user->role) }}
                    </x-compact-status-badge>
                </x-compact-table-cell>
                <x-compact-table-cell>
                    <div class="text-gray-700 font-medium text-xs">{{ $user->created_at->format('d M Y') }}</div>
                    <div class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</div>
                </x-compact-table-cell>
                <x-compact-table-cell>
                    <x-compact-action-buttons>
                        <button onclick="editUser({{ $user->id }})" class="compact-btn compact-btn-sm compact-btn-warning" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        @if($user->role !== 'superadmin')
                        <button onclick="deleteUser({{ $user->id }})" class="compact-btn compact-btn-sm compact-btn-danger" title="Delete">
                            <i class="fas fa-trash"></i>
                        </button>
                        @endif
                    </x-compact-action-buttons>
                </x-compact-table-cell>
            </x-compact-table-row>
        @endforeach

        <x-slot name="pagination">
            {{ $users->links() }}
        </x-slot>
    </x-compact-table>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Delete User</h3>
            <div class="mt-2 px-7 py-3">
                <p class="text-sm text-gray-500">Are you sure you want to delete this user? This action cannot be undone.</p>
            </div>
            <div class="items-center px-4 py-3">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 mr-2">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function editUser(id) {
    window.location.href = `/superadmin/users/${id}/edit`;
}

function deleteUser(id) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    form.action = `/superadmin/users/${id}`;
    modal.classList.remove('hidden');
}

function closeDeleteModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.add('hidden');
}
</script>
@endpush
@endsection