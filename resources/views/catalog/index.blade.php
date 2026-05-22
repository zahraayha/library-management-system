<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Manajemen Buku</p>
                <h1 class="mt-1 text-2xl font-bold text-library-ink">Kelola Data Buku</h1>
                <p class="mt-1 text-sm text-library-muted">{{ $books->total() }} buku tersedia di database.</p>
            </div>

            <a href="{{ route('books.create') }}"
               class="inline-flex items-center justify-center rounded-md bg-library-moss px-4 py-2 text-sm font-semibold text-library-paper shadow-sm transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brass">
                + Tambah Buku
            </a>
        </div>

        <form method="GET" action="{{ route('books.index') }}" class="mt-4 flex gap-2">
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
                <a href="{{ route('books.index') }}"
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

    @if(session('success'))
        <div class="mb-4 rounded-lg border border-library-moss/30 bg-library-moss/10 px-4 py-3 text-sm font-medium text-library-moss">
            {{ session('success') }}
        </div>
    @endif

    @if ($books->isEmpty())
        <section class="rounded-lg border border-dashed border-library-line bg-library-paper p-8 text-center shadow-sm shadow-library-line/40">
            <h2 class="text-lg font-bold text-library-ink">Belum ada buku</h2>
            <p class="mt-2 text-sm text-library-muted">
                @if(request('search'))
                    Tidak ada buku dengan kata kunci "{{ request('search') }}".
                @else
                    Tambahkan buku pertama agar katalog mulai terisi.
                @endif
            </p>
            @if(!request('search'))
                <a href="{{ route('books.create') }}"
                   class="mt-5 inline-flex items-center justify-center rounded-md bg-library-moss px-4 py-2 text-sm font-semibold text-library-paper shadow-sm transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brass">
                    Tambah Buku
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
                        <span class="text-xs font-medium text-library-muted">#{{ ($books->currentPage() - 1) * $books->perPage() + $loop->iteration }}</span>
                    </div>

                    <div class="mt-5 flex-1">
                        <h2 class="text-lg font-bold leading-snug text-library-ink">{{ $book->title }}</h2>
                        <p class="mt-2 text-sm font-medium text-library-muted">{{ $book->author }}</p>
                        @if($book->year)
                            <p class="mt-1 text-xs text-library-muted">{{ $book->year }}</p>
                        @endif
                        @if($book->stock !== null)
                            <p class="mt-2 text-xs {{ $book->stock > 0 ? 'text-library-moss' : 'text-library-brick' }} font-medium">
                                Stok: {{ $book->stock }}
                            </p>
                        @endif
                    </div>

                    <div class="mt-5 flex flex-col gap-2 sm:flex-row">
                        <a href="{{ route('books.show', $book) }}"
                           class="inline-flex flex-1 items-center justify-center rounded-md border border-library-line bg-library-canvas px-3 py-2 text-sm font-semibold text-library-muted transition hover:bg-library-line focus:outline-none focus:ring-2 focus:ring-library-brass">
                            Detail
                        </a>
                        <a href="{{ route('books.edit', $book) }}"
                           class="inline-flex flex-1 items-center justify-center rounded-md border border-library-brass/50 bg-library-canvas px-3 py-2 text-sm font-semibold text-library-ink transition hover:border-library-brass hover:bg-library-brass/10 focus:outline-none focus:ring-2 focus:ring-library-brass">
                            Edit
                        </a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="flex-1" onsubmit="return confirm('Hapus buku ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex w-full items-center justify-center rounded-md bg-library-brick px-3 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brick">
                                Hapus
                            </button>
                        </form>
                    </div>
                </article>
            @endforeach
        </section>

        <div class="mt-6">
            {{ $books->links() }}
        </div>
    @endif
</x-app-layout>