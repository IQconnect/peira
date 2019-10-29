const CONFIG = {
  ELEM: '[data-nav]',
  TRIGGER: '[data-toggle-menu]',
  CLASS: {
    active: '-is-active',
  },
};

const Menu = {
  init() {
    const { ELEM, TRIGGER, CLASS } = CONFIG;

    this.elem = document.querySelector(ELEM);
    this.trigger = document.querySelectorAll(TRIGGER);

    this.class = CLASS;

    this.addEvents();
  },

  addEvents() {
    this.trigger.forEach(element => {
      element.addEventListener('click', (e) => {
        const $this = e.currentTarget;

        this.toggleClass($this, this.class.active);
        this.toggleClass(this.elem, this.class.active);
      });
    });
  },

  toggleClass(elem, classes) {
    elem.classList.toggle(classes);
  },
}

export default Menu;
