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
        
        <!-- title text field -->
        <div class="form-group">

            {!! Form::label('uid',trans('front.payrolls.uid'),': *') !!}
            {!! Form::text('uid',  @$input['uid'], ['class' => 'form-control', 'placeholder' =>trans('front.payrolls.uid')]) !!}

            <span class="text-danger">{!! $errors->first('uid') !!}</span>
        </div>
        
        <input type="submit" name="search" value="{!! trans('front.routename_hrm_search') !!}" class='btn btn-info pull-left'>
        
        <span class="filter-heading">Report</span>
        <div class="filter-report">
            <!-- todate field -->
            <div class="form-group" >
                <div class="controls">
                    
                    {!! Form::label('report_type','Mẫu report',': *') !!}
                    {!! Form::select('report_type',$data['payroll_reports'], 1, ['class' => 'form-control']) !!}
                   
                    <span class="text-danger">{!! $errors->first('datatype') !!}</span>
                </div>
            </div>
            
            <input type="submit" name="filter" value="Export" class='btn btn-info pull-right btn-export'>
        </div>
        
        {!! Form::close() !!}
    </div>
</div>
