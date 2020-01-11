const CONFIG = {
  ELEM: '[preloader]',
  CLASS: '-hide',
}

const { ELEM, CLASS } = CONFIG;

const Preloader = {
  init() {
    this.elem = document.querySelector(ELEM);
    this.class = CLASS;

    this.hide();
  },

  hide() {
    this.elem.classList.add(this.class);
  },
}

export default Preloader;
