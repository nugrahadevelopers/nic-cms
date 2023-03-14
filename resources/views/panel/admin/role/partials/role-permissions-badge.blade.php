@if ($permissions->count() >= 1)
    <ul class="flex flex-wrap gap-1">
        @foreach ($permissions as $key => $permission_data)
            <li>
                <span
                    class="px-2 py-1 font-semibold text-xs leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">{{ $permission_data->name }}</span>
            </li>
        @endforeach
    </ul>
@endif
