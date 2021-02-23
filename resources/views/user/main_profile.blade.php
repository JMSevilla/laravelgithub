<div class="container-right-account">
    <div class="titlu-right-account-container">
      <div class="titlu-right-account">{{Session::get('user')['usertype']}}</div>
  </div>
  <div class="container-top-profile-user">
    <div class="container-left-user-settings">
      <div class="user-logo-edit">
        @if(Session::has('user') && $avatar)
          <img class="user-logo-profile" src="{{Voyager::image($avatar)}}"/>
        @else
          <img class="user-logo-profile" src="../../images/user_empty.png"/>
        @endif
        <div class="edit-settings-user btn-edit-profile-pic">
          <img src="../../images/edit.png"/>
        </div>
      </div>
      <div class="container-details-user-profile">
        <div class="username-profile-details">{{Session::get('user')['name']}}</div>
        <div class="location-profile-details @if(Session::get('user')['location'] == null)trigger-location @endif">@if(Session::get('user')['location'] != null) {{Session::get('user')['location']}} @else {{__('statics.set_location')}} @endif</div>
        <div class="usertype-profile-details trick-user-photo">{{__('statics.user_photo')}}</div>
      </div>
    </div>
    <div class="custom-btn btn-albastru btn-reset-password">{{__('statics.reset_password_title')}}</div>
  </div>
  <form class="container-down-profile-user about-container form-edit-profile" action='{{ action("AccountController@editProfileInfo") }}' method="post">
    {{csrf_field()}}
    <input type="hidden" name="prefix" class="input-prefix-phone" />
    <div class="container-inputs-form-profile">
      <div class="container-down-profile-left">
        @if(strtolower(Session::get('user')['usertype']) == 'agency')
           <div class="title-profile-items">{{__('statics.choose_profile_type')}}</div>
           <div class="container-radios">
            <label class="container-custom-radio radio-user-type">{{__('statics.agency_profile')}}
              <input type="radio" name="profile_type" @if(Session::get('user')['company_name'] != null) checked @endif value="agency_company">
              <span class="checkmark-custom-radio"></span>
            </label>
            <label class="container-custom-radio radio-user-type">{{__('statics.casting_agent')}}
              <input type="radio" name="profile_type" @if(Session::get('user')['company_name'] == null) checked @endif  value="agency_individual">
              <span class="checkmark-custom-radio"></span>
            </label>
          </div>
        @endif
        @if(strtolower(Session::get('user')['usertype']) == 'producer')
           <div class="title-profile-items">{{__('statics.choose_profile_type')}}</div>
           <div class="container-radios">
            <label class="container-custom-radio radio-user-type">{{__('statics.producer_company')}}
              <input type="radio" name="profile_type"  @if(Session::get('user')['company_name'] != null) checked @endif  value="producer_company">
              <span class="checkmark-custom-radio"></span>
            </label>
            <label class="container-custom-radio radio-user-type">{{__('statics.individual_producer')}}
              <input type="radio" name="profile_type" @if(Session::get('user')['company_name'] == null) checked @endif  value="producer_individual">
              <span class="checkmark-custom-radio"></span>
            </label>
          </div>
        @endif
        <div class="title-profile-items">{{__('statics.mandatory_informations')}}</div>
        <div class="container-input-profile-down">
          <label label_text="{{__('statics.name_simple')}}">{{__('statics.name_simple')}}</label>
          <input type="text" name="name" class="input-normal-profile" placeholder="{{__('statics.type_username')}}" value="{{Session::get('user')['name']}}"/>
        </div>
        <div class="container-input-profile-down">
          <label label_text="{{__('statics.email_simple')}}">{{__('statics.email_simple')}}</label>
          <input type="text" name="email" class="input-normal-profile" placeholder="{{__('statics.type_email')}}" value="{{Session::get('user')['email']}}"/>
        </div>
        <div class="container-input-profile-down">
          <label label_text="{{__('statics.phone_simple')}}">{{__('statics.phone_simple')}}</label>
          <input id="phoneField" type="tel" type="text" name="phone" class="input-normal-profile" placeholder="{{__('statics.type_phone')}}" value="{{Session::get('user')['phone']}}"/>
        </div>
        <div class="container-input-profile-down">
          <label label_text="{{__('statics.location_simple')}}" label_text_empty="{{__('statics.location_empty_label')}}">{{__('statics.location_simple')}}</label>
          <input id="pac-input" type="text" name="location" class="input-normal-profile" placeholder="{{__('statics.type_location')}}" value="{{Session::get('user')['location']}}"/>
        </div>
        <div class="container-company" @if(Session::get('user')['company_name'] != null) style="display: flex;" @endif>
          <div class="container-input-profile-down">
            <label label_text="{{__('statics.company_name')}}">{{__('statics.company_name')}}</label>
            <input type="text" name="company_name" class="input-normal-profile" placeholder="{{Session::get('user')['company_name']}}" value="{{Session::get('user')['company_name']}}"/>
          </div>
          <div class="container-input-profile-down">
            <label label_text="{{__('statics.company_registration')}}">{{__('statics.company_registration')}}</label>
            <input type="text" name="company_registration" class="input-normal-profile" placeholder="{{Session::get('user')['company_registration']}}" value="{{Session::get('user')['company_registration']}}"/>
          </div>
          <div class="container-input-profile-down">
            <label label_text="{{__('statics.company_address')}}">{{__('statics.company_address')}}</label>
            <input type="text" name="company_address" class="input-normal-profile" placeholder="{{Session::get('user')['company_address']}}" value="{{Session::get('user')['company_address']}}"/>
          </div>
        </div>
        <div class="container-input-profile-down container-input-down-full" style="display: none !important;">
          <label label_text="{{__('statics.usertype_simple')}}">{{__('statics.usertype_simple')}}</label>
          <input type="text" name="usertype" class="input-normal-profile readonly-input" placeholder="{{Session::get('user')['usertype']}}" readonly value="{{Session::get('user')['usertype']}}"/>
        </div>
      </div>
      <div class="container-down-profile-right">
        @if(in_array(Session::get('user')['usertype'], ['Producer', 'Produzent']))
            @if(empty($documents) || count($documents) <= 0)
              <div class="title-profile-items title-margin-lite">
                @if(strtolower(Session::get('user')['usertype']) == 'producer')
                  {{__('statics.are_you_producer')}}?
                @elseif(strtolower(Session::get('user')['usertype']) == 'agency')
                  {{__('statics.are_you_agency')}}?
                @else
                  {{__('statics.are_you_actor')}}?
                @endif
              </div>
              <div class="text-normal-page-profile">{{__('statics.are_you_producer_desc')}}</div>
              <div class="container-input-profile-down container-input-down-full upload-documents-container">
                <input type="text" class="input-normal-profile input-upload-docs" value="{{__('statics.upload_documents')}}" readonly/>
                <div class="box-upload-file-trick">
                  <img src="../../images/folder.png"/>
                </div>
              </div>
            @else
              <div class="text-normal-page-profile">{{__('statics.your_uploaded_documents')}}. {{__('statics.checking_status')}}: {{$validation_status}}</div>
              <div class="container-input-profile-down container-input-down-full upload-documents-container">
                <div class="container-documents-uploaded">
                  @foreach($documents as $key => $document)
                    <div class="container-box-file">
                      <a class="container-box-file-left" href="user/view_document/{{$document}}" target="_blank">
                        <img src="../images/folder.png">
                      </a>
                      <div class="container-box-file-right">
                        <div class="container-box-file-title">{{__('statics.uploaded_document')}}{{$key+1}}</div>
                        @if($doc_validated == 0)
                          <div class="btn-delete-file-box btn-delete-uploaded-document" file_name="{{$document}}">{{__('statics.delete')}}</div>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
            @endif

            <div class="upload-documents-container-buttons">
              <div class="custom-btn btn-albastru btn-save-changes btn-send-documents">{{__('statics.send')}}</div>
              <div class="custom-btn btn-albastru btn-save-changes btn-cancel-send-documents">{{__('statics.cancel_title')}}</div>
            </div>
        @endif
        <a href="therms" class="container-input-profile-down container-input-down-full usertype-profile-details container-percentage-text tooltip" title="{{__('statics.click_to_see_terms')}}">
          <div class="container-percentage-text">{{settings('site.percentage_text')}}</div>
          <div class="checkmark-right">
            <img src="../images/check_profile.png"/>
          </div>
        </a>
        <div class="container-input-profile-down container-input-down-full" @if(!in_array(Session::get('user')['usertype'], ['Producer', 'Produzent'])) style="margin-top: 30px;" @endif>
          <label>{{__('statics.short_description')}}</label>
          <textarea type="text" name="short_description" class="input-normal-profile textarea-normal-profile">{{Session::get('user')['short_description']}}</textarea>
        </div>
      </div>
    </div>
    <button class="custom-btn btn-albastru btn-save-changes btn-save-account-info">{{__('statics.update_profile')}}</button>
    
  </form>
  <form style="display: none" class="form-delete-doc" action='{{ action("AccountController@deleteDocProve") }}' method="post">
    {{csrf_field()}}
    <input type="text" name="file_name" class="delete-file-doc" style="display: none;"/>
  </form>


