@if ($invests)
<ul class="invests-list">
    @foreach ($invests as $invest)
        @php
            $post = get_post($invest);
            $img = get_field('image', $invest);
            $name = $post -> post_title;
            $address = get_field('address', $invest);
            $link = get_permalink($invest);
        @endphp
        <li class="invests-list__elem" data-invest-map-elem=>
            {!! image($img, 'invest-list', 'invests-list__img') !!}
            <div class="invests-list__content">
                <h3 class="invests-list__title semi-text">
                    {!! $name !!}
                </h3>
                <p class="invests-list__address text">
                    {!! $address !!}
                </p>
                <footer class="invests-list__footer">
                    <span class="invests-list__info">
                        5 wolnych mieszkań
                    </span>
                    <a href="{{ $link }}" class="invests-list__button button button--rev">
                        ZOBACZ
                    </a>
                </footer>
            </div>
        </li>
    @endforeach
</ul>
@endif