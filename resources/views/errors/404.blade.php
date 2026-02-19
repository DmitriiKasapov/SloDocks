@extends('layouts.app')

@section('title', 'Страница не найдена — SloDocs')
@section('meta_description', 'Запрашиваемая страница не найдена. Вернитесь на главную или воспользуйтесь поиском.')

@section('content')
<div class="relative min-h-[calc(100vh-200px)] flex items-center justify-center overflow-hidden px-4 py-16">

    {{-- Floating decorative elements --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-20 left-[10%] w-32 h-32 gradient-blur-amber-light rounded-full blur-3xl animate-float-slow"></div>
        <div class="absolute bottom-32 right-[15%] w-40 h-40 gradient-blur-orange-light rounded-full blur-3xl animate-float-slower"></div>
        <div class="absolute top-1/3 right-[8%] w-24 h-24 gradient-blur-amber-subtle rounded-full blur-2xl animate-float"></div>
    </div>

    <div class="relative max-w-4xl mx-auto text-center z-10">

        {{-- 404 number --}}
        <div class="mb-12 relative">
            <div class="inline-flex items-center justify-center gap-3 relative">
                {{-- Main 404 with orange gradient --}}
                <div style="font-size: 120px;" class="font-bold leading-none tracking-tight gradient-brand-primary bg-clip-text text-transparent select-none">
                    404
                </div>
            </div>
        </div>

        {{-- Message --}}
        <div class="mb-10 space-y-4 animate-fade-in-up">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900">
                Страница не найдена
            </h1>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                К сожалению, страница, которую вы ищете, не существует или была перемещена.
            </p>
        </div>

        {{-- Actions --}}
        <div class="flex justify-center animate-fade-in-up" style="animation-delay: 0.1s;">
            <x-elements.button.index href="{{ route('home') }}">
                На главную
            </x-elements.button.index>
        </div>

    </div>
</div>

@endsection
