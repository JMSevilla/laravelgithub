  
  <div class="container-down-profile-user products-list-container listing-elements-profile" id="container-actor">
    <div class="container-products-listing">
      @if($actors != null && count($actors) > 0)
        @foreach($actors as $actor)
          <div class="item-page-box-container product-box-items">
            <div class="swiper-container container-image-box-item">
               <div class="swiper-wrapper">
                 @foreach($actor->photos as $photo)
                  <div class="swiper-slide swiper-slide-item"><img src="{{Voyager::image($photo)}}" /></div>
                 @endforeach
               </div><!-- Add Pagination -->
               <div class="swiper-pagination"></div>
            </div>
<!--             <div class="container-image-box-item container-img-product-list">
              <img src="{{Voyager::image($actor->photos[0])}}"/>
            </div> -->
            <div class="content-box-listing-pagina item-box-context-full">
              <div class="date-joined-item-box">{{$actor->location}}</div>
              <div class="box-item-container-title">
                <div class="box-item-title box-title-black">{{$actor->title}}</div>
              </div>
              <div class="container-product-edit-delete">
                  <div class="action-element-project-box-over edit-project btn-edit-job">
                    <input type="hidden" name="job_id" value="{{$actor->id}}" />
                    <input type="hidden" name="job_title" value="{{$actor->title}}" />
                    <input type="hidden" name="job_location" value="{{$actor->location}}" />
                    <input type="hidden" name="job_description" value="{{$actor->description}}" />
                    <input type="hidden" name="fixed_fee" value="{{$actor->fixed_fee}}" />
                    <input type="hidden" name="start_fee" value="{{$actor->start_fee}}" />
                    <input type="hidden" name="end_fee" value="{{$actor->end_fee}}" />
                    <input type="hidden" name="currency" value="{{$actor->currency}}" />
                    <input type="hidden" name="tags" value="{{json_encode($actor->tags)}}" />
                    <input type="hidden" name="photos" value="{{json_encode($actor->photos)}}" />
                    <input type="hidden" name="files" value="{{json_encode($actor->files)}}" />
                    <div class="btn-project-box-over edit-project-icon">
                      <img src="../images/edit_lines.png">
                    </div>
                    <div class="text-btn-over-project-box">{{__('statics.edit_simple')}}</div>
                  </div>
                  <div class="trick-delete-job" job_id="{{$actor->id}}" >
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
        <div class="important-text-page">
          <img src="../../images/important_circle.png">
          {{__('statics.no_actor_added')}} 
        </div>
      @endif

    </div>
  </div>