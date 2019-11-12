@php
  $data = option('localization');
	$title= $data['title'];
	$localization = $data['localization'];

@endphp

@if ($localization)
<section class="section">
    <div class="container">
			<header class="section__header">
					<h3 class="section__title title">
							{!! $title !!}
					</h3>
				</header>
        <div class="localization__wrapper">
			@foreach ($localization as $element)
			<div class="localization__element">
				<figure class="localization__imgwrap">
					{!! image($element['image']['ID'], 'full', 'localization__image') !!}
				</figure>
			<p class="localization__text semi-text"> {!! $element['text'] !!}	</p>
			</div>
			@endforeach
        </div>
    </div>
</section>
@endif
