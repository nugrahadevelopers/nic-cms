<x-app-layout>
    <x-slot name="breadcrumbs">users.create</x-slot>

    <x-card-container>
        <form action="{{ route('admin.users.create') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <x-form-input-text :messages="$errors->get('name')" type="text" id="name" name="name"
                    value="{{ old('name') }}" label="Nama" placeholder="Ex: Reno Nugraha">
                </x-form-input-text>
                <x-form-input-text :messages="$errors->get('email')" type="email" id="email" name="email"
                    value="{{ old('email') }}" label="Email" placeholder="Ex: reno@rn.com">
                </x-form-input-text>
                <x-form-input-text :messages="$errors->get('password')" type="password" id="password" name="password"
                    value="{{ old('password') }}" label="Password" placeholder="Ex: password">
                </x-form-input-text>
                <x-form-input-text :messages="$errors->get('password_confirmation')" type="password" id="password_confirmation"
                    name="password_confirmation" value="{{ old('password_confirmation') }}" label="Konfirmasi Password">
                </x-form-input-text>
                <x-form-select-input :messages="$errors->get('roles')" id="roles-select" name="roles[]" label="Pilih Role"
                    multiple="multiple" data-url="{{ route('admin.roles.select') }}">
                </x-form-select-input>
            </div>
            <div class="flex items-end justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </x-card-container>

    @push('js')
        <!-- Scripts -->
        <script src="{{ asset('assets/js/panel/admin/user/create.js') }}"></script>
    @endpush
</x-app-layout>
