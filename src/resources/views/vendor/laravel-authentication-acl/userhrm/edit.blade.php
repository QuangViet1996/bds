@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')


@section('title')
        {!!trans('front.page_detail_payrolls')!!}
@stop

@section('content')

@if( isset($data['payroll']) )
    <?php $payroll = $data['payroll'] ?>
@else
    <?php $payroll = new stdClass();
        $payroll->payroll_id  = null;
        $payroll->payroll_title = '';
        $payroll->payroll_description = '';
        $payroll->payroll_excel_filename = '';
    ?>
@endif

<div class="row">
    <div class="col-md-12">
        {{-- model general errors from the form --}}
        @if($errors->has('model') )
        <div class="alert alert-danger">{{$errors->first('model')}}</div>
        @endif

        {{-- successful message --}}
        <?php $message = Session::get('message'); ?>
        @if( isset($message) )
        <div class="alert alert-success">{{$message}}</div>
        @endif
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title bariol-thin">{!! isset($payroll->payroll_id) ? '<i class="fa fa-pencil"></i> Edit' : '<i class="fa fa-lock"></i> Create' !!} payroll</h3>
            </div>
            <div class="panel-body">
                
                {!! Form::open(['route'=>['hrm.edit_payroll'], 'files'=>true,'method' => 'post'])  !!}
                
                    <!-- title text field -->
                    <div class="form-group">
                        {!! Form::label('title','Title: *') !!}
                        {!! Form::text('title',  $payroll->payroll_title, ['class' => 'form-control', 'placeholder' => 'payroll title']) !!}
                        <span class="text-danger">{!! $errors->first('title') !!}</span>
                    </div>
                
                    <!-- description text field -->
                    @include('tinymce::tpl')  
                    <div class="form-group">
                        {!! Form::label('description','Description: *') !!}
                        {!! Form::text('description', $payroll->payroll_description , ['class' => 'form-control tinymce', 'placeholder' => 'payroll description']) !!}
                        <span class="text-danger">{!! $errors->first('description') !!}</span>
                    </div>
                
                    <!---->
                     <div class="form-group">
                        <div class="controls">
                            {!! Form::label('datatype','Data type: *') !!}
                            {!! Form::select('datatype',$data['payroll_types'], 1, ['class' => 'form-control']) !!}
                            <span class="text-danger">{!! $errors->first('datatype') !!}</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="controls">
                            {!! Form::label('filedata','Attachment: *') !!}
                            {!! Form::file('filedata') !!}
                            {{ Form::hidden('is_filedata', !empty($payroll->payroll_excel_filename)?1:0, ['class' => 'is_filedata']) }}
                            <span class="text-danger">{!! $errors->first('filedata') !!}</span>
                        </div>
                        
                        @if( !empty($payroll->payroll_excel_filename) )
                        <div class="showfile">
                            <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                            <span class="filename">{!! $payroll->payroll_excel_filename !!}</span>

                            <div class="control-file">
                                    <span class="del">Xóa</span>
                                <span class="undo" style="display: none">Trở lại</span>
                            </div>
                        </div>
                        @endif
                             
                    </div>
                
                    <span class="text-danger">{!! $errors->first('payroll_description') !!}</span>
                    {!! Form::hidden('id', $payroll->payroll_id) !!}
                    <a href="{!! URL::route('hrm.delete_payroll',['id' => $payroll->payroll_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">Delete</a>
                    {!! Form::submit('Save', array("class"=>"btn btn-info pull-right ")) !!}
                    
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop

@section('footer_scripts')
<script>
    $(".delete").click(function(){
        return confirm("Are you sure to delete this item?");
    });
   
   $('.showfile .del').click(function(){
       $('.showfile .fa').removeClass('fa-file-excel-o');
       $('.showfile .fa').addClass('fa-file-image-o');
       $('.showfile .undo').show();
       $('.showfile .filename').hide();
       $('.is_filedata').val(0);
       $(this).hide();
   });
   
    $('.showfile .undo').click(function(){
       $('.showfile .fa').removeClass('fa-file-image-o');
       $('.showfile .fa').addClass('fa-file-excel-o');
       $(this).hide();
        $('.showfile .filename').show();
        $('.showfile .del').show();
    });
   
</script>
@stop