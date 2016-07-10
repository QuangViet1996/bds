@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')


@section('title')
    {!!trans('front.page_payrolls_table')!!}
@stop

@section('content')

@if( isset($data['payroll']) )

<?php $payroll = $data['payroll'] ?>

@else

<?php
    $payroll = new stdClass();
    $payroll->payroll_id = null;
    $payroll->payroll_type_id = null;
    $payroll->payroll_title = '';
    $payroll->payroll_description = '';
    $payroll->payroll_excel_filename = '';
    $payroll->payroll_date = time();
    $payroll->payroll_date_trans = time();
?>

@endif

<div class="row">

    <div class="col-md-12">

        <div class="col-sm-12">
            <?php $array_errors = $errors->toArray() ?>

            @if(!empty($array_errors) )
            <div class="alert alert-danger">{!!trans('front.excel.error_input_payrolls')!!}</div>
            @endif

            <?php $message = Session::get('message'); ?>

            @if( isset($message) )
            <div class="alert alert-success">{{$message}}</div>
            @endif

            <div class="panel panel-info">

                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        {!! isset($payroll->payroll_id) ? '<i class="fa fa-pencil"></i> '.trans("front.payrolls.edit_payrolls") : '<i class="fa fa-plus"></i> '.trans("front.payrolls.create_payroll") !!}
                    </h3>
                </div>

                <div class="panel-body">
                    {!! Form::open(['route'=>['hrm.edit_payroll'], 'files'=>true,'method' => 'post'])  !!}

                    <!-- title text field -->
                    <div class="form-group">

                        {!! Form::label('title',trans('front.payrolls.title'),': *') !!}
                        {!! Form::text('title',  $payroll->payroll_title, ['class' => 'form-control', 'placeholder' =>trans('front.payrolls.title')]) !!}

                        <span class="text-danger">{!! $errors->first('title') !!}</span>
                        <span class="input-example">{!!trans('front.payrolls.example_payrolls_title')!!}</span>

                    </div>

                    <!-- description text field -->
                    @include('tinymce::tpl')  
                    <div class="form-group">

                        {!! Form::label('description',trans('front.payrolls.description'),': *') !!}
                        {!! Form::text('description', $payroll->payroll_description , ['class' => 'form-control tinymce','row' => '10', 'placeholder' => trans('front.payrolls.description')]) !!}

                        <span class="text-danger">{!! $errors->first('description') !!}</span>
                        <span class="input-example">{!!trans('front.payrolls.example_payrolls_description')!!}</span>

                    </div>

                    <!---->
                    <div class="form-group">
                        <div class="controls">

                            {!! Form::label('datatype',trans('front.payrolls.types'),': *') !!}
                            {!! Form::select('datatype',$data['payroll_types'], $payroll->payroll_type_id, ['class' => 'form-control']) !!}

                            <span class="text-danger">{!! $errors->first('datatype') !!}</span>
                            <span class="input-example">{!!trans('front.payrolls.example_payrolls_datatype')!!}</span>

                        </div>
                    </div>

                    <!-- fromdate field -->
                    <div class="form-group">

                        {!! Form::label('fromdate',trans('front.routename_on_date')),':' !!}
                        {!! Form::text('fromdate', @date('d-m-Y',$payroll->payroll_date), ['class' => 'form-control fromdate', 'placeholder' => trans('front.routename_on_date')]) !!}

                        <span class="text-danger">{!! $errors->first('fromdate') !!}</span>
                    </div>
                    
                    <!-- todate field -->
                    <div class="form-group">

                        {!! Form::label('todate',trans('front.routename_on_date_trans')),':' !!}
                        {!! Form::text('todate', @date('d-m-Y',$payroll->payroll_date_trans), ['class' => 'form-control todate', 'placeholder' => trans('front.routename_on_date_trans')]) !!}

                        <span class="text-danger">{!! $errors->first('todate') !!}</span>
                    </div>

                    <div class="form-group">
                        <div class="controls">

                            {!! Form::label('filedata',trans('front.payrolls.attachment'),': *') !!}
                            {!! Form::file('filedata') !!}
                            {{ Form::hidden('is_filedata', !empty($payroll->payroll_excel_filename)?1:0, ['class' => 'is_filedata']) }}

                            <span class="text-danger">{!! $errors->first('filedata') !!}</span>
                            <span class="input-example">{!!trans('front.payrolls.example_payrolls_filedata')!!}</span>

                        </div>

                        @if( !empty($payroll->payroll_excel_filename) )

                        <div class="showfile">
                            <i class=" fa fa-file-excel-o" aria-hidden="true"></i>
                            <span class="filename">{!! $payroll->payroll_excel_filename !!}</span>
                            <div class="clearfix"></div>

                            <div class="control-file">
                                <span class="del">{!!trans('front.routename_delete')!!}</span>
                                <span class="undo" style="display: none">{!!trans('front.routename_undo')!!}</span>
                            </div>
                        </div>

                        @endif

                    </div>

                    <span class="text-danger">{!! $errors->first('payroll_description') !!}</span>

                    {!! Form::hidden('id', $payroll->payroll_id) !!}
                    @if($payroll->payroll_id != null)

                    <a href="{!! URL::route('hrm.delete_payroll',['id' => $payroll->payroll_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">
                        {!!trans('front.routename_delete')!!}
                    </a>

                    @else

                    <a href="{!! URL::route('hrm.payrolls') !!}" class="btn btn-danger pull-right margin-left-5">
                        {!!trans('front.routename_cancel')!!}
                    </a>

                    @endif

                    {!! Form::submit(trans('front.routename_save'), array("class"=>"btn btn-info pull-right ")) !!}

                    {!! Form::close() !!}
                </div>

            </div>
        </div>

    </div>

</div>

@stop

@section('footer_scripts')
<script>
    $(".delete").click(function () {
        return confirm('{!!trans('front.alert_you_want_delete_payroll')!!}');
    });

    $('.showfile .del').click(function () {
        $('.showfile .fa').removeClass('fa-file-excel-o');
        $('.showfile .fa').addClass('fa-file-image-o');
        $('.showfile .fa').css({'color': '#f0ad4e'});
        $('.showfile .undo').show();
        $('.showfile .filename').hide();
        $('.is_filedata').val(0);
        $(this).hide();
    });

    $('.showfile .undo').click(function () {
        $('.showfile .fa').removeClass('fa-file-image-o');
        $('.showfile .fa').addClass('fa-file-excel-o');
        $('.showfile .fa').css({'color': '#1fa67a'});
        $(this).hide();
        $('.showfile .filename').show();
        $('.showfile .del').show();
    });

</script>
@stop