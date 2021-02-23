<header id="header" @if(in_array(Request::path(),['user/profiles', 'user/main_profile','user/projects','user/reviews','user/items','user/files','user/jobs', 'user/settings_profile', 'account-login']) || strpos(Request::path(), 'profile_detail') !== false || strpos(Request::path(), 'product_detail') !== false) class="header-fix-back-black" @endif>
  
  <div class="menu-mobile-lines open-mobil-menu">
    <img src="../images/menu.png"/>
  </div>
  <a href="/" class="header-logo">
    <img src="../images/logo.png" />
  </a>
  <div class="container-meniu-right">
    <ul class="meniu-lista-container meniu-header">
      <li class="element-meniu-lista">
        <a @if(Request::is('/')) class="active-menu" @endif href="">{{__('statics.home_title')}}</a>
      </li>
      <li class="element-meniu-lista">
        <a @if(Request::is('about')) class="active-menu" @endif href="/about">{{__('statics.about_us_title')}}</a>
      </li>
      <li class="element-meniu-lista">
        <a @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'jobs') class="active-menu" @endif href="/search?q=&type-item-search=jobs">{{__('statics.jobs')}}</a>
      </li>
      <li class="element-meniu-lista">
        <a @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'projects') class="active-menu" @endif href="/search?q=&type-item-search=projects">{{__('statics.projects_title')}}</a>
      </li>
      <li class="element-meniu-lista">
        <a @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'profiles') class="active-menu" @endif href="/search?q=&type-item-search=profiles">{{__('statics.profiles_title')}}</a>
      </li>
      <li class="element-meniu-lista">
        <a @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'items') class="active-menu" @endif href="/search?q=&type-item-search=items">{{__('statics.items_title')}}</a>
      </li>
<!--       <li class="element-meniu-lista">
        <a @if(Request::is('careers')) class="active-menu" @endif href="/careers">Careers</a>
      </li> -->
<!--       <li class="element-meniu-lista">
        <a @if(Request::is('credentials')) class="active-menu" @endif href="">Credentials</a>
      </li> -->
      <li class="element-meniu-lista change-language">
          <a>{{__('statics.languages_title')}} <i class="fa fa-angle-down"></i></a>
          <div class="dropdown-language">
            <a class="language-selector @if(Session::get('locale') == 'en') active-menu @endif" href="locale/en" title="Change language to En">En</a>
            <a class="language-selector @if(Session::get('locale') == 'de') active-menu @endif" href="locale/de" title="Change language to De">De</a>
          </div>
      </li>
    </ul>
    @if(!in_array(Request::path(),['search', '/']))
      <div class="container-cautare-lupa">
        <img class="img-search-header" src="../images/search.png" />
      </div>
    @endif
    @if(Session::has('user'))
      <a href="/user/main_profile" class="custom-btn btn-albastru btn-join">{{__('statics.my_profile_title')}}</a>
      <div class="menu-mobile-lines open-mobile-menu-user">
        <img src="../images/user_mobil.png"/>
      </div>
    @else
      <a href="/user/main_profile" class="custom-btn btn-albastru btn-join">{{__('statics.login_btn')}}</a>
      <a href="/user/main_profile" class="menu-mobile-lines">
        <img src="../images/user_mobil.png"/>
      </a>
    @endif
  </div>
</header>
<div class="container-mobile-menu">
  <div class="close-menu-container">
    <div class="close-menu">
      <img src="../../images/close_white.png"/>
    </div>
  </div>
  <div class="container-login-logout">
    @if(Session::has('user'))
    <a href="/user/main_profile" class="custom-btn item-job-colored-status">{{__('statics.my_account_title')}}</a>
     <form class="form-logout" action='{{ action("AccountController@logout") }}' method="post">
        {{csrf_field()}}
        <button class="btn-logout btn-logout-account custom-btn btn-just-borders">{{__('statics.logout_title')}}</button>
      </form>
    @else
      <a href="/user/main_profile" class="custom-btn item-job-colored-status">{{__('statics.login_btn')}}</a>
    @endif
  </div>
</div>

<div class="container-mobile-menu-user">
  <div class="close-menu-container-user">
    <div class="close-menu-user">
      <img src="../../images/close_white.png"/>
    </div>
  </div>
  <div class="content-mobile-menu-user">
   <div class="container-top-user">
      <div class="container-left-image">
        @if(Session::has('user') && !empty($avatar))
          <img src="{{Voyager::image($avatar)}}"/>
        @else
          <img src="../../images/user_empty.png"/>
        @endif
      </div>
      <div class="container-user-name-type-location">
        <div class="username-title">{{Session::get('user')['name']}}</div>
        <div class="container-type-location">
          <div class="user-type-normal-text">{{Session::get('user')['usertype']}}</div>
          <vertical-line></vertical-line>
          <div class="user-type-normal-text">
            @if(Session::get('user')['location'] != null) 
              {{Session::get('user')['location']}} 
            @else 
            <a href="/user/main_profile">{{__('statics.set_location')}}</a> 
            @endif
          </div>
        </div>
      </div>
    </div>
    <ul class="container-listare-meniu-user">
      <li class="@if(Request::is('user/settings_profile')) menu-user-active @endif element-menu-user">
        <a href="user/settings_profile">{{__('statics.profile_settings_title')}}</a>
      </li>
      <li class="@if(Request::is('user/main_profile') || Request::is('account-login')) menu-user-active @endif element-menu-user">
        <a href="user/main_profile">{{__('statics.main_profile_title')}}</a>
      </li>
      <li class="@if(Request::is('user/profiles')) menu-user-active @endif element-menu-user">
        <a href="user/profiles">{{__('statics.my_profiles_title')}}</a>
      </li>
      <li class="@if(Request::is('user/projects')) menu-user-active @endif element-menu-user">
        <a href="user/projects">{{__('statics.my_projects_title')}}</a>
      </li>
      <li class="@if(Request::is('user/items')) menu-user-active @endif element-menu-user">
        <a href="user/items">{{__('statics.my_items_title')}}</a>
      </li>
      <li class="@if(Request::is('user/jobs')) menu-user-active @endif element-menu-user">
        <a href="user/jobs">{{__('statics.my_jobs_title')}}</a>
      </li>
      <li class="@if(Request::is('user/reviews')) menu-user-active @endif element-menu-user">
        <a href="user/reviews">{{__('statics.my_reviews_title')}}</a>
      </li>
      <li class="element-menu-user">
        <form class="form-logout" action='{{ action("AccountController@logout") }}' method="post">
          {{csrf_field()}}
          <button class="btn-logout btn-logout-account">{{__('statics.logout_title')}}</button>
        </form>
      </li>
    </ul>
  </div>
</div>

@include('parts.short_search')
@push('scripts')
<script>
  $(document).ready(function(){
    $(".container-cautare-lupa").click(function(){
      if($(".container-search-short").hasClass('search-afisat')){
        $(".container-search-short").fadeOut().removeClass('search-afisat');
//         $(".container-search-short").css('z-index', '-1');
        $(".img-search-header").attr("src","../images/search.png");
      } else{
        $(".container-search-short").fadeIn().addClass('search-afisat');
        $(".container-search-short").css('z-index', '99999999');
        $(".img-search-header").attr("src","../images/close_white.png");
      }
    });
    $(".change-language").click(function(){
      if($(".dropdown-language").hasClass('lang-shown')){
        $(".dropdown-language").removeClass('lang-shown');
        $(".dropdown-language").slideUp();
      } else{
        $(".dropdown-language").addClass('lang-shown');
        $(".dropdown-language").slideDown().css('display', 'flex');
      }
    });
  });
</script>
@endpush