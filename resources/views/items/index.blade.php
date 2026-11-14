<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800">Daftar Inventaris Barang</h2>
    </x-slot>

    <div class="rounded-xl border border-slate-200 bg-white shadow-sm">

        <div class="flex flex-wrap items-center justify-between gap-3 border-b border-slate-100 p-4 sm:p-5">
            <form method="GET" class="flex flex-wrap gap-2">
                <select name="kategori" class="rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $k)
                        <option value="{{ $k }}" @selected(request('kategori') == $k)>{{ $k }}</option>
                    @endforeach
                </select>
                <select name="kondisi" class="rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Semua Kondisi</option>
                    <option value="baik" @selected(request('kondisi') == 'baik')>Baik</option>
                    <option value="rusak" @selected(request('kondisi') == 'rusak')>Rusak</option>
                </select>
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari kode/nama..." class="rounded-lg border-slate-300 text-sm focus:border-blue-500 focus:ring-blue-500">
                <button class="rounded-lg bg-slate-700 px-4 py-2 text-sm font-medium text-white hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">Cari</button>
            </form>

            <a href="{{ route('items.create') }}"
               class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                <x-icon name="plus" class="h-4 w-4" /> Tambah Barang Baru
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-left text-sm">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-5 py-3 font-medium">Kode</th>
                        <th class="px-5 py-3 font-medium">Nama Barang</th>
                        <th class="px-5 py-3 font-medium">Kategori</th>
                        <th class="px-5 py-3 font-medium">Stok</th>
                        <th class="px-5 py-3 font-medium">Kondisi</th>
                        <th class="px-5 py-3 font-medium">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($items as $item)
                        <tr class="hover:bg-slate-50">
                            <td class="whitespace-nowrap px-5 py-3 font-medium text-slate-900">{{ $item->kode_barang }}</td>
                            <td class="px-5 py-3">{{ $item->nama_barang }}</td>
                            <td class="px-5 py-3 text-slate-600">{{ $item->kategori }}</td>
                            <td class="px-5 py-3">{{ $item->stok }}</td>
                            <td class="px-5 py-3">
                                <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-medium {{ $item->kondisi == 'baik' ? 'bg-emerald-50 text-emerald-700' : 'bg-rose-50 text-rose-700' }}">
                                    {{ ucfirst($item->kondisi) }}
                                </span>
                            </td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('items.edit', $item) }}" class="inline-flex items-center gap-1 rounded-md px-2 py-1 text-blue-600 hover:bg-blue-50">
                                        <x-icon name="pencil" class="h-4 w-4" /> Edit
                                    </a>
                                    <form action="{{ route('items.destroy', $item) }}" method="POST"
                                          onsubmit="return confirm('Hapus barang ini?')">
                                        @csrf @method('DELETE')
                                        <button class="inline-flex items-center gap-1 rounded-md px-2 py-1 text-rose-600 hover:bg-rose-50">
                                            <x-icon name="trash" class="h-4 w-4" /> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-5 py-10 text-center text-slate-500">Belum ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="border-t border-slate-100 p-4 sm:p-5">{{ $items->links() }}</div>
    </div>
</x-app-layout>
