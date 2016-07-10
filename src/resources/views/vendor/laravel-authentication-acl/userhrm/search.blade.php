<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i> {!!trans('front.detail.search_exchange')!!}</h3>
    </div>
    <div class="panel-body">
        <?php $input = $data['request']->all(); ?>
        {!! Form::open(['route' => 'userhrm.list','method' => 'get']) !!}
        
        <!-- fromdate field -->
        <div class="form-group">
            {!! Form::label('fromdate',trans('front.detail.search_from_date').':') !!}
            {!! Form::text('fromdate',  @$input['fromdate'], ['class' => 'form-control fromdate', 'placeholder' => trans('front.detail.search_from_date')]) !!}
            <span class="text-danger">{!! $errors->first('fromdate') !!}</span>
        </div>
        
        <!-- todate field -->
        <div class="form-group">
            {!! Form::label('todate',trans('front.detail.search_to_date').':') !!}
            {!! Form::text('todate',  @$input['todate'], ['class' => 'form-control todate', 'placeholder' => trans('front.detail.search_to_date')]) !!}
            <span class="text-danger">{!! $errors->first('todate') !!}</span>
        </div>
        
        {!! Form::submit(trans('front.detail.search'), ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>
