<x-app-layout>
    <x-slot name="breadcrumbs">mail-config.mail-test</x-slot>

    <x-card-container>
        <form action="{{ route('admin.mail-config.mail-test.send') }}" method="post">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <x-form-input-text :messages="$errors->get('to_email_address')" type="email" id="to_email_address" name="to_email_address"
                    value="{{ old('to_email_address') }}" label="Alamat Email Tujuan" placeholder="Ex: mail@example.com">
                </x-form-input-text>
                <p class="-mt-6 md:mt-6 md:ml-6 text-xs lg:text-sm text-gray-400 dark:text-gray-500">This email address
                    will be used in the
                    'To'
                    field.</p>
                <x-form-input-textarea :messages="$errors->get('message')" id="message" name="message" value="{{ old('message') }}"
                    label="Pesan" rows="2">
                </x-form-input-textarea>
                <p class="-mt-6 md:mt-6 md:ml-6 text-xs lg:text-sm text-gray-400 dark:text-gray-500">This text will be
                    used in the 'Message'
                    field
                </p>
            </div>
            <div class="flex items-end justify-end">
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
            </div>
        </form>
    </x-card-container>
</x-app-layout>
