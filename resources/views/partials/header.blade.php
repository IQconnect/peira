@php    
  $logo = option('logo_header');
@endphp

<header class="header" header>
  <div class="container container--fluid">
    <div class="header__wrapper">
      <a class="header__brand" href="{{ home_url('/') }}">
        <img src="{{  $logo['url'] }}" alt="{{  $logo['alt'] }}">
      </a>
      <nav class="header__nav" data-nav>
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'header__menu']) !!}
        @endif
      </nav>
      @include('components.hamburger')
      @include('components.widgets', ['class'=> 'header__widgets'])
    </div>
  </div>
</header>
