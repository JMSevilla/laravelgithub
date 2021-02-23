  <form id="form-other-information" class="container-down-profile-user other-information-container" action="{{action('ProfileController@addEditOtherInfo')}}" method="POST">
    {{csrf_field()}}
    <div class="container-profile-film-bio-other">
      <div class="column-profile-film-bio-other">
        <div class="title-profile-items title-margin-lite">{{__('statics.other_information_show')}}</div>
        <div class="text-normal-page-profile text-margin-film-bio-other">{{__('statics.txt_other_information_show')}}</div>
        <div class="container-input-profile-down container-input-down-full">
          <label label_text="{{__('statics.simple_title')}}">{{__('statics.simple_title')}}</label>
          <input type="text" name="other_title" class="input-film-bio-other-profile other-information-title" placeholder="{{__('statics.enter_title')}}"/>
        </div>
        <div class="container-input-profile-down container-input-down-full">
          <label label_text="{{__('statics.short_description')}}">{{__('statics.short_description')}}</label>
          <textarea type="text" name="other_short_description" class="textarea-film-bio-other-profile other-information-description"></textarea>
        </div>
        <button class="custom-btn btn-albastru btn-save-changes btn-save-other-information">{{__('statics.update_and_save')}}</button>
      </div>
      <div class="column-profile-film-bio-other items-other-information">
        <div class="title-profile-items title-margin-lite">{{__('statics.my_saved_other')}}</div>
        <div class="text-normal-page-profile text-margin-film-bio-other">{!! __('statics.can_delete_edit') !!}</div>
        <div class="retrieved_data"></div>
      </div>
    </div>
    <div class="hidden-inputs" style="display: none"></div>
    <input type="hidden" name="add_edit_id"/>
    <input type="hidden" name="subitem_id" value="" class="id-subitem-selected"/>
    <input type="hidden" name="check_add_edit" value="add"/>
  </form>
  <form id="form-delete-other" action="{{action('ProfileController@deleteOtherInfo')}}" method="POST" style="display: none;">
      {{csrf_field()}}
      <input name="title" type="text"/>
      <input name="description" type="text"/>
      <input name="delete_id" type="text"/>
      <button class="trick-delete-btn"></button>
  </form>
