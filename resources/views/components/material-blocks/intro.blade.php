@props(['content'])

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
            <p class="text-lg md:text-xl text-indigo-100 leading-relaxed">
                {{ $content['text'] ?? '' }}
            </p>
            @if(isset($content['badge']))
                <div class="inline-flex items-center px-3 py-1 bg-white/20 text-white text-xs font-bold uppercase tracking-wide rounded-full mt-4">
                    {{ $content['badge'] }}
                </div>
            @endif
        </div>
    </div>
</div>
