@props(['tags'])
@php
    $tag = explode(',', $tags);
@endphp

<ul class="flex">
    @foreach ($tag as $item)
    <li
    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
>
    <a href="/?tag={{ $item }}">{{ $item }}</a>
</li>    
    @endforeach
   
</ul>