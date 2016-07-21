@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
{!!trans('re.page')!!}
@stop

@section('content')
@if( isset($data['realestate']) )

<?php $realestate = $data['realestate'] ?>


@else

<?php
    $realestate = new stdClass();
    $realestate->real_estate_id = null;
    $realestate->real_estate_title = '';
    $realestate->real_estate_category_id = '';
    $realestate->real_estate_description = '';
    $realestate->real_estate_bedroom = '';
    $realestate->real_estate_bathroom = '';
    $realestate->real_estate_sq = '';
    $realestate->real_estate_year_build = '';
    $realestate->real_estate_images = '';
    $realestate->real_estate_cost = '';
?>

@endif

<div class="row">
    <div class="col-md-12">
        {{-- model general errors from the form --}}
        @if($errors->has('model') )
        <div class="alert alert-danger">{{$errors->first('model')}}</div>
        @endif

        {{-- successful message --}}
        <?php $message = Session::get('message'); ?>
        @if( isset($message) )
        <div class="alert alert-success">{{$message}}</div>
        @endif
        
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title bariol-thin">
                    {!! isset($realestate->real_estate_id) ? '<i class="fa fa-pencil"></i> '.trans("re.edit") : '<i class="fa fa-plus"></i> '.trans("re.add") !!}
                </h3>
            </div>

            <div class="panel-body">
                
                {!! Form::open(['route'=>['realestates.edit'],  'files'=>true, 'method' => 'post'])  !!}

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">{!! trans('re.overview') !!}</a></li>
                    <li><a data-toggle="tab" href="#menu1">{!! trans('re.attributes') !!}</a></li>
                    <li><a data-toggle="tab" href="#menu2">{!! trans('re.images') !!}</a></li>
                    <li><a data-toggle="tab" href="#menu3" class="menu-config-map">{!! trans('re.map') !!}</a></li>
                </ul>

                <div class="tab-content">
                    
                    <!--config-overview-->
                    <div id="home" class="tab-pane fade in active">
                        @include('laravel-authentication-acl::admin.realestates.config-overview')
                    </div>
                    
                    <!--config-attributes-->
                    <div id="menu1" class="tab-pane fade">
                        @include('laravel-authentication-acl::admin.realestates.config-attributes')
                    </div>
                    
                    <!--config-images--->
                    <div id="menu2" class="tab-pane fade">
                        @include('laravel-authentication-acl::admin.realestates.config-images')
                    </div>
                    
                    <!--config-map-->
                    <div id="menu3" class="tab-pane fade menu-config-gmap">
                        @include('laravel-authentication-acl::admin.realestates.config-map')
                    </div>
                </div>
                

                {!! Form::hidden('id', $realestate->real_estate_id) !!}

                <a href="{!! URL::route('realestates.delete',['id' => $realestate->real_estate_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">{!!trans('re.delete')!!}</a>
                {!! Form::submit(trans('re.save'), array("class"=>"btn btn-info pull-right ")) !!}

                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
@stop

@section('footer_scripts')
{!! HTML::script('packages/jacopo/laravel-authentication-acl/js/vendor/slugit.js') !!}
<script>
    $(".delete").click(function () {
        return confirm('{!!trans('re.you_want_delete')!!}');
    });
    $(function () {
        $('#slugme').slugIt();
    });
</script>
@stop