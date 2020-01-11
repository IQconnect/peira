@php
    $name = 'NR ' . $flat['id'] . ' '. $flat['investment'];
    $info = $flat['area'].'m² / '. $flat['rooms'] .' pokoje / piętro '. $flat['floor'];
    $price = $flat['price'];
    $price2 = $flat['price2'];
@endphp

<div class="cart-elem">
  <div class="cart-elem__header">
    <h4 class="cart-elem__title minor-text">
      {{ $name }}
    </h4>
    <div class="cart-elem__buttons">
      <a class="cart-elem__button button button--transparent" href={{ getPlanLink($flat) }} target="_blank">
        @include('svg.loop')
      </a>
      <a href="{{ home_url('/koszyk') }}/?cart_remove={{ $index }}" class="cart-elem__button button button--transparent" data-cart-remove="{{ $flat['investment'].'-'.$flat['id'] }}">
          @include('svg.trash')
      </a>
    </div>
  </div>
  <div class="cart-elem__price minor-text">
    {{ $price }} zł
    @if ($price2)
      <span class="cart-elem__price--old">
      {{ $price2 }} zł
      </span>
      <span class="cart-elem__price--label table-label">
        Promocja
      </span>
    @endif
  </div>
  <p class="cart-elem__info minor-text">
    {{ $info }}
  </p>
</div>
