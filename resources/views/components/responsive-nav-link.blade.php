@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-library-brass text-start text-base font-medium text-library-ink bg-library-canvas focus:outline-none focus:text-library-ink focus:bg-library-canvas focus:border-library-moss transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-library-muted hover:text-library-ink hover:bg-library-canvas hover:border-library-line focus:outline-none focus:text-library-ink focus:bg-library-canvas focus:border-library-line transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
