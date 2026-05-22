@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'rounded-md border-library-line bg-white text-library-ink shadow-sm focus:border-library-brass focus:ring-library-brass']) }}>
