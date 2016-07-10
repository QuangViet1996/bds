<div class="row">
    
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('hrm.add_payroll') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> {!!trans('front.payrolls.add_new')!!}</a>
    </div>

</div>

@if( isset($data['payrolls']) )
@if( ! $data['payrolls']->isEmpty() )

    <table class="table table-hover">

        <thead>
            <tr>
                <th style="witdh:2%">STT</th>
                <th style="width:33%">{!!trans('front.payrolls.title')!!}</th>
                <th style="width:15%">{!!trans('front.payrolls.date')!!}</th>
                <th style="witdh:100%">{!!trans('front.payrolls.status')!!}</th>
                <th style="witdh:100%">{!!trans('front.payrolls.operations')!!}</th>
            </tr>
        </thead>

        <tbody>

            <?php
                $nav = $data['payrolls']->toArray();
                $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
            ?>
            @foreach($data['payrolls'] as $payroll)

            <tr>
                <!--STT -->
                <td>
                    <?php echo $counter;
                    $counter++; ?>
                </td>

                <!-- Payroll title-->
                <td><a href="{!! URL::route('hrm.view_payroll', ['id' => $payroll->payroll_id]) !!}">{!! $payroll->payroll_title !!}</a></td>

                <!--Payroll create date -->
                <td>{!! date('d-m-Y', $payroll->payroll_date) !!}</td>

                <td>  
                    <?php if ($payroll->payroll_status == 1): ?>
                        <span class="checked">{!!trans('front.payrolls.status_checked')!!}</span>
                    <?php elseif ($payroll->payroll_status == 0): ?>
                        <span class="not-checked"> {!!trans('front.payrolls.status_not_checked')!!}</span>
                    <?php endif; ?>
                </td>

                <td style="witdh:10%">
                    <a href="{!! URL::route('hrm.view_payroll', ['id' => $payroll->payroll_id]) !!}" title='{{ trans('front.routename_hrm_view') }}'><i class="fa fa-eye fa-2x"></i></a>
                    <a href="{!! URL::route('hrm.edit_payroll', ['id' => $payroll->payroll_id]) !!}" title='{{ trans('front.payrolls.edit_payrolls') }}' class="margin-left-5"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                    <a href="{!! URL::route('hrm.delete_payroll',['id' =>$payroll->payroll_id, '_token' => csrf_token()]) !!}"  title='{{ trans('front.payrolls.delete_payrolls') }} ' class="margin-left-5"><i class="fa fa-trash-o delete fa-2x"></i></a>
                </td>

            </tr>
            @endforeach

        </tbody>

    </table>

@else
    <span class="text-warning"><h5>{!! trans('front.payrolls.not_have_payroll_table')!!}</h5></span>
@endif
@endif
<div class="paginator">
    {!! $data['payrolls']->appends($data['request']->except(['page']) )->render() !!}
</div>