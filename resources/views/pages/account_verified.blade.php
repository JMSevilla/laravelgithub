@extends('parts.template') 
@section('content')
  <main id="content" class="main-content-over-parallax" data-parallax="scroll" data-image-src="../images/back_login.png" data-speed="0.3">
    <div class="back-trick-over"></div>
    <div class="container-about-account container-account-full">
      <div class="container">
        <div class="container-top-login" style="margin: 0 auto; width: 100%">
          <div class="container-title-login" style="flex-direction: column;align-items: center;">
            <div class="title-right-login" style="width: 100%; text-align: center;">
              {{__('statics.account_activated')}}
            </div>
            <div class="footer-description txt-thank-you">
              {{__('statics.thank_activating_account')}}
            </div>
          </div>
        </div>

      </div>
   </div>
  </main>
@endsection
@push('scripts')
<script>
  $(document).ready(function(){
    console.log("{{$login_url}}");
    var seconds = 5;
    var new_msg = "{{__('statics.thank_activating_account')}} " + seconds + " seconds.";
    $(".txt-thank-you").html(new_msg);
    var sec_text = " seconds.";
    setInterval(function(){
      if(seconds == 1){
        sec_text = " second.";
      }
      new_msg = "{{__('statics.thank_activating_account')}} " + seconds + sec_text;
      $(".txt-thank-you").html(new_msg);
      if(seconds == 0){
        window.location.replace("{{$login_url}}");
        return false;
      }
      seconds--;
    }, 1000);
  });
</script>
@endpush