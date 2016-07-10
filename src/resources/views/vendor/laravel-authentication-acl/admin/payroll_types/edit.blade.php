@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')


@section('title')
            {!!trans('front.page_payrolls_types_table')!!}
@stop

@section('content')

@if( isset($data['payroll_type']) )
    <?php $payroll_type = $data['payroll_type'] ?>
@else
    <?php
        $payroll_type = new stdClass();
        $payroll_type->payroll_type_id = null;
        $payroll_type->payroll_type_title = '';
        $payroll_type->payroll_type_file_template = '';
        $payroll_type->payroll_type_fromrow = '';
        $payroll_type->payroll_type_col_user = '';
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
                <h3 class="panel-title bariol-thin">
                    {!! isset($payroll_type->payroll_type_id) ? '<i class="fa fa-pencil"></i> '.trans('front.payrolls.edit_types') : '<i class="fa fa-plus"></i> '.trans('front.payrolls.create_types') !!}
                </h3>
            </div>
            
            <div class="panel-body">

                {!! Form::open(['route'=>['hrm.edit_payrolltype'],'files'=>true,'method' => 'post'])  !!}

                <!--payroll type text -->
                <div class="form-group">
                    
                    {!! Form::label('title',trans('front.payrolls.types').': *') !!}
                    {!! Form::text('title',  $payroll_type->payroll_type_title, ['class' => 'form-control', 'placeholder' =>trans('front.payrolls.types')]) !!}
                   
                    <span class="text-danger">{!! $errors->first('title') !!}</span>
                    <span class="input-example">{!!trans('front.payrolls.example_payrolls_types_title')!!}</span>

                </div>

                <!-- payroll type fromrow -->
                <div class="form-group">
                    
                    {!! Form::label('fromrow',trans('front.payrolls.payroll_type_fromrow').': *') !!}
                    {!! Form::input('number','fromrow',  $payroll_type->payroll_type_fromrow, ['class' => 'form-control', 'placeholder' =>trans('front.payrolls.payroll_type_fromrow')]) !!}
                    
                    <span class="text-danger">{!! $errors->first('fromrow') !!}</span>
                    <span class="input-example">{!!trans('front.payrolls.example_payrolls_types_fromrow')!!}</span>

                </div>

                <!-- payroll type column user -->
                <div class="form-group">
                    
                    {!! Form::label('coluser',trans('front.payrolls.payroll_type_col_user').': *') !!}
                    {!! Form::input('number','coluser',  $payroll_type->payroll_type_col_user, ['class' => 'form-control', 'placeholder' => trans('front.payrolls.payroll_type_col_user')]) !!}
                    
                    <span class="text-danger">{!! $errors->first('coluser') !!}</span>
                    <span class="input-example">{!!trans('front.payrolls.example_payrolls_types_coluser')!!}</span>

                </div>
                
                
                <div class="form-group">
                        <div class="controls">
                            
                            {!! Form::label('filedata',trans('File mẫu '),': *') !!}
                            {!! Form::file('filedata') !!}
                            {{ Form::hidden('is_filedata', !empty($payroll_type->payroll_type_file_template)?1:0, ['class' => 'is_filedata']) }}
                          
                            <span class="text-danger">{!! $errors->first('filedata') !!}</span>
                            <span class="input-example">{!!trans('front.payrolls.example_payrolls_filedata')!!}</span>

                        </div>

                        @if( !empty($payroll_type->payroll_type_file_template) )
                        
                            <div class="showfile">
                                <i class=" fa fa-file-excel-o" aria-hidden="true"></i>
                                <span class="filename">{!! $payroll_type->payroll_type_file_template !!}</span>
                                <div class="clearfix"></div>
                                
                                <div class="control-file">
                                    <span class="del">{!!trans('front.routename_delete')!!}</span>
                                    <span class="undo" style="display: none">{!!trans('front.routename_undo')!!}</span>
                                </div>
                            </div>
                        
                        @endif
                        
                    </div>
                
                {!! Form::hidden('id', $payroll_type->payroll_type_id) !!}
                
                @if($payroll_type->payroll_type_id != null)

                    <a href="{!! URL::route('hrm.delete_payrolltype',['id' => $payroll_type->payroll_type_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">
                        {!!trans('front.routename_delete')!!}
                    </a>

                @else

                    <a href="{!! URL::route('hrm.payrolltypes') !!}" class="btn btn-danger pull-right margin-left-5">
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
            return confirm('{!! trans('front.alert_you_want_delete_payroll_types')!!}');
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