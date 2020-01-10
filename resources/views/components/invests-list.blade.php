@if ($invests)
<ul class="invests-list" data-invest-map-list>
    @foreach ($invests as $invest)
        @php
            $post = get_post($invest);
            $img = get_field('image', $invest);
            $name = $post -> post_title;
            $address = get_field('address', $invest);
            $link = get_permalink($invest);
            $cat_id = wp_get_post_categories($invest)[0];
            $cat = get_term_by( 'id', $cat_id, 'category' );

            $nameInvest = mb_strtoupper($name);
            $flats = get_flats_from_invest($nameInvest);

            $free = count(get_free_flats($flats));
            $message = get_field('off_message', $invest);
        @endphp

        <li class="invests-list__elem" data-invest-map-elem-cat="{{ $cat->slug }}" data-invest-map-elem="{{ $name }}">
            {!! image($img, 'invest-list', 'invests-list__img') !!}
            <div class="invests-list__content">
                <h3 class="invests-list__title semi-text">
                    {!! $name !!}
                </h3>
                <p class="invests-list__address text">
                    {!! $address !!}
                </p>
                <footer class="invests-list__footer">
                  @if ($free)
                  <span class="invests-list__info">
                      {{ $free }} 
                      @if($free > 5) wolne mieszkanie
                      @else wolnych mieszkań
                      @endif
                  </span>
                  <a href="{{ $link }}" class="invests-list__button button button--rev">
                      ZOBACZ
                  </a>
                  @else
                  <p class="invests-list__info invests-list__info--message">
                    @include('svg.info') {{ $message }}
                  </p>
                  @endif
                </footer>
            </div>
        </li>
    @endforeach
</ul>
@endif
