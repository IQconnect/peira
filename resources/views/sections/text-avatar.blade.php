@php
	$main = $data['main'];

	$title = $main['title'];
	$subtitle = $main['subtitle'];
	$desctitle = $main['desctitle'];
	$desc = $main['desc'];

	$text = $data['contacttext'];


	$firms= $data['firms'];
	$firmtitle = $firms['firmtitle'];
	$firm = $firms['firm'];

@endphp

<section class="section section--{{ $theme }}" id="{{ $ID }}" data-single-section>
	<div class="container">
		<div class="text-avatar__wrapper">
			<header class="section__header">
				<h3 class="section__title title">
					<span class="section__label minor-text">
						{!! $title !!}
					</span>
					<br>
					{!! $subtitle !!}
				</h3>
			</header>
			<div class="text-avatar__jobcontent minor-text">
					{!! $desctitle !!}
				</div>
			<div class="text-avatar__desc">
				{!! $desc !!}
			</div>
			<p class="text-avatar__jobcontent minor-text ">
				{{ $firmtitle }}
			</p>
				<ul class="text-avatar__content">
					@foreach ($firm as $item)
					@php
						$name = $item['name'];
						$content = $item['content'];
						$image = $item['avatar'];
					@endphp
						<li class="text-avatar__elem">
							<figure class="text-avatar__avatar">
								{!! image($image['ID'], 'full', 'text-avatar__image text-avatar__image--round') !!}
							</figure>
							<div class="text-avatar__info">
								<h3 class="text-avatar__name text">
									{{ $name }}
								</h3>
								<div class="text-avatar__answear text">
									{!! $content !!}
								</div>
							</div>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
</section>
