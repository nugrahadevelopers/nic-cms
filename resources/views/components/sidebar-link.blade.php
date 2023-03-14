@props(['active', 'icon' => 'fa-solid fa-house-chimney'])

@php
    $classes = $active ?? false ? 'inline-flex items-center p-2 w-full text-xs font-normal text-gray-900 rounded-lg dark:text-white bg-gray-100 dark:bg-gray-700' : 'inline-flex items-center p-2 w-full text-xs font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        <i class="w-5 h-5 flex items-center justify-center {{ $icon }}"></i>
        <span class="ml-3 whitespace-nowrap">{{ $slot }}</span>
    </a>
</li>
