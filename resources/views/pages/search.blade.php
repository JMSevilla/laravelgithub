@extends('parts.template') 
@section('content')
  <div class="container-top-items parallax-window" data-parallax="scroll" data-image-src="../images/back_header.png" data-speed="0.3">
    <form class="container big-search-container" method="GET" action='{{action("SearchController@search")}}'>
      <div class="search-left-container">
<!--         <div class="titlu-text-over-parallax titlu-search-big">{{__('statics.search_filters')}}</div> -->
        <div class="titlu-text-over-parallax titlu-search-big" style="font-size: 60px !important;">In development</div>
        <input name="q" placeholder="{{__('statics.search_input')}}" class="search-input search-input-big" autocomplete="off" @if(isset($_GET['q']) && $_GET['q'] != null) value="{{$_GET['q']}}" @endif/>
<!--         <div class="titlu-text-over-parallax titlu-search-normal">Tags</div>
        <div class="container-tags-adding">
          <input name="tag-adding" placeholder="Search for tags" class="input-search-tags"/>
        </div> -->
        <div class="container-type-search">
          <input name="type-item-search" type="hidden" id="item-search-type" @if(isset($_GET['type-item-search'])) value="{{$_GET['type-item-search']}}" @else value="profiles" @endif/>
          <div style="margin-bottom: 10px;" class="container-type-item-search @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'projects') type-item-search-selected @endif" value="projects">
            {{__('statics.projects_title')}}
          </div>
          <div style="margin-bottom: 10px;" class="container-type-item-search @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'jobs') type-item-search-selected @endif" value="jobs">
            {{__('statics.jobs')}}
          </div>
          
          @foreach($account_subtypes as $key => $profile_subtype)
          @if($profile_subtype['subtype_value'] != -1)
            <div class="container-subitems-top-profiles-listing">
              <div class="container-type-item-search" subtype_id="{{$profile_subtype['id']}}" subtype_name="{{$profile_subtype['name']}}">
                {{$profile_subtype['name']}}
                @if(count($profile_subtype['children'])>0)
                  <i class="fa fa-angle-down img-arrow-down" aria-hidden="true"></i>
                @endif
                @if($profile_subtype['children'] && count($profile_subtype['children']) > 0)
                  <div class="container-dropdown-listing">
                      @include('parts.children', ['profile_subtype' => $profile_subtype, 'parent_id' => $profile_subtype['subtype_id']])
                  </div>
                @endif
              </div>
            </div>
          @endif
        @endforeach
          
        </div>
        @if($filters)
          <div class="titlu-text-over-parallax titlu-search-big">{{__('statics.advanced_search')}}</div>
          <div class="container-filters-search container-custom-search">
            @foreach($filters as $filter)
              @if(count($filter->default_inputs) > 0)
                @foreach($filter->default_inputs as $field)
                  <div class="container-box-filter-search search-field-container" subtype_id="{{$filter['id']}}">
                    <div class="titlu-text-over-parallax titlu-search-normal titlu-search-customizat">{{$field['title']}}</div>
                    <input name="filters[]" class="search-input search-fee input-search-customizat" placeholder="{{$field['description']}}" />
                    {{--<select name="filters[]" class="search-input search-fee">
                      @foreach($filter->option_fields as $option_item)
                        @if ($loop->first)
                          <option value="{{$option_item}}" selected>{{$option_item}}</option>
                        @else
                          <option value="{{$option_item}}">{{$option_item}}</option>
                        @endif
                      @endforeach
                    </select> --}}
                  </div>
                @endforeach
              @endif
            @endforeach
          </div>
        @endif
        <div class="search-right-container">
          <div class="titlu-text-over-parallax titlu-search-normal">{{__('statics.price_range')}}</div>
          <div class="simple-text-normal">{{__('statics.choose_price_range')}}</div>
  <!--         <input type="text" min="0" max="100000" value="3600,10000" name="points" step="5" style="display: none;" class="range-price" /> -->
          <div class="container-inputs-search">
            <input name="start_fee" class="search-input search-fee" placeholder="E.g. 25" @if(isset($_GET['start_fee']) && $_GET['start_fee'] != null) value="{{$_GET['start_fee']}}" @endif/>
            <span class="line-between-fees">-</span>
            <input name="end_fee" class="search-input search-fee" placeholder="E.g. 5000" @if(isset($_GET['end_fee']) && $_GET['end_fee'] != null) value="{{$_GET['end_fee']}}" @endif/>
          </div>
          <button class="custom-btn btn-albastru">Search</button>
        </div>
      </div>
    </form>
  </div>
  <main id="content">
    <div class="container container-search-no-margin">
      <div class="title-medium-page">@if(isset($_GET['q']) && $_GET['q'] != null) {{__('statics.results_of_title')}}: ''{{$_GET['q']}}'' @else {{__('statics.results_title')}} @endif</div>
      <div class="container-filtrare-listare-search">
        
