@props(['messages', 'id', 'label', 'helpertext', 'name', 'checked' => true])

<div class="flex">
    <div class="flex items-center h-5">
        <input id="{{ $id }}" aria-describedby="{{ $id }}-text" type="checkbox"
            checked="{{ $checked }}" name="{{ $name }}" {!! $attributes->merge([
                'class' =>
                    'w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600',
            ]) !!}>
    </div>
    <div class="ml-2 text-sm">
        <label for="{{ $id }}" class="font-medium text-gray-900 dark:text-gray-300">{{ $label }}</label>
        <p id="{{ $id }}-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">
            {{ $helpertext }}</p>
        @if ($messages)
            @foreach ((array) $messages as $message)
                <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
            @endforeach
        @endif
    </div>
</div>
