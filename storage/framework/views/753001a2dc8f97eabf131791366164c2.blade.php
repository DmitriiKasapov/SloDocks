<?php extract((new \Illuminate\Support\Collection($attributes->getAttributes()))->mapWithKeys(function ($value, $key) { return [Illuminate\Support\Str::camel(str_replace([':', '.'], ' ', $key)) => $value]; })->all(), EXTR_SKIP); ?>
@props(['content','block','service','access'])
<x-material-blocks.tip :content="$content" :block="$block" :service="$service" :access="$access" >

{{ $slot ?? "" }}
</x-material-blocks.tip>