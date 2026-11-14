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
    <body class="font-sans text-slate-900 antialiased">
        <div class="flex min-h-screen flex-col items-center justify-center bg-slate-900 px-4 py-10">
            <a href="/" class="flex flex-col items-center gap-3">
                <span class="flex h-14 w-14 items-center justify-center rounded-xl bg-blue-600 text-white">
                    <x-icon name="archive" class="h-8 w-8" />
                </span>
                <span class="text-lg font-semibold text-white">SIM Inventaris Kampus</span>
            </a>

            <div class="mt-6 w-full max-w-md rounded-xl bg-white px-6 py-6 shadow-xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
