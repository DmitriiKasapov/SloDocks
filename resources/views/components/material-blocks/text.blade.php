{{--
  material-blocks__text

  Text Block Component

  Renders rich text content
--}}

@props(['content'])

<div class="material-blocks__text prose prose-lg max-w-none mb-10">
    {!! $content['content'] ?? '' !!}
</div>
