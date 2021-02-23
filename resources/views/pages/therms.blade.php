@extends('parts.template') 
@section('content')
  <main id="content" class="content-black">
    <div class="container container-page-without-header">
      <div class="page-title-center page-title-left">{{__('statics.therms_condition_title')}}</div>
      <div class="container-normal-text">{!! settings('therms.therms_condition') !!}</div>
    </div>
  </main>
@endsection