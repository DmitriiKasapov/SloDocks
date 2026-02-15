{{-- cards__service
  Service card — full-card link with category badge, title, excerpt and arrow.

  @param \App\Models\Service $service — Eloquent model with loaded category relation
--}}

@props(['service'])

<a
  href="{{ route('services.show', $service->slug) }}"
  aria-label="{{ $service->title }}"
  data-category="{{ $service->category_id }}"
  {{ $attributes->merge(['class' => 'cards__service group block bg-white rounded-2xl shadow-sm hover:shadow-lg border border-gray-100 p-6 transition-all duration-200']) }}
>
  {{-- Category badge (right-aligned) --}}
  @if($service->category)
    <div class="flex justify-end mb-3">
      <span class="inline-flex items-center gap-1.5 text-xs font-medium text-gray-500">
        @if($service->category->icon)
          <span class="w-5 h-5 gradient-brand-icon rounded-md flex items-center justify-center flex-shrink-0">
            @if(str_starts_with($service->category->icon, '<'))
              {!! $service->category->icon !!}
            @else
              <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
              </svg>
            @endif
          </span>
        @endif
        {{ $service->category->name }}
      </span>
    </div>
  @endif

  {{-- Title --}}
  <h3 class="text-lg font-bold bg-clip-text gradient-header-purple [-webkit-text-fill-color:#2563eb] group-hover:[-webkit-text-fill-color:transparent] transition-all duration-200 mb-2">
    {{ $service->title }}
  </h3>

  {{-- Excerpt --}}
  @if($service->description_public)
    <p class="text-sm text-gray-600 line-clamp-2 mb-4">
      {{ Str::limit(strip_tags($service->description_public), 120) }}
    </p>
  @endif

  {{-- "Read more" pseudo-link --}}
  <span class="inline-flex items-center gap-1 text-sm font-semibold text-amber-600 group-hover:text-amber-700 mt-auto transition-colors">
    Подробнее
    <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
    </svg>
  </span>
</a>
