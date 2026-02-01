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

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white/80 backdrop-blur-md border-b border-indigo-100 sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center space-x-2">
                            <div class="w-8 h-8 bg-gradient-to-br from-amber-400 to-orange-500 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-sm">SD</span>
                            </div>
                            <span class="text-xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                                SloDocs
                            </span>
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex items-center space-x-1">
                        <a href="{{ route('home') }}" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                            Услуги
                        </a>
                        <a href="#help" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                            Помощь
                        </a>
                        <a href="#contact" class="px-4 py-2 text-sm font-medium text-gray-600 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-colors">
                            Контакты
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="flex-grow">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-br from-gray-900 to-gray-800 text-gray-300 mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <!-- Brand -->
                    <div class="md:col-span-1">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-8 h-8 bg-gradient-to-br from-amber-400 to-orange-500 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-sm">SD</span>
                            </div>
                            <span class="text-xl font-bold text-white">SloDocs</span>
                        </div>
                        <p class="text-sm text-gray-400 leading-relaxed">
                            Информационный портал для русскоговорящих иностранцев в Словении
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-4">Навигация</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-amber-400 transition-colors">Главная</a></li>
                            <li><a href="{{ route('home') }}#services" class="text-gray-400 hover:text-amber-400 transition-colors">Услуги</a></li>
                            <li><a href="#help" class="text-gray-400 hover:text-amber-400 transition-colors">Помощь</a></li>
                        </ul>
                    </div>

                    <!-- Legal -->
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-4">Документы</h3>
                        <ul class="space-y-2 text-sm">
                            <li><a href="{{ route('legal.terms') }}" class="text-gray-400 hover:text-amber-400 transition-colors">Условия использования</a></li>
                            <li><a href="{{ route('legal.privacy') }}" class="text-gray-400 hover:text-amber-400 transition-colors">Политика конфиденциальности</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h3 class="text-sm font-semibold text-white mb-4">Контакты</h3>
                        <ul class="space-y-2 text-sm text-gray-400">
                            <li>Email: info@slodocs.si</li>
                            <li>Словения, Любляна</li>
                        </ul>
                    </div>
                </div>

                <!-- Bottom Bar -->
                <div class="pt-8 border-t border-gray-700">
                    <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                        <p class="text-sm text-gray-400">
                            &copy; {{ date('Y') }} SloDocs. Все права защищены.
                        </p>
                        <p class="text-xs text-gray-500 max-w-md text-center md:text-right">
                            ⚠️ Материалы носят информационный характер и не являются юридическими услугами
                        </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
