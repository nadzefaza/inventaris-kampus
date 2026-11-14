<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-slate-100 text-slate-800">
        @php
            $navBase = 'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition';
            $navOn = 'bg-blue-600 text-white';
            $navOff = 'text-slate-300 hover:bg-slate-800 hover:text-white';
        @endphp

        <div x-data="{ open: false }" class="min-h-screen lg:flex">

            <!-- Overlay untuk tampilan HP -->
            <div x-show="open" style="display: none;" @click="open = false" class="fixed inset-0 z-30 bg-slate-900/50 lg:hidden"></div>

            <!-- Sidebar -->
            <aside :class="open ? '' : '-translate-x-full'"
                   class="fixed inset-y-0 left-0 z-40 flex w-64 flex-col bg-slate-900 transition-transform lg:static lg:translate-x-0">
                <div class="flex h-16 items-center gap-3 border-b border-slate-800 px-5">
                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-blue-600 text-white">
                        <x-icon name="archive" class="h-5 w-5" />
                    </span>
                    <span class="text-sm font-semibold leading-tight text-white">SIM Inventaris<br>Kampus</span>
                </div>

                <nav class="flex-1 space-y-1 px-3 py-4">
                    <a href="{{ route('dashboard') }}" class="{{ $navBase }} {{ request()->routeIs('dashboard') ? $navOn : $navOff }}">
                        <x-icon name="home" class="h-5 w-5" /> Dashboard
                    </a>
                    <a href="{{ route('items.index') }}" class="{{ $navBase }} {{ request()->routeIs('items.*') ? $navOn : $navOff }}">
                        <x-icon name="cube" class="h-5 w-5" /> Data Barang
                    </a>
                    @if (auth()->user()->isAdmin())
                        <a href="{{ route('users.index') }}" class="{{ $navBase }} {{ request()->routeIs('users.*') ? $navOn : $navOff }}">
                            <x-icon name="users" class="h-5 w-5" /> Kelola User
                        </a>
                    @endif
                </nav>

                <div class="space-y-1 border-t border-slate-800 px-3 py-4">
                    <a href="{{ route('profile.edit') }}" class="{{ $navBase }} {{ request()->routeIs('profile.*') ? $navOn : $navOff }}">
                        <x-icon name="user" class="h-5 w-5" /> Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="{{ $navBase }} {{ $navOff }} w-full">
                            <x-icon name="logout" class="h-5 w-5" /> Log Out
                        </button>
                    </form>
                </div>
            </aside>

            <!-- Konten -->
            <div class="flex min-w-0 flex-1 flex-col">
                <header class="sticky top-0 z-20 flex h-16 items-center gap-3 border-b border-slate-200 bg-white px-4 sm:px-6">
                    <button type="button" @click="open = true" class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-blue-500 lg:hidden" aria-label="Buka menu">
                        <x-icon name="menu" class="h-6 w-6" />
                    </button>

                    <div class="min-w-0 flex-1 truncate">
                        @isset($header)
                            {{ $header }}
                        @endisset
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="hidden text-right leading-tight sm:block">
                            <p class="text-sm font-medium text-slate-800">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-slate-500">{{ ucfirst(Auth::user()->role) }}</p>
                        </div>
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-blue-600 text-sm font-semibold text-white">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>
                </header>

                <main class="flex-1 p-4 sm:p-6">
                    @if (session('success'))
                        <div class="mb-4 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
