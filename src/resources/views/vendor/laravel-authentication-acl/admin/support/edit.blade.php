@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')

@section('title')
            {!!trans('front.page_support')!!}
@stop

@section('content')

@if( isset($data['payroll_support']) )

<?php $support = $data['payroll_support'] ?>

@else

<?php
$support = new stdClass();
$support->payroll_support_id = null;
$support->payroll_support_category_id = null;
$support->payroll_support_title = '';
$support->payroll_support_description = '';
$support->payroll_support_overview = '';
?>

@endif

<div class="row">

    <div class="col-md-12">

        <div class="col-sm-12">

            <?php $message = Session::get('message'); ?>

            @if( isset($message) )
            <div class="alert alert-success">{{$message}}</div>
            @endif

            <div class="panel panel-info">

                <div class="panel-heading">
                    <h3 class="panel-title bariol-thin">
                        {!! isset($support->payroll_support_id) ? '<i class="fa fa-pencil"></i> '.trans("supports.support.edit_support") : '<i class="fa fa-plus"></i> '.trans("supports.support.add_support") !!}
                    </h3>
                </div>

                <div class="panel-body">

                    {!! Form::open(['route'=>['support.edit_support'],'method' => 'post'])  !!}

                    <!-- Title support -->
                    <div class="form-group">

                        {!! Form::label('title',trans('supports.support.get_supports_edit_title'),': *') !!}
                        {!! Form::text('title',  $support->payroll_support_title, ['class' => 'form-control', 'placeholder' =>trans('supports.support.get_supports_edit_title')]) !!}

                        <span class="text-danger">{!! $errors->first('title') !!}</span>
                        <span class="input-example">{!!trans('supports.support.example_title_support')!!}</span>

                    </div>

                    <!-- List categories -->
                    <div class="form-group">
                        <div class="controls">

                            {!! Form::label('datacat',trans('supports.support.get_supports_edit_category'),': *') !!}
                            {!! Form::select('datacat',$data['cat'], $support->payroll_support_category_id, ['class' => 'form-control']) !!}

                            <span class="text-danger">{!! $errors->first('datacat') !!}</span>
                            <span class="input-example">{!!trans('supports.support.example_category_support')!!}</span>

                        </div>
                    </div>

                    <!-- Overview support -->
                    <div class="form-group">

                        {!! Form::label('overview',trans('supports.support.get_supports_edit_overview'),': *') !!}
                        {!! Form::textarea('overview', $support->payroll_support_overview , ['class' => 'form-control', 'row' => '10', 'placeholder' => trans('supports.support.get_supports_edit_overview')]) !!}

                        <span class="text-danger">{!! $errors->first('overview') !!}</span>
                        <span class="input-example">{!!trans('supports.support.example_overview_support')!!}</span>

                    </div>

                    <!-- Description support -->
                    @include('tinymce::tpl')  
                    <div class="form-group">

                        {!! Form::label('description',trans('supports.support.get_supports_edit_description'),': *') !!}
                        {!! Form::textarea('description', $support->payroll_support_description , ['class' => 'form-control tinymce', 'row' => '10', 'placeholder' => trans('supports.support.get_supports_edit_description')]) !!}

                        <span class="text-danger">{!! $errors->first('description') !!}</span>
                        <span class="input-example">{!!trans('supports.support.example_description_support')!!}</span>

                    </div>



                    {!! Form::hidden('id', $support->payroll_support_id) !!}

                    @if($support->payroll_support_id != null)

                        <a href="{!! URL::route('support.delete_support',['id' => $support->payroll_support_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">
                            {!!trans('front.routename_delete')!!}
                        </a>

                    @else

                        <a href="{!! URL::route('support.list') !!}" class="btn btn-danger pull-right margin-left-5">
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
        return confirm('{!!trans('supports.support.get_supports_delete')!!}');
    });

</script>
@stop