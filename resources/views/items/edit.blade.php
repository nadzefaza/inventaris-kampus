<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-slate-800">Edit Barang</h2></x-slot>

    <div class="mx-auto max-w-2xl">
        <form method="POST" action="{{ route('items.update', $item) }}" class="rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            @method('PUT')
            @include('items._form')
        </form>
    </div>
</x-app-layout>
