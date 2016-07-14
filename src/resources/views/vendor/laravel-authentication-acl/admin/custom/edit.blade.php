@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
{!!trans('custom.page_custom')!!}
@stop

@section('content')
@if( isset($data['custom']) )

<?php $custom = $data['custom'] ?>


@else

<?php
$custom = new stdClass();
$custom->real_estate_custom_html_id = null;
$custom->real_estate_custom_html_title = '';
$custom->real_estate_custom_html_slug = '';
$custom->real_estate_custom_html_content = '';
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
                    {!! isset($custom->real_estate_custom_html_id) ? '<i class="fa fa-pencil"></i> '.trans("custom.edit") : '<i class="fa fa-plus"></i> '.trans("custom.add") !!}
                </h3>
            </div>
            
            <div class="panel-body">
                {!! Form::open(['route'=>['custom.edit'], 'method' => 'post'])  !!}
                
                <!-- title text field -->
                <div class="form-group">
                    {!! Form::label('title',trans('custom.title').': *') !!}
                    {!! Form::text('title',$custom->real_estate_custom_html_title, ['class' => 'form-control', 'placeholder' => trans('custom.title')]) !!}
                    <span class="text-danger">{!! $errors->first('title') !!}</span>
                </div>
                
                <!-- description text field -->
                <div class="form-group">
                    {!! Form::label('slug',trans('custom.slug').': *') !!}
                    {!! Form::text('slug',$custom->real_estate_custom_html_slug, ['class' => 'form-control', 'placeholder' => trans('custom.slug')]) !!}
                    <span class="text-danger">{!! $errors->first('slug') !!}</span>
                </div>
                
                 @include('tinymce::tpl')
                <div class="form-group">
                    {!! Form::label('content',trans('custom.content').': *') !!}
                    {!! Form::text('content',$custom->real_estate_custom_html_content, ['class' => 'form-control tinymce', 'placeholder' => trans('custom.content')]) !!}
                    <span class="text-danger">{!! $errors->first('content') !!}</span>
                </div>
                
               
                {!! Form::hidden('id', $custom->real_estate_custom_html_id) !!}
                  
                <a href="{!! URL::route('custom.delete',['id' => $custom->real_estate_custom_html_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">{!!trans("custom.delete")!!}</a>
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