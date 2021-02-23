  <form class="container-down-profile-user files-container" id="form-files" action="{{action('ProfileController@addEditFiles')}}" method="POST">
     {{csrf_field()}}
    <div class="container-files-profile">
      <div class="title-profile-items title-margin-lite">{{__('statics.add_profile_files')}}</div>
        <div class="text-normal-page-profile text-margin-film-bio-other">{!! __('statics.text_add_profile_files') !!}</div>
        <div class="line-form-project">
          <div class="project-input-box project-input-box-full">
            <div class="title-label-project title-label-project-no-margin">{{__('statics.project_files')}}</div>
            <div class="input-file-upload-container">
              <div class="container-file-left">
                <input class="files_upload_profile" multiple="multiple" name="files_uploaded[]" type="file" style="display: none"/>
                <input class="input-trick-files" placeholder="{{__('statics.upload_file')}}" type="text"/>
                <div class="add-profile-files"><img src="../images/folder.png"/></div>
              </div>
<!--               <div class="custom-btn btn-albastru btn-add-file">Add file</div> -->
            </div>
          </div>
        </div>
        <div class="container-files"></div>
        <input type="hidden" name="add_edit_id"/>
        <input type="hidden" name="subitem_id" value="" class="id-subitem-selected"/>
      
    </div>
    
  </form> 

  <form class="container-down-profile-user files-container" id="form-youtube" action="{{action('ProfileController@addEditYoutube')}}" method="POST">
     {{csrf_field()}}
    <div class="container-files-profile">
      <div class="title-profile-items title-margin-lite">{{__('statics.add_profile_videos')}}</div>
        <div class="text-normal-page-profile text-margin-film-bio-other">{!! __('statics.text_add_profile_videos') !!}</div>
        <div class="line-form-project">
          <div class="project-input-box project-input-box-full">
            <div class="title-label-project title-label-project-no-margin">{{__('statics.project_videos')}}</div>
            <div class="input-file-upload-container container-full-youtube">
              <div class="container-file-left youtube-files-left">
                <select class="input-form-project-popup select-youtube-links" placeholder="{{__('statics.add_youtube_links')}}" name="youtube-videos[]"></select>
              </div>
              <div class="custom-btn btn-albastru btn-add-youtube">{{__('statics.update_and_save')}}</div>
            </div>
          </div>
        </div>
        <input type="hidden" name="add_edit_id"/>
        <input type="hidden" name="subitem_id" value="" class="id-subitem-selected"/>
    </div>
  </form> 

  <form class="container-down-profile-user files-container" id="form-videos" action="{{action('ProfileController@addEditVideos')}}" method="POST">
     {{csrf_field()}}
    <div class="container-files-profile">
      <div class="title-profile-items title-margin-lite">{{__('statics.add_profile_videos')}}</div>
        <div class="text-normal-page-profile text-margin-film-bio-other">{!! __('statics.text_add_profile_videos') !!}</div>
        <div class="line-form-project">
          <div class="project-input-box project-input-box-full">
            <div class="title-label-project title-label-project-no-margin">{{__('statics.project_videos')}}</div>
            <div class="input-file-upload-container">
              <div class="container-file-left">
                <input class="videos_upload_profile" multiple="multiple" name="videos_uploaded[]" type="file" style="display: none" accept="video/mp4,video/x-m4v,video/*"/>
                <input class="input-trick-videos" placeholder="Upload video" type="text"/>
                <div class="add-profile-videos"><img src="../images/folder.png"/></div>
              </div>
<!--               <div class="custom-btn btn-albastru btn-add-file">Add file</div> -->
            </div>
          </div>
        </div>
        <div class="container-files"></div>
        <input type="hidden" name="add_edit_id"/>
        <input type="hidden" name="subitem_id" value="" class="id-subitem-selected"/>
    </div>
  </form> 


<form style="display: none !important" id="form-files-delete" action="{{action('ProfileController@deleteFiles')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="add_edit_id"/>
    <input type="text" name="file_for_delete"/>
    <button class="btn-delete-file-profile"></button>
</form>
<form style="display: none !important" id="form-videos-delete" action="{{action('ProfileController@deleteVideos')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="add_edit_id"/>
    <input type="text" name="video_for_delete"/>
    <button class="btn-delete-video-profile"></button>
