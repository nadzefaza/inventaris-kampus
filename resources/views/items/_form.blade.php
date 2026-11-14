@csrf

@php($fields = [
    'kode_barang' => 'Kode Barang',
    'nama_barang' => 'Nama Barang',
    'kategori' => 'Kategori',
])

@foreach ($fields as $name => $label)
    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
        <input type="text" name="{{ $name }}" value="{{ old($name, $item->$name ?? '') }}"
               class="mt-1 block w-full border-gray-300 rounded-md">
        @error($name) <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
@endforeach

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Stok</label>
    <input type="number" name="stok" min="0" value="{{ old('stok', $item->stok ?? 0) }}"
           class="mt-1 block w-full border-gray-300 rounded-md">
    @error('stok') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium text-gray-700">Kondisi</label>
    <select name="kondisi" class="mt-1 block w-full border-gray-300 rounded-md">
        <option value="baik" @selected(old('kondisi', $item->kondisi ?? '') == 'baik')>Baik</option>
        <option value="rusak" @selected(old('kondisi', $item->kondisi ?? '') == 'rusak')>Rusak</option>
    </select>
    @error('kondisi') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
</div>

<div class="flex gap-2">
    <button class="bg-blue-600 text-white px-4 py-2 rounded-md">Simpan</button>
    <a href="{{ route('items.index') }}" class="px-4 py-2 border rounded-md">Batal</a>
</div>