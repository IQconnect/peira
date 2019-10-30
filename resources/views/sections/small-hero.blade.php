@php
    $slider = $data['slider'];

    $title = $data['content']['title'];
    $dsc = $data['content']['dsc'];
    $img = $data['image'];
@endphp


<section class="small-hero">
    {!! image($img, 'full', 'small-hero__image') !!}
    <div class="container">
        <div class="small-hero__content">
            <h1 class="small-hero__title headline">
                {!! $title or get_the_title() !!}
            </h1>
            @if ($dsc)
            <p class="small-hero__dsc major-text">
                {!! $dsc !!}
            </p>
            @endif
        </div>
    </div>
</section>

