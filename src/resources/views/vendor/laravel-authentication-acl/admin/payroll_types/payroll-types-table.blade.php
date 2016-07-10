<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('hrm.add_payrolltype') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> {!!trans('front.payrolls.add_new_types')!!}</a>
    </div>
</div>

@if( isset($data['payroll_types']) )
@if( ! $data['payroll_types']->isEmpty() )

<table class="table table-hover">

    <thead>
        <tr>
            <th style="width:5%">STT</th>
            <th style="width:30%">{!!trans('front.payrolls.types')!!}</th>
            <th style="width:10%">{!!trans('front.payrolls.payroll_type_template_file')!!}</th>
            <th style="text-align: center; width:15%">{!!trans('front.payrolls.payroll_type_fromrow')!!}</th>
            <th style="text-align: center; width:15%">{!!trans('front.payrolls.payroll_type_col_user')!!}</th>
            <th style="text-align: center; width:15%">{!!trans('front.payrolls.payroll_type_total_configs')!!}</th>
            <th style="width:10%; text-align: right;">{!!trans('front.payrolls.operations')!!}</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $nav = $data['payroll_types']->toArray();
        $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($data['payroll_types'] as $item)

        <tr>

            <td><?php
                echo $counter;
                $counter++;
                ?>
            </td>

            <td style="text-align: left;">
                <a href="{!! URL::route('hrm.view_payrolltype', ['id' => $item->payroll_type_id]) !!}"> 
                    {!! $item->payroll_type_title !!}
                </a>
            </td>
            <td style="text-align: center;">
                <a href="{!! URL::route('downloadfile', ['fn' => $item->payroll_type_file_template, 'fp' => 'template_reports' ]) !!}">
                    {!! $item->payroll_type_file_template !!}
                </a>
            </td>
            <td style="text-align: center;">{!! $item->payroll_type_fromrow !!}</td>

            <td style="text-align: center;">{!! $item->payroll_type_col_user !!}</td>

            <td style="text-align: center;">{!! $item->total_configs !!}</td>

            <td style="text-align: right;">
                <a href="{!! URL::route('hrm.view_payrolltype', ['id' => $item->payroll_type_id]) !!}" title='{{ trans('front.payrolls.view_types') }}'><i class="fa fa-eye fa-2x"></i></a>
                <a href="{!! URL::route('hrm.edit_payrolltype', ['id' => $item->payroll_type_id]) !!}" class="margin-left-5" title='{{ trans('front.payrolls.edit_types') }}'><i class="fa fa-pencil-square-o fa-2x"></i></a>
                <a href="{!! URL::route('hrm.delete_payrolltype',['id' =>$item->payroll_type_id, '_token' => csrf_token()]) !!}" class="margin-left-5" title='{{ trans('front.payrolls.delete_types') }}'><i class="fa fa-trash-o delete fa-2x"></i></a>
            </td>

        </tr>
        @endforeach

    </tbody>

</table>

@else
<span class="text-warning"><h5>{!! trans('front.payrolls.not_found_payroll_types_table')!!}</h5></span>
@endif
@endif
<div class="paginator">
    {!! $data['payroll_types']->appends($data['request']->except(['page']) )->render() !!}
</div>