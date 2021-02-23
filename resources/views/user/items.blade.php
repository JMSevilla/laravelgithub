<div class="container-right-account">
    <div class="titlu-right-account-container">
      <div class="titlu-right-account">{{__('statics.my_items_title')}}</div>
      <div class="container-btns-right-top">
        <div class="custom-btn btn-albastru btn-cancel-normal btn-cancel-product">{{__('statics.cancel_title')}}</div>
        <div class="custom-btn btn-new-product item-job-colored-status btn-new-job"><i class="fa fa-plus fa-plus-img"></i>{{__('statics.add_an_item')}}</div>
      </div>
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
        <div class="location-profile-details @if(Session::get('user')['location'] == null)trigger-location @endif">
          @if(Session::get('user')['location'] != null) 
            {{Session::get('user')['location']}} 
          @else 
            <a href="/user/main_profile">{{__('statics.set_location')}}</a> 
          @endif
        </div>
        <div class="usertype-profile-details">{{Session::get('user')['usertype']}}</div>
      </div>
    </div>
  </div>
  <div class="container-down-profile-user product-edit-container">
    <div class="container-inputs-form-profile">
      <div class="container-down-profile-left">
        <div class="title-profile-items title-margin-lite">{{__('statics.add_an_item')}}</div>
        <div class="text-normal-page-profile">{{__('statics.add_item_desc')}}</div>
        <div class="container-skills-profile">
          <div class="title-profile-items">{{__('statics.select_category')}}</div>
          <div class="container-skills-tags tags-container">
            <div class="skill-box tag-item skill-box-active">Artefacts</div>
            <div class="skill-box tag-item">Animals</div>
            <div class="skill-box tag-item">Places</div>
            <div class="skill-box tag-item">Boats</div>
            <div class="skill-box tag-item">Costumes</div>
            <div class="skill-box tag-item">Vehicules</div>
            <div class="skill-box tag-item">Arms</div>
            <div class="skill-box tag-item">Pets</div>
            <div class="skill-box tag-item">Kids</div>
            <div class="skill-box tag-item">Equipment</div>
          </div>
          <div class="add-new-skill-tag">
            <input class="new-skill-tag" placeholder="New tag"/>
            <div class="btn-add-skill btn-new-tag"><img src="../../images/plus.png"/></div>
          </div>
        </div>
        
        <div class="title-profile-items">{{__('statics.general_information')}}</div>
        <div class="container-input-profile-down">
          <label>{{__('statics.product_name')}}</label>
          <input type="text" name="product_name" class="input-normal-profile" placeholder="{{__('statics.type_product_name')}}" value="Panavision MKT"/>
        </div>
        <div class="container-input-profile-down">
          <label>{{__('statics.product_model')}}</label>
          <input type="text" name="product_model" class="input-normal-profile" placeholder="{{__('statics.product_model')}}" value="Planfilm 40 mm"/>
        </div>
        <div class="container-input-profile-down">
          <label>{{__('statics.product_year')}}</label>
          <input type="text" name="product_year" class="input-normal-profile" placeholder="{{__('statics.type_product_year')}}" value="1989"/>
        </div>
        <div class="container-input-profile-down">
          <label>{{__('statics.product_new')}}?</label>
          <select class="input-normal-profile select-normal-items" name="product_usage">
            <option value="">New</option>
            <option value="">Second hand</option>
          </select>
