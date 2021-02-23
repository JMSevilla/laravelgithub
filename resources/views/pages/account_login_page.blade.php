@extends('parts.template') 
@section('content')
  <main id="content" class="main-content-over-parallax" data-parallax="scroll" data-image-src="../images/back_login.png" data-speed="0.3">
    <div class="back-trick-over"></div>
    <div class="container-about-account container-account-full">
      <div class="container">
        <div class="container-top-login">
          <div class="container-title-login">
            <div class="title-left-login">
              {{__('statics.we_are')}}
            </div>
            <div class="title-right-login">
              {{__('statics.movie_circle')}}
            </div>
            <div class="img-design-title-login">
              <img src="../../images/img-design-login.png"/>
            </div>
          </div>
          <div class="container-form-account">
            <form class="form-login" autocomplete="off" action='{{ action("AccountController@login") }}' method="post">
              {{csrf_field()}}
              <div class="normal-text-account">
                {{__('statics.title_form_login')}}
              </div>
              <div class="container-input-general active-input">
                <label class="tricker-label-input" label-text="{{__('statics.enter_email')}}">{{__('statics.enter_email')}}</label>
                <input class="general-input-form" name="email" placeholder="{{__('statics.enter_email')}}" autocomplete="off"/>
              </div>
              <div class="container-input-general">
                <label class="tricker-label-input" label-text="{{__('statics.enter_password')}}">{{__('statics.enter_password')}}</label>
                <input type="password" class="general-input-form" name="password" placeholder="{{__('statics.enter_password')}}" autocomplete="off"/>
              </div>
              <div class="container-remember-forgot">
                <label class="container-checkbox">{{__('statics.remember_me')}}
                  <input type="checkbox" name="remember">
                  <span class="checkmark"></span>
                </label>
                <div class="container-forgot-password btnForgotPassword">{{__('statics.forgot_password')}}</div>
              </div>
              <div class="container-buttons-account">
                <button class="custom-btn btn-albastru btn-login-account">{{__('statics.login_btn')}}</button>
                <div class="btn-general btn-sign-up big-general-btn">{{__('statics.signup_btn')}}</div>
              </div>
            </form>
            <form class="form-forgot" action='{{ action("AccountController@forgotPassword") }}' method="post">
              {{csrf_field()}}
              <div class="normal-text-account">{{__('statics.title_recover')}}</div>
              <div class="container-input-general active-input">
                <label class="tricker-label-input"  label-text="{{__('statics.enter_email')}}">{{__('statics.enter_email')}}</label>
                <input class="general-input-form" name="email" placeholder="{{__('statics.enter_email')}}" autocomplete="off"/>
              </div>
              <div class="container-buttons-account">
                <div class="btn-general btn-back-login btn-no-margins">{{__('statics.login_btn')}}</div>
                <button class="custom-btn btn-albastru btn-recover-pass big-general-btn">{{__('statics.recover_btn')}}</button>
              </div>
            </form>
          </div>
          <div class="container-down-privacy">
            <span>{{__('statics.agree_therms')}}</span>
            <div class="therms-privacy">
              <a href="/therms">{{__('statics.therms_condition')}}</a><div class="itm-space-left-right">&</div><a href="/policy">{{__('statics.privacy_policy')}}</a>  
            </div>
          </div>
        </div>
        <div class="container-top-signup">
          <?php 
            $video_producer = Voyager::image((json_decode($account_types[0]->video))[0]->download_link); 
          ?>
          <div class="project-title">{{__('statics.select_account_title')}}</div>
          <div class="accounts-type-container accounts-type-container-signup">
            @foreach($account_types as $key => $acc_type)
              <div account_type="{{$acc_type->title}}" url_video="{{Voyager::image(json_decode($acc_type->video)[0]->download_link)}}" @if($loop->last) id_usertype="{{$acc_type->id}}" @endif class="@if($acc_type->id == 1 || $acc_type->id == 2) deny-access @endif accounts-type-box-container @if($current_usertype == null && $loop->last) type-account-selected-signup @endif">
                @if($acc_type->id == 1 || $acc_type->id == 2)
                  <div class="over-accounts-type-box-container"></div>
                @endif
                <div class="accounts-icon-box"><img src="{{Voyager::image($acc_type->icon)}}" /></div>
                <div class="accounts-title-box">{{$acc_type->title}}</div>
                <div class="accounts-text-box">{!! $acc_type->description !!}</div>
              </div>
            @endforeach
           
            
          </div>
          <form class="form-signup test" autocomplete="off" action='{{ action("AccountController@signUp") }}' method="post">
            {{csrf_field()}}
            <input type="hidden" name="prefix" class="input-prefix-phone" />
            <input type="hidden" name="usertype_id" value="{{$account_types[count($account_types)-1]->id}}"/>
            <div class=container-inputs-signup>
               <div class="container-input-general active-input">
                <label class="tricker-label-input" label-text="{{__('statics.first_lastname_title')}}">{{__('statics.first_lastname_title')}}</label>
                <input class="general-input-form" name="name" placeholder="{{__('statics.first_lastname_title')}}" autocomplete="off"/>
              </div>
              <div class="container-input-general">
                <label class="tricker-label-input" label-text="{{__('statics.enter_email')}}">{{__('statics.enter_email')}}</label>
                <input class="general-input-form" type="text" name="email" placeholder="{{__('statics.enter_email')}}" autocomplete="off"/>
              </div>
              <div class="container-input-general">
                <label class="tricker-label-input" label-text="{{__('statics.enter_phone')}}">{{__('statics.enter_phone')}}</label>
                <input id="phoneField" type="tel" class="general-input-form" name="phone" placeholder="{{__('statics.enter_phone')}}" autocomplete="off"/>
              </div>
              <div class="container-input-general">
                <label class="tricker-label-input" label-text="{{__('statics.enter_password')}}">{{__('statics.enter_password')}}</label>
                <input class="general-input-form" name="password" type="password" placeholder="{{__('statics.enter_password')}}" autocomplete="parola"/>
              </div>
            </div>
            <div class="container-remember-forgot">
              <label class="container-checkbox">
                <div class="tricker-label-input tricker-label-accept-therms" label-text="{{__('statics.accept_therms')}}">{{__('statics.accept_therms')}}</div>
                <div class="container-down-privacy">
                  <span>{{__('statics.agree_therms')}}</span>
                  <div class="therms-privacy">
                    <a href="/therms">{{__('statics.therms_condition')}}</a><div class="itm-space-left-right">&</div><a href="/policy">{{__('statics.privacy_policy')}}</a>  
                  </div>
                </div>
                <input type="checkbox" name="accept_therms">
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="container-buttons-account">
              <button class="custom-btn btn-albastru big-general-btn btn-sign-up btn-create-account">{{__('statics.create_account')}}</button>
              <div class="btn-general btn-back-login-from-signup btn-no-margins">{{__('statics.login_btn')}}</div>
            </div>
          </form>
          <div class="fancybox container-watch-video" data-src="#video-container-signup" data-fancybox="video">
            <div class="container-img-play"><img src="../images/play.png"/></div>
              <div class="text-watch">{{__('statics.watch_video')}} <span>{{$account_types[0]->title}}</span></div>
          </div>
        </div>
        <div id="video-container-signup">
          <video class="video-container-signup" controls autoplay muted>
            <source src="{{$video_producer}}" type="video/mp4">
            Your browser does not support HTML5 video.
          </video>
        </div>
      </div>
   </div>
  </main>
