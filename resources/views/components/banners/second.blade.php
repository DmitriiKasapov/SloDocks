{{--
  banners__second

  Secondary Banner Component

  Compact page header with gradient background, icon and title/description.
  Used on service detail and content pages.

  @param string $title - Main heading (required)
  @param string $description - Subheading text (optional)
  @param string $class - Additional CSS classes (optional)

  @slot icon - Custom icon SVG (optional, defaults to document icon)

  Examples:
  <x-banners.second title="{{ $service->title }}" description="{{ $service->description_public }}" />

  <x-banners.second title="Заголовок страницы" description="Описание">
      <x-slot:icon>
          <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path .../>
          </svg>
      </x-slot:icon>
  </x-banners.second>
--}}

@props([
  'title' => '',
  'description' => '',
  'class' => '',
])

<section class="banners__second container-grid mb-7.5 md:mb-15 {{ $class }}" aria-label="Page header">
    <div class="content">
        <div class="gradient-header-purple rounded-3xl p-5 md:p-8 text-white shadow-xl">
            <!-- Row 1: icon + title -->
            <div class="flex items-center max-md:flex-col md:gap-8 gap-5">
                <div class="flex-shrink-0">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                        @isset($icon)
                            {{ $icon }}
                        @else
                            {{-- Default: document icon --}}
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        @endisset
                    </div>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold leading-tight max-md:text-center">
                    {{ $title }}
                </h1>
            </div>
            <!-- Row 2: description -->
            @if ($description)
                <p class="text-lg md:text-xl text-indigo-100 leading-relaxed mt-4">
                    {{ $description }}
                </p>
            @endif
        </div>
    </div>
</section>
