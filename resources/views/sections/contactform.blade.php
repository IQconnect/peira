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


	$elem = $data['people'];

	$job = $elem['jobtitle'];
	$name = $elem['name'];
	$phone = $elem['phone'];
	$email = $elem['email'];
	$image = $elem['avatar'];
@endphp

<section class="section">
	<div class="container">
		<div class="contactform__wrapper">
			<div class="contactform__left">
				<header class="contactform__title">
					<p class=" contactform__subtext terms">
					{!! $title !!}
					</p>
					<h2 class="title">
					{!! $subtitle !!}
					</h2>
				</header>
				<div class="contactform__desc">
				{!! $desc !!}
				</div>
				<div class="contactform__contact">

				</div>
					<p class="contactform__job terms ">
						{{ $job }}
					</p>
					<ul class="contactform__content">
						<li class="contactform__elem">
							<figure class="contactform__avatar">
							{!! image($image['ID'], 'full', 'contactform__image contactform__image--round') !!}
							</figure>
							<div class="contactform__desc">
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
					</ul>
			</div>
		@include('components.form')
		</div>
	</div>
</section>
