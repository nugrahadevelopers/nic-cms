<x-app-layout>
    <x-slot name="breadcrumbs">tags</x-slot>

    <x-card-container>
        <div class="flex items-end justify-end">
            <a href="{{ route('admin.blog.tags.create') }}"
                class="inline-flex items-center gap-2 h-10 px-5 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"><i
                    class="fa-solid fa-plus"></i>Tambah</a>
        </div>
        <div class="mt-5 overflow-auto">
            <table id="blog-tag-table" class="w-full table-auto text-left" data-url="{{ route('admin.blog.tags.table') }}">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Slug</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </x-card-container>

    @push('js')
        <!-- Scripts -->
        <script src="{{ asset('assets/js/module/blog/tag/index.js') }}"></script>
    @endpush
</x-app-layout>
