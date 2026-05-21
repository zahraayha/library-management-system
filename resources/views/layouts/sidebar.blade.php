@php
    $isAdmin = Auth::user()?->role === 'admin';

    $items = [
        [
            'label' => 'Dashboard',
            'href' => route('dashboard'),
            'active' => request()->routeIs('dashboard') || request()->routeIs('dashboard.admin'),
        ],
    ];

    if ($isAdmin) {
        $items[] = [
            'label' => 'Katalog Buku',
            'href' => route('books.index'),
            'active' => request()->routeIs('books.*'),
        ];
    }
@endphp

<aside class="sticky top-24 hidden h-[calc(100vh-7rem)] w-64 shrink-0 rounded-lg border border-library-line bg-library-paper p-4 shadow-sm shadow-library-line/40 lg:block">
    <div class="flex h-full flex-col">
        <div class="mb-5 border-b border-library-line pb-4">
            <p class="text-xs font-semibold uppercase tracking-wide text-library-moss">Menu Perpustakaan</p>
            <p class="mt-1 text-sm text-library-muted">Navigasi utama aplikasi</p>
        </div>

        <nav class="space-y-2">
            @foreach ($items as $item)
                <a
                    href="{{ $item['href'] }}"
                    class="flex items-center justify-between rounded-md px-3 py-2.5 text-sm font-semibold transition {{ $item['active'] ? 'bg-library-ink text-library-paper' : 'text-library-muted hover:bg-library-canvas hover:text-library-ink' }}"
                >
                    <span>{{ $item['label'] }}</span>
                    @if ($item['active'])
                        <span class="h-2 w-2 rounded-full bg-library-brass"></span>
                    @endif
                </a>
            @endforeach
        </nav>

        <div class="mt-6 rounded-lg bg-library-canvas p-4 text-library-ink ring-1 ring-library-line">
            <p class="text-sm font-semibold">Role akun</p>
            <p class="mt-1 text-xs text-library-muted">{{ ucfirst(Auth::user()?->role ?? 'user') }}</p>
        </div>

        <form method="POST" action="{{ route('logout') }}" class="mt-auto border-t border-library-line pt-4">
            @csrf

            <button type="submit" class="flex w-full items-center justify-between rounded-md border border-library-line bg-library-paper px-3 py-2.5 text-sm font-semibold text-library-ink transition hover:bg-library-canvas focus:outline-none focus:ring-2 focus:ring-library-brass">
                <span>Logout</span>
                <span aria-hidden="true">→</span>
            </button>
        </form>
    </div>
</aside>
