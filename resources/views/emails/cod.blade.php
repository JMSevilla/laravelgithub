<style type="text/css">
@font-face {
    font-family: "Segoe UI Regular";
    src: url("{{ public_path('fonts/Segoe UI.woff') }}");
}
</style>
@component('mail::message')
<div style="box-sizing: border-box;webkit-box-sizing: border-box;width:768px;margin:0 auto; position: relative;">
  <div style="box-sizing: border-box;webkit-box-sizing: border-box;padding: 35px; padding-top: 10px;padding-bottom:0;">
    <div style="width:100%;margin-bottom:10%;background: #000000;padding: 22px;border-radius: 15px;">
    <a href="{{config('app.url')}}" style="color: #000000;font-size: 14px;text-decoration: none; vertical-align:middle; display:block; text-align: center;" target="_blank">
      <img src="{{config('app.url')}}/images/logo.png" style="width: 220px; vertical-align:middle; display:block; margin: auto;margin-bottom: 5px;"/>
    </a>
    </div>
    <div style="padding: 20px 0px;width: 100%;background: url({{config('app.url')}}/images/banner_cover.png);">
        <div style="color: #ffffff;font-size: 17px;font-family: 'Open Sans';margin-right: 0px;width: 100%;text-align: center;">Servicii de print tricouri si haine personalizate la preturi avantajoase.</div>
    </div>
    <div style="font-weight: bold; font-size: 14px; text-align: left; width: 100%; margin-top: 20px; margin-bottom: 15px; color: #000000;">
      Salutare,
    </div>
    <div style="font-size: 14px; color: #525252; line-height: 1.2; text-align: left; padding-bottom: 20px;"> 
      <div>In urma solicitarii dvs., am trimis un link de verificare pentru recuperarea parolei.<br>
        Accesati link-ul <a href="{{ url('/resetare-parola?etoken=') }}{{$token['token']}}">acesta</a> dupa care introduceti noua parola.<br>
        Daca nu ati facut nicio actiune pe site-ul {{ config('app.name') }} , va rugam sa ignorati acest email! Parola dvs. va ramane neschimbata<br>
      </div>
    </div>
    <a href="{{setting('oferte.url_offers')}}" style="text-decoration:none;padding:8px 10px; background-color: #000000;font-size:12px;text-transform:uppercase;color:#ffffff;border-radius:4px;">Vezi toate ofertele</a>
<!--     <div>Cu drag,</div>
      <div>Echipa {{ config('app.name') }}</div> -->
  </div>
 <div style="position: relative;background-color: #efefef;margin-top: 20px;margin-bottom: 10px;border-radius: 15px;">
    <div style="box-sizing: border-box; position: relative; width: 80%; margin: 0 auto; font-size: 14px; color: #666666; line-height: 1.6; text-align: center; padding: 35px; font-family: Nunito-Regular;">
      MovieCircle respects your data privacy. Please check <a style="position: relative;font-weight: bold;color: #5271FF;text-decoration: none;" href="https://moviecircle.laravel.touchmediahost.com/privacy">Privacy Policy</a> and
      <a style="position: relative;font-weight: bold;color: #5271FF;text-decoration: none;" href="https://moviecircle.laravel.touchmediahost.com/therms">Therms and Conditions</a> for more details.
      <br>For questions please contact us at <a href="https://moviecircle.laravel.touchmediahost.com/contact" style="position: relative;font-weight: bold;color: #5271FF;text-decoration: none;">Support department.</a> <br><br>
      <div style="position: relative; margin-top: 10px;">
        <a style="position: relative; display: inline-block; vertical-align: middle; font-weight: bold; color: #D60037; text-decoration: none;" href="{{settings('site.facebook')}}">
          <img style="width:12px;height:22px" src="{{config('app.url')}}/images/email_face.png"/>
        </a>
        <a style="margin-left:15px;margin-right:15px;position: relative; display: inline-block; vertical-align: middle; font-weight: bold; color: #D60037; text-decoration: none;" href="{{settings('site.twitter')}}">
          <img style="width:22px;height:18px" src="{{config('app.url')}}/images/email_twitter.png"/>
        </a>
        <a style="position: relative; display: inline-block; vertical-align: middle; font-weight: bold; color: #D60037; text-decoration: none;" href="{{settings('site.instagram')}}">
          <img style="width:22px;height:22px" src="{{config('app.url')}}/images/email_insta.png"/>
        </a>
      </div>
    </div>
  </div>
</div>
@endcomponent