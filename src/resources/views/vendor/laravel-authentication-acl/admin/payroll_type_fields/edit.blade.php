@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')


@section('title')
        {!!trans('front.page_payrolls_types_field_table')!!}
@stop

@section('content')

    @if( isset($data['payroll_type_field']) )
        <?php $payroll_type_field = $data['payroll_type_field'] ?>
    @else
        <?php
            $payroll_type_field = new stdClass();
            $payroll_type_field->payroll_type_id = null;
            $payroll_type_field->payroll_type_field_id = null;
            $payroll_type_field->payroll_type_field_title = '';
            $payroll_type_field->payroll_type_field_val = '';
            $payroll_type_field->payroll_type_field_isvat = 1;
            $payroll_type_field->payroll_type_field_isinsurrance = 0;
            $payroll_type_field->payroll_type_field_isvisible = 1;
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
                <h3 class="panel-title bariol-thin">{!! isset($payroll_type_field->payroll_type_field_id) ? '<i class="fa fa-pencil"></i> '.trans('front.payrolls.edit_payroll_type_field') : '<i class="fa fa-plus"></i> '.trans('front.payrolls.create_payroll_type_field') !!}</h3>
            </div>
            <div class="panel-body">

                {!! Form::open(['route'=>['hrm.edit_payrolltypefield'],null,'method' => 'post'])  !!}

                <!-- Payrolls type filed title text-->
                <div class="form-group">
                    
                    {!! Form::label('title',trans('front.payrolls.payroll_type_field_name').': *') !!}
                    {!! Form::text('title',  $payroll_type_field->payroll_type_field_title, ['class' => 'form-control', 'placeholder' => trans('front.payrolls.payroll_type_field_name')]) !!}
                   
                    <span class="text-danger">{!! $errors->first('title') !!}</span>
                    <span class="input-example">{!!trans('front.payrolls.example_payroll_type_field_name_column') !!}</span>

                </div>

                <!-- Payroll type filed val text -->
                <div class="form-group">
                    
                    {!! Form::label('fieldval',trans('front.payrolls.payroll_type_field_val').': *') !!}
                    {!! Form::input('number','fieldval',  $payroll_type_field->payroll_type_field_val, ['class' => 'form-control', 'placeholder' => trans('front.payrolls.payroll_type_field_val')]) !!}
                    
                    <span class="text-danger">{!! $errors->first('fieldval') !!}</span>
                    <span class="input-example">{!!trans('front.payrolls.example_payroll_type_field_number_column') !!}</span>

                </div>

                <!--payroll types select-->
                <div class="form-group">
                    <div class="controls">
                        
                        {!! Form::label('listtypes',trans('front.payrolls.types').': *') !!}
                        {!! Form::select('listtypes',$data['listtypes'], $payroll_type_field->payroll_type_id, ['class' => 'form-control']) !!}
                       
                        <span class="text-danger">{!! $errors->first('listtypes') !!}</span>
                        <span class="input-example">{!!trans('front.payrolls.example_payroll_type_field_payroll_types') !!}</span>

                    </div>
                </div>


                <div class="form-group">
                    <div class="controls">
                        
                        <?php $flag = $payroll_type_field->payroll_type_field_isvat ? FALSE : TRUE; ?>
                        {!! Form::label('isvat',trans('front.payrolls.payroll_type_field_vat_1').': *') !!}
                       
                        <span class="input-example" style="display: inline;margin: 0!important">
                            {!!trans('front.payrolls.example_payroll_type_field_isvat') !!}
                        </span>  <br>
                        
                        {!! Form::radio('isvat', 1, true) !!}
                            <span>
                                {!!trans('front.payrolls.payroll_type_field_yes')!!}
                            </span><br>

                        {!! Form::radio('isvat', 0, $flag) !!}
                            <span>
                                {!!trans('front.payrolls.payroll_type_field_no')!!}
                            </span>

                        <span class="text-danger">{!! $errors->first('isvat') !!}</span>
                        
                    </div>
                </div>

                <div class="form-group">
                    <div class="controls">
                        
                        <?php $flag = $payroll_type_field->payroll_type_field_isinsurrance ? FALSE : TRUE; ?>
                        {!! Form::label('isinsurrance',trans('front.payrolls.payroll_type_field_insurrance').': *') !!}
                        
                        <span class="input-example" style="display: inline;margin: 0!important">
                            {!!trans('front.payrolls.example_payroll_type_field_isinsurrance') !!}
                        </span><br>

                        {!! Form::radio('isinsurrance', 1, true) !!}
                        <span>
                            {!!trans('front.payrolls.payroll_type_field_yes')!!}
                        </span><br>

                        {!! Form::radio('isinsurrance', 0, $flag) !!}
                        <span>
                            {!!trans('front.payrolls.payroll_type_field_no')!!}
                        </span>

                        <span class="text-danger">{!! $errors->first('isvat') !!}</span>
                        
                    </div>
                </div>

                <div class="form-group">
                    <div class="controls">
                        
                        <?php $flag = $payroll_type_field->payroll_type_field_isvisible ? FALSE : TRUE; ?>
                        {!! Form::label('isvisible',trans('front.payrolls.payroll_type_field_visible').': *') !!}
                        
                        <span class="input-example" style="display: inline;margin: 0!important">
                            {!!trans('front.payrolls.example_payroll_type_field_show') !!}
                        </span><br>
                        
                        {!! Form::radio('isvisible', 1, true) !!}
                        <span>
                            {!!trans('front.payrolls.show_payroll_type_field') !!}
                        </span><br>

                        {!! Form::radio('isvisible', 0, $flag) !!}
                        <span>
                            {!!trans('front.payrolls.hide_payroll_type_field') !!}
                        </span>

                        <span class="text-danger">{!! $errors->first('isvisible') !!}</span>
                        
                    </div>
                </div>


                <span class="text-danger">{!! $errors->first('payroll_description') !!}</span>
                
                {!! Form::hidden('id', $payroll_type_field->payroll_type_field_id) !!}
                <a href="{!! URL::route('hrm.delete_payrolltypefield',['id' => $payroll_type_field->payroll_type_field_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">
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
        $(".delete").click(function () {
            return confirm('{!! trans('front.alert_you_want_delete_payroll_type_field') !!}');
        });
        $(".deletes").click(function () {
            return confirm('{!! trans('front.alert_you_want_delete_report') !!}');
        });

    </script>
@stop