@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')

@section('title')
            {!!trans('front.page_payrolls_report_types_table')!!}
@stop

@section('content')

@if( isset($data['payroll_report_fields']) )

    <?php $payroll_report_fields = $data['payroll_report_fields'] ?>

@else

    <?php
        $payroll_report_fields = new stdClass();
        $payroll_report_fields->payroll_report_field_id = NULL;
        $payroll_report_fields->payroll_report_id = @$data['request']->get('id');
        $payroll_report_fields->payroll_type_field_name = NULL;
        $payroll_report_fields->payroll_report_field_val = NULL;
    ?>

@endif

<div class="row">

    <div class="col-md-12">

        <?php $message = Session::get('message'); ?>
        
        @if( isset($message) )
        <div class="alert alert-success">{{$message}}</div>
        @endif

        <div class="panel panel-info">

            <div class="panel-heading">
                <h3 class="panel-title bariol-thin">
                    {!! isset($payroll_report_fields->payroll_report_field_id) ? '<i class="fa fa-pencil"></i> '.trans('front.payrolls.report_field_edit') : '<i class="fa fa-plus"></i> '.trans('front.payrolls.report_field_create') !!}
                </h3>
            </div>

            <div class="panel-body">
                {!! Form::open(['route'=>['hrm.edit_payrollreportfield'],null,'method' => 'post'])  !!}

                <!--Payroll Type Fields Select-->
                <div class="form-group">
                    <div class="controls">
                        
                        {!! Form::label('payroll_type_field_name',trans('front.payrolls.report_field_types').': *') !!}
                        {!! Form::select('payroll_type_field_name',$data['payroll_type_fields'], $payroll_report_fields->payroll_type_field_name, ['class' => 'form-control']) !!}

                        <span class="text-danger">{!! $errors->first('payroll_type_field_name') !!}</span>
                        <span class="input-example">{!!trans('front.payrolls.excample_report_field_types') !!}</span>
                    </div>
                </div>

                <!--Payroll Reports field Select-->
                <div class="form-group">
                    <div class="controls">

                        {!! Form::label('payroll_report_id',trans('front.payrolls.report_field_template').': *') !!}
                        {!! Form::select('payroll_report_id',$data['payroll_reports'], $payroll_report_fields->payroll_report_id, ['class' => 'form-control']) !!}

                        <span class="text-danger">{!! $errors->first('payroll_report_id') !!}</span>
                        <span class="input-example">{!!trans('front.payrolls.example_report_field_template') !!}</span>
                    </div>
                </div>

                <!--Payroll report Field Value -->
                <div class="form-group">

                    {!! Form::label('report_field_val',trans('front.payrolls.report_field_insert_col').': *') !!}
                    {!! Form::text('report_field_val',  $payroll_report_fields->payroll_report_field_val, ['class' => 'form-control', 'placeholder' =>trans('front.payrolls.report_field_insert_col')]) !!}

                    <span class="text-danger">{!! $errors->first('report_field_val') !!}</span>
                    <span class="input-example">{!!trans('front.payrolls.example_report_field_insert_col')!!}</span>
                </div>

                {!! Form::hidden('id', $payroll_report_fields->payroll_report_field_id) !!}
                
                    <a href="{!! URL::route('hrm.delete_payrollreportfield',['id' => $payroll_report_fields->payroll_report_field_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 deletes">
                        {!! trans('front.routename_delete')!!}
                    </a>
                
                {!! Form::submit(trans('front.routename_save'), array("class"=>"btn btn-info pull-right ")) !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop

@section('footer_scripts')
    <script>
        $(".deletes").click(function () {
            return confirm('{!!trans('front.alert_you_want_delete_report_field')!!}');
        });
    </script>
@stop