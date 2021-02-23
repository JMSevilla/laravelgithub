<form class="container-down-profile-user skills-container" id="form-skills" action='{{ action("ProfileController@addEditSkills") }}' >      
  {{csrf_field()}}
    <div class="container-skills-profile general-tags-container">
      <div class="title-profile-items input_tags" div_text="{{__('statics.select_hash_tags')}}">{{__('statics.select_hash_tags')}}</div>
      <div class="container-skills-tags tags-container"></div>
      <div class="add-new-skill-tag">
        <input class="new-skill-tag" placeholder="New #hashtag"/>
        <div class="btn-add-skill btn-new-tag"><img src="../../images/plus.png"/></div>
      </div>
    </div>
    <div class="container-skills-profile skills-tags-container">
      <div class="title-profile-items input_sports" div_text="{{__('statics.select_sports')}}">{{__('statics.select_sports')}}</div>
      <div class="container-skills-tags sports-container"></div>
      <div class="add-new-skill-sport">
        <input class="new-skill-sport" placeholder="New sport"/>
        <div class="btn-add-skill btn-new-sport"><img src="../../images/plus.png"/></div>
      </div>
    </div>
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
    <button class="custom-btn btn-albastru btn-save-changes btn-save-skills">{{__('statics.update_and_save')}}</button>
    <input type="hidden" name="add_edit_id"/>
    <input type="hidden" name="subitem_id" value="" class="id-subitem-selected"/>
    <input type="hidden" name="check_add_edit" value="add"/>
    <input type="hidden" name="input_tags"/>
    <input type="hidden" name="input_sports"/>
  </form>

@push('scripts')
  <script>
    $(document).ready(function(){
    $('.input-skill-error').on('input', function(){
        $(this).parent().find('.div-error').css("color", "inherit");
        $(this).parent().find('.div-error').text($(this).parent().find('.div-error').attr('div_text'));
        $(this).parent().find('.div-error').removeClass('div-error');
    });
      var please_wait = $('.please_wait_text').text();
      var update_and_save = $('.update_and_save').text();
      var edit_txt = $('.edit_simple').text();
      $(".btn-save-skills").click(function(){
        
        var selected_input_tags = [];
        var selected_input_sports = [];
        
        $("#form-skills .tags-container>.skill-box").each(function(item){
          if($(this).hasClass('skill-box-active')){
            selected_input_tags.push($(this).text().replace('#', ''));
          }
        }); 
        $("#form-skills .sports-container>.skill-box").each(function(item){
          if($(this).hasClass('skill-box-active')){
            selected_input_sports.push($(this).text());
          }
        });
        $("#form-skills input[name=input_tags]").val(selected_input_tags);
        $("#form-skills input[name=input_sports]").val(selected_input_sports);
        $("#form-skills input[name=add_edit_id]").val($(".add_edit_id").val());
        
        
        $('.btn-save-skills').html(please_wait);
          $('.btn-save-skills').attr('disabled', 'disabled');
          $("#form-skills input[name=add_edit_id]").val($(".add_edit_id").val());
          $.ajax({
              method: 'POST',
              url: $("#form-skills").attr("action"),
              data: $('#form-skills').serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-save-skills').html(update_and_save);
              }, 200);
              if (res.success == true) {
//                 $("input[name=check_add_edit]").val('add');
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $(".btn-save-skills").prop('disabled', false);
                if(res.saved_id){
                  $(".add_edit_id").val(res.saved_id);
                } else{
                  $(".add_edit_id").val('');
                }
              } else if(res.error_all){
                  var html_error = '';
                  var erori = res.error_all;
                  for(var key in erori) {
                    var simple_div_error = "."+key;
                    $("#form-skills").find($(simple_div_error)).addClass('div-error');
                    $("#form-skills").find($(simple_div_error)).html(erori[key][0]);
                    $("#form-skills").find($(simple_div_error)).css("color", "red");
                   
                  }
              } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
              }
              $(".btn-save-skills").prop('disabled', false);
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