<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Tambah Buku</p>
                <h1 class="mt-1 text-2xl font-bold text-library-ink">Data Buku Baru</h1>
            </div>

            <a href="{{ route('books.index') }}" class="inline-flex items-center justify-center rounded-md border border-library-line bg-library-paper px-4 py-2 text-sm font-semibold text-library-ink transition hover:bg-library-canvas focus:outline-none focus:ring-2 focus:ring-library-brass">
                Kembali
            </a>
        </div>
    </x-slot>

    <section class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40 sm:p-6">
        <form action="{{ route('books.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="title" class="block text-sm font-semibold text-library-ink">Judul Buku</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" class="mt-2 block w-full rounded-md border-library-line bg-white text-library-ink shadow-sm focus:border-library-brass focus:ring-library-brass" placeholder="Contoh: Laskar Pelangi" required>
            </div>

            <div>
                <label for="author" class="block text-sm font-semibold text-library-ink">Penulis</label>
                <input id="author" type="text" name="author" value="{{ old('author') }}" class="mt-2 block w-full rounded-md border-library-line bg-white text-library-ink shadow-sm focus:border-library-brass focus:ring-library-brass" placeholder="Contoh: Andrea Hirata" required>
            </div>

            <div>
                <label for="category_id" class="block text-sm font-semibold text-library-ink">Kategori</label>

                @if ($categories->isNotEmpty())
                    <select id="category_id" name="category_id" class="mt-2 block w-full rounded-md border-library-line bg-white text-library-ink shadow-sm focus:border-library-brass focus:ring-library-brass" required>
                        <option value="">Pilih kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                @else
                    <input id="category_id" type="number" name="category_id" value="{{ old('category_id') }}" class="mt-2 block w-full rounded-md border-library-line bg-white text-library-ink shadow-sm focus:border-library-brass focus:ring-library-brass" placeholder="Masukkan ID kategori" required>
                    <p class="mt-2 text-sm text-library-brass">Data kategori belum tersedia, gunakan ID kategori yang sudah ada di database.</p>
                @endif
            </div>

            <div class="flex flex-col-reverse gap-3 border-t border-library-line pt-5 sm:flex-row sm:justify-end">
                <a href="{{ route('books.index') }}" class="inline-flex items-center justify-center rounded-md border border-library-line bg-library-paper px-4 py-2 text-sm font-semibold text-library-ink transition hover:bg-library-canvas focus:outline-none focus:ring-2 focus:ring-library-brass">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center justify-center rounded-md bg-library-moss px-5 py-2 text-sm font-semibold text-library-paper shadow-sm transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brass">
                    Simpan
                </button>
            </div>
        </form>
    </section>
</x-app-layout>
