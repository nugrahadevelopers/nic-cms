<x-app-layout>
    <x-slot name="breadcrumbs">users</x-slot>

    <x-card-container>
        <h3 class="mb-6">{{ __('panel/admin/sitemap.header') }}</h3>
        <form action="{{ route('admin.sitemap.generate') }}" method="post">
            @csrf
            <x-primary-button>Buat Sitemap</x-primary-button>
        </form>
    </x-card-container>
</x-app-layout>
