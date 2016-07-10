@if( isset($data['payroll_users']) )
    @if( ! $data['payroll_users']->isEmpty() )
    
        <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>{!!trans('front.detail.exchange')!!}</th>
                <th>{!!trans('front.detail.date_exchange')!!}</th>
                <th style="width:35%; text-align: right">{!!trans('front.detail.money_exchange')!!}</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $nav = $data['payroll_users']->toArray();
                $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
                ?>
                @foreach($data['payroll_users'] as $payroll)
                <tr>
                    <td style="width:5%"><?php echo $counter; $counter++; ?></td>
                    <td style="width:50%">{!! $payroll->payroll_title !!} - {!! $payroll->payroll_type_field_title !!}</td>
                    <td style="width:25%">{!! date('d-m-Y', $payroll->payroll_date_trans) !!}</td>
                    <td style="width:20%; text-align: right"><?php  echo number_format($payroll->payroll_user_received,0) ?></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <span class="text-warning"><h5>{!!trans('front.detail.not_found')!!}</h5></span>
    @endif
@endif
<div class="paginator">
    {!! $data['payroll_users']->appends($data['request']->except(['page']) )->render() !!}
</div>