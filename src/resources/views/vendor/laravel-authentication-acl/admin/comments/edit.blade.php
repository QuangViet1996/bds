@extends('vendor.laravel-authentication-acl.admin.layouts.base-2cols')


@section('title')
                       {!!trans('front.page_comments')!!}

@stop

@section('content')

@if( isset($data['cmt']) )

    <?php $cmt = $data['cmt'] ?>

@else

    <?php
        $cmt = new stdClass();
        $cmt->real_estate_comment_id = null;
        $cmt->real_estate_comment_real_estate_id = '';
        $cmt->real_estate_comment_title = '';
        $cmt->real_estate_comment_description = '';
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
                        {!! isset($cmt->real_estate_comment_id) ? '<i class="fa fa-pencil"></i> '.trans("front.comments.edit") : '<i class="fa fa-plus"></i> '.trans("front.comments.add") !!}
                    </h3>
                </div>
                
                <div class="panel-body">
                    {!! Form::open(['route'=>['comments.edit'],'method' => 'post'])  !!}

                    <!-- title text field -->
                    <div class="form-group">
                        
                        {!! Form::label('title',trans('front.comments.title'),': *') !!}
                        {!! Form::text('title',  $cmt->real_estate_comment_title, ['class' => 'form-control', 'placeholder' =>trans('front.comments.title')]) !!}
                       
                        <span class="text-danger">{!! $errors->first('title') !!}</span>
                        
                    </div>
                    <div class="form-group">
                        
                        {!! Form::label('house_id',trans('front.comments.house_id'),': *') !!}
                        {!! Form::text('house_id',  $cmt->real_estate_comment_real_estate_id, ['class' => 'form-control', 'placeholder' =>trans('front.comments.title')]) !!}
                       
                        <span class="text-danger">{!! $errors->first('title') !!}</span>
                        
                    </div>

                    <!-- description text field -->
                    @include('tinymce::tpl')  
                    <div class="form-group">
                        
                        {!! Form::label('description',trans('front.comments.description'),': *') !!}
                        {!! Form::text('description', $cmt->real_estate_comment_description , ['class' => 'form-control tinymce', 'placeholder' => trans('front.comments.description')]) !!}
                       
                        <span class="text-danger">{!! $errors->first('description') !!}</span>

                    </div>

                    {!! Form::hidden('id', $cmt->real_estate_comment_id) !!}
                    @if($cmt->real_estate_comment_id != null)
                    
                        <a href="{!! URL::route('comments.delete',['id' => $cmt->real_estate_comment_id, '_token' => csrf_token()]) !!}" class="btn btn-danger pull-right margin-left-5 delete">
                            {!!trans('front.delete')!!}
                        </a>
                    
                    @else
                    
                        <a href="{!! URL::route('comments.list') !!}" class="btn btn-danger pull-right margin-left-5">
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
            return confirm('{!!trans('front.comments.you_want_delete')!!}');
        });

    </script>
@stop