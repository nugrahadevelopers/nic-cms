<x-app-layout>
    <x-slot name="breadcrumbs">roles</x-slot>

    <x-card-container>
        <div class="flex items-end justify-end">
            <a href="{{ route('admin.roles.create') }}"
                class="inline-flex items-center gap-2 h-10 px-5 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"><i
                    class="fa-solid fa-plus"></i>Tambah</a>
        </div>
        <div class="mt-5 overflow-auto">
            <table id="roles-table" class="w-full table-auto text-left" data-url="{{ route('admin.roles.table') }}">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Permissions</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </x-card-container>

    @push('js')
        <!-- Scripts -->
        <script src="{{ asset('assets/js/panel/admin/role/index.js') }}"></script>
    @endpush
</x-app-layout>
