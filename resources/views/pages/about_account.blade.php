@extends('parts.template') 
@section('content')
  <main id="content" class="main-content-over-parallax" data-parallax="scroll" data-image-src="../images/back_login.png" data-speed="0.3">
    <div class="back-trick-over"></div>
    <div class="container-about-account">
      <div class="about-account-left">
        <div class="container-left-scroll">
          <div class="title-scroll-left">{{__('statics.scroll_title')}}</div>
          <div class="scroll-image">
            <img src="../images/scroll.png" class="pulse" />
          </div>
        </div>
      </div>
      <div class="about-account-right">
        <div class="container-top-about-account">
          <div class="titlu-big-account-type">
            {{__('statics.what_title')}} {{$type}} {{__('statics.account_title')}}
          </div>
          <div class="text-account-type">{{settings('statics.account_type')}}</div>
          <div class="custom-btn btn-albastru btn-create-account">{{__('statics.create_account')}}</div>
        </div>
        <div class="container-items-info-account">
          <div class="item-box-account" data-aos="zoom-in-left">
            <div class="item-box-account-left">
              <div class="container-image-box-account-left first-item-account">
               <img src="../../images/icon_distribute.png" />
             </div>
            </div>
            <div class="container-text-box-account-right">
              <div class="box-account-title">{{__('statics.distribute')}}</div>
              <div class="box-account-text">{{settings('statics.distribute_text')}}</div>
           </div>
          </div>
          <div class="item-box-account" data-aos="zoom-in-right" data-aos-delay="250">
            <div class="item-box-account-left">
              <div class="container-image-box-account-left second-item-account">
               <img src="../../images/icon_manage.png" />
             </div>
            </div>
            <div class="container-text-box-account-right">
              <div class="box-account-title">{{__('statics.manage')}}</div>
              <div class="box-account-text">{{settings('statics.manage_text')}}</div>
           </div>
          </div>
          <div class="item-box-account" data-aos="zoom-in-left" data-aos-delay="500">
            <div class="item-box-account-left">
              <div class="container-image-box-account-left third-item-account">
               <img src="../../images/icon_create.png" />
             </div>
            </div>
            <div class="container-text-box-account-right">
              <div class="box-account-title">{{__('statics.create')}}</div>
              <div class="box-account-text">{{settings('statics.create_text')}}</div>
           </div>
          </div>
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