@extends('layouts.app')

@section('title', 'Тест блока Warning — SloDocs')

@section('content')
<div class="container-grid py-16">
    <div class="content">
        <h1 class="text-4xl font-bold text-gray-900 mb-4 text-center">
            Варианты дизайна блока Warning
        </h1>
        <p class="text-lg text-gray-600 text-center mb-12 max-w-2xl mx-auto">
            Сравнение разных вариантов оформления предупреждающего блока
        </p>
    </div>
</div>

{{-- Вариант 1: Текущий (без фона) --}}
<section class="container-grid my-10 md:my-20">
    <div class="content">
        <div class="mb-4">
            <span class="px-3 py-1 bg-indigo-100 text-indigo-700 text-sm font-bold rounded-full">Вариант 1: Текущий (без фона)</span>
        </div>
        <div class="gradient-brand-light border-l-4 border-amber-400 rounded-xl p-5 md:p-8 shadow-sm">
            <div class="flex items-center gap-4 mb-4">
                <div class="shrink-0">
                    <div class="w-12 h-12 gradient-banner-primary rounded-full flex items-center justify-center">
                        <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
                <h3 class="text-xl font-bold text-amber-900">
                    Важное уведомление
                </h3>
            </div>
            <div class="text-amber-800 space-y-2">
                <p>
                    <strong>Материалы на сайте носят информационный характер</strong> и предназначены для самостоятельного использования.
                </p>
                <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                    <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                    <li>Информация предоставляется в ознакомительных целях и не заменяет консультацию специалиста</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Вариант 2: С белым фоном-карточкой --}}
<section class="container-grid my-10 md:my-20">
    <div class="content">
        <div class="mb-4">
            <span class="px-3 py-1 bg-emerald-100 text-emerald-700 text-sm font-bold rounded-full">Вариант 2: С белой карточкой</span>
        </div>
        <div class="bg-white rounded-2xl p-6 md:p-10 shadow-xl border border-gray-100">
            <div class="gradient-brand-light border-l-4 border-amber-400 rounded-xl p-5 md:p-8 shadow-sm">
                <div class="flex items-center gap-4 mb-4">
                    <div class="shrink-0">
                        <div class="w-12 h-12 gradient-banner-primary rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-amber-900">
                        Важное уведомление
                    </h3>
                </div>
                <div class="text-amber-800 space-y-2">
                    <p>
                        <strong>Материалы на сайте носят информационный характер</strong> и предназначены для самостоятельного использования.
                    </p>
                    <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                        <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                        <li>Информация предоставляется в ознакомительных целях и не заменяет консультацию специалиста</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Вариант 3: С градиентным фоном секции --}}
<section class="gradient-bg-blue-light my-10 md:my-20">
    <div class="container-grid py-10 md:py-15">
        <div class="content">
            <div class="mb-4">
                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-sm font-bold rounded-full">Вариант 3: С градиентным фоном секции</span>
            </div>
            <div class="gradient-brand-light border-l-4 border-amber-400 rounded-xl p-5 md:p-8 shadow-lg">
                <div class="flex items-center gap-4 mb-4">
                    <div class="shrink-0">
                        <div class="w-12 h-12 gradient-banner-primary rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-amber-900">
                        Важное уведомление
                    </h3>
                </div>
                <div class="text-amber-800 space-y-2">
                    <p>
                        <strong>Материалы на сайте носят информационный характер</strong> и предназначены для самостоятельного использования.
                    </p>
                    <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                        <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                        <li>Информация предоставляется в ознакомительных целях и не заменяет консультацию специалиста</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Вариант 4: С усиленной рамкой и розовым фоном --}}
