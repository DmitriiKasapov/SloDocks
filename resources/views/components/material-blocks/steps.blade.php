@props(['content'])

<div class="bg-white border-2 border-indigo-100 rounded-2xl p-8 mb-10 shadow-lg">


    <div class="prose prose-lg max-w-none space-y-10">
        @foreach($content['steps'] ?? [] as $step)
            <div id="step-{{ $step['number'] }}">
                <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-amber-400 to-orange-500 text-white rounded-lg flex items-center justify-center font-bold">
                        {{ $step['number'] }}
                    </span>
                    {{ $step['title'] }}
                </h3>

                @if(isset($step['description']))
                    <div class="text-gray-700 mb-4 leading-relaxed">
                        {!! $step['description'] !!}
                    </div>
                @endif

                @if(isset($step['items']) && count($step['items']) > 0)
                    <ul class="space-y-3 text-gray-700 mb-8">
                        @foreach($step['items'] as $item)
                            <li class="flex items-start gap-2">
                                <svg class="w-5 h-5 text-emerald-500 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $item['item'] ?? $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    </div>
</div>
