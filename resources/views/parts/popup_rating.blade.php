<div class="fancybox rating-popup"  id="container-rating-popup">
    <div class="apply-job-title rating-popup-title">{{__('statics.your_rating')}}</div>
    <form class="form-rating">
      <div class="simple-text-project">{{__('statics.rating_desc')}}</div>
      <div class="title-label-project">{{__('statics.rating_short_desc')}}</div>
      <div class="container-rating-stars">
        <input type="hidden" class="rating_stars_count" name="rating_stars_count" value="1"/>
        <div class="star-item-rating star-rating-1 active-star-rating" current_star="1"><i class="fa fa-star" aria-hidden="true"></i></div>
        <div class="star-item-rating star-rating-2" current_star="2"><i class="fa fa-star" aria-hidden="true"></i></div>
        <div class="star-item-rating star-rating-3" current_star="3"><i class="fa fa-star" aria-hidden="true"></i></div>
        <div class="star-item-rating star-rating-4" current_star="4"><i class="fa fa-star" aria-hidden="true"></i></div>
        <div class="star-item-rating star-rating-5" current_star="5"><i class="fa fa-star" aria-hidden="true"></i></div>
      </div>
      <div class="project-input-box container-input-down-full">
        <textarea rows="5" cols="30" class="textarea-form-project-popup" name="message_rating"></textarea>
      </div>
      <div class="apply-job-bottom">
        <div class="text-left-apply-job">{{__('statics.agree_form')}}</div>
        <button class="custom-btn btn-albastru btn-send-rating">{{__('statics.send_rating')}}</button>
      </div>
    </form>
</div>