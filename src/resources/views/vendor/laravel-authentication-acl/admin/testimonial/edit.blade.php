@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
{!!trans('front.page_testimonial')!!}
@stop

@section('content')
@if( isset($data['testimanial']) )

<?php $testimanial = $data['testimanial'] ?>


@else

<?php
$testimanial = new stdClass();
$testimanial->real_estate_testimonial_id = null;
$testimanial->real_estate_testimonial_title = '';
$testimanial->real_estate_testimonial_description = '';
$testimanial->real_estate_testimonial_author_name = '';
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
                    {!! isset($testimanial->real_estate_testimonial_id) ? '<i class="fa fa-pencil"></i> '.trans("front.testimonials.edit") : '<i class="fa fa-plus"></i> '.trans("front.testimonials.add") !!}
                </h3>
            </div>
            
            <div class="panel-body">
                {!! Form::open(['route'=>['testimonials.edit'], 'files'=>true, 'method' => 'post'])  !!}
                
                <!-- title text field -->
                <div class="form-group">
                    {!! Form::label('title',trans('front.testimonials.title').': *') !!}
                    {!! Form::text('title',$testimanial->real_estate_testimonial_title, ['class' => 'form-control', 'placeholder' => trans('front.testimonials.title')]) !!}
                    <span class="text-danger">{!! $errors->first('description') !!}</span>
                </div>
                
                <div class="form-group">
                    <div class="controls">

                        {!! Form::label('image',trans('front.payrolls.attachment'),': *') !!}
                        {!! Form::file('image') !!}

                        <span class="text-danger">{!! $errors->first('image') !!}</span>

                    </div>
                </div>
                
                <!-- description text field -->
                @include('tinymce::tpl')
                <div class="form-group">
                    {!! Form::label('description',trans('front.testimonials.description').': *') !!}
                    {!! Form::text('description',$testimanial->real_estate_testimonial_description, ['class' => 'form-control tinymce', 'placeholder' => trans('front.testimonials.description')]) !!}
                    <span class="text-danger">{!! $errors->first('permission') !!}</span>
                </div>
                
                <!-- author_name text field -->
                <div class="form-group">
                    {!! Form::label('author_name',trans('front.testimonials.author_name').': *') !!}
                    {!! Form::text('author_name',$testimanial->real_estate_testimonial_author_name, ['class' => 'form-control', 'placeholder' => trans('front.testimonials.author_name')]) !!}
                    <span class="text-danger">{!! $errors->first('permission') !!}</span>
                </div>
               
                {!! Form::hidden('id', $testimanial->real_estate_testimonial_id) !!}
                  
                <a href="{!! URL::route('testimonials.delete',['id' => $testimanial->real_estate_testimonial_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">{!!trans("front.testimonials.delete")!!}</a>
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