<div class="container-right-account">
  <div class="titlu-right-account-container">
    <div class="titlu-right-account">{{__('statics.my_files_title')}}</div>
  </div>
  <div class="cointainer-content-right-account">
    <div class="content-top-account">
      <form class="form-add-photo-user">
        <div class="custom-btn btn-albastru btn-upload-photos">
          <i class="fa fa-plus fa-plus-img"></i>
          {{__('statics.add_new_file')}}
        </div>
        <input style="display: none;" class="input-images" type="file" name="imagesfield" multiple="multiple" accept=".jpg,.jpeg,.png,.png24,.JPEG,PNG,JPG" />
      </form>
    </div>
    <div class="container-files">
      @for($i=1;$i<=8;$i++)
      <div class="content-box-file">
        <a href="../../images/proj{{$i}}.png" class="content-box-file" data-fancybox="galery">
          <img src="../../images/proj{{$i}}.png" />
        </a>
        <div class='container-delete-img btn-delete-image-files'><img src='../images/delete_element.png'/></div>
      </div>
      @endfor
      @for($i=1;$i<=8;$i++)
        <div class="content-box-file">
          <a href="../../images/proj{{$i}}.png" class="content-box-file" data-fancybox="galery">
            <img src="../../images/proj{{$i}}.png" />
          </a>
          <div class='container-delete-img btn-delete-image-files'><img src='../images/delete_element.png'/></div>
        </div>
      @endfor
    </div>
  </div>
</div>
@push('scripts')
<script>
  AOS.init();
  $(document).ready(function(){
    $(".btn-upload-photos").click(function(){
      $(".input-images").trigger("click");
    });
    $('.input-images').change(function(e){
        alert(e.target.files.length + " files successfully added!");
    });
    $(document).on('click', '.btn-delete-image-files', function(){
      if(confirm("{{__('statics.delete_file_title')}}?")){
        $(this).parent().fadeOut(300, function() { $(this).remove(); });
        return;
      } else{
        return;
      }
    });
  });
</script>
@endpush