const CONFIG = {
  TRIGGER: '[data-dropdown]',
  ELEM: '[data-toggle-button]',
  CLASS: '-is-active',
};

const dropdown = {
  init() {
    const { TRIGGER, ELEM, CLASS } = CONFIG;
    this.$elem = document.querySelectorAll(TRIGGER);

    this.$button = ELEM;
    this.$class = CLASS;
    this.addEvent();
  },

  addEvent() {
    this.$elem.forEach(element => {
      element.addEventListener('click', (event) => {
        const $this = event.currentTarget;
        const button = $this.querySelector(this.$button);

        button.classList.toggle('-is-active');
        $this.parentElement.classList.toggle(this.$class);
      });
    });
  },

};

export default dropdown;
