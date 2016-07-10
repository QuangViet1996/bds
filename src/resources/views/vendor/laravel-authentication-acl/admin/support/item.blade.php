<div class="row">
    <div class="col-md-12 margin-bottom-12">
        
        <!--Button add support-->
        <span class="payroll-controll">
            
            <a href="{!! URL::route('support.add_support') !!}" class="btn btn-info"><i class="fa fa-plus"></i> 
                {!!trans('supports.support.view_support_add_new')!!}
            </a>
            
        </span>
        
        <!--Button edit support-->
        <span class="payroll-controll controll-edit">
            
            <a href="{!! URL::route('support.edit_support', ['id' => $data['payroll_support']->payroll_support_id]) !!}" class="btn btn-info">
                <i class="fa fa-pencil"></i> {!!trans('supports.support.view_support_edit')!!}
            </a>
            
        </span>

        <!--Button delete support-->
        <span class="payroll-controll controll-delete">
            
            <a href="{!! URL::route('support.delete_support',['id' =>$data['payroll_support']->payroll_support_id, '_token' => csrf_token()]) !!}" class="btn btn-info  payroll-delete">
                <i class="fa fa-times"></i> {!!trans('supports.support.view_support_delete')!!}
            </a>
            
        </span>

    </div>
</div>

@if( !empty($data['payroll_support']) )

    <!--Title support-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('supports.support.view_support_title') !!}</span>
            <div class="item-value">{!! $data['payroll_support']->payroll_support_title !!}</div>
        </div>
    </div>
    
      <!--Category-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('supports.support.view_support_category') !!}</span>
            <div class="item-value">{!! @$data['cat']->payroll_support_category_title !!}</div>
        </div>
    </div>
      
    <!--Create date support-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('supports.support.view_support_create') !!}</span>
            <div class="item-value">{!!date('d-m-Y', $data['payroll_support']->payroll_support_created_date)!!}</div>
        </div>
    </div>
    
     <!--Overview support-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('supports.support.view_support_overview') !!}</span>
            <div class="item-value">{!! $data['payroll_support']->payroll_support_overview !!}</div>
        </div>
    </div>
     
    <!--Description support-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('supports.support.view_support_description') !!}</span>
            <div class="item-value">{!! $data['payroll_support']->payroll_support_description !!}</div>
        </div>
    </div>
    
@endif

@section('footer_scripts')
<script>
    $(".payroll-delete").click(function(){
    return confirm('{!!trans('supports.support.get_supports_delete')!!}');
    });
</script>
@stop