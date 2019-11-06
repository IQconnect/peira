@php
    $markers = [];
    $nav = option('loc_nav');
    $lat = get_field('lat');
    $lng = get_field('lng');
    $mainIcon = get_field('img_active')['url'];

    $myMarkers = get_field('localization');

    if ($myMarkers) {
        foreach ($myMarkers as $marker) {
            $icon = '';
            foreach ($nav as $item) {
                if($item['name'] == $marker['cat']) {
                    $icon = $item['icon']['url'];
                }
            }

            $mark = [
            'name'=> $marker['name'],
            'lat'=> $marker['lat'],
            'lng'=> $marker['lng'],
            'icon'=> $icon,
            'cat'=> $marker['cat'],
        ];

        array_push($markers, $mark);
        }
    }

    $JSON_MARKERS =  json_encode($markers);
@endphp

<section class="section section--no-bottom" id="localization">
    <div class="container">
        <header class="section__header">
            <h3 class="section__title title">
                <span class="section__label minor-text">
                    LOKALIZACJA
                </span>
                <br>
                Infrastuktura na wyciągnięcie ręki
            </h3>
        </header>
    </div>
    <div class="location-map">
    @if ($nav)
    <ul class="location-map__legend">
        @foreach ($nav as $item)
        <li class="location-map__elem">
            {!! image($item['image']['ID'], 'full', 'location-map__image') !!}
            <h4 class="location-map__label minor-text">
                {{ $item['name'] }}
            </h4>
        </li>
        @endforeach
    </ul>
    @endif
    <div class="location-map__map" location-map data-lat="{{ $lat }}" data-lng="{{ $lng }}" data-markers="{{ $JSON_MARKERS }}" data-icon="{{ $mainIcon }}"></div>
    </div>
</section>