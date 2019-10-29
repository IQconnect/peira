<section class="contact section">
    <div class="container">
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
                <select class="contact__input" name="" id="">
                    <option value="sr">
                        Srebrzyńska Park
                    </option>
                    <option value="her">
                        Hilińskiego Park
                    </option>
                </select>
            </div>
            <textarea class="contact__input text" required="" rows="6" name="message" placeholder="Wiadomość"></textarea>
            <div class="contact__terms">
                <p>Informujemy, iż Pani/Pana dane będą przetwarzane w celu podjęcia działań na Pani/Pana żądanie przed zawarciem umowy. Administratorem Pani/Pana danych osobowych jest PEIRA Sp. z o.o. Sp. k. z siedzibą w Łodzi przy ul.Matejki 9. Przysługuje Pani/Panu prawo dostępu do nich, ich sprostowania oraz skargi do organu nadzorczego. Szczegóły pod adresem <a target="_blank" href="http://www.peira.pl/rodo/">www.peira.pl/rodo</a>.</p>
                <p class="contact__checkbox checkbox">
                    <input type="checkbox" id="terms1" name="terms1">
                    <label for="terms1">wyrażam zgodę na przetwarzanie danych w celach marketingowych, w tym przekazywanie mi zgodnie z ustawą z dnia 18 lipca 2002r. o świadczeniu usług drogą elektroniczną, na podany adres e-mail lub telefon, informacji handlowej na temat projektów realizowanych przez PEIRA Sp. z o.o. Sp. k. z siedziba w Łodzi oraz spółki PEIRA Srebrzyńska Sp. z o.o. Sp.k., PEIRA Helińskiego Sp. z o.o. Sp.k., PEIRA Przybyszewskiego sp. z o.o. sp.k, w tym wysyłanej za pośrednictwem urządzeń końcowych oraz automatycznych systemów wywołujących.</label>
                </p>
            </div>
            <div class="contact__button">
                <button name="send_email" value="1" class="btn btn--one">Wyślij</button>
            </div>
        </form>
    </div>
</section>
