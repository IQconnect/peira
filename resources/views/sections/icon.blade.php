@php
	$icon = $data['icon'];
@endphp

@if ($icon)
<section class="section icon">
    <div class="container">
        <div class="icon__wrapper">
			@foreach ($icon as $element)
			<div class="icon__element">
				<figure class="icon__imgwrap">
					{!! image($element['image']['ID'], 'full', 'icon__image') !!}
				</figure>
			<p class="icon__text extra-major-text"> {!! $element['text'] !!}	</p>
			</div>
			@endforeach
        </div>
    </div>
</section>
@endif