<!--           <input type="text" name="location" class="input-normal-profile" placeholder="Type your location"/> -->
        </div>
        <div class="container-input-profile-down">
          <label>{{__('statics.location_simple')}}</label>
          <input type="text" name="product_location" class="input-normal-profile" placeholder="{{__('statics.type_location')}}" value="Constanta, Romania"/>
        </div>
        <div class="container-input-profile-down">
          <label>{{__('statics.minimum_rent_period')}}</label>
          <input type="text" name="product_minium_rent" class="input-normal-profile input-minium-req" placeholder="{{__('statics.type_minimum_rent_period')}}" value="2 weeks"/>
        </div>
        
        <div class="custom-fields-container">
          <div class="title-profile-items title-margin-lite">{{__('statics.my_custom_fields')}}</div>
          <div class="container-add-custom-fields">
            <input type="text" name="custom_title" class="input-normal-profile custom-field-input-title" placeholder="{{__('statics.field_title')}}"/>
            <input type="text" name="custom_description" class="input-normal-profile custom-field-input-description" placeholder="{{__('statics.description_simple')}}"/>
            <div class="btn-add-custom-field"><img src="../../images/plus.png"/></div>
          </div>
          <div class="my-custom-fields-container">
            <div class="item-custom-field">
              <span>Tall: midget</span>
              <div class='container-delete-img btn-delete-custom-field'><img src='../images/delete_element.png'/></div>
            </div>
          </div>
        </div>
        
        <div class="line-form-project">
          <div class="project-input-box project-input-box-full">
            <div class="title-label-project title-label-project-no-margin">{{__('statics.add_files')}}</div>
            <div class="input-file-upload-container">
              <div class="container-file-left">
                <input class="file-input-project" type="file" style="display: none"/>
                <input class="input-form-project-popup file-name" placeholder="File name" type="text"/>
                <div class="add-file"><img src="../images/plus.png"/></div>
              </div>
              <div class="custom-btn btn-albastru btn-add-file">{{__('statics.add_file')}}</div>
            </div>
          </div>
        </div>
          <div class="line-form-project">
            <div class="container-files-added">
              
              <div class="container-box-file">
                <div class="container-box-file-left">
                  <img src="../images/folder.png" />
                </div>
                <div class="container-box-file-right">
                  <div class="container-box-file-title">Name of file</div>
                  <div class="btn-delete-file-box">{{__('statics.delete')}}</div>
                </div>
              </div>
              <div class="container-box-file">
                <div class="container-box-file-left">
                  <img src="../images/folder.png" />
                </div>
                <div class="container-box-file-right">
                  <div class="container-box-file-title">Name of file</div>
                  <div class="btn-delete-file-box">{{__('statics.delete')}}</div>
                </div>
              </div>
              <div class="container-box-file">
                <div class="container-box-file-left">
                  <img src="../images/folder.png" />
                </div>
                <div class="container-box-file-right">
                  <div class="container-box-file-title">Name of file</div>
                  <div class="btn-delete-file-box">{{__('statics.delete')}}</div>
                </div>
              </div>
              
            </div>
          </div>
      </div>
      <div class="container-down-profile-right">
        <div class="line-form-project">
          <div class="project-input-box project-input-box-full">
            <div class="title-label-project title-label-project-no-margin">{{__('statics.add_photos')}}</div>
            <div class="input-file-upload-container">
              <div class="container-file-left">
                <input class="photos-files" type="file" style="display: none" multiple="true"/>
                <input class="input-form-project-popup add-photos-trick" placeholder="{{__('statics.project_photos')}}" readonly type="text"/>
                <div class="add-file-photos"><img src="../images/plus.png"/></div>
              </div>
            </div>
          </div>
        </div>
        <div class="line-form-project">
          <div class="project-input-box project-input-box-full container-photos-added"></div>
        </div>
        <div class="container-fees-profile">
          <div class="title-profile-items">{{__('statics.select_fixed_fee')}}</div>
          <div class="container-radios">
            <label class="container-custom-radio">{{__('statics.hourly_fee')}}
              <input type="radio" name="radio-fee" checked>
              <span class="checkmark-custom-radio"></span>
            </label>
            <label class="container-custom-radio">{{__('statics.daily_fee')}}
              <input type="radio" name="radio-fee">
              <span class="checkmark-custom-radio"></span>
            </label>
          </div>
          <input type="hidden" name="hour_day_fee" class="input-normal-profile input-small-fee-amount" placeholder="{{__('statics.enter_fee')}}"/>
        </div>
        <div class="container-slider-price-range project-input-box">
          <input type="text" min="0" max="1000000" value="0,0" name="points" step="100" style="display: none;" class="range-price" />
        </div>
        <div class="container-fees-profile">
          <div class="title-profile-items">{{__('statics.select_currency')}}</div>
          <div class="container-radios">
            <label class="container-custom-radio">Dollars
              <input type="radio" name="radio-currency" value="dollar" checked>
              <span class="checkmark-custom-radio"></span>
            </label>
            <label class="container-custom-radio">Euro
              <input type="radio" name="radio-currency" value="euro">
              <span class="checkmark-custom-radio"></span>
            </label>
          </div>
        </div>
        <div class="container-input-profile-down container-input-down-full">
          <label>{{__('statics.short_description')}}</label>
          <textarea type="text" name="short_description" class="input-normal-profile textarea-normal-profile"></textarea>
        </div>
        <div class="container-input-profile-down container-input-down-full">
          <label>{{__('statics.long_description')}}</label>
          <textarea type="text" name="long_description" class="input-normal-profile textarea-normal-profile textarea-long"></textarea>
        </div>
      </div>
    </div>
    
  </div>
  <div class="container-down-profile-user products-list-container">
    @include('user.listing_items')
  </div>
</div>
@push('styles')
  <link rel="stylesheet" href="css/asRange.css">
