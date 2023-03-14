<x-front-layout>
    <div class="p-5">
        <div class="flex flex-col-reverse md:flex-row gap-1">
            <div class="relative w-full md:w-1/2 h-[32rem] bg-white border-2 border-black rounded-lg p-5">
                <div class="absolute top-2 left-2 z-50 pr-2 w-full flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <img class="w-14 h-14 rounded-full shadow-lg" src="{{ asset('assets/img/unnamed.jpg') }}"
                            alt="Bonnie image" />
                        <h5 class="text-base font-medium text-neutral-900">Reno Nugraha</h5>
                    </div>
                    <div
                        class="bg-neutral-100 text-neutral-900 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-neutral-900 dark:text-neutral-300">
                        Featured Article</div>
                </div>
                <div class="flex flex-col">
                    <img class="h-2/3 w-full object-cover" src="{{ asset('assets/img/documentation.png') }}"
                        alt="featured-img">
                    <div class="h-1/3">
                        <a href="{{ route('home.articles.read') }}"
                            class="text-xl leading-relaxed tracking-wide underline">Read
                            Documentation</a>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 grid grid-cols-2 gap-1">
                <div
                    class="h-[15.85rem] bg-white border-2 border-black rounded-lg p-5 hover:-translate-x-6 hover:-rotate-2 z-50 transition-transform ease-in-out delay-150">
                    <div class="h-full flex flex-col items-center justify-center">
                        <h3 class="text-xl font-semibold">NicCMS</h3>
                        <p class="leading-relaxed tracking-wide text-sm md:text-base">Nicely Created CMS</p>
                    </div>
                </div>
                <div
                    class="relative h-[15.85rem] dark:bg-white bg-black text-white dark:text-black border-4 border-white dark:border-black rounded-lg p-5 overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                        class="hidden dark:flex absolute -bottom-1 left-0 -right-1">
                        <path fill="#000000" fill-opacity="1"
                            d="M0,128L49.7,32L99.3,288L149,160L198.6,32L248.3,288L297.9,96L347.6,0L397.2,160L446.9,288L496.6,224L546.2,32L595.9,256L645.5,128L695.2,192L744.8,192L794.5,64L844.1,96L893.8,64L943.4,288L993.1,128L1042.8,128L1092.4,96L1142.1,128L1191.7,160L1241.4,128L1291,256L1340.7,160L1390.3,224L1440,96L1440,320L1390.3,320L1340.7,320L1291,320L1241.4,320L1191.7,320L1142.1,320L1092.4,320L1042.8,320L993.1,320L943.4,320L893.8,320L844.1,320L794.5,320L744.8,320L695.2,320L645.5,320L595.9,320L546.2,320L496.6,320L446.9,320L397.2,320L347.6,320L297.9,320L248.3,320L198.6,320L149,320L99.3,320L49.7,320L0,320Z">
                        </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                        class="dark:hidden absolute -bottom-1 left-0 -right-1">
                        <path fill="#ffffff" fill-opacity="1"
                            d="M0,128L49.7,32L99.3,288L149,160L198.6,32L248.3,288L297.9,96L347.6,0L397.2,160L446.9,288L496.6,224L546.2,32L595.9,256L645.5,128L695.2,192L744.8,192L794.5,64L844.1,96L893.8,64L943.4,288L993.1,128L1042.8,128L1092.4,96L1142.1,128L1191.7,160L1241.4,128L1291,256L1340.7,160L1390.3,224L1440,96L1440,320L1390.3,320L1340.7,320L1291,320L1241.4,320L1191.7,320L1142.1,320L1092.4,320L1042.8,320L993.1,320L943.4,320L893.8,320L844.1,320L794.5,320L744.8,320L695.2,320L645.5,320L595.9,320L546.2,320L496.6,320L446.9,320L397.2,320L347.6,320L297.9,320L248.3,320L198.6,320L149,320L99.3,320L49.7,320L0,320Z">
                        </path>
                    </svg>
                    <div class="flex justify-between">
                        <div>
                            <button id="switchThemeBtn"
                                class="text-neutral-100 dark:text-neutral-900 hover:text-neutral-200 dark:hover:text-neutral-700"><i
                                    class="fa-solid fa-circle-half-stroke"></i></button>
                        </div>
                        <div class="flex flex-col items-end">
                            <a class="hover:underline" href="{{ route('login') }}">Login</a>
                            <a class="hover:underline" href="{{ route('register') }}">Register</a>
                            @if (Module::collections()->has('Blog'))
                                <a class="hover:underline" href="{{ route('front.blog.index') }}">Blog</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div
                    class="relative h-[15.85rem] dark:bg-white bg-black text-white dark:text-black border-4 border-white dark:border-black rounded-lg p-5 overflow-hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                        class="hidden dark:flex absolute -bottom-1 left-0">
                        <path fill="#000000" fill-opacity="1"
                            d="M0,128L0,96L96,96L96,224L192,224L192,32L288,32L288,128L384,128L384,64L480,64L480,128L576,128L576,160L672,160L672,64L768,64L768,256L864,256L864,256L960,256L960,0L1056,0L1056,0L1152,0L1152,224L1248,224L1248,288L1344,288L1344,224L1440,224L1440,320L1344,320L1344,320L1248,320L1248,320L1152,320L1152,320L1056,320L1056,320L960,320L960,320L864,320L864,320L768,320L768,320L672,320L672,320L576,320L576,320L480,320L480,320L384,320L384,320L288,320L288,320L192,320L192,320L96,320L96,320L0,320L0,320Z">
                        </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                        class="dark:hidden absolute -bottom-1 left-0">
                        <path fill="#ffffff" fill-opacity="1"
                            d="M0,128L0,96L96,96L96,224L192,224L192,32L288,32L288,128L384,128L384,64L480,64L480,128L576,128L576,160L672,160L672,64L768,64L768,256L864,256L864,256L960,256L960,0L1056,0L1056,0L1152,0L1152,224L1248,224L1248,288L1344,288L1344,224L1440,224L1440,320L1344,320L1344,320L1248,320L1248,320L1152,320L1152,320L1056,320L1056,320L960,320L960,320L864,320L864,320L768,320L768,320L672,320L672,320L576,320L576,320L480,320L480,320L384,320L384,320L288,320L288,320L192,320L192,320L96,320L96,320L0,320L0,320Z">
                        </path>
                    </svg>
                    <div class="flex flex-col items-center justify-center">
                        <div class="text-2xl"><i class="fa-brands fa-github"></i></div>
                        <a class="hover:underline text-sm md:text-base" href="https://saweria.co/renonugraha"
                            target="_blank">Get this code</a>
                    </div>
                </div>
                <div
                    class="h-[15.85rem] bg-white border-2 border-black rounded-lg p-5 hover:-translate-x-6 hover:rotate-2 transition-transform ease-in-out delay-150">
                    <div class="flex flex-col items-center justify-center gap-2">
                        <div class="bg-black p-2">
                            <a href="https://saweria.co/renonugraha">
                                <img class="h-36" src="{{ asset('assets/img/sawerqr.png') }}" alt="">
                            </a>
                        </div>
                        <a class="hover:underline text-sm md:text-base" href="https://saweria.co/renonugraha"
                            target="_blank">Buy me a coffee
                            ❤️</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-10 flex items-center justify-center">
            <span class="text-black dark:text-white">Made with ❤️ by <b>RENO NUGRAHA</b></span>
        </div>
    </div>
</x-front-layout>
