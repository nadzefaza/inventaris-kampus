<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Kelola User</h2></x-slot>
    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Role</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->role }}</td>
                            <td class="py-2 px-4 border-b">
                                @if ($user->id !== auth()->id())
                                    <form action="{{ route('users.updateRole', $user) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        @if ($user->isAdmin())
                                            <button type="submit" name="role" value="user" onclick="return confirm('Are you sure you want to change this user to a regular user?')" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded">Demote to User</button>
                                        @else
                                            <button type="submit" name="role" value="admin" onclick="return confirm('Are you sure you want to promote this user to admin?')" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">Promote to Admin</button>
                                        @endif
                                    </form>
</x-app-layout>