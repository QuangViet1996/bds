<!-- title text field -->
<div class="form-group">
    {!! Form::label('title',trans('re.title').': *') !!}
    {!! Form::text('title',$realestate->real_estate_title, ['class' => 'form-control', 'placeholder' => trans('re.title')]) !!}
    <span class="text-danger">{!! $errors->first('title') !!}</span>
</div>

<!-- description text field -->
@include('tinymce::tpl')
<div class="form-group">
    {!! Form::label('description',trans('re.description').': *') !!}
    {!! Form::text('description',$realestate->real_estate_description, ['class' => 'form-control tinymce', 'placeholder' => trans('re.description')]) !!}
    <span class="text-danger">{!! $errors->first('description') !!}</span>
</div>

<!-- List categories -->
<div class="form-group">
    <div class="controls">

        {!! Form::label('datacat',trans('re.category'),': *') !!}
        {!! Form::select('datacat',$data['cat'], $realestate->real_estate_category_id, ['class' => 'form-control']) !!}

        <span class="text-danger">{!! $errors->first('datacat') !!}</span>

    </div>
</div>
