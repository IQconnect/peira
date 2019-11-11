@php
    $mail = option('send_email');

if($_POST['form_send'] == 1) {
    //user posted variables
    $name = $_POST['name'];
    $email = $_POST['email'];

    $message = "Zapytanie ze strony Peira o inwestycję: ". $_POST["invest"]. "\r\n";
    $message .= "Imię i nazwisko: " . $_POST["name"] . "\r\n";
    $message .= "Numer telefonu: " . $_POST["phone"] . "\r\n";
    $message .= "Email: " . $_POST["email"] . "\r\n";
    $message .= "Inwestycja: " . $_POST["invest"] . "\r\n";
    $message .= "Wiadomość: " . $_POST["message"] . "\r\n";

    //php mailer variables
    $to = $mail;
    $subject = "Nowe zgłoszenie ze strony infoShare ACADEMY";
    $headers = 'From: '. $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n";

    //Here put your Validation and send mail
    $sent = mail($to, $subject, strip_tags($message), $headers);
}
@endphp


@php
    $invests = [];
    $query = new WP_Query(array(
        'post_type' => 'inwestycje',
        'post_status' => 'publish'
    ));


    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
        $post  = get_post($post_id);

        $invest = [
            'name' => $post->post_title,
            'slug' => $post->post_name,
        ];

        array_push($invests, $invest);
    }

    wp_reset_query();

    $rodo = option('rodo');
    $terms = option('terms');
@endphp

<form action="./" method="post" data-aftersend="Wiadomość została wysłana." id="contact-form" data-form class="contact__form form">
    <h3 class="contact__title title">
        Formularz kontaktowy
    </h3>
    <div class="contact__cell">
        <input class="contact__input text" required="" type="text" name="name" placeholder="Imię i nazwisko">
        <input class="contact__input text" required="" type="email" name="email" placeholder="E-mail*">
    </div>
    <div class="contact__cell">
        <input class="contact__input text" type="text" name="phone" placeholder="Telefon">
        @if ($invests)
        <select class="contact__input text" name="invest" id="" required>
            <option disabled selected> Wybierz inwestycję* </option>
            @foreach ($invests as $item)
            <option value="{{ $item['name'] }}">{{ $item['name'] }}</option>
            @endforeach
        </select>
        @endif
    </div>
    <textarea class="contact__input text" required="" rows="6" name="message" placeholder="Wiadomość"></textarea>
    <div class="contact__terms-wrapper">
        <div class="contact__terms terms">
            {!! $rodo !!}
        </p>
        <p class="contact__checkbox terms">
            <input type="checkbox" id="terms1" name="terms1" required>
            <span class="contact__checkbox-box">X</span>
            <label for="terms1">{!! $terms !!}</label>
        </p>
    </div>
    <div class="contact__button">
        <input type="hidden" name="form_send" value=1>
        <button name="send_email" value="1" class="button button--big">WYŚLIJ WIADOMOŚĆ</button>
    </div>
</form>
