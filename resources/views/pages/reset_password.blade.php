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
            <form class="form-forgot" action='{{ action("AccountController@resetPasswordForm") }}' method="post" style="display: block;">
              {{csrf_field()}}
              <input name="etoken-input" value="{{$etoken}}" type="hidden"/>
              <div class="normal-text-account">{{__('statics.title_recover_final')}}</div>
              <div class="container-input-general active-input">
                <label class="tricker-label-input"  label-text="{{__('statics.enter_password')}}">{{__('statics.enter_password')}}</label>
                <input type="password" class="general-input-form" name="password" placeholder="{{__('statics.enter_password')}}" autocomplete="off"/>
              </div>
              <div class="container-input-general active-input">
                <label class="tricker-label-input"  label-text="{{__('statics.enter_password2')}}">{{__('statics.enter_password2')}}</label>
                <input type="password" class="general-input-form" name="repeat_password" placeholder="{{__('statics.enter_password2')}}" autocomplete="off"/>
              </div>
              <div class="container-buttons-account">
                <button class="custom-btn btn-albastru btn-recover-pass big-general-btn" style="width: 100%;">{{__('statics.recover_btn')}}</button>
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
      </div>
   </div>
  </main>
@endsection
@push('scripts')
  <script>
    AOS.init();
    $(document).ready(function(){
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
                  var seconds = 5;
                  var new_msg = res.msg + " Redirect to profile in " + seconds + " seconds.";
                  $(".container-mare-modal .text-modal").html(new_msg);
                  $(".form-forgot .general-input-form").val('');
                  $(".form-forgot .tricker-label-input").css('opacity', '0');
                  $(".btn-login-account").prop('disabled', false);
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