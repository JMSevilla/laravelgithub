@extends('voyager::master')

@section('page_title', $dataType->getTranslatedAttribute('display_name_plural') . ' ' . __('voyager::bread.order'))

@section('page_header')
<h1 class="page-title">
    <i class="voyager-list"></i>{{ $dataType->getTranslatedAttribute('display_name_plural') }} {{ __('voyager::bread.order') }}
</h1>
@stop

@section('content')
<div class="page-content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-heading">
                    <p class="panel-title" style="color:#777">{{ __('voyager::generic.drag_drop_info') }}</p>
                </div>

                <div class="panel-body" style="padding:30px;">
                    <div class="dd">
                        <ol class="dd-list">
                          
                            @foreach ($results as $result)
                               @if($result->parent_id == null)
                                  <li class="dd-item" data-id="{{ $result->id }}">
                                      <div class="dd-handle" style="height:inherit">
                                              <span>{{ $result->{$display_column} }}</span>
                                      </div>
                                      @if(!$result->children->isEmpty())
                                          @include('voyager::account-subtypes.suborder', ['items' => $result->children])
                                      @endif
                                  </li>
                                @endif
                            @endforeach
                          
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('javascript')

<script>
$(document).ready(function () {
//     $('.dd').nestable({
//         maxDepth: 999
//     });
  
      $('.dd').nestable({
        expandBtnHTML: '',
        collapseBtnHTML: '',
        maxDepth: 10
    });

    /**
    * Reorder items
    */
    $('.dd').on('change', function (e) {
        $.post("{{action('VoyagerSubTypesController@order_item')}}", {
            order: JSON.stringify($('.dd').nestable('serialize')),
            _token: '{{ csrf_token() }}'
        }, function (data) {
            toastr.success("{{ __('voyager::bread.updated_order') }}");
        });
    });
});
</script>
@stop
