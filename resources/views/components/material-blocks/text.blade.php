{{--
  material-blocks__text

  Text Block Component

  Renders rich text content
--}}

@props(['content'])

<div class="prose prose-lg max-w-none mb-10">
    {!! $content['content'] ?? '' !!}
</div>
