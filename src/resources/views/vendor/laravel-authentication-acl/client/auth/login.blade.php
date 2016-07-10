<?php
include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/login.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/login.css');
?>
@extends('laravel-authentication-acl::client.layouts.base')
@section('title')
Trang đăng nhập
@stop
@section('content')

<div class="container">
    <div class="loginbox">
        <div class="logo-hvct"><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/hvct1.png') !!}" width="70" class="img-logo"></div>
        <div class="mane-shool"><span >Trường Cao Đẳng Nghề Kỹ Thuật Công Nghệ</br>Thành Phố Hồ Chí Minh</span></div>
        <div class="innerheading">
            <h1>
                {!!trans('front.login.page_internal')!!}
            </h1>
        </div>
        <?php $message = Session::get('message'); ?>
        @if( isset($message) )
        <div class="alert alert-success">{!! $message !!}</div>
        @endif
        @if($errors && ! $errors->isEmpty() )
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">{!! $error !!}</div>
        @endforeach
        @endif
        <div style="padding-bottom: 25px;">
            <div class="aspNetHidden">
                <input type="hidden" name="" id="" value="">
                <input type="hidden" name="" id="" value="">
                <input type="hidden" name="" id="" value="">
            </div>
            <div class="aspNetHidden">

                <input type="hidden" name="" id="" value="">
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div id="uxHelperInfoBox" class="helpbox">
                        <p>
                            <strong>
                            </strong>
                        </p>
                        <p>
                            <strong>{!!trans('front.login.have_trouble')!!}</strong>
                        </p>
                        <p> {!!trans('front.login.call_us_on')!!}</p>
                        <p class="phone">
                            <strong>{!!trans('front.login.munber_phone_contact')!!}</strong>
                        </p>
                        <p>
                            {!!trans('front.login.email_contact')!!} 
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    {!! Form::open(array('url' => URL::route("user.login"), 'method' => 'post') ) !!}
                    <div class="login-form">
                        <label class="lb">
                            {!!trans('front.login.username')!!}</label><br>
                        {!! Form::text('email', '', ['id' => 'email', 'class' => 'form-control form-input', 'required', 'autocomplete' => 'off']) !!}
                        <span id="RequiredFieldValidator5" title="User Name is required." class="failureNotification" style="visibility: hidden;">*</span>
                        <label class="lb ps">
                            {!!trans('front.login.password')!!}</label><br>
                        {!! Form::password('password', ['id' => 'password', 'class' => 'form-control form-input', 'required', 'autocomplete' => 'off']) !!}
                        <span id="RequiredFieldValidator6" title="Password is required." class="failureNotification" style="visibility: hidden;">*</span><br>
                        <br>
                        <div class="rmb">
                            <input type="submit" name="Login" value='{{trans('front.login.submit')}}' class="btnn">
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>
</div>

@stop