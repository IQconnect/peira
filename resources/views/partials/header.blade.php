@php
  $logo = option('logo_header');
  $invest_link = option('invest_link');
@endphp

<header class="header @if(is_single()) header--stick header--single @endif" header data-header>
  <div class="container container--fluid">
    <div class="header__wrapper">
      <a class="header__brand" href="{{ home_url('/') }}">
        <img src="{{  $logo['url'] }}" alt="{{  $logo['alt'] }}">
      </a>
      @if(is_single())
      <div class="header__info">
        <a href="{{ $invest_link }}" class="header__info-link my-menu-link">
          @include('svg.arrow')
          {{ __('Wróć do listy inwestycji', 'Peira') }}
        </a>
      </div>
      @else
      <nav class="header__nav" data-nav>
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'header__menu']) !!}
        @endif
      </nav>
      @include('components.hamburger')
      @endif
      @include('components.widgets', ['class'=> 'header__widgets'])
    </div>
  </div>
</header>


<header class="header">
    <div class="container-fluid col-p-normal">
        <nav>
            <div class="header__left">
                <?php wp_nav_menu(array('menu_class'=>'header__menu', 'container'=>'', 'theme_location'=>'main-menu-left')); ?>
            </div>
            <div class="header__center">
                <a class="header__logo" href="<?= get_home_url(); ?>"><h1><img src="<?php bloginfo('template_url'); ?>/assets/images/logo-peira.png" alt="Peira"></h1>
                </a>
            </div>
            <div class="header__right">
                <?php wp_nav_menu(array('menu_class'=>'header__menu', 'container'=>'', 'theme_location'=>'main-menu-right')); ?>
                <ul class="header__icons">
                    <li>
                        <button data-open-cart id="toggle-cart" class="header__icon">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/icon_cart.png" alt="Koszyk">
                            <span class="header__badge" data-cart-count>3</span>
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
        <a class="header__mobile-logo" href="<?= get_home_url(); ?>">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/logo-peira.png" alt="Peira">
        </a>
        <div class="header__mobile-icons">
            <button id="hamburger" class="header__icon hamburger"></button>
            <button data-open-cart id="toggle-cart" class="header__icon">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/icon_cart.png" alt="Koszyk">
            </button>
        </div>
    </div>
</header>
