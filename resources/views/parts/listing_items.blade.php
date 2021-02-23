<div class="container-listare-elemente-pagina">
  @for($i=0;$i<9;$i++)
    <div class="item-page-box-container">
      <div class="swiper-container container-image-box-item">
         <div class="swiper-wrapper">
           <div class="swiper-slide swiper-slide-item"><img src="@if($i%2 == 0) ../images/prod1.png @elseif($i%3 == 0) ../images/prod2.png @else ../images/prod3.png @endif" /></div>
           <div class="swiper-slide swiper-slide-item"><img src="../images/img2.png" /></div>
           <div class="swiper-slide swiper-slide-item"><img src="../images/img3.png" /></div>
         </div><!-- Add Pagination -->
         <div class="swiper-pagination"></div>
         <div class="item-box-type">@if($i%2 == 0) Birds @elseif($i%3 == 0) Kids @else Equipment @endif</div>
      </div>
      <div class="content-box-listing-pagina">
        <div class="date-joined-item-box">Joined 24th June, 2019</div>
        <div class="box-item-container-title">
          <div class="box-item-title">
            @if($i%2 == 0) Big Parrot Alexander @elseif($i%3 == 0) Curly black girl - Natasha @else Arri film camera 35mm @endif
          </div>
          <div class="container-rating"><img src="../images/rating.png"/><div class="raiting-score">8.7</div></div>
        </div>
        <a href="/product_detail/product-page-detailed" class="btn-general btn-view-more">{{__('statics.more_btn')}}</a>
      </div>
    </div>
  @endfor
  
</div>