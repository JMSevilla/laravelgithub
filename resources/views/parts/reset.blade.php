<div class="container-right-account container-reset-password-right">
  <div class="titlu-right-account-container">
    <div class="titlu-right-account titlu-back-reset"><img src="../../images/left_arrow.png" class="img-arrow-reset"/>{{__('statics.reset_password_title')}}</div>
  </div>
  <div class="cointainer-content-right-account">
     <form class="form-container-reset-password" action='{{ action("AccountController@resetPasswordAccount") }}' method="post">
       {{csrf_field()}}
        <div class="container-input-profile-down container-input-down-full">
          <label label_text="{{__('statics.old_password_title')}}">{{__('statics.old_password_title')}}</label>
          <input type="password" name="password" class="input-normal-profile"/>
        </div>
        <div class="container-input-profile-down container-input-down-full">
          <label label_text="{{__('statics.repeat_password_title')}}">{{__('statics.repeat_password_title')}}</label>
          <input type="password" name="repeat_password" class="input-normal-profile"/>
        </div>
        <div class="container-btns-reset">
          <div class="custom-btn btn-albastru btn-cancel-normal btn-cancel-reset">{{__('statics.cancel_title')}}</div>
          <div class="custom-btn btn-albastru btn-reset-password-account">{{__('statics.save_changes_title')}}</div>
        </div>
    </form>
  </div>
</div>
@push('scripts')
  <script>
    $(document).ready(function(){
      $(".btn-reset-password-account").click(function() {
        $('.btn-reset-password-account').html("{{__('statics.please_wait')}}");
        event.preventDefault();
          $(this).attr('disabled', 'disabled');
          $.ajax({
              method: 'POST',
              url: $(this).parent().parent().attr("action"),
              data: $(this).parent().parent().serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-reset-password-account').html("{{__('statics.save_changes_title')}}");
              }, 200);
              if (res.success == true) {
                  $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                  $(".container-mare-modal .text-modal").html(res.msg);
                  $(".form-container-reset-password .input-normal-profile").val('');
                  $(".btn-login-account").prop('disabled', false);
                  setTimeout(function(){
                    if($(".container-mare-modal").is(':visible')){ 
                      $(".container-mare-modal").css("display", "flex").fadeOut();
                    }
                    $(".container-reset-password-right .titlu-back-reset").trigger('click');
                  }, 5000);
                  
              } else { 
                if(res.error_all){
                  // check all errors
                 var erori = res.error_all;
                 for(var key in erori) {
                   // create the eroare variable, which is used to add css properties to each element in the form
                   var eroare =  '.input-'+key;
                    $("input[name='"+key+"']").addClass('input-has-error');
                    $(".form-container-reset-password").find($("input[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                    $(".form-container-reset-password").find($("input[name='"+key+"']")).parent().find('label').css("color", "red");
                  }
                } else if(res.msg_error){
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.msg_error);
                } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-reset-password-account").prop('disabled', false);
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