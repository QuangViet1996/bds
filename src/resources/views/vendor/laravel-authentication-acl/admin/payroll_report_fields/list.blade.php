@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')

@section('title')
        {!!trans('front.page_payrolls_report_types_table')!!}
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
                    <h3 class="panel-title bariol-thin"><i class="fa fa-cog"></i> {!!trans('front.payrolls.payroll_type_field_list')!!}</h3>
                </div>

                <div class="panel-body">
                    @include('vendor.laravel-authentication-acl.admin.payroll_type_fields.payroll-type-fields-table')
                </div>
            </div>

        </div>

        <div class="col-md-4">
            @include('laravel-authentication-acl::admin.payroll_type_fields.search')
        </div>
    </div>

</div>
@stop

@section('footer_scripts')
<script>
    $(".delete").click(function () {
        return confirm("Are you sure to delete this item?");
    });
</script>
@stop