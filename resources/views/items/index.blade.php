<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Daftar Inventaris Barang</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <div class="flex flex-wrap justify-between gap-3 mb-4">
                    <form method="GET" class="flex flex-wrap gap-2">
                        <select name="kategori" class="border-gray-300 rounded-md text-sm">
                            <option value="">Semua Kategori</option>
                            @foreach ($categories  as $k)
                                <option value="{{ $k }}" @selected(request('kategori') == $k)>{{ $k }}</option>
                            @endforeach
                        </select>
                        <select name="kondisi" class="border-gray-300 rounded-md text-sm">
                            <option value="">Semua Kondisi</option>
                            <option value="baik" @selected(request('kondisi') == 'baik')>Baik</option>
                            <option value="rusak" @selected(request('kondisi') == 'rusak')>Rusak</option>
                        </select>
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="Cari kode/nama..." class="border-gray-300 rounded-md text-sm">
                        <button class="bg-gray-700 text-white px-4 py-2 rounded-md text-sm">Cari</button>
                    </form>

                    <a href="{{ route('items.create') }}"
                       class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm">+ Tambah Barang Baru</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3">Kode</th>
                                <th class="px-4 py-3">Nama Barang</th>
                                <th class="px-4 py-3">Kategori</th>
                                <th class="px-4 py-3">Stok</th>
                                <th class="px-4 py-3">Kondisi</th>
                                <th class="px-4 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr class="border-b">
                                    <td class="px-4 py-3">{{ $item->kode_barang }}</td>
                                    <td class="px-4 py-3">{{ $item->nama_barang }}</td>
                                    <td class="px-4 py-3">{{ $item->kategori }}</td>
                                    <td class="px-4 py-3">{{ $item->stok }}</td>
                                    <td class="px-4 py-3">
                                        <span class="px-2 py-1 rounded text-xs {{ $item->kondisi == 'baik' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                            {{ ucfirst($item->kondisi) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 flex gap-2">
                                        <a href="{{ route('items.edit', $item) }}" class="text-blue-600">Edit</a>
                                        <form action="{{ route('items.destroy', $item) }}" method="POST"
                                              onsubmit="return confirm('Hapus barang ini?')">
                                            @csrf @method('DELETE')
                                            <button class="text-red-600">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" class="px-4 py-6 text-center text-gray-500">Belum ada data.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">{{ $items->links() }}</div>
            </div>
        </div>
    </div>
</x-app-layout>