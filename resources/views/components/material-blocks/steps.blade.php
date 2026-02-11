{{-- material_blocks__steps --}}

@props(['content', 'class' => ''])

<div class="bg-white border-2 border-indigo-100 rounded-2xl p-6 md:p-8 shadow-lg {{ $class }}">
    <div class="space-y-10">
        @foreach($content['steps'] ?? [] as $step)
            <div id="step-{{ $step['number'] }}">
                <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="shrink-0 w-10 h-10 gradient-brand-icon text-white rounded-lg flex items-center justify-center font-bold">
                        {{ $step['number'] }}
                    </span>
                    {{ $step['title'] }}
                </h3>

                @if(isset($step['description']))
                    <div class="wysiwyg text-base">
                        {!! $step['description'] !!}
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
