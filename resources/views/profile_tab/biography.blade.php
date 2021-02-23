  <form id="form-biography" class="container-down-profile-user biography-container" action="{{action('ProfileController@addEditBiography')}}" method="POST">
    {{csrf_field()}}
    <div class="container-profile-film-bio-other">
      <div class="column-profile-film-bio-other">
        <div class="title-profile-items title-margin-lite">{{__('statics.add_your_biography')}}</div>
        <div class="text-normal-page-profile text-margin-film-bio-other">{!! __('statics.text_add_your_biography') !!}</div>
        <div class="container-input-profile-down container-input-down-full">
          <label label_text="{{__('statics.simple_title')}}">{{__('statics.simple_title')}}</label>
          <input type="text" name="biography_title" class="input-film-bio-other-profile biography-title" placeholder="{{__('statics.enter_title')}}"/>
        </div>
        <div class="container-input-profile-down container-input-down-full">
          <label label_text="{{__('statics.short_description')}}">{{__('statics.short_description')}}</label>
          <textarea type="text" name="biography_short_description" class="textarea-film-bio-other-profile biography-description"></textarea>
        </div>
        <button class="custom-btn btn-albastru btn-save-changes btn-save-biography">{{__('statics.update_and_save')}}</button>
      </div>
      <div class="column-profile-film-bio-other items-biography">
        <div class="title-profile-items title-margin-lite">{{__('statics.my_saved_biography')}}</div>
        <div class="text-normal-page-profile text-margin-film-bio-other">{!! __('statics.can_delete_edit') !!}</div>
        <div class="retrieved_data"></div>
      </div>
    </div>
    <div class="hidden-inputs" style="display: none"></div>
    <input type="hidden" name="add_edit_id"/>
    <input type="hidden" name="subitem_id" value="" class="id-subitem-selected"/>
    <input type="hidden" name="check_add_edit" value="add"/>
  </form>
  <form id="form-delete-biography" action="{{action('ProfileController@deleteBiography')}}" method="POST" style="display: none;">
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
      $('.btn-save-biography').click(function() {
          $('.btn-save-biography').html(please_wait);
          $('.btn-save-biography').attr('disabled', 'disabled');
          $("#form-biography input[name=add_edit_id]").val($(".add_edit_id").val());          
          $.ajax({
              method: 'POST',
              url: $('#form-biography').attr("action"),
              data: $('#form-biography').serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-save-biography').html(update_and_save);
              }, 200);
              if (res.success == true) {
                $("#form-biography input[name=check_add_edit]").val('add');
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                html_for_insert = '';
                for(var i = 0; i< res.biography_items.length; i++){
                  html_for_insert += 
                      '<div class="box-saved-element-film-bio-other">'+
                        '<div class="title-saved-film-bio-other">'+res.biography_items[i].biography_title+'</div>'+
                        '<div class="text-saved-film-bio-other">'+res.biography_items[i].biography_short_description+'</div>'+
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
                $('.items-biography>.retrieved_data').html(html_for_insert);
                $("#form-biography").trigger('reset');
                $(".btn-save-biography").prop('disabled', false);
                $("#form-biography .hidden-inputs").html('');
                if(res.saved_id){
                  $(".add_edit_id").val(res.saved_id);
                } else{
                  $(".add_edit_id").val('');
                }
              } else if(res.error_all){
                  var html_error = '';
                  var erori = res.error_all;
                  for(var key in erori) {
                    $("#form-biography input[name='"+key+"']").addClass('input-has-error');
                    $("#form-biography").find($("input[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                    $("#form-biography").find($("input[name='"+key+"']")).parent().find('label').css("color", "red");
                    $("#form-biography").find($("textarea[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                    $("#form-biography").find($("textarea[name='"+key+"']")).parent().find('label').css("color", "red");
                  }
              } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
              }
              $(".btn-save-biography").prop('disabled', false);
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
      $(document).on('click', '.items-biography .btn-edit-film-bio-other', function(){
        var title = $(this).closest($(".box-saved-element-film-bio-other")).find(".title-saved-film-bio-other").text();
        var description = $(this).closest($(".box-saved-element-film-bio-other")).find(".text-saved-film-bio-other").text();
        $("#form-biography input[name=check_add_edit]").val('edit');
        $("#form-biography input[name=biography_title]").val(title);
        $("#form-biography textarea[name=biography_short_description]").val(description);      
        
        var inputs_for_edit = '';
        inputs_for_edit = "<input name='biography_title_before_edit' value='"+title+"' /><input name='biography_description_before_edit' value='"+description+"' />";
        $("#form-biography .hidden-inputs").html(inputs_for_edit);
      });
      
      $(document).on('click', ".items-biography .btn-delete-film-bio-other", function(){
        if(confirm("Are you sure you want to delete this file?")){
          var title = $(this).closest($(".box-saved-element-film-bio-other")).find(".title-saved-film-bio-other").text();
          var description = $(this).closest($(".box-saved-element-film-bio-other")).find(".text-saved-film-bio-other").text();
          $("#form-delete-biography input[name=title]").val(title);
          $("#form-delete-biography input[name=description]").val(description);
          $("#form-delete-biography input[name=delete_id]").val($(".add_edit_id").val());
          $("#form-delete-biography > .trick-delete-btn").trigger('click');
          return;
        } else{
          return;
        }
      });
      $("#form-delete-biography > .trick-delete-btn").click(function(event){
        event.preventDefault();
          $.ajax({
              method: 'POST',
              url: $('#form-delete-biography').attr("action"),
              data: $('#form-delete-biography').serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              if (res.success == true) {
                $("#form-biography input[name=check_add_edit]").val('add');
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $("#form-delete-biography").trigger('reset');
                if(res.biography_items.length > 0){
                  var html_for_insert = '';
                  for(var i = 0; i< res.biography_items.length; i++){
                    html_for_insert += 
                        '<div class="box-saved-element-film-bio-other">'+
                          '<div class="title-saved-film-bio-other">'+res.biography_items[i].biography_title+'</div>'+
                          '<div class="text-saved-film-bio-other">'+res.biography_items[i].biography_short_description+'</div>'+
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
                  $('.items-biography>.retrieved_data').html(html_for_insert);
                } else{
                  $('.items-biography>.retrieved_data').html('');
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