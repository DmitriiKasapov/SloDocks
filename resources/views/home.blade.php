@extends('layouts.app')

@section('title', 'Главная')
@section('meta_description', 'Информационный портал для русскоговорящих иностранцев в Словении. Инструкции и документы для самостоятельного оформления.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Hero Section -->
    <div class="text-center mb-16">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
            Информация для иностранцев в Словении
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto">
            Структурированные инструкции, образцы документов и практические советы для самостоятельного оформления услуг.
        </p>
    </div>

    <!-- Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($services as $service)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-3">
                        {{ $service->title }}
                    </h2>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ $service->description_public }}
                    </p>
                    <div class="flex items-center justify-between">
                        <span class="text-2xl font-bold text-gray-900">
                            €{{ number_format($service->price / 100, 2) }}
                        </span>
                        <a href="{{ route('services.show', $service->slug) }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-800 transition-colors duration-200">
                            Подробнее
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="bg-gray-50 px-6 py-3 text-sm text-gray-600">
                    Доступ на {{ $service->access_duration_days }} дней
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-600 text-lg">Услуги скоро появятся</p>
            </div>
        @endforelse
    </div>

    <!-- Info Section -->
    <div class="mt-16 bg-blue-50 rounded-lg p-8">
        <div class="max-w-3xl mx-auto">
            <h3 class="text-2xl font-semibold text-gray-900 mb-4 text-center">
                Что вы получаете
            </h3>
            <div class="grid md:grid-cols-2 gap-6 mt-8">
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Пошаговые инструкции</h4>
                        <p class="text-gray-600 text-sm">Детальное руководство по каждому этапу</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Образцы документов</h4>
                        <p class="text-gray-600 text-sm">Заполненные примеры и бланки</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Практические советы</h4>
                        <p class="text-gray-600 text-sm">Рекомендации из реального опыта</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <svg class="w-6 h-6 text-blue-600 mr-3 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <h4 class="font-semibold text-gray-900 mb-1">Мгновенный доступ</h4>
                        <p class="text-gray-600 text-sm">Доступ сразу после оплаты</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
