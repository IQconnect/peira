@php
    $menu = get_field('menu');
@endphp

@if ($menu)
<nav class="single-nav">
    <ul class="single-nav__menu">
        @foreach ($menu as $item)
        <li class="single-nav__elem">
            <a 
            href="{{ $item['link'] }}" 
            class="@if($loop->first) -is-active @endif single-nav__link minor-text" 
            data-single-nav
            >
                {{ $item['title'] }}
            </a>
        </li>
        @endforeach
    </ul>
    @include('components.widgets', ['class'=> 'single-nav__widgets'])
</nav>
@endif
