<x-app-layout>
    <x-slot name="breadcrumbs">categories.edit</x-slot>
    <x-slot name="breadcrumbsData">{{ $category->name }}</x-slot>

    <x-card-container>
        <form action="{{ route('admin.blog.categories.edit', $category) }}" method="post">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div class="flex flex-col">
                    <x-form-input-text :messages="$errors->get('name')" type="text" id="name" name="name"
                        value="{{ old('name', $category->name) }}" label="Nama" placeholder="Ex: News">
                    </x-form-input-text>
                </div>
                <x-form-select-input style="width: 100%;" :messages="$errors->get('parent_id')" id="parent-id-select" name="parent_id"
                    label="Parent" data-url="{{ route('admin.blog.categories.select') }}"
                    data-find-url="{{ route('admin.blog.categories.get-selected-parent', $category) }}">
                </x-form-select-input>
                <x-form-input-textarea :messages="$errors->get('description')" id="description" name="description"
                    value="{{ old('description', $category->description) }}" label="Deskripsi" rows="10">
                </x-form-input-textarea>
            </div>
            <div class="flex items-end justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            </div>
        </form>
    </x-card-container>

    @push('js')
        <!-- Scripts -->
        <script src="{{ asset('assets/js/module/blog/category/edit.js') }}"></script>
    @endpush
</x-app-layout>