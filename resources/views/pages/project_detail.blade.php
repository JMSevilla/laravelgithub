@extends('parts.template') 
@section('content')
<!--   <main id="content" class="content-black"> -->
<div class="container-test">
  <div class="project-background-top parallax-mirror-modified" data-parallax="scroll" data-image-src="../images/project_detail.png" data-speed="0.3">></div>
    <div class="container container-page-without-header">
      <div class="project-detail-container">
        <div class="project-detail-container-left">
          <div class="project-title">{{$project->title}}</div>
          <div class="project-status-type">
            <div class="project-subtitle-text">
              @foreach($project->tags as $tag) 
                @if($loop->last) 
                  {{$tag}} 
                @else 
                  {{$tag}}, 
                @endif  
              @endforeach</div>
            <vertical-line class="vertical-blue"></vertical-line>
            @if(true)
              <div class="project-subtitle-text">{{__('statics.project_open')}}</div>
            @else
              <div class="project-subtitle-text project-closed">{{__('statics.project_closed')}}</div>
            @endif
          </div>
          <div class="container-center-project">
            <div class="item-project-center">
              <div class="desc-title">{{__('statics.category_title')}}</div>
              <div class="desc-text">
                <div class="container-listing-tags-item">
                  @foreach($project->categories as $categ)
                    <div class="tag-type-item-listing">{{$categ->name}}</div>
                  @endforeach
                </div>
              </div>
            </div>
            <div class="item-project-center">
              <div class="desc-title">{{__('statics.story_line_title')}}</div>
              <div class="desc-text">{{$project->storyline}}</div>
            </div>
            <div class="item-project-center">
              <div class="desc-title">{{__('statics.director_writer_title')}}</div>
              <div class="desc-text">
                Director: {{$project->director}}<br>
                Writers: {{$project->writer}}
              </div>
            </div>
            <div class="item-project-center">
              <div class="desc-title">{{__('statics.budget_title')}}</div>
              <div class="desc-text">
                <div class="budget-project-container">
                  @if($project->currency == 'dollar')
                    $ {{number_format($project->start_fee)}} - $ {{number_format($project->end_fee)}}
                  @else
                    € {{number_format($project->start_fee)}} - € {{number_format($project->end_fee)}}
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="item-project-bottom">
            <div class="desc-title">{{__('statics.about_title')}}</div>
            <div class="desc-text">
              {{$project->about}}
            </div>
          </div>
          <div class="item-project-bottom">
            <div class="desc-title">{{__('statics.the_team')}}</div>
            <div class="desc-text">
              {{$project->team_description}}
            </div>
          </div>
          <div class="item-project-bottom item-project-bottom-no-margin">
            <div class="desc-title">{{__('statics.files_title')}}</div>
            <div class="desc-text">
              <div class="project-files-container">
                @foreach($project->files as $file)
                  <div class="project-files-box">
                    <div class="project-files-box-icon">
                      <img src="../../images/folder.png" />
                    </div>
                    <div class="project-files-box-title-download">
                      <div class="project-files-title">{{$file['original_name']}}</div>
                      <a download href="{{Voyager::image($file['download_link'])}}" class="project-files-download">{{__('statics.download_file')}}</a>
                    </div>
                  </div>
                @endforeach
              </div>  
            </div>
          </div>
              <div class="fancybox container-form-contact-owner" id="contact-owner-popup">
                <div class="contact-owner-title">{{__('statics.contact_owner')}}</div>
                <form class="form-contact-owner" action="{{action('ProjectController@contactProjectOwner')}}" method="POST">
                  {{csrf_field()}}
                  <div class="error-form-container"></div>
                  <div class="contact-owner-inputs-container">
                    <div class="form-contact-owner-left">
                      <input type="hidden" name="project_user_id" value="{{$project->user_id}}"/>
                      <input type="text" name="name" placeholder="{{__('statics.enter_name')}}"/>
                      <input type="text" name="email" placeholder="{{__('statics.enter_email')}}"/>
                      <input type="text" name="phone" placeholder="{{__('statics.enter_phone')}}"/>
                      <input type="text" name="location" placeholder="{{__('statics.enter_location')}}"/>
                    </div>
                    <div class="form-contact-owner-right">
                      <textarea name="message" placeholder="{{__('statics.enter_message')}}"></textarea>
                    </div>
                  </div>
                  <div class="contact-owner-bottom">
                    <div class="text-left-contact-owner">{{__('statics.agree_form')}}</div>
                    <button class="custom-btn btn-albastru btn-contact-owner">{{__('statics.send_message')}}</button>
                  </div>
                </form>
              </div>
          <a href="#contact-owner-popup" data-fancybox="#contact-owner-popup" class="custom-btn btn-albastru contact-project-owner" data-hash="false">Contact the project owner</a>
        </div>
        <div class="project-detail-container-right">
            <div class="desc-title">{{__('statics.gallery_title')}}</div>
            <div class="container-scroll-swiper">
              <div class="scroll-title">Scroll down</div>
              <div class="scroll-image"><img src="../images/mouse.png"/></div>
            </div>
            <div class="swiper-container-gallery-project swiper-container">
              <div class="swiper-wrapper">
                @foreach($project->photos as $pic)
                  <a href="{{Voyager::image($pic)}}" class="swiper-slide swiper-slide-gallery-project" data-fancybox="galery">
                    <img src="{{Voyager::image($pic)}}" />
                  </a>
                @endforeach
              </div>
            </div>

        </div>
      </div>
      @if($project->jobs && count($project->jobs) > 0)
          <div class="project-title project-title-margins">{{__('statics.project_jobs_title')}}</div>
          <div class="container-listare-elemente-pagina">
              @foreach($project->jobs as $job) 
                <a href="/job_detail/{{$job->slug}}" class="item-page-box-container">
            <!--       <div class="container-image-box-item container-img-product-list">
                    <img src="../../images/product.png"/>
                  </div> -->
                <div class="swiper-container container-image-box-item container-img-product-list">
                   <div class="swiper-wrapper">
                     @foreach($job->photos as $pic)
                        <div class="swiper-slide swiper-slide-item"><img src="{{Voyager::image($pic)}}" /></div>
                     @endforeach
                   </div><!-- Add Pagination -->
                   <div class="swiper-pagination"></div>
                </div>
                  <div class="content-box-listing-pagina item-box-context-full">
                    <div class="date-joined-item-box">{{$job->location}}</div>
                    <div class="box-item-container-title">
                      <div class="box-item-title">{{$job->title}}</div>
                    </div>
                      <div class="btn-general btn-view-more">{{__('statics.more_btn')}}</div>
                  </div>
                </a>
              @endforeach
          </div>
       @endif
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
      loop: false,
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
    
  </script>
@endpush