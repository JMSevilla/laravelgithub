  <form id="form-filmography" class="container-down-profile-user filmography-container" action="{{action('ProfileController@addEditFilmography')}}" method="POST">
    {{csrf_field()}}
    <div class="container-profile-film-bio-other">
      <div class="column-profile-film-bio-other">
        <div class="title-profile-items title-margin-lite">{{__('statics.add_your_filmography')}}</div>
        <div class="text-normal-page-profile text-margin-film-bio-other">
          {!! __('statics.text_add_your_filmography') !!}
        </div>
        <div class="container-input-profile-down container-input-down-full">
          <label label_text="{{__('statics.simple_title')}}">{{__('statics.simple_title')}}</label>
          <input type="text" name="filmography_title" class="input-film-bio-other-profile filmography-title" placeholder="{{__('statics.enter_title')}}"/>
        </div>
        <div class="container-input-profile-down container-input-down-full">
          <label label_text="{{__('statics.short_description')}}">{{__('statics.short_description')}}</label>
          <textarea type="text" name="filmography_short_description" class="textarea-film-bio-other-profile filmography-description"></textarea>
        </div>
        <button class="custom-btn btn-albastru btn-save-changes btn-save-filmography">{{__('statics.update_and_save')}}</button>
      </div>
      <div class="column-profile-film-bio-other items-filmography">
        <div class="title-profile-items title-margin-lite">{{__('statics.my_saved_filmography')}}</div>
        <div class="text-normal-page-profile text-margin-film-bio-other">{!! __('statics.can_delete_edit') !!}</div>
        <div class="retrieved_data"></div>
      </div>
    </div>
    <div class="hidden-inputs" style="display: none"></div>
    <input type="hidden" name="add_edit_id"/>
    <input type="hidden" name="subitem_id" value="" class="id-subitem-selected"/>
    <input type="hidden" name="check_add_edit" value="add"/>
  </form>
  <form id="form-delete-filmography" action="{{action('ProfileController@deleteFilmography')}}" method="POST" style="display: none;">
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
      $('.btn-save-filmography').click(function() {
          $('.btn-save-filmography').html(please_wait);
          $('.btn-save-filmography').attr('disabled', 'disabled');
          $("#form-filmography input[name=add_edit_id]").val($(".add_edit_id").val());
          $.ajax({
              method: 'POST',
              url: $('#form-filmography').attr("action"),
              data: $('#form-filmography').serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-save-filmography').html(update_and_save);
              }, 200);
              if (res.success == true) {
                $("#form-filmography input[name=check_add_edit]").val('add');
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                html_for_insert = '';
                for(var i = 0; i< res.filmography_items.length; i++){
                  html_for_insert += 
                      '<div class="box-saved-element-film-bio-other">'+
                        '<div class="title-saved-film-bio-other">'+res.filmography_items[i].filmography_title+'</div>'+
                        '<div class="text-saved-film-bio-other">'+res.filmography_items[i].filmography_short_description+'</div>'+
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
                $('.items-filmography>.retrieved_data').html(html_for_insert);
                $("#form-filmography").trigger('reset');
                $(".btn-save-filmography").prop('disabled', false);
                $("#form-filmography .hidden-inputs").html('');
                if(res.saved_id){
                  $(".add_edit_id").val(res.saved_id);
                } else{
                  $(".add_edit_id").val('');
                }
              } else if(res.error_all){
                  var html_error = '';
                  var erori = res.error_all;
                  for(var key in erori) {
                    $("#form-filmography input[name='"+key+"']").addClass('input-has-error');
                    $("#form-filmography").find($("input[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                    $("#form-filmography").find($("input[name='"+key+"']")).parent().find('label').css("color", "red");
                    $("#form-filmography").find($("textarea[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                    $("#form-filmography").find($("textarea[name='"+key+"']")).parent().find('label').css("color", "red");
                  }
              } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
              }
              $(".btn-save-filmography").prop('disabled', false);
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
      $(document).on('click', '.items-filmography .btn-edit-film-bio-other', function(){
        var title = $(this).closest($(".box-saved-element-film-bio-other")).find(".title-saved-film-bio-other").text();
        var description = $(this).closest($(".box-saved-element-film-bio-other")).find(".text-saved-film-bio-other").text();
        $("#form-filmography input[name=check_add_edit]").val('edit');
        $("#form-filmography input[name=filmography_title]").val(title);
        $("#form-filmography textarea[name=filmography_short_description]").val(description);
        
        var inputs_for_edit = '';
        inputs_for_edit = "<input name='filmography_title_before_edit' value='"+title+"' /><input name='filmography_description_before_edit' value='"+description+"' />";
        $("#form-filmography .hidden-inputs").html(inputs_for_edit);
      });
      $(document).on('click', ".items-filmography .btn-delete-film-bio-other", function(){
        if(confirm("Are you sure you want to delete this file?")){
          var title = $(this).closest($(".box-saved-element-film-bio-other")).find(".title-saved-film-bio-other").text();
          var description = $(this).closest($(".box-saved-element-film-bio-other")).find(".text-saved-film-bio-other").text();
          $("#form-delete-filmography input[name=title]").val(title);
          $("#form-delete-filmography input[name=description]").val(description);
          $("#form-delete-filmography input[name=delete_id]").val($(".add_edit_id").val());
          $("#form-delete-filmography > .trick-delete-btn").trigger('click');
          return;
        } else{
          return;
        }
      });
      $("#form-delete-filmography > .trick-delete-btn").click(function(event){
        event.preventDefault();
          $.ajax({
              method: 'POST',
              url: $('#form-delete-filmography').attr("action"),
              data: $('#form-delete-filmography').serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              if (res.success == true) {
                $("input[name=check_add_edit]").val('add');
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $("#form-delete-filmography").trigger('reset');
                if(res.filmography_items.length > 0){
                  var html_for_insert = '';
                  for(var i = 0; i< res.filmography_items.length; i++){
                    html_for_insert += 
                        '<div class="box-saved-element-film-bio-other">'+
                          '<div class="title-saved-film-bio-other">'+res.filmography_items[i].filmography_title+'</div>'+
                          '<div class="text-saved-film-bio-other">'+res.filmography_items[i].filmography_short_description+'</div>'+
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
                  $('.items-filmography>.retrieved_data').html(html_for_insert);
                } else{
                  $('.items-filmography>.retrieved_data').html('');
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