
<!-- bedroome text field -->
<div class="form-group">
    {!! Form::label('bedroom',trans('re.bedroom').': *') !!}
    {!! Form::number('bedroom',$realestate->real_estate_bedroom, ['class' => 'form-control', 'placeholder' => trans('re.bedroom')]) !!}
    <span class="text-danger">{!! $errors->first('bedroom') !!}</span>
</div>

<!-- bathroom text field -->
<div class="form-group">
    {!! Form::label('bathroom',trans('re.bathroom').': *') !!}
    {!! Form::number('bathroom',$realestate->real_estate_bathroom, ['class' => 'form-control', 'placeholder' => trans('re.bedroom')]) !!}
    <span class="text-danger">{!! $errors->first('bathroom') !!}</span>
</div>

<!-- bathroom text field -->
<div class="form-group">
    {!! Form::label('sq',trans('re.sq').': *') !!}
    {!! Form::number('sq',$realestate->real_estate_sq, ['class' => 'form-control', 'placeholder' => trans('re.sq')]) !!}
    <span class="text-danger">{!! $errors->first('sq') !!}</span>
</div>

<!-- bathroom text field -->
<div class="form-group">
    {!! Form::label('build_year',trans('re.build_year').': *') !!}
    {!! Form::number('build_year',$realestate->real_estate_year_build, ['class' => 'form-control', 'placeholder' => trans('re.build_year')]) !!}
    <span class="text-danger">{!! $errors->first('build_year') !!}</span>
</div>

<!-- bathroom text field -->
<div class="form-group">
    {!! Form::label('cost',trans('re.cost').': *') !!}
    {!! Form::number('cost',$realestate->real_estate_cost, ['class' => 'form-control', 'placeholder' => trans('re.cost')]) !!}
    <span class="text-danger">{!! $errors->first('cost') !!}</span>
</div>