<section class="section section--half-top section--shade" id="galle">
    <div class="container">
        <header class="section__header">
            <h3 class="section__title title">
                <span class="section__label minor-text">
                    Galeria
                </span>
                <br>
                Galeria zdjęć
            </h3>
        </header>
    </div>
    @php
        $slider1 = get_field('slider1');
    @endphp
    @if ($slider1)
    <div class="invest-slider">
        @foreach ($slider1 as $elem)
        <div class="invest-slider__cell">
            {!! image($elem['ID'], 'full', 'invest-slider') !!}
        </div>
        @endforeach
    </div>
    @endif
</section>