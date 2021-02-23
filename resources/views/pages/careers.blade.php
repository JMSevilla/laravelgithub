@extends('parts.template') 
@section('content')
  <main id="content" class="content-black">
    <div class="container container-page-without-header">
      <div class="page-title-center">{{__('statics.careers_title')}}</div>
      <div class="container-careers">
        <div class="career-box" data-aos="fade-down-right">
          <div class="career-title">{{__('statics.marketing_title')}}</div>
          <div class="career-text">{{settings('statics.careers_marketing_desc')}}</div>
          <a data-fancybox="job1" data-src="#apply-top-the-job-popup" class="btn-general btn-buy-user-pricing">{{__('statics.apply_now')}}</a>
        </div>
        <div class="career-box" data-aos="fade-down-right" data-aos-delay="250">
          <div class="career-title">{{__('statics.sales_title')}}</div>
          <div class="career-text">{{settings('statics.careers_sales_desc')}}</div>
          <a data-fancybox="job2" data-src="#apply-top-the-job-popup" class="btn-general btn-buy-user-pricing">{{__('statics.apply_now')}}</a>
        </div>
        <div class="career-box" data-aos="fade-down-right" data-aos-delay="500">
          <div class="career-title">{{__('statics.generalmanager_title')}}</div>
          <div class="career-text">{{settings('statics.careers_generalmanager_desc')}}</div>
          <a data-fancybox="job3" data-src="#apply-top-the-job-popup" class="btn-general btn-buy-user-pricing">{{__('statics.apply_now')}}</a>
        </div>
      </div>
      <div class="fancybox container-form-apply-job" id="apply-top-the-job-popup">
        <div class="apply-job-title">{{__('statics.title_apply_job')}}</div>
        <form class="form-apply-job">
          <div class="apply-job-inputs-container">
            <div class="form-apply-job-left">
              <input type="text" name="name" placeholder="{{__('statics.enter_name')}}"/>
              <input type="text" name="email" placeholder="{{__('statics.enter_email')}}"/>
              <input type="text" name="phone" placeholder="{{__('statics.enter_phone')}}"/>
              <input id="add-cv" type="file" name="cs" placeholder="Add CV" style="display: none;"/>
              <label for="add-cv" class="label-add-cv">{{__('statics.add')}} CV</label>
            </div>
            <div class="form-apply-job-right">
              <textarea placeholder="{{__('statics.enter_message')}}"></textarea>
            </div>
          </div>
          <div class="apply-job-bottom">
            <div class="text-left-apply-job">{{__('statics.agree_form')}}</div><button class="custom-btn btn-albastru btn-apply-job">{{__('statics.send_message')}}</button>
          </div>
        </form>
      </div>
    </div>
  </main>
@endsection
@push('scripts')
  <script>
    $(document).ready(function(){
      $('#add-cv').change(function(e){
        if($(this).val().split('\\').pop() != ''){
          $(".label-add-cv").html($(this).val().split('\\').pop()+ " added");
        } else{
          $(".label-add-cv").html("No file added");
        }
      });
      AOS.init();
    });
  </script>
@endpush