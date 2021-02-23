$(document).ready(function() {
    $(window).scroll(function() {
      if (screen.width > 1024) {
          var opacitate = $(window).scrollTop()/100;
          var culoare_opactitate = "rgba(1, 1, 1,"+opacitate+")";
          if ($(window).scrollTop() > 100) {
              $("#header").css("background-color", "rgba(1, 1, 1, 0.96)");
              $("#header").css("transition", "900ms");
          } else {
              $("#header").css("background-color", culoare_opactitate);
              $("#header").css("transition", "900ms");
          }
      } 
  });
  $('.container-top-profile-user>.btn-reset-password').click(function(){
    $(".container-right-account").hide();
    $(".container-reset-password-right").fadeIn();
  });
  $(".btn-cancel-reset").click(function(){
    $(".container-right-account").fadeIn();
    $(".container-reset-password-right").hide();
  });
  $(".titlu-back-reset").click(function(){
    $(".container-right-account").fadeIn();
    $(".container-reset-password-right").hide();
  });
  $(".star-item-rating").hover(function() {
    var current_star = $(this).attr('current_star');
    console.log(current_star);
    $(".star-item-rating").removeClass("active-star-rating");
    for(var i=1;i<=current_star;i++){
      var star_item = ".star-rating-"+i;
      $(star_item).addClass("active-star-rating");
    }
    $(".rating_stars_count").val(current_star);
  });
  
  $("input[name='name']").focus();
  $(".general-input-form").focusin(function(){
    $(".container-input-general").removeClass("active-input");
    $(this).parent().removeClass("active-input-error");
    $(this).parent().addClass("active-input");
  });
  $('.general-input-form').on('input', function() {
    if($(this).hasClass("input-has-error")){
      $(this).parent().find($(".tricker-label-input")).html($(this).parent().find($(".tricker-label-input")).attr('label-text'));
      $(this).parent().find($(".tricker-label-input")).css("color", "#707070");
      $(this).removeClass('input-has-error');
    }
    if($(this).val().length === 0){
      $(this).parent().find($(".tricker-label-input")).css('opacity', '0');
    } else{
      $(this).parent().find($(".tricker-label-input")).css('opacity', '1');
    }
  });
  //just for the profiles page
  $(document).on('input',".input-profile-has-error", function() {
    $(this).removeClass("input-profile-has-error");
    $(".title-profile-items[div_can_have_errors=true]").html($(".title-profile-items[div_can_have_errors=true]").attr('div_error'));
    $(".title-profile-items[div_can_have_errors=true]").css("color", "#000000");
    $(this).removeClass('input-profile-has-error');
  });
  $(document).on('input',".language_title.input-has-error", function() {
    $(".language_title_label").html($(".language_title_label").attr('label_text'));
    $(".language_title_label").css("color", "#000000");
    $(this).removeClass('input-has-error');
  });
  
  $(document).on('input', '.error-line-input', function() {
    $(this).removeClass('error-line-input');
  });
  $('.container-input-profile-down > input').on('input', function(){
      $(this).parent().find($("label")).css("color", "inherit");
      $(this).parent().find($("label")).fadeIn().html($(this).parent().find($("label")).attr('label_text'));
  });
  $('.container-input-profile-down > textarea').on('input', function(){
      $(this).parent().find($("label")).css("color", "inherit");
      $(this).parent().find($("label")).fadeIn().html($(this).parent().find($("label")).attr('label_text'));
  });
  
  $('.project-input-box > input').on('input', function(){
      $(this).parent().find($("label")).css("color", "inherit");
      $(this).parent().find($("label")).fadeIn().html($(this).parent().find($("label")).attr('label_text'));
  });
  $('.project-input-box > textarea').on('input', function(){
      $(this).parent().find($("label")).css("color", "inherit");
      $(this).parent().find($("label")).fadeIn().html($(this).parent().find($("label")).attr('label_text'));
  });
  
  $('input[name=accept_therms]').change(function(){
      if (this.checked) {
          $(this).parent().find($(".tricker-label-accept-therms")).css('opacity', '0');
      }
  });
  $(".container-mare-modal").click(function(){
    $(".container-mare-modal").css("display", "flex").fadeOut();
  });
  $(".container-mare-modal-error").click(function(){
    $(".container-mare-modal-error").css("display", "flex").fadeOut();
  });
  if(screen.width <= 1024){
    $('.meniu-header').insertAfter(".close-menu-container");
    $(".open-mobil-menu").click(function(){
       $(".container-mobile-menu").slideDown();
    });
    $(".close-menu").click(function(){
       $(".container-mobile-menu").slideUp();
    });
    
    $(".open-mobile-menu-user").click(function(){
      $(".container-mobile-menu-user").show();
      setTimeout(function(){
         $(".content-mobile-menu-user").css('left', '0');
      }, 100);
    });
    $(".close-menu-container-user").click(function(){
      setTimeout(function(){
        $(".container-mobile-menu-user").hide();
      }, 200);
      $(".content-mobile-menu-user").css('left', '-100%');
    });
    
    $(".custom-btn.btn-albastru.btn-cancel-normal.btn-cancel-product").appendTo(".titlu-right-account");
    $(".custom-btn.btn-new-product.item-job-colored-status").appendTo(".titlu-right-account");
  }
  $(".input-upload-docs").click(function(){
    $(".upload-file-prove").trigger("click");
  });
  $(".box-upload-file-trick").click(function(){
    $(".upload-file-prove").trigger("click");
  });
  $('.upload-file-prove').change(function(e){
    $(".upload-documents-container-buttons").css('display', 'flex');
  });
  $(".btn-send-documents").click(function(){
    $('.form-prove-documents').trigger('submit');  
  });
  $('.btn-cancel-send-documents').click(function(){
    $(".upload-documents-container-buttons").css('display', 'none');
  });
  $(".trigger-location").click(function(){
    $(".container-input-profile-down > input[name=location]").focus();
    var location_label = $(".form-edit-profile .container-input-profile-down > input[name=location]").parent().find("label").attr('label_text_empty');
    $(".form-edit-profile .container-input-profile-down > input[name=location]").parent().find("label").html(location_label);
    $(".form-edit-profile .container-input-profile-down > input[name=location]").parent().find("label").css("color", "red");
  });
  $(".btn-edit-profile-pic").click(function(){
    $(".change-profile-avatar").trigger('click');
  });
  $(".trick-user-photo").click(function(){
    $(".btn-edit-profile-pic").trigger('click');
  })
  $(".change-profile-avatar").change(function(e){
    readURL(this);
    $('.form-change-profile-pic').trigger('submit');
  });
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('.user-logo-profile').attr('src', e.target.result);
        $('.container-left-image>img').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }
  $('.form-change-profile-pic').on('submit', function(event) {
    var formData = new FormData(this);
    event.preventDefault();
      $.ajax({
          method: 'POST',
          url: $('.form-change-profile-pic').attr("action"),
          data: formData,
          processData: false,
          contentType: false,
          context: this, async: true, cache: false, dataType: 'json'
      }).done(function(res) {
          if (res.success == true) {
            $(".container-mare-modal").css("display", "flex").hide().fadeIn();
            $(".container-mare-modal .text-modal").html(res.msg);
            $(".btn-send-documents").prop('disabled', false);
            $(".upload-documents-container-buttons").css('display', 'none');
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
//   $(".btn-next-proj").click(function(){
//     $(".form-part-1").slideUp();
//     $(".form-part-2").slideDown().css('display', 'flex');
//   });
//   $(".btn-next-proj2").click(function(){
//     $(".form-part-2").slideUp();
//     $(".form-part-3").slideDown().css('display', 'flex');
//   });
  $(".btn-edit-project").click(function(){
    $(".form-part-1").show().css('display', 'flex');
    $(".form-part-2").hide();
  });
  $(".btn-back-proj2").click(function(){
    $(".form-part-1").slideDown().css('display', 'flex');
    $(".form-part-2").slideUp();
  });
  $(".btn-back-proj3").click(function(){
    $(".form-part-2").slideDown().css('display', 'flex');
    $(".form-part-3").slideUp();
  });
  window.swiper_listing = new Swiper('.swiper-container', {
    pagination: {
      el: '.swiper-pagination',
      dynamicBullets: true,
    },
  });

//   My profiles js
  var please_wait = $(".please_wait_text").text();
      var save_changes_title = $(".save_changes_title_text").text();
      var next_text = $(".next_text").text();
      var send_message = $(".send_message").text();
      if($(".range-price").length > 0){

            $(".range-price").asRange({
                range: true,
                limit: false,
                slide: function (event, ui) {
                    $(".asRange-pointer-1>.asRange-tip").val("£" + addCommas(ui.values[0].toString()));
                    $(".asRange-pointer-2>.asRange-tip").val("£" + addCommas(ui.values[1]));
                }
            }); 
            function addCommas(nStr)
            {
              nStr += '';
              x = nStr.split('.');
              x1 = x[0];
              x2 = x.length > 1 ? '.' + x[1] : '';
              var rgx = /(\d+)(\d{3})/;
              while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
              }
              return x1 + x2;
            }
      }
      $(".item-menu-profile-detail").click(function(event){
        event.stopPropagation();
        var container_shown = $(this).attr('container');
        container_shown = "."+container_shown;
        if(!$(this).hasClass('active-item-menu-profile-detail')){
          $(".item-menu-profile-detail").removeClass("active-item-menu-profile-detail");
          $(this).addClass('active-item-menu-profile-detail');
          $(".container-down-profile-user").slideUp();
          $(container_shown).slideDown();
        }
      });
  
      $(".item-menu-subprofile-unstyled").click(function(event){
        if($(this).hasClass('active-item-menu-profile-detail')){
          $(this).removeClass('active-item-menu-profile-detail');
          $(this).find($(".container-dropdown-listing")).first().slideUp();
        } else{
          $(this).addClass('active-item-menu-profile-detail');
          $(this).find($(".container-dropdown-listing")).first().slideDown();
        }
        event.stopPropagation();
        var subtype_name = $(this).attr('subtype_name');
        $(".titlu-right-account-container .titlu-right-account").html(subtype_name.substr(0,1).toUpperCase()+subtype_name.substr(1));
        console.log(subtype_name);
        if(!$(this).hasClass('active-item-menu-profile-detail')){
            // filter profiles by subtype_id
            var subtype_id = $(this).attr('subtype_id');
            //define a new variable which modify the subtype_id param from url
            var href_trick = document.location.protocol+"//"+window.location.hostname + window.location.pathname + "?subtype_id="+subtype_id;
            window.history.replaceState(subtype_id, "MovieCircle", href_trick);
            if($("#container-profiles-account").length > 0){
              $("#container-profiles-account .profile-box-item").hide();
              $("#container-profiles-account .profile-box-item[subitem_id="+subtype_id+"]").show();
            }
          if(subtype_name == 'item'){
//             $(".titlu-right-account-container .btn-add-new").hide();
            $(".titlu-right-account-container .btn-add-new").css('display', 'flex');
            $(".titlu-right-account-container .btn-add-new").attr('subtype_name', subtype_name);
            $(".titlu-right-account-container .btn-my-account-add-info>span").html(subtype_name);
            $(".container-add-empty").slideUp();
            $(".container-subitems-listed").slideDown({
              start: function () {
                $(this).css({
                  display: "flex"
                })
              }
            });
            $(".container-down-profile-user").slideUp();
          }
          else{
            $(".btn-add-new").attr('subtype_name', subtype_name);
            $(".container-add-empty").slideUp();
            $(".btn-my-account-add-info>span").html(subtype_name);
            $(".btn-add-new").css('display', 'flex');
            var container_elements = "#container-"+subtype_name;
            $(".container-down-profile-user").slideUp();
            if($("#container-profiles-account .profile-box-item[subitem_id="+subtype_id+"]").length<=0){
                $(container_elements).slideUp({
                  start: function () {
                    $(this).css({
                      display: "flex"
                    })
                  }
                });
            }
          }
//           if(!$(this).hasClass('active-item-menu-profile-detail')){
//             $(".item-menu-subprofile-unstyled").removeClass("active-item-menu-profile-detail");
//             $(this).addClass('active-item-menu-profile-detail');
//           }
        }
      });
      $(".item-menu-profile-settings").click(function(event){
        event.preventDefault();
        var subtype_name = $(this).attr('subtype_name');
        $(".titlu-right-account-container .titlu-right-account").html(subtype_name.substr(0,1).toUpperCase()+subtype_name.substr(1));
        console.log(subtype_name);
        if(!$(this).hasClass('active-item-menu-profile-detail')){
            // filter profiles by subtype_id
            var subtype_id = $(this).attr('subtype_id');
            //define a new variable which modify the subtype_id param from url
            var href_trick = document.location.protocol+"//"+window.location.hostname + window.location.pathname + "?subtype_id="+subtype_id;
            window.history.replaceState(subtype_id, "MovieCircle", href_trick);
            if($("#container-profiles-account").length > 0){
              $("#container-profiles-account .profile-box-item").hide();
              $("#container-profiles-account .profile-box-item[subitem_id="+subtype_id+"]").show();
            }
          if(subtype_name == 'item'){
//             $(".titlu-right-account-container .btn-add-new").hide();
            $(".titlu-right-account-container .btn-add-new").css('display', 'flex');
            $(".titlu-right-account-container .btn-add-new").attr('subtype_name', subtype_name);
            $(".titlu-right-account-container .btn-my-account-add-info>span").html(subtype_name);
            $(".container-add-empty").slideUp();
            $(".container-subitems-listed").slideDown({
              start: function () {
                $(this).css({
                  display: "flex"
                })
              }
            });
            $(".container-down-profile-user").slideUp();
          }
          else{
            $(".btn-add-new").attr('subtype_name', subtype_name);
            $(".container-add-empty").slideUp();
            $(".btn-my-account-add-info>span").html(subtype_name);
            $(".btn-add-new").css('display', 'flex');
            var container_elements = "#container-"+subtype_name;
            $(".container-down-profile-user").slideUp();
            if($("#container-profiles-account .profile-box-item[subitem_id="+subtype_id+"]").length<=0){
                $(container_elements).slideUp({
                  start: function () {
                    $(this).css({
                      display: "flex"
                    })
                  }
                });
            }
          }
          if(!$(this).hasClass('active-item-menu-profile-detail')){
            $(".item-menu-profile-settings").removeClass("active-item-menu-profile-detail");
            $(this).addClass('active-item-menu-profile-detail');
          }
          
        }
      });
      $(".input-upload-docs").click(function(){
        $(".upload-file-prove").trigger("click");
      });
      $(".box-upload-file-trick").click(function(){
        $(".upload-file-prove").trigger("click");
      });
      $(".btn-add-custom-field").click(function(){
        if($(this).parent().find(".custom-field-input-title").val().length === 0 || $(this).parent().find(".custom-field-input-description").val().length === 0){
           alert("Please complete title and description for adding new custom field!");
        } else{
          var html_for_insert = "<div class='item-custom-field'><div class='item-added-field'><span class='field_title'>"+$(this).parent().find(".custom-field-input-title").val()+"</span>: <span class='field_desc'>"+$(this).parent().find(".custom-field-input-description").val()+"</span></div><div class='container-delete-img btn-delete-custom-field'><img src='../images/delete_element.png'/></div></div>";
          $(".my-custom-fields-container.added-fields-container").append(html_for_insert);
          $(".custom-field-input-title").val('');
          $(".custom-field-input-description").val('');
        }
      });
      $(".btn-add-language").click(function(){
        if($(".language_title").val().length === 0){
           alert("Please complete language and select level for adding new language!");
        } else{
          var html_for_insert = "<div class='item-custom-field'><div class='item-added-field'><span class='field_title'>"+$(".language_title").val()+"</span>: <span class='field_desc'>"+$(".select-level-language option:selected").text()+"</span></div><div class='container-delete-img btn-delete-custom-field'><img src='../images/delete_element.png'/></div></div>";
          $(".my-custom-fields-container.languages-container").append(html_for_insert);
          $(".language_title").val('');
          $(this).parent().parent().find($("label")).html($(this).parent().parent().find($("label")).attr('label_text'));
          $(this).parent().parent().find($("label")).css('color', "#000000");
        }
      });
      $(document).on('click', ".btn-delete-custom-field", function(){
        if(confirm("Are you sure you want to delete this file?")){
        $(this).parent().fadeOut(300, function() { $(this).remove(); });
          return;
        } else{
          return;
        }
      });
//       $(document).on('click', ".btn-delete-film-bio-other", function(){
//         if(confirm("Are you sure you want to delete this file?")){
//         $(this).parent().parent().fadeOut(300, function() { $(this).remove(); });
//           return;
//         } else{
//           return;
//         }
//       });
      $(".btn-albastru-save").click(function(){
        var item_type = $(this).find($(".input-type-item")).val();
        var title = "."+item_type+"-title";
        var description = "."+item_type+"-description";
        var container_items = ".items-"+item_type;
        if($(title).val().length === 0 || $(description).val().length === 0){
           alert("Please complete title and description for adding new item!");
        } else{
          var html_for_insert = 
              '<div class="box-saved-element-film-bio-other">'+
                '<div class="title-saved-film-bio-other">'+$(title).val()+'</div>'+
                '<div class="text-saved-film-bio-other">'+$(description).val()+'</div>'+
                '<div class="container-edit-delete-saved-film-bio-other">'+
                  '<div class="box-edit-delete-profile-film-bio-other btn-edit-film-bio-other">'+
                    '<div class="edit-film-bio-other">'+
                      '<img src="../../images/edit.png"/>'+
                    '</div>'+
                    '<div class="edit-delete-text-item">Edit</div>'+
                  '</div>'+
                  '<div class="box-edit-delete-profile-film-bio-other btn-delete-film-bio-other">'+
                   ' <div class="delete-film-bio-other">'+
                      '<img src="../../images/delete_element.png"/>'+
                    '</div>'+
                    '<div class="edit-delete-text-item">Delete</div>'+
                  '</div>'+
                '</div>'+
              '</div>';
          $(container_items).append(html_for_insert);
          $(title).val('');
          $(description).val('');
        }
      });
      
      $(document).on('click', '.skill-box', function(){
        $(this).toggleClass("skill-box-active");
         $(this).parent().parent().find('.div-error').css('color', 'inherit');
        $(this).parent().parent().find('.div-error').html($(this).parent().parent().find('.div-error').attr('div_text'));
        $(this).parent().parent().find('.div-error').removeClass('div-error');
      });
      $(".btn-add-skill").click(function(){
        if($(this).hasClass("btn-new-tag")){
          var tag = $(this).parent().find($(".new-skill-tag")).val();
          if(tag.length === 0){
            alert("Please add text to create new tag!");
          } else{
            var html_tag = '<div class="skill-box skill-box-active personal-tag" tag_name="'+tag+'">#'+tag+'</div>';
            $(this).parent().parent().find($(".tags-container")).append(html_tag);
            $(this).parent().find($(".new-skill-tag")).val('');
          }
        } else{
          var sport = $(this).parent().find($(".new-skill-sport")).val();
          if(sport.length === 0){
            alert("Please add text to create new sport tag!");
          } else{
            var html_sport = '<div class="skill-box sport-item skill-box-active">'+sport+'</div>';
            $(".sports-container").append(html_sport);
            $(this).parent().find($(".new-skill-sport")).val('');
          }
        }
      });
    $(".add-file").click(function(){
      $(this).parent().find($(".file-input-project")).trigger('click');
    });
    $(".file-name").click(function(){
      $(this).parent().find($(".file-input-project")).trigger('click');
    });
      $(".file-input-project").on('change', function(){
        $(this).parent().parent().parent().find('.div-error').css('color', 'inherit');
        $(this).parent().parent().parent().find('.div-error').html($(this).parent().parent().parent().find('.div-error').attr('div_text'));
        $(this).parent().parent().parent().find('.div-error').removeClass('div-error');
        filesPreview(this, '.container-files-added');
      });
      
     var filesPreview = function(input, placeToInsertFilePreview) {
        if (input.files) {
            var files = input.files;
            var filesAmount = files.length;
            var file_name;
            var reader;
            var html_insert;
            for (i = 0; i < filesAmount; i++) {
                file_name = files[i].name;
                reader = new FileReader();
                reader.fileName = file_name;
                reader.onload = function(event) {
                  html_insert = 
                  '<div class="container-box-file">'+
                    '<div class="container-box-file-left">'+
                      '<img src="../images/folder.png" />'+
                    '</div>'+
                    '<div class="container-box-file-right">'+
                      '<div class="container-box-file-title">'+event.target.fileName+'</div>'+
                      '<div class="btn-delete-file-box">delete</div>'+
                    '</div>'+
                  '</div>';                  
                  $(placeToInsertFilePreview).append(html_insert);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

      };
      
      $(document).on('click', '.btn-delete-file-box', function(){
        if(confirm("Are you sure you want to delete this file?")){
          $(this).parent().parent().fadeOut(300, function() { $(this).remove(); });
          event.stopPropagation();
          return;
        } else{
          event.stopPropagation();
          return;
        }
      });
      
//       $("input[name=radio_currency]").on('change', function() {
//         var symbol_slider = '$';
//         if($(this).val() == 'euro'){
//           symbol_slider = "&euro;";
//         } 
//         var val_current = $("span.asRange-tip").html().split(" ")[1];
//         $("span.asRange-tip").html(symbol_slider+" "+val_current);
//       });
      $(".btn-upload-photos").click(function(){
        $(".input-images").trigger("click");
      });
      $('.input-images').change(function(e){
          $(this).parent().parent().parent().find('.div-error').css('color', 'inherit');
          $(this).parent().parent().parent().find('.div-error').html($(this).parent().parent().parent().find('.div-error').attr('div_text'));
          $(this).parent().parent().parent().find('.div-error').removeClass('div-error');
      });
  
      var imagesPreview = function(input, placeToInsertImagePreview) {
        console.log(input.files);
        if (input.files) {
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();

                reader.onload = function(event) {
  //                   $.parseHTML().appendTo(placeToInsertImagePreview);
                  var html_insert = "<div class='img-preview-box-project' id_file='"+i+"'><div class='over-image-hover'><div class='container-delete-img btn-delete-image'><img src='../images/delete_element.png'/></div></div><img src='"+event.target.result+"'/></div>";
                  $(placeToInsertImagePreview).append(html_insert);
                }

                reader.readAsDataURL(input.files[i]);
            }
        }

      };

      $(".add-photos-trick").click(function(){
        $(this).parent().find($(".photos-files")).trigger('click');
      });
      $(".add-file-photos").click(function(){
        $(this).parent().find($(".photos-files")).trigger('click');
      });
      $('.photos-files').on('change', function() {
          $(this).parent().parent().parent().find('.div-error').css('color', 'inherit');
          $(this).parent().parent().parent().find('.div-error').html($(this).parent().parent().parent().find('.div-error').attr('div_text'));
          $(this).parent().parent().parent().find('.div-error').removeClass('div-error');
          imagesPreview(this, '.container-photos-added');
      });
      $(document).on('click', '.btn-delete-image', function(event){
        if(confirm("Are you sure you want to delete this file?")){
          $(this).parent().parent().fadeOut(300, function() { $(this).remove(); });
          event.stopPropagation();
          return;
        } else{
          event.stopPropagation();
          return;
        }
      });
      $(document).on('click', '.btn-delete-image-files', function(){
        if(confirm("Are you sure you want to delete this file?")){
          $(this).parent().fadeOut(300, function() { $(this).remove(); });
          return;
        } else{
          return;
        }
      });
      $(".btn-add-new").click(function(){
//         $("form").trigger('reset');
        if($(this).attr('subtype_name') == 'project' || $(this).attr('subtype_name') == 'projekt'){
          $(".trick-open-popup").trigger("click");
        }else if($(this).attr('subtype_name') == 'job'){
          $(".container-add-empty").slideUp();
          $(".container-type-of-profiles").hide();
          $(this).hide();
          $(".btn-cancel-product").css('display', 'flex');
          $(".container-edit-add-job").slideDown();
          $(".products-list-container").slideUp();
          $("#form-job").trigger("reset");
          $("#form-job .container-photos-added").html('');
          $("#form-job .container-files-added").html('');
          $("#form-job .skill-box").removeClass('skill-box-active');
        }else{
          $("#form-youtube .select-youtube-links").val(null).trigger('change');
          $("#form-informations .my-custom-fields-container.added-fields-container").html('');
          $("#form-informations .my-custom-fields-container.languages-container").html('');
          $(".skill-box").removeClass('skill-box-active');
          $(".retrieved_data").html('');
          $(".container-files").html('');
          $(".container-videos").html('');
          
          $("#container-profiles-account").slideUp();
          $(".container-add-empty").slideUp();
          $(".container-type-of-profiles").hide();
          $(this).hide();
          $(".btn-cancel-product").css('display', 'flex');
          var entire_items = $(".item-menu-profile-settings.active-item-menu-profile-detail").attr('entire_item');
          entire_items = $.parseJSON(entire_items);
          // if we have clicken on item, then only show the add-edit item form
          if($(".item-menu-profile-settings.active-item-menu-profile-detail").attr('parent_subitem_id') == 1 || $(".item-menu-profile-settings.active-item-menu-profile-detail").attr('subtype_id') == 1){
            $("#form-items").slideDown();
            $("#form-items input[name=check_add_edit]").val("add");
          } else{
            $(".items-top-profile-settings").show().css('display', 'flex');
            $(".about-container").slideDown();
          }
          $(".products-list-container").slideUp();
          
          var html_input = '';
          if(entire_items != undefined && entire_items != null && entire_items != ''){
            console.log(entire_items);
            var default_inputs = entire_items.default_inputs;
//             if(!$.isArray(default_inputs) && default_inputs != null){
//             console.log($.isArray(default_inputs));
//               default_inputs = $.parseJSON(default_inputs);
//             }
            var tags = entire_items.tags;
//             if(!$.isArray(tags) && tags != null){
//               tags = $.parseJSON(tags);
//             }
            var skills = entire_items.skills;
//             if(!$.isArray(skills) && skills != null){
//               skills = $.parseJSON(skills);
//             }
            if(default_inputs != null && default_inputs.length > 0){
              for(var key in default_inputs){
                if(default_inputs.length > 2) {
                  html_input += '<div class="container-input-profile-down input-three-columns">';
                } else{
                  html_input += '<div class="container-input-profile-down">';
                }
                
                html_input += '<label>'+default_inputs[key].title+'</label>'+
                      '<input type="hidden" name="custom_title[]" class="input-normal-profile" value="'+default_inputs[key].title+'"/>'+
                      '<input type="hidden" name="custom_description[]" class="input-normal-profile" value="'+default_inputs[key].description+'"/>'+
                      '<input type="text" name="custom_value[]" class="input-normal-profile" value="'+default_inputs[key].value+'" placeholder="'+default_inputs[key].description+'"/>'+
                    '</div>';
              }
              $(".container-inputs-three-columns").html(html_input);
            } else{
              html_input = '<div class="title-profile-items">No default inputs</div>';
              $(".container-inputs-three-columns").html(html_input);
            }
            html_input = '';
            if(tags != null && tags.length > 0){
              for(var keyt in tags){
                html_input += '<div class="skill-box tag-item">#'+tags[keyt]+'</div>';
              }
              $('.container-skills-tags.tags-container').html(html_input);
            } else{
              html_input = '<div class="title-profile-items">No default tags</div>';
              $(".container-skills-tags.tags-container").html(html_input);
            }
            html_input = '';
            if(skills != null && skills.length > 0){
              for(var keysk in skills){
                html_input += '<div class="skill-box tag-item">'+tags[keysk]+'</div>';
              }
              $('.container-skills-tags.sports-container').html(html_input);
            } else{
              html_input = '<div class="title-profile-items">No skill tags</div>';
              $(".container-skills-tags.sports-container").html(html_input);
            }
            $(".id-subitem-selected").val($(".container-menu-profile > .item-menu-profile-settings.active-item-menu-profile-detail").attr('subtype_id'));
            $(".edit-add-action").val("add");
          }
        }
        
        var selected_subtype = $(".item-menu-profile-settings.active-item-menu-profile-detail").attr("subtype_id");
        $("input[name=subitem_id]").val(selected_subtype);
      });
      $(".btn-cancel-product").click(function(){
        $("#form-youtube .select-youtube-links").val(null).trigger('change');
        $(".item-menu-profile-detail").removeClass('active-item-menu-profile-detail');
        $(".item-menu-profile-detail[container=about-container]").addClass('active-item-menu-profile-detail');
        $('#form-job input[name=check_edit_or_add]').val('add');
        $(".items-top-profile-settings").hide();
        $(".container-down-profile-user").slideUp();
        $(".container-type-of-profiles").css('display', 'flex');
        $(this).hide();
        $(".btn-add-new").css('display', 'flex');
        if($("#container-profiles-account").length > 0){
          $("#container-profiles-account").slideDown();
        } else{
          var subtype_name = $(".item-menu-profile-settings.active-item-menu-profile-detail").attr('subtype_name');
          $("#container-"+subtype_name).slideDown();
        }
        $(".id-subitem-selected").val('');
        $(".add_edit_id").val('');
//         $(".retrieved_data").html('');
      });
      
      $(".btn-new-job").click(function(){
        var subtype_name = $(this).attr('element_name');
        $(".item-menu-profile-settings[subtype_name="+subtype_name+"]").trigger('click');
      });
      $(".btn-edit-job").click(function(){
        var job_title = $(this).find("input[name=job_title]").val();
        var job_id = $(this).find("input[name=job_id]").val();
        var job_location = $(this).find("input[name=job_location]").val();
        var job_description = $(this).find("input[name=job_description]").val();
        var fixed_fee = $(this).find("input[name=fixed_fee]").val();
        var start_fee = $(this).find("input[name=start_fee]").val();
        var end_fee = $(this).find("input[name=end_fee]").val();
        var currency = $(this).find("input[name=currency]").val();
        var tags = $(this).find("input[name=tags]").val();
        var photos = $(this).find("input[name=photos]").val();
        var files = $(this).find("input[name=files]").val();
        
        $("#form-job input[name=job_title]").val(job_title);
        $("#form-job input[name=job_id]").val(job_id);
        $("#form-job input[name=job_location]").val(job_location);
        $("#form-job textarea[name=job_description]").val(job_description);
        $("#form-job input[value="+fixed_fee+"]").prop("checked", true);
        $("#form-job input[value="+currency+"]").prop("checked", true);
        
        tags = JSON.parse(tags);
        files = JSON.parse(files);
        photos = JSON.parse(photos);
        var html_insert = '';
        for(var i = 0;i<photos.length;i++){
          console.log(photos[i]);
          html_insert += "<div class='img-preview-box-project img-is-from-server' image_path="+photos[i]+" id_file='"+i+"'><div class='over-image-hover'><div class='container-delete-img btn-delete-image'><img src='../images/delete_element.png'/></div></div><img src='storage/"+photos[i]+"'/></div>";
        }
        $("#form-job .container-photos-added").append(html_insert);
        html_insert = '';
        for(var i = 0;i<files.length;i++){
          console.log(files[i]);
          html_insert += '<div class="container-box-file file-is-from-server" file_path='+files[i].download_link+'>'+
                  '<div class="container-box-file-left">'+
                    '<img src="../images/folder.png" />'+
                  '</div>'+
                  '<div class="container-box-file-right">'+
                    '<div class="container-box-file-title">'+files[i].original_name+'</div>'+
                    '<div class="btn-delete-file-box">delete</div>'+
                  '</div>'+
                '</div>';
        }
        $("#form-job .container-files-added").append(html_insert);
        $('#form-job .skill-box').each(function(){
           var this_tag = $(this).attr('tag_name');
           if($.inArray(this_tag, tags) != -1){
              $(this).trigger('click');
           };
        });
        $("#container-job").slideUp();
        $("#form-job").slideDown();
        $(".container-type-of-profiles").hide();
        $(".btn-add-new").hide();
        $(".btn-cancel-product").css('display', 'flex');
        $('#form-job input[name=check_edit_or_add]').val('edit');
      });
      $(".btn-add-edit-job").click(function(event){
          $("#form-job").trigger('submit');
          event.stopPropagation();
          return;
      })
    $("#form-job").on('submit', function(event) {
        $('.btn-add-edit-job').html(please_wait);
        var selected_personal_input_tags = [];
        var selected_input_tags = [];
        $("#form-job .personal-tag").each(function(item){
          if($(this).hasClass('skill-box-active')){
            selected_personal_input_tags.push($(this).attr('tag_name'));
          }
        }); 
        $("#form-job .tag-item").each(function(item){
          if($(this).hasClass('skill-box-active')){
            selected_input_tags.push($(this).attr('tag_name'));
          }
        });
        $("#form-job input[name=input_tags]").val(selected_input_tags);
        $("#form-job input[name=input_personal_tags]").val(selected_personal_input_tags);
        var edit_add = $("#form-job input[name=check_edit_or_add]").val();
        var action = $("#form-job").attr("action");
        if(edit_add == 'edit'){
          action = $("#form-job").attr("action_edit");
          if($("#form-job .img-is-from-server").length > 0){
            var images_from_server = [];
            $("#form-job .img-is-from-server").each(function(){
              var img_path = $(this).attr('image_path');
              images_from_server.push(img_path);
            });
            var images_from_server_input = "<input type='hidden' name='images_from_server' class='images-from-server'/>";
            $("#form-job").append(images_from_server_input);
            $("#form-job .images-from-server").val(images_from_server);
          }
          if($("#form-job .file-is-from-server").length > 0){
            var files_from_server = [];
            $("#form-job .file-is-from-server").each(function(){
              var file_path = $(this).attr('file_path');
              files_from_server.push(file_path);
            });
            var files_from_server_input = "<input type='hidden' name='files_from_server' class='files-from-server'/>";
            $("#form-job").append(files_from_server_input);
            $("#form-job .files-from-server").val(files_from_server);
          }
        }
        var formData = new FormData(this);
        event.preventDefault();
          $('.btn-add-edit-job').attr('disabled', 'disabled');
          $.ajax({
              method: 'POST',
              url: action,
              type: 'submit',
              data: formData,
              processData: false,
              contentType: false,
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-add-edit-job').html(save_changes_title);
              }, 200);
              if (res.success == true) {
                  $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                  $(".container-mare-modal .text-modal").html(res.msg);
                  $(".btn-add-edit-job").prop('disabled', false);
                  $("#form-job .container-photos-added").html('');
                  $("#form-job .container-files-added").html('');
                  $("#form-job .skill-box").removeClass('skill-box-active');
                  $('#form-job input[name=check_edit_or_add]').val('add');
                  $('html, body').stop().animate({
                    scrollTop: 0
                  }, 500, function() {});
                  setTimeout(function(){
                    $("#form-job").trigger("reset");
                    if($(".container-mare-modal").is(':visible')){ 
                      $(".container-mare-modal").css("display", "flex").fadeOut();
                    }
                  }, 2000);
                  setTimeout(function(){
                        window.location.reload();
                  }, 2000);
                  
              } else { 
                if(res.error_all){
                  // check all errors
                 var erori = res.error_all;
                 for(var key in erori) {
                   // create the eroare variable, which is used to add css properties to each element in the form
                   var eroare =  '.input-'+key;
                    $(".form-project input[name='"+key+"']").addClass('input-has-error');
                    $("#form-job").find($("input[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                    $("#form-job").find($("input[name='"+key+"']")).parent().find('label').css("color", "red");
                    $("#form-job").find($("textarea[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                    $("#form-job").find($("textarea[name='"+key+"']")).parent().find('label').css("color", "red");
                    var simple_div_error = "."+key;
                    $("#form-job").find($(simple_div_error)).addClass('div-error');
                    $("#form-job").find($(simple_div_error)).html(erori[key][0]);
                    $("#form-job").find($(simple_div_error)).css("color", "red");
                   
                  }
                } else if(res.msg_error){
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.msg_error);
                } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-add-edit-job").prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
      
      $(".trick-delete-job").click(function(){
        var vthis = this;
        if(confirm('Are you sure you want to delete the job?')){
          $(".form-delete-job>input[name=job_id]").val($(vthis).attr('job_id'));
          $(".btn-delete-job").trigger('click');
          return false;
        }
        return false;
      });
      $(".btn-delete-job").on('click', function(event) {
          var job_id = $(this).parent().find('input[name=job_id]').val();
          event.preventDefault();
          $.ajax({
              method: 'POST',
              url: $(this).parent().attr("action"),
              data: $(this).parent().serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              if (res.success == true) {
                  $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                  $(".container-mare-modal .text-modal").html(res.msg);
                  $(".btn-delete-job").prop('disabled', false);
                  $(".form-delete-job").trigger("reset");
                  var box_for_delete = ".trick-delete-job[job_id="+job_id+"]";
                  $(box_for_delete).closest($(".item-page-box-container")).fadeOut(300, function() { $(this).remove(); });
                  setTimeout(function(){
                    if($(".container-mare-modal").is(':visible')){ 
                      $(".container-mare-modal").css("display", "flex").fadeOut();
                    }
                  }, 3000);
              } else { 
                if(res.error){
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-delete-job").prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
  
     $(".trick-delete-profile").click(function(){
        var vthis = this;
        if(confirm('Are you sure you want to delete the profile?')){
          $(".form-delete-profile>input[name=profile_id]").val($(vthis).attr('profile_id'));
          $(".form-delete-profile .btn-delete-profile").trigger('click');
          return false;
        }
        return false;
      });
      $(".form-delete-profile .btn-delete-profile").on('click', function(event) {
          var profile_id = $(this).parent().find('input[name=profile_id]').val();
          event.preventDefault();
          $.ajax({
              method: 'POST',
              url: $(this).parent().attr("action"),
              data: $(this).parent().serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              if (res.success == true) {
                  $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                  $(".container-mare-modal .text-modal").html(res.msg);
                  $(".form-delete-profile .btn-delete-profile").prop('disabled', false);
                  $(".form-delete-profile").trigger("reset");
                  var box_for_delete = ".trick-delete-profile[profile_id="+profile_id+"]";
                  var subitem_id = $(box_for_delete).closest($(".profile-box-item")).attr('subitem_id');
                  $(box_for_delete).closest($(".profile-box-item")).fadeOut(300, function() { $(this).remove(); });
                  setTimeout(function(){
                    if($(".container-mare-modal").is(':visible')){ 
                      $(".container-mare-modal").css("display", "flex").fadeOut();
                    }
                  }, 2500);
                  setTimeout(function(){
                      if($(".profile-box-item[subitem_id="+subitem_id+"]").length <= 0){
                        window.location.reload();
                      }
                  }, 2500);
              } else { 
                if(res.error){
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-delete-profile").prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
  
      $(".form-project .category-item-project").click(function(){
        $(this).toggleClass('active-category');
        $(this).parent().parent().find('.div-error').css('color', 'inherit');
        $(this).parent().parent().find('.div-error').html($(this).parent().parent().find('.div-error').attr('div_text'));
        $(this).parent().parent().find('.div-error').removeClass('div-error');
      });
      $(".form-project .genres-item-project").click(function(){
        $(this).toggleClass('active-category');
        $(this).parent().parent().find('.div-error').css('color', 'inherit');
        $(this).parent().parent().find('.div-error').html($(this).parent().parent().find('.div-error').attr('div_text'));
        $(this).parent().parent().find('.div-error').removeClass('div-error');
      });
      
      $(".btn-add-edit-project").click(function(){
        $(".project-step").val($(this).attr('step'));
        $(".form-project").trigger('submit');
      });
      
      $(".form-project").on('submit', function(event) {
        var step = $(".project-step").val();
        $('.btn-add-edit-project[step='+step+']').html(please_wait);
        
        if(step == "step_1"){
          var selected_categories = [];
           $(".form-project .container-categories-project .category-item-project").each(function(item){
            if($(this).hasClass('active-category')){
              selected_categories.push($(this).attr('cat_id'));
            }
          }); 
          $(".form-project input[name=input_categories]").val(selected_categories);
          var selected_genres = [];
           $(".form-project .container-categories-project .genres-item-project").each(function(item){
            if($(this).hasClass('active-category')){
              selected_genres.push($(this).attr('genre_id'));
            }
          }); 
          $(".form-project input[name=input_genres]").val(selected_genres);
        }
        
        if(step == "step_3"){
          var selected_personal_input_tags = [];
          var selected_input_tags = [];
          var selected_input_jobs = [];
          $(".form-project .personal-tag").each(function(item){
            if($(this).hasClass('skill-box-active')){
              selected_personal_input_tags.push($(this).attr('tag_name'));
            }
          }); 
          $(".form-project .tag-item").each(function(item){
            if($(this).hasClass('skill-box-active')){
              selected_input_tags.push($(this).attr('tag_name'));
            }
          });
          $(".container-jobs-selection-project>.container-job-selector.job_selected").each(function(){
            selected_input_jobs.push($(this).attr('job_id'));
          });
          $(".form-project input[name=input_tags]").val(selected_input_tags);
          $(".form-project input[name=input_personal_tags]").val(selected_personal_input_tags);
          $(".form-project input[name=project_jobs]").val(selected_input_jobs);
        }
        var edit_add = $(".form-project input[name=check_edit_or_add]").val();
        var action = $(".form-project").attr("action");
        if(edit_add == 'edit'){
          action = $(".form-project").attr("action_edit");
          if($(".form-project .img-is-from-server").length > 0){
            var images_from_server = [];
            $(".form-project .img-is-from-server").each(function(){
              var img_path = $(this).attr('image_path');
              images_from_server.push(img_path);
            });
            var images_from_server_input = "<input type='hidden' name='images_from_server' class='images-from-server'/>";
            $(".form-project").append(images_from_server_input);
            $(".form-project .images-from-server").val(images_from_server);
          }
          if($(".form-project .file-is-from-server").length > 0){
            var files_from_server = [];
            $(".form-project .file-is-from-server").each(function(){
              var file_path = $(this).attr('file_path');
              files_from_server.push(file_path);
            });
            var files_from_server_input = "<input type='hidden' name='files_from_server' class='files-from-server'/>";
            $(".form-project").append(files_from_server_input);
            $(".form-project .files-from-server").val(files_from_server);
          }
        }
        var formData = new FormData(this);
        event.preventDefault();
          $('.btn-add-edit-project[step='+step+']').attr('disabled', 'disabled');
          $.ajax({
              method: 'POST',
              url: action,
              type: 'submit',
              data: formData,
              processData: false,
              contentType: false,
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-add-edit-project[step='+step+']').html(next_text);
              }, 200);
              if (res.success == true) {
                  if(res.step == 'step_1'){
                    $(".form-part-1").slideUp();
                    $(".form-part-2").slideDown().css('display', 'flex');
                    $(".form-part-1 .btn-add-edit-project").prop('disabled', false);
                  } else if(res.step == 'step_2'){
                    $(".form-part-2").slideUp();
                    $(".form-part-3").slideDown().css('display', 'flex');
                    $(".form-part-2 .btn-add-edit-project").prop('disabled', false);
                  } else{
                    $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                    $(".container-mare-modal .text-modal").html(res.msg);
                    $(".btn-add-edit-project").prop('disabled', false);
                    $(".form-project").trigger("reset");
                    $(".form-project .container-photos-added").html('');
                    $(".form-project .container-files-added").html('');
                    $(".form-project .skill-box").removeClass('skill-box-active');
                    $('.form-project input[name=check_edit_or_add]').val('add');
                    $("#modalForm").modal('hide');
                    if($(".important-text-page").length>0){
                      $(".important-text-page").remove();
                    }
                    window.newProject(res.project);
                    $(".form-project").trigger('reset');
                    $(".form-part-1").show();
                    $(".form-part-2").hide();
                    $(".form-part-3").hide();
                    $(".form-part-3 .btn-add-edit-project").prop('disabled', false);
                  }
                  
              } else { 
                if(res.error_all){
                  // check all errors
                 var erori = res.error_all;
                 for(var key in erori) {
                   // create the eroare variable, which is used to add css properties to each element in the form
                   var eroare =  '.input-'+key;
                    $(".form-project input[name='"+key+"']").addClass('input-has-error');
                    if(key != "project_jobs"){
                      $(".form-project").find($("input[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                      $(".form-project").find($("input[name='"+key+"']")).parent().find('label').css("color", "red");
                      $(".form-project").find($("textarea[name='"+key+"']")).parent().find('label').html(erori[key][0]);
                      $(".form-project").find($("textarea[name='"+key+"']")).parent().find('label').css("color", "red");
                    }
                    var simple_div_error = "."+key;
                    $(".form-project").find($(simple_div_error)).addClass('div-error');
                    $(".form-project").find($(simple_div_error)).html(erori[key][0]);
                    $(".form-project").find($(simple_div_error)).css("color", "red");
                   
                  }
                } else if(res.msg_error){
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.msg_error);
                } else{
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
               $('.btn-add-edit-project[step='+step+']').prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
      
      $('#modalForm').on('hidden.bs.modal', function () {
        $(".container-categories-project>.category-item-project").removeClass('active-category'); 
        $(".container-categories-project>.genres-item-project").removeClass('active-category'); 
      });
      $(document).on('click', ".btn-edit-project", function(){
        var project_title = $(this).find("input[name=project_title]").val();
        var project_id = $(this).find("input[name=project_id]").val();
        var start_fee = $(this).find("input[name=start_fee]").val();
        var end_fee = $(this).find("input[name=end_fee]").val();
        var categories = $(this).find("input[name=categories]").val();
        var genres = $(this).find("input[name=genres]").val();
        var storyline = $(this).find("input[name=storyline]").val();
        var director = $(this).find("input[name=director]").val();
        var writer = $(this).find("input[name=writer]").val();
        var start_date = $(this).find("input[name=start_date]").val();
        var end_date = $(this).find("input[name=end_date]").val();
        var about = $(this).find("input[name=about]").val();
        var team_description = $(this).find("input[name=team_description]").val();
        var files = $(this).find("input[name=files]").val();
        var photos = $(this).find("input[name=photos]").val();
        var jobs = $(this).find("input[name=jobs]").val();
        var tags = $(this).find("input[name=tags]").val();
        
        //convert date_start and date_end to initialize the airdatepicker input
        var date    = new Date(start_date);
        var yr      = date.getFullYear();
        var month   = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
        var day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate();
        
        var year_start = yr;
        var month_start = month;
        var day_start = day;
        
        date    = new Date(end_date);
        yr      = date.getFullYear();
        month   = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth();
        day     = date.getDate()  < 10 ? '0' + date.getDate()  : date.getDate();
        
        var year_end = yr;
        var month_end = month;
        var day_end = day;
        console.log(year_start,month_start,day_start,year_end,month_end,day_end);
        $(".container-new-project").show();
        $(".form-project input[name=project_name]").val(project_title);
        $(".form-project input[name=project_id]").val(project_id);
        $(".form-project input[name=start_fee]").val(start_fee);
        $(".form-project input[name=end_fee]").val(end_fee);
        $(".form-project input[name=categories]").val(categories);
        $(".form-project input[name=genres]").val(genres);
        $(".form-project textarea[name=storyline]").val(storyline);
        $(".form-project input[name=director]").val(director);
        $(".form-project input[name=writer]").val(writer);
//         setTimeout(function(){
          $(".form-project input[name=start_date]").datepicker().data('datepicker').selectDate(new Date(year_start, month_start, day_start));
          $(".form-project input[name=end_date]").datepicker().data('datepicker').selectDate(new Date(year_end, month_end, day_end));
//         },500);
        $(".form-project textarea[name=about]").val(about);
        $(".form-project textarea[name=team]").val(team_description);
        $(".form-project input[name=files]").val(files);
        $(".form-project input[name=photos]").val(photos);
        $(".form-project input[name=jobs]").val(jobs);
        $(".form-project input[name=tags]").val(tags);
        
        tags = JSON.parse(tags);
        files = JSON.parse(files);
        photos = JSON.parse(photos);
        categories = JSON.parse(categories);
        genres = JSON.parse(genres);
        jobs = JSON.parse(jobs);
        var html_insert = '';
        $(".form-project .container-photos-added").html('');
        for(var i = 0;i<photos.length;i++){
          console.log(photos[i]);
          html_insert += "<div class='img-preview-box-project img-is-from-server' image_path="+photos[i]+" id_file='"+i+"'><div class='over-image-hover'><div class='container-delete-img btn-delete-image'><img src='../images/delete_element.png'/></div></div><img src='storage/"+photos[i]+"'/></div>";
        }
        $(".form-project .container-photos-added").append(html_insert);
        html_insert = '';
        for(var j = 0;j<files.length;j++){
          html_insert += '<div class="container-box-file file-is-from-server" file_path='+files[j].download_link+'>'+
                  '<div class="container-box-file-left">'+
                    '<img src="../images/folder.png" />'+
                  '</div>'+
                  '<div class="container-box-file-right">'+
                    '<div class="container-box-file-title">'+files[j].original_name+'</div>'+
                    '<div class="btn-delete-file-box">delete</div>'+
                  '</div>'+
                '</div>';
        }
        $(".form-project .container-files-added").html('');
        $(".form-project .container-files-added").append(html_insert);
        $('.form-project .skill-box').each(function(){
           var this_tag = $(this).attr('tag_name');
           if($.inArray(this_tag, tags) != -1){
              $(this).trigger('click');
           }
        });
        $('.form-project .category-item-project').each(function(){
           var this_cat = $(this).attr('cat_id');
           if($.inArray(this_cat, categories) != -1){
             console.log(this_cat);
              $(this).trigger('click');
           }
        });
        $('.form-project .genres-item-project').each(function(){
           var this_gen = $(this).attr('genre_id');
           if($.inArray(this_gen, genres) != -1){
              $(this).trigger('click');
           }
        });
        $('.form-project .container-jobs-selection-project>.container-job-selector').each(function(){
           var job_id = $(this).attr('job_id');
           if($.inArray(job_id, jobs) != -1){
              $(this).find("input[type=checkbox]").trigger('click');
           }
        });
        $(".trick-open-popup").trigger("click");
        $('.form-project input[name=check_edit_or_add]').val('edit');
        $(".form-part-3").hide();
      });
      $(".container-jobs-selection-project>.container-job-selector>input").click(function(event){
        $(this).parent().toggleClass('job_selected');
      });
      $(document).on('click', ".btn-delete-project", function(){
        if(confirm('Are you sure you want to delete the project?')){
          var project_id = $(this).parent().find('input[name=project_id]').val();
            event.preventDefault();
            $.ajax({
                method: 'POST',
                url: $(this).parent().attr("action"),
                data: $(this).parent().serializeArray(),
                context: this, async: true, cache: false, dataType: 'json'
            }).done(function(res) {
                if (res.success == true) {
                    $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                    $(".container-mare-modal .text-modal").html(res.msg);
                    $(".btn-delete-job").prop('disabled', false);
                    $(".form-delete-job").trigger("reset");
                    $(".project-box-account[project_id="+project_id+"]").fadeOut(300, function() { $(this).remove(); });
                    if($(".container-project .project-box-account").length <= 0){
                      setTimeout(function(){
                          window.location.reload();
                      }, 3000);
                    }
                    setTimeout(function(){
                      if($(".container-mare-modal").is(':visible')){ 
                        $(".container-mare-modal").css("display", "flex").fadeOut();
                      }
                    }, 3000);
                } else { 
                  if(res.error){
                     $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                     $(".container-mare-modal-error .text-modal").html(res.fail_error);
                  }
                  $(".btn-delete-job").prop('disabled', false);
                }
            })
            .fail(function(xhr, status, error) {
              if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
                window.location.reload();
              }
            });
            return;
        }
        return false;
      });
  
  
     $(".btn-contact-owner").click(function() {
        $('.btn-contact-owner').html(please_wait);
        event.preventDefault();
          $(this).attr('disabled', 'disabled');
          $.ajax({
              method: 'POST',
              url: $(this).parent().parent().attr("action"),
              data: $(this).parent().parent().serializeArray(),
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-contact-owner').html(send_message);
              }, 200);
              if (res.success == true) {
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $(".form-contact-owner").trigger('reset');
                $(".btn-contact-owner").prop('disabled', false);
                $(".error-form-container").fadeOut();
                setTimeout(function(){
                  $(".error-form-container").html('');
                }, 1000);
                $.fancybox.close(true);
              } else { 
                if(res.error_all){
                  var html_error = '';
                  var erori = res.error_all;
                  for(var key in erori) {
                    html_error += "<div class='error-line'>"+erori[key][0]+"</div>";
                    $(".form-contact-owner input[name='"+key+"']").addClass('error-line-input');
                    $(".form-contact-owner textarea[name='"+key+"']").addClass('error-line-input');
                  }
                  $(".error-form-container").html(html_error);
                  $(".error-form-container").fadeIn();
                } else{
                   $(".error-form-container").fadeOut();
                   setTimeout(function(){
                     $(".error-form-container").html('');
                   }, 1000);
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-contact-owner").prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
  
  
      $(".btn-apply-job").click(function(event) {
        $('.form-apply-job').trigger('submit');
        event.preventDefault();
      });
  
      $('.form-apply-job').on('submit', function(event) {
        var formData = new FormData(this);
        $('.btn-apply-job').html(please_wait);
        event.preventDefault();
          $.ajax({
              method: 'POST',
              url: $('.form-apply-job').attr("action"),
              data: formData,
              processData: false,
              contentType: false,
              context: this, async: true, cache: false, dataType: 'json'
          }).done(function(res) {
              setTimeout(function(){
                  $('.btn-apply-job').html(send_message);
              }, 200);
              if (res.success == true) {
                $(".container-mare-modal").css("display", "flex").hide().fadeIn();
                $(".container-mare-modal .text-modal").html(res.msg);
                $(".form-apply-job").trigger('reset');
                $(".btn-apply-job").prop('disabled', false);
                $(".error-form-container").fadeOut();
                setTimeout(function(){
                  $(".error-form-container").html('');
                }, 1000);
                $.fancybox.close(true);
              } else { 
                if(res.error_all){
                  var html_error = '';
                  var erori = res.error_all;
                  for(var key in erori) {
                    html_error += "<div class='error-line'>"+erori[key][0]+"</div>";
                    $(".form-apply-job input[name='"+key+"']").addClass('error-line-input');
                    $(".form-apply-job textarea[name='"+key+"']").addClass('error-line-input');
                    if(key == 'cv'){
                      $(".upload-cv-trick").addClass('error-line-input');
                    }
                  }
                  $(".error-form-container").html(html_error);
                  $(".error-form-container").fadeIn();
                } else{
                   $(".error-form-container").fadeOut();
                   setTimeout(function(){
                     $(".error-form-container").html('');
                   }, 1000);
                   $(".container-mare-modal-error").css("display", "flex").hide().fadeIn();
                   $(".container-mare-modal-error .text-modal").html(res.fail_error);
                }
                $(".btn-apply-job").prop('disabled', false);
              }
          })
          .fail(function(xhr, status, error) {
            if(xhr && xhr.responseJSON && xhr.responseJSON.message && xhr.responseJSON.message.indexOf("CSRF token mismatch") >= 0){
              window.location.reload();
            }
          });
          return;
      });
  
  $(document).on("click", ".btn-edit-profile", function(){
    var element_profile = jQuery.parseJSON($(this).attr('element_profile'));
    $("#container-profiles-account").slideUp();
    $(".container-add-empty").slideUp();
    $(".container-type-of-profiles").hide();
    $(".btn-my-account-add-info.btn-add-new").hide();
    $(".items-top-profile-settings").show().css('display', 'flex');
    $(".btn-cancel-product").css('display', 'flex');
    $(".about-container").slideDown();
    
    var id = element_profile.id;
    var title = element_profile.profile_title;
    var location = element_profile.profile_location;
    var biography = element_profile.biography;
    var filmography = element_profile.filmography;
    var created_at = element_profile.created_at;
    var currency = element_profile.currency;
    var end_fee = element_profile.end_fee;
    var fee = element_profile.fee;
    var files = element_profile.files;
    var general_tags = element_profile.general_tags;
    var inputs = element_profile.inputs;
    var languages = element_profile.languages;
    var other = element_profile.other;
    var photos = element_profile.photos;
    var skill_tags = element_profile.skill_tags;
    var start_fee = element_profile.start_fee;
    var status = element_profile.status;
    var subitem_id = element_profile.subitem_id;
    var updated_at = element_profile.updated_at;
    var user_id = element_profile.user_id;
    var videos = element_profile.videos;
    var youtube_videos = element_profile.youtube_videos;
    
    $(".add_edit_id").val(id);
    
    $('#form-filmography input[name=subitem_id]').val(subitem_id);
    $('#form-biography input[name=subitem_id]').val(subitem_id);
    $('#form-other-information input[name=subitem_id]').val(subitem_id);
    $('#form-informations input[name=subitem_id]').val(subitem_id);
    $('#form-photos input[name=subitem_id]').val(subitem_id);
    $('#form-files input[name=subitem_id]').val(subitem_id);
    $('#form-youtube input[name=subitem_id]').val(subitem_id);
    
     
    $("#form-informations input[name=profile_title]").val(title);
    $("#form-informations input[name=profile_location]").val(location);
    $("#form-informations input[name=fixed_fee]").val(end_fee);
    $("#form-informations input[name=radio_fee][value=" + fee + "]").attr('checked', 'checked');
    $("#form-informations input[name=radio_currency][value=" + currency + "]").attr('checked', 'checked');
    var html_insert = '';
    if(inputs != null){
      for(var b = 0;b<inputs.length;b++){
        if(inputs[b].is_custom_field_added == null){
          html_insert +=
            '<div class="container-input-profile-down input-three-columns">'+
              '<label>'+inputs[b].title+'</label>'+
              '<input type="hidden" name="custom_title[]" class="input-normal-profile" value="'+inputs[b].title+'">'+
              '<input type="hidden" name="custom_description[]" class="input-normal-profile" value="'+inputs[b].description+'">';
          if(inputs[b].value != null){
            html_insert += '<input type="text" name="custom_value[]" class="input-normal-profile" value="'+inputs[b].value+'" placeholder="'+inputs[b].description+'">';
          } else{
            html_insert += '<input type="text" name="custom_value[]" class="input-normal-profile" value="" placeholder="'+inputs[b].description+'">';
          }
          html_insert += '</div>';
        }
      }
      $("#form-informations .container-inputs-three-columns").html(html_insert);
      html_insert = '';
      for(var d = 0;d<inputs.length;d++){
        if(inputs[d].is_custom_field_added == "true"){
            html_insert += 
              '<div class="item-custom-field">'+
                '<div class="item-added-field">'+
                  '<span class="field_title">'+inputs[d].custom_title_added+'</span>: <span class="field_desc">'+inputs[d].custom_value_added+'</span>'+
                '</div>'+
                '<div class="container-delete-img btn-delete-custom-field">'+
                   '<img src="../images/delete_element.png">'+
                '</div>'+
              '</div>';
        }
      }
      $("#form-informations .added-fields-container").html(html_insert);
    }
    
    if(languages != null){
      html_insert = '';
      for(var c = 0;c<languages.length;c++){
        html_insert += 
          '<div class="item-custom-field">'+
            '<div class="item-added-field">'+
              '<span class="field_title">'+languages[c].title+'</span>: <span class="field_desc">'+languages[c].value+'</span>'+
            '</div>'+
            '<div class="container-delete-img btn-delete-custom-field">'+
               '<img src="../images/delete_element.png">'+
            '</div>'+
          '</div>';
      }
      $("#form-informations .languages-container").html(html_insert);
    }
    
    if(photos != null){
      html_insert = '';
      for(var i = 0;i<photos.length;i++){
        html_insert += 
          '<div class="container-box-img file-is-from-server ui-state-default">'+
            '<a href="/storage/'+photos[i]+'" class="content-box-file" data-fancybox="galery">'+
              '<img src="/storage/'+photos[i]+'">'+
            '</a>'+
            '<div img_for_delete="'+photos[i]+'" class="container-delete-img btn-delete-profile-image">'+
              '<img src="../images/delete_element.png">'+
            '</div>'+
          '</div>';
      }
      $("#form-photos .container-files").html(html_insert);
    }
    if(files != null){
      html_insert = '';
      for(var j = 0;j<files.length;j++){

        html_insert +=
          '<div class="container-box-file file-is-from-server" file_path='+files[j].download_link+'>'+
            '<div class="container-box-file-left">'+
              '<img src="../images/folder.png">'+
                '</div><div class="container-box-file-right">'+
                '<div class="container-box-file-title">'+files[j].original_name+'</div>'+
                '<div class="btn-delete-prof-file" file_for_delete="'+files[j].original_name+'">delete</div>'+
            '</div>'+
          '</div>';
      }
      $("#form-files .container-files").html(html_insert);
    }
    if(videos != null){
        html_insert = '';
        for(var k = 0;k<videos.length;k++){

          html_insert +=
            '<div class="container-box-video file-is-from-server" file_path='+videos[k].download_link+'>'+
              '<div class="container-box-file-left">'+
                '<img src="../images/folder.png">'+
                  '</div><div class="container-box-file-right">'+
                  '<div class="container-box-file-title">'+videos[k].original_name+'</div>'+
                  '<div class="btn-delete-prof-video" video_for_delete="'+videos[k].original_name+'">delete</div>'+
              '</div>'+
            '</div>';
        }
        $("#form-videos .container-files").html(html_insert);
    }
    
    if(youtube_videos != null){
      var ylinks = jQuery.parseJSON(youtube_videos);
      var item = {}; // my object
      var data =  []; // my array
      for(var y = 0; y < ylinks.length; y++){
        item = {
          id: ylinks[y],
          text: ylinks[y],
        };
        data.push(item);
        
        var option = new Option(ylinks[y], ylinks[y], true, true);
        $(".select-youtube-links").append(option).trigger('change');
      }  
      $(".select-youtube-links").select2('data', data);
    }
    
    var entire_items = $(".item-menu-profile-settings[subtype_id="+subitem_id+"]").attr('entire_item');
    entire_items = $.parseJSON(entire_items);
    console.log(entire_items);
    var html_input = '';
    if(entire_items != undefined && entire_items != null && entire_items != ''){
      var tags = entire_items.tags;
      var skills = entire_items.skills;
      if(tags != null && tags.length > 0){
        for(var keyt in tags){
          html_input += '<div class="skill-box tag-item" tag_name="'+tags[keyt]+'">#'+tags[keyt]+'</div>';
        }
        if(general_tags != null){
          for(var o = 0; o < general_tags.length; o++){
            if($.inArray(general_tags[o], tags) == -1){
                html_input += '<div class="skill-box tag-item" tag_name="'+general_tags[o]+'">#'+general_tags[o]+'</div>';
             }
          }
        }
        $('#form-informations .container-skills-tags.tags-container').html(html_input);
      } else{
        html_input = '<div class="title-profile-items">No default tags</div>';
        $("#form-informations .container-skills-tags.tags-container").html(html_input);
      }
      html_input = '';
      if(skills != null && skills.length > 0){
        for(var keysk in skills){
          html_input += '<div class="skill-box tag-item" tag_name="'+tags[keysk]+'">'+tags[keysk]+'</div>';
        }
        if(skill_tags != null){
          for(var p = 0; p < skill_tags.length; p++){
            if($.inArray(skill_tags[p], tags) == -1){
                html_input += '<div class="skill-box tag-item" tag_name="'+skill_tags[p]+'">#'+skill_tags[p]+'</div>';
             }
          }
        }
        $('#form-informations .container-skills-tags.sports-container').html(html_input);
      } else{
        html_input = '<div class="title-profile-items">No skill tags</div>';
        $("#form-informations .container-skills-tags.sports-container").html(html_input);
      }
    }
    if(general_tags != null){
      $('#form-informations .tags-container>.skill-box').each(function(){
         var this_tag = $(this).attr('tag_name');
         if($.inArray(this_tag, general_tags) != -1){
            $(this).trigger('click');
         }
      });
    }
    if(skill_tags != null){
      $('#form-informations .sports-container>.skill-box').each(function(){
         var this_tag = $(this).attr('tag_name');
         if($.inArray(this_tag, skill_tags) != -1){
            $(this).trigger('click');
         }
      });
    }
    
    if(filmography != null){
       html_insert = '';
        for(var iii = 0;iii<filmography.length;iii++){
          html_insert += 
            '<div class="box-saved-element-film-bio-other">'+
              '<div class="title-saved-film-bio-other">'+filmography[iii].filmography_title+'</div>'+
              '<div class="text-saved-film-bio-other">'+filmography[iii].filmography_short_description+'</div>'+
              '<div class="container-edit-delete-saved-film-bio-other">'+
                '<div class="box-edit-delete-profile-film-bio-other btn-edit-film-bio-other">'+
                  '<div class="edit-film-bio-other">'+
                   ' <img src="../../images/edit.png">'+
                  '</div>'+
                  '<div class="edit-delete-text-item">Edit</div>'+
                '</div>'+
                '<div class="box-edit-delete-profile-film-bio-other btn-delete-film-bio-other"> '+
                  '<div class="delete-film-bio-other">'+
                    '<img src="../../images/delete_element.png">'+
                  '</div>'+
                  '<div class="edit-delete-text-item">Delete</div>'+
                '</div>'+
              '</div>'+
            '</div>';
        }
      $("#form-filmography .retrieved_data").html(html_insert);
    }
    if(biography != null){
       html_insert = '';
        for(var l = 0;l<biography.length;l++){
          html_insert += 
            '<div class="box-saved-element-film-bio-other">'+
              '<div class="title-saved-film-bio-other">'+biography[l].biography_title+'</div>'+
              '<div class="text-saved-film-bio-other">'+biography[l].biography_short_description+'</div>'+
              '<div class="container-edit-delete-saved-film-bio-other">'+
                '<div class="box-edit-delete-profile-film-bio-other btn-edit-film-bio-other">'+
                  '<div class="edit-film-bio-other">'+
                   ' <img src="../../images/edit.png">'+
                  '</div>'+
                  '<div class="edit-delete-text-item">Edit</div>'+
                '</div>'+
                '<div class="box-edit-delete-profile-film-bio-other btn-delete-film-bio-other"> '+
                  '<div class="delete-film-bio-other">'+
                    '<img src="../../images/delete_element.png">'+
                  '</div>'+
                  '<div class="edit-delete-text-item">Delete</div>'+
                '</div>'+
              '</div>'+
            '</div>';
        }
      $("#form-biography .retrieved_data").html(html_insert);
    }
    if(other != null){
       html_insert = '';
        for(var ii = 0;ii<other.length;ii++){
          html_insert += 
            '<div class="box-saved-element-film-bio-other">'+
              '<div class="title-saved-film-bio-other">'+other[ii].other_title+'</div>'+
              '<div class="text-saved-film-bio-other">'+other[ii].other_short_description+'</div>'+
              '<div class="container-edit-delete-saved-film-bio-other">'+
                '<div class="box-edit-delete-profile-film-bio-other btn-edit-film-bio-other">'+
                  '<div class="edit-film-bio-other">'+
                   ' <img src="../../images/edit.png">'+
                  '</div>'+
                  '<div class="edit-delete-text-item">Edit</div>'+
                '</div>'+
                '<div class="box-edit-delete-profile-film-bio-other btn-delete-film-bio-other"> '+
                  '<div class="delete-film-bio-other">'+
                    '<img src="../../images/delete_element.png">'+
                  '</div>'+
                  '<div class="edit-delete-text-item">Delete</div>'+
                '</div>'+
              '</div>'+
            '</div>';
        }
      $("#form-other-information .retrieved_data").html(html_insert);
    }
    
    $("#form-informations").slideDown();
  });
  
  // detect click on any type or subtype of items
  $(document).on("click", ".btn-edit-item-profile", function(){
     var element_profile = jQuery.parseJSON($(this).attr('element_profile'));
    $("#container-profiles-account").slideUp();
    $(".container-add-empty").slideUp();
    $(".container-type-of-profiles").hide();
    $(".btn-my-account-add-info.btn-add-new").hide();
    $(".btn-cancel-product").css('display', 'flex');
    
    var id = element_profile.id;
    var title = element_profile.profile_title;
    var location = element_profile.profile_location;
    var created_at = element_profile.created_at;
    var currency = element_profile.currency;
    var end_fee = element_profile.end_fee;
    var fee = element_profile.fee;
    var files = element_profile.files;
    var general_tags = element_profile.general_tags;
    var inputs = element_profile.inputs;
    var photos = element_profile.photos;
    var start_fee = element_profile.start_fee;
    var status = element_profile.status;
    var subitem_id = element_profile.subitem_id;
    var updated_at = element_profile.updated_at;
    var user_id = element_profile.user_id;
    var short_description = element_profile.short_description;
    var long_description = element_profile.long_description;
    
    $(".add_edit_id").val(id);
    
    $('#form-items input[name=subitem_id]').val(subitem_id);
    $('#form-items input[name=add_edit_id]').val(id);
    
     
    $("#form-items input[name=check_add_edit]").val("edit");
    $("#form-items input[name=profile_title]").val(title);
    $("#form-items input[name=profile_location]").val(location);
    $("#form-items textarea[name=short_description]").val(short_description);
    $("#form-items textarea[name=long_description]").val(long_description);
    $("#form-items input[name=fixed_fee]").val(end_fee);
    $("#form-items input[name=radio_fee][value=" + fee + "]").attr('checked', 'checked');
    $("#form-items input[name=radio_currency][value=" + currency + "]").attr('checked', 'checked');
    var html_insert = '';
    if(inputs != null){
      for(var b = 0;b<inputs.length;b++){
        if(inputs[b].is_custom_field_added == null){
          html_insert +=
            '<div class="container-input-profile-down input-three-columns">'+
              '<label>'+inputs[b].title+'</label>'+
              '<input type="hidden" name="custom_title[]" class="input-normal-profile" value="'+inputs[b].title+'">'+
              '<input type="hidden" name="custom_description[]" class="input-normal-profile" value="'+inputs[b].description+'">';
          if(inputs[b].value != null){
            html_insert += '<input type="text" name="custom_value[]" class="input-normal-profile" value="'+inputs[b].value+'" placeholder="'+inputs[b].description+'">';
          } else{
            html_insert += '<input type="text" name="custom_value[]" class="input-normal-profile" value="" placeholder="'+inputs[b].description+'">';
          }
          html_insert += '</div>';
        }
      }
      $("#form-items .container-inputs-three-columns").html(html_insert);
      html_insert = '';
      for(var d = 0;d<inputs.length;d++){
        if(inputs[d].is_custom_field_added == "true"){
            html_insert += 
              '<div class="item-custom-field">'+
                '<div class="item-added-field">'+
                  '<span class="field_title">'+inputs[d].custom_title_added+'</span>: <span class="field_desc">'+inputs[d].custom_value_added+'</span>'+
                '</div>'+
                '<div class="container-delete-img btn-delete-custom-field">'+
                   '<img src="../images/delete_element.png">'+
                '</div>'+
              '</div>';
        }
      }
      $("#form-items .added-fields-container").html(html_insert);
    }
    
    if(photos != null){
      html_insert = '';
      for(var i = 0;i<photos.length;i++){
          html_insert += "<div class='img-preview-box-project img-is-from-server' image_path="+photos[i]+" id_file='"+i+"'><div class='over-image-hover'><div class='container-delete-img btn-delete-image'><img src='../images/delete_element.png'/></div></div><img src='storage/"+photos[i]+"'/></div>";
      }
      $("#form-items .container-photos-added").html(html_insert);
    }
    if(files != null){
      html_insert = '';
      for(var j = 0;j<files.length;j++){

        html_insert +=
          '<div class="container-box-file file-is-from-server" file_path='+files[j].download_link+'>'+
            '<div class="container-box-file-left">'+
              '<img src="../images/folder.png">'+
                '</div><div class="container-box-file-right">'+
                '<div class="container-box-file-title">'+files[j].original_name+'</div>'+
                '<div class="btn-delete-prof-file" file_for_delete="'+files[j].original_name+'">delete</div>'+
            '</div>'+
          '</div>';
      }
      $("#form-items .container-files-added").html(html_insert);
    }
    
    if($("#form-items .img-is-from-server").length > 0){
      var images_from_server = [];
      $("#form-items .img-is-from-server").each(function(){
        var img_path = $(this).attr('image_path');
        images_from_server.push(img_path);
      });
      var images_from_server_input = "<input type='hidden' name='images_from_server' class='images-from-server'/>";
      $("#form-items").append(images_from_server_input);
      $("#form-items .images-from-server").val(images_from_server);
    }
    if($("#form-items .file-is-from-server").length > 0){
      var files_from_server = [];
      $("#form-items .file-is-from-server").each(function(){
        var file_path = $(this).attr('file_path');
        files_from_server.push(file_path);
      });
      var files_from_server_input = "<input type='hidden' name='files_from_server' class='files-from-server'/>";
      $("#form-items").append(files_from_server_input);
      $("#form-items .files-from-server").val(files_from_server);
    }
    
    var entire_items = $(".item-menu-profile-settings[subtype_id="+subitem_id+"]").attr('entire_item');
    entire_items = $.parseJSON(entire_items);
    var html_input = '';
    if(entire_items != undefined && entire_items != null && entire_items != ''){
      var tags = entire_items.tags;
      if(tags != null && tags.length > 0){
        for(var keyt in tags){
          html_input += '<div class="skill-box tag-item" tag_name="'+tags[keyt]+'">#'+tags[keyt]+'</div>';
        }
        if(general_tags != null){
          for(var o = 0; o < general_tags.length; o++){
            if($.inArray(general_tags[o], tags) == -1){
                html_input += '<div class="skill-box tag-item" tag_name="'+general_tags[o]+'">#'+general_tags[o]+'</div>';
             }
          }
        }
        $('#form-items .container-skills-tags.tags-container').html(html_input);
      } else{
        html_input = '<div class="title-profile-items">No default tags</div>';
        $("#form-items .container-skills-tags.tags-container").html(html_input);
      }
    }
    if(general_tags != null){
      $('#form-items .tags-container>.skill-box').each(function(){
         var this_tag = $(this).attr('tag_name');
         if($.inArray(this_tag, general_tags) != -1){
            $(this).trigger('click');
         }
      });
    }
    $("#form-items").slideDown();
  });
  
  $(".jobs-listing .category-item").click(function(){
    if($(this).hasClass('active-category')){
      $(this).removeClass('active-category');
      $(".jobs-listing .item-page-box-container").show();
    } else{
      $(".jobs-listing .category-item").removeClass('active-category');
      $(this).addClass('active-category');
      var filter_name = $(this).attr("tag_name");
      var item_filters;
      $(".jobs-listing .item-page-box-container").hide();
      $(".jobs-listing .item-page-box-container[filter_params*='"+filter_name+"']").show();
    }
  });
  $(".profiles-listing .category-item").click(function(){
    if($(this).hasClass('active-category')){
      $(this).removeClass('active-category');
      $(".profiles-listing .item-page-box-container").show();
    } else{
      $(".profiles-listing .category-item").removeClass('active-category');
      $(this).addClass('active-category');
      var filter_name = $(this).attr("tag_name");
      var item_filters;
      $(".profiles-listing .item-page-box-container").hide();
      $(".profiles-listing .item-page-box-container[filter_params*='"+filter_name+"']").show();
    }
  });
  
});