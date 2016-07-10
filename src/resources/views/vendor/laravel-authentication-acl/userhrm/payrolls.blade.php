@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')

@section('title')
        {!!trans('front.page_detail_payrolls')!!}
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        
        <div class="col-md-8">
        
        {{-- print messages --}}
        <?php $message = Session::get('message'); ?>
        @if( isset($message) )
        <div class="alert alert-success">{{$message}}</div>
        @endif
        {{-- print errors --}}
        @if($errors && ! $errors->isEmpty() )
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        @endif
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title bariol-thin"><i class="fa fa-exchange"></i>  {!!trans('front.detail.list')!!}</h3>
            </div>
            <div class="panel-body">
                @include('vendor.laravel-authentication-acl.userhrm.payrolls-table')
            </div>
        </div>
        </div>
        
        <div class="col-md-4">
            @include('laravel-authentication-acl::userhrm.search')
        </div>
    </div>
</div>
@stop