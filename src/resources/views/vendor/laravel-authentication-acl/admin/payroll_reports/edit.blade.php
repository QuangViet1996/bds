@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')


@section('title')
               {!!trans('front.page_payrolls_report_table')!!}
@stop

@section('content')

@if( isset($data['payroll_report']) )

        <?php $payroll_report = $data['payroll_report'] ?>
@else
    <?php

        $payroll_report = new stdClass();
        $payroll_report->payroll_report_id = null;
        $payroll_report->payroll_report_title = '';
        $payroll_report->payroll_report_description = '';
        $payroll_report->payroll_report_template_file = '';
        $payroll_report->payroll_report_fromrow = NULL;
        $payroll_report->payroll_report_user_col = NULL;

    ?>
@endif

<div class="row">
    
    <div class="col-md-12">

        {{-- successful message --}}
        <?php $message = Session::get('message'); ?>
        @if( isset($message) )
            <div class="alert alert-success">{{$message}}</div>
        @endif
        
        <div class="panel panel-info">
            
            <div class="panel-heading">
                <h3 class="panel-title bariol-thin">{!! isset($payroll_report->payroll_report_id) ? 
                    '<i class="fa fa-pencil"></i> '.trans('front.payrolls.report_edit') :
                    '<i class="fa fa-plus"></i> '.trans('front.payrolls.report_create') !!}
                </h3>
            </div>
            
            <div class="panel-body">
                
                {!! Form::open(['route'=>['report.edit'],'files'=>true,'method' => 'post'])  !!}
               <!--Payroll text title-->
                <div class="form-group">
                    
                    {!! Form::label('title',trans('front.payrolls.report_title').': *') !!}
                    {!! Form::text('title',  $payroll_report->payroll_report_title, ['class' => 'form-control', 'placeholder' =>trans('front.payrolls.report_title')]) !!}
                    
                    <span class="text-danger">{!! $errors->first('title') !!}</span>
                    <span class="input-example">{!!trans('front.payrolls.example_report_title')!!}</span>

                </div>

               <!--Payroll text description-->
                @include('tinymce::tpl')  
                <div class="form-group">
                    
                    {!! Form::label('description',trans('front.payrolls.report_description').': *') !!}
                    {!! Form::text('description',  $payroll_report->payroll_report_description, ['class' => 'form-control tinymce','row' => '10', 'placeholder' =>trans('front.payrolls.report_description')]) !!}
                    
                    <span class="text-danger">{!! $errors->first('description') !!}</span>
                    <span class="input-example">{!!trans('front.payrolls.example_report_description')!!}</span>

                </div>
                
                <!--Payroll Report fromrow-->
                <div class="form-group">
                    
                    {!! Form::label('fromrow',trans('front.payrolls.report_from_row').': *') !!}
                    {!! Form::text('fromrow',  $payroll_report->payroll_report_fromrow, ['class' => 'form-control', 'placeholder' =>trans('front.payrolls.report_from_row')]) !!}
                    
                    <span class="text-danger">{!! $errors->first('fromrow') !!}</span>
                    <span class="input-example">{!!trans('front.payrolls.example_report_from_row')!!}</span>

                </div>
                
                <!--Payroll Report User column-->
                <div class="form-group">
                    
                    {!! Form::label('usercol',trans('front.payrolls.report_col_user').': *') !!}
                    {!! Form::text('usercol',  $payroll_report->payroll_report_user_col, ['class' => 'form-control', 'placeholder' =>trans('front.payrolls.report_col_user')]) !!}
                    
                    <span class="text-danger">{!! $errors->first('fromrow') !!}</span>
                    <span class="input-example">{!!trans('front.payrolls.example_report_col_user')!!}</span>

                </div>

                <!-- Report template file-->
                <div class="form-group">
                        <div class="controls">
                            
                            {!! Form::label('filedata',trans('front.payrolls.attachment'),': *') !!}
                            {!! Form::file('filedata') !!}
                            {{ Form::hidden('is_filedata', !empty($payroll_report->payroll_report_template_file)?1:0, ['class' => 'is_filedata']) }}
                            
                            <span class="text-danger">{!! $errors->first('filedata') !!}</span>
                            <span class="input-example">{!!trans('front.payrolls.example_report_template_file')!!}</span>
                        
                        </div>

                        @if( !empty($payroll_report->payroll_report_template_file) )
                        
                            <div class="showfile">
                                <i class=" fa fa-file-excel-o" aria-hidden="true"></i>
                                <span class="filename">{!! $payroll_report->payroll_report_template_file !!}</span>
                                <div class="clearfix"></div>
                                
                                <div class="control-file">
                                    <span class="del">{!!trans('front.routename_delete')!!}</span>
                                    <span class="undo" style="display: none">{!!trans('front.routename_undo')!!}</span>
                                </div>
                            </div>
                        
                        @endif
                </div>
                
                {!! Form::hidden('id', $payroll_report->payroll_report_id) !!}
                 @if($payroll_report->payroll_report_id != null)
                    
                    <a href="{!! URL::route('report.delete',['id' => $payroll_report->payroll_report_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">
                        {!!trans('front.routename_delete')!!}
                    </a>
                    
                @else
                    
                    <a href="{!! URL::route('report.list') !!}" class="btn btn-danger pull-right margin-left-5">
                        {!!trans('front.routename_cancel')!!}
                    </a>

                @endif
                    
                {!! Form::submit(trans('front.routename_save'), array("class"=>"btn btn-info pull-right ")) !!}
                
                {!! Form::close() !!}
            </div>
        </div>
        
    </div>
    
</div>
@stop

@section('footer_scripts')
    <script>
        $(".delete").click(function () {
            return confirm('{!! trans('front.alert_you_want_delete_report')!!}');
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
            $('.is_filedata').val(1);
            $('.showfile .filename').show();
            $('.showfile .del').show();
        });

    </script>
@stop