<!--         
        <div class="content-top-account filtrare-search">
          <div class="sort-elements">Sort by</div>
          <select class="select-sort-account">
            <option selected>All reviews</option>
            <option>Low to high</option>
            <option>Hight to low</option>
          </select>
        </div>
-->
        <div class="container-listing-categories">
          <div class="category-item active-category">Horror</div>
          <div class="category-item">Adventure</div>
          <div class="category-item">Celebrities</div>
          <div class="category-item">Cars</div>
          <div class="category-item">New in</div>
          <div class="category-item">Make-up</div>
          <div class="category-item">Locations</div>
          <div class="category-item">Photograpgy</div>
          <div class="category-item">Costumes</div>
        </div>
      </div>
      @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'projects')
        @include('parts.listing_projects')
      @endif
      @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'profiles')
        @include('parts.listing_users')
      @endif
      @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'jobs')
        @include('parts.listing_jobs')
      @endif
      @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'items')
        @include('parts.listing_items')
      @endif
      <div class="more-items-container">
        <div class="text-normal">{{__('statics.more_btn')}}</div>
        <i class="fa fa-angle-down pulse"></i>
      </div>
    </div>
  </main>
@endsection
@push('styles')
  <link rel="stylesheet" href="css/asRange.css">
@endpush
@push('scripts')
<script src="js/jquery-asRange.js" type="text/javascript"></script>
  <script>
    $(document).ready(function(){
//       $(".range-price").asRange({
//           range: true,
//           limit: false
//       }); 
      $(document).on("click",".delete-current-tag", function(){
        $(this).parent().fadeOut(300, function() { $(this).remove(); });
      });
//       $(".input-search-tags").keypress(function(event){
//           var keycode = (event.keyCode ? event.keyCode : event.which);
//           if(keycode == '13'){
//             if($(this).val().length != 0){
//               var html_insert = "<div class='tag-type-item-listing'>"+$(this).val()+"<img class='delete-current-tag' src='../../images/close.png'/></div>";
//               $(".listing-items-filter-tags").append(html_insert);
//               $(this).val('');
//             }
//             event.preventDefault();
//             return false;
//           }
//       });
//       $(".select-tags").select2({
//           tags: true,
//           theme: "classic"
//         });
      AOS.init();
      var swiper = new Swiper('.swiper-container', {
        pagination: {
          el: '.swiper-pagination',
          dynamicBullets: true,
        },
      });
      $(".container-type-item-search").click(function(){
        $(".container-type-item-search").removeClass("type-item-search-selected");
        $(this).addClass("type-item-search-selected");
        $("#item-search-type").val($(this).attr('value'));
//         $(this).parent().find(".container-dropdown-listing").slideToggle();
        var subtype_id = $(this).attr('subtype_id');
        $(".search-field-container").hide();
        $(".search-field-container[subtype_id="+subtype_id+"]").show();
      });
    });
  </script>
@endpush