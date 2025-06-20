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

    <!-- Table Content -->
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-3 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-3 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden md:table-cell">Username</th>
                        <th class="px-3 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase hidden md:table-cell">Email</th>
                        <th class="px-3 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                        <th class="px-3 md:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="px-3 md:px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-8 w-8 md:h-10 md:w-10 flex-shrink-0">
                                    <img class="h-full w-full rounded-full" 
                                        src="https://ui-avatars.com/api/?name={{ urlencode($user->nama) }}" 
                                        alt="">
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm md:text-base font-medium text-gray-900">{{ $user->nama }}</div>
                                    <div class="text-sm text-gray-500 md:hidden">{{ $user->username }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-3 md:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                            <div class="text-sm text-gray-900">{{ $user->username }}</div>
                        </td>
                        <td class="px-3 md:px-6 py-4 whitespace-nowrap hidden md:table-cell">
                            <div class="text-sm text-gray-900">{{ $user->email }}</div>
                        </td>
                        <td class="px-3 md:px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $user->role === 'superadmin' ? 'bg-purple-100 text-purple-800' : 
                                  ($user->role === 'admin' ? 'bg-green-100 text-green-800' : 
                                    'bg-blue-100 text-blue-800') }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="px-3 md:px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-3">
                                <button onclick="editUser({{ $user->id }})" 
                                        class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button onclick="deleteUser({{ $user->id }})" 
                                        class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="px-3 md:px-6 py-3 border-t border-gray-200">
        {{ $users->links() }}
    </div>
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