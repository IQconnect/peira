@extends('layouts.app')

  @section('content')

  @php $sections = get_field('components') @endphp

    @include('sections.small-hero', ['data'=>get_field('small-hero')])
    @include('sections.single-nav')
    @include('sections.search-flat')
    @include('sections.location-map')
    @include('sections.invest-gallery')

@endsection
