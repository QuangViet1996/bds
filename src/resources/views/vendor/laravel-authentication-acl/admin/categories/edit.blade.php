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
        $cat->real_estate_category_id = null;
        $cat->real_estate_category_title = '';
        $cat->real_estate_category_description = '';
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
                        {!! isset($cat->real_estate_category_id) ? '<i class="fa fa-pencil"></i> '.trans("front.categories.edit_support") : '<i class="fa fa-plus"></i> '.trans("front.categories.add_support") !!}
                    </h3>
                </div>
                
                <div class="panel-body">
                    {!! Form::open(['route'=>['categories.edit'],'method' => 'post'])  !!}

                    <!-- title text field -->
                    <div class="form-group">
                        
                        {!! Form::label('title',trans('front.categories.edit_title'),': *') !!}
                        {!! Form::text('title',  $cat->real_estate_category_title, ['class' => 'form-control', 'placeholder' =>trans('front.categories.edit_title')]) !!}
                       
                        <span class="text-danger">{!! $errors->first('title') !!}</span>
                        
                    </div>

                    <!-- description text field -->
                    @include('tinymce::tpl')  
                    <div class="form-group">
                        
                        {!! Form::label('description',trans('front.categories.edit_description'),': *') !!}
                        {!! Form::text('description', $cat->real_estate_category_description , ['class' => 'form-control tinymce', 'placeholder' => trans('front.categories.edit_description')]) !!}
                       
                        <span class="text-danger">{!! $errors->first('description') !!}</span>

                    </div>

                    {!! Form::hidden('id', $cat->real_estate_category_id) !!}
                    @if($cat->real_estate_category_id != null)
                    
                        <a href="{!! URL::route('categories.delete',['id' => $cat->real_estate_category_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">
                            {!!trans('front.delete')!!}
                        </a>
                    
                    @else
                    
                        <a href="{!! URL::route('categories.list') !!}" class="btn btn-danger pull-right margin-left-5">
                            {!!trans('front.cancel')!!}
                        </a>

                    @endif
                    
                    {!! Form::submit(trans('front.save'), array("class"=>"btn btn-info pull-right ")) !!}

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
            return confirm('{!!trans('front.categories.you_want_delete')!!}');
        });

    </script>
@stop