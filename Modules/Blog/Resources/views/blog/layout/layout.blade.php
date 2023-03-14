<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @isset($pageTitle)
        <title>{{ $pageTitle . ' / ' . config('app.name', 'Nic CMS') }}</title>
    @else
        <title>{{ config('app.name', 'Nic CMS') }}</title>
    @endisset

    <meta name="Description" content="{{ $seoDescription ?? '' }}" />
    <meta name="Keywords" content="{{ $seoKeyword ?? '' }}" />

    <meta property="og:title" content="{{ $seoTitle ?? '' }}">
    <meta property="og:description" content="{{ $seoDescription ?? '' }}">
    <meta property="og:type" content="{{ $seoType ?? '' }}" />
    <meta property="og:image" content="{{ $seoImg ?? '' }}">
    <meta property="og:url" content="{{ $seoUrl ?? '' }}">
    <meta property="og:site_name" content="{{ config('app.name', 'Nic CMS') }}">
    <meta name="twitter:card" content="summary_large_image">

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

    {{-- This App Css --}}
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/panel/admin/layout/index.css') }}"> --}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Prism --}}
    <link rel="stylesheet" href="{{ asset('assets/js/vendor/prism/prism.css') }}">

    @stack('css')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
        @include('blog::blog.layout.navbar')
        {{ $slot }}
    </div>

    {{-- jQuery --}}
    <script src="{{ asset('assets/js/vendor/jquery/jquery-3.6.3.min.js') }}"></script>

    {{-- Prism --}}
    <script src="{{ asset('assets/js/vendor/prism/prism.js') }}"></script>

    {{-- This App Js --}}
    <script src="{{ asset('assets/js/module/blog/blog/layout/index.js') }}"></script>

    @stack('js')
</body>

</html>
