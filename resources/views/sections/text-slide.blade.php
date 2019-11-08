@php
$title = $data['title'];
$subtitle = $data['subtitle'];
$content = $data['content'];

$label1 = $content['label'];
$label2 = $content['label2'];

$dsc1 = $content['dsc'];
$dsc2 = $content['dsc2'];


$addtxt1 = $content['addtxt'];
$addtxt2 = $content['addtxt2'];

@endphp

<section class="section text-slide text-section"  id="{{ $ID }}" data-single-section>
    <div class="container">
        <header class="section__header">
            <h3 class="section__title title">
                <span class="section__label minor-text">
                    {!! $title !!}
                </span>
                <br>
                {!! $subtitle !!}
            </h3>
        </header>
        <div class="text-section__2col">
            <div class="text-section__col">
                <h4 class="text-section__label minor-text">
                    {!! $label1 !!}
                </h4>
                <p class="text-section__dsc text">
                    {!! $dsc1 !!}
                </p>

                @if ($addtxt1)
                    <p class="text-section__dsc text">
                        {!! $addtxt1 !!}
                    </p>

                    <button class="text-section__dropdown minor-text button button--transparent" data-slide-text>
                        <span>
                            rozwiń tekst
                        </span>
                        <span>
                            zwiń tekst
                        </span>
                    </button>
                @endif
            </div>
            <div class="text-section__col">
                <h4 class="text-section__label minor-text">
                    {!! $label2 !!}
                </h4>
                <p class="text-section__dsc text">
                    {!! $dsc2 !!}
                </p>

                @if ($addtxt2)
                <p class="text-section__dsc text">
                    {!! $addtxt2 !!}
                </p>

                <button class="text-section__dropdown minor-text button button--transparent" data-slide-text>
                    <span>
                        rozwiń tekst
                    </span>
                    <span>
                        zwiń tekst
                    </span>
                </button>
                @endif
                
            </div>
        </div>
    </div>
</section>