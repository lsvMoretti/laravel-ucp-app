{{--<a {{ $attributes->merge(['class' => 'block w-full px-4 py-2 text-left text-sm leading-5 text-white hover:bg-gray-300 focus:outline-none focus:bg-gray-300 transition duration-150 ease-in-out']) }}>{{ $slot }}</a>--}}
@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center border-b-2 border-transparent text-m font-medium leading-5 text-white p-2'
                : 'inline-flex items-center border-b-2 border-transparent text-s font-medium leading-5 text-white p-2';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
