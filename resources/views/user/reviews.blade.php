<div class="container-right-account">
  <div class="titlu-right-account-container">
    <div class="titlu-right-account">{{__('statics.my_reviews_title')}}</div>
  </div>
  <div class="cointainer-content-right-account">
    <div class="content-top-account">
      <div class="container-items-projects-top">
        <div class="sort-elements">{{__('statics.sort_by')}}</div>
        <select class="select-sort-account">
          <option selected>{{__('statics.all_reviews')}}</option>
          <option>{{__('statics.low_simple')}} {{__('statics.to_simple')}} {{__('statics.high_simple')}}</option>
          <option>{{__('statics.high_simple')}} {{__('statics.to_simple')}} {{__('statics.low_simple')}}</option>
        </select>
      </div>
    </div>
    <div class="container-reviews grid">
      <div class="grid-col grid-col--1"></div>
      <div class="grid-col grid-col--2"></div>
      <div class="grid-col grid-col--3"></div>
      @for($i=0;$i<10;$i++)
        <div class="review-box grid-item" data-aos="fade-down-right" data-aos-delay="{{$i*100}}">
          <div class="container-rating rating-review">
            <img src="../images/rating.png">
            <div class="raiting-score">8.7</div>
          </div>
          <div class="container-left-user-settings container-top-user-review">
            <div class="container-left-image">
              <img src="../../images/user.png">
            </div>
            <div class="container-details-user-profile">
              <div class="username-profile-details">{{Session::get('user')['name']}}</div>
              <div class="location-profile-details @if(Session::get('user')['location'] == null)trigger-location @endif">
                @if(Session::get('user')['location'] != null) 
                  {{Session::get('user')['location']}} 
                @else 
                  <a href="/user/main_profile">{{__('statics.set_location')}}</a> 
                @endif
              </div>
              <div class="usertype-profile-details">{{Session::get('user')['usertype']}}</div>
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
</div>
@push('scripts')
<script src="../../js/colcade.js"></script>
<script>
  $(document).ready(function(){
    $('.grid').colcade({
      columns: '.grid-col',
      items: '.grid-item'
    })
  AOS.init();
  });
</script>
@endpush