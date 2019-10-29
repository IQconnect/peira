<form class="form" id="form" action="https://apartamentyjuno.pl/mail.php" method="POST">
  <!-- form__row -->
  <div class="form__row">
    <div class="form__col">
      <label for="name" class="form__label text">Imie i nazwisko</label>
      <input id="name" name="name" type="text" class="form__input" />
    </div>
  </div>
  <!-- form__row -->
  <div class="form__row">
    <div class="form__col">
      <label for="mail" class="form__label text">Mail</label>
      <input id="mail" name="mail" type="mail" class="form__input" />
    </div>
    <div class="form__col">
      <label for="tel" class="form__label text">Telefon</label>
      <input id="tel" name="tel" type="tel" class="form__input" />
    </div>
  </div>
  <!-- form__row-->
  <div class="form__col">
    <label for="message" class="form__label text" for="name">Wiadomość</label>
    <textarea id="message" name="message" class="form__textarea" rows="12" name="textarea"></textarea>
  </div>
  <!-- form__checkcontainer -->
  <div class="form__checkcontainer">
    <div class="form__col-message">
      <input id="checkbox" name="checkbox" class="form__check" type="checkbox" name="checkbox" />
      <label
        class="form__labelcheck small-text form__label--textnearcheck "
        for="checkbox"
      >
        {{ get_field('form_terms', 'options') }}
      </label>
    </div>
  </div>
  <!-- form__row -->
  <div class="form__row">
    <div class="form__col--send">
      <button class="button button--secondary text  main text--thin">
        Wyślij
      </button>
    </div>
  </div>
</form>
