@extends('laravel-authentication-acl::client.re.layouts.base')

@section('title')
Trang chủ
@stop

@section('section')
    @include('laravel-authentication-acl::client.re.index.slideshow')
    @include('laravel-authentication-acl::client.re.index.aboutproperty')
    @include('laravel-authentication-acl::client.re.index.property_details')
    @include('laravel-authentication-acl::client.re.index.properties')
    @include('laravel-authentication-acl::client.re.index.CT')
    @include('laravel-authentication-acl::client.re.index.aboutagent')
    @include('laravel-authentication-acl::client.re.index.testimonial')
    @include('laravel-authentication-acl::client.re.index.FAQ')
    @include('laravel-authentication-acl::client.re.index.contactIndex')

@stop