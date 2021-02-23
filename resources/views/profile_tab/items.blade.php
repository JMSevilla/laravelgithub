<form class="container-down-profile-user container-add-edit-items" id="form-items" action="{{action('ProfileController@addEditItems')}}" method="POST">
  {{csrf_field()}}
    <div class="container-inputs-form-profile">
      <div class="container-down-profile-left">
       <div class="container-inputs-two-columns">
        <div class="container-input-profile-down">
          <label class="profile_title_label profile_title" div_text="{{__('statics.simple_title')}}">{{__('statics.simple_title')}}</label>
          <input type="text" name="profile_title" class="input-normal-profile" placeholder="Enter title here">
        </div>
        <div class="container-input-profile-down">
          <label class="profile_location_label profile_location" label_text="{{__('statics.location_simple')}}">{{__('statics.location_simple')}}</label>
          <input id="pac-input-item" type="text" name="profile_location" class="input-normal-profile" placeholder="Enter location here">
        </div>
      </div>
        <div class="container-skills-profile">
          <div class="title-profile-items title-margin-lite input_tags" div_text="{{__('statics.tag_your_item')}}">{{__('statics.tag_your_item')}}</div>
          <div class="text-normal-page-profile">{{__('statics.add_item_desc')}}</div>
<!--           <div class="title-profile-items">{{__('statics.select_category')}}</div> -->
          <div class="container-skills-tags tags-container"></div>
          <div class="add-new-skill-tag">
            <input class="new-skill-tag" placeholder="New tag"/>
            <div class="btn-add-skill btn-new-tag"><img src="../../images/plus.png"/></div>
          </div>
        </div>
        
        <div class="title-profile-items" div_can_have_errors="true" div_text="{{__('statics.general_information')}}">{{__('statics.general_information')}}</div>
        <div class="container-inputs-three-columns"></div>
        
        <div class="custom-fields-container">
          <div class="title-profile-items title-margin-lite">{{__('statics.my_custom_fields')}}</div>
          <div class="container-add-custom-fields">
            <input type="text" class="input-normal-profile custom-field-input-title" placeholder="Field title"/>
            <input type="text" class="input-normal-profile custom-field-input-description" placeholder="Value"/>
            <div class="btn-add-custom-field"><img src="../../images/plus.png"/></div>
          </div>
          <div class="my-custom-fields-container added-fields-container"></div>
        </div>
        
        <div class="line-form-project">
          <div class="project-input-box project-input-box-full">
            <div class="title-label-project title-label-project-no-margin uploaded_photos" div_text="{{__('statics.add_photos')}}">{{__('statics.add_photos')}}</div>
            <div class="input-file-upload-container">
              <div class="container-file-left">
                <input class="photos-files" type="file" name="uploaded_photos[]" style="display: none" multiple="true"/>
                <input class="input-form-project-popup add-photos-trick" placeholder="{{__('statics.add_photos')}}" readonly type="text"/>
                <div class="add-file-photos"><img src="../images/plus.png"/></div>
              </div>
            </div>
          </div>
        </div>
        <div class="line-form-project">
          <div class="project-input-box project-input-box-full container-photos-added"></div>
        </div>
        <div class="line-form-project">
          <div class="project-input-box project-input-box-full">
            <div class="title-label-project title-label-project-no-margin uploaded_files" div_text="{{__('statics.add_files')}}">{{__('statics.add_files')}}</div>
            <div class="input-file-upload-container">
              <div class="container-file-left">
                <input class="file-input-project" name="uploaded_files[]" multiple="true" type="file" style="display: none"/>
                <input class="input-form-project-popup file-name" readonly placeholder="{{__('statics.file_name')}}" type="text"/>
                <div class="add-file"><img src="../images/folder.png"/></div>
              </div>
            </div>
          </div>
        </div>
        <div class="line-form-project">
          <div class="container-files-added"></div>
        </div>
      </div>
      <div class="container-down-profile-right">
        
        <div class="container-fees-profile">
          <div class="title-profile-items radio_fee" div_text="{{__('statics.select_fixed_fee')}}">{{__('statics.select_fixed_fee')}}</div>
          <div class="container-radios">
            <label class="container-custom-radio">Hourly
              <input type="radio" name="radio_fee" checked value="hourly">
              <span class="checkmark-custom-radio"></span>
            </label>
            <label class="container-custom-radio">Day
              <input type="radio" name="radio_fee" value="day">
              <span class="checkmark-custom-radio"></span>
            </label>
          </div>
        </div>
        <div class="container-input-profile-down">
          <div class="title-profile-items fixed_fee" div_text="{{__('statics.enter_fee')}}">{{__('statics.enter_fee')}}</div>
          <input type="number" min="0" name="fixed_fee" class="input-film-bio-other-profile input-skill-error" placeholder="{{__('statics.fixed_fee_eg')}}">
        </div>
        <div class="container-fees-profile">
          <div class="title-profile-items radio_currency" div_text="{{__('statics.select_currency')}}">{{__('statics.select_currency')}}</div>
          <div class="container-radios">
            <label class="container-custom-radio">Dollars
              <input type="radio" name="radio_currency" value="dollar" checked>
              <span class="checkmark-custom-radio"></span>
            </label>
            <label class="container-custom-radio">Euro
              <input type="radio" name="radio_currency" value="euro">
              <span class="checkmark-custom-radio"></span>
            </label>
          </div>
        </div>
        
        <div class="container-input-profile-down container-input-down-full">
          <div class="title-profile-items short_description" div_text="{{__('statics.short_description')}}">{{__('statics.short_description')}}</div>
          <textarea type="text" name="short_description" class="input-normal-profile textarea-normal-profile"></textarea>
        </div>
        <div class="container-input-profile-down container-input-down-full">
          <div class="title-profile-items long_description" div_text="{{__('statics.long_description')}}">{{__('statics.long_description')}}</div>
          <textarea type="text" name="long_description" class="input-normal-profile textarea-normal-profile textarea-long"></textarea>
        </div>
      </div>
    </div>
    <div class="hidden-inputs" style="display: none"></div>
    <input type="hidden" name="add_edit_id"/>
    <input type="hidden" name="subitem_id" value="" class="id-subitem-selected-particular"/>
    <input type="hidden" name="check_add_edit" value="add"/>
    <input type="hidden" name="input_tags"/>
    <button class="custom-btn btn-albastru btn-save-changes btn-save-items" type="button">{{__('statics.update_and_save')}}</button>
  </form>
