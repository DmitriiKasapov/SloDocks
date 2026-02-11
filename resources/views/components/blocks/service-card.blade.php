{{--
  blocks__service-card

  Service Card Component

  Service card for search results display

  @param object $service - Объект услуги (required)
  @param string $class - Дополнительные CSS классы (optional)

  Примеры:
  <x-blocks.service-card :service="$service" />
--}}

@props([
  'service',
  'class' => '',
])

<a
  href="{{ route('services.show', $service->slug) }}"
  class="blocks__service-card group block bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-200 border border-gray-100 overflow-hidden {{ $class }}"
>
  <!-- Card Header -->
  <div class="gradient-bg-gray-light px-6 py-4 border-b border-gray-200">
    <div class="flex items-center gap-3">
      @if($service->category)
        <div class="w-10 h-10 gradient-brand-icon rounded-xl flex items-center justify-center flex-shrink-0">
          @if($service->category->icon)
            {!! $service->category->icon !!}
          @else
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
          @endif
        </div>
        <span class="text-sm font-medium text-gray-600">{{ $service->category->name }}</span>
      @endif
    </div>
  </div>

  <!-- Card Body -->
  <div class="p-6">
    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-amber-600 transition-colors">
      {{ $service->title }}
    </h3>

    @if($service->description_public)
      <p class="text-gray-600 leading-relaxed mb-4 line-clamp-3">
        {{ Str::limit($service->description_public, 150) }}
      </p>
    @endif

    <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-100">
      <div class="flex items-baseline gap-2">
        <span class="text-2xl font-bold text-amber-600">{{ number_format($service->price, 0, ',', ' ') }} €</span>
        @if($service->access_duration_days)
          <span class="text-sm text-gray-500">/ {{ $service->access_duration_days }} дней</span>
        @endif
      </div>

      <div class="flex items-center gap-2 text-amber-600 group-hover:gap-3 transition-all">
        <span class="text-sm font-medium">Подробнее</span>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
      </div>
    </div>
  </div>
</a>
