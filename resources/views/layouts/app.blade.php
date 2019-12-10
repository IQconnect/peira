<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body {!! body_class() !!} style="overflow-x: hidden">
    <div class="preloader" preloader ></div>
    @php do_action('get_header') @endphp
    @include('partials.header')
    @include('partials.cart')
    <div class="wrap" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
