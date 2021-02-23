<div class="container-products-listing">
  @for($i=0;$i<16;$i++)
    <div class="item-page-box-container product-box-items">
      <div class="container-image-box-item container-img-product-list">
        <div class="item-box-type">Equipment</div>
        <img src="../../images/product.png"/>
      </div>
      <div class="content-box-listing-pagina item-box-context-full">
        <div class="date-joined-item-box">Joined 24th June, 2019</div>
        <div class="box-item-container-title">
          <div class="box-item-title box-title-black">
            Leonardo DiCaprio
          </div>
          <div class="container-rating"><img src="../images/rating.png"/><div class="raiting-score">8.7</div></div>
        </div>
        <div class="container-product-edit-delete">
            <div class="action-element-project-box-over edit-project btn-edit-product">
              <div class="btn-project-box-over edit-project-icon">
                <img src="../images/edit_lines.png">
              </div>
              <div class="text-btn-over-project-box">{{__('statics.edit_simple')}}</div>
            </div>
            <form class="form-delete-project">
              <input name="project_id" type="hidden">
              <button class="action-element-project-box-over btn-delete-product">
                <div class="btn-project-box-over delete-project">
                  <img src="../images/delete_element.png">
                </div>
                <div class="text-btn-over-project-box">{{__('statics.delete_simple')}}</div>
              </button>
            </form>
          </div>
      </div>
    </div>
  @endfor
  
</div>