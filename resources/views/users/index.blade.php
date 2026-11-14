<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-slate-800">Kelola User</h2></x-slot>

    <div class="rounded-xl border border-slate-200 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-3 font-medium">Nama</th>
                        <th class="px-5 py-3 font-medium">Email</th>
                        <th class="px-5 py-3 font-medium">Role</th>
                        <th class="px-5 py-3 font-medium">Ubah Role</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($users as $user)
                        <tr class="hover:bg-slate-50">
                            <td class="px-5 py-3 font-medium text-slate-900">{{ $user->name }}</td>
                            <td class="px-5 py-3 text-slate-600">{{ $user->email }}</td>
                            <td class="px-5 py-3">
                                <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-medium {{ $user->role == 'admin' ? 'bg-blue-50 text-blue-700' : 'bg-slate-100 text-slate-700' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-5 py-3">
                                @if ($user->id !== auth()->id())
                                    <form method="POST" action="{{ route('users.updateRole', $user) }}" class="flex gap-2">
                                        @csrf @method('PATCH')
                                        <select name="role" class="rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500">
                                            <option value="staff" @selected($user->role == 'staff')>Staff</option>
                                            <option value="admin" @selected($user->role == 'admin')>Admin</option>
                                        </select>
                                        <button class="rounded-lg bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Simpan</button>
                                    </form>
                                @else
                                    <span class="text-slate-400">Akun Anda</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="border-t border-slate-100 p-4 sm:p-5">{{ $users->links() }}</div>
    </div>
</x-app-layout>
