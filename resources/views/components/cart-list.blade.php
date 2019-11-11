@php
  if( $_SESSION['cart'] ) {
    $flats = [];

    foreach ($_SESSION['cart'] as $item) {
      $flat = get_flat($item['id'], $item['invest']);
      array_push($flats, $flat);
    }
  }
@endphp

@if ($flats)
<ul class="cart-list">
    @foreach ($flats as $flat)
    <li class="cart-list__elem">
      @include('components.cart-elem', ['flat'=>$flat, 'index' =>$loop->index])
    </li>
    @endforeach
</ul>
@else
<p class="text">Twój koszyk jest pusty</p>
@endif



