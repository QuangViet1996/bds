@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')


@section('title')
                       {!!trans('front.page_categories')!!}

@stop

@section('content')

@if( isset($data['cat']) )

    <?php $cat = $data['cat'] ?>

@else

    <?php
        $cat = new stdClass();
        $cat->payroll_support_category_id = null;
        $cat->payroll_support_category_title = '';
        $cat->payroll_support_category_description = '';
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
                        {!! isset($cat->payroll_support_category_id) ? '<i class="fa fa-pencil"></i> '.trans("categories.category.edit_support") : '<i class="fa fa-plus"></i> '.trans("categories.category.add_support") !!}
                    </h3>
                </div>
                
                <div class="panel-body">
                    {!! Form::open(['route'=>['categories.edit'],'method' => 'post'])  !!}

                    <!-- title text field -->
                    <div class="form-group">
                        
                        {!! Form::label('title',trans('categories.category.get_supports_edit_title'),': *') !!}
                        {!! Form::text('title',  $cat->payroll_support_category_title, ['class' => 'form-control', 'placeholder' =>trans('categories.category.get_supports_edit_title')]) !!}
                       
                        <span class="text-danger">{!! $errors->first('title') !!}</span>
                        <span class="input-example">{!!trans('categories.category.example_title_support')!!}</span>
                        
                    </div>

                    <!-- description text field -->
                    @include('tinymce::tpl')  
                    <div class="form-group">
                        
                        {!! Form::label('description',trans('categories.category.get_supports_edit_description'),': *') !!}
                        {!! Form::text('description', $cat->payroll_support_category_description , ['class' => 'form-control tinymce', 'placeholder' => trans('categories.category.get_supports_edit_description')]) !!}
                       
                        <span class="text-danger">{!! $errors->first('description') !!}</span>
                        <span class="input-example">{!!trans('categories.category.example_description_support')!!}</span>

                    </div>

                    {!! Form::hidden('id', $cat->payroll_support_category_id) !!}
                    @if($cat->payroll_support_category_id != null)
                    
                        <a href="{!! URL::route('categories.delete',['id' => $cat->payroll_support_category_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">
                            {!!trans('front.routename_delete')!!}
                        </a>
                    
                    @else
                    
                        <a href="{!! URL::route('categories.list') !!}" class="btn btn-danger pull-right margin-left-5">
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