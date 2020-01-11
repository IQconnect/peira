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

      $.ajax({
        type: 'POST',
        url: url,
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
          form.innerHTML = `<p class="form__message">${form.dataset.aftersend}</p>`
          console.log('Send', data); // show response from the php script.
        },
      });
    })
  },
}

export default Form;
