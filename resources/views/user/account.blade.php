@extends('parts.template') 
@section('content')
  <main id="content" class="content-black">
    <div class="account-container container-page-without-header">
      @include('user.user_menu')
      @if(!in_array(Session::get('user')['usertype'], ['Producer', 'Produzent']))
          @if(Request::is('user/profiles'))
            @include('user.profiles')
          @elseif(Request::is('user/main_profile'))  
            @include('user.main_profile')
          @elseif(Request::is('user/settings_profile'))
            @include('user.settings_profile')
          @elseif(Request::is('user/reviews'))
            @include('user.reviews')
          @elseif(Request::is('user/products'))
            @include('user.products')
          @elseif(Request::is('user/items'))
            @include('user.items')
          @else
            @include('user.main_profile')
          @endif
      @else
           @if(Request::is('user/main_profile'))  
              @include('user.main_profile')
            @elseif(Request::is('user/settings_profile'))
              @include('user.settings_profile')
            @elseif(Request::is('user/projects'))
              @include('user.projects')
            @elseif(Request::is('user/products'))
              @include('user.products')
            @elseif(Request::is('user/jobs'))
              @include('user.jobs')
            @else
              @include('user.main_profile')
            @endif
      @endif
     
      @include('parts.reset')
    </div>
  </main>
@endsection