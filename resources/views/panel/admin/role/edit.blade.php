<x-app-layout>
    <x-slot name="breadcrumbs">roles.edit</x-slot>
    <x-slot name="breadcrumbsData">{{ $role->name }}</x-slot>

    <x-card-container>
        <form action="{{ route('admin.roles.edit', $role) }}" method="post">
            @csrf
            @method('PUT')
            <div class="flex items-center justify-between mb-6">
                <div>
                    <div class="flex items-center mb-4">
                        <input id="select-all-permissions-checkbox" type="checkbox" name="select_all"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="select-all-permissions-checkbox"
                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pilih Semua</label>
                    </div>
                </div>
                <button type="submit"
                    class="inline-flex items-center gap-2 h-10 px-5 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800">Simpan</button>
            </div>
            <div class="grid grid-cols-5 gap-2">
                @foreach (config('permission.authorities') as $label => $permissions)
                    <div class="flex flex-col border border-gray-900 rounded overflow-hidden">
                        <div class="bg-gray-900 text-white p-2">{{ $label }}</div>
                        <ul class="p-2">
                            @foreach ($permissions as $permission)
                                <li>
                                    <div class="flex items-center mb-4">
                                        <input id="permissions-checkbox-{{ $permission }}" type="checkbox"
                                            name="permissions[]" value="{{ $permission }}"
                                            {{ $role->getAllPermissions()->contains('name', $permission) ? 'checked' : '' }}
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="permissions-checkbox-{{ $permission }}"
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $permission }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </form>
    </x-card-container>

    @push('js')
        <!-- Scripts -->
        <script src="{{ asset('assets/js/panel/admin/role/edit.js') }}"></script>
    @endpush
</x-app-layout>
