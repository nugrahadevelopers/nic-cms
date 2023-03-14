@props(['active', 'icon' => 'fa-solid fa-house-chimney', 'label' => ''])

@php
    $classes = $active ?? false ? 'inline-flex items-center justify-between p-2 w-full text-xs font-normal text-gray-900 rounded-lg group bg-gray-100 dark:text-white dark:bg-gray-700' : 'inline-flex items-center justify-between p-2 w-full text-xs font-normal text-gray-900 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700';
@endphp

<li @if ($active) x-data="{ open: true }" @else x-data="{ open: false }" @endif>
    <button type="button" @click="open = !open" {{ $attributes->merge(['class' => $classes]) }}>
        <span class="inline-flex items-center">
            <i class="w-5 h-5 flex items-center justify-center {{ $icon }}"></i>
            <span class="ml-3 whitespace-nowrap">{{ $label }}</span>
        </span>
        <i class="w-5 h-5 flex items-center justify-center fa-solid fa-chevron-down"></i>
    </button>
    <div x-show="open">
        <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0"
            x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300"
            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
            class="py-2 space-y-2">
            {{ $slot }}
        </ul>
    </div>
</li>
