@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.__('voyager::generic.settings'))

@section('css')
    <style>
      .setting_key_site_title{
        width: 49%;
      }
      .input-form-statics,.container-input{
        width: 100%;
      }
      .container-listing-inputs {
            width: 100%;
            position: relative;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            flex-wrap: wrap;
            padding: 0 40px;
        }
        .panel-actions .voyager-trash {
            cursor: pointer;
        }
        .panel-actions .voyager-trash:hover {
            color: #e94542;
        }
        .settings .panel-actions{
            right:0px;
        }
        .panel hr {
            margin-bottom: 10px;
        }
        .panel {
            padding-bottom: 15px;
        }
        .sort-icons {
            font-size: 21px;
            color: #ccc;
            position: relative;
            cursor: pointer;
        }
        .sort-icons:hover {
            color: #37474F;
        }
        .voyager-sort-desc {
            margin-right: 10px;
        }
        .voyager-sort-asc {
            top: 10px;
        }
        .page-title {
            margin-bottom: 0;
        }
        .panel-title code {
            border-radius: 30px;
            padding: 5px 10px;
            font-size: 11px;
            border: 0;
            position: relative;
            top: -2px;
        }
        .modal-open .settings  .select2-container {
            z-index: 9!important;
            width: 100%!important;
        }
        .new-setting {
            text-align: center;
            width: 100%;
            margin-top: 20px;
        }
        .new-setting .panel-title {
            margin: 0 auto;
            display: inline-block;
            color: #999fac;
            font-weight: lighter;
            font-size: 13px;
            background: #fff;
            width: auto;
            height: auto;
            position: relative;
            padding-right: 15px;
        }
        .settings .panel-title{
            padding-left:0px;
            padding-right:0px;
        }
        .new-setting hr {
            margin-bottom: 0;
            position: absolute;
            top: 7px;
            width: 96%;
            margin-left: 2%;
        }
        .new-setting .panel-title i {
            position: relative;
            top: 2px;
        }
        .new-settings-options {
            display: none;
            padding-bottom: 10px;
        }
        .new-settings-options label {
            margin-top: 13px;
        }
        .new-settings-options .alert {
            margin-bottom: 0;
        }
        #toggle_options {
            clear: both;
            float: right;
            font-size: 12px;
            position: relative;
            margin-top: 15px;
            margin-right: 5px;
            margin-bottom: 10px;
            cursor: pointer;
            z-index: 9;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .new-setting-btn {
            margin-right: 15px;
            position: relative;
            margin-bottom: 0;
            top: 5px;
        }
        .new-setting-btn i {
            position: relative;
            top: 2px;
        }
        textarea {
            min-height: 120px;
        }
        textarea.hidden{
            display:none;
        }

        .voyager .settings .nav-tabs{
            background:none;
            border-bottom:0px;
        }

        .voyager .settings .nav-tabs .active a{
            border:0px;
        }

        .select2{
            width:100% !important;
            border: 1px solid #f1f1f1;
            border-radius: 3px;
        }

        .voyager .settings input[type=file]{
            width:100%;
        }

        .settings .select2{
            margin-left:10px;
        }

        .settings .select2-selection{
            height: 32px;
            padding: 2px;
        }

        .voyager .settings .nav-tabs > li{
            margin-bottom:-1px !important;
        }

        .voyager .settings .nav-tabs a{
            text-align: center;
            background: #f8f8f8;
            border: 1px solid #f1f1f1;
            position: relative;
            top: -1px;
            border-bottom-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .voyager .settings .nav-tabs a i{
            display: block;
            font-size: 22px;
        }

        .tab-content{
            background:#ffffff;
            border: 1px solid transparent;
        }

        .tab-content>div{
            padding:10px;
        }

        .settings .no-padding-left-right{
            padding-left:0px;
            padding-right:0px;
        }

        .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover{
            background:#fff !important;
            color:#62a8ea !important;
            border-bottom:1px solid #fff !important;
            top:-1px !important;
        }

        .nav-tabs > li a{
            transition:all 0.3s ease;
        }


        .nav-tabs > li.active > a:focus{
            top:0px !important;
        }

        .voyager .settings .nav-tabs > li > a:hover{
            background-color:#fff !important;
        }
        .container-text-statics{
          display: none;
          width: 100%;
        }
        .statics-en{
          display: block;
        }
    </style>
@stop

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-file-text"></i> Static translations
    </h1>
@stop

@section('content')
    <div class="container-fluid">
        @include('voyager::alerts')
        <div class="alert alert-info">
            <strong>{{ __('voyager::generic.how_to_use') }}:</strong>
            <p>Here you can edit the basic texts of buttons, form inputs or titles. Just edit and save! :)</p>
        </div>
        <div>
          <h3 class="panel-title">Choose the language you want to modify                                       
            <div class="translatable-setting-switch btn-group btn-group-sm" role="group">
              <label class="btn btn-primary active btn-choose-language" data-lang="en">EN</label>
              <label class="btn btn-primary btn-choose-language" data-lang="de">DE</label>
            </div>
          </h3>
      </div>
    </div>
    <div class="page-content settings container-fluid">
        <div class="container-text-statics statics-en">
          <form class="container-listing-inputs form-inputs-en" action='{{ action("StaticsController@saveStatics") }}' method="post" enctype="multipart/form-data">
            @foreach($arrayStaticsEn as $key => $item_stat)
              <input type="hidden" name="language-selected" value="en"/>
              <div class="setting_key_site_title">
                  <div class="panel-heading">
                    <h3 class="panel-title">{!! ucfirst(str_replace('_', ' ', $key)) !!}</h3>
                  </div>
                  <div class="panel-body no-padding-left-right">
                      <div class="col-md-10 no-padding-left-right container-input">
                         <input type="text" class="form-control input-form-statics" name="{{$key}}" value="{{$item_stat}}">
                      </div>
                  </div>
              </div>
            @endforeach
            <button type="submit" class="btn btn-primary pull-right btn-save-new-statics">Save now</button>
          </form>
        </div>
        <div class="container-text-statics statics-de">
          <form class="container-listing-inputs form-inputs-de" action='{{ action("StaticsController@saveStatics") }}' method="post" enctype="multipart/form-data">
            @foreach($arrayStaticsDe as $key => $item_stat)
              <input type="hidden" name="language-selected" value="de"/>
              <div class="setting_key_site_title">
                  <div class="panel-heading">
                    <h3 class="panel-title">{!! ucfirst(str_replace('_', ' ', $key)) !!}</h3>
                  </div>
                  <div class="panel-body no-padding-left-right">
                      <div class="col-md-10 no-padding-left-right container-input">
                         <input type="text" class="form-control input-form-statics" name="{{$key}}" value="{{$item_stat}}">
                      </div>
                  </div>
              </div>
            @endforeach
            <button type="submit" class="btn btn-primary pull-right btn-save-new-statics">Save now</button>
          </form>
        </div>
    </div>
    
@stop
@section('javascript')
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
  $('document').ready(function () {
    $(".btn-choose-language").click(function(){
      if(!$(this).hasClass('active')){
        var lang_selected = $(this).attr("data-lang");
        var container_shown = ".statics-"+lang_selected;
        $(".btn-choose-language").removeClass('active');
        $(this).addClass('active');
        $(".container-text-statics").hide();
        $(container_shown).show();
      }
    });
   $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    $(".container-listing-inputs").on('submit', function(event) {
        var formData = new FormData(this);
        event.preventDefault();
        $.ajax({
            method: 'POST',
            url: '{{ action("StaticsController@saveStatics") }}',
            data: formData,
            processData: false,
            contentType: false,
            context: this, async: true, cache: false, dataType: 'json'
        }).done(function(res) {
            if (res.success == true) {
               toastr.success(res.msg);
              setTimeout(function(){
                window.location.reload();
              }, 3500);
            } else { 
              toastr.error(res.msg);
              setTimeout(function(){
                window.location.reload();
              }), 3500;
            }
        });
        return;
    });
  });
</script>
@stop