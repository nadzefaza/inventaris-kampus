<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-slate-800">Dashboard Utama</h2></x-slot>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
        <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div>
                <p class="text-sm text-slate-500">Total Item Barang</p>
                <p class="mt-1 text-3xl font-semibold text-slate-900">{{ $totalItem }} <span class="text-base font-normal text-slate-500">Jenis</span></p>
            </div>
            <span class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-50 text-blue-600">
                <x-icon name="cube" class="h-6 w-6" />
            </span>
        </div>

        <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div>
                <p class="text-sm text-slate-500">Total Stok Fisik</p>
                <p class="mt-1 text-3xl font-semibold text-slate-900">{{ $totalStok }} <span class="text-base font-normal text-slate-500">Unit</span></p>
            </div>
            <span class="flex h-12 w-12 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                <x-icon name="archive" class="h-6 w-6" />
            </span>
        </div>

        <div class="flex items-center justify-between rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div>
                <p class="text-sm text-slate-500">Barang Rusak/Afkir</p>
                <p class="mt-1 text-3xl font-semibold text-rose-600">{{ $totalRusak }} <span class="text-base font-normal text-slate-500">Unit</span></p>
            </div>
            <span class="flex h-12 w-12 items-center justify-center rounded-lg bg-rose-50 text-rose-600">
                <x-icon name="warning" class="h-6 w-6" />
            </span>
        </div>
    </div>
</x-app-layout>
