@if(count($profile_subtype['children'])>0)
  <div class="container-subitems-top-profiles-listing">
    @foreach($profile_subtype['children'] as $key => $profile_subtype_child)
        <div class="item-menu-subprofile-unstyled" parent_subitem_id="{{$parent_id}}" subtype_id="{{$profile_subtype_child['id']}}" subtype_name="{{$profile_subtype_child['name']}}" entire_item="{{json_encode($profile_subtype_child)}}">
          <div class="point-item-listing">.</div>
          {{$profile_subtype_child['name']}}
          @if(count($profile_subtype_child['children']) > 0)
            <i class="fa fa-angle-down img-arrow-down" aria-hidden="true"></i>
          @endif
          @if (count($profile_subtype_child['children']) > 0)
            <div class="container-dropdown-listing container-dropdown-listing-children" container_parent_id="{{$profile_subtype_child['id']}}">
              @include('parts.children', ['profile_subtype' => $profile_subtype_child, 'parent_id' => $parent_id])
            </div>
          @endif
        </div>
    @endforeach
  </div>
@endif