@extends('parts.template') 
@section('content')
  <main id="content" class="content-black">
    <div class="container container-page-without-header">
      <div class="page-title-center">{{__('statics.about_title')}}</div>
      <div class="image-about-back">
        <img src="../images/about_back.png" data-aos="zoom-in"/>
      </div>
      <div class="container-normal-text container-text-center">{!! settings('statics.about') !!}</div>
  </main>
@endsection
@push('scripts')
  <script>
    AOS.init();
  </script>
@endpush