<div class="container-listare-elemente-pagina">
  @if($jobs && count($jobs) > 0)
    @foreach($jobs as $job) 
      <a href="/job_detail/{{$job->slug}}" class="item-page-box-container" filter_params="{{json_encode($job->tags)}}">
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
  @else
    <div class="titlu-text-over-parallax titlu-search-big">{{__('statics.jobs_unavailable')}}</div>
  @endif
</div>