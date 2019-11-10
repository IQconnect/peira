<@php
	$main = $data['main'];

	$title = $main['title'];
	$subtitle = $main['subtitle'];
	$desc = $main['desc'];

	$text = $data['contacttext'];

	$contactjob = $text['contactjob'];
	$contactphone = $text['contactphone'];
	$contactemail = $text['contactemail'];
	$contactadres = $text['contactadres'];


	$people= $data['people'];
	$job = $people['jobtitle'];
	$person =$people['person'];

@endphp

<section class="section section--no-bottom" id="kontakt" data-single-section>
	<div class="container">
		<div class="contactform__wrapper">
			<div class="contactform__left">
					<header class="section__header">
							<h3 class="section__title title">
								<span class="section__label minor-text">
									{!! $title !!}
								</span>
								<br>
								{!! $subtitle !!}
							</h3>
						</header>
				<div class="contactform__desc">
				{!! $desc !!}
				</div>
				<div class="contactform__contact">
					<p class="contactform__job minor-text "> {!! $contactjob !!}</p>
					<p class="contactform__name major-text"> {!! $contactphone !!}</p>
					<p class="text"> {!! $contactemail !!}</p>
					<p class="text"> {!! $contactadres !!}</p>
				</div>
					<p class="contactform__jobcontent minor-text ">
						{{ $job }}
					</p>
					@if ($person)
					<ul class="contactform__content">
						@foreach ($person as $item)
						@php
							$name = $item['name'];
							$phone = $item['phone'];
							$email = $item['email'];
							$image = $item['avatar'];
						@endphp

						<li class="contactform__elem">
							<figure class="contactform__avatar">
							{!! image($image['ID'], 'full', 'contactform__image contactform__image--round') !!}
							</figure>
							<div class="contactform__info">
								<h3 class="contactform__name text">
								{{ $name }}
								</h3>
								<p class="contactform__answear text">
								{{ $phone }}
								</p>
								<p class="contactform__answear text">
								{{ $email }}
								</p>
							</div>
						</li>
						@endforeach
					</ul>
					@endif
			</div>
			<div class="contactform__form">
				@include('components.form')
			</div>
		</div>
	</div>
</section>
