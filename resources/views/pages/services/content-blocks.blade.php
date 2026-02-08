@extends('layouts.app')

@section('title', $service->title . ' - Материалы')
@section('meta_description', 'Материалы к услуге: ' . $service->title)

@push('head')
    <!-- Prevent indexing of content pages -->
    <meta name="robots" content="noindex, nofollow">
@endpush

@section('content')
<x-blocks.breadcrumbs :items="[
    ['label' => 'Главная', 'url' => route('home')],
    ['label' => $service->title, 'url' => route('services.show', $service->slug)],
    ['label' => 'Материалы'],
]" class="mt-6 mb-2" />

<x-banners.second title="{{ $service->title }}" description="Материалы и инструкции" />

<!-- Access Timer -->
@isset($access)
    <x-access-timer :access="$access" />
@endisset

{{-- TEMPORARY: Revoke access button for testing --}}
@if(app()->isLocal())
<section class="container-grid">
    <div class="content">
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
</section>
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
    <section class="container-grid my-7.5 md:my-15">
        <div class="content">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Идём по шагам</h2>
            <div class="flex flex-wrap gap-3">
                @foreach($allSteps as $step)
                    <a href="#step-{{ $step['number'] }}" class="w-full sm:w-auto inline-flex items-center gap-2 px-4 py-2.5 bg-white rounded-full shadow-sm border border-gray-200 hover:shadow-md hover:border-indigo-400 hover:bg-indigo-50 transition-all cursor-pointer group">
                        <span class="flex-shrink-0 w-6 h-6 gradient-icon-indigo rounded-full flex items-center justify-center text-white text-sm font-bold group-hover:scale-110 transition-transform">
                            {{ $step['number'] }}
                        </span>
                        <span class="text-gray-700 text-sm font-medium group-hover:text-indigo-700 transition-colors">
                            {{ $step['title'] }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
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
        <section class="container-grid">
            <div class="content">
                <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                    <p class="text-yellow-800">
                        Unknown block type: <strong>{{ $block->type }}</strong>
                    </p>
                </div>
            </div>
        </section>
    @endif
@endforeach

<!-- Back to Service -->
<section class="container-grid my-7.5 md:my-15 text-center">
    <div class="content">
        <x-elements.button.index
            href="{{ route('services.show', $service->slug) }}"
            variant="secondary"
            arrow="left"
        >
            Вернуться к описанию услуги
        </x-elements.button.index>
    </div>
</section>

<x-blocks.warning />

@endsection
