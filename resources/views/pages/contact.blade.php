@extends('parts.template') 
@section('content')
  <main id="content" class="main-content-over-parallax" data-parallax="scroll" data-image-src="../images/contact_back.png" data-speed="0.3">
    <div class="back-trick-over-contact"></div>
    <div class="container container-page-without-header container-contact">
      <div class="title-contact">{{__('statics.contact_title')}}</div>
      <form class="form-contact" action='{{ action("ContactController@sendMessage") }}' method="post">
        {{csrf_field()}}
        <div class="container-input-general active-input container-input-contact">
          <label class="tricker-label-input" label-text="{{__('statics.enter_name')}}">{{__('statics.enter_name')}}</label>
          <input class="general-input-form" name="name" placeholder="{{__('statics.enter_name')}}" autocomplete="off"/>
        </div>
        <div class="container-input-general container-input-contact">
          <label class="tricker-label-input" label-text="{{__('statics.enter_phone')}}">{{__('statics.enter_phone')}}</label>
          <input class="general-input-form" name="phone" placeholder="{{__('statics.enter_phone')}}" autocomplete="off"/>
        </div>
        <div class="container-input-general container-input-contact">
          <label class="tricker-label-input" label-text="{{__('statics.enter_email')}}">{{__('statics.enter_email')}}</label>
          <input class="general-input-form" type="text" name="email" placeholder="{{__('statics.enter_email')}}" autocomplete="off"/>
        </div>
        <div class="container-input-general container-input-contact">
          <label class="tricker-label-input" label-text="{{__('statics.enter_location')}}">{{__('statics.enter_location')}}</label>
          <input class="general-input-form" type="text" name="location" placeholder="{{__('statics.enter_location')}}" autocomplete="off"/>
        </div>
        <div class="container-input-general container-textarea-contact-message">
          <label class="tricker-label-input" label-text="{{__('statics.enter_message')}}">{{__('statics.enter_message')}}</label>
          <textarea class="general-input-form textarea-contact-message" type="text" name="message" placeholder="{{__('statics.enter_message')}}"></textarea>
        </div>
      <div class="apply-job-bottom">
        <div class="text-left-apply-job">{{settings('contact.contact_therms')}}</div>
        <button class="custom-btn btn-albastru btn-send-rating btn-send-message">{{__('statics.send_message')}}</button>
      </div>
      </form>
    </div>
    <div class="container container-elements-under-contact">
      <div class="container-info-contact container-contact">
         <div class="container-box-info-contact">
            <div class="title-contact-info">{{__('statics.contact_info_title')}}</div>
            <div class="text-contact-info">
              <div>{{__('statics.email')}}: {{settings('contact.contact_info_email')}}</div>
              <div>{{__('statics.phone')}}: {{settings('contact.contact_info_phone')}}</div>
              <div>{{__('statics.address')}}: {{settings('contact.contact_info_address')}}</div>
            </div>
          </div>
         <div class="container-box-info-contact">
            <div class="title-contact-info">{{__('statics.marketing_department_title')}}</div>
            <div class="text-contact-info">
              <div>{{__('statics.email')}}: {{settings('contact.contact_marketing_email')}}</div>
              <div>{{__('statics.phone')}}: {{settings('contact.contact_marketing_phone')}}</div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
@push('scripts')
<script>
  $(document).ready(function() {
    $(".btn-send-message").click(function() {
      $('.btn-send-message').html('Sending...');
      event.preventDefault();
        $(this).attr('disabled', 'disabled');
        $.ajax({
            method: 'POST',
            url: $(this).parent().parent().attr("action"),
            data: $(this).parent().parent().serializeArray(),
            context: this, async: true, cache: false, dataType: 'json'
        }).done(function(res) {
            setTimeout(function(){
                $('.btn-send-message').html("{{__('statics.send_message')}}");
            }, 200);
            if (res.success == true) {
              $(".container-mare-modal").css("display", "flex").hide().fadeIn();
              $(".container-mare-modal .text-modal").html(res.msg);
              $(".form-contact .general-input-form").val('');
              $(".form-contact .tricker-label-input").css('opacity', '0');
              $(".btn-send-message").prop('disabled', false);
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
                  $(".form-contact").find($(element_type+"[name='"+key+"']")).parent().addClass('active-input');
                  $(".form-contact").find($(element_type+"[name='"+key+"']")).parent().addClass('active-input-error');
                  $(".form-contact").find($(element_type+"[name='"+key+"']")).parent().find('.tricker-label-input').html(erori[key][0]);
                  $(".form-contact").find($(element_type+"[name='"+key+"']")).parent().find('.tricker-label-input').css("opacity", "1");
                  $(".form-contact").find($(element_type+"[name='"+key+"']")).parent().find('.tricker-label-input').css("color", "red");
                }
              }
              $(".btn-send-message").prop('disabled', false);
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