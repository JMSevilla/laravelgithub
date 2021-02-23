<div class="container-right-account">
    <div class="titlu-right-account-container">
      <div class="titlu-right-account">
        My jobs
      </div>
      <div class="container-btns-right-top">
        <div class="custom-btn btn-albastru btn-cancel-normal btn-cancel-product">Cancel</div>
        <div class="btn-my-account-add-info btn-new-job"><i class="fa fa-plus fa-plus-img"></i>Add new job</div>
      </div>
  </div>
<!--   <div class="container-top-profile-user">
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
  </div> -->
  <form class="container-down-profile-user product-edit-container container-edit-add-job" id="form-job" action='{{ action("JobController@addJob") }}' action_edit='{{ action("JobController@editJob") }}' method="post">
      {{csrf_field()}}
      <input type="hidden" name="check_edit_or_add" value="add"/>
      <input type="hidden" name="job_id"/>
      <div class="container-inputs-form-profile">
        <div class="container-down-profile-left">
          <div class="container-input-profile-down container-input-down-full">
            <label label_text="{{__('statics.job_title')}}">{{__('statics.job_title')}}</label>
            <input type="text" name="job_title" class="input-normal-profile">
          </div>
          <div class="container-input-profile-down container-input-down-full">
            <label label_text="{{__('statics.job_location')}}">{{__('statics.job_location')}}</label>
            <input id="pac-input" type="text" name="job_location" class="input-normal-profile">
            <div id="map" style="display: none !important"></div>
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
          <div class="container-slider-price-range project-input-box">
            <input type="text" min="0" max="1000000" value="0,0" name="points" step="100" style="display: none;" class="range-price" />
          </div>
          <div class="container-fees-profile">
            <div class="title-profile-items" div_text="{{__('statics.select_currency')}}">{{__('statics.select_currency')}}</div>
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
            <label label_text="{{__('statics.job_description')}}">{{__('statics.job_description')}}</label>
            <textarea type="text" name="job_description" class="input-normal-profile textarea-normal-profile textarea-long"></textarea>
          </div>
        </div>
        <div class="container-down-profile-right">
          <div class="container-skills-profile">
            <div class="title-label-project input_tags" div_text="{{__('statics.target_people')}}">{{__('statics.target_people')}}</div>
            <div class="container-skills-tags tags-container">
              @foreach($tags as $tag)
                <div class="skill-box tag-item " tag_name="{{$tag->name}}" tag_id="{{$tag->id}}">{{$tag->name}}</div>
              @endforeach
              @if($personal_tags)
                @foreach($personal_tags as $pers_tag)
                  <div class="skill-box personal-tag " tag_name="{{$pers_tag->tag}}" tag_id="{{$pers_tag->id}}">{{$pers_tag->tag}}</div>
                @endforeach
              @endif
              <input name="input_tags" style="display: none;" />
              <input name="input_personal_tags" style="display: none;" />
            </div>
            <div class="add-new-skill-tag">
              <input class="new-skill-tag" placeholder="New tag"/>
              <div class="btn-add-skill btn-new-tag"><img src="../../images/plus.png"/></div>
            </div>
          </div>
          <div class="line-form-project">
            <div class="project-input-box project-input-box-full">
              <div class="title-label-project title-label-project-no-margin uploaded_photos" div_text="{{__('statics.add_photos')}}">{{__('statics.add_photos')}}</div>
              <div class="input-file-upload-container">
                <div class="container-file-left">
                  <input class="photos-files" type="file" name="uploaded_photos[]" style="display: none" multiple="true"/>
                  <input class="input-form-project-popup add-photos-trick" placeholder="{{__('statics.job_photos')}}" readonly type="text"/>
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
      </div>
      <button class="custom-btn btn-albastru btn-save-changes btn-add-edit-job" type="button">{{__('statics.save_changes_title')}}</button>
   </form>
  <div class="container-down-profile-user products-list-container" id="container-job">
        <div class="container-products-listing">
      @if($jobs != null && count($jobs) > 0)
        @foreach($jobs as $job)
          <div class="item-page-box-container product-box-items">
            <div class="swiper-container container-image-box-item">
               <div class="swiper-wrapper">
                 @foreach($job->photos as $photo)
                  <div class="swiper-slide swiper-slide-item"><img src="{{Voyager::image($photo)}}" /></div>
                 @endforeach
               </div><!-- Add Pagination -->
               <div class="swiper-pagination"></div>
            </div>
