@extends('layouts.app')

@section('title', $service->seo_title ?? $service->title)
@section('meta_description', $service->seo_description ?? $service->description_public)

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Breadcrumb -->
    <nav class="mb-8">
        <ol class="flex items-center space-x-2 text-sm text-gray-600">
            <li><a href="{{ route('home') }}" class="hover:text-gray-900">Главная</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-gray-900">{{ $service->title }}</li>
        </ol>
    </nav>

    <!-- Service Header -->
    <div class="mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
            {{ $service->title }}
        </h1>
        <p class="text-xl text-gray-600 leading-relaxed">
            {{ $service->description_public }}
        </p>
    </div>

    @if($hasAccess)
        <!-- Access Granted Banner -->
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-2xl p-8 mb-12 border-2 border-green-200">
            <div class="flex items-center gap-4">
                <svg class="w-12 h-12 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-1">У вас есть доступ</h3>
                    <p class="text-gray-600">
                        Доступ действителен до {{ $access->expires_at->format('d.m.Y H:i') }}
                    </p>
                </div>
            </div>
        </div>
    @elseif($accessError)
        <!-- Access Error Banner -->
        <div class="bg-red-50 border-l-4 border-red-400 p-6 mb-12">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <p class="text-red-800 font-medium">{{ $accessError }}</p>
            </div>
        </div>
    @else
        <!-- Price & CTA Section -->
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 rounded-2xl p-8 mb-12">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <div class="text-sm font-semibold text-blue-600 uppercase tracking-wide mb-2">
                        Платный доступ
                    </div>
                    <div class="flex items-baseline gap-2 mb-2">
                        <span class="text-5xl font-bold text-gray-900">
                            €{{ number_format($service->price / 100, 2) }}
                        </span>
                        <span class="text-gray-600">/ {{ $service->access_duration_days }} дней</span>
                    </div>
                    <p class="text-sm text-gray-600">
                        Мгновенный доступ после оплаты
                    </p>
                </div>
                <div>
                    <button
                        onclick="document.getElementById('paymentModal').classList.remove('hidden')"
                        class="w-full md:w-auto px-8 py-4 bg-gray-900 text-white text-lg font-semibold rounded-lg hover:bg-gray-800 transition-colors duration-200 shadow-lg hover:shadow-xl">
                        Получить доступ
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- What's Included -->
    <div class="mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Что входит в материалы</h2>
        <div class="grid md:grid-cols-2 gap-6">
            <div class="flex items-start">
                <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Пошаговая инструкция</h3>
                    <p class="text-gray-600 text-sm">Детальное руководство по каждому этапу процесса</p>
                </div>
            </div>
            <div class="flex items-start">
                <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Список необходимых документов</h3>
                    <p class="text-gray-600 text-sm">Полный перечень документов с объяснениями</p>
                </div>
            </div>
            <div class="flex items-start">
                <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Заполненные образцы</h3>
                    <p class="text-gray-600 text-sm">Примеры правильно заполненных заявлений</p>
                </div>
            </div>
            <div class="flex items-start">
                <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Практические советы</h3>
                    <p class="text-gray-600 text-sm">Рекомендации на основе реального опыта</p>
                </div>
            </div>
        </div>
    </div>

    @if($hasAccess)
        <!-- PAID CONTENT SECTION -->
        <div class="bg-white border-2 border-gray-200 rounded-2xl p-8 mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-8">Пошаговая инструкция</h2>

            <div class="prose prose-lg max-w-none">
                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Шаг 1: Подготовка документов</h3>
                <p class="text-gray-700 mb-4">
                    Перед началом процесса оформления ребёнка в школу необходимо подготовить следующие документы:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-gray-700 mb-6">
                    <li>Свидетельство о рождении ребёнка (оригинал и нотариально заверенный перевод на словенский язык)</li>
                    <li>Справка о прививках (заверенная печатью врача)</li>
                    <li>Документ, подтверждающий место проживания (договор аренды или подтверждение от собственника)</li>
                    <li>Паспорта родителей (копии страниц с фото и регистрацией)</li>
                    <li>Разрешение на временное проживание (если применимо)</li>
                </ul>

                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Шаг 2: Определение школьного округа</h3>
                <p class="text-gray-700 mb-4">
                    В Словении дети посещают школу по месту фактического проживания. Чтобы узнать, к какой школе относится ваш адрес:
                </p>
                <ol class="list-decimal pl-6 space-y-2 text-gray-700 mb-6">
                    <li>Зайдите на сайт муниципалитета вашего города</li>
                    <li>Найдите раздел "Osnovna šola" (Начальная школа)</li>
                    <li>Введите ваш адрес в поиск школьного округа</li>
                    <li>Запишите название и контакты школы</li>
                </ol>

                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Шаг 3: Запись в школу</h3>
                <p class="text-gray-700 mb-4">
                    После определения школы необходимо записать ребёнка:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-gray-700 mb-6">
                    <li>Свяжитесь со школой по телефону или email (контакты на сайте школы)</li>
                    <li>Договоритесь о встрече с директором или секретарём</li>
                    <li>Принесите все подготовленные документы на встречу</li>
                    <li>Заполните заявление о приёме (вам дадут бланк в школе)</li>
                </ul>

                <div class="bg-blue-50 border-l-4 border-blue-400 p-6 my-8">
                    <h4 class="font-semibold text-blue-900 mb-2">💡 Полезный совет</h4>
                    <p class="text-blue-800 text-sm">
                        Если ваш ребёнок не говорит по-словенски, школа обязана предоставить дополнительные уроки словенского языка
                        бесплатно (обычно 2-3 раза в неделю). Обязательно уточните это при записи.
                    </p>
                </div>

                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Шаг 4: Медицинский осмотр</h3>
                <p class="text-gray-700 mb-4">
                    После зачисления в школу необходимо пройти медицинский осмотр в местном медицинском центре (zdravstveni dom):
                </p>
                <ul class="list-disc pl-6 space-y-2 text-gray-700 mb-6">
                    <li>Запишитесь на приём к школьному врачу (šolski zdravnik)</li>
                    <li>Принесите справку о прививках</li>
                    <li>Врач выдаст справку о допуске к занятиям</li>
                </ul>

                <h3 class="text-2xl font-semibold text-gray-900 mb-4">Шаг 5: Начало учебы</h3>
                <p class="text-gray-700 mb-6">
                    За несколько дней до начала занятий школа проведёт встречу с родителями, где расскажут:
                </p>
                <ul class="list-disc pl-6 space-y-2 text-gray-700 mb-6">
                    <li>Расписание уроков и распорядок дня</li>
                    <li>Требования к школьным принадлежностям</li>
                    <li>Контакты классного руководителя</li>
                    <li>Информацию о питании и продлёнке (podaljšano bivanje)</li>
                </ul>
            </div>
        </div>

        <div class="bg-green-50 border-l-4 border-green-400 p-6 mb-12">
            <div class="flex">
                <svg class="w-6 h-6 text-green-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <h3 class="font-semibold text-green-900 mb-2">Нужна помощь?</h3>
                    <p class="text-sm text-green-800">
                        Если у вас возникли сложности с каким-либо из шагов, обратитесь в школу напрямую —
                        словенские школы обычно очень доброжелательны к иностранным семьям и помогут во всём разобраться.
                    </p>
                </div>
            </div>
        </div>
    @else
        <!-- Important Info (shown to non-paid users) -->
        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-6 mb-12">
            <div class="flex">
                <svg class="w-6 h-6 text-yellow-600 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <h3 class="font-semibold text-yellow-900 mb-2">Важно знать</h3>
                    <ul class="text-sm text-yellow-800 space-y-1">
                        <li>• Материалы носят информационный характер</li>
                        <li>• Предназначены для самостоятельного использования</li>
                        <li>• Не включают персональные консультации</li>
                        <li>• Не являются юридическими услугами</li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
</div>

@if(!$hasAccess)
<!-- Payment Modal -->
<div id="paymentModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Оформление доступа</h3>
            <p class="text-sm text-gray-600 mb-4">
                Укажите email для получения доступа к материалам
            </p>

            <form action="{{ route('payment.create') }}" method="POST">
                @csrf
                <input type="hidden" name="service_id" value="{{ $service->id }}">

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                        Email
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="your@email.com">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="bg-gray-50 p-3 rounded-md mb-4">
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-gray-600">Стоимость:</span>
                        <span class="font-semibold text-gray-900">€{{ number_format($service->price / 100, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Доступ:</span>
                        <span class="font-semibold text-gray-900">{{ $service->access_duration_days }} дней</span>
                    </div>
                </div>

                <div class="flex gap-3">
                    <button
                        type="button"
                        onclick="document.getElementById('paymentModal').classList.add('hidden')"
                        class="flex-1 px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition-colors">
                        Отмена
                    </button>
                    <button
                        type="submit"
                        class="flex-1 px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-800 transition-colors">
                        Перейти к оплате
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
