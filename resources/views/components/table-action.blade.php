@php
    $showRoute = $showRoute ?? null;
    $editRoute = $editRoute ?? null;
    $deleteRoute = $deleteRoute ?? null;
    $deleteData = $deleteData ?? null;
@endphp

<div class="flex items-center gap-2">
    @if ($showRoute != null)
        <a href="{{ $showRoute }}"
            class="inline-flex items-center justify-center w-8 h-8 text-indigo-800 dark:text-indigo-100 bg-indigo-300 dark:bg-indigo-700 rounded-lg focus:shadow-outline hover:bg-indigo-400 dark:hover:bg-indigo-800"><i
                class="fa-solid fa-info"></i></a>
    @endif
    @if ($editRoute != null)
        <a href="{{ $editRoute }}"
            class="inline-flex items-center justify-center w-8 h-8 text-black bg-yellow-300 dark:bg-yellow-400 rounded-lg focus:shadow-outline hover:bg-yellow-400 dark:hover:bg-yellow-500"><i
                class="fa-solid fa-pen-to-square"></i></a>
    @endif
    @if ($deleteRoute != null)
        <div x-data="{ open: false }">
            <button type="button" @click="open = ! open"
                class="inline-flex items-center justify-center w-8 h-8 text-rose-800 dark:text-rose-100 bg-rose-300 dark:bg-rose-700 rounded-lg focus:shadow-outline hover:bg-rose-400 dark:hover:bg-rose-800"><i
                    class="fa-solid fa-trash-can"></i></button>
            <div x-show="open" x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                <!-- Modal -->
                <div x-show="open" x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 transform translate-y-1/2" x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
                    @keydown.escape="closeModal"
                    class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                    role="dialog" id="modal">
                    <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                    <header class="hidden lg:flex justify-end">
                        <button
                            class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                            aria-label="close" @click="open = false">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img"
                                aria-hidden="true">
                                <path
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                            </svg>
                        </button>
                    </header>
                    <!-- Modal body -->
                    <div class="mt-4 mb-6">
                        <!-- Modal title -->
                        <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                            Konfirmasi Penghapusan Data
                        </p>
                        <!-- Modal description -->
                        <p class="text-sm text-gray-700 dark:text-gray-400">
                            Anda yakin akan menghapus <b>{{ $deleteData }}</b> ?
                        </p>
                    </div>
                    <footer
                        class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                        <button @click="open = false" class="">
                            Batal
                        </button>
                        <form action="{{ $deleteRoute }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="w-full h-12 px-6 rounded-lg focus:shadow-outline text-rose-800 dark:text-rose-100 bg-rose-300 dark:bg-rose-700
                            hover:bg-rose-400 dark:hover:bg-rose-800">
                                Hapus
                            </button>
                        </form>
                    </footer>
                </div>
            </div>
        </div>
    @endif
</div>
