@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
{!!trans('front.page_houses')!!}
@stop

@section('content')
@if( isset($data['houses']) )

<?php $houses = $data['houses'] ?>


@else

<?php
    $houses = new stdClass();
    $houses->real_estate_id = null;
    $houses->real_estate_title = '';
    $houses->real_estate_category_id = '';
    $houses->real_estate_description = '';
    $houses->real_estate_bedroom = '';
    $houses->real_estate_bathroom = '';
    $houses->real_estate_sq = '';
    $houses->real_estate_year_build = '';
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
                    {!! isset($houses->real_estate_id) ? '<i class="fa fa-pencil"></i> '.trans("front.houses.edit") : '<i class="fa fa-plus"></i> '.trans("front.houses.add") !!}
                </h3>
            </div>

            <div class="panel-body">
                
                {!! Form::open(['route'=>['realestates.edit'],'method' => 'post'])  !!}

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">{!! trans('admin.realesates.overview') !!}</a></li>
                    <li><a data-toggle="tab" href="#menu1">{!! trans('admin.realesates.attributes') !!}</a></li>
                    <li><a data-toggle="tab" href="#menu2">{!! trans('admin.realesates.images') !!}</a></li>
                    <li><a data-toggle="tab" href="#menu3">{!! trans('admin.realesates.map') !!}</a></li>
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
                    <div id="menu3" class="tab-pane fade">
                        @include('laravel-authentication-acl::admin.realestates.config-map')
                    </div>
                </div>
                

                {!! Form::hidden('id', $houses->real_estate_id) !!}

                <a href="{!! URL::route('realestates.delete',['id' => $houses->real_estate_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">{!!trans("front.testimonials.delete")!!}</a>
                {!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}

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
        return confirm("Are you sure to delete this item?");
    });
    $(function () {
        $('#slugme').slugIt();
    });
</script>
@stop