</form>
@push('scripts')
  <script>
    $(document).ready(function(){
    $(".select-youtube-links").select2({
        tags: true,
        multiple: true,
        tokenSeparators: [',']
    });
    $(".add-profile-files").click(function(){
        $('.files_upload_profile').trigger('click');
    });
    $(".input-trick-files").click(function(){
      $('.files_upload_profile').trigger('click');
    });
    $(document).on("click", ".btn-delete-prof-file", function(){
      $('#form-files-delete input[name=file_for_delete]').val($(this).attr('file_for_delete'));
      $('#form-files-delete input[name=add_edit_id]').val($(".add_edit_id").val());
      if(confirm("Are you sure you want to delete this file?")){
        $(this).parent().parent().addClass('file-deleting');
        $(".btn-delete-file-profile").trigger('click');
        return;
      } else{
        return;
      }
    });
      
    $(".btn-add-youtube").click(function(){
      $("#form-youtube input[name=add_edit_id]").val($(".add_edit_id").val());
      $.ajax({
          method: 'POST',
          url: $('#form-youtube').attr("action"),
          data: $('#form-youtube').serializeArray(),
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
          } else { 
               $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
               $(".container-mare-modal-error .text-modal").html(res.error);
          }
      })
      .fail(function(xhr, status, error) {
        if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
          window.location.reload();
        }
      });
    });
      
    $(".btn-delete-file-profile").click(function(event){
      event.preventDefault();
      $.ajax({
              method: 'POST',
              url: $('#form-files-delete').attr("action"),
              data: $('#form-files-delete').serializeArray(),
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
                $("#form-files").find('.file-deleting').fadeOut(300, function() { $(this).remove(); });
              } else { 
                   $("#form-files").find('.file-deleting').removeClass('file-deleting');
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
    $(".files_upload_profile").on('change', function() {
      $("#form-files").submit();
    });
     $("#form-files").on('submit', function(event) {
        var action = $("#form-files").attr("action");
        $("#form-files input[name=add_edit_id]").val($(".add_edit_id").val());
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
                  $("#form-files").trigger("reset");
                  if(res.saved_id){
                    $(".add_edit_id").val(res.saved_id);
                  } else{
                    $(".add_edit_id").val('');
                  }
                  if(res.files){
                    var placeToInsertImagePreview = "#form-files .container-files";
                    var html_insert = '';
                    for(var i=0;i<res.files.length;i++){
                      html_insert += '<div class="container-box-file">'+
                                        '<div class="container-box-file-left">'+
                                          '<img src="../images/folder.png" />'+
                                        '</div>'+
                                      '<div class="container-box-file-right">'+
                                        '<div class="container-box-file-title">'+res.files[i].original_name+'</div>'+
                                        '<div class="btn-delete-prof-file" file_for_delete="'+res.files[i].original_name+'">delete</div>'+
                                      '</div>'+
                                    '</div>';
                    }
                    $(placeToInsertImagePreview).html(html_insert);
                  }
                  setTimeout(function(){
                    if($(".container-mare-modal").is(':visible')){ 
                      $(".container-mare-modal").css("display", "flex").fadeOut();
                    }
                  }, 3000);
                  
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
      
      
      
      
      
    $(".add-profile-videos").click(function(){
        $('.videos_upload_profile').trigger('click');
    });
    $(".input-trick-videos").click(function(){
      $('.videos_upload_profile').trigger('click');
    });
    $(document).on("click", ".btn-delete-prof-video", function(){
      $('#form-videos-delete input[name=video_for_delete]').val($(this).attr('video_for_delete'));
      $('#form-videos-delete input[name=add_edit_id]').val($(".add_edit_id").val());
      if(confirm("Are you sure you want to delete this video?")){
        $(this).parent().parent().addClass('video-deleting');
        $(".btn-delete-video-profile").trigger('click');
        return;
      } else{
        return;
      }
    });
    $(".btn-delete-video-profile").click(function(event){
      event.preventDefault();
      $.ajax({
              method: 'POST',
              url: $('#form-videos-delete').attr("action"),
              data: $('#form-videos-delete').serializeArray(),
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
                $("#form-videos").find('.video-deleting').fadeOut(300, function() { $(this).remove(); });
              } else { 
                   $("#form-videos").find('.video-deleting').removeClass('video-deleting');
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
    $(".videos_upload_profile").on('change', function() {
      $("#form-videos").submit();
    });
     $("#form-videos").on('submit', function(event) {
        var action = $("#form-videos").attr("action");
        $("#form-videos input[name=add_edit_id]").val($(".add_edit_id").val());
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
                  $("#form-videos").trigger("reset");
                  if(res.saved_id){
                    $(".add_edit_id").val(res.saved_id);
                  } else{
                    $(".add_edit_id").val('');
                  }
                  if(res.videos){
                    var placeToInsertImagePreview = "#form-videos .container-files";
                    var html_insert = '';
                    for(var i=0;i<res.videos.length;i++){
                      html_insert += '<div class="container-box-video">'+
                                        '<div class="container-box-file-left">'+
                                          '<img src="../images/folder.png" />'+
                                        '</div>'+
                                      '<div class="container-box-file-right">'+
                                        '<div class="container-box-file-title">'+res.videos[i].original_name+'</div>'+
                                        '<div class="btn-delete-prof-video" video_for_delete="'+res.videos[i].original_name+'">delete</div>'+
                                      '</div>'+
                                    '</div>';
                    }
                    $(placeToInsertImagePreview).html(html_insert);
                  }
                  setTimeout(function(){
                    if($(".container-mare-modal").is(':visible')){ 
                      $(".container-mare-modal").css("display", "flex").fadeOut();
                    }
                  }, 3000);
                  
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
  </script>
@endpush