<x-app-layout>
    <x-slot name="breadcrumbs">users</x-slot>

    <x-card-container>
        <div class="flex items-end justify-end">
            <a href="{{ route('admin.users.create') }}"
                class="inline-flex items-center gap-2 h-10 px-5 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"><i
                    class="fa-solid fa-plus"></i>Tambah</a>
        </div>
        <div class="mt-5 overflow-auto">
            <table id="users-table" class="w-full table-auto text-left" data-url="{{ route('admin.users.table') }}">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </x-card-container>

    @push('js')
        <!-- Scripts -->
        <script src="{{ asset('assets/js/panel/admin/user/index.js') }}"></script>
    @endpush
</x-app-layout>
