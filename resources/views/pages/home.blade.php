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

    <!-- Services Catalog Section -->
    <section id="services" class="container-grid my-10 md:my-20">
        <div class="content" x-data="{ category: '' }" x-on:change="if ($event.detail && $event.detail.name === 'category') category = $event.detail.value">
            <div class="mb-10 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Материалы и инструкции
                </h2>
            </div>

            @if($services->count() > 0)
                {{-- Category filter --}}
                @if(count($categoryOptions) > 1)
                    <div class="mb-8">
                        <x-elements.form-items.select
                            name="category"
                            :options="$categoryOptions"
                            buttonText="Все категории"
                            :deselect="true"
                            class="w-full sm:w-72"
                        />
                    </div>
                @endif

                {{-- Service cards grid --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($services as $service)
                        <x-cards.service
                            :service="$service"
                            x-show="!category || category == '{{ $service->category_id }}'"
                            x-transition.opacity.duration.200ms
                        />
                    @endforeach
                </div>

                {{-- Empty state when filter matches nothing --}}
                <div
                    class="text-center py-12"
                    x-show="category && !document.querySelector('[data-category=\'' + category + '\']')"
                    x-cloak
                >
                    <p class="text-gray-500 text-lg">В этой категории пока нет материалов</p>
                </div>
            @else
                <div class="text-center py-12 bg-white rounded-2xl shadow-sm">
                    <div class="text-gray-400 mb-4">
                        <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
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
