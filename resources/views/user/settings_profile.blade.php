<div class="container-right-account">
    <div class="titlu-right-account-container">
      <div class="container-top-profile-user">
        <div class="container-left-user-settings" data-aos="zoom-in-right">
          <div class="user-logo-edit">
             @if(Session::has('user') && !empty($avatar))
                <img class="user-logo-profile" src="{{Voyager::image($avatar)}}"/>
              @else
                <img class="user-logo-profile" src="../../images/user_empty.png"/>
              @endif
            <div class="edit-settings-user edit-user-empty btn-edit-profile-pic">
              <img src="../../images/plus.png"/>
            </div>
          </div>
          <div class="container-details-user-profile">
            <a href="user/main_profile" class="username-profile-details">{{__('statics.hello_simple')}} {{Session::get('user')['name']}}, {{__('statics.welcome_title')}}</a>
            @if(count($profile_videos) > 0 || count($profile_youtube_videos) > 0)
             <a data-fancybox="galleryVideoHowToUse" @if(count($profile_videos) > 0) href="{{Voyager::image($profile_videos[0])}}" @elseif(count($profile_youtube_videos) > 0) href="{{Voyager::image($profile_youtube_videos[0])}}" @endif class="usertype-profile-details">{{__('statics.movecircle_intro')}}</a>  
            @endif
            @if(count($profile_videos) > 0)
               @foreach($profile_videos as $key => $vid)
                  @if($key > 0)
                    <a style="display: none;" href="{{Voyager::image($vid)}}" class="content-box-file" data-fancybox="galleryVideoHowToUse"></a>
                  @endif
               @endforeach
            @endif
            @if(count($profile_youtube_videos) > 0)
               @foreach($profile_youtube_videos as $key => $vid)
                    <a style="display: none;" href="{{Voyager::image($vid)}}" class="content-box-file" data-fancybox="galleryVideoHowToUse"></a>
               @endforeach
            @endif
          </div>
        </div>
        <div class="container-info-profile-settings">
          <div class="box-item-profile-settings" data-aos="zoom-in-left" data-aos-delay="500">
            <div class="box-left-profile-settings create-box-back">
              <img src="../../images/icon_create.png"/>
            </div>
            <div class="box-right-profile-settings">
              <div class="title-box-profile-settings">{{__('statics.create')}}</div>
              <div class="box-right-text-settings">
                {{__('statics.you_can_add1')}} {{$counter_adding}} {{__('statics.you_can_add2')}}.
              </div>
            </div>
          </div>
          <div class="box-item-profile-settings" data-aos="zoom-in-left" data-aos-delay="250">
            <div class="box-left-profile-settings distribute-box-back">
              <img src="../../images/icon_manage.png"/>
            </div>
            <div class="box-right-profile-settings">
              <div class="title-box-profile-settings">{{__('statics.distribute')}}</div>
              <div class="box-right-text-settings">{{__('statics.add_your_info')}}</div>
            </div>
          </div>
          <div class="box-item-profile-settings" data-aos="zoom-in-left">
            <div class="box-left-profile-settings manage-box-back">
              <img src="../../images/icon_distribute.png"/>
            </div>
            <div class="box-right-profile-settings">
              <div class="title-box-profile-settings">{{__('statics.manage')}}</div>
              <div class="box-right-text-settings">{{__('statics.manage_desc')}}</div>
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="container-add-empty container-add-empty-profile">
    <?php $vocals = array('a','e','i','o','u'); $count=0;?>
    @foreach($profiles_count as $key => $prof_count)
      <div class="add-container-box" data-aos="zoom-in-right" data-aos-delay="{{$count*250}}">
        <div class="add-icon"><img src="{{Voyager::image($prof_count['icon'])}}"/></div>
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
        <div class="add-text">{{$prof_count['description']}}</div>
        @if($prof_count['subtype_value'] != -1) 
          @if(!in_array(Session::get('user')['usertype'], ['Producer', 'Produzent']))
            <a href="/user/profiles?subtype_id={{$prof_count['subtype_id']}}" class="add-btn btn-new-job">{{__('statics.add')}}</a>
          @endif
          @if(!in_array(Session::get('user')['usertype'], ['User', 'Benutzer']))
            @if($prof_count['name'] == 'product')
              <a href="/user/{{$prof_count['name']}}?subtype_id={{$prof_count['subtype_id']}}" class="add-btn btn-new-job">{{__('statics.add')}}</a>
            @else
              <a href="/user/jobs?subtype_id={{$prof_count['subtype_id']}}" class="add-btn btn-new-job">{{__('statics.add')}}</a>
            @endif
          @endif
        @endif
      </div>
    <?php $count++ ?>
    @endforeach
  </div>
  <div class="important-text-page">
    <img src="../../images/important_circle.png"/>
    <span>{{__('statics.important_simple')}}</span> @if($counter_adding != 'unlimited') {{__('statics.you_can_add1')}} {{$counter_adding}} {{__('statics.you_can_add2')}} @else {{__('statics.you_can_add_unlimited')}} @endif
  </div>
</div>
@push('scripts')
  <script>
    AOS.init();
  </script>
@endpush