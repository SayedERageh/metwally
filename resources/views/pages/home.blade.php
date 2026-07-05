@extends('layouts.app')

@section('title', 'الصفحة الرئيسية')

@section('content')

  <main class="main">
@include('components.carouselHero')
   @include('components.Featured')

@include('components.features')
@include('components.call')
@include('components.onfocus')
@include('components.services')

<!-- Testimonials Section -->
@include('components.testimonials')
<!-- /Testimonials Section -->
<!-- FAQ Section -->
@include('components.faq')

        <!-- Clients Section -->
@include('components.clients')
    

  </main>

@endsection