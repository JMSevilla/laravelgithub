@extends('parts.template') 
@section('content')
  <div class="container-top-items parallax-window parallax-homepage" data-parallax="scroll" data-image-src="../images/back_header.png" data-speed="0.3">
<!--     <div class="container container-text-over-parallax">
      <div class="titlu-text-over-parallax">
        Connecting people with movies they love
      </div>
      <div class="text-over-parallax">
        Create an account and unleash the power of Movie Circle. Search through thousands of actors, projects, locations and other in the largest database of movie production. 
      </div>
    </div> -->
  </div>
  <main id="content">
    <div class="container">
      <div class="accounts-type-container container-types-homepage">
        @foreach($account_types as $type)
          <div class="accounts-type-box-container">
            @if($type->id == 1 || $type->id == 2)
            <div class="over-accounts-type-box-container"></div>
            @endif
            <div class="accounts-icon-box"><img src="{{Voyager::image($type->icon)}}" /></div>
            <div class="accounts-title-box">{{$type->title}}</div>
            <div class="accounts-text-box">{!! $type->description !!}</div>
            <a href="account-login?type={{$type->title}}" class="btn-general btn-create-account-producer">{{__('statics.create_account')}}</a>
          </div>
        @endforeach
      </div>
      <div class="container-categories container-cats-homepage">
        <div class="general-title-element general-title-big-centered">{{__('statics.trending_profiles')}}</div>
<!--         <div class="container-listing-categories profiles-listing">
          <div class="category-item active-category">Horror</div>
          <div class="category-item">Adventure</div>
          <div class="category-item">Celebrities</div>
          <div class="category-item">Cars</div>
          <div class="category-item">New in</div>
          <div class="category-item">Make-up</div>
          <div class="category-item">Locations</div>
          <div class="category-item">Photograpgy</div>
          <div class="category-item">Costumes</div>
        </div> -->
      </div>
      <div class="listare-elemente-responsive profiles-listing">
        @include('parts.listing_users')
      </div>
      <div class="container-categories container-cats-homepage">
        <div class="general-title-element general-title-big-centered">{{__('statics.trending')}} {{__('statics.jobs')}}</div>
        <div class="container-listing-categories jobs-listing">
          @foreach($job_tags as $job_tag)
            <div class="category-item" tag_name="{{$job_tag->name}}">{{$job_tag->name}}</div>
          @endforeach
        </div>
      </div>
      <div class="listare-elemente-responsive jobs-listing">
        @include('parts.listing_jobs')
      </div>
      <a href="/search?q=&type-item-search=jobs" class="more-items-container">
        <div class="text-normal">{{__('statics.more_btn')}}</div>
        <i class="fa fa-angle-down pulse"></i>
      </a>
    </div>
    <div class="container-items-two-columns">
      <div class="item-left-home">
        <img src="../images/back_join.png" class="rotating"/>
      </div>
      <div class="item-right-home">
        <div class="item-right-content">
          <div class="title-normal-item">{{settings('statics.index_join_title')}}</div>
          <div class="text-normal-item">{{settings('statics.index_join_text')}}</div>
          @if(Session::has('user'))
            <a href="/user/main_profile" class="custom-btn btn-albastru btn-join">{{__('statics.my_profile_title')}}</a>
          @else
            <a href="/user/main_profile" class="custom-btn btn-albastru btn-join">{{__('statics.login_btn')}}</a>
          @endif
        </div>
      </div>
    </div>
  </main>
@endsection
@push('scripts')
  <script>
    AOS.init();

  </script>
@endpush