<div class="row">
    
    <div class="col-md-12 margin-bottom-12">
        
        <span class="payroll-controll controll-unconfirm">
            <a href="{!! URL::route('report.add') !!}" class="btn btn-info  payroll-confirm"><i class="fa fa-plus"></i> {!!trans('front.payrolls.report_add_new')!!}</a>
        </span>
        
        <span class="payroll-controll controll-edit">
            <a href="{!! URL::route('report.edit', ['id' => $data['payroll_report']->payroll_report_id]) !!}" class="btn btn-info"><i class="fa fa-pencil"></i> {!!trans('front.payrolls.report_edit')!!}</a>
        </span>
        
        <span class="payroll-controll controll-delete">
            <a href="{!! URL::route('report.delete',['id' =>$data['payroll_report']->payroll_report_id, '_token' => csrf_token()]) !!}" class="btn btn-info  payroll-delete delete"><i class="fa fa-times"></i> {!!trans('front.payrolls.report_delete')!!}</a>
        </span>
        
    </div>

</div>

@if( !empty($data['payroll_report']) )

    <!--Report title-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!!trans('front.payrolls.report_title') !!}</span>
            <div class="item-value">{!! $data['payroll_report']->payroll_report_title !!}</div>
        </div>
    </div>

    <!--Report description-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('front.payrolls.report_description') !!}</span>
            <div class="item-value">{!! $data['payroll_report']->payroll_report_description !!}</div>
        </div>
    </div>
    
    <!--Report Fromm row-->
     <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('front.payrolls.report_from_row') !!}</span>
            <div class="item-value">{!! $data['payroll_report']->payroll_report_fromrow !!}</div>
        </div>
    </div>
    
     <!--Report column user-->
     <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('front.payrolls.report_col_user') !!}</span>
            <div class="item-value">{!! $data['payroll_report']->payroll_report_user_col !!}</div>
        </div>
    </div>
    
    <!--Report template file-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('front.payrolls.report_template') !!}</span>
            <div class="item-value">{!! $data['payroll_report']->payroll_report_template_file !!}</div>
        </div>
    </div>
    
    <!--Payroll report fields-->
    <div class="row payroll-view">
        <div class="payroll-item">
            <span class="item-title">{!! trans('front.payrolls.report_field')!!}</span>
            <div class="item-value">
                @include('vendor.laravel-authentication-acl.admin.payroll_report_fields.payroll-report-fields-table')
            </div>
        </div>
    </div>

@endif
@section('footer_scripts')
    <script>
        $(".delete").click(function(){
            return confirm('{!!trans('front.alert_you_want_delete_payroll_types')!!}');
        });
    </script>
@stop
