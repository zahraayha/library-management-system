<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ url()->previous() }}"
               class="inline-flex items-center justify-center rounded-md border border-library-line bg-library-canvas p-2 text-library-muted transition hover:bg-library-line focus:outline-none focus:ring-2 focus:ring-library-brass">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Detail Buku</p>
                <h1 class="mt-0.5 text-2xl font-bold text-library-ink">{{ $book->title }}</h1>
            </div>
        </div>
    </x-slot>

    <div class="rounded-lg border border-library-line bg-library-paper p-6 shadow-sm shadow-library-line/40 sm:p-8">

        <div class="flex flex-wrap items-center gap-3">
            @if($book->category)
                <span class="rounded-full bg-library-canvas px-3 py-1 text-xs font-semibold text-library-moss ring-1 ring-library-line">
                    {{ $book->category->name }}
                </span>
            @endif

            @if($book->stock !== null)
                <span class="rounded-full px-3 py-1 text-xs font-semibold ring-1
                    {{ $book->stock > 0
                        ? 'bg-library-moss/10 text-library-moss ring-library-moss/30'
                        : 'bg-library-brick/10 text-library-brick ring-library-brick/30' }}">
                    {{ $book->stock > 0 ? 'Stok Tersedia: ' . $book->stock : 'Stok Habis' }}
                </span>
            @endif
        </div>

        <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="rounded-lg border border-library-line bg-library-canvas p-4">
                <p class="text-xs font-semibold uppercase tracking-wide text-library-muted">Penulis</p>
                <p class="mt-1 text-base font-bold text-library-ink">{{ $book->author }}</p>
            </div>

            @if($book->year)
            <div class="rounded-lg border border-library-line bg-library-canvas p-4">
                <p class="text-xs font-semibold uppercase tracking-wide text-library-muted">Tahun Terbit</p>
                <p class="mt-1 text-base font-bold text-library-ink">{{ $book->year }}</p>
            </div>
            @endif

            @if($book->category)
            <div class="rounded-lg border border-library-line bg-library-canvas p-4">
                <p class="text-xs font-semibold uppercase tracking-wide text-library-muted">Kategori</p>
                <p class="mt-1 text-base font-bold text-library-ink">{{ $book->category->name }}</p>
            </div>
            @endif

            <div class="rounded-lg border border-library-line bg-library-canvas p-4">
                <p class="text-xs font-semibold uppercase tracking-wide text-library-muted">Ditambahkan</p>
                <p class="mt-1 text-base font-bold text-library-ink">{{ $book->created_at ? $book->created_at->format('d M Y') : '-' }}</p>
            </div>
        </div>

        <div class="my-6 border-t border-library-line"></div>

        <div>
            <h2 class="text-sm font-semibold uppercase tracking-wide text-library-moss">Sinopsis / Deskripsi</h2>
            @if($book->description)
                <p class="mt-3 leading-relaxed text-library-ink">{{ $book->description }}</p>
            @else
                <p class="mt-3 text-sm italic text-library-muted">Deskripsi belum tersedia untuk buku ini.</p>
            @endif
        </div>

        @if(auth()->user()?->role === 'admin')
            <div class="mt-8 flex flex-wrap gap-3 border-t border-library-line pt-6">
                <a href="{{ route('books.edit', $book) }}"
                   class="inline-flex items-center justify-center rounded-md border border-library-brass/50 bg-library-canvas px-4 py-2 text-sm font-semibold text-library-ink transition hover:border-library-brass hover:bg-library-brass/10 focus:outline-none focus:ring-2 focus:ring-library-brass">
                    Edit Buku
                </a>

                <form action="{{ route('books.destroy', $book) }}" method="POST" onsubmit="return confirm('Hapus buku ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-md bg-library-brick px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brick">
                        Hapus Buku
                    </button>
                </form>
            </div>
        @endif
    </div>
</x-app-layout>