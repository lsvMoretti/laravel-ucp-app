@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center border-b-2 border-transparent text-m font-medium leading-5 text-crp-red p-2 hover:bg-crp-darkred rounded'
            : 'inline-flex items-center border-b-2 border-transparent text-m font-medium leading-5 text-white p-2 hover:bg-crp-darkred rounded';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
