@extends('layouts.app')

@section('title', $service->title . ' - Материалы')
@section('meta_description', 'Материалы к услуге: ' . $service->title)

@push('head')
    <!-- Prevent indexing of content pages -->
    <meta name="robots" content="noindex, nofollow">
@endpush

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm">
            <li>
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-amber-600 transition-colors">
                    Главная
                </a>
            </li>
            <li>
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            </li>
            <li>
                <a href="{{ route('services.show', $service->slug) }}" class="text-gray-600 hover:text-amber-600 transition-colors">
                    {{ $service->title }}
                </a>
            </li>
            <li>
                <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                </svg>
            </li>
            <li class="text-gray-900 font-medium">Материалы</li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="bg-gradient-to-br from-indigo-500 via-purple-500 to-violet-600 rounded-3xl p-8 md:p-12 mb-8 text-white shadow-xl">
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
                    Mатериалы и инструкции
                </p>
            </div>
        </div>
    </div>

    <!-- Access Timer -->
    @isset($access)
        <x-access-timer :access="$access" />
    @endisset

    {{-- TEMPORARY: Revoke access button for testing --}}
    @if(app()->isLocal())
    <div class="mb-8">
        <form action="{{ route('services.revoke-temp-access', $service->slug) }}" method="POST" class="inline-block">
            @csrf
            <button
                type="submit"
                class="text-sm text-gray-600 hover:text-red-600 transition-colors flex items-center gap-2"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                Отказаться от доступа (тест)
            </button>
        </form>
    </div>
    @endif

    <!-- Content Blocks -->
    @php
        // Collect all steps blocks for auto-generated process overview
        $stepsBlocks = $service->contentBlocks->filter(function($block) {
            return $block->type === 'steps';
        });

        // Flatten all steps from all steps blocks
        $allSteps = $stepsBlocks->flatMap(function($block) {
            return $block->content['steps'] ?? [];
        })->sortBy('number')->values();
    @endphp

    {{-- Auto-generated Process Overview (if there are any steps blocks) --}}
    @if($allSteps->isNotEmpty())
        <div class="mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Идём по шагам</h2>
            <div class="flex flex-wrap gap-3">
                @foreach($allSteps as $step)
                    <a href="#step-{{ $step['number'] }}" class="w-full sm:w-auto inline-flex items-center gap-2 px-4 py-2.5 bg-white rounded-full shadow-sm border border-gray-200 hover:shadow-md hover:border-indigo-400 hover:bg-indigo-50 transition-all cursor-pointer group">
                        <span class="flex-shrink-0 w-6 h-6 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-full flex items-center justify-center text-white text-sm font-bold group-hover:scale-110 transition-transform">
                            {{ $step['number'] }}
                        </span>
                        <span class="text-gray-700 text-sm font-medium group-hover:text-indigo-700 transition-colors">
                            {{ $step['title'] }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Render all content blocks --}}
    @foreach($service->contentBlocks as $block)
        {{-- Skip deprecated blocks (auto-generated or removed from admin) --}}
        @if(in_array($block->type, ['process_overview', 'intro']))
            @continue
        @endif

        @php
            $componentName = 'material-blocks.' . str_replace('_', '-', $block->type);
        @endphp

        @if(view()->exists("components.{$componentName}"))
            <x-dynamic-component :component="$componentName" :content="$block->content" />
        @else
            <!-- Fallback for unknown block types -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-8">
                <p class="text-yellow-800">
                    Unknown block type: <strong>{{ $block->type }}</strong>
                </p>
            </div>
        @endif
    @endforeach

    <!-- Back to Service -->
    <div class="text-center mt-12">
        <a
            href="{{ route('services.show', $service->slug) }}"
            class="inline-flex items-center gap-2 text-gray-600 hover:text-indigo-600 transition-colors"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Вернуться к описанию услуги
        </a>
    </div>
</div>
@endsection
