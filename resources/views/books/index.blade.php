<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Katalog Buku</p>
                <h1 class="mt-1 text-2xl font-bold text-library-ink">Kelola Data Buku</h1>
                <p class="mt-1 text-sm text-library-muted">{{ $books->count() }} buku tersedia di database.</p>
            </div>

            <a href="{{ route('books.create') }}" class="inline-flex items-center justify-center rounded-md bg-library-moss px-4 py-2 text-sm font-semibold text-library-paper shadow-sm transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brass">
                Tambah Buku
            </a>
        </div>
    </x-slot>

    @if ($books->isEmpty())
        <section class="rounded-lg border border-dashed border-library-line bg-library-paper p-8 text-center shadow-sm shadow-library-line/40">
            <h2 class="text-lg font-bold text-library-ink">Belum ada buku</h2>
            <p class="mt-2 text-sm text-library-muted">Tambahkan buku pertama agar katalog mulai terisi.</p>
            <a href="{{ route('books.create') }}" class="mt-5 inline-flex items-center justify-center rounded-md bg-library-moss px-4 py-2 text-sm font-semibold text-library-paper shadow-sm transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brass">
                Tambah Buku
            </a>
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

                    <div class="mt-5 flex flex-col gap-2 sm:flex-row">
                        <a href="{{ route('books.edit', $book) }}" class="inline-flex flex-1 items-center justify-center rounded-md border border-library-brass/50 bg-library-canvas px-3 py-2 text-sm font-semibold text-library-ink transition hover:border-library-brass hover:bg-library-brass/10 focus:outline-none focus:ring-2 focus:ring-library-brass">
                            Edit
                        </a>

                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus buku ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="inline-flex w-full items-center justify-center rounded-md bg-library-brick px-3 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brick">
                                Hapus
                            </button>
                        </form>
                    </div>
                </article>
            @endforeach
        </section>
    @endif
</x-app-layout>
