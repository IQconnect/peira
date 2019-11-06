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


<form data-aftersend="Wiadomość została wysłana." id="contact-form" class="contact__form form">
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
        <select class="contact__input text" name="" id="" required>
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
        <button name="send_email" value="1" class="button button--big">WYŚLIJ WIADOMOŚĆ</button>
    </div>
</form>
