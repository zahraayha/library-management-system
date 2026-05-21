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
    <body class="font-sans text-library-ink antialiased">
        <main class="min-h-screen bg-library-canvas px-4 py-6 sm:px-6 lg:px-8">
            <div class="mx-auto grid min-h-[calc(100vh-3rem)] w-full max-w-5xl overflow-hidden rounded-lg border border-library-line bg-library-paper shadow-lg shadow-library-line/50 lg:grid-cols-[0.95fr_1.05fr]">
                <section class="hidden bg-library-ink p-10 text-library-paper lg:flex lg:flex-col lg:justify-between">
                    <div>
                        <a href="/" class="inline-flex items-center gap-3">
                            <img src="{{ asset('logo.png') }}" alt="Logo Library Panel" class="h-11 w-11 rounded-md object-cover shadow-sm">
                            <span>
                                <span class="block text-base font-bold">Library Panel</span>
                                <span class="block text-sm text-library-paper/65">Manajemen perpustakaan</span>
                            </span>
                        </a>

                        <div class="mt-14">
                            <p class="text-sm font-semibold uppercase tracking-wide text-library-brass">Sistem Katalog</p>
                            <h1 class="mt-3 max-w-sm text-3xl font-bold leading-tight">Kelola koleksi buku dengan tampilan yang rapi.</h1>
                            <p class="mt-4 max-w-sm text-sm leading-6 text-library-paper/70">Masuk sebagai admin untuk menambah, mengedit, dan memantau data buku perpustakaan.</p>
                        </div>
                    </div>

                    <div class="rounded-lg border border-library-paper/10 bg-library-paper/5 p-4">
                        <p class="text-sm font-semibold text-library-brass">Akun seed lokal</p>
                        <p class="mt-2 text-sm text-library-paper/75">test@example.com</p>
                    </div>
                </section>

                <section class="flex min-h-full flex-col justify-center px-5 py-8 sm:px-10">
                    <div class="mb-8 lg:hidden">
                        <a href="/" class="inline-flex items-center gap-3">
                            <img src="{{ asset('logo.png') }}" alt="Logo Library Panel" class="h-11 w-11 rounded-md object-cover shadow-sm">
                            <span>
                                <span class="block text-base font-bold text-library-ink">Library Panel</span>
                                <span class="block text-sm text-library-muted">Manajemen perpustakaan</span>
                            </span>
                        </a>
                    </div>

                    <div class="mx-auto w-full max-w-md">
                        {{ $slot }}
                    </div>
                </section>
            </div>
        </main>
    </body>
</html>
