<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <base href="{{ URL::to('/') }}" />
  <title>{{setting('site.title')}}</title>
  <meta charset="utf-8" />
  <meta name="description" content="{{ settings('site.description') }}" />
  <meta name="keywords" content="@yield('keywords')" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  
  <link rel="stylesheet" href="css/style.css?11">
  <link rel="stylesheet" href="css/responsive.css?11">
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="css/fontawesome.css">
  <link rel="stylesheet" href="css/tooltipster.bundle.min.css">
  <link rel="stylesheet" href="css/select2.min.css">
  <link rel="stylesheet" href="css/aos.css">
  <link href="fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css" />
  @stack('styles')
</head>
<body @if(Request::is('project')) class="parallax-mirror-modified" @endif>
  @include('parts.popup_error')
  @include('parts.popup_success')
  <div id="page">
    @include('parts.header')
    @yield('content')
    @include('parts.footer')
  </div>
  <div class="translated-texts-for-js">
    <div class="please_wait_text">{{__('statics.please_wait')}}</div>
    <div class="save_changes_title_text">{{__('statics.save_changes_title')}}</div>
    <div class="next_text">{{__('statics.next')}}</div>
    <div class="send_message">{{__('statics.send_message')}}</div>
    <div class="update_and_save">{{__('statics.update_and_save')}}</div>
    <div class="edit_simple">{{__('statics.edit_simple')}}</div>
    <div class="delete_simple">{{__('statics.delete_simple')}}</div>
  </div>
  <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="3afd9020-b207-4614-b41e-4a0b6ec0cc98" data-blockingmode="auto" type="text/javascript"></script>
  <script src="//code.jivosite.com/widget/vHq55U5I9W" async></script>
  <script src="js/jquery.js"></script>
  <script src="js/swiper.min.js"></script>
  <script src="js/parallax.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/select2.full.min.js"></script>
  <script src="js/aos.js" type="text/javascript"></script>
  <script src="fancybox/jquery.fancybox.js" type="text/javascript"></script>
  <script src="js/tooltipster.bundle.min.js" type="text/javascript"></script>
  <script src="js/jquery-asRange.js" type="text/javascript"></script> <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4sjaulsBzAfxU8vnW-rs_A7WQhYE0q48&callback=initAutocomplete&libraries=places&v=weekly"
      defer
    ></script>
  <script>
    $(document).ready(function(){
      if($(".item-menu-profile-settings").length > 0){
        $.urlParam = function(name){
            var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
          if(results != null){
            return results[1] || 0;
          } else{
            return 0;
          }
        }
        if($.urlParam('subtype_id') !== 0){
          var sub_id = $.urlParam('subtype_id');
          $(".item-menu-profile-settings[subtype_id="+sub_id+"]").trigger('click');
        }
          $(".loading-page").fadeOut("slow");
      }
    });
    
    function replaceUrlParam(url, paramName, paramValue){
        var pattern = new RegExp('(\\?|\\&)('+paramName+'=).*?(&|$)')
        var newUrl=url
        if(url.search(pattern)>=0){
            newUrl = url.replace(pattern,'$1$2' + paramValue + '$3');
        }
        else{
            newUrl = newUrl + (newUrl.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue
        }
        return newUrl
    }

    (function(exports) {
      "use strict";
      function initAutocomplete() {

          var input = document.getElementById("pac-input");
          if(input){
            var searchBox = new google.maps.places.SearchBox(input);


            searchBox.addListener("places_changed", function() {
              var places = searchBox.getPlaces();
              console.log(places);

              if (places.length == 0) {
                return;
              } 
            });
          }
      }

      exports.initAutocomplete = initAutocomplete;
    })((this.window = this.window || {}));
    
        (function(exports) {
      "use strict";
      function initAutocompleteInput() {

          var input = document.getElementById("pac-input-item");
          if(input){
            var searchBox = new google.maps.places.SearchBox(input);


            searchBox.addListener("places_changed", function() {
              var places = searchBox.getPlaces();
              console.log(places);

              if (places.length == 0) {
                return;
              } 
            });
          }
      }

      exports.initAutocompleteInput = initAutocompleteInput;
    })((this.window = this.window || {}));
  </script>
@stack('scripts')
</body>
</html>
