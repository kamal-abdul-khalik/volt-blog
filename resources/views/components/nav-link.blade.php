@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex flex items-center space-x-2 text-sm font-bold text-yellow-500 hover:text-yellow-900 transition duration-150 ease-in-out' : 'inline-flex flex items-center space-x-2 text-sm text-yellow-500 hover:text-yellow-900 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} wire:navigate>
    {{ $slot }}
</a>
