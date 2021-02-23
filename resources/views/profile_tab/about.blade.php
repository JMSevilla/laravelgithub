  <form id="form-informations" class="container-down-profile-user about-container" action="{{action('ProfileController@addEditInformations')}}" method="POST">
    {{csrf_field()}}
    <div class="title-profile-items title-profile-items-margins" div_can_have_errors=true div_error="{{__('statics.tell_more_about_you')}}">{{__('statics.tell_more_about_you')}}</div>
      <div class="container-inputs-two-columns">
        <div class="container-input-profile-down">
          <label class="profile_title_label" label_text="{{__('statics.simple_title')}}">{{__('statics.simple_title')}}</label>
          <input type="text" name="profile_title" class="input-normal-profile" placeholder="Enter title here">
        </div>
        <div class="container-input-profile-down">
          <label class="profile_location_label" label_text="{{__('statics.location_simple')}}">{{__('statics.location_simple')}}</label>
          <input id="pac-input" type="text" name="profile_location" class="input-normal-profile" placeholder="Enter location here">
        </div>
      </div>
    
      <div class="container-inputs-three-columns">
        <div class="title-profile-items">{{__('statics.no_default_inputs')}}</div>
      </div>
    
    <div class="custom-fields-container">
      <div class="title-profile-items title-margin-lite">{{__('statics.my_custom_fields')}}</div>
      <div class="container-add-custom-fields">
        <input type="text" class="input-normal-profile custom-field-input-title" placeholder="Field title"/>
        <input type="text" class="input-normal-profile custom-field-input-description" placeholder="Value"/>
        <div class="btn-add-custom-field"><img src="../../images/plus.png"/></div>
      </div>
      <div class="my-custom-fields-container added-fields-container"></div>
    </div>
    <div class="custom-fields-container">
      <div class="container-input-profile-down input-three-columns">
        <label class='language_title_label' label_text="{{__('statics.languages_title')}}">{{__('statics.languages_title')}}</label>
      </div>
      <div class="container-add-custom-fields">
        <input type="text" class="input-normal-profile custom-field-input-title language_title" placeholder="e.g.English"/>
        <select class="input-normal-profile custom-field-input-description select-level-language">
          <option value="{{__('statics.lang_beginner')}}">{{__('statics.lang_beginner')}}</option>
          <option value="{{__('statics.lang_medium')}}">{{__('statics.lang_medium')}}</option>
          <option value="{{__('statics.lang_advanced')}}">{{__('statics.lang_advanced')}}</option>
          <option value="{{__('statics.lang_expert')}}">{{__('statics.lang_expert')}}</option>
        </select>
        <div class="btn-add-language"><img src="../../images/plus.png"/></div>
      </div>
      <div class="my-custom-fields-container languages-container"></div>
    </div>
    <div class="hidden-inputs" style="display: none"></div>
    <div class="hidden-inputs-languages" style="display: none"></div>
    
    <div class="container-skills-profile general-tags-container">
      <div class="title-profile-items input_tags" div_text="{{__('statics.select_hash_tags')}}">{{__('statics.select_hash_tags')}}</div>
      <div class="container-skills-tags tags-container"></div>
      <div class="add-new-skill-tag">
        <input class="new-skill-tag" placeholder="{{__('statics.new_hashtag')}}"/>
        <div class="btn-add-skill btn-new-tag"><img src="../../images/plus.png"/></div>
      </div>
    </div>
    <div class="container-skills-profile skills-tags-container">
      <div class="title-profile-items input_sports" div_text="{{__('statics.select_sports')}}">{{__('statics.select_sports')}}</div>
      <div class="container-skills-tags sports-container"></div>
      <div class="add-new-skill-sport">
        <input class="new-skill-sport" placeholder="{{__('statics.new_skill')}}"/>
        <div class="btn-add-skill btn-new-sport"><img src="../../images/plus.png"/></div>
      </div>
    </div>
    <div class="container-fees-profile">
      <div class="title-profile-items radio_fee" div_text="{{__('statics.select_fixed_fee')}}">{{__('statics.select_fixed_fee')}}</div>
      <div class="container-radios">
        <label class="container-custom-radio">{{__('statics.hourly')}}
          <input type="radio" name="radio_fee" checked value="hourly">
          <span class="checkmark-custom-radio"></span>
        </label>
        <label class="container-custom-radio">{{__('statics.daily')}}
          <input type="radio" name="radio_fee" value="day">
          <span class="checkmark-custom-radio"></span>
        </label>
      </div>
      <input type="hidden" name="hour_day_fee" class="input-normal-profile input-small-fee-amount" placeholder="Enter fee here"/>
    </div>
    <div class="container-input-profile-down">
      <div class="title-profile-items fixed_fee" div_text="{{__('statics.enter_fixed_fee')}}">{{__('statics.enter_fixed_fee')}}</div>
