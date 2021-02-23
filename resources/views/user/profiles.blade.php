<div class="container-right-account profile-settings-container">
  <div class="titlu-right-account-container">
      <div class="titlu-right-account">
        My profiles
      </div>
      <div class="container-menu-profile container-items-profile-top items-top-profile-settings">
        <div class="item-menu-profile-detail active-item-menu-profile-detail" container="about-container">Informations</div>
        <div class="item-menu-profile-detail item-menu-profile-detail-big" container="filmography-container">Filmography</div>
        <div class="item-menu-profile-detail item-menu-profile-detail-big" container="biography-container">Biography</div>
        <div class="item-menu-profile-detail" container="files-container">Files & Videos</div>
        <div class="item-menu-profile-detail" container="photos-container">Photos</div>
<!--         <div class="item-menu-profile-detail" container="skills-container">Skills & Fees</div> -->
        <div class="item-menu-profile-detail" container="other-information-container">Other info</div>
        <input type="hidden" name="add_edit_id" class="add_edit_id"/>
      </div>
      <div class="container-menu-profile container-items-profile-top container-type-of-profiles">
        @foreach($profiles_count as $key => $profile_subtype)
          @if($profile_subtype['subtype_value'] != -1)
            <div class="container-subitems-top-profiles-listing">
              <div class="item-menu-profile-settings" subtype_id="{{$profile_subtype['subtype_id']}}" subtype_name="{{$profile_subtype['name']}}" entire_item="{{json_encode($profile_subtype)}}">
                {{$profile_subtype['name']}}
                @if($profile_subtype['children'])
                  <i class="fa fa-angle-down img-arrow-down" aria-hidden="true"></i>
                @endif
                @if($profile_subtype['children'])
                  <div class="container-dropdown-listing" container_parent_id="{{$profile_subtype['id']}}">
                      @include('parts.children', ['profile_subtype' => $profile_subtype, 'parent_id' => $profile_subtype['subtype_id']])
                  </div>
                @endif
              </div>
            </div>
          @endif
        @endforeach
      </div>
      <div class="custom-btn btn-albastru btn-cancel-normal btn-cancel-product">Close</div>
      <div class="custom-btn btn-albastru btn-cancel-normal btn-cancel-item">Close</div>
      <div class="btn-my-account-add-info btn-add-new"><i class="fa fa-plus fa-plus-img" subtype_name="{{$profiles_count[0]['name']}}"></i>Add new<span> {{$profiles_count[0]['name']}}</span></div>
  </div>
  @if(count($profiles) <= 0)
  <?php $userHasRoleItem = false ?>
  <div class="container-add-empty container-add-empty-profile container-normal-subitems">
    <?php $vocals = array('a','e','i','o','u'); $count=0;?>
    @foreach($profiles_count as $key => $prof_count)
      <div class="add-container-box" data-aos="zoom-in-right" data-aos-delay="{{$count*250}}">
        <div class="add-icon"><img @if($prof_count['icon'] != null) src="{{Voyager::image($prof_count['icon'])}}" @else src="images/icon_unavailable.png" @endif/></div>
        <div class="add-title">
          @if($prof_count['subtype_value'] == -1) 
            {{__('statics.search_for')}} {{$prof_count['name']}}
          @elseif($prof_count['subtype_value'] == null) 
            {{__('statics.add_simple')}}<span style="color: #5271FF"> {{__('statics.unlimited')}}</span> {{$prof_count['name']}}
          @elseif(ctype_alpha($prof_count['name']) && in_array($prof_count['name']{0}, $vocals))
            {{__('statics.add_a')}} {{$prof_count['name']}}
          @else
            {{__('statics.add_an')}} {{$prof_count['name']}}
          @endif
        </div>
        <div class="add-text">@if($prof_count['description'] != null) {{$prof_count['description']}} @else {{__('statics.description_unavailable')}} @endif</div>
        @if($prof_count['subtype_value'] != -1) 
          <div element_name="{{$prof_count['name']}}" class="add-btn btn-new-job">{{__('statics.add')}}</div>
        @endif
         @if($prof_count['name'] == 'item')
          <?php $userHasRoleItem = true ?>
        @endif
      </div>
    <?php $count++ ?>
    @endforeach
  </div>
  
    @if($userHasRoleItem)
        <div class="container-add-empty container-add-empty-profile container-subitems-listed">
          <?php $vocals = array('a','e','i','o','u'); $count=0;?>
          @foreach($subitems as $key => $item)
            <div class="add-container-box" data-aos="zoom-in-right" data-aos-delay="{{$count*250}}">
              <div class="add-icon"><img @if($item['icon'] != null) src="{{Voyager::image($item['icon'])}}" @else src="images/icon_unavailable.png" @endif/></div>
              <div class="add-title">{{__('statics.add_simple')}} {{strtolower($item->name)}}</div>
              <div class="add-text">@if($item['description'] != null) {{$item['description']}} @else {{__('statics.description_unavailable')}} @endif</div>
              <div element_name="{{$item['name']}}" subitem_id="{{$item['id']}}" entire_item="{{json_encode($item)}}" class="add-btn-item btn-new-item">{{__('statics.add')}}</div>
            </div>
          <?php $count++ ?>
          @endforeach
        </div>
    @endif
  @else
    <div class="container-listare-elemente-pagina" id="container-profiles-account">
      <div class="loading-page"></div>
      @foreach($profiles as $profile)
          <div class="item-page-box-container product-box-items profile-box-item @if($profile->status == 0 || $profile->status == 2) tooltip @endif"  subitem_id="{{$profile->subitem_id}}" @if($profile->status == 0 || $profile->status == 2) @if($profile->reason == null) title="{{__('statics.tooltip_profiles')}}" @else title="{{$profile->reason}}" @endif @endif>
            @if($profile->status == 0 || $profile->status == 2) <div class="project-status project-upcoming">@if($profile->status == 0) {{__('statics.profile_not_accepted')}} @else {{__('statics.profile_rejected')}} @endif</div> @endif
            <div class="swiper-container container-image-box-item">
               <div class="swiper-wrapper">
                 @if($profile->photos != null && count($profile->photos) > 0)
                   @foreach($profile->photos as $photo)
                    <div class="swiper-slide swiper-slide-item"><img src="{{Voyager::image($photo)}}" /></div>
                   @endforeach
                 @else
                    <div class="swiper-slide swiper-slide-item"><img src="images/unavailable.png" /></div>
                 @endif
               </div>
               <div class="swiper-pagination"></div>
            </div>
            <div class="content-box-listing-pagina item-box-context-full">
              <div class="date-joined-item-box">@if($profile->profile_location != null) {{$profile->profile_location}} @else {{__('statics.location_unavailable')}} @endif</div>
              <div class="box-item-container-title">
                <div class="box-item-title box-title-black">@if($profile->profile_title != null) {{$profile->profile_title}} @else {{__('statics.title_unavailable')}} @endif</div>
              </div>
              <div class="container-product-edit-delete">
                  @if($profile->short_description != null && $profile->long_description != null)
                    <div class="action-element-project-box-over edit-profile listing-profile-box btn-edit-item-profile" element_profile="{{$profile}}">
                  @else
                    <div class="action-element-project-box-over edit-profile listing-profile-box btn-edit-profile" element_profile="{{$profile}}">
                  @endif
                    <input type="hidden" name="profile_id" value="{{$profile->id}}" />
                    <input type="hidden" name="profile_title" value="{{$profile->profile_title}}" />
                    <input type="hidden" name="profile_location" value="{{$profile->profile_location}}" />
                    <input type="hidden" name="start_fee" value="{{$profile->start_fee}}" />
                    <input type="hidden" name="end_fee" value="{{$profile->end_fee}}" />
                    <input type="hidden" name="currency" value="{{$profile->currency}}" />
                    <input type="hidden" name="general_tags" value="{{json_encode($profile->general_tags)}}" />
                    <input type="hidden" name="skill_tags" value="{{json_encode($profile->skill_tags)}}" />
                    <input type="hidden" name="photos" value="{{json_encode($profile->photos)}}" />
                    <input type="hidden" name="files" value="{{json_encode($profile->files)}}" />
                    <input type="hidden" name="videos" value="{{json_encode($profile->videos)}}" />
                    <input type="hidden" name="filmography" value="{{json_encode($profile->filmography)}}" />
                    <input type="hidden" name="biography" value="{{json_encode($profile->biography)}}" />
                    <input type="hidden" name="other" value="{{json_encode($profile->other)}}" />
                    <div class="btn-project-box-over edit-profile-icon">
                      <img src="../images/edit_lines.png">
                    </div>
                    <div class="text-btn-over-project-box">{{__('statics.edit_simple')}}</div>
                  </div>
                  <div class="trick-delete-profile" profile_id="{{$profile->id}}" >
                    <div class="action-element-project-box-over btn-delete-profile">
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
        <form style="display: none;" class="form-delete-profile" action="{{action('ProfileController@deleteProfile')}}" method="POST">
          {{csrf_field()}}
          <input name="profile_id" type="hidden">
          <button class="btn-delete-profile"></button>
        </form>

    </div>
  @endif

  @include('parts.my_profile_tabs')
  @if(!in_array(Session::get('user')['usertype'], ['User', 'Benutzer']))
    @include('parts.my_profile_jobs')
    @include('parts.my_profile_projects')
  @endif
  @include('parts.actors_listing')
  @include('parts.animals_listing')
  @include('parts.crew_listing')

</div>
@push('styles')
  <link rel="stylesheet" href="css/asRange.css">
@endpush
@push('scripts')
<script src="js/jquery-asRange.js" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      AOS.init();
    });
  </script>
@endpush