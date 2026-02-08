{{--
  material-blocks__steps

  Steps Block Component

  Displays numbered steps with descriptions
--}}

@props(['content'])

<div class="material-blocks__steps bg-white border-2 border-indigo-100 rounded-2xl p-8 mb-10 shadow-lg">
    <div class="prose prose-lg max-w-none space-y-10">
        @foreach($content['steps'] ?? [] as $step)
            <div id="step-{{ $step['number'] }}" class="step-content">
                <h3 class="text-2xl font-bold text-gray-900 mb-4 flex items-center gap-3">
                    <span class="flex-shrink-0 w-10 h-10 gradient-brand-icon text-white rounded-lg flex items-center justify-center font-bold">
                        {{ $step['number'] }}
                    </span>
                    {{ $step['title'] }}
                </h3>

                @if(isset($step['description']))
                    <div class="step-description">
                        {!! $step['description'] !!}
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
