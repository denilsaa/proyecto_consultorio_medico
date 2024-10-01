@props(['item'])

@if (!isset($item['subitems']))
<li>
    <a href="{{$item['uri']}}" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group hover:shadow-xl">
        {{$slot}}
        <span class="ms-3">{{$item['titulo']}}</span>
    </a>
</li>
@else
@php
$dropdown = 'dropdown-'.substr($item['titulo'], 0, 2);
@endphp
<li>
    <button type="button" class="flex items-center w-full p-2 text-basetransition duration-75 rounded-lg group text-white hover:bg-gray-700" aria-controls="{{$dropdown}}" data-collapse-toggle="{{$dropdown}}">
        {{$slot}}
        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{$item['titulo']}}</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
        </svg>
    </button>
    <ul id="{{$dropdown}}" class="hidden py-2 space-y-2">
        @foreach ($item['subitems'] as $subitem)
        @if (isset($subitem['uri']) && isset($subitem['titulo']))
        <li>
            <x-componentes.item-aside-home :item="$subitem">
            </x-componentes.item-aside-home>
        </li>
        @else
        <li>Error: subitem missing 'uri' or 'titulo'</li>
        @endif
        @endforeach
    </ul>
</li>
@endif