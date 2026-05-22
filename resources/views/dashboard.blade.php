<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Dashboard</p>
                <h1 class="mt-1 text-2xl font-bold text-library-ink">Ringkasan Perpustakaan</h1>
            </div>

            @if (Auth::user()?->role === 'admin')
                <a href="{{ route('books.create') }}" class="inline-flex items-center justify-center rounded-md bg-library-moss px-4 py-2 text-sm font-semibold text-library-paper shadow-sm transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brass">
                    Tambah Buku
                </a>
            @endif
        </div>
    </x-slot>

    <section class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
        <div class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40">
            <p class="text-sm font-semibold text-library-muted">Total Buku</p>
            <p class="mt-3 text-3xl font-bold text-library-ink">{{ $bookCount ?? 0 }}</p>
            <p class="mt-2 text-sm text-library-muted">Koleksi buku yang sudah masuk database.</p>
        </div>

        <div class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40">
            <p class="text-sm font-semibold text-library-muted">Kategori</p>
            <p class="mt-3 text-3xl font-bold text-library-ink">{{ $categoryCount ?? 0 }}</p>
            <p class="mt-2 text-sm text-library-muted">Kelompok koleksi untuk merapikan katalog.</p>
        </div>

        <div class="rounded-lg border border-library-line bg-library-ink p-5 text-library-paper shadow-sm shadow-library-line/40 sm:col-span-2 xl:col-span-1">
            @if (Auth::user()?->role === 'admin')
                <p class="text-sm font-semibold text-library-brass">Mode Admin</p>
                <p class="mt-3 text-2xl font-bold">Katalog Aktif</p>
                <p class="mt-2 text-sm text-library-paper/75">Akun ini dapat menambah, mengedit, dan menghapus data buku perpustakaan.</p>
            @else
                <p class="text-sm font-semibold text-library-brass">Mode Pengguna</p>
                <p class="mt-3 text-2xl font-bold">Jelajahi Katalog</p>
                <p class="mt-2 text-sm text-library-paper/75">Telusuri koleksi buku perpustakaan dan lihat detail informasi setiap buku.</p>
            @endif
        </div>
    </section>

    <section class="mt-6 grid gap-4 xl:grid-cols-[1.15fr_0.85fr]">
        <div class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Aktivitas Katalog</p>
                    <h2 class="mt-1 text-lg font-bold text-library-ink">Buku Terbaru</h2>
                </div>

                <a href="{{ Auth::user()?->role === 'admin' ? route('books.index') : route('catalog.index') }}" class="inline-flex items-center justify-center rounded-md border border-library-line bg-library-paper px-4 py-2 text-sm font-semibold text-library-ink transition hover:bg-library-canvas focus:outline-none focus:ring-2 focus:ring-library-brass">
                    Buka Katalog
                </a>
            </div>

            <div class="mt-5 divide-y divide-library-line">
                @forelse ($latestBooks ?? [] as $book)
                    <div class="flex flex-col gap-2 py-3 first:pt-0 last:pb-0 sm:flex-row sm:items-center sm:justify-between">
                        <div class="min-w-0">
                            <p class="truncate text-sm font-bold text-library-ink">{{ $book->title }}</p>
                            <p class="mt-1 text-sm text-library-muted">{{ $book->author }}</p>
                        </div>
                        <span class="w-fit rounded-full bg-library-canvas px-3 py-1 text-xs font-semibold text-library-moss ring-1 ring-library-line">
                            {{ $book->category?->name ?? 'Tanpa Kategori' }}
                        </span>
                    </div>
                @empty
                    <div class="rounded-lg border border-dashed border-library-line bg-library-canvas p-5 text-sm text-library-muted">
                        Belum ada buku yang tercatat di katalog.
                    </div>
                @endforelse
            </div>
        </div>

        <div class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40">
            <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Sebaran Koleksi</p>
            <h2 class="mt-1 text-lg font-bold text-library-ink">Buku per Kategori</h2>

            <div class="mt-5 space-y-4">
                @forelse ($categoryStats ?? [] as $category)
                    @php
                        $percentage = ($bookCount ?? 0) > 0 ? round(($category->books_count / $bookCount) * 100) : 0;
                    @endphp
                    <div>
                        <div class="mb-2 flex items-center justify-between gap-3 text-sm">
                            <span class="font-semibold text-library-ink">{{ $category->name }}</span>
                            <span class="text-library-muted">{{ $category->books_count }} buku</span>
                        </div>
                        <div class="h-2 overflow-hidden rounded-full bg-library-canvas ring-1 ring-library-line">
                            <div class="h-full rounded-full bg-library-brass" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                @empty
                    <div class="rounded-lg border border-dashed border-library-line bg-library-canvas p-5 text-sm text-library-muted">
                        Kategori belum tersedia.
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="mt-6 grid gap-4 lg:grid-cols-3">
        <div class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40 lg:col-span-2">
            @if (Auth::user()?->role === 'admin')
                <h2 class="text-lg font-bold text-library-ink">Alur Kerja Admin</h2>
                <div class="mt-5 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-lg bg-library-canvas p-4 ring-1 ring-library-line">
                        <p class="text-sm font-bold text-library-ink">1. Tambah Buku</p>
                        <p class="mt-2 text-sm text-library-muted">Lengkapi judul, penulis, dan kategori.</p>
                    </div>
                    <div class="rounded-lg bg-library-canvas p-4 ring-1 ring-library-line">
                        <p class="text-sm font-bold text-library-ink">2. Cek Katalog</p>
                        <p class="mt-2 text-sm text-library-muted">Pastikan data tampil sebagai kartu buku.</p>
                    </div>
                    <div class="rounded-lg bg-library-canvas p-4 ring-1 ring-library-line">
                        <p class="text-sm font-bold text-library-ink">3. Perbarui Data</p>
                        <p class="mt-2 text-sm text-library-muted">Edit atau hapus data jika ada koreksi.</p>
                    </div>
                </div>
            @else
                <h2 class="text-lg font-bold text-library-ink">Panduan Pengguna</h2>
                <div class="mt-5 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-lg bg-library-canvas p-4 ring-1 ring-library-line">
                        <p class="text-sm font-bold text-library-ink">1. Buka Katalog</p>
                        <p class="mt-2 text-sm text-library-muted">Lihat daftar seluruh koleksi buku perpustakaan.</p>
                    </div>
                    <div class="rounded-lg bg-library-canvas p-4 ring-1 ring-library-line">
                        <p class="text-sm font-bold text-library-ink">2. Cari Buku</p>
                        <p class="mt-2 text-sm text-library-muted">Temukan buku berdasarkan judul atau penulis.</p>
                    </div>
                    <div class="rounded-lg bg-library-canvas p-4 ring-1 ring-library-line">
                        <p class="text-sm font-bold text-library-ink">3. Lihat Detail</p>
                        <p class="mt-2 text-sm text-library-muted">Klik kartu buku untuk melihat informasi lengkap.</p>
                    </div>
                </div>
            @endif
        </div>

        <div class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40">
            <h2 class="text-lg font-bold text-library-ink">Aksi Cepat</h2>
            <div class="mt-5 space-y-3">
                @if (Auth::user()?->role === 'admin')
                    <a href="{{ route('books.create') }}" class="flex items-center justify-between rounded-md bg-library-moss px-4 py-3 text-sm font-semibold text-library-paper transition hover:bg-library-ink">
                        <span>Tambah Buku</span>
                        <span>+</span>
                    </a>
                    <a href="{{ route('books.index') }}" class="flex items-center justify-between rounded-md border border-library-line bg-library-canvas px-4 py-3 text-sm font-semibold text-library-ink transition hover:bg-library-paper">
                        <span>Kelola Katalog</span>
                        <span>→</span>
                    </a>
                @else
                    <a href="{{ route('catalog.index') }}" class="flex items-center justify-between rounded-md bg-library-moss px-4 py-3 text-sm font-semibold text-library-paper transition hover:bg-library-ink">
                        <span>Lihat Katalog</span>
                        <span>→</span>
                    </a>
                @endif
                <a href="{{ route('profile.edit') }}" class="flex items-center justify-between rounded-md border border-library-line bg-library-canvas px-4 py-3 text-sm font-semibold text-library-ink transition hover:bg-library-paper">
                    <span>Profil Akun</span>
                    <span>→</span>
                </a>
            </div>
        </div>
    </section>
</x-app-layout>
