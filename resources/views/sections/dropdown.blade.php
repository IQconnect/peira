@php
    $item = $data;
	$team = $item['team'];
@endphp

<section class="section">
	<div class="container">
			@if($team)
				@foreach($team as $division)
				<article class="dropdown">
					@php
						$title = $division->post_title;
						$id = $division -> ID;
						$icon = get_field('icon', $id);
						$people = get_field('people', $id);
					@endphp
					<header class="dropdown__header" data-dropdown>
						<div class="dropdown__header-wrapper">
							<figure class="dropdown__icon " data-dropdown>
									{!! image($icon['ID'], 'full', 'dropdown__image') !!}
							</figure>
							<h2 class="dropdown__title semi-text">
								{{ $title }}
							</h2>
						</div>
						<div class="dropdown__arrow">
							<button class="icons icons__arrow-down" data-toggle-button></button>
						</div>
					</header>
					@if ($people)
					<ul class="dropdown__content">
						@foreach ($people as $elem)
							@php
									$image = $elem['image'];
									$name = $elem['name'];
									$job = $elem['jobtitle'];
									$phone = $elem['phone'];
									$email = $elem['email'];
									$image = $elem['avatar'];
							@endphp
								<li class="dropdown__elem">
									<figure class="dropdown__avatar">
									{!! image($image['ID'], 'full', 'dropdown__image dropdown__image--round') !!}
									</figure>
									<div class="dropdown__desc">
										<h3 class="dropdown__name text">
											{{ $name }}
										</h3>
										<p class="dropdown__job terms ">
											{{ $job }}
										</p>
										<p class="dropdown__answear text">
											{{ $phone }}
										</p>
										<p class="dropdown__answear text">
											{{ $email }}
										</p>
									</div>
								</li>
						@endforeach
					</ul>
					@endif
				</article>
				@endforeach
			@endif
	</div>
</section>
