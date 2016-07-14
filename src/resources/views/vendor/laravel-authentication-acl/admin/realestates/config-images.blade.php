<!--image-->
<div class="form-group">
    <div class="controls">

        {!! Form::label('image',trans('realesates.image'),': *') !!}
        {!! Form::file('image') !!}

        <span class="text-danger">{!! $errors->first('image') !!}</span>

    </div>
    @if($realestate->real_estate_images)
    <div class="img-thumb">
        <img src="{!! url($data['configs']['urlpath'].'/'.$realestate->real_estate_images) !!}">
    </div>
    @endif
</div>