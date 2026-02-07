@extends('layouts.app')

@section('title', 'Внутренняя ошибка сервера — SloDocs')
@section('meta_description', 'Произошла внутренняя ошибка сервера. Мы уже работаем над решением проблемы.')

@section('content')
<div class="relative min-h-[calc(100vh-200px)] flex items-center justify-center overflow-hidden px-4 py-16">

    {{-- Floating decorative elements --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-20 left-[10%] w-32 h-32 gradient-blur-amber-light rounded-full blur-3xl animate-float-slow"></div>
        <div class="absolute bottom-32 right-[15%] w-40 h-40 gradient-blur-orange-light rounded-full blur-3xl animate-float-slower"></div>
        <div class="absolute top-1/3 right-[8%] w-24 h-24 gradient-blur-amber-subtle rounded-full blur-2xl animate-float"></div>
    </div>

    <div class="relative max-w-4xl mx-auto text-center z-10">

        {{-- 500 number --}}
        <div class="mb-12 relative">
            <div class="inline-flex items-center justify-center gap-3 relative">
                {{-- Main 500 with orange gradient --}}
                <div style="font-size: 120px;" class="font-bold leading-none tracking-tight gradient-brand-primary bg-clip-text text-transparent select-none">
                    500
                </div>
            </div>
        </div>

        {{-- Message --}}
        <div class="mb-10 space-y-4 animate-fade-in-up">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                Внутренняя ошибка сервера
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Извините, что-то пошло не так. Мы уже получили уведомление и работаем над решением проблемы.
            </p>
        </div>

        {{-- Actions --}}
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center animate-fade-in-up" style="animation-delay: 0.1s;">
            <x-elements.button.index href="{{ route('home') }}" arrow="left">
                На главную
            </x-elements.button.index>

            <x-elements.button.index variant="secondary" href="javascript:window.location.reload()">
                Обновить страницу
            </x-elements.button.index>
        </div>

    </div>
</div>

@endsection
