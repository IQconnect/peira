@php
    $cats = get_terms( 'category', array(
        'hide_empty' => true,
    ) );   
@endphp

@if ($cats)
<nav class="invest-map__nav">
    <ul class="invest-map__list">
        <li class="invest-map__elem">
            <button class="checkbox -is-active" data-invest-map-cats="all">
                {{ __('Wszystkie inwestycje') }}
            </button>
        </li>
        @foreach ($cats as $cat)
            <li class="invest-map__elem">
                <button class="checkbox" data-invest-map-cats="{{ $cat->slug }}">
                    {{ $cat->name }}
                </button>
            </li>
        @endforeach
    </ul>
</nav>
@endif