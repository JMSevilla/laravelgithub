@extends('parts.template') 
@section('content')
  <main id="content">
    <div class="container container-page-without-header container-page-profile-detail">
      <div class="container-profile-detail">
        <div class="container-top-profile">
          <div class="container-top-left-profile">
            <div class="container-images-profile">
              <img class="container-images-profile-img" src="../images/prod1.png"/>
              <div class="item-box-type">Birds</div>
              <a data-fancybox="galery" href="../images/proj1.png" class="btn-general btn-buy-user-pricing btn-show-my-photos">My photos</a>
                @for($i=2;$i<=8;$i++)
                  <a style="display: none;" href="../images/proj{{$i}}.png" class="content-box-file" data-fancybox="galery">
                    <img src="../images/proj{{$i}}.png" />
                  </a>
               @endfor
            </div>
          </div>
          <div class="container-top-right-profile">
            <div class="profile-right-top">
              <div class="profile-right-top-left">
                <div class="date-joined-item-box">San Francisco, USA</div>
                <div class="box-item-container-title">
                  <div class="box-item-title">
                    Big Parrot Alexander
                  </div>
                  <div class="container-rating"><img src="../images/rating.png"/><div class="raiting-score">8.7</div></div>
                </div>
              </div>
              <div class="profile-right-top-right" data-fancybox="rate-me" data-src="#container-rating-popup">
                <div class="rate-me-btn">
                  <img src="../images/rate_star.png"/>
                  <div class="txt-btn-rate">{{__('statics.rate_title')}}</div>
                </div>
              </div>
            </div>
            <div class="container-listing-tags-item">
              <div class="tag-type-item-listing">Movies</div>
              <div class="tag-type-item-listing">Thriller</div>
              <div class="tag-type-item-listing">Drama</div>
              <div class="tag-type-item-listing">Documentaries</div>
              <div class="tag-type-item-listing">History</div>
              <div class="tag-type-item-listing">Horror</div>
              <div class="tag-type-item-listing">Thriller</div>
              <div class="tag-type-item-listing">Drama</div>
              <div class="tag-type-item-listing">Documentaries</div>
            </div>
            <div class="profile-short-description">
              Donec vulputate enim ut magna aliquam, vel iaculis eros tempor. Vivamus tempor fermentum felis, accumsan blandit urna porta vel. Aliquam elementum mollis odio, ut pellentesque lectus feugiat vitae. Nam ut nisi velit. Donec ac ornare diam...
            </div>
            <div class="buttons-profile-top">
              <div class="budget-project-container btn-profile-top">{{__('statics.fee_starting')}} $500</div>
              <div class="budget-project-container btn-profile-top btn-contact-profile" data-fancybox="contact" data-src="#contact-owner-popup">Contact me</div>
            </div>
          </div>
        </div>
      <div class="container-bottom-profile-detail about-container">
        <div class="container-about-profile">
          <div class="container-about-left">
            <div class="subtitle-normal-page">{{__('statics.general_information')}}</div>
            <div class="container-profile-description-items">
              <div class="item-description-profile">Type: Birds</div>
              <div class="item-description-profile">Cast: Here will be the cast</div>
              <div class="item-description-profile">Height: 187 cm</div>
              <div class="item-description-profile">Hair color: blue</div>
              <div class="item-description-profile">Gender: male</div>
              <div class="item-description-profile">Tattoos: yes</div>
              <div class="item-description-profile">Location: Los Angeles</div>
            </div>
          </div>
          <div class="container-right-pics-about">
             <div class="container-about-right-detail files-container">
              <div class="subtitle-normal-page">{{__('statics.full_descrition')}}</div>
              <div class="container-normal-text-profile normal-text-1column">
                Donec vulputate enim ut magna aliquam, vel iaculis eros tempor. Vivamus tempor fermentum felis, accumsan blandit urna porta vel.<br> Aliquam elementum mollis odio, ut pellentesque lectus feugiat vitae. Nam ut nisi velit. Donec ac ornare diam.<br>
                Donec vulputate enim ut magna aliquam, vel iaculis eros tempor. Vivamus tempor fermentum felis, accumsan blandit urna porta vel.<br> Aliquam elementum mollis odio, ut pellentesque lectus feugiat vitae. Nam ut nisi velit. Donec ac ornare diam.<br>
                Donec vulputate enim ut magna aliquam, vel iaculis eros tempor. Vivamus tempor fermentum felis, accumsan blandit urna porta vel.<br> Aliquam elementum mollis odio, ut pellentesque lectus feugiat vitae. Nam ut nisi velit. Donec ac ornare diam.<br>
              </div>
              <div class="subtitle-normal-page">{{__('statics.files_and_documents')}}</div>
              <div class="project-files-container product-files-container">
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">Files of Leonardo</div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">My scrips</div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">Personal archive </div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">My first screen</div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">Files of Leonardo</div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">My scrips</div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">Personal archive </div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">My first screen</div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">Files of Leonardo</div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">My scrips</div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">Personal archive </div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
                <div class="project-files-box">
                  <div class="project-files-box-icon">
                    <img src="../../images/folder.png" />
                  </div>
                  <div class="project-files-box-title-download">
                    <div class="project-files-title">My first screen</div>
                    <a href="" class="project-files-download">Download file</a>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
        <div class="container-btn-get-in-touch" data-fancybox="get-in-touch" data-src="#contact-owner-popup">{{__('statics.get_in_touch_with')}} Leonardo Di Caprio</div>
      </div>
      </div>
    </div>
    @include('parts.popup_rating')
    <div class="fancybox container-form-contact-owner" id="contact-owner-popup">
      <div class="contact-owner-title">Contact Big Parrot Alexander</div>
      <form class="form-contact-owner">
        <div class="contact-owner-inputs-container">
          <div class="form-contact-owner-left">
            <input type="text" name="name" placeholder="{{__('statics.enter_name')}}"/>
            <input type="text" name="email" placeholder="{{__('statics.enter_email')}}"/>
            <input type="text" name="phone" placeholder="{{__('statics.enter_phone')}}"/>
            <input type="text" name="position" placeholder="{{__('statics.enter_location')}}"/>
          </div>
          <div class="form-contact-owner-right">
            <textarea placeholder="Your message"></textarea>
          </div>
        </div>
        <div class="contact-owner-bottom">
          <div class="text-left-contact-owner">{{__('statics.agree_form')}}</div>
          <button class="custom-btn btn-albastru btn-contact-owner">{{__('statics.send_message')}}</button>
        </div>
      </form>
    </div>
  </main>
@endsection
@push('scripts')
<script src="../../js/colcade.js"></script>
  <script>
    $(document).ready(function(){
      $(".item-menu-profile-detail").click(function(){
        var container_shown = $(this).attr('container');
        container_shown = "."+container_shown;
        if(!$(this).hasClass('active-item-menu-profile-detail')){
          $(".item-menu-profile-detail").removeClass("active-item-menu-profile-detail");
          $(this).addClass('active-item-menu-profile-detail');
          $(".container-bottom-profile-detail").slideUp();
          $(container_shown).slideDown();
        }
      });
      var colc = new Colcade( '.container-about-right.grid', {
          columns: '.grid-col',
          items: '.about-img-right.grid-item'
      });
    });
  </script>
@endpush