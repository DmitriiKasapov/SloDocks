@extends('layouts.app')

@section('title', $service->title . ' - Материалы')
@section('meta_description', 'Материалы к услуге: ' . $service->title)

@push('head')
    <!-- Prevent indexing of content pages -->
    <meta name="robots" content="noindex, nofollow">
@endpush

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm">
            <li>
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-amber-600 transition-colors">
                    Главная
                </a>
            </li>
            <li>
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            </li>
            <li>
                <a href="{{ route('services.show', $service->slug) }}" class="text-gray-600 hover:text-amber-600 transition-colors">
                    {{ $service->title }}
                </a>
            </li>
            <li>
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            </li>
            <li class="text-gray-900 font-medium">Материалы</li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="bg-gradient-to-br from-indigo-500 via-purple-500 to-violet-600 rounded-3xl p-8 md:p-12 mb-8 text-white shadow-xl">
        <div class="flex items-start gap-6">
            <div class="flex-shrink-0">
                <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
            </div>
            <div class="flex-grow">
                <h1 class="text-3xl md:text-4xl font-bold mb-4 leading-tight">
                    {{ $service->title }}
                </h1>
                <p class="text-lg md:text-xl text-indigo-100 leading-relaxed">
                    Полные материалы и инструкции
                </p>
            </div>
        </div>
    </div>

    {{-- TEMPORARY: Revoke access button for frontend testing --}}
    <div class="mb-8">
        <form action="{{ route('services.revoke-temp-access', $service->slug) }}" method="POST" class="inline-block">
            @csrf
            <button
                type="submit"
                class="text-sm text-gray-600 hover:text-red-600 transition-colors flex items-center gap-2"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Отказаться от доступа (тест)
            </button>
        </form>
    </div>

    <!-- PAID CONTENT SECTION -->
    <div class="bg-white border-2 border-indigo-100 rounded-2xl p-8 mb-10 shadow-lg">
        <div class="flex items-center gap-3 mb-8 pb-6 border-b-2 border-indigo-100">
            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-900">Пошаговая инструкция</h2>
        </div>

        <div class="prose prose-lg max-w-none">
            <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                <span class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-amber-400 to-orange-500 text-white rounded-lg flex items-center justify-center font-bold">1</span>
                Подготовка документов
            </h3>
            <p class="text-gray-700 mb-4 leading-relaxed">
                Перед началом процесса оформления ребёнка в школу необходимо подготовить следующие документы:
            </p>
            <ul class="space-y-3 text-gray-700 mb-8">
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Свидетельство о рождении ребёнка (оригинал и нотариально заверенный перевод на словенский язык)</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Справка о прививках (заверенная печатью врача)</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Документ, подтверждающий место проживания (договор аренды или подтверждение от собственника)</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Паспорта родителей (копии страниц с фото и регистрацией)</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Разрешение на временное проживание (если применимо)</span>
                </li>
            </ul>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3 mt-10">
                <span class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-amber-400 to-orange-500 text-white rounded-lg flex items-center justify-center font-bold">2</span>
                Определение школьного округа
            </h3>
            <p class="text-gray-700 mb-4 leading-relaxed">
                В Словении дети посещают школу по месту фактического проживания. Чтобы узнать, к какой школе относится ваш адрес:
            </p>
            <ol class="space-y-3 text-gray-700 mb-8 list-decimal list-inside">
                <li>Зайдите на сайт муниципалитета вашего города</li>
                <li>Найдите раздел "Osnovna šola" (Начальная школа)</li>
                <li>Введите ваш адрес в поиск школьного округа</li>
                <li>Запишите название и контакты школы</li>
            </ol>

            <div class="bg-gradient-to-r from-blue-50 to-cyan-50 border-l-4 border-blue-400 rounded-lg p-6 my-8">
                <div class="flex items-start gap-3">
                    <div class="text-2xl">💡</div>
                    <div>
                        <h4 class="font-bold text-blue-900 mb-2">Полезный совет</h4>
                        <p class="text-blue-800 text-sm leading-relaxed">
                            Если ваш ребёнок не говорит по-словенски, школа обязана предоставить дополнительные уроки словенского языка
                            бесплатно (обычно 2-3 раза в неделю). Обязательно уточните это при записи.
                        </p>
                    </div>
                </div>
            </div>

            <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3 mt-10">
                <span class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-amber-400 to-orange-500 text-white rounded-lg flex items-center justify-center font-bold">3</span>
                Запись в школу
            </h3>
            <p class="text-gray-700 mb-4 leading-relaxed">
                После определения школы необходимо записать ребёнка:
            </p>
            <ul class="space-y-3 text-gray-700 mb-8">
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Свяжитесь со школой по телефону или email (контакты на сайте школы)</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Договоритесь о встрече с директором или секретарём</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Принесите все подготовленные документы на встречу</span>
                </li>
                <li class="flex items-start gap-2">
                    <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>Заполните заявление о приёме (вам дадут бланк в школе)</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="bg-gradient-to-r from-emerald-50 to-teal-50 border-l-4 border-emerald-500 rounded-xl p-6 mb-10 shadow-sm">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <div class="w-10 h-10 bg-emerald-500 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <div>
                <h3 class="font-bold text-emerald-900 mb-2 text-lg">Нужна помощь?</h3>
                <p class="text-emerald-800 leading-relaxed">
                    Если у вас возникли сложности с каким-либо из шагов, обратитесь в школу напрямую —
                    словенские школы обычно очень доброжелательны к иностранным семьям и помогут во всём разобраться.
                </p>
            </div>
        </div>
    </div>

    <!-- Back to Service Page -->
    <div class="text-center">
        <a
            href="{{ route('services.show', $service->slug) }}"
            class="inline-flex items-center gap-2 text-gray-600 hover:text-indigo-600 transition-colors"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Вернуться к описанию услуги
        </a>
    </div>
</div>
@endsection
