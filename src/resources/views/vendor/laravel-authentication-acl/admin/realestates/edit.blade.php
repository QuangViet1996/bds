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

                <!-- title text field -->
                <div class="form-group">
                    {!! Form::label('title',trans('front.houses.title').': *') !!}
                    {!! Form::text('title',$houses->real_estate_title, ['class' => 'form-control', 'placeholder' => trans('front.houses.title')]) !!}
                    <span class="text-danger">{!! $errors->first('title') !!}</span>
                </div>

                <!-- description text field -->
                @include('tinymce::tpl')
                <div class="form-group">
                    {!! Form::label('description',trans('front.houses.description').': *') !!}
                    {!! Form::text('description',$houses->real_estate_description, ['class' => 'form-control tinymce', 'placeholder' => trans('front.houses.description')]) !!}
                    <span class="text-danger">{!! $errors->first('description') !!}</span>
                </div>
                
                <!-- List categories -->
                    <div class="form-group">
                        <div class="controls">

                            {!! Form::label('datacat',trans('houses.house.get_supports_edit_category'),': *') !!}
                            {!! Form::select('datacat',$data['cat'], $houses->real_estate_category_id, ['class' => 'form-control']) !!}

                            <span class="text-danger">{!! $errors->first('datacat') !!}</span>

                        </div>
                    </div>

                <!-- bedroome text field -->
                <div class="form-group">
                    {!! Form::label('bedroom',trans('front.houses.bedroom').': *') !!}
                    {!! Form::number('bedroom',$houses->real_estate_bedroom, ['class' => 'form-control', 'placeholder' => trans('front.houses.bedroom')]) !!}
                    <span class="text-danger">{!! $errors->first('bedroom') !!}</span>
                </div>

                <!-- bathroom text field -->
                <div class="form-group">
                    {!! Form::label('bathroom',trans('front.houses.bathroom').': *') !!}
                    {!! Form::number('bathroom',$houses->real_estate_bathroom, ['class' => 'form-control', 'placeholder' => trans('front.houses.bedroom')]) !!}
                    <span class="text-danger">{!! $errors->first('bathroom') !!}</span>
                </div>

                <!-- bathroom text field -->
                <div class="form-group">
                    {!! Form::label('sq',trans('front.houses.sq').': *') !!}
                    {!! Form::number('sq',$houses->real_estate_sq, ['class' => 'form-control', 'placeholder' => trans('front.houses.sq')]) !!}
                    <span class="text-danger">{!! $errors->first('sq') !!}</span>
                </div>

                <!-- bathroom text field -->
                <div class="form-group">
                    {!! Form::label('build_year',trans('front.houses.build_year').': *') !!}
                    {!! Form::number('build_year',$houses->real_estate_year_build, ['class' => 'form-control', 'placeholder' => trans('front.houses.build_year')]) !!}
                    <span class="text-danger">{!! $errors->first('build_year') !!}</span>
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