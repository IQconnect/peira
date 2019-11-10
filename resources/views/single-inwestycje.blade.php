@extends('layouts.app')

  @section('content')

  @php $sections = get_field('components') @endphp

    @include('sections.small-hero', ['data'=>get_field('small-hero')])
    @include('sections.single-nav')
    @include('sections.search-flat')
    @include('sections.location-map')
    @include('sections.text-slide', ['data'=>get_field('text-slide'), 'ID'=>'osiedle'])
    @include('sections.invest-gallery')
    @include('sections.contactform')

@endsection
