const CONFIG = {
  ELEM: '[data-nav]',
  HEADER: '[data-header]',
  TRIGGER: '[data-toggle-menu]',
  CLASS: {
    active: '-is-active',
  },
};

const Menu = {
  init() {
    const { ELEM, TRIGGER, HEADER, CLASS } = CONFIG;

    this.elem = document.querySelector(ELEM);
    this.header = document.querySelector(HEADER);
    this.trigger = document.querySelectorAll(TRIGGER);

    this.class = CLASS;
    this.lastScroll = window.scrollY;

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

    window.addEventListener('scroll', () => {
      const scroll = window.scrollY;

      if (scroll > 100) {
        if (scroll > this.lastScroll) {
          this.header.classList.add('-hide');
        }

        else {
          this.header.classList.remove('-hide');
        }
      }

      else {
        this.header.classList.remove('-hide');
      }

      this.lastScroll = scroll;
    })

  },

  toggleClass(elem, classes) {
    elem.classList.toggle(classes);
  },
}

export default Menu;
