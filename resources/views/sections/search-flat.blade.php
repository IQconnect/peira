<section class="section section--no-bottom" id="lista-mieszkan" data-single-section>
    <div class="section__wrapper">
        <div class="container">
            <header class="section__header">
                <h3 class="section__title title">
                    <span class="section__label minor-text">
                        LISTA MIESZKAŃ
                    </span>
                    <br>
                    Wyszukiwarka mieszkań
                </h3>
            </header>
            @include('components.filtr')
        </div>
    </div>
    <div class="section__wrapper section__wrapper--shade">
        <div class="container">
            @php
                $name = mb_strtoupper (get_the_title());
                $flats = get_flats_from_invest($name);
            @endphp
            @include('components.table', ['flats'=>$flats])
        </div>
    </div>
</section>