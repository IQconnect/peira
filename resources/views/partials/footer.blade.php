@php
$phone = option('phone');
$footer = option('footer_info');
$logo = $footer['image'];
$iq = $footer['Ilikeart_logo'];
$email = option('email');
@endphp

<footer class="footer">
	{!! image($footerImg['ID'], 'full', 'footer__bg') !!}
	<div class="container">
		@if($logo)
		<img src="{{ $logo['url'] }}" alt="Peira" class="footer__logo" />
		@endif
		<div class="footer__content">
			<div class="footer__left">
				<ul class="footer__info link--menu">
					<li> {{$footer['firm'] }} </li>
					<li> {{$footer['adress'] }} </li>
					<li> KRS: {{$footer['krs'] }} NIP: {{$footer['nip'] }} </li>
					<li> REGON: {{$footer['regon'] }} </li>
				</ul>
			</div>
			<nav class="footer__nav">
				@if (has_nav_menu('footer_navigation'))
				{!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'footer__nav']) !!}
				@endif
			</nav>
			<nav class="footer__secondnav">
				@if (has_nav_menu('footer_second'))
				{!! wp_nav_menu(['theme_location' => 'footer_second','menu_class' => 'footer__nav']) !!}
				@endif
			</nav>
			<div class="footer__button">
				@if ($phone)
				<a href="tel:{{ clearSpace($phone) }}" class=" button button--icon">
					@include('svg.phone')
					{{ $phone }}
				</a>
				@endif
				<a href="mailto:{{ $email }}" class="footer__email text">{{ $email }}</a>
			</div>
		</div>
		<div class="footer__copyright link--menu">
			COPYRIGHT 2019 © PEIRA.PL. WSZELKIE PRAWA ZASTRZEŻONE.
			@if($iq)
			<a class="footer__madeby" href="https://ilike-art.com/">
				created by <img class="footer__by" src="{!! $iq['url'] !!}" alt="logo" />
			</a>
			@endif
		</div>
	</div>
	</div>
</footer>