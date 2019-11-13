@php
    $args = array(
    'posts_per_page'   => 999,
    'offset'           => 0,
    'orderby' => 'date',
    'order'    => 'ASC',
    'post_type'        => 'budynki',
    'post_status'      => 'publish',
    'suppress_filters' => true,
  );

  $bildings = get_posts( $args );
  $areas = [];
  $flors = [];

  foreach ($bildings as $bilding) {
      $flats = get_field('flats', $bilding->ID);

      foreach ($flats as $flat) {

          if(is_numeric($flat['area'])) {
            array_push($areas, $flat['area']);
          }

          if(is_numeric($flat['floor'])) {
              array_push($flors, $flat['floor']);
          }
      }
  }
@endphp

<div class="search" data-search>
    <button class="search__close" data-toggle-search></button>
    <form action="{{ get_permalink( get_page_by_path( 'znajdz-mieszkanie' ) ) }}" method="GET" class="search__form">
        <h2 class="subtitle search__title"> Znajdź mieszkanie </h2>
        <div class="search__form-wrapper">
            <label class="text search__subtitle">Wybierz budynek</label>
            <div class="search__form-wrapper--bildings">
                @foreach ($bildings as $bilding)
                    @include('blocks.bilding-mini', ['data'=>$bilding])
                @endforeach
                <input type="text" name="bilding" value="all" hidden data-search-bilding>
            </div>
        </div>
        <div class="search__form-wrapper">
            <label class="text search__subtitle">Powierzchnia</label>
            <div data-ui-slider="area" data-ui-slider-min="{{min($areas)}}" data-ui-slider-max="{{max($areas)}}" data-ui-slider-sign="m²"></div>
            <input class="search__slider-input" type="text" name="area_from" readonly data-ui-slider-from="area">
            <input class="search__slider-input" type="text" name="area_to" readonly data-ui-slider-to="area">
        </div>

        <div class="search__form-wrapper">
            <label class="text search__subtitle">Piętro</label>
            <div data-ui-slider="floor" data-ui-slider-min="{{min($flors)}}" data-ui-slider-max="{{max($flors)}}" data-ui-slider-sign=""></div>
            <input class="search__slider-input" type="text" name="floor_from" readonly data-ui-slider-from="floor">
            <input class="search__slider-input" type="text" name="floor_to" readonly data-ui-slider-to="floor">
        </div>
        <div class="search__footer">
            <button class="search__button button button--primary-light">
                Szukaj
            </button>
        </div>
    </form>
</div>