<section class="cart" cart id="cart">
  <div class="cart__wrapper">
    <header class="cart__header">
      <h3 class="cart__title subtitle">
        Koszyk
      </h3>
      <button class="cart__close button button--transparent" cart-close></button>
    </header>
    <div class="cart__cart-wrapper">
      @include('components.cart-list')
    </div>
  </div>
  <footer class="cart__wrapper cart__wrapper--dark">
    <h3 class="cart__title subtitle">
      Wyślij ofertę na e-maila
    </h3>
    <form class="cart__form" data-form  data-aftersend="Oferta została wysłana" action="./" method="POST">
      <input class="cart__input" type="email" name="email" id="cart_email" placeholder="E-mail">
      <button class="cart__form-button button">
        Wyślij
      </button>
    </form>
    <div class="cart__wrapper-button">
      <button class="button" >
          GENERUJ OFERTĘ W PDF
      </button>
      <a href="{{ home_url('/koszyk') }}" class="button" >
          ZOBACZ KOSZYK
      </a>
    </div>
  </footer>
</section>