<!--       <label label_text="{{__('statics.enter_fixed_fee')}}" label_text="{{__('statics.enter_fixed_fee')}}">{{__('statics.enter_fixed_fee')}}</label> -->
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
<!--     <button class="custom-btn btn-albastru btn-save-changes btn-save-skills">{{__('statics.update_and_save')}}</button> -->
    <input type="hidden" name="add_edit_id"/>
    <input type="hidden" name="subitem_id" value="" class="id-subitem-selected"/>
    <input type="hidden" name="check_add_edit" value="add"/>
    <input type="hidden" name="input_tags"/>
    <input type="hidden" name="input_sports"/>
    
   <button class="custom-btn btn-albastru btn-save-changes btn-save-informations">{{__('statics.update_and_save')}}</button>
  </form>
@push('scripts')
  <script>
    $(document).ready(function(){
      var please_wait = $('.please_wait_text').text();
      var update_and_save = $('.update_and_save').text();
      $('.btn-save-informations').click(function() {
          $('.btn-save-informations').html(please_wait);
          event.preventDefault();
          $(this).attr('disabled', 'disabled');
        
          var selected_input_tags = [];
          var selected_input_sports = [];

          $("#form-informations .tags-container>.skill-box").each(function(item){
            if($(this).hasClass('skill-box-active')){
              selected_input_tags.push($(this).text().replace('#', ''));
            }
          }); 
          $("#form-informations .sports-container>.skill-box").each(function(item){
            if($(this).hasClass('skill-box-active')){
              selected_input_sports.push($(this).text());
            }
          });
          $("#form-informations input[name=input_tags]").val(selected_input_tags);
          $("#form-informations input[name=input_sports]").val(selected_input_sports);
          $("#form-informations input[name=add_edit_id]").val($(".add_edit_id").val());
        
          var custom_fields = '';
          $(".my-custom-fields-container.added-fields-container > .item-custom-field").each(function(){
            var field_title = $(this).find('.item-added-field>.field_title').text();
            var field_desc = $(this).find('.item-added-field>.field_desc').text();
            custom_fields += "<input type='hidden' name='custom_title_added[]' value='"+field_title+"' /><input type='hidden' name='custom_value_added[]' value='"+field_desc+"' /><input type='hidden' name='is_custom_field_added[]' value=true />";
          });
          $("#form-informations > .hidden-inputs").html(custom_fields);
          $("#form-informations input[name=add_edit_id]").val($(".add_edit_id").val());
          custom_fields = '';
          $(".my-custom-fields-container.languages-container > .item-custom-field").each(function(){
            var field_title = $(this).find('.item-added-field>.field_title').text();
            var field_desc = $(this).find('.item-added-field>.field_desc').text();
            custom_fields += "<input type='hidden' name='language_title[]' value='"+field_title+"' /><input type='hidden' name='language_value[]' value='"+field_desc+"' />";
          });
          $("#form-informations > .hidden-inputs-languages").html(custom_fields);
          $.ajax({
              method: 'POST',
              url: $('#form-informations').attr("action"),
              data: $('#form-informations').serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-save-informations').html(update_and_save);
              }, 200);
              if (res.success == true) {
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $("#form-informations").trigger('reset');
//                 $(".my-custom-fields-container.added-fields-container").html('');
//                 $(".my-custom-fields-container.languages-container").html('');
                $(".btn-save-informations").prop('disabled', false);
                if(res.saved_id){
                  $(".add_edit_id").val(res.saved_id);
                } else{
                  $(".add_edit_id").val('');
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
                    var simple_div_error = "."+key;
                    $("#form-informations").find($(simple_div_error)).addClass('div-error');
                    $("#form-informations").find($(simple_div_error)).html(erori[key][0]);
                    $("#form-informations").find($(simple_div_error)).css("color", "red");
                    
                    if(key.indexOf("custom_value") >= 0){
                      $(".title-profile-items[div_can_have_errors=true]").html(erori[key][0]);
                      $(".title-profile-items[div_can_have_errors=true]").css("color", "red");
                      $(".input-three-columns>input").filter(function() {
                          return !this.value;
                      }).addClass("input-profile-has-error");
                    } else{
                      $("."+key).addClass('input-has-error');
                      $("input[name="+key+"]").addClass('input-has-error');
                      $("#form-informations").find($('.'+key+'_label')).html(erori[key][0]);
                      $("#form-informations").find($('.'+key+'_label')).css("color", "red");
                      $("#form-informations").find($('.'+key+'_error')).html(erori[key][0]);
                      $("#form-informations").find($('.'+key+'_error')).css("color", "red");
                    }
                  }
                  // still working progress
                  $('html, body').animate({
                      scrollTop: $("#form-informations").find($('.input-has-error')).first().offset().top - 200
                  }, 1000);
                } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-save-informations").prop('disabled', false);
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