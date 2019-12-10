{{--
  Template Name: Koszyk
--}}

@extends('layouts.app')

  @section('content')

  @php $sections = get_field('components') @endphp

  @if($sections)
    @foreach ($sections as $section)
      @php ($sectionName = $section['acf_fc_layout']) @endphp
        @include('sections.' . $sectionName, ['data'=>$section])
    @endforeach
  @endif

  <section class="section">
    <div class="container">
        <section class="big-cart" cart id="big-cart">
            <div class="cart__wrapper">
              <div class="cart__cart-wrapper">
                @include('components.cart-list')
              </div>
            </div>
            @if( $_SESSION['cart'] ) 
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
          @endif
        </section>
    </div>
  </section>
@endsection
