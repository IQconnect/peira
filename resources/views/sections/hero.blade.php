@php
    $slider = $data['slider'];
@endphp


@if ($slider)
<section class="hero">
    <div class="hero__carousel">
    @foreach ( $slider as $elem)
        @php $content =  $elem['content'] @endphp
        <div class="hero__cell">
            {!! image($elem['image']['ID'], 'full', 'hero__image') !!}
            <div class="hero__content">
                @if($loop->first)
                    <h1 class="hero__title headline"> 
                        {!! $content['title'] !!} 
                    </h1>
                @else
                    <h2 class="hero__title headline"> 
                        {!! $content['title'] !!} 
                    </h2>
                @endif

                @if($content['dsc'])
                <p class="hero__dsc major-text">
                    {!! $content['dsc'] !!} 
                </p>
                @endif

                @if($content['hero_link'])
                <a class="hero__link button button--big" href="{{ $content['hero_link']['url'] }}">
                    {!! $content['hero_link']['title']!!} 
                </a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</section>
@endif
