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

          const $this = e.currentTarget;

          if($this.classList.contains(this.class)) {
            document.querySelector(`[data-cart-remove="${$this.dataset.cartAdd}"]`).click();
            $this.classList.remove(this.class);
          }

          else {
            $this.classList.add(this.class);
            let link = $this.getAttribute('href');

            link = link.replace(/ /g, '%20');
            this.loadCart(link);

            this.cartCount = this.cartCount + 1;
          }
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

        const addBtn = document.querySelector(`[data-cart-add="${$this.dataset.cartRemove}"]`);
        if(addBtn.classList.contains(this.class)) {
          addBtn.classList.remove(this.class);
        }

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
    // Open cart when add item to basket
    // const show = () => this.show();
    // const hide = () => this.hide();
    const count = () => this.count();

    $('#cart').load(link + ' #cart>*', function () {
      console.log('added ', link);
      init(false);
      // Open cart when add item to basket
      // if($('#cart li').length) {
      //   show();
      // }

      // else {
      //   hide();
      // }

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
