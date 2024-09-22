@props(['tag', 'size' => 'base'])

@php
    $sizes = ['sm' => 'px-3 py-1 text-2xs', 'base' => 'px-5 py-1 text-sm'];
@endphp

<a href="/tags/{{ strtolower($tag->name) }}"
    class="bg-white/10 hover:bg-white/25 rounded-xl font-bold transition-colors duration-300 {{ $sizes["{$size}"] }}">{{ $tag->name }}</a>