<!--             <div class="container-image-box-item container-img-product-list">
              <img src="{{Voyager::image($job->photos[0])}}"/>
            </div> -->
            <div class="content-box-listing-pagina item-box-context-full">
              <div class="date-joined-item-box">{{$job->location}}</div>
              <div class="box-item-container-title">
                <div class="box-item-title box-title-black">{{$job->title}}</div>
              </div>
              <div class="container-product-edit-delete">
                  <div class="action-element-project-box-over edit-project btn-edit-job">
                    <input type="hidden" name="job_id" value="{{$job->id}}" />
                    <input type="hidden" name="job_title" value="{{$job->title}}" />
                    <input type="hidden" name="job_location" value="{{$job->location}}" />
                    <input type="hidden" name="job_description" value="{{$job->description}}" />
                    <input type="hidden" name="fixed_fee" value="{{$job->fixed_fee}}" />
                    <input type="hidden" name="start_fee" value="{{$job->start_fee}}" />
                    <input type="hidden" name="end_fee" value="{{$job->end_fee}}" />
                    <input type="hidden" name="currency" value="{{$job->currency}}" />
                    <input type="hidden" name="tags" value="{{json_encode($job->tags)}}" />
                    <input type="hidden" name="photos" value="{{json_encode($job->photos)}}" />
                    <input type="hidden" name="files" value="{{json_encode($job->files)}}" />
                    <div class="btn-project-box-over edit-project-icon">
                      <img src="../images/edit_lines.png">
                    </div>
                    <div class="text-btn-over-project-box">{{__('statics.edit_simple')}}</div>
                  </div>
                  <div class="trick-delete-job" job_id="{{$job->id}}" >
                    <div class="action-element-project-box-over btn-delete-product">
                      <div class="btn-project-box-over delete-project">
                        <img src="../images/delete_element.png">
                      </div>
                      <div class="text-btn-over-project-box">{{__('statics.delete_simple')}}</div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        @endforeach
        <form style="display: none;" class="form-delete-job" action="{{action('JobController@deleteJob')}}" method="POST">
          {{csrf_field()}}
          <input name="job_id" type="hidden">
          <button class="btn-delete-job"></button>
        </form>
      @else
        <div class="container-add-empty">
          <div class="add-container-box">
            <div class="add-icon"><img src="../images/addjob3.png"/></div>
            <div class="add-title">Add a job</div>
            <div class="add-text">You can post jobs and tag profiles and users with the same interests.</div>
          </div>
          <div class="add-container-box">
            <div class="add-icon"><img src="../images/addjob2.png"/></div>
            <div class="add-title">Add a project job</div>
            <div class="add-text">Please add your job first, and after you can add the project and assign jobs.</div>
          </div>
          <div class="add-container-box">
            <div class="add-icon"><img src="../images/addjob1.png"/></div>
            <div class="add-title">Manage jobs</div>
            <div class="add-text">You can always manage your jobs, edit, delete and add more.</div>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@push('styles')
  <link rel="stylesheet" href="css/asRange.css">
@endpush
@push('scripts')
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
      $(".btn-new-job").click(function(){
        $(this).hide();
        $(".products-list-container").hide();
        $(".product-edit-container").fadeIn();
        $(".btn-cancel-product").css('display', 'flex');
        $("#form-job").trigger('reset');
        $(".tag-item").removeClass('skill-box-active');
        $(".container-files-added").html('');
        $(".container-photos-added").html('');
        $("input[name=check_edit_or_add]").val('add');
      });
      $(".btn-cancel-product").click(function(){
        $(this).hide();
        $(".product-edit-container").hide();
        $(".products-list-container").fadeIn();
        $(".btn-new-job").show();
        $("input[name=check_edit_or_add]").val('edit');
      });
    });
  </script>
@endpush