@php
    $title = $data['title'];
    $content = $data['content'];

    $special = $data['special'];

    $label1 = $content['label'];

    $dsc1 = $content['dsc'];

    $image = $content['image'];
@endphp

<section class="section section--smallpad text-image">
    <div class="container">
        <div class="text-image__wrapper @if($special) text-image__wrapper--reverse @endif">
            <div class="text-image__textarea">
                <h3 class="text-image__title title">{!! $title !!}</h3>
                    <div class="text-image__col">
                        <h4 class="text-image__label minor-text">
                            {!! $label1 !!}
                        </h4>
                        <p class="text-image__dsc text">
                            {!! $dsc1 !!}
                        </p>
                    </div>
                </div>
        <figure class="text-image__figure @if($special) text-image__figure--reverse @endif">
               {!! image($image['ID'], 'full', 'text-image__image') !!}
        </figure>
    </div>
</section>
