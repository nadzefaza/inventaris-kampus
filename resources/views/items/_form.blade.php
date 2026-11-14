@csrf

@php($fields = [
    'kode_barang' => 'Kode Barang',
    'nama_barang' => 'Nama Barang',
    'kategori' => 'Kategori',
])

@foreach ($fields as $name => $label)
    <div class="mb-5">
        <label class="block text-sm font-medium text-slate-700">{{ $label }}</label>
        <input type="text" name="{{ $name }}" value="{{ old($name, $item->$name ?? '') }}"
               class="mt-1 block w-full rounded-lg border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
        @error($name) <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
    </div>
@endforeach

<div class="mb-6 grid grid-cols-1 gap-5 sm:grid-cols-2">
    <div>
        <label class="block text-sm font-medium text-slate-700">Stok</label>
        <input type="number" name="stok" min="0" value="{{ old('stok', $item->stok ?? 0) }}"
               class="mt-1 block w-full rounded-lg border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
        @error('stok') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-slate-700">Kondisi</label>
        <select name="kondisi" class="mt-1 block w-full rounded-lg border-slate-300 text-sm shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <option value="baik" @selected(old('kondisi', $item->kondisi ?? '') == 'baik')>Baik</option>
            <option value="rusak" @selected(old('kondisi', $item->kondisi ?? '') == 'rusak')>Rusak</option>
        </select>
        @error('kondisi') <p class="mt-1 text-sm text-rose-600">{{ $message }}</p> @enderror
    </div>
</div>

<div class="flex gap-2 border-t border-slate-100 pt-5">
    <button class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Simpan</button>
    <a href="{{ route('items.index') }}" class="rounded-lg border border-slate-300 bg-white px-4 py-2 text-sm font-medium text-slate-700 hover:bg-slate-50">Batal</a>
</div>
