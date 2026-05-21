<x-guest-layout>
    <div class="mb-7">
        <p class="text-sm font-semibold uppercase tracking-wide text-library-moss">Selamat Datang</p>
        <h1 class="mt-2 text-2xl font-bold text-library-ink">Masuk ke Library Panel</h1>
        <p class="mt-2 text-sm text-library-muted">Gunakan akun yang sudah terdaftar untuk mengelola katalog perpustakaan.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-library-line text-library-moss shadow-sm focus:ring-library-brass" name="remember">
                <span class="ms-2 text-sm text-library-muted">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-6 flex flex-col-reverse gap-3 sm:flex-row sm:items-center sm:justify-between">
            @if (Route::has('password.request'))
                <a class="rounded-md text-sm font-semibold text-library-muted transition hover:text-library-ink focus:outline-none focus:ring-2 focus:ring-library-brass focus:ring-offset-2 focus:ring-offset-library-paper" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="w-full sm:w-auto">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
