@extends('layouts.app')

@section('title', 'SloDocs — Информация для иностранцев в Словении')
@section('meta_description', 'Инструкции и документы для самостоятельного оформления. Переезд, документы, жилье, работа, семья.')

@section('content')
    <!-- Hero Banner -->
    <x-banners
        title="Всё для жизни в Словении"
        highlight="на понятном языке"
        subtitle="Пошаговые инструкции и готовые документы для самостоятельного оформления"
        searchPlaceholder="Что вы ищете? Например: вид на жительство, школа, налоги..."
        :searchHint="'Найдите нужную инструкцию среди ' . $services->count() . ' материалов'"
    />

    <!-- Services by Category Section -->
    <section id="services" class="container-grid my-7.5 md:my-15">
        <div class="content">
            <div class="mb-12 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Доступные материалы
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Выберите тему и получите пошаговую инструкцию с готовыми документами
                </p>
            </div>

            @if($categories->count() > 0)
                <!-- Categories Grid: 2 columns on desktop, 1 on mobile -->
                <div class="grid md:grid-cols-2 gap-6">
                    @foreach($categories as $category)
                        <x-blocks.category-card
                            :title="$category->name"
                            :services="$category->services"
                            :icon="$category->icon ?? ''"
                        />
                    @endforeach
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-2xl shadow-sm">
                    <div class="text-gray-400 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-lg font-medium">Материалы скоро появятся</p>
                    <p class="text-gray-500 text-sm mt-2">Мы работаем над наполнением базы</p>
                </div>
            @endif
        </div>
    </section>

    <x-blocks.features />

    <x-blocks.seo-text />

    <x-blocks.warning />
@endsection
