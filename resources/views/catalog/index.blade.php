<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Katalog Buku</p>
                <h1 class="mt-1 text-2xl font-bold text-library-ink">Koleksi Perpustakaan</h1>
                <p class="mt-1 text-sm text-library-muted">{{ $books->count() }} buku tersedia untuk dijelajahi.</p>
            </div>
        </div>
    </x-slot>

    @if ($books->isEmpty())
        <section class="rounded-lg border border-dashed border-library-line bg-library-paper p-8 text-center shadow-sm shadow-library-line/40">
            <h2 class="text-lg font-bold text-library-ink">Belum ada buku</h2>
            <p class="mt-2 text-sm text-library-muted">Katalog perpustakaan masih kosong. Silakan cek kembali nanti.</p>
        </section>
    @else
        <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
            @foreach ($books as $book)
                <article class="flex min-h-56 flex-col rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40 transition hover:-translate-y-0.5 hover:border-library-brass hover:shadow-md">
                    <div class="flex items-start justify-between gap-3">
                        <span class="rounded-full bg-library-canvas px-3 py-1 text-xs font-semibold text-library-moss ring-1 ring-library-line">
                            {{ $book->category?->name ?? 'Tanpa Kategori' }}
                        </span>
                        <span class="text-xs font-medium text-library-muted">#{{ $loop->iteration }}</span>
                    </div>

                    <div class="mt-5 flex-1">
                        <h2 class="text-lg font-bold leading-snug text-library-ink">{{ $book->title }}</h2>
                        <p class="mt-2 text-sm font-medium text-library-muted">{{ $book->author }}</p>
                    </div>

                    <div class="mt-5 flex items-center justify-between border-t border-library-line pt-4">
                        <span class="text-xs text-library-muted">Ditambahkan {{ $book->created_at->diffForHumans() }}</span>
                    </div>
                </article>
            @endforeach
        </section>
    @endif
</x-app-layout>
