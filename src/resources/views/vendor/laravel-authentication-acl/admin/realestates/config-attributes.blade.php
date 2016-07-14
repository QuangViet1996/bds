
<!-- bedroome text field -->
<div class="form-group">
    {!! Form::label('bedroom',trans('front.houses.bedroom').': *') !!}
    {!! Form::number('bedroom',$houses->real_estate_bedroom, ['class' => 'form-control', 'placeholder' => trans('front.houses.bedroom')]) !!}
    <span class="text-danger">{!! $errors->first('bedroom') !!}</span>
</div>

<!-- bathroom text field -->
<div class="form-group">
    {!! Form::label('bathroom',trans('front.houses.bathroom').': *') !!}
    {!! Form::number('bathroom',$houses->real_estate_bathroom, ['class' => 'form-control', 'placeholder' => trans('front.houses.bedroom')]) !!}
    <span class="text-danger">{!! $errors->first('bathroom') !!}</span>
</div>

<!-- bathroom text field -->
<div class="form-group">
    {!! Form::label('sq',trans('front.houses.sq').': *') !!}
    {!! Form::number('sq',$houses->real_estate_sq, ['class' => 'form-control', 'placeholder' => trans('front.houses.sq')]) !!}
    <span class="text-danger">{!! $errors->first('sq') !!}</span>
</div>

<!-- bathroom text field -->
<div class="form-group">
    {!! Form::label('build_year',trans('front.houses.build_year').': *') !!}
    {!! Form::number('build_year',$houses->real_estate_year_build, ['class' => 'form-control', 'placeholder' => trans('front.houses.build_year')]) !!}
    <span class="text-danger">{!! $errors->first('build_year') !!}</span>
</div>