<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="{{ asset('assets/js/vendor/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/vendor/fontawesome/css/brands.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/vendor/fontawesome/css/solid.min.css') }}">

    {{-- Datatables --}}
    <link rel="stylesheet" href="{{ asset('assets/js/vendor/datatables/datatables.min.css') }}">

    {{-- Sweetalert2 --}}
    <link rel="stylesheet" href="{{ asset('assets/js/vendor/sweetalert2/sweetalert2.min.css') }}">

    {{-- Editor.md --}}
    <link rel="stylesheet" href="{{ asset('assets/js/vendor/editor-md/css/editormd.css') }}">

    {{-- DateRangePicker --}}
    <link rel="stylesheet" href="{{ asset('assets/js/vendor/daterangepicker/daterangepicker.css') }}">

    {{-- This App Css --}}
    <link rel="stylesheet" href="{{ asset('assets/css/panel/admin/layout/index.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('assets/js/vendor/select2/css/select2.min.css') }}">
</head>

<body class="text-sm font-sans antialiased" data-alert="{{ Session::has('alert') ? 'true' : 'false' }}"
    data-alert-type='{{ Session::get('alert')['alert_type'] ?? '' }}'
    data-alert-message='{{ Session::get('alert')['message'] ?? '' }}'>
    <div class="bg-gray-100 dark:bg-gray-900">
        <!-- start:mobile menu -->
        {{-- <div class="hidden absolute mobile-menu overflow-none flex w-full">
            <div class="h-screen w-64 bg-opacity-90 bg-gray-300">mobile menu
                <button onclick="toggleMobileMenu()"
                    class="border h-8 px-2 ml-4 bg-gray-100 shadow rounded-full hover:bg-gray-200">toggle
                    mobile</button>
            </div>
            <div class="w-full h-screen bg-opacity-80 bg-indigo-300"></div>
        </div> --}}
        <!-- end:mobile menu -->

        <div class="flex flex-col h-screen">
            <!--  start::navbar   -->
            @include('panel.admin.layout.navbar', [
                'breadcrumbs' => $breadcrumbs,
                'breadcrumbsData' => $breadcrumbsData ?? null,
            ])
            <!--  end::navbar   -->
            <div class="flex flex-1 overflow-hidden">
                <!--   start::Sidebar    -->
                @include('panel.admin.layout.sidebar')
                <!--   end::Sidebar    -->
                <!--   start::Main Content     -->
                <main class="flex flex-1 overflow-y-auto">
                    <div class="w-full">
                        {{ $slot }}
                    </div>
                </main>
                <!--   end::Main Content     -->
            </div>
            <!--   start::Footer     -->
            @include('panel.admin.layout.footer')
            <!--   end::Footer     -->
        </div>
    </div>

    {{-- jQuery --}}
    <script src="{{ asset('assets/js/vendor/jquery/jquery-3.6.3.min.js') }}"></script>

    {{-- Datatables --}}
    <script src="{{ asset('assets/js/vendor/datatables/datatables.min.js') }}"></script>

    {{-- Sweetalert2 --}}
    <script src="{{ asset('assets/js/vendor/sweetalert2/sweetalert2.min.js') }}"></script>

    {{-- Editor.md --}}
    <script src="{{ asset('assets/js/vendor/editor-md/editormd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/editor-md/languages/en.js') }}"></script>

    {{-- Moment Js --}}
    <script src="{{ asset('assets/js/vendor/daterangepicker/moment.min.js') }}"></script>

    {{-- DateRangePicker --}}
    <script src="{{ asset('assets/js/vendor/daterangepicker/daterangepicker.js') }}"></script>

    {{-- Select2 --}}
    <script src="{{ asset('assets/js/vendor/select2/js/select2.min.js') }}"></script>

    {{-- This App Js --}}
    <script src="{{ asset('assets/js/panel/admin/layout/index.js') }}"></script>

    @stack('js')
</body>

</html>
