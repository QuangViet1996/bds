@extends('laravel-authentication-acl::client.re.layouts.base')

@section('title')
Danh mục
@stop

<?php
$request = @$data['request'];
$category = @$data['category'];
$real_estates = @$data['real_estates'];
?>
@section('section')
    @include('laravel-authentication-acl::client.re.category.list-by-category-item')
@stop