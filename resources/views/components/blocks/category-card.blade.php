{{--
  blocks__category-card

  Category Card Component

  Category card with services list

  @param string $title - Название категории (required)
  @param array $services - Массив услуг в категории (required)
  @param string $icon - SVG иконка категории (optional)
  @param string $class - Дополнительные CSS классы (optional)

  Примеры:
  <x-blocks.category-card title="Дети" :services="$childrenServices" />

  <x-blocks.category-card
    title="Документы"
    :services="$documentServices"
    icon="<svg>...</svg>"
  />
--}}

@props([
  'title' => '',
  'services' => [],
  'icon' => '',
  'class' => '',
])

<div class="blocks__category-card bg-white rounded-2xl shadow-sm hover:shadow-md transition-shadow border border-gray-100 overflow-hidden {{ $class }}">
  <!-- Card Header -->
  <div class="gradient-bg-gray-light px-6 py-5 border-b border-gray-200">
    <div class="flex items-center gap-3">
      @if($icon)
        <div class="w-10 h-10 gradient-brand-icon rounded-xl flex items-center justify-center flex-shrink-0">
          @if(str_starts_with($icon, '<'))
            {{-- SVG code --}}
            {!! $icon !!}
          @elseif(str_starts_with($icon, 'heroicon-'))
            {{-- Heroicon class name --}}
            <x-dynamic-component :component="$icon" class="w-6 h-6 text-white" />
          @else
            {{-- Default fallback --}}
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
          @endif
        </div>
      @endif
      <h3 class="text-2xl font-bold text-gray-900">{{ $title }}</h3>
    </div>
  </div>

  <!-- Services List -->
  <div class="p-6">
    @if(count($services) > 0)
      <ul class="space-y-3">
        @foreach($services as $service)
          <li>
            <a
              href="{{ route('services.show', $service->slug) }}"
              class="group flex items-center justify-between p-3 rounded-lg gradient-hover-brand transition-all "
            >
              <span class="text-gray-700 group-hover:text-amber-900 font-medium transition-colors">
                {{ $service->title }}
              </span>
              <svg class="w-5 h-5 text-gray-400 group-hover:text-amber-600 group-hover:translate-x-1 transition-all" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
              </svg>
            </a>
          </li>
        @endforeach
      </ul>
    @else
      <p class="text-gray-500 text-center py-8">
        Услуги скоро появятся
      </p>
    @endif
  </div>
</div>