@endsection
@push('styles')
  <link rel="stylesheet" href="https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?40">
@endpush
@push('scripts')
<script src="https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js?70" type="text/javascript"></script>
  <script>
    AOS.init();
    var inputItem = document.querySelector("#phoneField");
    var iti = window.intlTelInput(inputItem);
    inputItem.addEventListener("countrychange", function() {
      $(".input-prefix-phone").val(iti.getSelectedCountryData().dialCode);
    });
    
    
    $(document).ready(function(){
      $(".btnForgotPassword").click(function(){
        $(".form-login").slideUp();
        $(".form-forgot").slideDown();
      });
      $(".btn-back-login").click(function(){
        $(".form-login").slideDown();
        $(".form-forgot").slideUp();
      });
      $(".btn-sign-up").click(function(){
        $(".container-top-signup").slideDown();
        $(".container-top-login").slideUp();
      });
      $(".btn-back-login-from-signup").click(function(){
        $(".container-top-signup").slideUp();
        $(".container-top-login").slideDown();
      });
      var usertype_received = "{{$current_usertype}}";
      if(usertype_received != null && usertype_received != undefined && usertype_received != '' && usertype_received.length > 0){
      console.log(usertype_received);
        $(".container-top-login").hide();
        $(".container-top-signup").show();
        $(".accounts-type-box-container[account_type="+usertype_received+''+"]").removeClass("type-account-selected-signup");
        $(".accounts-type-box-container[account_type="+usertype_received+''+"]").addClass("type-account-selected-signup");
        $(".text-watch>span").html($(".accounts-type-box-container[account_type="+usertype_received+''+"]").attr('account_type'));
        $(".video-container-signup>source").attr('src', $(".accounts-type-box-container[account_type="+usertype_received+''+"]").attr('url_video'));
        $("#video-container-signup video")[0].load();
        $("input[name=usertype_id]").val($(".accounts-type-box-container[account_type="+usertype_received+''+"]").attr('id_usertype'));
      }
      $(document).on('click', '.accounts-type-box-container', function(){
        if(!$(this).hasClass("type-account-selected-signup") && !$(this).hasClass("deny-access") ){
        console.log("test");
           $(".accounts-type-box-container").removeClass("type-account-selected-signup");
           $(this).addClass("type-account-selected-signup");
           $(".text-watch>span").html($(this).attr('account_type'));
           $(".video-container-signup>source").attr('src', $(this).attr('url_video'));
           $("#video-container-signup video")[0].load();
           $("input[name=usertype_id]").val($(this).attr('id_usertype'));
        }
      });
      $(".btn-create-account").click(function() {
        $('.btn-create-account').html("{{__('statics.please_wait')}}");
        event.preventDefault();
          $(this).attr('disabled', 'disabled');
          $.ajax({
              method: 'POST',
              url: $(this).parent().parent().attr("action"),
              data: $(this).parent().parent().serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-create-account').html("{{__('statics.create_account')}}");
              }, 200);
              if (res.success == true) {
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                var seconds = 5;
                var new_msg = res.msg;
//                 var new_msg = res.msg + " Redirect to profile in " + seconds + " seconds.";
                $(".container-mare-modal .text-modal").html(new_msg);
                $(".form-signup .general-input-form").val('');
                $(".form-signup .tricker-label-input").css('opacity', '0');
                $(".btn-create-account").prop('disabled', false);
                $(".btn-back-login-from-signup").trigger('click');
//                 var sec_text = " seconds.";
//                 setInterval(function(){
//                   if(seconds == 1){
//                     sec_text = " second.";
//                   }
//                   new_msg = res.msg + " Redirect to profile in " + seconds + sec_text;
//                   $(".container-mare-modal .text-modal").html(new_msg);
//                   if(seconds == 0){
//                     window.location.href = "/user/main_profile";
//                   }
//                   seconds--;
//                 }, 1000);
              } else { 
                if(res.error_all){
                  // check all errors
                 var erori = res.error_all;
                 for(var key in erori) {
                   // create the eroare variable, which is used to add css properties to each element in the form
                   var eroare =  '.input-'+key;
                   var element_type = 'input';
                   // check if element is input or textarea
                   if(key == "message"){
                     element_type = 'textarea';
                   }
                    $(element_type+"[name='"+key+"']").addClass('input-has-error');
                   if(key == "accept_therms"){
                     erori[key][0] = "{{__('statics.accept_therms')}}";
                   } else{
                    $(".form-signup").find($(element_type+"[name='"+key+"']")).parent().addClass('active-input');
                    $(".form-signup").find($(element_type+"[name='"+key+"']")).parent().addClass('active-input-error');
                   }
                    $(".form-signup").find($(element_type+"[name='"+key+"']")).parent().find('.tricker-label-input').html(erori[key][0]);
                    $(".form-signup").find($(element_type+"[name='"+key+"']")).parent().find('.tricker-label-input').css("opacity", "1");
                    $(".form-signup").find($(element_type+"[name='"+key+"']")).parent().find('.tricker-label-input').css("color", "red");
                  }
                } else if(res.msg_error){
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.msg_error);
                } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-create-account").prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
      $(".btn-login-account").click(function() {
        $('.btn-login-account').html("{{__('statics.please_wait')}}");
        event.preventDefault();
          $(this).attr('disabled', 'disabled');
          $.ajax({
              method: 'POST',
              url: $(this).parent().parent().attr("action"),
              data: $(this).parent().parent().serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-login-account').html("{{__('statics.login_btn')}}");
              }, 200);
              if (res.success == true) {
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                var seconds = 5;
                var new_msg = res.msg + " Redirect to profile in " + seconds + " seconds.";
                $(".container-mare-modal .text-modal").html(new_msg);
                $(".form-login .general-input-form").val('');
                $(".form-login .tricker-label-input").css('opacity', '0');
                $(".btn-login-account").prop('disabled', false);
                $("header .btn-join").html("{{__('statics.my_profile_title')}}");
                $(".container-mare-modal").click(function(){
                  window.location.replace(res.url);
                });
                var sec_text = " seconds.";
                setInterval(function(){
                  if(seconds == 1){
                    sec_text = " second.";
                  }
                  new_msg = res.msg + " Redirect to profile in " + seconds + sec_text;
                  $(".container-mare-modal .text-modal").html(new_msg);
                  if(seconds == 0){
                    window.location.replace(res.url);
                  }
                  seconds--;
                }, 1000);
              } else { 
                if(res.error_all){
                  // check all errors
                 var erori = res.error_all;
                 for(var key in erori) {
                   // create the eroare variable, which is used to add css properties to each element in the form
                   var eroare =  '.input-'+key;
                    $("input[name='"+key+"']").addClass('input-has-error');
                    $(".form-login").find($("input[name='"+key+"']")).parent().addClass('active-input');
                    $(".form-login").find($("input[name='"+key+"']")).parent().addClass('active-input-error');
                    $(".form-login").find($("input[name='"+key+"']")).parent().find('.tricker-label-input').html(erori[key][0]);
                    $(".form-login").find($("input[name='"+key+"']")).parent().find('.tricker-label-input').css("opacity", "1");
                    $(".form-login").find($("input[name='"+key+"']")).parent().find('.tricker-label-input').css("color", "red");
                  }
                } else if(res.msg_error){
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.msg_error);
                } else{
                  $(".container-mare-modal-error .text-modal").html(res.msg_error);
                   if(res.account_unverified){
                      var action_resend = "{{action('AccountController@resend_confirmation')}}";
                      var html_insert_popup =  '<form class="form-resend-email" method="POST" action="'+action_resend+'">'+
                                                  '<input name="email" placeholder="Enter email" style="width:100%;"/>'+
                                                  '{{csrf_field()}}'+
                                                  '<button class="btn-modal btn-resend-email">Send email</button>'+
                                              '</form>';
                     $(".handle-error-container").html(html_insert_popup);
                   }
                  $(".btn-modal-error").click(function(){
                        $(".container-mare-modal-error").css("display", "flex").fadeOut();
                  });
                   $(".container-mare-modal-error").off('click');
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-login-account").prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
      $(document).on('click', '.btn-resend-email', function(){
        $('.btn-resend-email').html("{{__('statics.please_wait')}}");
        event.preventDefault();
          $(this).attr('disabled', 'disabled');
          $.ajax({
              method: 'POST',
              url: $(".form-resend-email").attr("action"),
              data: $(".form-resend-email").serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-resend-email').html("Ok");
              }, 200);
              if (res.success == true) {
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $(".handle-error-container").html('');
                $(".container-mare-modal-error").hide();
              } else { 
                  $(".handle-error-container input").addClass('error-line-input');
                  $(".container-mare-modal-error .text-modal").html(res.error);
                  $(".btn-resend-email").prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
      $(".btn-recover-pass").click(function() {
        $('.btn-recover-pass').html("{{__('statics.please_wait')}}");
        event.preventDefault();
          $(this).attr('disabled', 'disabled');
          $.ajax({
              method: 'POST',
              url: $(this).parent().parent().attr("action"),
              data: $(this).parent().parent().serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-recover-pass').html("{{__('statics.recover_btn')}}");
              }, 200);
              if (res.success == true) {
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $(".form-forgot .general-input-form").val('');
                $(".form-forgot .tricker-label-input").css('opacity', '0');
                $(".btn-recover-pass").prop('disabled', false);
                setTimeout(function(){
                  $(".btn-back-login").trigger('click');
                }, 3000);
              } else { 
                if(res.error_all){
                  // check all errors
                 var erori = res.error_all;
                 for(var key in erori) {
                   // create the eroare variable, which is used to add css properties to each element in the form
                   var eroare =  '.input-'+key;
                    $("input[name='"+key+"']").addClass('input-has-error');
                    $(".form-forgot").find($("input[name='"+key+"']")).parent().addClass('active-input');
                    $(".form-forgot").find($("input[name='"+key+"']")).parent().addClass('active-input-error');
                    $(".form-forgot").find($("input[name='"+key+"']")).parent().find('.tricker-label-input').html(erori[key][0]);
                    $(".form-forgot").find($("input[name='"+key+"']")).parent().find('.tricker-label-input').css("opacity", "1");
                    $(".form-forgot").find($("input[name='"+key+"']")).parent().find('.tricker-label-input').css("color", "red");
                  }
                } else if(res.msg_error){
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.msg_error);
                } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-recover-pass").prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
    });
  </script>
@endpush