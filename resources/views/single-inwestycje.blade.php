@extends('layouts.app')

  @section('content')

  @php $sections = get_field('components') @endphp

    @include('sections.small-hero', ['data'=>get_field('small-hero')])
    @include('sections.single-nav')
    @include('sections.search-flat')
    @include('sections.location-map')
    @include('sections.text-slide', ['data'=>get_field('text-slide'), 'ID'=>'osiedle'])
    @include('sections.invest-gallery')
    @include('sections.text-avatar', ['data'=>get_field('finansowanie'), 'ID'=>'finansowanie', 'theme'=>'light'])
    @include('sections.text-avatar', ['data'=>get_field('finish'), 'ID'=>'wykonczenia-pod-klucz', 'theme'=>'shade'])
    @include('sections.contactform')

@endsection
