
@if( isset($data['payroll_report_fields']) )
@if( ! $data['payroll_report_fields']->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <th>STT</th>
            <th> {!!trans('front.payrolls.report_field_types')!!}</th>
            <th> {!!trans('front.payrolls.report_field_insert_col')!!}</th>
            <th style="text-align: center">{!!trans('front.payrolls.operations')!!}</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach($data['payroll_report_fields'] as $key => $item)
        
            <tr>
                <td style="witdh:5%"><?php ++$key; echo $key; ?></td>

                <td style="width:35%">{!! @$data['payroll_type_fields_in_report'][$item->payroll_type_field_name] !!}</td>
                
                <td style="width:35%">{!! $item['payroll_report_field_val'] !!}</td>
                
                <td style="witdh:30%;text-align: center">
                    <a href="{!! URL::route('hrm.edit_payrollreportfield', ['id' => $item->payroll_report_field_id]) !!}" title='{{trans('front.payrolls.report_field_edit')}}'><i class="fa fa-pencil-square-o fa-2x"></i></a>
                    <a href="{!! URL::route('hrm.delete_payrollreportfield',['id' =>$item->payroll_report_field_id, '_token' => csrf_token()]) !!}" class="margin-left-5 deletes" title='{{trans('front.payrolls.report_field_delete')}}'><i class="fa fa-trash-o fa-2x"></i></a>
                </td>
        </tr>
        
        @endforeach
    </tbody>
</table>
@else
<span class="text-warning"><h5>{!! trans('front.payrolls.not_have_report_field')!!}.</h5></span>
@endif
@endif
<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('hrm.add_payrollreportfield') !!}" class="tch btn btn-info pull-right"><i class="fa fa-plus"></i> {!!trans('front.payrolls.payroll_type_field_add_new')!!}</a>
    </div>
</div>
@section('footer_scripts')
    <script>
        $(".deletes").click(function(){
            return confirm('{!!trans('front.alert_you_want_delete_payroll_type_field')!!}');
        });
         $(".delete").click(function(){
            return confirm('{!!trans('front.alert_you_want_delete_report')!!}');
        });
    </script>
    
@stop