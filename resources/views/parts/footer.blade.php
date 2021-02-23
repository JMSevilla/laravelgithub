<footer id="footer">
  <div class="container footer-container">
    <div class="footer-left">
      <a class="logo-footer" href="/"><img src="../images/logo.png"/></a>
      <div class="footer-description">{{settings('site.footerdesc')}}</div>
    </div>
    <div class="footer-right">
      <ul class="meniu-lista-container footer-menu-container">
        <li class="element-meniu-lista">
          <a @if(Request::is('/')) class="active-menu" @endif href="">{{__('statics.home_title')}}</a>
        </li>
        <li class="element-meniu-lista">
          <a @if(Request::is('about')) class="active-menu" @endif href="/about">{{__('statics.about_us_title')}}</a>
        </li>
        <li class="element-meniu-lista">
          <a @if(Request::is('pricing')) class="active-menu" @endif href="/pricing">{{__('statics.pricing_title')}}</a>
        </li>
        <li class="element-meniu-lista">
          <a @if(Request::is('careers')) class="active-menu" @endif href="/careers">{{__('statics.careers_title')}}</a>
        </li>
        <li class="element-meniu-lista">
          <a @if(Request::is('contact')) class="active-menu" @endif href="/contact">{{__('statics.contact_title')}}</a>
        </li>
        <li class="element-meniu-lista">
          <a @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'jobs') class="active-menu" @endif href="/search?q=&type-item-search=jobs">{{__('statics.jobs')}}</a>
        </li>
        <li class="element-meniu-lista">
          <a @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'projects') class="active-menu" @endif href="/search?q=&type-item-search=projects">{{__('statics.projects_title')}}</a>
        </li>
        <li class="element-meniu-lista">
          <a @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'profiles') class="active-menu" @endif href="/search?q=&type-item-search=profiles">{{__('statics.profiles_title')}}</a>
        </li>
        <li class="element-meniu-lista">
          <a @if(isset($_GET['type-item-search']) && $_GET['type-item-search'] == 'items') class="active-menu" @endif href="/search?q=&type-item-search=items">{{__('statics.items_title')}}</a>
        </li>
      </ul>
      <div class="container-footer-right-bottom">
        <div class="container-line-bottom-footer">
          <div class="text-mic-footer">{{__('statics.all_rights_reserved')}}</div>
          <div class="menu-therms-footer">
            <a href="/therms">{{__('statics.therms_condition')}}</a>
            <vertical-line></vertical-line>
            <a href="/privacy">{{__('statics.privacy_policy')}}</a>
            <vertical-line></vertical-line>
            <a href="/cookies">{{__('statics.cookies_policy')}}</a>
          </div>
        </div>
        <div class="footer-socials">
          <a href=""><i class="fa fa-facebook-f"></i></a>
          <a href=""><i class="fa fa-twitter"></i></a>
          <a href=""><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>
  </div>
</footer>