@extends('laravel-authentication-acl::client.bds.layouts.base')

@section('title')
Admin area: BDS
@stop

@section('section')
        @include('laravel-authentication-acl::client.bds.index.slideshow')
        @include('laravel-authentication-acl::client.bds.index.aboutproperty')
        @include('laravel-authentication-acl::client.bds.index.property_details')
        @include('laravel-authentication-acl::client.bds.index.properties')
        @include('laravel-authentication-acl::client.bds.index.CT')
        @include('laravel-authentication-acl::client.bds.index.aboutagent')
        @include('laravel-authentication-acl::client.bds.index.client_say')
@stop