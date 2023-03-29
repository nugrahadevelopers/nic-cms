<x-app-layout>
    <x-slot name="breadcrumbs">mail-config.smtp-setting</x-slot>

    <x-card-container>
        <form action="{{ route('admin.mail-config.smtp-settings.update') }}" method="post">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <x-form-input-text :messages="$errors->get('from_email_address')" type="text" id="from_email_address" name="from_email_address"
                    value="{{ old('from_email_address', $setting->from_email_address ?? '') }}"
                    label="Alamat Email Pengirim" placeholder="Ex: mail@example.com">
                </x-form-input-text>
                <p class="-mt-6 md:mt-6 md:ml-6 text-xs lg:text-sm text-gray-400 dark:text-gray-500">This email address
                    will be used in the
                    'From'
                    field.</p>
                <x-form-input-text :messages="$errors->get('from_name')" type="text" id="from_name" name="from_name"
                    value="{{ old('from_name', $setting->from_name ?? '') }}" label="Nama Pengirim"
                    placeholder="Ex: Jhon Doe">
                </x-form-input-text>
                <p class="-mt-6 md:mt-6 md:ml-6 text-xs lg:text-sm text-gray-400 dark:text-gray-500">This text will be
                    used in the 'FROM'
                    field
                </p>
                <x-form-input-text :messages="$errors->get('smtp_host')" type="text" id="smtp_host" name="smtp_host"
                    value="{{ old('smtp_host', $setting->smtp_host ?? '') }}" label="SMPT HOST"
                    placeholder="Ex: smtp.example.com">
                </x-form-input-text>
                <p class="-mt-6 md:mt-6 md:ml-6 text-xs lg:text-sm text-gray-400 dark:text-gray-500">Your mail server
                </p>
                <x-form-input-text :messages="$errors->get('smtp_port')" type="text" id="smtp_port" name="smtp_port"
                    value="{{ old('smtp_port', $setting->smtp_port ?? '') }}" label="SMPT PORT" placeholder="Ex: 465">
                </x-form-input-text>
                <p class="-mt-6 md:mt-6 md:ml-6 text-xs lg:text-sm text-gray-400 dark:text-gray-500">The port to your
                    mail server
                </p>
                <x-form-input-text :messages="$errors->get('smtp_username')" type="text" id="smtp_username" name="smtp_username"
                    value="{{ old('smtp_username', $setting->smtp_username ?? '') }}" label="SMPT Username"
                    placeholder="Ex: mail@example.com">
                </x-form-input-text>
                <p class="-mt-6 md:mt-6 md:ml-6 text-xs lg:text-sm text-gray-400 dark:text-gray-500">The username to
                    login to your mail server</p>
                <x-form-input-text :messages="$errors->get('smtp_password')" type="password" id="smtp_password" name="smtp_password"
                    value="{{ old('smtp_password') }}" label="SMPT Password">
                </x-form-input-text>
                <p class="-mt-6 md:mt-6 md:ml-6 text-xs lg:text-sm text-gray-400 dark:text-gray-500">The password to
                    login to your mail server</p>
            </div>
            <div class="flex items-end justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            </div>
        </form>
    </x-card-container>
</x-app-layout>
