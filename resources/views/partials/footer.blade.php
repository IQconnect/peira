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
		<figure class="footer__wraplogo">
		<img src="{{ $logo['url'] }}" alt="Peira" class="footer__logo" />
		</figure>
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

		</div>
	</div>
	</div>
	@if($iq)
		<a class="footer__madeby" href="https://ilike-art.com/">
			created by <img class="footer__by" src="{!! $iq['url'] !!}" alt="logo" />
		</a>
	@endif
</footer>
<section class="cart">
  <h3><?= __('Koszyk', 'peira'); ?> (<span data-cart-count>3</span>)</h3>
  <button class="cart__close"></button>
  <div class="cart__container"></div>
<p hidden class="cart__empty">Twój koszyk jest pusty.</p>
  <form id="cart-form" method="POST">
      <h4><?= __('Wyślij na e-maila', 'peira'); ?></h4>
      <div class="newsletter__inputs">
          <input class="input" type="email" name="email" required placeholder="<?= __('Twój e-mail', 'peira'); ?>">
          <button name="send_cart" value="1" class="btn btn--one"><?= __('Wyślij', 'peira'); ?></button>
      </div>
     
  </form>
  <p style="margin-top: 5rem;">
      <a style="" id="see-cart" class="btnone" href="#">przejdź do koszyka</a>
      <a style="padding: 1rem 2rem;" id="see-pdf" class="btnone" target="_blank" href="#">wygeneruj plik
          PDF</a>
  </p>
</section>
<div class="cookies">
<div class="container">
<p>Nasz serwis wykorzystuje pliki cookies. Możesz zrezygnować ze&nbsp;zbierania informacji poprzez pliki cookies,<br>
zmieniając ustawienia Twojej przeglądarki -&nbsp;w takim przypadku nie gwarantujemy poprawnego działania serwisu.</p>
<p><a href="<?= get_home_url(); ?>/informacje-prawne/polityka-cookies/">Więcej</a> | <a href="#" class="cookies__agree">Akceptuję</a></p>
</div>
</div>
<footer class="footer">
  <div class="container-fluid col-p-normal">
      <div class="row justify-content-center">
          <div class="col-xl-4 col-md-4 col-sm-4">
              <img class="footer__logo" src="<?php bloginfo('template_url'); ?>/assets/images/logo-peira-orange.png" alt="Peira">
          </div>
<?php $info = get_field('footer_info', 19); // 19 - contact page id ?>
          <div class="col-xl-2 col-md-3 col-sm-4 col-6">
              <p><a href="tel:+<?= $info[0]['phone']; ?>"><?= $info[0]['phone']; ?></a></p>
              <p><a href="mailto:<?= $info[0]['email']; ?>"><?= $info[0]['email']; ?></a></p>
          </div>
          <div class="col-xl-2 col-md-3 col-sm-4 col-6">
              <p><a href="tel:+<?= $info[1]['phone']; ?>"><?= $info[1]['phone']; ?></a></p>
              <p><a href="mailto:<?= $info[1]['email']; ?>"><?= $info[1]['email']; ?></a></p>
          </div>
          <div class="col-xl-8 col-md-10 col-sm-12">
              <p class="footer__copyright"><?= __('© Peira. Wszelkie prawa zastrzeżone.', 'peira'); ?></p>
          </div>
      </div>
  </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyF91ePW7ukaHo0VPgbngk4ul63tgcJP4"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/js/jquery.tablesorter.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/assets/scripts/main.js"></script>
<script src="https://stopka.ila.li/assets/scripts/footer.js"></script>
<?php wp_footer(); ?>
</body>
</html>

