<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Edit Buku</p>
                <h1 class="mt-1 text-2xl font-bold text-library-ink">{{ $book->title }}</h1>
                <p class="mt-1 text-sm text-library-muted">Perbarui informasi buku yang sudah tersimpan di katalog.</p>
            </div>

            <a href="{{ route('books.index') }}" class="inline-flex items-center justify-center rounded-md border border-library-line bg-library-paper px-4 py-2 text-sm font-semibold text-library-ink transition hover:bg-library-canvas focus:outline-none focus:ring-2 focus:ring-library-brass">
                Kembali
            </a>
        </div>
    </x-slot>

    <form action="{{ route('books.update', $book) }}" method="POST" class="grid gap-5 xl:grid-cols-[1fr_320px]">
        @csrf
        @method('PUT')

        <section class="flex h-full flex-col rounded-lg border border-library-line bg-library-paper shadow-sm shadow-library-line/40">
            <div class="border-b border-library-line px-5 py-4 sm:px-6">
                <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Informasi Utama</p>
                <h2 class="mt-1 text-lg font-bold text-library-ink">Detail Buku</h2>
            </div>

            <div class="space-y-5 p-5 sm:p-6">
                <div>
                    <label for="title" class="block text-sm font-semibold text-library-ink">Judul Buku</label>
                    <input id="title" type="text" name="title" value="{{ old('title', $book->title) }}" class="mt-2 block w-full rounded-md border-library-line bg-white text-library-ink shadow-sm focus:border-library-brass focus:ring-library-brass" required>
                </div>

                <div>
                    <label for="author" class="block text-sm font-semibold text-library-ink">Penulis</label>
                    <input id="author" type="text" name="author" value="{{ old('author', $book->author) }}" class="mt-2 block w-full rounded-md border-library-line bg-white text-library-ink shadow-sm focus:border-library-brass focus:ring-library-brass" required>
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-semibold text-library-ink">Kategori</label>

                    @if ($categories->isNotEmpty())
                        <select id="category_id" name="category_id" class="mt-2 block w-full rounded-md border-library-line bg-white text-library-ink shadow-sm focus:border-library-brass focus:ring-library-brass" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id) == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <input id="category_id" type="number" name="category_id" value="{{ old('category_id', $book->category_id) }}" class="mt-2 block w-full rounded-md border-library-line bg-white text-library-ink shadow-sm focus:border-library-brass focus:ring-library-brass" required>
                        <p class="mt-2 text-sm text-library-brass">Data kategori belum tersedia, gunakan ID kategori yang sudah ada di database.</p>
                    @endif
                </div>
            </div>

            <div class="mt-auto flex flex-col-reverse gap-3 border-t border-library-line bg-library-canvas/60 px-5 py-4 sm:flex-row sm:justify-end sm:px-6">
                <a href="{{ route('books.index') }}" class="inline-flex items-center justify-center rounded-md border border-library-line bg-library-paper px-4 py-2 text-sm font-semibold text-library-ink transition hover:bg-library-canvas focus:outline-none focus:ring-2 focus:ring-library-brass">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center justify-center rounded-md bg-library-moss px-5 py-2 text-sm font-semibold text-library-paper shadow-sm transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brass">
                    Simpan Perubahan
                </button>
            </div>
        </section>

        <aside class="space-y-5">
            <section class="rounded-lg border border-library-line bg-library-ink p-5 text-library-paper shadow-sm shadow-library-line/40">
                <p class="text-sm font-semibold text-library-brass">Preview Kartu</p>
                <div class="mt-5 rounded-lg border border-library-paper/10 bg-library-paper/5 p-4">
                    <span class="rounded-full bg-library-paper/10 px-3 py-1 text-xs font-semibold text-library-brass">
                        {{ $book->category?->name ?? 'Tanpa Kategori' }}
                    </span>
                    <h2 class="mt-5 text-xl font-bold leading-snug">{{ $book->title }}</h2>
                    <p class="mt-2 text-sm text-library-paper/70">{{ $book->author }}</p>
                </div>
            </section>

            <section class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40">
                <h2 class="text-lg font-bold text-library-ink">Status Data</h2>
                <div class="mt-4 space-y-3 text-sm">
                    <div class="flex items-center justify-between border-b border-library-line pb-3">
                        <span class="text-library-muted">ID Buku</span>
                        <span class="font-semibold text-library-ink">#{{ $book->id }}</span>
                    </div>
                    <div class="flex items-center justify-between border-b border-library-line pb-3">
                        <span class="text-library-muted">Dibuat</span>
                        <span class="font-semibold text-library-ink">{{ $book->created_at?->format('d M Y') ?? '-' }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-library-muted">Update terakhir</span>
                        <span class="font-semibold text-library-ink">{{ $book->updated_at?->format('d M Y') ?? '-' }}</span>
                    </div>
                </div>
            </section>

            <section class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40">
                <h2 class="text-lg font-bold text-library-ink">Catatan</h2>
                <p class="mt-2 text-sm leading-6 text-library-muted">Perubahan judul, penulis, atau kategori langsung memengaruhi kartu buku di halaman katalog.</p>
            </section>
        </aside>
    </form>
</x-app-layout>
