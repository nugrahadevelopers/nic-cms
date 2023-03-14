<x-app-layout>
    <x-slot name="breadcrumbs">roles.create</x-slot>

    <x-card-container>
        <form action="{{ route('admin.roles.create') }}" method="post">
            @csrf
            <x-form-input-text :messages="$errors->get('name')" type="text" id="name" name="name" value="{{ old('name') }}"
                label="Nama Role" placeholder="Ex: Admin">
            </x-form-input-text>
            <div class="flex items-end justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </x-card-container>

    @push('js')
        <!-- Scripts -->
        {{-- <script src="{{ asset('assets/js/panel/admin/role/index.js') }}"></script> --}}
    @endpush
</x-app-layout>
