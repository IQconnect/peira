<?php
	add_action('phpmailer_init', function ($mailer) {
		$mailer->isSMTP();
		$mailer->Host = 'serwer1608780.home.pl';
		$mailer->SMTPAuth = true;
		$mailer->Username = 'kontakt@peira.pl';
		$mailer->Password = ',HP2rLXOBK_A';
		$mailer->SMTPSecure = 'tls';
		$mailer->Port = 587;
		$mailer->isHTML(true);
		$mailer->CharSet = 'utf-8';
		$mailer->SMTPDebug = 2;
	}, 10, 1);
	
	if (isset($_POST['send_email'])) {
		
		// dane
		$to = 'kontakt@peira.pl';
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$name = $_POST['name'];
		$from = $_POST['email'];
		$phone = $_POST['phone'];
		
		// nagłówki
		$headers[] = 'To: "PEIRA" <'.$to.'>';
		$headers[] = 'From: "'.$name.'" <'.$from.'>';
		
		// treść wiadomości
		$content .= '<b>Temat:</b> ' . $subject . '<br>';
		$content .= '<b>Imię i nazwisko:</b> ' . $name . '<br>';
		$content .= '<b>Numer telefonu:</b> ' . $phone . '<br>';
		$content .= '<b>Adres email:</b> ' . $from . '<br>';
		$content .= '<b>Zgoda na działania marketingowe:</b> ' . ($_POST['terms1'] ? 'tak' : 'nie') . '<br>';
		$content .= '<br>' . $message . '<br>';
		
		// wysyłanie
		echo wp_mail($to, '[Formularz Peira]: ' . ($subject ? $subject : $name), $content, $headers);
		
		die;
	}
	
	if (isset($_POST['send_cart'])) {
		
		// dane
		$to = $_POST['email'];
		$subject = '[Peira] Twoje ulubione mieszkania';
		
		// nagłówki
		$headers[] = 'To: <'.$to.'>';
		$headers[] = 'From: "PEIRA" <kontakt@peira.pl>';
		
		// treść wiadomości
		$content .= 'Dzień dobry,<br><br>';
		$content .= 'W załączniku przesyłamy wybrane przez Ciebie mieszkania – informacje i rzuty.<br>Umów się z nami na obejrzenie inwestycji.<br><br>';
		$content .= 'Zespół Sprzedażowy PEIRA';
		
		// załącznik
		$attachment = get_template_directory() . '/tmp/ulubione_mieszkania_peira.pdf';
		$mpdf = generate_flats_pdf($_POST['flats']);
		$mpdf->Output($attachment, 'F');
		
		// wysyłanie
		echo wp_mail($to, $subject, $content, $headers, $attachment);
		
		die;
	}
?>