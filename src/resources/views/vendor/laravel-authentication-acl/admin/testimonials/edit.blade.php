@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
{!!trans('testimonials.page_testimonial')!!}
@stop

@section('content')
@if( isset($data['testimonial']) )

<?php $testimonial = $data['testimonial'] ?>


@else

<?php
    $testimonial = new stdClass();
    $testimonial->real_estate_testimonial_id = null;
    $testimonial->real_estate_testimonial_title = '';
    $testimonial->real_estate_testimonial_description = '';
    $testimonial->real_estate_testimonial_author_name = '';
    $testimonial->real_estate_testimonial_image = '';
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
                    {!! isset($testimonial->real_estate_testimonial_id) ? '<i class="fa fa-pencil"></i> '.trans("testimonials.edit") : '<i class="fa fa-plus"></i> '.trans("testimonials.add") !!}
                </h3>
            </div>
            
            <div class="panel-body">
                {!! Form::open(['route'=>['testimonials.edit'], 'files'=>true, 'method' => 'post'])  !!}
                
                <!-- author_name text field -->
                <div class="form-group">
                    {!! Form::label('author_name',trans('testimonials.author_name').': *') !!}
                    {!! Form::text('author_name',$testimonial->real_estate_testimonial_author_name, ['class' => 'form-control', 'placeholder' => trans('testimonials.author_name')]) !!}
                    <span class="text-danger">{!! $errors->first('permission') !!}</span>
                </div>
                
                <!-- title text field -->
                <div class="form-group">
                    {!! Form::label('title',trans('testimonials.title').': *') !!}
                    {!! Form::text('title',$testimonial->real_estate_testimonial_title, ['class' => 'form-control', 'placeholder' => trans('testimonials.title')]) !!}
                    <span class="text-danger">{!! $errors->first('description') !!}</span>
                </div>
                
                <!--image-->
                <div class="form-group">
                    <div class="controls">

                        {!! Form::label('image',trans('testimonials.image'),': *') !!}
                        {!! Form::file('image') !!}

                        <span class="text-danger">{!! $errors->first('image') !!}</span>

                    </div>
                    @if($testimonial->real_estate_testimonial_image)
                    <div class="img-thumb">
                        <img src="{!! url($data['configs']['urlpath'].'/'.$testimonial->real_estate_testimonial_image) !!}">
                    </div>
                    @endif
                </div>
                
                <!-- description text field -->
                @include('tinymce::tpl')
                <div class="form-group">
                    {!! Form::label('description',trans('testimonials.description').': *') !!}
                    {!! Form::text('description',$testimonial->real_estate_testimonial_description, ['class' => 'form-control tinymce', 'placeholder' => trans('testimonials.description')]) !!}
                    <span class="text-danger">{!! $errors->first('permission') !!}</span>
                </div>
                
                {!! Form::hidden('id', $testimonial->real_estate_testimonial_id) !!}
                  
                <a href="{!! URL::route('testimonials.delete',['id' => $testimonial->real_estate_testimonial_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">{!!trans("testimonials.delete")!!}</a>
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
        return confirm('{!!trans('testimonials.you_want_delete')!!}');
    });
    $(function () {
        $('#slugme').slugIt();
    });
</script>
@stop