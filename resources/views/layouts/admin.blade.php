<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">

    <title>@yield('title', 'Admin') - {{ config('app.name', 'SloDocs') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <!-- Admin Navigation -->
        <nav class="bg-gray-800 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold">
                                SloDocs Admin
                            </a>
                        </div>

                        <!-- Admin Navigation Links -->
                        <div class="hidden sm:flex sm:items-center sm:ml-10 sm:space-x-8">
                            <a href="{{ route('admin.dashboard') }}"
                               class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                                Дашборд
                            </a>
                            <a href="{{ route('admin.services.index') }}"
                               class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                                Услуги
                            </a>
                            <a href="{{ route('admin.purchases.index') }}"
                               class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                                Покупки
                            </a>
                            <a href="{{ route('admin.accesses.index') }}"
                               class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium">
                                Доступы
                            </a>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div class="flex items-center">
                        <a href="{{ route('home') }}"
                           class="text-gray-300 hover:text-white text-sm"
                           target="_blank">
                            Открыть сайт
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Header -->
        @hasSection('header')
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">
                    @yield('header')
                </h1>
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
