@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-library-brass text-sm font-medium leading-5 text-library-ink focus:outline-none focus:border-library-moss transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-library-muted hover:text-library-ink hover:border-library-line focus:outline-none focus:text-library-ink focus:border-library-line transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
