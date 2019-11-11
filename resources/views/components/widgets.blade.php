@php
    $phone = option('phone');
    $cartCount = count($_SESSION['cart']);
@endphp

<div class="widgets @if($class) {{ $class }} @endif">
    @if (1)
    <button class="widgets__item widgets__item--cart button button--transparent" cart-toggle>
        @include('svg.cart')
        <span class="widgets__count count table-label">
            <span class="count--num" data-cart-count={{ $cartCount }}>
                {{ $cartCount }}
            </span>
        </span>
    </button>
    @endif
    @if ($phone)
    <a href="tel:{{ clearSpace($phone) }}" class="widgets__item widgets__item--phone button button--icon">
        @include('svg.phone')
        {{ $phone }}
    </a>
    @endif
</div>
