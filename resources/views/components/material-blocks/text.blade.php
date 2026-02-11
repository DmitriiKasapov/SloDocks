{{-- material_blocks__text --}}

@props(['content', 'class' => ''])

<div class="wysiwyg text-base {{ $class }}">
    {!! $content['content'] ?? '' !!}
</div>
