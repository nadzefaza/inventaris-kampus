<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Kelola User</h2></x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-sm sm:rounded-lg p-6 overflow-x-auto">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                        <th class="px-4 py-3">Ubah Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b">
                            <td class="px-4 py-3">{{ $user->name }}</td>
                            <td class="px-4 py-3">{{ $user->email }}</td>
                            <td class="px-4 py-3">{{ ucfirst($user->role) }}</td>
                            <td class="px-4 py-3">
                                @if ($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('users.updateRole', $user) }}" class="flex gap-2">
                                        @csrf @method('PATCH')
                                        <select name="role" class="border-gray-300 rounded-md text-sm">
                                            <option value="staff" @selected($user->role == 'staff')>Staff</option>
                                            <option value="admin" @selected($user->role == 'admin')>Admin</option>
                                        </select>
                                        <button class="bg-blue-600 text-white px-3 py-1 rounded-md text-sm">Simpan</button>
                                    </form>
                                @else
                                    <span class="text-gray-400">Akun Anda</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">{{ $users->links() }}</div>
        </div>
    </div>
</x-app-layout>