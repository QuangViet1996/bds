@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')

@section('title')
            {!!trans('front.page_support')!!}
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
                    <h3 class="panel-title bariol-thin"><i class="fa fa-info"></i> {!! trans('supports.support.list') !!}</h3>
                </div>
                
                <div class="panel-body">
                    @include('vendor.laravel-authentication-acl.admin.support.supports-table')
                </div>
            </div>
            
        </div>
        
         <div class="col-md-4">
            @include('laravel-authentication-acl::admin.support.search')
        </div>
    </div>
    
</div>

@stop

@section('footer_scripts')
    <script>
        $(".delete").click(function(){
            return confirm('{!!trans('supports.support.get_supports_delete')!!}');
        });
    </script>
@stop