<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'SloDocs'))</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="@yield('meta_description', 'Информационный портал для русскоговорящих иностранцев в Словении')">
    @yield('meta')

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
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900">
                                SloDocs
                            </a>
                        </div>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden sm:flex sm:items-center sm:space-x-8">
                        <a href="{{ route('home') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 text-sm font-medium">
                            Услуги
                        </a>
                        <a href="{{ route('legal.terms') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 text-sm">
                            Условия
                        </a>
                        <a href="{{ route('legal.privacy') }}" class="text-gray-500 hover:text-gray-700 px-3 py-2 text-sm">
                            Конфиденциальность
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 mt-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 mb-3">SloDocs</h3>
                        <p class="text-sm text-gray-600">
                            Информационный портал для русскоговорящих иностранцев в Словении.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 mb-3">Информация</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('legal.terms') }}" class="text-gray-600 hover:text-gray-900">Условия использования</a></li>
                            <li><a href="{{ route('legal.privacy') }}" class="text-gray-600 hover:text-gray-900">Политика конфиденциальности</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-900 mb-3">Важно</h3>
                        <p class="text-xs text-gray-600">
                            Материалы носят информационный характер и предназначены для самостоятельного использования.
                        </p>
                    </div>
                </div>
                <div class="mt-8 pt-8 border-t border-gray-200 text-center text-sm text-gray-500">
                    &copy; {{ date('Y') }} SloDocs. Все права защищены.
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
