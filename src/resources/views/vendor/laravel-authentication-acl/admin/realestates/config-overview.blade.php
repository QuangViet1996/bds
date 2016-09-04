<!-- title text field -->
<div class="form-group">
    {!! Form::label('title',trans('re.title').': *') !!}
    {!! Form::text('title',$realestate->real_estate_title, ['class' => 'form-control', 'placeholder' => trans('re.title')]) !!}
    <span class="text-danger">{!! $errors->first('title') !!}</span>
</div>

<!--CATEGORY-->
<div class="form-group">
    <div class="controls">

        {!! Form::label('datacat',trans('re.category'),': *') !!}
        {!! Form::select('datacat',$data['cat'], $realestate->real_estate_category_id, ['class' => 'form-control']) !!}

        <span class="text-danger">{!! $errors->first('datacat') !!}</span>

    </div>
</div>
<!--/CATEGORY-->

<!--DESCRIPTION-->
<div class="form-group">
    {!! Form::label('overview',trans('re.overview').': *') !!}
    {!! Form::textarea('overview',$realestate->real_estate_overview, ['class' => 'form-control', 'rows' => 5,  'placeholder' => trans('re.overview')]) !!}
    <span class="text-danger">{!! $errors->first('overview') !!}</span>
</div>
<!--/DESCRIPTION-->

<!--DESCRIPTION-->
@include('tinymce::tpl')
<div class="form-group">
    {!! Form::label('description',trans('re.description').': *') !!}
    {!! Form::textarea('description',$realestate->real_estate_description, ['class' => 'form-control tinymce', 'rows' => 40,  'placeholder' => trans('re.description')]) !!}
    <span class="text-danger">{!! $errors->first('description') !!}</span>
</div>
<!--/DESCRIPTION-->
