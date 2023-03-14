@props(['messages', 'id', 'label', 'value' => ''])

@php
    $inputClass = $messages ?? false ? 'bg-gray-50 border-red-500 text-red-900 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:bg-red-100 dark:border-red-400' : 'bg-gray-50 border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500';
@endphp

<div class="mb-6">
    <label for="{{ $id }}"
        class="block mb-2 text-sm font-medium {{ $messages ?? false ? 'text-red-700 dark:text-red-500' : 'text-gray-900 dark:text-white' }}">{{ $label }}</label>
    <textarea {!! $attributes->merge([
        'class' => 'border text-sm rounded-lg block w-full p-2.5 ' . $inputClass,
    ]) !!}>{{ $value }}</textarea>
    @if ($messages)
        @foreach ((array) $messages as $message)
            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
        @endforeach
    @endif
</div>
