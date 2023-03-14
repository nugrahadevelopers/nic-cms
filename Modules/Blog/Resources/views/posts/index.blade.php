<x-app-layout>
    <x-slot name="breadcrumbs">posts</x-slot>

    <x-card-container>
        <div class="flex items-end justify-end">
            <a href="{{ route('admin.blog.posts.create') }}"
                class="inline-flex items-center gap-2 h-10 px-5 text-indigo-100 transition-colors duration-150 bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-800"><i
                    class="fa-solid fa-plus"></i>Tambah</a>
        </div>
        <div class="mt-5 overflow-auto">
            <table id="blog-post-table" class="w-full table-auto text-left"
                data-url="{{ route('admin.blog.posts.table') }}">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tag</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </x-card-container>

    @push('js')
        <!-- Scripts -->
        <script src="{{ asset('assets/js/module/blog/post/index.js') }}"></script>
    @endpush
</x-app-layout>
