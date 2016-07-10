@extends('laravel-authentication-acl::client.layouts.base-fullscreen')
@section ('title')
500
@stop
@section('content')

<div class="container">
    <div class="loginbox">
        <div class="logo-hvct"><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/hvct1.png') !!}" width="70" class="img-logo"></div>
        <div class="mane-shool"><span >Trường Cao Đẳng Nghề Kỹ Thuật Công Nghệ</br>Thành Phố Hồ Chí Minh</span></div>
        <div class="innerheading">
            <h1>
              <i class="fa fa-exclamation-triangle"></i> {!!trans('front.error')!!}
            </h1>
        </div>
       
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
                <div class="col-md-12 col-sm-12">
                    <div id="uxHelperInfoBox" class="helpbox">
                        <p style="margin-bottom: 0;">
                            <strong> <a href="{!! URL::to('/') !!}"><i class="fa fa-home"></i> {!!trans('front.error.go_home')!!}</a></strong>
                        </p>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</div>


@stop