<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('report.add') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> {!!trans('front.payrolls.report_add_new')!!}</a>
    </div>
</div>

@if( isset($data['list']) )
@if( ! $data['list']->isEmpty() )

<table class="table table-hover">

    <thead>
        <tr>
            <th>STT</th>
            <th>{!!trans('front.payrolls.report_title')!!}</th>
            <th>{!!trans('front.payrolls.report_from_row')!!}</th>
            <th>{!!trans('front.payrolls.report_col_user')!!}</th>
            <th>{!!trans('front.payrolls.report_template')!!}</th>
            <th>{!!trans('front.payrolls.report_operation')!!}</th>
        </tr>
    </thead>

    <tbody>

        <?php $counter = ($data['list']['current_page'] - 1) * $data['list']['per_page'] + 1 ?>
        @foreach($data['list'] as $item)

        <tr>
            <td style="witdh:5%"><?php
                echo $counter;
                $counter++;
                ?></td>

            <td style="width:35%">
                <a href="{!! URL::route('report.view', ['id' => $item->payroll_report_id]) !!}"> 
                    {!! $item->payroll_report_title !!}
                </a>
            </td>

            <td style="width:15%">
                {!! $item->payroll_report_fromrow !!}
            </td>

            <td style="width:15%">
                {!! $item->payroll_report_user_col !!}
            </td>
            <td style="width:15%">
                <a href="{!! URL::route('downloadfile', ['fn' => $item->payroll_report_template_file, 'fp' => 'template_reports' ]) !!}">
                    {!! $item->payroll_report_template_file !!}
                </a>
            </td>

            <td style="witdh:30%">
                <a href="{!! URL::route('report.view', ['id' => $item->payroll_report_id]) !!}" title='{{ trans('front.payrolls.report_view') }}'><i class="fa fa-eye fa-2x"></i></a>
                <a href="{!! URL::route('report.edit', ['id' => $item->payroll_report_id]) !!}" class="margin-left-5" title='{{ trans('front.payrolls.report_edit') }}'><i class="fa fa-pencil-square-o fa-2x"></i></a>
                <a href="{!! URL::route('report.delete',['id' =>$item->payroll_report_id, '_token' => csrf_token()]) !!}" class="margin-left-5" title='{{ trans('front.payrolls.report_delete') }}'><i class="fa fa-trash-o delete fa-2x"></i></a>
            </td>

        </tr>

        @endforeach

    </tbody>

</table>
@else
<span class="text-warning"><h5>{!! trans('front.payrolls.not_have_report_table')!!}</h5></span>
@endif
@endif
<div class="paginator">
    {!! $data['list']->appends($data['request']->except(['page']) )->render() !!}
</div>
