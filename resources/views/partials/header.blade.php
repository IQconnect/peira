@php    
  $logo = option('logo_header');
  $invest_link = option('invest_link');
@endphp

<header class="header @if(is_single()) header--stick header--single @endif" header>
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
