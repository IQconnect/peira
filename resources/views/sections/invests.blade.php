@php
    $invests = $data['invests'];
@endphp

@if ($invests)
<section class="invests">
    <div class="invests__carousel">
    @foreach ( $invests as $elem)
        @php
            $id = $elem -> ID;
            $gallery = get_field('gallery', $id);
            $logo = get_field('logo', $id);
        @endphp
        <div class="invests__cell">
            @if ($gallery)
            <div class="invest__carousel">
                @foreach ($gallery as $img)
                    <div class="invest__cell">
                        {!! image($img['ID'], 'full', 'invest__image') !!}
                    </div>
                @endforeach
            </div>
            @endif
            <div class="invest">
                <div class="container">
                    <div class="invest__wrapper">
                        @if ($logo)
                          {!!  image($logo['ID'], 'full', 'invest__logo') !!}
                        @endif
                        <h3 class="invest__title title">
                            {{ $elem->post_title }}
                        </h3>
                        <p class="invest__dsc text">
                            {!! get_field('dsc', $id) !!}
                        </p>
                        <a href="{{ get_permalink($id) }}" class="invest__link button button--transparent button--border button--big">
                            ZOBACZ STRONĘ INWESTYCJI
                        </a>
                    </div>
                    @if ($gallery)
                    <ul class="invest__nav">
                        @foreach ($gallery as $img)
                            @php
                                $class = 'invest__nav-image';

                                if ($loop->first) {
                                    $class = 'invest__nav-image -is-active';
                                }
                            @endphp
                            <li class="invest__nav-elem">
                                <button class="button button--transparent" data-invest-index={{ $loop->parent->index }} data-invest-gallery={{ $loop->index }}>
                                    {!! image($img['ID'], 'gallery-thumb', $class) !!}
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif
