<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Katalog Buku</p>
                <h1 class="mt-1 text-2xl font-bold text-library-ink">Koleksi Perpustakaan</h1>
                <p class="mt-1 text-sm text-library-muted">
                    {{ $books->total() }} buku tersedia untuk dijelajahi.
                </p>
            </div>
        </div>

        <form method="GET" action="{{ route('catalog.index') }}" class="mt-4 flex gap-2">
            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari judul atau nama penulis..."
                class="w-full rounded-md border border-library-line bg-library-paper px-4 py-2 text-sm text-library-ink placeholder-library-muted focus:border-library-moss focus:outline-none focus:ring-1 focus:ring-library-moss"
            >
            <button type="submit"
                class="rounded-md bg-library-moss px-4 py-2 text-sm font-semibold text-library-paper transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brass">
                Cari
            </button>
            @if(request('search'))
                <a href="{{ route('catalog.index') }}"
                   class="rounded-md border border-library-line bg-library-canvas px-4 py-2 text-sm font-semibold text-library-muted transition hover:bg-library-line">
                    Reset
                </a>
            @endif
        </form>

        @if(request('search'))
            <p class="mt-2 text-xs text-library-muted">
                Hasil pencarian: <span class="font-semibold text-library-ink">"{{ request('search') }}"</span>
            </p>
        @endif
    </x-slot>

    @if ($books->isEmpty())
        <section class="rounded-lg border border-dashed border-library-line bg-library-paper p-8 text-center shadow-sm shadow-library-line/40">
            <h2 class="text-lg font-bold text-library-ink">Buku tidak ditemukan</h2>
            <p class="mt-2 text-sm text-library-muted">
                @if(request('search'))
                    Tidak ada buku dengan kata kunci "{{ request('search') }}". Coba kata kunci lain.
                @else
                    Katalog perpustakaan masih kosong. Silakan cek kembali nanti.
                @endif
            </p>
            @if(request('search'))
                <a href="{{ route('catalog.index') }}"
                   class="mt-4 inline-flex items-center justify-center rounded-md border border-library-line bg-library-canvas px-4 py-2 text-sm font-semibold text-library-muted transition hover:bg-library-line">
                    Lihat semua buku
                </a>
            @endif
        </section>
    @else
        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
            @foreach ($books as $book)
                <article class="flex min-h-56 flex-col rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40 transition hover:-translate-y-0.5 hover:border-library-brass hover:shadow-md">
                    <div class="flex items-start justify-between gap-3">
                        <span class="rounded-full bg-library-canvas px-3 py-1 text-xs font-semibold text-library-moss ring-1 ring-library-line">
                            {{ $book->category?->name ?? 'Tanpa Kategori' }}
                        </span>
                        @if($book->stock !== null)
                            <span class="text-xs font-medium {{ $book->stock > 0 ? 'text-library-moss' : 'text-library-brick' }}">
                                {{ $book->stock > 0 ? 'Tersedia' : 'Habis' }}
                            </span>
                        @endif
                    </div>

                    <div class="mt-5 flex-1">
                        <h2 class="text-lg font-bold leading-snug text-library-ink">{{ $book->title }}</h2>
                        <p class="mt-2 text-sm font-medium text-library-muted">{{ $book->author }}</p>
                        @if($book->year)
                            <p class="mt-1 text-xs text-library-muted">{{ $book->year }}</p>
                        @endif
                        @if($book->description)
                            <p class="mt-3 text-sm text-library-muted line-clamp-2">{{ $book->description }}</p>
                        @endif
                    </div>

                    <div class="mt-5 flex items-center justify-between border-t border-library-line pt-4">
                        <span class="text-xs text-library-muted">
                            {{ $book->created_at ? $book->created_at->diffForHumans() : '-' }}
                        </span>
                        <a href="{{ route('books.show', $book) }}"
                           class="inline-flex items-center justify-center rounded-md border border-library-brass/50 bg-library-canvas px-3 py-1.5 text-xs font-semibold text-library-ink transition hover:border-library-brass hover:bg-library-brass/10 focus:outline-none focus:ring-2 focus:ring-library-brass">
                            Lihat Detail →
                        </a>
                    </div>
                </article>
            @endforeach
        </section>

        <div class="mt-6">
            {{ $books->links() }}
        </div>
    @endif
</x-app-layout>