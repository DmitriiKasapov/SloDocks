<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'SloDocs'))</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'Информационный портал для русскоговорящих иностранцев в Словении')">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', config('app.name', 'SloDocs'))">
    <meta property="og:description" content="@yield('og_description', 'Информационный портал для русскоговорящих иностранцев в Словении')">
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
<body class="font-sans antialiased bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="min-h-screen flex flex-col">
        <x-header />

        <!-- Page Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <x-footer />
    </div>
</body>
</html>
