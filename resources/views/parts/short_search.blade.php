<div class="container-search-short @if(Request::path() == '/') search-afisat search-afisat-transparent @endif">
  <div class="container short-search-container">
    <div class="titlu-text-over-parallax">{{__('statics.search_title')}}</div>
    <div class="text-over-parallax">{{__('statics.search_text')}}</div>
    <form class="form-search" method="GET" action='{{action("SearchController@search")}}'>
      <input name="q" placeholder="{{__('statics.search_input')}}" class="search-input" autocomplete="off"/>
      <button class="btnSearch"><img src="../../images/search.png"/></button>
    </form>
    @if(Request::is('/'))
          <div class="fancybox container-watch-video container-short-search-video" data-src="#video-container-signup" data-fancybox="video">
            <div class="container-img-play"><img src="../images/play.png"/></div>
              <div class="text-watch">{{__('statics.getting_started')}}</div>
          </div>
    @endif
  </div>

</div>