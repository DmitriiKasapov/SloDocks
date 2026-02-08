{{-- material_blocks__text --}}

@props(['content', 'class' => ''])

<section class="container-grid my-7.5 md:my-15 {{ $class }}">
    <div class="content">
        <div class="wysiwyg text-base">
            {!! $content['content'] ?? '' !!}
        </div>
    </div>
</section>
