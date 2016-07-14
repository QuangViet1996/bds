<div class="panel panel-info">
    
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i> {!! trans('front.routename_hrm_search')!!}</h3>
    </div>
    
    <div class="panel-body">
        <?php $input = $data['request']->all(); ?>
        {!! Form::open(['route' => 'hrm.payrolls','method' => 'get']) !!}
        
        <!-- fromdate field -->
        <div class="form-group">
            
            {!! Form::label('fromdate',trans('front.routename_fromt_date')),':' !!}
            {!! Form::text('fromdate', @$input['fromdate'], ['class' => 'form-control fromdate', 'placeholder' => trans('front.routename_fromt_date')]) !!}
           
            <span class="text-danger">{!! $errors->first('fromdate') !!}</span>
        </div>
        
        <!-- todate field -->
        <div class="form-group">
            
            {!! Form::label('todate',trans('front.routename_to_date')),':' !!}
            {!! Form::text('todate', @$input['todate'], ['class' => 'form-control todate', 'placeholder' => trans('front.routename_to_date')]) !!}
           
            <span class="text-danger">{!! $errors->first('todate') !!}</span>
        </div>
        
        <input type="submit" name="search" value="{!! trans('front.routename_hrm_search') !!}" class='btn btn-info pull-left'>
        
        {!! Form::close() !!}
    </div>
</div>
