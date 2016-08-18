@extends('laravel-authentication-acl::client.re.layouts.base')

@section('title')
Trang chủ
@stop

@section('section')

    @include('laravel-authentication-acl::client.re.index.slideshow')

    @include('laravel-authentication-acl::client.re.index.search')

    <!--HIGHTLIGHT RE-->
    <?php $hightlight_re = $data['hightlight_re'] ?>
    @include('laravel-authentication-acl::client.re.index.hightlightRe-overview')

    @include('laravel-authentication-acl::client.re.index.hightlightRe-detail')
    <!--END HIGHTLIGHT RE-->

    <!--MORE RE-->
    @include('laravel-authentication-acl::client.re.index.properties')
    <!--/-->
    
    @include('laravel-authentication-acl::client.re.index.CT')
    @include('laravel-authentication-acl::client.re.index.aboutagent')
    @include('laravel-authentication-acl::client.re.index.testimonial')
    @include('laravel-authentication-acl::client.re.index.FAQ')

    @include('laravel-authentication-acl::client.re.index.contactIndex')

@stop