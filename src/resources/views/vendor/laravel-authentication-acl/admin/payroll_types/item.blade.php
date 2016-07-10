<div class="row">
    
    <div class="col-md-12 margin-bottom-12">
        
        <span class="payroll-controll controll-unconfirm">
            <a href="{!! URL::route('hrm.add_payrolltype') !!}" class="btn btn-info  payroll-confirm"><i class="fa fa-plus"></i> {!!trans('front.payrolls.add_new_types')!!}</a>
        </span>
        
        <span class="payroll-controll controll-edit">
            <a href="{!! URL::route('hrm.edit_payrolltype', ['id' => $data['payroll_types']->payroll_type_id]) !!}" class="btn btn-info"><i class="fa fa-pencil"></i> {!!trans('front.payrolls.edit_types')!!}</a>
        </span>
        
        <span class="payroll-controll controll-delete">
            <a href="{!! URL::route('hrm.delete_payrolltype',['id' =>$data['payroll_types']->payroll_type_id, '_token' => csrf_token()]) !!}" class="btn btn-info  payroll-delete delete"><i class="fa fa-times"></i> {!!trans('front.payrolls.delete_types')!!}</a>
        </span>
        
    </div>
    
</div>

@if( !empty($data['payroll_types']) )

    <!--Title-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!!trans('front.payrolls.payroll_type_title') !!}</span>
            <div class="item-value">{!! $data['payroll_types']->payroll_type_title !!}</div>
        </div>
    </div>

    <!--From row-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('front.payrolls.payroll_type_fromrow') !!}</span>
            <div class="item-value">{!! $data['payroll_types']->payroll_type_fromrow !!}</div>
        </div>
    </div>

    <!--Column user-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('front.payrolls.payroll_type_col_user') !!}</span>
            <div class="item-value">{!! $data['payroll_types']->payroll_type_col_user !!}</div>
        </div>
    </div>


    <!--Payroll type fields-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!!trans('front.payrolls.payroll_type_field_table')!!}</span>

            <div class="item-value">
                @include('vendor.laravel-authentication-acl.admin.payroll_type_fields.payroll-type-fields-table')
            </div>
        </div>
    </div>

@endif
@section('footer_scripts')
<script>
    $(".delete").click(function () {
        return confirm('{!!trans('front.alert_you_want_delete_payroll_types')!!}');
    });
   $(".deletes").click(function () {
        return confirm('{!! trans('front.alert_you_want_delete_payroll_type_field') !!}');
    });
</script>
@stop