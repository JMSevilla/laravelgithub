<div class="container-user-menu user-menu-for-mobile">
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
        <a href="user/main_profile" class="user-type-normal-text tooltip" title="{{__('statics.go_to_profile')}}">{{Session::get('user')['usertype']}}</a>
        <vertical-line></vertical-line>
        <div class="user-type-normal-text">
          @if(Session::get('user')['location'] != null) 
            {{Session::get('user')['location']}} 
          @else 
          <a class="tooltip" href="/user/main_profile" title="{{__('statics.set_location')}}">{{__('statics.set_location')}}</a> 
          @endif
        </div>
      </div>
    </div>
  </div>
  <ul class="container-listare-meniu-user">
    <li class="@if(Request::is('user/settings_profile')) menu-user-active @endif element-menu-user">
      <a style="color: lime;" href="user/settings_profile">{{__('statics.profile_settings_title')}}</a>
    </li>
<!--     <li class="@if(Request::is('user/main_profile') || Request::is('account-login')) menu-user-active @endif element-menu-user">
      <a style="color: lime;" href="user/main_profile">{{__('statics.main_profile_title')}}</a>
    </li> -->
    @if(!in_array(Session::get('user')['usertype'], ['Producer', 'Produzent']))
      <li class="@if(Request::is('user/profiles')) menu-user-active @endif element-menu-user">
        <a href="user/profiles">{{__('statics.my_profiles_title')}}</a>
      </li>
    @endif
    @if(!in_array(Session::get('user')['usertype'], ['User', 'Benutzer']))
      <li class="@if(Request::is('user/projects')) menu-user-active @endif element-menu-user">
        <a style="color: lime;"  href="user/projects">{{__('statics.my_projects_title')}}</a>
      </li>
  <!--     <li class="@if(Request::is('user/items')) menu-user-active @endif element-menu-user">
        <a href="user/items">{{__('statics.my_items_title')}}</a>
      </li> -->
      <li class="@if(Request::is('user/jobs')) menu-user-active @endif element-menu-user">
        <a style="color: lime;" href="user/jobs">{{__('statics.my_jobs_title')}}</a>
      </li>
    @endif
    @if(!in_array(Session::get('user')['usertype'], ['Producer', 'Produzent']))
      <li class="@if(Request::is('user/reviews')) menu-user-active @endif element-menu-user">
        <a href="user/reviews">{{__('statics.my_reviews_title')}}</a>
      </li>
    @endif
  </ul>
    <li class="element-menu-user logout-user">
      <form class="form-logout" action='{{ action("AccountController@logout") }}' method="post">
        {{csrf_field()}}
        <button type="button" class="btn-logout btn-logout-account">{{__('statics.logout_title')}}</button>
      </form>
    </li>
  <form style="display: none" class="form-prove-documents" action='{{ action("AccountController@uploadProve") }}' method="post">
    {{csrf_field()}}
    <input type="file" name="upload_doc_prove[]" class="upload-file-prove" style="display: none;"  accept="pdf" multiple/>
  </form>
  <form style="display: none;" class="form-change-profile-pic" action='{{ action("AccountController@changeProfilePic") }}' method="post">
    {{csrf_field()}}
    <input type="file" name="profile_pic" class="change-profile-avatar" style="display: none;"  accept="image/x-png,image/gif,image/jpeg"/>
  </form>
</div>
@push('scripts')
<script>
    $(document).ready(function(){
      //  Move down the logout button and check if it touches the footer to make it fixed on the bottom
     $('.tooltip').tooltipster({
        animation: 'fade',
        delay: 200,
        theme: 'tooltipster-punk',
        position: 'top',
        maxWidth: '250'
      });
      
      
      $(".btn-logout-account").click(function() {
        if(confirm("{{__('statics.logout_confirm')}}")){
          $('.btn-logout-account').html("{{__('statics.please_wait')}}");
          event.preventDefault();
            $(this).attr('disabled', 'disabled');
            $.ajax({
                method: 'POST',
                url: $(this).parent().attr("action"),
                data: $(this).parent().serializeArray(),
                context: this, async: true, cache: false, dataType: 'json'
            }).done(function(res) {
                setTimeout(function(){
                    $('.btn-logout-account').html("{{__('statics.logout_title')}}");
                }, 200);
                if (res.success == true) {
                  window.location.replace(res.url);
                  $(".btn-logout-account").prop('disabled', false);
                } else { 
                  if(res.msg_error){
                     $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                     $(".container-mare-modal-error .text-modal").html(res.msg_error);
                  }
                  $(".btn-logout-account").prop('disabled', false);
                }
            })
            .fail(function(xhr, status, error) {
              if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
                window.location.reload();
              }
            });
            return false;
        } else{
            return false;
        }
      });
      
    });
</script>
@endpush