<div class="panel panel-info">
    
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i> Payroll search</h3>
    </div>
    
    <div class="panel-body">
        {!! Form::open(['route' => 'hrm.payrolls','method' => 'post']) !!}
        
        <!-- fromdate field -->
        <div class="form-group">
            
            {!! Form::label('fromdate','Fromt date:') !!}
            {!! Form::text('fromdate', null, ['class' => 'form-control fromdate', 'placeholder' => 'From date']) !!}
            
            <span class="text-danger">{!! $errors->first('fromdate') !!}</span>
        </div>
        
        <!-- todate field -->
        <div class="form-group">
            
            {!! Form::label('todate','To date:') !!}
           
            {!! Form::text('todate', null, ['class' => 'form-control todate', 'placeholder' => 'From date']) !!}
            <span class="text-danger">{!! $errors->first('todate') !!}</span>
        </div>
        
        {!! Form::submit('Search', ["class" => "btn btn-info pull-left"]) !!}
        {!! Form::submit('Export', ["class" => "btn btn-info pull-right"]) !!}
        {!! Form::close() !!}
    </div>
</div>
