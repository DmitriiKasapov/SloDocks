@extends('layouts.app')

@section('title', 'Сервис временно недоступен — SloDocs')
@section('meta_description', 'Мы проводим технические работы. Скоро вернемся!')

@section('content')
<div class="relative min-h-[calc(100vh-200px)] flex items-center justify-center overflow-hidden px-4 py-16">

    {{-- Floating decorative elements --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-20 left-[10%] w-32 h-32 gradient-blur-amber-light rounded-full blur-3xl animate-float-slow"></div>
        <div class="absolute bottom-32 right-[15%] w-40 h-40 gradient-blur-orange-light rounded-full blur-3xl animate-float-slower"></div>
        <div class="absolute top-1/3 right-[8%] w-24 h-24 gradient-blur-amber-subtle rounded-full blur-2xl animate-float"></div>
    </div>

    <div class="relative max-w-4xl mx-auto text-center z-10">

        {{-- 503 number --}}
        <div class="mb-12 relative">
            <div class="inline-flex items-center justify-center gap-3 relative">
                {{-- Main 503 with orange gradient --}}
                <div style="font-size: 120px;" class="font-bold leading-none tracking-tight gradient-brand-primary bg-clip-text text-transparent select-none">
                    503
                </div>
            </div>
        </div>

        {{-- Message --}}
        <div class="mb-10 space-y-4 animate-fade-in-up">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                Технические работы
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Мы проводим плановое обслуживание сервиса. Скоро всё заработает!
            </p>
        </div>

        {{-- Info box --}}
        <div class="inline-block bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg px-8 py-6 animate-fade-in-up" style="animation-delay: 0.1s;">
            <div class="flex items-center justify-center gap-3 text-gray-700">
                <svg class="w-6 h-6 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="font-semibold">
                    Обычно это занимает несколько минут
                </p>
            </div>
        </div>

    </div>
</div>

@endsection
