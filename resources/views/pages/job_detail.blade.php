@extends('parts.template') 
@section('content')
<!--   <main id="content" class="content-black"> -->
<div class="container-test">
  <div class="project-background-top parallax-mirror-modified" data-parallax="scroll" data-image-src="../images/project_detail.png" data-speed="0.3">></div>
    <div class="container container-page-without-header">
      <div class="project-detail-container">
        <div class="project-detail-container-left">
          <div class="project-title">{{$job->title}}</div>
          <div class="project-status-type">
            <div class="project-subtitle-text">{{$job->location}}</div>
            <vertical-line class="vertical-blue"></vertical-line>
            @if(true)
              <div class="project-subtitle-text">{{__('statics.job_open')}}</div>
            @else
              <div class="project-subtitle-text project-closed">{{__('statics.job_closed')}}</div>
            @endif
          </div>
          <div class="container-center-project">
            <div class="item-project-center">
              <div class="desc-title">{{__('statics.category_title')}}</div>
              <div class="desc-text">
                <div class="container-listing-tags-item">
                  @foreach($job->tags as $tag_item)
                    <div class="tag-type-item-listing">{{$tag_item}}</div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
            <div class="item-project-center">
              <div class="desc-title">{{__('statics.salary_fee')}}</div>
              <div class="desc-text">
                <div class="budget-project-container">
                  @if($job->currency == 'dollar')
                    $ {{number_format($job->start_fee)}} - $ {{number_format($job->end_fee)}}
                  @else
                    € {{number_format($job->start_fee)}} - € {{number_format($job->end_fee)}}
                  @endif
                </div>
              </div>
            </div>
          <div class="item-project-bottom">
            <div class="desc-title">{{__('statics.job_description')}}</div>
            <div class="desc-text">{{$job->description}}</div>
          </div>
          <div class="item-project-bottom item-project-bottom-no-margin">
            <div class="desc-title">{{__('statics.files_title')}}</div>
            <div class="desc-text">
              <div class="project-files-container">
                @foreach($job->files as $file)
                  <div class="project-files-box">
                    <div class="project-files-box-icon">
                      <img src="../../images/folder.png" />
                    </div>
                    <div class="project-files-box-title-download">
                      <div class="project-files-title">{{$file['original_name']}}</div>
                      <a href="{{Voyager::image($file['download_link'])}}" download class="project-files-download">Download file</a>
                    </div>
                  </div>
                @endforeach
              </div>  
            </div>
          </div>
              <div class="fancybox container-form-apply-job" id="apply-job-popup">
                <div class="apply-job-title">{{__('statics.apply_to_job')}}</div>
                <form class="form-apply-job" action="{{action('JobController@applyToJob')}}" method="POST">
                  {{csrf_field()}}
                  <div class="error-form-container"></div>
                  <div class="apply-job-inputs-container">
                    <div class="form-apply-job-left">
                      <input type="hidden" name="job_user_id" value="{{$job->user_id}}"/>
                      <input type="text" name="name" placeholder="Your name"/>
                      <input type="text" name="email" placeholder="Your email"/>
                      <input type="text" name="phone" placeholder="Your phone"/>
                      <input type="text" class="upload-cv-trick" placeholder="Upload CV" readonly/>
                      <input style="display: none;" type="file" name="cv" class="real-file-cv" accept="application/pdf, application/vnd.ms-excel" />
                    </div>
                    <div class="form-apply-job-right">
                      <textarea name="message" placeholder="Your message"></textarea>
                    </div>
                  </div>
                  <div class="apply-job-bottom">
                    <div class="text-left-apply-job">{{__('statics.agree_form')}}</div>
                    <button class="custom-btn btn-albastru btn-apply-job">{{__('statics.send_message')}}</button>
                  </div>
                </form>
              </div>
          <a href="#apply-job-popup" data-fancybox="#apply-job-popup" class="custom-btn btn-albastru contact-project-owner">Apply to this job</a>
        </div>
        <div class="project-detail-container-right">
            <div class="desc-title">{{__('statics.gallery_title')}}</div>
            <div class="container-scroll-swiper">
              <div class="scroll-title">{{__('statics.scroll_title')}} {{__('statics.down_title')}}</div>
              <div class="scroll-image"><img src="../images/mouse.png"/></div>
            </div>
            <div class="swiper-container-gallery-project swiper-container">
              <div class="swiper-wrapper">
                @foreach($job->photos as $pic)
                  <a href="{{Voyager::image($pic)}}" class="swiper-slide swiper-slide-gallery-project" data-fancybox="galery">
                    <img src="{{Voyager::image($pic)}}" />
                  </a>
                @endforeach
              </div>
            </div>

        </div>
      </div>
    </div>
    </div>
<!--   </main> -->
@endsection
@push('scripts')
<script src="../js/wheel-indicator.js"></script>
  <script>
    function getDirection() {
        var windowWidth = window.innerWidth;
        var direction = window.innerWidth <= 768 ? 'horizontal' : 'vertical';

        return direction;
    }
    AOS.init();
    var swiper = new Swiper('.swiper-container-gallery-project.swiper-container', {
         breakpoints: {480: {slidesPerView: 3}},
         direction: getDirection(),
         on: {
          resize: function () {
            swiper.changeDirection(getDirection());
          }
        },
      direction: screen.width > 1024 ? 'vertical' : 'horizontal',
      mousewheel: true,
      speed: 500,
      parallax: true,
      autoplay: true,
      loop: true,
      slidesPerView: 4,
      spaceBetween: 30,
      breakpoints: {
        // when window width is >= 320px
        320: {
          slidesPerView: 2,
          spaceBetween: 20
        },
        // when window width is >= 480px
        480: {
          slidesPerView: 3,
          spaceBetween: 30
        }
      }
    });
    var indicator = new WheelIndicator({
      elem: document.querySelector('.swiper-container-gallery-project.swiper-container'),
      callback: function(e){
        if(e.direction == 'up'){
          swiper.slidePrev();
        } else{
          swiper.slideNext();
        }
      }
    });
    $('.upload-cv-trick').click(function(){
      $(".real-file-cv").trigger('click');
    });
  </script>
@endpush