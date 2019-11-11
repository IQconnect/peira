const CONFIG = {
  ELEM: '[cart]',
  CLOSE: '[cart-close]',
  TRIGGER: '[cart-toggle]',
  CLASS: '-is-active',
  CART_ADD: '[data-cart-add]',
  CART_REMOVE: '[data-cart-remove]',
  CART_COUNT: '[data-cart-count]',
}

const { ELEM, CLOSE, TRIGGER, CLASS, CART_ADD, CART_REMOVE, CART_COUNT } = CONFIG;

const Cart = {
  init(allow = true) {
    this.elem = document.querySelector(ELEM);
    this.close = document.querySelector(CLOSE);
    this.trigger = document.querySelectorAll(TRIGGER);
    this.cartAdd = document.querySelectorAll(CART_ADD);
    this.cartRemove = document.querySelectorAll(CART_REMOVE);
    this.cartCountElem = document.querySelectorAll(CART_COUNT);
    this.class = CLASS;
    this.cartCount = parseInt(this.cartCountElem[0].dataset.cartCount);

    this.addEvent(allow);
    this.count();
  },

  count() {
    this.cartCountElem.forEach(elem=> {
      this.cartCount =  $('#cart li').length;
      elem.dataset.cartCount = $('#cart li').length;

      elem.innerText = $('#cart li').length;
    })
  },

  addEvent(allow = true) {

    console.log(allow)

    if(allow) {
      this.trigger.forEach(element => {
        element.addEventListener('click', () => {
          this.show();
        })
      });

      this.cartAdd.forEach(element => {
        element.addEventListener('click', (e) => {
          e.preventDefault();

          let link = e.currentTarget.getAttribute('href');

          link = link.replace(/ /g, '%20');
          this.loadCart(link);

          this.cartCount = this.cartCount + 1;
          this.count();
        })
      });
    }

    this.close.addEventListener('click', () => {
      this.hide();
      console.log('hide');
    })

    this.cartRemove.forEach(element => {
      element.addEventListener('click', (e) => {
        e.preventDefault();

        const $this = e.currentTarget;


        $this.closest('li').remove();
        let link = $this.getAttribute('href');

        link = link.replace(/ /g, '%20');
        this.remove(link);

        this.count();

        if(this.cartCount == 0) {
          this.hide();
        }
      })
    });
  },

  hide() {
    this.elem.classList.remove(this.class);
  },

  show() {
    if(this.cartCount) {
      this.elem.classList.add(this.class);
      console.log('show-cart');
    }
  },

  loadCart(link) {
    const init = allow => this.init(allow);
    const show = () => this.show();
    const hide = () => this.hide();
    const count = () => this.count();

    $('#cart').load(link + ' #cart>*', function () {
      console.log('added ', link);
      init(false);
      if($('#cart li').length) {
        show();
      }

      else {
        hide();
      }

      count();
    })
  },

  remove(link) {
    $.post(link, function( data ) {
      console.log('delete', data)
    });
  },
}

export default Cart;
