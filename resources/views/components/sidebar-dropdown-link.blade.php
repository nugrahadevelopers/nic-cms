@props(['active'])

@php
    $classes = $active ?? false ? 'flex items-center w-full p-2 text-xs font-normal text-gray-900 transition duration-75 rounded-lg group bg-gray-100 dark:text-white dark:bg-gray-700 pl-11' : 'flex items-center w-full p-2 text-xs font-normal text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700 pl-11';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
</li>
