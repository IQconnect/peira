@php
    $slidersName = ['Wizualizacje', 'Wnętrza', 'Okolica'];
    $sliders = [];
    $slider1 = get_field('slider1');
    $slider2 = get_field('slider2');
    $slider3 = get_field('slider3');

    array_push($sliders, $slider1, $slider2, $slider3)
@endphp

<section class="section section--half-top section--no-bottom section--shade" id="galeria" data-single-section>
    <div class="container">
        <header class="section__header">
            <h3 class="section__title title">
                <span class="section__label minor-text">
                    Galeria
                </span>
                <br>
                Galeria zdjęć
            </h3>
            @if ($slidersName)
            <nav class="invest-slider-nav">
                <ul class="invest-slider-nav__list">
                    @foreach ($slidersName as $item)
                    <li class="invest-slider-nav__elem">
                        <button class="invest-slider-nav__button button button--rev @if($loop->first) -is-active @endif" data-invest-slider-index="{{ $loop->index + 1 }}">
                            {{ $item }}
                        </button>
                    </li>
                    @endforeach
                </ul>
            </nav>
            @endif
        </header>
    </div>
    
    @if($sliders)
    <div class="invest-slider" data-invest-slider="1">
        @foreach ($sliders as $slider)
        @if ($slider)
        <div class="invest-slider__wrapper">
            <div class="invest-slider__carousel">
                @foreach ($slider as $elem)
                <div class="invest-slider__cell">
                    {!! image($elem['ID'], 'full', 'invest-slider__image') !!}
                </div>
                @endforeach
            </div>
            
            <div class="container">
                <div class="invest-slider__nav-carousel">
                    @foreach ($slider as $elem)
                    <div class="invest-slider__nav-cell">
                        {!! image($elem['ID'], 'full', 'invest-slider__image--nav') !!}
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    @endif
</section>