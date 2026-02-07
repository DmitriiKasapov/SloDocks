@extends('layouts.app')

@section('title', 'Страница не найдена — SloDocs')
@section('meta_description', 'Запрашиваемая страница не найдена. Вернитесь на главную или воспользуйтесь поиском.')

@section('content')
<div class="relative min-h-[calc(100vh-200px)] flex items-center justify-center overflow-hidden px-4 py-16">

    {{-- Floating decorative elements --}}
    <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-20 left-[10%] w-32 h-32 bg-gradient-to-br from-amber-200/40 to-orange-300/40 rounded-full blur-3xl animate-float-slow"></div>
        <div class="absolute bottom-32 right-[15%] w-40 h-40 bg-gradient-to-br from-orange-200/30 to-amber-300/30 rounded-full blur-3xl animate-float-slower"></div>
        <div class="absolute top-1/3 right-[8%] w-24 h-24 bg-gradient-to-br from-amber-300/25 to-orange-200/25 rounded-full blur-2xl animate-float"></div>
    </div>

    <div class="relative max-w-4xl mx-auto text-center z-10">

        {{-- 404 number --}}
        <div class="mb-12 relative">
            <div class="inline-flex items-center justify-center gap-3 relative">
                {{-- Main 404 with orange gradient --}}
                <div style="font-size: 120px;" class="font-bold leading-none tracking-tight bg-gradient-to-r from-amber-500 to-orange-600 bg-clip-text text-transparent select-none">
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
            <x-elements.button.index href="{{ route('home') }}" arrow="left">
                На главную
            </x-elements.button.index>
        </div>

    </div>
</div>

{{-- Custom animations --}}
<style>
    @keyframes float {
        0%, 100% {
            transform: translateY(0px) translateX(0px);
        }
        33% {
            transform: translateY(-20px) translateX(10px);
        }
        66% {
            transform: translateY(10px) translateX(-10px);
        }
    }

    @keyframes float-slow {
        0%, 100% {
            transform: translateY(0px) translateX(0px) scale(1);
        }
        50% {
            transform: translateY(-30px) translateX(20px) scale(1.1);
        }
    }

    @keyframes float-slower {
        0%, 100% {
            transform: translateY(0px) translateX(0px) rotate(0deg);
        }
        50% {
            transform: translateY(20px) translateX(-15px) rotate(5deg);
        }
    }

    @keyframes gradient-shift {
        0%, 100% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
    }

    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-float {
        animation: float 8s ease-in-out infinite;
    }

    .animate-float-slow {
        animation: float-slow 12s ease-in-out infinite;
    }

    .animate-float-slower {
        animation: float-slower 15s ease-in-out infinite;
    }

    .animate-gradient-shift {
        background-size: 200% 200%;
        animation: gradient-shift 6s ease infinite;
    }

    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }
</style>
@endsection
