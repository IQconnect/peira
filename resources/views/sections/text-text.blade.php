@php
    $title = $data['title'];
    $content = $data['content'];

    $label1 = $content['label'];
    $label2 = $content['label2'];

    $dsc1 = $content['dsc'];
    $dsc2 = $content['dsc2'];
@endphp

<section class="section text-section">
    <div class="container">
        <h3 class="text-section__title title">{!! $title !!}</h3>
        <div class="text-section__2col">
            <div class="text-section__col">
                <h4 class="text-section__label minor-text">
                    {!! $label1 !!}
                </h4>
                <p class="text-section__dsc text">
                    {!! $dsc1 !!}
                </p>
            </div>
            <div class="text-section__col">
                <h4 class="text-section__label minor-text">
                    {!! $label2 !!}
                </h4>
                <p class="text-section__dsc text">
                    {!! $dsc2 !!}
                </p>
            </div>
        </div>
    </div>
</section>