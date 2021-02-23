<div class="container-listare-elemente-pagina">
  @if($profiles && count($profiles) > 0)
    @foreach($profiles as $profile)
      <a href="/profile_detail/{{$profile->slug}}" class="item-page-box-container" filter_params="{{json_encode($profile->general_tags)}}">
        <div class="swiper-container container-image-box-item">
           <div class="swiper-wrapper">
             @if($profile->photos != null)
               @foreach($profile->photos as $pic)
                  <div class="swiper-slide swiper-slide-item"><img src="{{Voyager::image($pic)}}" /></div>
               @endforeach
             @else
              <div class="swiper-slide swiper-slide-item"><img src="images/unavailable.png" /></div>
             @endif
           </div><!-- Add Pagination -->
           <div class="swiper-pagination"></div>
           <div class="item-box-type">{{$profile->subtype['name']}}</div>
        </div>
        <div class="content-box-listing-pagina">
          <div class="box-item-container-title">
            <div class="box-item-title">
              @if($profile->profile_title != null) {{$profile->profile_title}} @else {{__('statics.title_unavailable')}} @endif
            </div>
            <div class="container-rating"><img src="../images/rating.png"/><div class="raiting-score">8.7(32)</div></div>
          </div>
          <div class="date-joined-item-box">@if($profile->profile_location != null) {{$profile->profile_location}} @else {{__('statics.location_unavailable')}} @endif</div>
          <div class="btn-general btn-view-more">{{__('statics.more_btn')}}</div>
        </div>
      </a>
    @endforeach
  @endif
</div>