<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl">Tambah Barang</h2></x-slot>
    <div class="py-6 max-w-2xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('items.store') }}" class="bg-white p-6 shadow-sm sm:rounded-lg">
            @include('items._form')
        </form>
    </div>
</x-app-layout>