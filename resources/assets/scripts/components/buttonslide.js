const CONFIG = {
  TRIGGER: '[data-slide-text]',
  CLASS: '-is-active',
};

const dropdown = {
  init() {
    const { TRIGGER, CLASS } = CONFIG;
    this.$elem = document.querySelectorAll(TRIGGER);

    this.$class = CLASS;
    this.addEvent();
  },

  addEvent() {
    this.$elem.forEach(element => {
      element.addEventListener('click', event => {
        const $this = event.currentTarget;

        console.log('test', $this);

        $this.classList.toggle(this.$class);
        $this.parentElement.classList.toggle(this.$class);
      });
    });
  },
};

export default dropdown;
