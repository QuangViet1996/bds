@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
{!!trans('page_contact')!!}
@stop

@section('content')
@if( isset($data['contact']) )

<?php $contact = $data['contact'] ?>


@else

<?php
$contact = new stdClass();
$contact->real_estate_contact_id = null;
$contact->real_estate_contact_title = '';
$contact->real_estate_contact_description = '';
$contact->real_estate_contact_author_name = '';
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
                    {!! isset($contact->real_estate_contact_id) ? '<i class="fa fa-pencil"></i> '.trans("contact.edit") : '<i class="fa fa-plus"></i> '.trans("contact.add") !!}
                </h3>
            </div>
            
            <div class="panel-body">
                {!! Form::open(['route'=>['contact.edit'], 'files'=>true, 'method' => 'post'])  !!}
                
                <!-- title text field -->
                <div class="form-group">
                    {!! Form::label('title',trans('contact.title').': *') !!}
                    {!! Form::text('title',$contact->real_estate_contact_title, ['class' => 'form-control', 'placeholder' => trans('contact.title')]) !!}
                    <span class="text-danger">{!! $errors->first('title') !!}</span>
                </div>
                
                
                <!-- description text field -->
                @include('tinymce::tpl')
                <div class="form-group">
                    {!! Form::label('description',trans('contact.description').': *') !!}
                    {!! Form::text('description',$contact->real_estate_contact_description, ['class' => 'form-control tinymce', 'placeholder' => trans('contact.description')]) !!}
                    <span class="text-danger">{!! $errors->first('description') !!}</span>
                </div>
                
                <!-- author_name text field -->
                <div class="form-group">
                    {!! Form::label('author_name',trans('contact.author').': *') !!}
                    {!! Form::text('author_name',$contact->real_estate_contact_author_name, ['class' => 'form-control', 'placeholder' => trans('contact.author')]) !!}
                    <span class="text-danger">{!! $errors->first('author_name') !!}</span>
                </div>
               
                {!! Form::hidden('id', $contact->real_estate_contact_id) !!}
                  
                <a href="{!! URL::route('contact.delete',['id' => $contact->real_estate_contact_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">{!!trans("contact.delete")!!}</a>
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
        return confirm('{!!trans('contact.you_want_delete')!!}');
    });
    $(function () {
        $('#slugme').slugIt();
    });
</script>
@stop