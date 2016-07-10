@extends('laravel-authentication-acl::client.bds.layouts.base')

@section('title')
Admin area: BDS
@stop

@section('section')
        @include('laravel-authentication-acl::client.bds.index.slideshow')
        @include('laravel-authentication-acl::client.bds.index.aboutproperty')
        @include('laravel-authentication-acl::client.bds.index.property_details')
@stop