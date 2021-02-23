  <form id="form-photos" class="container-down-profile-user photos-container" action="{{action('ProfileController@addEditPhotos')}}" method="POST">
    {{csrf_field()}}
    <div class="container-btn-add-new-element">
      <div class="custom-btn item-job-colored-status btn-upload-photos"><i class="fa fa-plus fa-plus-img"></i>Add a photo</div>
      <div class="form-add-photo-user">
        <input style="display: none;" class="input-images-profile" type="file" name="uploaded_photos[]" multiple="multiple" accept="image/*" />
      </div>
    </div>
    <div class="container-files" id="sortableImages"></div>
    <input type="hidden" name="add_edit_id"/>
    <input type="hidden" name="subitem_id" value="" class="id-subitem-selected"/>
  </form>
  <form style="display: none !important" id="form-photos-delete" action="{{action('ProfileController@deletePhotos')}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="add_edit_id"/>
      <input type="text" name="img_for_delete"/>
      <button class="btn-delete-photo-profile"></button>
  </form>
@push('styles')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
@push('scripts')
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
    $(document).ready(function(){
    $(".btn-upload-photos").click(function(){
        $('.input-images-profile').trigger('click');
    });
    $(document).on("click", ".btn-delete-profile-image", function(){
      $('#form-photos-delete input[name=img_for_delete]').val($(this).attr('img_for_delete'));
      $('#form-photos-delete input[name=add_edit_id]').val($(".add_edit_id").val());
      if(confirm("Are you sure you want to delete this file?")){
        $(this).parent().addClass('img-deleting');
        $(".btn-delete-photo-profile").trigger('click');
        return;
      } else{
        return;
      }
    });
    $(".btn-delete-photo-profile").click(function(event){
      event.preventDefault();
      $.ajax({
              method: 'POST',
              url: $('#form-photos-delete').attr("action"),
              data: $('#form-photos-delete').serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              if (res.success == true) {
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
               setTimeout(function(){
                  if($(".container-mare-modal").is(':visible')){ 
                    $(".container-mare-modal").css("display", "flex").fadeOut();
                  }
                }, 3000);
                $("#form-photos").find('.img-deleting').fadeOut(300, function() { $(this).remove(); });
              } else { 
                   $("#form-photos").find('.img-deleting').removeClass('img-deleting');
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
    $(".input-images-profile").on('change', function() {
      $("#form-photos").submit();
    });
     $("#form-photos").on('submit', function(event) {
        var action = $("#form-photos").attr("action");
        $("#form-photos input[name=add_edit_id]").val($(".add_edit_id").val());
        var formData = new FormData(this);
        event.preventDefault();
          $.ajax({
              method: 'POST',
              url: action,
              type: 'submit',
              data: formData,
              processData: false,
              contentType: false,
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              if (res.success == true) {
                  $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                  $(".container-mare-modal .text-modal").html(res.msg);
                  $("#form-photos").trigger("reset");
                  if(res.saved_id){
                    $(".add_edit_id").val(res.saved_id);
                  } else{
                    $(".add_edit_id").val('');
                  }
                  if(res.pics){
                    var placeToInsertImagePreview = "#form-photos .container-files";
                    var html_insert = '';
                    for(var i=0;i<res.pics.length;i++){
                      html_insert += "<div class='container-box-img ui-state-default'>"+
                                      "<a href='/storage/"+res.pics[i]+"' class='content-box-file' data-fancybox='galery'>"+
                                        "<img src='/storage/"+res.pics[i]+"' />"+
                                      "</a>"+
                                      "<div img_for_delete='"+res.pics[i]+"' class='container-delete-img btn-delete-profile-image'><img src='../images/delete_element.png'/></div>"+
                                    "</div>";
                    }
                    $(placeToInsertImagePreview).html(html_insert);
                  }
                  setTimeout(function(){
                    if($(".container-mare-modal").is(':visible')){ 
                      $(".container-mare-modal").css("display", "flex").fadeOut();
                    }
                  }, 3000);
                
                setTimeout(function(){
                  var subtype_id = $(".item-menu-profile-settings.active-item-menu-profile-detail").attr("subtype_id");
                  window.location.href = document.location.protocol+"//"+window.location.hostname + window.location.pathname + "?subtype_id="+subtype_id;
                }, 2500);
                  
              } else { 
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
    $( function() {
      $("#sortableImages").sortable({
        start: function(event, ui) {
            ui.item.data('start_pos', ui.item.index());
        },
        stop: function(event, ui) {
            var start_pos = ui.item.data('start_pos');
            if (start_pos != ui.item.index()) {
                // the item got moved
            } else {
                // the item was returned to the same position
            }
        },
        update: function(event, ui) {
          var stackImages = [];
          $("#sortableImages .content-box-file").each(function() {
            var url_img = $(this).attr('href');
            url_img = url_img.replace('/storage/','');
            stackImages.push(url_img);
          });
          $.ajax({
              method: 'POST',
              url: '/reorder-images',
              data: {'id': $(".add_edit_id").val(),'images': JSON.stringify(stackImages), '_token': '{{ csrf_token() }}'},
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
            if (!res.success){
              alert(res.error);
            }
          }).fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
        }
     });
     
      
      $("#sortableImages").disableSelection();
    } );
  </script>
@endpush