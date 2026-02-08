{{--
  material-blocks__help-cta

  Help CTA Block Component

  Call-to-action block for help and support
--}}

@props(['content'])

<div class="material-blocks__help-cta gradient-tip-success border-l-4 border-emerald-500 rounded-xl p-6 mb-10 shadow-sm">
    <div class="flex items-start gap-4">
        <div class="flex-shrink-0">
            <div class="w-10 h-10 bg-emerald-500 rounded-full flex items-center justify-center">
                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
        <div class="flex-grow">
            <div class="text-emerald-800 leading-relaxed prose prose-sm max-w-none">
                {!! $content['text'] ?? '' !!}
            </div>
            @if(isset($content['link']))
                <a href="{{ $content['link'] }}" class="inline-flex items-center gap-2 mt-4 text-emerald-700 hover:text-emerald-900 font-medium transition-colors ">
                    Связаться с нами
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
            @endif
        </div>
    </div>
</div>