@push('scripts')
  <script>
    $(document).ready(function(){
      
      $('#form-items .textarea-normal-profile').on('input', function(){
        $(this).parent().find('.div-error').css("color", "inherit");
        $(this).parent().find('.div-error').text($(this).parent().find('.div-error').attr('div_text'));
        $(this).parent().find('.div-error').removeClass('div-error');
      });
    $(".btn-cancel-item").click(function(){
       $(".container-add-edit-items").slideUp();
      $(".container-subitems-listed").slideDown();
      $(".btn-cancel-item").hide();
      $(".container-type-of-profiles").show();
      $(".id-subitem-selected-particular").val('');
      $("#form-items input[name=add_edit_id]").val('');
    });
      
      var please_wait = $('.please_wait_text').text();
      var update_and_save = $('.update_and_save').text();
      $('.btn-save-items').click(function(){
        $("#form-items").trigger('submit');
      });
      $("#form-items").on('submit', function(event) {
          $('.btn-save-items').html(please_wait);
          $('.btn-save-items').attr('disabled', 'disabled');
          var custom_fields = '';
          $("#form-items .my-custom-fields-container.added-fields-container > .item-custom-field").each(function(){
            var field_title = $(this).find('.item-added-field>.field_title').text();
            var field_desc = $(this).find('.item-added-field>.field_desc').text();
            custom_fields += "<input type='hidden' name='custom_title_added[]' value='"+field_title+"' /><input type='hidden' name='custom_value_added[]' value='"+field_desc+"' /><input type='hidden' name='is_custom_field_added[]' value=true />";
          });
          var selected_input_tags = [];
          $(".tags-container > .skill-box-active").each(function(){
            if($(this).hasClass('skill-box-active')){
              selected_input_tags.push($(this).text().replace('#', ''));
            }
          });
          $("#form-items input[name=input_tags]").val(selected_input_tags);
          $("#form-items > .hidden-inputs").html(custom_fields);
          var formData = new FormData(this);
          event.preventDefault();
          $.ajax({
              method: 'POST',
              url: $("#form-items").attr('action'),
              type: 'submit',
              data: formData,
              processData: false,
              contentType: false,
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-save-items').html(update_and_save);
              }, 200);
              if (res.success == true) {
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $(".btn-save-items").prop('disabled', false);
                if(res.saved_id){
                  $("#form-items input[name=add_edit_id]").val(res.saved_id);
                } else{
                  $("#form-items input[name=add_edit_id]").val('');
                }
                setTimeout(function(){
                  var subtype_id = $(".item-menu-profile-settings.active-item-menu-profile-detail").attr("subtype_id");
                  window.location.href = document.location.protocol+"//"+window.location.hostname + window.location.pathname + "?subtype_id="+subtype_id;
                }, 2500);
              } else { 
                if(res.error_all){
                  var html_error = '';
                  var erori = res.error_all;
                  for(var key in erori) {
                   // create the eroare variable, which is used to add css properties to each element in the form
                   var eroare =  '.input-'+key;
                    if(key.indexOf("custom_value") >= 0){
                      $("#form-items .title-profile-items[div_can_have_errors=true]").html(erori[key][0]);
                      $("#form-items .title-profile-items[div_can_have_errors=true]").css("color", "red");
                      $("#form-items .input-fields-custom>input").filter(function() {
                          return !this.value;
                      }).addClass("input-profile-has-error");
                    } else{
                      var simple_div_error = "."+key;
                      $("#form-items").find($(simple_div_error)).addClass('div-error');
                      $("#form-items").find($(simple_div_error)).html(erori[key][0]);
                      $("#form-items").find($(simple_div_error)).css("color", "red");
                    }
                  }
                } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-save-items").prop('disabled', false);
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