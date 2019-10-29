@php
    $phone = option('phone');
    $cartCount = 0;
@endphp

<div class="widgets @if($class) {{ $class }} @endif">
    @if (1)
    <button class="widgets__item widgets__item--cart button button--transparent" data-cart>
        @include('svg.cart')
        @if ($cartCount)
        <span class="widgets__count count minor-text">
            <span class="count--num">
                3
            </span>
        </span>
        @endif
    </button>
    @endif
    @if ($phone)
    <a href="tel:{{ clearSpace($phone) }}" class="widgets__item widgets__item--phone button button--icon">
        @include('svg.phone')
        {{ $phone }}
    </a>
    @endif
</div>
