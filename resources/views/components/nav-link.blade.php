@props(['active'])

@php
$classes = $active == 1 ? 'active' : '';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
