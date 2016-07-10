@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('title')
    {!!trans('front.page_doashboard')!!}
@stop

@section('content')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <h3><i class="fa fa-dashboard"></i> Dashboard</h3>
            <hr/>
        </div>
    </div>
    @include('vendor.laravel-authentication-acl.admin.dashboard.post')
</div>
@stop