</div>
@push('styles')
  <link rel="stylesheet" href="https://intl-tel-input.com/node_modules/intl-tel-input/build/css/intlTelInput.css?40">
@endpush
@push('scripts')
<script src="https://intl-tel-input.com/node_modules/intl-tel-input/build/js/intlTelInput.js?70" type="text/javascript"></script>
  <script>
    $(document).ready(function(){
    var inputItem = document.querySelector("#phoneField");
    var iti = window.intlTelInput(inputItem);
    inputItem.addEventListener("countrychange", function() {
      $(".input-prefix-phone").val(iti.getSelectedCountryData().dialCode);
    });
      $('.form-prove-documents').on('submit', function(event) {
        var formData = new FormData(this);
        $('.btn-send-documents').html("{{__('statics.sending')}}");
        event.preventDefault();
          $('.btn-send-documents').attr('disabled', 'disabled');
          $.ajax({
              method: 'POST',
              url: $('.form-prove-documents').attr("action"),
              data: formData,
              processData: false,
              contentType: false,
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
            console.log(res);
              setTimeout(function(){
                  $('.btn-send-documents').html("{{__('statics.send')}}");
              }, 200);
              if (res.success == true) {
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $(".btn-send-documents").prop('disabled', false);
                $(".upload-documents-container-buttons").css('display', 'none');
                setTimeout(function(){
                  window.location.reload();
                }, 2500);
              } else {
                $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal-error .text-modal").html(res.fail_error);
                $(".btn-send-documents").prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
      
      $(".btn-save-account-info").click(function() {
        $('.btn-save-account-info').html("{{__('statics.please_wait')}}");
        event.preventDefault();
          $(this).attr('disabled', 'disabled');
          $.ajax({
              method: 'POST',
              url: $(this).parent().attr("action"),
              data: $(this).parent().serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-save-account-info').html("{{__('statics.update_profile')}}");
              }, 200);
              if (res.success == true) {
                  $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                  $(".container-mare-modal .text-modal").html(res.msg);
                  $(".btn-save-account-info").prop('disabled', false);
                  setTimeout(function(){
                    if($(".container-mare-modal").is(':visible')){ 
                      $(".container-mare-modal").css("display", "flex").fadeOut();
                    }
                  }, 5000);
                  
              } else { 
                if(res.error_all){
                  // check all errors
                 var erori = res.error_all;
                 for(var key in erori) {
                   // create the eroare variable, which is used to add css properties to each element in the form
                   var eroare =  '.input-'+key;
                    $("input[name='"+key+"']").addClass('input-has-error');
                    $(".form-edit-profile").find($("input[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                    $(".form-edit-profile").find($("input[name='"+key+"']")).parent().find('label').css("color", "red");
                  }
                } else if(res.msg_error){
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.msg_error);
                } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-save-account-info").prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
      
      $(".btn-delete-uploaded-document").click(function(event){
        if(confirm("{{__('statics.delete_file_title')}}?")){ 
          $(this).addClass('document-deleted');
          $(".delete-file-doc").val($(this).attr('file_name'));
          $(".form-delete-doc").trigger('submit');
          event.stopPropagation();
          return;
        } else{
          event.stopPropagation();
          return;
        }
      });
      $('.form-delete-doc').on('submit', function(event) {
          var formData = new FormData(this);
          event.preventDefault();
          $.ajax({
              method: 'POST',
              url: $('.form-delete-doc').attr("action"),
              data: formData,
              processData: false,
              contentType: false,
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              if (res.success == true) {
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $(".btn-send-documents").prop('disabled', false);
                $(".document-deleted").parent().parent().fadeOut(300, function() {
                  $(this).remove(); 
                });
                setTimeout(function(){
                  if($(".container-documents-uploaded > .container-box-file").length <= 0){
                    window.location.reload();   
                  }
                }, 500);
              } else {
                $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal-error .text-modal").html(res.fail_error);
                $(".btn-send-documents").prop('disabled', false);
                $(".document-deleted").removeClass('document-deleted');
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
      $("input[name=profile_type]").on('change', function(){
        if($(this).val() == 'agent_company' || $(this).val() == 'producer_company'){
          $(".container-company").slideDown().css("display", "flex");
        } else{
          $(".container-company").slideUp();
        }
      });
    });
  </script>
@endpush