<section class="bg-rose-50 py-10 md:py-15 my-10 md:my-20">
    <div class="container-grid">
        <div class="content">
            <div class="mb-4">
                <span class="px-3 py-1 bg-violet-100 text-violet-700 text-sm font-bold rounded-full">Вариант 4: С усиленной рамкой и розовым фоном</span>
            </div>
            <div class="gradient-brand-light border-2 border-amber-300 rounded-xl p-5 md:p-8 shadow-xl">
                <div class="flex items-center gap-4 mb-4">
                    <div class="shrink-0">
                        <div class="w-12 h-12 gradient-banner-primary rounded-full flex items-center justify-center shadow-md">
                            <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-amber-900">
                        Важное уведомление
                    </h3>
                </div>
                <div class="text-amber-800 space-y-2">
                    <p>
                        <strong>Материалы на сайте носят информационный характер</strong> и предназначены для самостоятельного использования.
                    </p>
                    <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                        <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                        <li>Информация предоставляется в ознакомительных целях и не заменяет консультацию специалиста</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Вариант 5: В белой карточке с декоративными элементами --}}
<section class="container-grid my-10 md:my-20">
    <div class="content">
        <div class="mb-4">
            <span class="px-3 py-1 bg-orange-100 text-orange-700 text-sm font-bold rounded-full">Вариант 5: С декоративными элементами</span>
        </div>
        <div class="relative bg-white rounded-2xl p-6 md:p-10 shadow-xl border border-amber-200 overflow-hidden">
            {{-- Decorative elements --}}
            <div class="absolute top-0 right-0 w-32 h-32 gradient-blur-amber-light opacity-30 blur-3xl rounded-full"></div>
            <div class="absolute bottom-0 left-0 w-24 h-24 gradient-blur-orange-light opacity-20 blur-3xl rounded-full"></div>

            <div class="relative gradient-brand-light border-l-4 border-amber-400 rounded-xl p-5 md:p-8 shadow-sm">
                <div class="flex items-center gap-4 mb-4">
                    <div class="shrink-0">
                        <div class="w-12 h-12 gradient-banner-primary rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-amber-900">
                        Важное уведомление
                    </h3>
                </div>
                <div class="text-amber-800 space-y-2">
                    <p>
                        <strong>Материалы на сайте носят информационный характер</strong> и предназначены для самостоятельного использования.
                    </p>
                    <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                        <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                        <li>Информация предоставляется в ознакомительных целях и не заменяет консультацию специалиста</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Вариант 6: Белый фон на весь экран --}}
<section class="bg-white py-10 md:py-15 my-10 md:my-20">
    <div class="container-grid">
        <div class="content">
            <div class="mb-4">
                <span class="px-3 py-1 bg-pink-100 text-pink-700 text-sm font-bold rounded-full">Вариант 6: Белый фон на весь экран</span>
            </div>
            <div class="gradient-brand-light border-l-4 border-amber-400 rounded-xl p-5 md:p-8 shadow-lg">
                <div class="flex items-center gap-4 mb-4">
                    <div class="shrink-0">
                        <div class="w-12 h-12 gradient-banner-primary rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-amber-900">
                        Важное уведомление
                    </h3>
                </div>
                <div class="text-amber-800 space-y-2">
                    <p>
                        <strong>Материалы на сайте носят информационный характер</strong> и предназначены для самостоятельного использования.
                    </p>
                    <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                        <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                        <li>Информация предоставляется в ознакомительных целях и не заменяет консультацию специалиста</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Вариант 7: Градиентный фон на весь экран (светлый) --}}
<section class="gradient-bg-emerald-light py-10 md:py-15 my-10 md:my-20">
    <div class="container-grid">
        <div class="content">
            <div class="mb-4">
                <span class="px-3 py-1 bg-emerald-100 text-emerald-700 text-sm font-bold rounded-full">Вариант 7: Градиентный фон на весь экран (изумрудный)</span>
            </div>
            <div class="gradient-brand-light border-l-4 border-amber-400 rounded-xl p-5 md:p-8 shadow-lg">
                <div class="flex items-center gap-4 mb-4">
                    <div class="shrink-0">
                        <div class="w-12 h-12 gradient-banner-primary rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-amber-900">
                        Важное уведомление
                    </h3>
                </div>
                <div class="text-amber-800 space-y-2">
                    <p>
                        <strong>Материалы на сайте носят информационный характер</strong> и предназначены для самостоятельного использования.
                    </p>
                    <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                        <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                        <li>Информация предоставляется в ознакомительных целях и не заменяет консультацию специалиста</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Вариант 8: Серый градиентный фон на весь экран --}}
