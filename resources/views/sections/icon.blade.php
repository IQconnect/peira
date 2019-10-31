@php
	$icon = $data['icon'];
@endphp

@if ($invests)
<section class="section icon">
    <div class="container">
        <div class="icon__wrapper">
			@foreach ($icon as $element)
			{!! image($element['image']['ID'], 'full', 'icon__image') !!}
			<p class="icon__text"> {!! $element['text'] !!}
			@endforeach
        </div>
    </div>
</section>
@endif
