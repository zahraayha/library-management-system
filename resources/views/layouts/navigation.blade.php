@php
    $isAdmin = Auth::user()?->role === 'admin';
@endphp

<nav x-data="{ open: false }" class="sticky top-0 z-40 border-b border-library-line bg-library-paper/95 shadow-sm shadow-library-line/40 backdrop-blur">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex min-w-0 items-center gap-3">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <img src="{{ asset('logo.png') }}" alt="Logo Library Panel" class="h-10 w-10 rounded-md object-cover shadow-sm">
                    <span class="min-w-0">
                        <span class="block truncate text-sm font-bold text-library-ink">Library Panel</span>
                        <span class="block truncate text-xs text-library-muted">Manajemen perpustakaan</span>
                    </span>
                </a>
            </div>

            <div class="hidden items-center gap-3 sm:flex">
                <span class="rounded-full border border-library-line bg-library-canvas px-3 py-1 text-xs font-semibold text-library-ink">
                    {{ ucfirst(Auth::user()?->role ?? 'user') }}
                </span>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex max-w-56 items-center gap-2 rounded-md border border-library-line bg-library-paper px-3 py-2 text-sm font-semibold text-library-ink transition hover:bg-library-canvas focus:outline-none focus:ring-2 focus:ring-library-brass">
                            <span class="truncate">{{ Auth::user()->name }}</span>
                            <svg class="h-4 w-4 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Profil
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Keluar
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" aria-label="Buka menu navigasi" class="inline-flex h-10 w-10 items-center justify-center rounded-md text-library-ink transition hover:bg-library-canvas focus:outline-none focus:ring-2 focus:ring-library-brass">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden border-t border-library-line bg-library-paper sm:hidden">
        <div class="space-y-1 px-4 py-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard') || request()->routeIs('dashboard.admin')">
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="$isAdmin ? route('books.index') : route('catalog.index')" :active="request()->routeIs('books.*') || request()->routeIs('catalog.*')">
                Katalog Buku
            </x-responsive-nav-link>
        </div>

        <div class="border-t border-library-line px-4 py-4">
            <div>
                <div class="text-sm font-semibold text-library-ink">{{ Auth::user()->name }}</div>
                <div class="text-xs text-library-muted">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    Profil
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Keluar
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
