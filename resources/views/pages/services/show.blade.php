@extends('layouts.app')

@section('title', $service->seo_title ?? $service->title)
@section('meta_description', $service->seo_description ?? $service->description_public)

@section('content')
    <x-blocks.breadcrumbs
        :items="[
            ['label' => 'Главная', 'url' => route('home')],
            ['label' => $service->title],
        ]"
    />

    <x-banners.second title="{{ $service->title }}" description="" />

    @if($service->intro_text)
        <section class="container-grid my-7.5 md:my-15">
            <div class="content">
                <div class="wysiwyg text-base">
                    {!! $service->intro_text !!}
                </div>
            </div>
        </section>
    @endif

    @if($hasAccess)
        {{-- TEMPORARY: Access granted - show button to view content --}}
        <section class="container-grid my-7.5 md:my-15">
            <div class="content">
                <div class="gradient-tip-success rounded-2xl p-6 md:p-8 border-2 border-emerald-200 shadow-sm">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                        <div class="flex items-center gap-4">
                            <div class="flex-shrink-0">
                                <div class="w-14 h-14 bg-emerald-500 rounded-full flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-1">Доступ открыт</h3>
                                <p class="text-gray-700">
                                    Вы можете перейти к материалам
                                </p>
                            </div>
                        </div>
                        <div class="flex-shrink-0 flex flex-col sm:flex-row gap-3 items-center">
                            {{-- TEMPORARY: Close access button for testing --}}
                            <form action="{{ route('services.revoke-temp-access', $service->slug) }}" method="POST">
                                @csrf
                                <button
                                    type="submit"
                                    class="text-sm text-gray-600 hover:text-red-600 transition-colors flex items-center gap-2 whitespace-nowrap"
                                >
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                    Закрыть доступ (тест)
                                </button>
                            </form>
                            <x-elements.button.index
                                href="{{ route('services.content', $service->slug) }}"
                                arrow="right"
                                class="w-full sm:w-auto"
                            >
                                Перейти к материалам
                            </x-elements.button.index>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        {{-- TEMPORARY: Show "Get Access" button for frontend testing --}}
        <section class="container-grid my-7.5 md:my-15">
            <div class="content">
                <div class="gradient-brand-lightest rounded-2xl p-6 md:p-8 border-2 border-amber-200 shadow-lg">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="flex-grow">
                            <div class="inline-flex items-center px-3 py-1 bg-amber-200 text-amber-900 text-xs font-bold uppercase tracking-wide rounded-full mb-3">
                                Получите доступ к материалам
                            </div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-2">Полная инструкция и документы</h3>
                            <p class="text-gray-700">
                                Пошаговое руководство, образцы документов и практические советы
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            <form action="{{ route('services.grant-temp-access', $service->slug) }}" method="POST">
                                @csrf
                                <x-elements.button.index
                                    submit="true"
                                    arrow="right"
                                    class="w-full lg:w-auto"
                                >
                                    Получить
                                </x-elements.button.index>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <x-blocks.materials-included :service="$service" />

    <x-blocks.warning />

@endsection
