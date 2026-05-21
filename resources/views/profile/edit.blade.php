<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Pengaturan</p>
            <h1 class="mt-1 text-2xl font-bold text-library-ink">Profil Akun</h1>
            <p class="mt-1 text-sm text-library-muted">Kelola informasi akun, ubah kata sandi, atau hapus akun Anda.</p>
        </div>
    </x-slot>

    <div class="space-y-5">
        <div class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40 sm:p-6">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40 sm:p-6">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="rounded-lg border border-library-line bg-library-paper p-5 shadow-sm shadow-library-line/40 sm:p-6">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
