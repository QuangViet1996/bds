<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i> {!! trans('front.routename_hrm_search')!!}</h3>
    </div>
    <div class="panel-body">
        {!! Form::open(['route' => 'hrm.payrolltypes','method' => 'post']) !!}
        
        <!-- fromdate field -->
        <div class="form-group">
            {!! Form::label('fromdate',trans('front.routename_fromt_date')),':' !!}
            {!! Form::text('fromdate', null, ['class' => 'form-control fromdate', 'placeholder' => trans('front.routename_fromt_date')]) !!}
            <span class="text-danger">{!! $errors->first('fromdate') !!}</span>
        </div>
        
        <!-- todate field -->
        <div class="form-group">
            {!! Form::label('todate',trans('front.routename_to_date')),':' !!}
            {!! Form::text('todate', null, ['class' => 'form-control todate', 'placeholder' => trans('front.routename_to_date')]) !!}
            <span class="text-danger">{!! $errors->first('todate') !!}</span>
        </div>
        
        {!! Form::submit(trans('front.routename_hrm_search'), ["class" => "btn btn-info pull-left"]) !!}
        {!! Form::submit('Export', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>
