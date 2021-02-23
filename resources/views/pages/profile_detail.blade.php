@extends('parts.template') 
@section('content')
  <main id="content">
    <div class="container container-page-without-header container-page-profile-detail">
      <div class="container-profile-detail">
        <div class="container-top-profile">
          <div class="container-top-left-profile">
            <div class="container-images-profile">
              @if($profile->photos != null)
                <img class="container-images-profile-img" src="{{Voyager::image($profile->photos[0])}}"/>
               @else
                <img class="container-images-profile-img" src="images/unavailable.png"/>
               @endif
              <div class="item-box-type">{{$profile->subtype['name']}}</div>
                 @if($profile->photos != null)
                   <div class="btn-show-my-photos">
                    <a data-fancybox="galery" href="{{Voyager::image($profile->photos[0])}}" class="btn-general btn-buy-user-pricing btn-photo-gallery-profile">{{__('statics.my_photos')}}</a>
                    @if($profile->videos != null || $profile->youtube_videos != null)
                     <a data-fancybox="galleryVideo" @if($profile->videos != null) href="{{Voyager::image($profile->videos[0]->download_link)}}" @elseif($profile->youtube_videos != null) href="{{Voyager::image($profile->youtube_videos[0])}}" @endif class="btn-general btn-buy-user-pricing">{{__('statics.my_videos')}}</a>  
                    @endif
                   </div>
                   @foreach($profile->photos as $key => $pic)
                      @if($key > 0)
                        <a style="display: none;" href="{{Voyager::image($pic)}}" class="content-box-file" data-fancybox="galery">
                           <img src="{{Voyager::image($pic)}}" />
                        </a>
                      @endif
                   @endforeach
                  @if($profile->videos != null)
                     @foreach($profile->videos as $key => $vid)
                        @if($key > 0)
                          <a style="display: none;" href="{{Voyager::image($vid->download_link)}}" class="content-box-file" data-fancybox="galleryVideo"></a>
                        @endif
                     @endforeach
                  @endif
                  @if($profile->youtube_videos != null)
                     @foreach($profile->youtube_videos as $key => $vid)
                          <a style="display: none;" href="{{Voyager::image($vid)}}" class="content-box-file" data-fancybox="galleryVideo"></a>
                     @endforeach
                  @endif
                 @else
                  <div class="btn-show-my-photos">
                   <a data-fancybox="galery" href="{{Voyager::image($profile->photos[0])}}" class="btn-general btn-buy-user-pricing btn-photo-gallery-profile">{{__('statics.my_photos')}}</a>  
                  </div>
                  <a style="display: none;" href="images/unavailable.png" class="content-box-file" data-fancybox="galery">
                     <img src="images/unavailable.png" />
                  </a>
                 @endif
              
            </div>
          </div>
          <div class="container-top-right-profile">
            <div class="profile-right-top">
              <div class="profile-right-top-left">
                <div class="date-joined-item-box">@if($profile->profile_location != null) {{$profile->profile_location}} @else {{__('statics.location_unavailable')}} @endif</div>
                <div class="box-item-container-title">
                  <div class="box-item-title">
                    @if($profile->profile_title != null) {{$profile->profile_title}} @else {{__('statics.title_unavailable')}} @endif
                  </div>
                  <div class="container-rating"><img src="../images/rating.png"/><div class="raiting-score">8.7</div></div>
                </div>
              </div>
              @if(Session::has('user'))
                <div class="profile-right-top-right" data-fancybox="rate-me" data-src="#container-rating-popup">
                  <div class="rate-me-btn">
                    <img src="../images/rate_star.png"/>
                    <div class="txt-btn-rate">{{__('statics.rate_title')}}</div>
                  </div>
                </div>
              @endif
            </div>
            <div class="container-listing-tags-item">
              @foreach($profile->general_tags as $tag)
                <div class="tag-type-item-listing">{{$tag}}</div>
              @endforeach
            </div>
            <div class="profile-short-description">
              @if($profile->short_description != null)
                {{$profile->short_description}}
              @else
                {{__('statics.description_unavailable')}}
              @endif
            </div>
            <div class="buttons-profile-top">
              <div class="budget-project-container btn-profile-top">{{__('statics.fee_starting')}} @if($profile->currency == 'dollar') ${{$profile->start_fee}} @else €{{$profile->start_fee}} @endif</div>
              <div class="budget-project-container btn-profile-top btn-contact-profile" data-fancybox="contact" data-src="#contact-owner-popup">{{__('statics.contact_me')}}</div>
            </div>
          </div>
        </div>
        <div class="container-menu-profile">
          <div class="item-menu-profile-detail-view active-item-menu-profile-detail" container="about-container">{{__('statics.about_title')}}</div>
          <div class="item-menu-profile-detail-view item-menu-profile-detail-big" container="filmography-container">{{__('statics.filmography_title')}}</div>
          <div class="item-menu-profile-detail-view item-menu-profile-detail-big" container="biography-container">{{__('statics.biography_title')}}</div>
          <div class="item-menu-profile-detail-view" container="files-container">{{__('statics.files_title')}}</div>
          <div class="item-menu-profile-detail-view" container="products-container">{{__('statics.products_title')}}<span>(44)</span></div>
          <div class="item-menu-profile-detail-view item-menu-profile-detail-big" container="other-information-container">{{__('statics.other_information_title')}}</div>
          <div class="item-menu-profile-detail-view" container="reviews-container">{{__('statics.reviews_title')}}</div>
        </div>
      <div class="container-bottom-profile-detail about-container">
        <div class="container-about-profile">
          <div class="container-about-left">
            <div class="subtitle-normal-page">{{__('statics.general_information')}}</div>
            <div class="container-profile-description-items">
              @if($profile->inputs)
                @foreach($profile->inputs as $info)
                  <div class="item-description-profile">{{$info->title}}: @if($info->value) {{$info->value}} @else - @endif</div>
                @endforeach
              @else
                {{__('statics.info_unavailable')}}
              @endif
            </div>
            <div class="subtitle-normal-page">{{__('statics.languages_title')}}</div>
            <div class="sport-games-container">
              @if($profile->inputs)
                  @foreach($profile->languages as $lang)
                    <div class="sports-games-item language-item">{{$lang->value}} | {{$lang->title}}</div>
                  @endforeach
                @else
                  {{__('statics.sports_games_unavailable')}}
                @endif
            </div>
            <div class="subtitle-normal-page">{{__('statics.practiced_sports')}}</div>
            <div class="sport-games-container">
               @if($profile->inputs)
                @foreach($profile->skill_tags as $tag)
                  <div class="sports-games-item">{{$tag}}</div>
                @endforeach
              @else
                {{__('statics.sports_games_unavailable')}}
              @endif
              
            </div>
          </div>
          <div class="container-right-pics-about">
            <div class="container-about-right grid">
              <div class="grid-col grid-col--1"></div>
              <div class="grid-col grid-col--2"></div>
              <div class="grid-col grid-col--3"></div>
              @if($profile->photos != null)
                @foreach($profile->photos as $pic)
                  <a href="{{Voyager::image($pic)}}" data-fancybox="about-gallery" class="about-img-right grid-item">
                      <img src="{{Voyager::image($pic)}}" alt="picture"/>
                  </a>
                @endforeach
              @else
                <a href="images/unavailable.png" data-fancybox="about-gallery" class="about-img-right grid-item">
                    <img src="images/unavailable.png" alt="picture"/>
                </a>
              @endif
              
            </div>
            <div class="container-scroll-mouse">
              <div class="container-scroll-swiper">
                <div class="scroll-title">{{__('statics.scroll_title')}} {{__('statics.down_title')}}</div>
                <div class="scroll-image"><img src="../images/mouse.png"/></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-bottom-profile-detail filmography-container">
        <div class="container-normal-text-profile" @if($profile->filmography != null && count($profile->filmography) == 1) style="column-count: 1;" @endif>
          @if($profile->filmography)
            @foreach($profile->filmography as $key => $filmography)
              <div class="title-text-normal-profile">{{$filmography->filmography_title}}</div>
              {{$filmography->filmography_short_description}}<br><br>
            @endforeach
          @else
            {{__('statics.filmography_unavailable')}}
          @endif
        </div>
        <div class="container-btn-get-in-touch"  data-fancybox="get-in-touch1" data-src="#contact-owner-popup">Get in touch with {{$profile->profile_title}}</div>
      </div>
      <div class="container-bottom-profile-detail biography-container">
          <div class="container-normal-text-profile" @if($profile->biography != null && count($profile->biography) == 1) style="column-count: 1;" @endif>
            @if($profile->biography)
              @foreach($profile->biography as $key => $biography)
                <div class="title-text-normal-profile">{{$biography->biography_title}}</div>
                {{$biography->biography_short_description}}<br><br>
              @endforeach
            @else
              {{__('statics.biography_unavailable')}}
            @endif
          </div>
          <div class="container-btn-get-in-touch"  data-fancybox="get-in-touch1" data-src="#contact-owner-popup">Get in touch with {{$profile->profile_title}}</div>
        </div>
      <div class="container-bottom-profile-detail files-container">
        <div class="container-normal-text-profile normal-text-1column">
          {{__('statics.description_files')}}
        </div>
        <div class="project-files-container">
          @if($profile->files)
            @foreach($profile->files as $file)
              <div class="project-files-box">
                <div class="project-files-box-icon">
                  <img src="../../images/folder.png" />
                </div>
                <div class="project-files-box-title-download">
                  <div class="project-files-title">{{$file->original_name}}</div>
                  <a href="/storage/{{$file->download_link}}" class="project-files-download">{{__('statics.download_file')}}</a>
                </div>
              </div>
            @endforeach
          @else
           <div class="container-normal-text-profile normal-text-1column">{{__('statics.biography_unavailable')}}</div> 
          @endif
          
        </div>  
        <div class="container-btn-get-in-touch"  data-fancybox="get-in-touch3" data-src="#contact-owner-popup">Get in touch with {{$profile->profile_title}}</div>
      </div>
      <div class="container-bottom-profile-detail other-information-container">
        <div class="container-normal-text-profile" @if($profile->other != null && count($profile->other) == 1) style="column-count: 1;" @endif>
          @if($profile->other)
            @foreach($profile->other as $key => $other)
              <div class="title-text-normal-profile">{{$other->other_title}}</div>
              {{$other->other_short_description}}<br><br>
            @endforeach
          @else
            {{__('statics.other_unavailable')}}
          @endif
        </div>
        <div class="container-btn-get-in-touch" data-fancybox="get-in-touch4" data-src="#contact-owner-popup">Get in touch with {{$profile->profile_title}}</div>
      </div>
      <div class="container-bottom-profile-detail reviews-container">
        <div class="container-reviews grid">
          <div class="grid-col grid-col--1"></div>
          <div class="grid-col grid-col--2"></div>
          <div class="grid-col grid-col--3"></div>
          @for($i=0;$i<6;$i++)
            <div class="review-box grid-item">
              <div class="container-rating rating-review">
                <img src="../images/rating.png">
                <div class="raiting-score">8.7</div>
              </div>
              <div class="container-top-user container-top-user-review">
                <div class="container-left-image">
                  <img src="../../images/user.png" />
                </div>
                <div class="container-user-name-type-location">
                  <div class="username-title">John Doe UserName</div>
                  <div class="container-type-location">
                    <div class="user-type-normal-text">Producer</div>
                    <vertical-line class="vertical-line-gray"></vertical-line>
                    <div class="user-type-normal-text">Constanta,Romania</div>
                  </div>
                </div>
              </div>
              <div class="comment-review">
                @if($i%2 == 0)
                " Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut iaculis tortor, sit amet molestie diam. Donec vel libero eget libero luctus lobortis eget et libero. "
                @else
                " Cras porta neque mauris, in maximus nunc ultricies quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt arcu et orci vulputate tempor. Nulla eu lectus efficitur, suscipit odio in, aliquam lectus. Pellentesque in pellentesque eros. Etiam maximus at tortor semper egestas. "
                @endif
                </div>
              <div class="review-posted-date">03 Dec 2019</div>
            </div>
          @endfor
        </div>
      </div>
      <div class="container-bottom-profile-detail products-container">
        @include('parts.listing_items')
      </div>
      </div>
    </div>
    @include('parts.popup_rating')
    <div class="fancybox container-form-contact-owner" id="contact-owner-popup">
      <div class="contact-owner-title">{{__('statics.contact_simple')}} {{$profile->profile_title}}</div>
      <form class="form-contact-owner">
        <div class="contact-owner-inputs-container">
          <div class="form-contact-owner-left">
            <input type="text" name="name" placeholder="{{__('statics.enter_name')}}"/>
            <input type="text" name="email" placeholder="{{__('statics.enter_email')}}"/>
            <input type="text" name="phone" placeholder="{{__('statics.enter_phone')}}"/>
            <input type="text" name="position" placeholder="{{__('statics.enter_position')}}"/>
          </div>
          <div class="form-contact-owner-right">
            <textarea placeholder="{{__('statics.enter_message')}}"></textarea>
          </div>
        </div>
        <div class="contact-owner-bottom">
          <div class="text-left-contact-owner">{{__('statics.agree_form')}}</div>
          <button class="custom-btn btn-albastru btn-contact-owner">{{__('statics.send_message')}}</button>
        </div>
      </form>
    </div>
  </main>
@endsection
@push('scripts')
<script src="../../js/colcade.js"></script>
  <script>
    $(document).ready(function(){
      $(".item-menu-profile-detail-view").click(function(){
        var container_shown = $(this).attr('container');
        container_shown = "."+container_shown;
        if(!$(this).hasClass('active-item-menu-profile-detail')){
          $(".item-menu-profile-detail-view").removeClass("active-item-menu-profile-detail");
          $(this).addClass('active-item-menu-profile-detail');
          $(".container-bottom-profile-detail").slideUp();
          $(container_shown).slideDown();
        }
      });
      var colc = new Colcade( '.container-about-right.grid', {
          columns: '.grid-col',
          items: '.about-img-right.grid-item'
      });
     $('.grid').colcade({
      columns: '.grid-col',
      items: '.grid-item'
     });
    });
  </script>
@endpush