@push('scripts')
  <script>
    $(document).ready(function(){
      var please_wait = $('.please_wait_text').text();
      var update_and_save = $('.update_and_save').text();
      var edit_txt = $('.edit_simple').text();
      var delete_txt = $('.delete_simple').text();
      var html_for_insert = '';
      $('.btn-save-other-information').click(function() {
          $('.btn-save-other-information').html(please_wait);
          $('.btn-save-other-information').attr('disabled', 'disabled');
          $("#form-other-information input[name=add_edit_id]").val($(".add_edit_id").val());
          $.ajax({
              method: 'POST',
              url: $('#form-other-information').attr("action"),
              data: $('#form-other-information').serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-save-other-information').html(update_and_save);
              }, 200);
              if (res.success == true) { 
                $("input[name=check_add_edit]").val('add');
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                html_for_insert = '';
                for(var i = 0; i< res.other_items.length; i++){
                  html_for_insert += 
                      '<div class="box-saved-element-film-bio-other">'+
                        '<div class="title-saved-film-bio-other">'+res.other_items[i].other_title+'</div>'+
                        '<div class="text-saved-film-bio-other">'+res.other_items[i].other_short_description+'</div>'+
                        '<div class="container-edit-delete-saved-film-bio-other">'+
                          '<div class="box-edit-delete-profile-film-bio-other btn-edit-film-bio-other">'+
                            '<div class="edit-film-bio-other">'+
                              '<img src="../../images/edit.png"/>'+
                            '</div>'+
                            '<div class="edit-delete-text-item">'+edit_txt+'</div>'+
                          '</div>'+
                          '<div class="box-edit-delete-profile-film-bio-other btn-delete-film-bio-other">'+
                           ' <div class="delete-film-bio-other">'+
                              '<img src="../../images/delete_element.png"/>'+
                            '</div>'+
                            '<div class="edit-delete-text-item">'+delete_txt+'</div>'+
                          '</div>'+
                        '</div>'+
                      '</div>';
                }
                $('.items-other-information>.retrieved_data').html(html_for_insert);
                $("#form-other-information").trigger('reset');
                $(".btn-save-other-information").prop('disabled', false);
                $("#form-other-information .hidden-inputs").html('');
                if(res.saved_id){
                  $(".add_edit_id").val(res.saved_id);
                } else{
                  $(".add_edit_id").val('');
                }
              } else if(res.error_all){
                  var html_error = '';
                  var erori = res.error_all;
                  for(var key in erori) {
                    $("#form-other-information input[name='"+key+"']").addClass('input-has-error');
                    $("#form-other-information").find($("input[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                    $("#form-other-information").find($("input[name='"+key+"']")).parent().find('label').css("color", "red");
                    $("#form-other-information").find($("textarea[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                    $("#form-other-information").find($("textarea[name='"+key+"']")).parent().find('label').css("color", "red");
                  }
              } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
              }
              $(".btn-save-other-information").prop('disabled', false);
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
      $(document).on('click', '.btn-edit-film-bio-other', function(){
        var title = $(this).closest($(".box-saved-element-film-bio-other")).find(".title-saved-film-bio-other").text();
        var description = $(this).closest($(".box-saved-element-film-bio-other")).find(".text-saved-film-bio-other").text();
        $("input[name=check_add_edit]").val('edit');
        $("input[name=other_title]").val(title);
        $("textarea[name=other_short_description]").val(description);      
        
        var inputs_for_edit = '';
        inputs_for_edit = "<input name='other_title_before_edit' value='"+title+"' /><input name='other_description_before_edit' value='"+description+"' />";
        $("#form-other-information .hidden-inputs").html(inputs_for_edit);
      });
      $(document).on('click', ".items-other-information .btn-delete-film-bio-other", function(){
        if(confirm("Are you sure you want to delete this file?")){
          var title = $(this).closest($(".box-saved-element-film-bio-other")).find(".title-saved-film-bio-other").text();
          var description = $(this).closest($(".box-saved-element-film-bio-other")).find(".text-saved-film-bio-other").text();
          $("#form-delete-other input[name=title]").val(title);
          $("#form-delete-other input[name=description]").val(description);
          $("#form-delete-other input[name=delete_id]").val($(".add_edit_id").val());
          $("#form-delete-other > .trick-delete-btn").trigger('click');
          return;
        } else{
          return;
        }
      });
      $("#form-delete-other > .trick-delete-btn").click(function(event){
        event.preventDefault();
          $.ajax({
              method: 'POST',
              url: $('#form-delete-other').attr("action"),
              data: $('#form-delete-other').serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              if (res.success == true) {
                $("input[name=check_add_edit]").val('add');
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $("#form-delete-other").trigger('reset');
                if(res.other_items.length > 0){
                  var html_for_insert = '';
                  for(var i = 0; i< res.other_items.length; i++){
                    html_for_insert += 
                        '<div class="box-saved-element-film-bio-other">'+
                          '<div class="title-saved-film-bio-other">'+res.other_items[i].other_title+'</div>'+
                          '<div class="text-saved-film-bio-other">'+res.other_items[i].other_short_description+'</div>'+
                          '<div class="container-edit-delete-saved-film-bio-other">'+
                            '<div class="box-edit-delete-profile-film-bio-other btn-edit-film-bio-other">'+
                              '<div class="edit-film-bio-other">'+
                                '<img src="../../images/edit.png"/>'+
                              '</div>'+
                              '<div class="edit-delete-text-item">'+edit_txt+'</div>'+
                            '</div>'+
                            '<div class="box-edit-delete-profile-film-bio-other btn-delete-film-bio-other">'+
                             ' <div class="delete-film-bio-other">'+
                                '<img src="../../images/delete_element.png"/>'+
                              '</div>'+
                              '<div class="edit-delete-text-item">'+delete_txt+'</div>'+
                            '</div>'+
                          '</div>'+
                        '</div>';
                  }
                  $('.items-other-information>.retrieved_data').html(html_for_insert);
                } else{
                  $('.items-other-information>.retrieved_data').html('');
                }
              } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
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