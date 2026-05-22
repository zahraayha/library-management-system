<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-md border border-transparent bg-library-moss px-4 py-2 text-sm font-semibold text-library-paper shadow-sm transition hover:bg-library-ink focus:outline-none focus:ring-2 focus:ring-library-brass focus:ring-offset-2 focus:ring-offset-library-paper active:bg-library-ink']) }}>
    {{ $slot }}
</button>