<section class="gradient-bg-gray-light py-10 md:py-15 my-10 md:my-20">
    <div class="container-grid">
        <div class="content">
            <div class="mb-4">
                <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm font-bold rounded-full">Вариант 8: Серый градиентный фон на весь экран</span>
            </div>
            <div class="gradient-brand-light border-l-4 border-amber-400 rounded-xl p-5 md:p-8 shadow-lg">
                <div class="flex items-center gap-4 mb-4">
                    <div class="shrink-0">
                        <div class="w-12 h-12 gradient-banner-primary rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-amber-900">
                        Важное уведомление
                    </h3>
                </div>
                <div class="text-amber-800 space-y-2">
                    <p>
                        <strong>Материалы на сайте носят информационный характер</strong> и предназначены для самостоятельного использования.
                    </p>
                    <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                        <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                        <li>Информация предоставляется в ознакомительных целях и не заменяет консультацию специалиста</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Вариант 9: Фон с декоративными элементами на весь экран --}}
<section class="relative bg-white py-10 md:py-15 my-10 md:my-20 overflow-hidden">
    {{-- Full-width decorative elements --}}
    <div class="absolute top-0 right-0 w-96 h-96 gradient-blur-amber-light opacity-20 blur-3xl"></div>
    <div class="absolute bottom-0 left-0 w-80 h-80 gradient-blur-orange-light opacity-15 blur-3xl"></div>

    <div class="container-grid relative">
        <div class="content">
            <div class="mb-4">
                <span class="px-3 py-1 bg-amber-100 text-amber-700 text-sm font-bold rounded-full">Вариант 9: Белый фон с декоративными элементами на весь экран</span>
            </div>
            <div class="gradient-brand-light border-l-4 border-amber-400 rounded-xl p-5 md:p-8 shadow-xl">
                <div class="flex items-center gap-4 mb-4">
                    <div class="shrink-0">
                        <div class="w-12 h-12 gradient-banner-primary rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-amber-900">
                        Важное уведомление
                    </h3>
                </div>
                <div class="text-amber-800 space-y-2">
                    <p>
                        <strong>Материалы на сайте носят информационный характер</strong> и предназначены для самостоятельного использования.
                    </p>
                    <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                        <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                        <li>Информация предоставляется в ознакомительных целях и не заменяет консультацию специалиста</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Вариант 10: Брендовый светлый фон на весь экран --}}
<section class="gradient-brand-lightest py-10 md:py-15 my-10 md:my-20">
    <div class="container-grid">
        <div class="content">
            <div class="mb-4">
                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-sm font-bold rounded-full">Вариант 10: Брендовый светлый фон на весь экран</span>
            </div>
            <div class="gradient-brand-light border-l-4 border-amber-400 rounded-xl p-5 md:p-8 shadow-lg">
                <div class="flex items-center gap-4 mb-4">
                    <div class="shrink-0">
                        <div class="w-12 h-12 gradient-banner-primary rounded-full flex items-center justify-center">
                            <svg class="w-10 h-10 text-orange-400" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-amber-900">
                        Важное уведомление
                    </h3>
                </div>
                <div class="text-amber-800 space-y-2">
                    <p>
                        <strong>Материалы на сайте носят информационный характер</strong> и предназначены для самостоятельного использования.
                    </p>
                    <ul class="list-disc list-inside space-y-1 ml-2 mt-3">
                        <li>Мы не оказываем юридических услуг и персональных консультаций</li>
                        <li>Информация предоставляется в ознакомительных целях и не заменяет консультацию специалиста</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
