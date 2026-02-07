{{--
  material-blocks__examples

  Examples Block Component

  List of example documents
--}}

@props(['content'])

<div class="mb-10">
    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Образцы заполнения</h2>
    <div class="grid sm:grid-cols-2 gap-4">
        @foreach($content['examples'] ?? [] as $example)
            <a href="{{ route('material.download', ['file' => $example['file']]) }}"
               class="flex items-center gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-purple-300 transition-all group ">
                <div class="flex-shrink-0 w-12 h-12 gradient-icon-violet rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V8z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="flex-grow">
                    <h3 class="font-bold text-gray-900 group-hover:text-purple-600 transition-colors">
                        {{ $example['title'] }}
                    </h3>
                    <p class="text-sm text-gray-500">Образец</p>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        @endforeach
    </div>
</div>
