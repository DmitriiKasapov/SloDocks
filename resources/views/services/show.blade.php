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

    <!-- Important Info -->
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
</div>

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
@endsection
