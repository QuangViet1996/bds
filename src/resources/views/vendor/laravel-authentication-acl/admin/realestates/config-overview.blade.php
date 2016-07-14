<!-- title text field -->
<div class="form-group">
    {!! Form::label('title',trans('front.houses.title').': *') !!}
    {!! Form::text('title',$realestate->real_estate_title, ['class' => 'form-control', 'placeholder' => trans('front.houses.title')]) !!}
    <span class="text-danger">{!! $errors->first('title') !!}</span>
</div>

<!-- description text field -->
@include('tinymce::tpl')
<div class="form-group">
    {!! Form::label('description',trans('front.houses.description').': *') !!}
    {!! Form::text('description',$realestate->real_estate_description, ['class' => 'form-control tinymce', 'placeholder' => trans('front.houses.description')]) !!}
    <span class="text-danger">{!! $errors->first('description') !!}</span>
</div>

<!-- List categories -->
<div class="form-group">
    <div class="controls">

        {!! Form::label('datacat',trans('houses.house.get_supports_edit_category'),': *') !!}
        {!! Form::select('datacat',$data['cat'], $realestate->real_estate_category_id, ['class' => 'form-control']) !!}

        <span class="text-danger">{!! $errors->first('datacat') !!}</span>

    </div>
</div>
