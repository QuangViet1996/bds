@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')

@section('title')
        {!!trans('front.page_payrolls_table')!!}
@stop

@section('content')

<div class="row">
    
    <div class="col-md-12">
        
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
                    <h3 class="panel-title bariol-thin"><i class="fa fa-info-circle"></i> {!! trans('front.routename_hrm_view') !!}</h3>
                </div>
                
                <div class="panel-body">
                    @include('vendor.laravel-authentication-acl.admin.hrm.item')
                </div>
            </div>
    </div>
    
</div>
@stop

@section('footer_scripts')
    <script>
        $(".delete").click(function(){
            return confirm('{!! trans('front.alert_you_want_delete_payroll')!!}');
        });
    </script>
@stop