@endpush
@push('scripts')
<script src="js/jquery-asRange.js" type="text/javascript"></script>
  <script>
    $(document).ready(function(){
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
      $(".item-menu-profile-detail").click(function(){
        var container_shown = $(this).attr('container');
        container_shown = "."+container_shown;
        if(!$(this).hasClass('active-item-menu-profile-detail')){
          $(".item-menu-profile-detail").removeClass("active-item-menu-profile-detail");
          $(this).addClass('active-item-menu-profile-detail');
          $(".container-down-profile-user").slideUp();
          $(container_shown).slideDown();
        }
      });
      $(".input-upload-docs").click(function(){
        $(".upload-file-prove").trigger("click");
      });
      $(".box-upload-file-trick").click(function(){
        $(".upload-file-prove").trigger("click");
      });
      $(".btn-add-custom-field").click(function(){
        if($(".custom-field-input-title").val().length === 0 || $(".custom-field-input-description").val().length === 0){
           alert("Please complete title and description for adding new custom field!");
        } else{
          var html_for_insert = "<div class='item-custom-field'><span>"+$(".custom-field-input-title").val()+": "+$(".custom-field-input-description").val()+"</span><div class='container-delete-img btn-delete-custom-field'><img src='../images/delete_element.png'/></div></div>";
          $(".my-custom-fields-container").append(html_for_insert);
          $(".custom-field-input-title").val('');
          $(".custom-field-input-description").val('');
        }
      });
      $(document).on('click', ".btn-delete-custom-field", function(){
        if(confirm("{{__('statics.delete_file_title')}}?")){
        $(this).parent().fadeOut(300, function() { $(this).remove(); });
          return;
        } else{
          return;
        }
      });
      $(document).on('click', ".btn-delete-film-bio-other", function(){
        if(confirm("{{__('statics.delete_file_title')}}?")){
        $(this).parent().parent().fadeOut(300, function() { $(this).remove(); });
          return;
        } else{
          return;
        }
      });
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
                    '<div class="edit-delete-text-item">{{__("statics.delete_simple")}}</div>'+
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
      });
      $(".btn-add-skill").click(function(){
        if($(this).hasClass("btn-new-tag")){
          var tag = $(this).parent().find($(".new-skill-tag")).val();
          if(tag.length === 0){
            alert("{{__('statics.add_text_tag')}}!");
          } else{
            var html_tag = '<div class="skill-box tag-item skill-box-active">'+tag+'</div>';
            $(".tags-container").append(html_tag);
            $(this).parent().find($(".new-skill-tag")).val('');
          }
        } else{
          var sport = $(this).parent().find($(".new-skill-sport")).val();
          if(sport.length === 0){
            alert("{{__('statics.add_text_sport_tag')}}!");
          } else{
            var html_sport = '<div class="skill-box sport-item skill-box-active">'+sport+'</div>';
            $(".sports-container").append(html_sport);
            $(this).parent().find($(".new-skill-sport")).val('');
          }
        }
      });
    $(".add-file").click(function(){
      var file_name = $(this).parent().find($(".file-name")).val();
      if(file_name.length === 0){
        alert("{{__('statics.enter_file_name')}}!");
      } else{
        $(".file-input-project").trigger('click');
      }
    });
      $(".file-input-project").on('change', function(){
        var file_name = $(this).parent().find($(".file-name")).val();
        if(file_name.length === 0){
          alert("{{__('statics.enter_file_name')}}!");
        } else{
          var html_insert = 
                '<div class="container-box-file">'+
                  '<div class="container-box-file-left">'+
                    '<img src="../images/folder.png" />'+
                  '</div>'+
                  '<div class="container-box-file-right">'+
                    '<div class="container-box-file-title">'+file_name+'</div>'+
                    '<div class="btn-delete-file-box">delete</div>'+
                  '</div>'+
                '</div>';
          $(".container-files-added").append(html_insert);
          $(this).parent().find($(".file-name")).val('');
        }
      });
      $(document).on('click', '.btn-delete-file-box', function(){
        if(confirm("{{__('statics.delete_file_title')}}?")){
          $(this).parent().parent().fadeOut(300, function() { $(this).remove(); });
          event.stopPropagation();
          return;
        } else{
          event.stopPropagation();
          return;
        }
      });
      
      $("input[name=radio-currency]").on('change', function() {
          var symbol_slider = '$';
          if($(this).val() == 'euro'){
            symbol_slider = "&euro;";
          } 
          var val_current = $("span.asRange-tip").html().split(" ")[1];
          $("span.asRange-tip").html(symbol_slider+" "+val_current);
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
        $(".photos-files").trigger('click');
      });
      $(".add-file-photos").click(function(){
        $(".photos-files").trigger('click');
      });
      $('.photos-files').on('change', function() {
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
      $(".btn-edit-product").click(function(){
        $(".products-list-container").hide();
        $(".product-edit-container").fadeIn();
        $(".btn-cancel-product").css('display', 'flex');
      });
      $(".btn-new-product").click(function(){
        $(this).hide();
        $(".products-list-container").hide();
        $(".product-edit-container").fadeIn();
        $(".btn-cancel-product").css('display', 'flex');
      });
      $(".btn-cancel-product").click(function(){
        $(this).hide();
        $(".product-edit-container").hide();
        $(".products-list-container").fadeIn();
        $(".btn-new-product").css('display', 'flex');
      });
    });
  </script>
@endpush