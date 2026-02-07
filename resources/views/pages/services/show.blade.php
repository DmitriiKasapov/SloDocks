@extends('layouts.app')

@section('title', $service->seo_title ?? $service->title)
@section('meta_description', $service->seo_description ?? $service->description_public)

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm">
            <li>
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-amber-600 transition-colors ">
                    Главная
                </a>
            </li>
            <li>
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            </li>
            <li class="text-gray-900 font-medium">{{ $service->title }}</li>
        </ol>
    </nav>

    <!-- Service Header -->
    <div class="gradient-header-purple rounded-3xl p-8 md:p-12 mb-8 text-white shadow-xl">
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
                    {{ $service->description_public }}
                </p>
            </div>
        </div>
    </div>

    @if($hasAccess)
        {{-- TEMPORARY: Access granted - show button to view content --}}
        <div class="gradient-tip-success rounded-2xl p-6 md:p-8 mb-8 border-2 border-emerald-200 shadow-sm">
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
    @else
        {{-- TEMPORARY: Show "Get Access" button for frontend testing --}}
        <div class="gradient-brand-lightest rounded-2xl p-6 md:p-8 mb-8 border-2 border-amber-200 shadow-lg">
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
    @endif

    <!-- What's Included -->
    <div class="mb-10">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Что входит в материалы</h2>
        <div class="grid sm:grid-cols-2 gap-4">
            <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex-shrink-0 w-10 h-10 gradient-icon-emerald rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Пошаговая инструкция</h3>
                    <p class="text-gray-600 text-sm">Детальное руководство по каждому этапу процесса</p>
                </div>
            </div>

            <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex-shrink-0 w-10 h-10 gradient-icon-blue rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Список документов</h3>
                    <p class="text-gray-600 text-sm">Полный перечень необходимых документов с пояснениями</p>
                </div>
            </div>

            <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex-shrink-0 w-10 h-10 gradient-icon-violet rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Заполненные образцы</h3>
                    <p class="text-gray-600 text-sm">Примеры правильно заполненных заявлений и форм</p>
                </div>
            </div>

            <div class="flex items-start gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                <div class="flex-shrink-0 w-10 h-10 gradient-icon-pink rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 mb-1">Практические советы</h3>
                    <p class="text-gray-600 text-sm">Рекомендации из реального опыта и важные нюансы</p>
                </div>
            </div>
        </div>
    </div>
</div>

<x-blocks.warning />

@endsection
