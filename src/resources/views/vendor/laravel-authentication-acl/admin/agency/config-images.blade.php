<?php
if (!class_exists('lessc')) {
    include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/admin.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/admin.css');
?>
<!--image-->
<div class="form-group">
    <div class="controls">

        {!! Form::label('image',trans('re.images'),': *') !!}
        {!! Form::file('image') !!}

        <span class="text-danger">{!! $errors->first('image') !!}</span>

    </div>
    @if($realestate->real_estate_images)
    <div class="img-thumb">
        <img src="{!! url($data['configs']['urlpath'].'/'.$realestate->real_estate_images) !!}">
    </div>
    @endif
</div>