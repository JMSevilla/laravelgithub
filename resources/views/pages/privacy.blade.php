@extends('parts.template') 
@section('content')
  <main id="content" class="content-black">
    <div class="container container-page-without-header">
      <div class="page-title-center page-title-left">{{__('statics.privacy_policy')}}</div>
      <div class="container-normal-text">{!! settings('therms.privacy_policy') !!}</div>
    </div>
  </main>
@endsection