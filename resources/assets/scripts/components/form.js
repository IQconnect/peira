import 'jquery';

const CONFIG = {
  FORM: '[data-form]',
  CLASS: '-send',
}

const { FORM, CLASS } = CONFIG;

const Form = {
  init() {
    this.form = $(FORM);

    this.addEvent();
  },

  addEvent() {
    this.form.on('submit', function (e) {
      e.preventDefault();

      const form = $(this);
      const url = form.attr('action');

      form.addClass(CLASS);

      console.log('send', url);
      form.serialize();
      form.css('min-height', form.height());
      form.html(`<h3 class="contact__title title">Formularz kontaktowy</h3><p class="contact__message">${form.data('aftersend')}</p>`);

      // $.ajax({
      //   type: 'POST',
      //   url: url,
      //   data: form.serialize(), // serializes the form's elements.
      //   success: function (data) {

      //     $('.form').html('test');
      //     console.log('Send', data); // show response from the php script.
      //   },
      //   error: function () {
      //     form.innerHTML = '<p class="form__message">Nie udało się wysłać wiadomości</p>';
      //   },
      // });
    })
  },
}

export default Form;
