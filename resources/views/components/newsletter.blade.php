<section class="newsletter">
	<div class="container-fluid col-p-normal">
		<h3><?= $title; ?></h3>
		<p><?= $sub; ?></p>
		<form>
			<div class="newsletter__inputs">
				<input class="input" type="email" name="email" required placeholder="<?= __('Twój e-mail', 'peira'); ?>">
				<button class="btn btn--one"><?= __('Zapisz się', 'peira'); ?></button>
			</div>
			<div class="newsletter__terms">
				<p>Informujemy, iż Pani/Pana dane będą przetwarzane w celu podjęcia działań na Pani/Pana żądanie przed zawarciem umowy. Administratorem Pani/Pana danych osobowych jest PEIRA Sp. z o.o. Sp. k. z siedzibą w Łodzi przy ul.Matejki 9. Przysługuje Pani/Panu prawo dostępu do nich, ich sprostowania oraz skargi do organu nadzorczego. Szczegóły pod adresem <a target="_blank" href="http://www.peira.pl/rodo/">www.peira.pl/rodo</a>.</p>
				<p class="checkbox">
					<input required type="checkbox" id="terms" name="terms">
					<label for="terms">wyrażam zgodę na przetwarzanie danych w celach marketingowych, w tym przekazywanie mi zgodnie z ustawą z dnia 18 lipca 2002r. o świadczeniu usług drogą elektroniczną, na podany adres e-mail lub telefon, informacji handlowej na temat projektów realizowanych przez PEIRA Sp. z o.o. Sp. k. z siedziba w Łodzi oraz spółki PEIRA Srebrzyńska Sp. z o.o. Sp.k., PEIRA Helińskiego Sp. z o.o. Sp.k., PEIRA Przybyszewskiego sp. z o.o. sp.k, w tym wysyłanej za pośrednictwem urządzeń końcowych oraz automatycznych systemów wywołujących.</label>
				</p>
			</div>
		</form>
	</div>
</section>