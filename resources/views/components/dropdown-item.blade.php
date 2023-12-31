@props(['active' => false])

@php
    $classes = "block text-left py-2 px-3 text-small leading-5 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white cursor-pointer";

    if($active) {
        $classes .= " bg-blue-500 text-white";
    }
@endphp

<a {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</a>
