<x-blog-front-layout>
    <x-slot name="pageTitle">{{ $post->title }}</x-slot>
    <x-slot name="seoTitle">{{ $post->seo_title }}</x-slot>
    <x-slot name="seoKeyword">{{ $post->seo_keyword }}</x-slot>
    <x-slot name="seoDescription">{{ $post->seo_description }}</x-slot>
    <x-slot name="seoType">article</x-slot>
    <x-slot name="seoImg">{{ $post->getFirstMediaUrl('featured_img') }}</x-slot>
    <x-slot name="seoUrl">{{ route('front.blog.article', $post) }}</x-slot>

    <div>
        <div class="mt-12 text-gray-900 dark:text-white flex items-center justify-center gap-2">
            @foreach ($post->categories as $category)
                <h5
                    class="font-semibold text-sm px-2 py-1 text-gray-800 bg-gray-600/50 dark:text-gray-50 dark:bg-gray-600 rounded-md">
                    {{ $category->name }}</h5>
            @endforeach
        </div>
        <div class="text-gray-900 dark:text-white flex items-center justify-center gap-2 mt-4">
            <h1 class="font-bold text-center text-2xl leading-relaxed">{{ $post->title }}</h1>
        </div>
        <div class="flex items-center justify-center gap-2 mt-4">
            <p class="max-w-sm md:max-w-2xl font-light text-center text-gray-900 dark:text-gray-50 prose">
                {{ $post->excerpt }}</p>
        </div>
        <div class="flex items-center justify-center gap-2 mt-5">
            <div class="flex items-center space-x-4">
                <div class="flex-shrink-0">
                    <img class="w-8 h-8 rounded-full" src="{{ $post->createdBy->getFirstMediaUrl('avatar') }}"
                        alt="profile image">
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                        {{ $post->createdBy->name }}
                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                        {{ $post->createdBy->bio }} &#x2022;
                        {{ \Carbon\Carbon::parse($post->getRawOriginal('post_date'))->translatedFormat(config('app.date_format_frontend_blog_post')) }}
                        &#x2022;
                        {{ $post->updated_at != null ? 'diubah ' . $post->updated_at->diffForHumans() : '' }}
                    </p>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center gap-2 mt-5">
            <img class="md:max-w-screen-xl md:rounded-lg" src="{{ $post->getFirstMediaUrl('featured_img') }}"
                alt="">
        </div>
        <div class="text-white">
            <div class="grid grid-cols-12 max-w-screen-2xl mx-auto">
                <section class="col-span-10 col-start-2">
                    <div class="sm:grid sm:grid-cols-12">
                        <section class="sm:col-span-12 sm:col-start-2">
                            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12">
                                <div class="hidden lg:col-span-1 lg:block">
                                    <section class="sticky top-10 mt-0 py-12 print:hidden">
                                        <div class="flex flex-col items-center">
                                            <div>
                                                <button
                                                    class="flex flex-col items-center gap-x-4 gap-y-2.5 text-slate-900">
                                                    <i
                                                        class="fa-solid fa-hands-clapping text-slate-400 hover:text-orange-400 h-6 w-6 fade"></i>
                                                    <span
                                                        class="text-base font-medium leading-none dark:text-white">0</span>
                                                </button>
                                            </div>
                                            <div class="mt-10 flex flex-col items-center gap-y-5">
                                                <div class="text-center">
                                                    <h4
                                                        class="inline font-semibold uppercase text-sky-500 drop-shadow shadow-sky-500/50">
                                                        BAGIKAN
                                                    </h4>
                                                    <div class="flex flex-col items-center gap-y-4 mt-4 gap-2">
                                                        <a href="JavaScript:newPopupWindow('https://www.facebook.com/sharer/sharer.php?u={{ route('front.blog.article', $post) }}');"
                                                            class="p-2 w-8 h-8 flex items-center justify-center rounded-md bg-[#3b5998] hover:bg-[#334b81]"><i
                                                                class="fa-brands fa-facebook-f"></i></a>
                                                        <a href="JavaScript:newPopupWindow('https://twitter.com/intent/tweet?text=coba baca ini&amp;url={{ route('front.blog.article', $post) }}');"
                                                            class="p-2 w-8 h-8 flex items-center justify-center rounded-md bg-[#00aced] hover:bg-[#1891bd]"><i
                                                                class="fa-brands fa-twitter"></i></a>
                                                        <a href="JavaScript:newPopupWindow('https://www.linkedin.com/sharing/share-offsite/?url={{ route('front.blog.article', $post) }}');"
                                                            class="p-2 w-8 h-8 flex items-center justify-center rounded-md bg-[#007fb1] hover:bg-[#0a739d]"><i
                                                                class="fa-brands fa-linkedin-in"></i></a>
                                                        <a href="JavaScript:newPopupWindow('https://wa.me/?text={{ route('front.blog.article', $post) }}');"
                                                            class="p-2 w-8 h-8 flex items-center justify-center rounded-md bg-[#25d366] hover:bg-[#21bf5b]"><i
                                                                class="fa-brands fa-whatsapp"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="lg:col-span-9">
                                    <div
                                        class="lg:bg-white dark:lg:bg-black/20 lg:border-l lg:border-r dark:border-slate-800/40 lg:p-6">
                                        <div
                                            class="prose-headings:scroll-mt-6 prose max-w-none [&>h3>a]:text-slate-800 [&>h3>a]:no-underline [&>h2>a]:text-blue-800 [&>h3>a]:dark:text-slate-100 [&>h2>a]:dark:text-slate-100 [&>h2>a]:no-underline prose-headings:mb-0.5 prose-img:border prose-img:border-slate-200 prose-img:shadow-sm prose-img:shadow-blue-500/10 prose-img:dark:border-blue-500/20 decoration-skip-ink prose-headings:text-slate-900 prose-a:text-blue-500 prose-a:underline prose-a:decoration-blue-500/30 prose-a:decoration-2 prose-a:underline-offset-[-1px] prose-img:rounded-lg dark:prose-invert dark:prose-headings:text-slate-100 prose-pre:bg-slate-900 dark:prose-pre:bg-slate-1000 prose-pre:border-slate-700 dark:prose-pre:border-slate-800 prose-pre:border prose-pre:overflow-x-auto w-full overflow-x-auto prose-pre:rounded-md prose-th:bg-blue-500 prose-th:dark:bg-blue-600 prose-th:text-white prose-th:font-sans prose-th:p-2 prose-th:text-center prose-table:border prose-table:dark:border-gray-700 prose-td:p-2">
                                            {!! $postContent !!}
                                        </div>
                                    </div>
                                    <section class="bg-white dark:bg-gray-900 py-8 px-6 lg:py-16">
                                        <div class="">
                                            <div class="flex justify-between items-center mb-6">
                                                <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">
                                                    Diskusi ({{ $post->comments->count() }})</h2>
                                            </div>
                                            <form action="{{ route('admin.blog.comment.posts.create', $post) }}"
                                                method="POST" class="mb-6">
                                                @csrf
                                                <div
                                                    class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                                                    <label for="comment" class="sr-only">Your comment</label>
                                                    <textarea id="comment" rows="6" name="comment"
                                                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                                                        placeholder="Tulis komentar..." required></textarea>
                                                </div>
                                                <div class="flex flex-col md:flex-row items-center gap-4">
                                                    <button type="submit" @auth @else disabled @endauth
                                                        class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 disabled:bg-gray-600 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                                        Simpan Komentar
                                                    </button>
                                                    @auth
                                                    @else
                                                        <p class="text-sm font-light">Silahkan masuk ke akun anda terlebih
                                                            dahulu.</p>
                                                    @endauth
                                                </div>
                                            </form>
                                            @foreach ($post->comments->sortBy([['created_at', 'DESC']]) as $comment)
                                                <article
                                                    class="p-6 mb-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                                    <footer class="flex justify-between items-center mb-2">
                                                        <div class="flex items-center">
                                                            <p
                                                                class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                                                                <img class="mr-2 w-6 h-6 rounded-full"
                                                                    src="{{ $comment->user->getFirstMediaUrl('avatar') }}"
                                                                    alt="{{ $comment->user->name }}">{{ $comment->user->name }}
                                                            </p>
                                                            <p class="text-sm text-gray-600 dark:text-gray-400"><time
                                                                    pubdate datetime="2022-03-12"
                                                                    title="March 12th, 2022">{{ $comment->created_at }}</time>
                                                            </p>
                                                        </div>
                                                        @auth
                                                            <div x-data="{ open: false }" class="relative">
                                                                <button id="dropdownComment3Button" @click="open = !open"
                                                                    data-dropdown-toggle="dropdownComment3"
                                                                    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                                                    type="button">
                                                                    <svg class="w-5 h-5" aria-hidden="true"
                                                                        fill="currentColor" viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                                                                        </path>
                                                                    </svg>
                                                                    <span class="sr-only">Comment settings</span>
                                                                </button>
                                                                <div id="dropdownComment3" x-show="open"
                                                                    @click.outside="open = false"
                                                                    x-transition:enter="transition-all ease-in-out duration-300"
                                                                    x-transition:enter-start="opacity-25 max-h-0"
                                                                    x-transition:enter-end="opacity-100 max-h-xl"
                                                                    x-transition:leave="transition-all ease-in-out duration-300"
                                                                    x-transition:leave-start="opacity-100 max-h-xl"
                                                                    x-transition:leave-end="opacity-0 max-h-0"
                                                                    class="absolute top-10 right-0 z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                                        aria-labelledby="dropdownMenuIconHorizontalButton">
                                                                        @if ($comment->user->id == auth()->user()->id)
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Ubah</a>
                                                                            </li>
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Hapus</a>
                                                                            </li>
                                                                        @else
                                                                            <li>
                                                                                <a href="#"
                                                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Laporkan</a>
                                                                            </li>
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        @endauth
                                                    </footer>
                                                    <p class="text-gray-500 dark:text-gray-400">
                                                        {{ $comment->comment }}</p>
                                                    <div class="flex items-center mt-4 space-x-4">
                                                        <button type="button"
                                                            class="hidden items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                                                            <svg aria-hidden="true" class="mr-1 w-4 h-4"
                                                                fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                                                </path>
                                                            </svg>
                                                            Reply
                                                        </button>
                                                    </div>
                                                </article>
                                            @endforeach
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </section>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @push('js')
        <!-- Scripts -->
        <script src="{{ asset('assets/js/module/blog/blog/partials/article/default.js') }}"></script>
    @endpush
</x-blog-front-layout>
