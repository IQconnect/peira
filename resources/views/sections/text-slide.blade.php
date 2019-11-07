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

<section class="section text-slide">
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
        <div class="text-slide__2col">
            <div class="text-slide__col">
                <h4 class="text-slide__label minor-text">
                    {!! $label1 !!}
                </h4>
                <p class="text-slide__dsc text">
                    {!! $dsc1 !!}
				</p>
				<button data-toggle-bot >rozwiń tekst</button>
				<div class="text-slide__hidedtext" data-drop>
						{!! $addtxt1 !!}
				</div>
            </div>
            <div class="text-slide__col">
                <h4 class="text-slide__label minor-text">
                    {!! $label2 !!}
                </h4>
                <p class="text-slide__dsc text">
                    {!! $dsc2 !!}
				</p>

				<div class="text-slide__hidedtext" data-drop>
						{!! $addtxt2 !!}
                </div>
                <button data-toggle-bot >rozwiń tekst</button>
            </div>
        </div>
    </div>
</section>
