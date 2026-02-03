<?php extract((new \Illuminate\Support\Collection($attributes->getAttributes()))->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['content'])
<x-material-blocks.help-cta :content="$content" >

{{ $slot ?? "" }}
</x-material-blocks.help-cta>