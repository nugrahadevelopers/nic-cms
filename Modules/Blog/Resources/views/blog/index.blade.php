<x-blog-front-layout>
    <div class="min-h-screen bg-gray-200 dark:bg-gray-800">
        <div class="min-h-screen flex flex-col lg:flex-row">
            <div
                class="w-full lg:w-4/5 bg-gray-100 dark:bg-gray-700 border-r border-gray-300 dark:border-gray-600 shadow-md p-5 lg:p-6">
                <div class="flex flex-col items-start border-b border-gray-200 dark:border-gray-500 pb-5">
                    <h4 class="text-lg font-bold text-gray-900 dark:text-white">
                        {{ \Carbon\Carbon::parse(now())->dayName }}</h4>
                    <div class="text-sm font-medium text-gray-400 dark:text-gray-300">
                        {{ \Carbon\Carbon::parse(now())->translatedFormat(config('app.date_format')) }}
                    </div>
                </div>
                <div class="py-5">
                    <div x-data="articleTypeSwitchTabs">
                        <div class="grid grid-cols-3 cursor-pointer font-bold pb-5">
                            <div class="text-gray-900 dark:text-white" @click="setActive(1)">
                                <div class="block hover:text-gray-800 hover:dark:text-gray-50">Discover</div>
                                <div :class="getClasses(1)"></div>
                            </div>
                            <div class="text-gray-900 dark:text-white" @click="setActive(2)">
                                <div class="block hover:text-gray-800 hover:dark:text-gray-50">Following</div>
                                <div :class="getClasses(2)"></div>
                            </div>
                        </div>
                        <div class="">
                            <div x-show="isActive(1)" x-transition:enter.duration.500ms>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-1">
                                    @foreach ($posts as $post)
                                        <div
                                            class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                                            <div class="relative">
                                                <a href="{{ route('front.blog.article', $post->slug) }}">
                                                    <img class="rounded-t-lg"
                                                        src="{{ $post->getFirstMediaUrl('featured_img') }}"
                                                        alt="" />
                                                </a>
                                                <div class="absolute top-2 left-2">
                                                    @foreach ($post->categories as $category)
                                                        <span
                                                            class="bg-gray-100 text-gray-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 bg-opacity-50">{{ $category->name }}</span>
                                                    @endforeach
                                                </div>
                                                <div class="absolute top-2 right-2">
                                                    <div
                                                        class="text-white drop-shadow-md font-light text-xl hover:text-2xl transition-all ease-in-out delay-200">
                                                        0 <i class="fa-solid fa-hands-clapping"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-5">
                                                <div class="mb-2 text-gray-700 dark:text-gray-400 text-xs">
                                                    {{ $post->createdBy->name }} - {{ $post->createdBy->bio }}</div>
                                                <a href="{{ route('front.blog.article', $post->slug) }}">
                                                    <h5
                                                        class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white hover:underline">
                                                        {{ $post->title }}</h5>
                                                </a>
                                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                                    {{ $post->excerpt }}</p>
                                                <div class="text-gray-700 dark:text-gray-400">
                                                    {{ \Carbon\Carbon::parse($post->getRawOriginal('post_date'))->translatedFormat(config('app.date_format_frontend_blog_post')) }}
                                                    &#x2022; <span>{{ $post->visit_count_total }} <i
                                                            class="fa-solid fa-eye"></i></span> &#x2022;
                                                    <span>{{ $post->comments->count() }} <i
                                                            class="fa-solid fa-comments"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div x-show="isActive(2)" x-transition:enter.duration.500ms>
                                <div class="text-gray-900 dark:text-gray-100">Akan segera hadir.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-1/5">
                <div class="p-6">
                    <div class="flex flex-col items-start pb-5">
                        <h4 class="text-lg font-bold text-gray-900 dark:text-white">Trending Mingguan</h4>
                        <div class="text-sm font-medium text-gray-400 dark:text-gray-300"></div>
                    </div>
                    <div>
                        @foreach ($popularPosts as $post)
                            <a href="{{ route('front.blog.article', $post->slug) }}"
                                style="background-image: url('{{ $post->getFirstMediaUrl('featured_img') }}')"
                                class="bg-no-repeat bg-center flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 overflow-hidden">
                                <div
                                    class="flex flex-col justify-between p-4 leading-normal bg-gray-200 hover:bg-gray-300 dark:bg-gray-800 dark:hover:bg-gray-900 bg-opacity-90 dark:bg-opacity-90">
                                    <div class="text-xs text-gray-700 dark:text-gray-400">
                                        {{ \Carbon\Carbon::parse($post->getRawOriginal('post_date'))->translatedFormat(config('app.date_format_frontend_blog_post')) }}
                                        &#x2022; <span>{{ $post->visit_count_total }} <i
                                                class="fa-solid fa-eye"></i></span> &#x2022;
                                        <span>{{ $post->comments->count() }} <i
                                                class="fa-solid fa-comments"></i></span> &#x2022; 0 <i
                                            class="fa-solid fa-hands-clapping"></i>
                                    </div>
                                    <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $post->title }}</h5>
                                    <p class="mb-3 text-xs font-normal text-gray-700 dark:text-gray-400">
                                        {{ Str::limit($post->excerpt, 50) }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <!-- Scripts -->
        <script src="{{ asset('assets/js/module/blog/blog/index/index.js') }}"></script>
    @endpush
</x-blog-front-layout>
