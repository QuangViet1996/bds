<div class="row">

    <div class="col-md-12 margin-bottom-12">

        <div class="payroll-status">
            <span class="payroll-status-title">{!!trans('front.payrolls.status')!!}</span>
            <span class="payroll-status-val">
                <?php if ($data['payroll']->payroll_status == 1): ?>
                    {!!trans('front.payrolls.status_comfimed')!!}

                <?php elseif ($data['payroll']->payroll_status == 0): ?>
                    {!!trans('front.payrolls.status_not_comfim')!!}
                <?php endif; ?>
            </span>
        </div>
        <!--Button config payroll-->
        <?php if ($data['payroll']->payroll_status == 0): ?>
            <span class="payroll-controll controll-confirm">
                <a href="{!! URL::route('hrm.confirm_payroll', ['id' => $data['payroll']->payroll_id, 'status' => 1]) !!}" class="btn btn-info  payroll-confirm"><i class="fa fa-floppy-o"></i> {!!trans('front.payrolls.status_comfim')!!}</a>
            </span>

            <!--Button cancel config payroll-->
        <?php elseif ($data['payroll']->payroll_status == 1): ?>
            <span class="payroll-controll controll-unconfirm">
                <a href="{!! URL::route('hrm.confirm_payroll', ['id' => $data['payroll']->payroll_id, 'status' => 0]) !!}" class="btn btn-info payroll-undo"><i class="fa fa-undo "></i> {!!trans('front.payrolls.status_uncomfim')!!}</a>
            </span>
        <?php endif; ?>

        <!--Button edit payroll-->
        <span class="payroll-controll controll-edit">
            <a href="{!! URL::route('hrm.edit_payroll', ['id' => $data['payroll']->payroll_id]) !!}" class="btn btn-info"><i class="fa fa-pencil"></i> {!!trans('front.payrolls.status_edit')!!}</a>
        </span>

        <!--Button delete payroll-->
        <span class="payroll-controll controll-delete">
            <a href="{!! URL::route('hrm.delete_payroll',['id' =>$data['payroll']->payroll_id, '_token' => csrf_token()]) !!}" class="btn btn-info  payroll-delete"><i class="fa fa-times"></i> {!!trans('front.payrolls.status_delete')!!}</a>
        </span>

    </div>

</div>


@if( !empty($data['payroll']) )

<!--Title payroll-->
<div class="row payroll-view">
    <div class="payroll-item">
        <span class="item-title">{!! trans('front.payrolls.title') !!}</span>
        <div class="item-value">{!! $data['payroll']->payroll_title !!}</div>
    </div>
</div>

<!--Description payrolls-->
<div class="row payroll-view">
    <div class="payroll-item">
        <span class="item-title">{!! trans('front.payrolls.description') !!}</span>
        <div class="item-value">{!! $data['payroll']->payroll_description !!}</div>
    </div>
</div>

<!--Date creater payrolls-->
<div class="row payroll-view">
    <div class="payroll-item">
        <span class="item-title">{!! trans('front.payrolls.date') !!}</span>
        <div class="item-value">{!! date('d-m-Y', $data['payroll']->payroll_date) !!}</div>
    </div>
</div>

<!--Payroll table-->
<div class="row payroll-view col-md-12 col-sm-12 table-view">

    <div class="payroll-item">

        <span class="item-title">{!! trans('front.routename_hrm_list') !!}</span>
        <div class="item-value table-item-payroll">

            <?php $arr_payroll_user = $data['payroll_user']->toArray(); ?>

            <table>
                <thead>
                    <tr>
                        <th style="witdh:5%">STT</th>
                        <th style="witdh:18%">{!!trans('front.payrolls.ID_user')!!}</th>
                        <th style="witdh:30%">{!!trans('front.payrolls.full_name')!!}</th>

                        @foreach($data['payroll_type_fields'] as $item)
                        <th style="witdh:10%" class="col-money">{!! $item->payroll_type_field_title !!}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $arr_user = array();
                    $total_cols = array();
                    ?>
                    <?php for ($i = 0; $i < count($arr_payroll_user); $i++): ?>
                        <?php if (!in_array($arr_payroll_user[$i]['user_uid'], $arr_user)): ?>
                            <?php $arr_user[] = $arr_payroll_user[$i]['user_uid']; ?>

                            <tr>
                                <td>{!! $i+1 !!}</td>

                                <td>{!! $arr_payroll_user[$i]['user_uid'] !!}</td>

                                <td>{!! $arr_payroll_user[$i]['first_name'].' '.$arr_payroll_user[$i]['last_name'] !!}</td>

                                <?php $col_money = count($data['payroll_type_fields']); $count_col_money = 0;?>
                                <?php for ($j = $i; $j < count($arr_payroll_user); $j++): ?>
                                   
                                    <?php if ($arr_payroll_user[$j]['user_uid'] == $arr_payroll_user[$i]['user_uid']): ?>
                                        
                                        <td class="col-money">{!! number_format($arr_payroll_user[$j]['payroll_user_received'],0) !!}</td>

                                        <?php if (isset($total_cols[$arr_payroll_user[$j]['payroll_type_field_id']])): ?>
                                            <?php $total_cols[$arr_payroll_user[$j]['payroll_type_field_id']] += $arr_payroll_user[$j]['payroll_user_received']; ?>
                                        <?php else: ?>
                                            <?php $total_cols[$arr_payroll_user[$j]['payroll_type_field_id']] = $arr_payroll_user[$j]['payroll_user_received']; ?>
                                        <?php endif; ?>
                                        
                                        <?php $count_col_money++; ?>
                                    <?php endif; ?>

                                <?php endfor; ?>
                                
                                <?php if ($count_col_money != ($col_money - 1)):  ?>
                                    <?php for($t = $count_col_money; $t < $col_money; $t++): ?>
                                        <td class="col-money"></td>
                                    <?php endfor; ?>
                                <?php endif; ?>
                                
                            </tr>
                        <?php endif; ?>
                    <?php endfor; ?>

                    <!--TOTAL-->
                    <tr>

                        <td colspan="3">{!!trans('front.payrolls.total_money')!!}</td>

                        @foreach($data['payroll_type_fields'] as $item)
                        
                        <th style="witdh:10%" class="col-money">{!! number_format(@$total_cols[$item->payroll_type_field_id],0) !!}</th>
                        
                        @endforeach
                        
                    </tr>
                    
                </tbody>

            </table>

        </div>

    </div>

</div>

@endif

@section('footer_scripts')
<script>
    $(".payroll-delete").click(function(){
    return confirm('{!!trans('front.alert_you_want_delete_payroll')!!}');
    });
    $(".payroll-undo").click(function(){
    return confirm('{!!trans('front.alert_you_not_confim_payroll')!!}');
    });
    $(".payroll-confirm").click(function(){
    return confirm('{!!trans('front.alert_you_confim_payroll')!!}');
    });
</script>
@stop