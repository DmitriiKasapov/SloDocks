<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'SloDocs'))</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicons/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicons/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-touch-icon.png') }}" />
    <link rel="manifest" href="{{ asset('favicons/site.webmanifest') }}" />
    <meta name="theme-color" content="#f97316">

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'Информационный портал для иностранцев в Словении')">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', config('app.name', 'SloDocs'))">
    <meta property="og:description" content="@yield('og_description', 'Информационный портал для иностранцев в Словении')">
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="SloDocs">
    <meta property="og:locale" content="ru_RU">
    @yield('og_image')

    @yield('meta')

    <!-- Schema.org JSON-LD -->
    @yield('schema')

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased gradient-bg-body">
    <!-- Skip to main content link for keyboard users -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-[100] focus:px-4 focus:py-2 focus:bg-white focus:text-gray-900 focus:rounded-lg focus:shadow-lg focus:ring-2 focus:ring-orange-500">
        Перейти к содержимому
    </a>

    <div class="min-h-screen flex flex-col">
        <x-header />

        <!-- Page Content -->
        <main id="main-content" class="grow" tabindex="-1">
            @yield('content')
        </main>

        <x-footer />
    </div>

    <x-elements.scroll-to-top />
</body>
</html>
