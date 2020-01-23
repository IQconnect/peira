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

  <section class="section section--light section--no-top" id="lista-mieszkan" data-single-section>
    <div class="section__wrapper section__wrapper--shade">
        <div class="container">
          @php
            $flats = [];
            if( $_SESSION['cart'] ) {

              foreach ($_SESSION['cart'] as $item) {
                $flat = get_flat($item['id'], $item['invest']);
                array_push($flats, $flat);
              }
            }
          @endphp
          @include('components.table', ['flats'=>$flats, 'title'=>'Koszyk'])
        </div>
    </div>
</section>
@endsection
