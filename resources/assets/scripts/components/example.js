const CONFIG = {
  ELEM: '[data-example]',
};

const Example = {
  init() {
    const { ELEM } = CONFIG;

    this.$elem = document.querySelectorAll(ELEM);

    this.addEvents();
  },

  addEvents() {
    this.$elem.forEach(element => {
      element.addEventListener('click', (e) => {
        const $this = e.currentTarger;

        console.log($this);
      });
    });
  },
}

export default Example;
