@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm font-semibold text-library-ink']) }}>
    {{ $value ?? $slot }}
</label>
