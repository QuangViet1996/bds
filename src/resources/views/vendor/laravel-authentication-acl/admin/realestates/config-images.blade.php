<?php
if (!class_exists('lessc')) {
    include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/admin.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/admin.css');
?>
<!--image-->
<div class="form-group config-images">
    <div class="controls">

        {!! Form::label('image',trans('re.images'),': *') !!}
        {!! Form::file('image') !!}
        
        {!! Form::radio('set_to', 1, true) !!} Main
        {!! Form::radio('set_to', 0, false) !!} Move to other

        <span class="text-danger">{!! $errors->first('image') !!}</span>

    </div>
    
    @include('laravel-authentication-acl::admin.realestates.images-table')
    
</div>