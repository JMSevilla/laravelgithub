@extends('parts.template') 
@section('content')
  <main id="content" class="content-black">
    <div class="container container-page-without-header">
      <div class="page-title-center">{{__('statics.pricing_title')}}</div>
      <div class="container-pricing-elements">
        <div class="pricing-element-box-list" data-aos="fade-right">
          <ul class="menu-listing-prices">
            <li><a class="menu-listing-pricing-active">{{__('statics.montly_plan')}}</a></li>
            <li><a>{{__('statics.plan_title')}}</a></li>
            <li><a>{{__('statics.montly_title')}}</a></li>
            <li><a>{{__('statics.projects_title')}}</a></li>
            <li><a>{{__('statics.space_title')}}</a></li>
          </ul>
        </div>
        <div class="pricing-element-box active-pricing-box" data-aos="fade-up">
         <div class="content-box-pricing-elements"> 
            <div class="pricing-icon">
              <img src="images/icon_user.png" />
            </div>
            <div class="pricing-title">{{__('statics.user_title')}}</div>
            <div class="pricing-price">9.99$</div>
            <div class="pricing-projects">3 {{__('statics.projects_title')}}</div>
            <div class="pricing-memory">10 gb</div>
            <div class="btn-general btn-buy-user-pricing btn-buy-user-pricing-active">{{__('statics.buy_title')}}</div>
         </div> 
          
        </div>
        <div class="pricing-element-box" data-aos="fade-down" data-aos-delay="250">
         <div class="content-box-pricing-elements"> 
            <div class="pricing-icon">
              <img src="images/icon_producer.png" />
            </div>
            <div class="pricing-title">{{__('statics.producer_title')}}</div>
            <div class="pricing-price">19.99$</div>
            <div class="pricing-projects">3 {{__('statics.projects_title')}}</div>
            <div class="pricing-memory">10 gb</div>
            <div class="btn-general btn-buy-user-pricing">{{__('statics.buy_title')}}</div>
          </div>
        </div>
        <div class="pricing-element-box" data-aos="fade-up" data-aos-delay="500">
         <div class="content-box-pricing-elements"> 
          <div class="pricing-icon">
            <img src="images/icon_crew.png" />
          </div>
          <div class="pricing-title">{{__('statics.crew_title')}}</div>
          <div class="pricing-price">49.99$</div>
          <div class="pricing-projects">3 {{__('statics.projects_title')}}</div>
          <div class="pricing-memory">50 gb</div>
          <div class="btn-general btn-buy-user-pricing">{{__('statics.buy_title')}}</div>
         </div>
        </div>
        <div class="pricing-element-box" data-aos="fade-down" data-aos-delay="750">
         <div class="content-box-pricing-elements"> 
          <div class="pricing-icon">
            <img src="images/icon_agency.png" />
          </div>
          <div class="pricing-title">{{__('statics.agency_title')}}</div>
          <div class="pricing-price">99.99$</div>
          <div class="pricing-projects">3 {{__('statics.projects_title')}}</div>
          <div class="pricing-memory">100 gb</div>
          <div class="btn-general btn-buy-user-pricing">{{__('statics.buy_title')}}</div>
         </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@push('scripts')
  <script>
    $(document).ready(function(){
      AOS.init();
      $(".pricing-element-box").hover(function(){
        $(".active-pricing-box").removeClass('active-pricing-box');
        $(".btn-buy-user-pricing-active").removeClass('btn-buy-user-pricing-active');
      });
    });
  </script>
@endpush