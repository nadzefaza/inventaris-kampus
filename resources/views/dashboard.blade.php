<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Dashboard Utama</h2></x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <p class="text-xs uppercase text-gray-500">Total Item Barang</p>
                <p class="text-3xl font-bold">{{ $totalItem }} Jenis</p>
            </div>
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <p class="text-xs uppercase text-gray-500">Total Stok Fisik</p>
                <p class="text-3xl font-bold">{{ $totalStok }} Unit</p>
            </div>
            <div class="bg-white p-6 shadow-sm rounded-lg">
                <p class="text-xs uppercase text-gray-500">Barang Rusak/Afkir</p>
                <p class="text-3xl font-bold text-red-600">{{ $totalRusak }} Unit</p>
            </div>
        </div>
    </div>
</x-app-layout>