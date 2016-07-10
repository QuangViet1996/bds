<?php include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php'); ?>
@extends('vendor.laravel-authentication-acl.admin.layouts.base')

@section('container')
    <div class="row-fluid">
        <div class="sidebar">
            @include('vendor.laravel-authentication-acl.admin.layouts.sidebar')
        </div>
        <div class="main">
            @yield('content')
        </div>
    </div>
@stop