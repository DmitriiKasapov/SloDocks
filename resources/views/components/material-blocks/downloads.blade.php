{{--
  material-blocks__downloads

  Downloads Block Component

  List of downloadable files
--}}

@props(['content'])

<div class="material-blocks__downloads mb-10">
    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Файлы для скачивания</h2>
    <div class="grid sm:grid-cols-2 gap-4">
        @foreach($content['files'] ?? [] as $file)
            <a href="{{ route('material.download', ['file' => $file['file']]) }}"
               class="flex items-center gap-4 p-5 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md hover:border-indigo-300 transition-all group ">
                <div class="flex-shrink-0 w-12 h-12 gradient-icon-red rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="flex-grow">
                    <h3 class="font-bold text-gray-900 group-hover:text-indigo-600 transition-colors">
                        {{ $file['title'] }}
                    </h3>
                    <p class="text-sm text-gray-500">PDF</p>
                </div>
                <svg class="w-5 h-5 text-gray-400 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        @endforeach
    </div>
</div>
