<x-app-layout>
    <x-slot name="breadcrumbs">posts.edit</x-slot>
    <x-slot name="breadcrumbsData">{{ $post->name }}</x-slot>

    <form action="{{ route('admin.blog.posts.edit', $post) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex flex-col lg:flex-row">
            <x-card-container class="w-full lg:w-[80%]">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div class="flex flex-col col-span-2">
                        <x-form-input-text :messages="$errors->get('title')" type="text" id="title" name="title"
                            value="{{ old('title', $post->title) }}" label="Judul"
                            placeholder="Ex: Lorem ipsum dolor sit amet">
                        </x-form-input-text>
                    </div>
                    <div class="flex flex-col col-span-2">
                        <x-form-input-textarea :messages="$errors->get('excerpt')" id="excerpt" name="excerpt"
                            value="{{ old('excerpt', $post->excerpt) }}" label="Deskripsi Singkat" rows="2">
                        </x-form-input-textarea>
                    </div>
                    <div class="flex flex-col col-span-2 z-50">
                        <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konten</span>
                        <div id="post-content-editor"
                            data-upload-img-url="{{ route('admin.blog.posts.upload-content-img') }}"
                            class="rounded-lg overflow-hidden">
                            <textarea name="content" id="content" style="display: none">{{ $post->content }}</textarea>
                        </div>
                    </div>
                </div>
            </x-card-container>
            <x-card-container class="w-full lg:w-[480px]">
                <div class="block sm:flex flex-col lg:flex-row items-center justify-between mb-5">
                    <x-form-select-input :messages="$errors->get('post_status')" id="post_status-select" name="post_status" label="Status"
                        class="w-full sm:w-auto">
                        <option value="1" {{ $post->post_status == 1 ? 'selected' : '' }}>PUBLISH</option>
                        <option value="0" {{ $post->post_status == 2 ? 'selected' : '' }}>DRAFT</option>
                    </x-form-select-input>
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">SIMPAN</button>
                </div>
                <div class="flex flex-col gap-2">
                    <x-form-input-text :messages="$errors->get('post_date')" data-value="{{ $post->getRawOriginal('post_date') }}"
                        type="text" id="post-date" name="post_date" label="Tanggal Posting" class="hidden">
                        <div id="post-date-select"
                            class="flex items-center justify-between bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500 cursor-pointer">
                            <div>
                                <i class="mr-2 fa fa-calendar"></i>
                                <span></span>
                            </div>
                            <i class="fa fa-caret-down"></i>
                        </div>
                    </x-form-input-text>
                    <span class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Featured Image</span>
                    <div class="mb-2 w-full max-w-2xl mx-auto bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div id="featured-img-upload-wrapper" class="" x-data="imageData()"
                            data-url="{{ $post->getFirstMediaUrl('featured_img') }}">
                            <div x-show="previewUrl == ''">
                                <p class="text-center uppercase text-bold p-6">
                                    <label for="featured-img" class="cursor-pointer">
                                        <i class="fa-solid fa-image"></i> Unggah
                                    </label>
                                    <input type="file" name="featured_img" id="featured-img" class="hidden"
                                        @change="updatePreview()">
                                </p>
                            </div>
                            <div x-show="previewUrl !== ''">
                                <img :src="previewUrl" alt="" class="rounded">
                                <div class="mt-2 ml-2">
                                    <button type="button" class="mb-2 px-4 py-2 bg-rose-400 rounded-lg"
                                        @click="clearPreview()"><i class="fa-solid fa-trash text-rose-800"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-form-select-input style="width: 100%;" :messages="$errors->get('category_id')" id="category-id-select"
                        name="category_id[]" label="Pilih Kategori" multiple="multiple"
                        data-url="{{ route('admin.blog.categories.select') }}"
                        data-find-url="{{ route('admin.blog.posts.get-selected-categories', $post) }}">
                    </x-form-select-input>
                    <x-form-select-input style="width: 100%;" :messages="$errors->get('tag_id')" id="tag-id-select" name="tag_id[]"
                        label="Pilih Tag" multiple="multiple" data-url="{{ route('admin.blog.tags.select') }}"
                        data-find-url="{{ route('admin.blog.posts.get-selected-tags', $post) }}">
                    </x-form-select-input>
                    <x-form-input-checkbox-helper :messages="$errors->get('post_comment_status')" label="Izinkan
                        Komentar"
                        value="{{ $post->post_comment_status }}" id="post-comment-status" name="post_comment_status"
                        checked="{{ $post->post_comment_status }}"
                        helpertext="Dengan mencentang berarti anda telah mengizinkan pembaca melakukan komentar pada artikel
                        anda.">
                    </x-form-input-checkbox-helper>
                    <div class="flex items-center justify-between gap-2 py-4">
                        <div class="h-[1px] w-full bg-gray-300 dark:bg-gray-700"></div>
                        <div class="text-xs text-gray-500">SEO</div>
                        <div class="h-[1px] w-full bg-gray-300 dark:bg-gray-700"></div>
                    </div>
                    <x-form-input-text :messages="$errors->get('seo_title')" type="text" id="seo-title" name="seo_title"
                        value="{{ old('seo_title', $post->seo_title) }}" label="Judul SEO">
                    </x-form-input-text>
                    <x-form-input-text :messages="$errors->get('seo_keyword')" type="text" id="seo_keyword" name="seo_keyword"
                        value="{{ old('seo_keyword', $post->seo_keyword) }}" label="Keyword SEO">
                    </x-form-input-text>
                    <x-form-input-textarea :messages="$errors->get('seo_description')" id="seo-description" name="seo_description"
                        value="{{ old('seo_description', $post->seo_description) }}" label="Deskripsi SEO"
                        rows="2">
                    </x-form-input-textarea>
                </div>
            </x-card-container>
        </div>
    </form>

    @push('js')
        <!-- Scripts -->
        <script src="{{ asset('assets/js/module/blog/post/edit.js') }}"></script>
    @endpush
</x-app-layout>
