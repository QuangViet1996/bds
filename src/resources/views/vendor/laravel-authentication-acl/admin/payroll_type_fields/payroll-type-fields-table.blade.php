
@if( isset($data['payroll_type_fields']) )
@if( ! $data['payroll_type_fields']->isEmpty() )

    <table class="table table-hover">

        <thead>
            <tr>
                <th style="width:5%">STT</th>
                <th style="width:35%"> {!!trans('front.payrolls.payroll_type_field_name')!!}</th>
                <th style="width:10%; text-align: center">{!!trans('front.payrolls.payroll_type_field_val')!!}</th>
                <th style="width:10%; text-align: center">{!!trans('front.payrolls.status')!!}</th>
                <th style="width:10%; text-align: center">{!!trans('front.payrolls.payroll_type_field_vat')!!}</th>
                <th style="width:10%; text-align: center">{!!trans('front.payrolls.payroll_type_field_insurrance')!!}</th>
                <th style="width:10%">{!!trans('front.payrolls.operations')!!}</th>
            </tr>
        </thead>
        <tbody>

            @foreach($data['payroll_type_fields'] as $key => $item)

            <tr>
                <td><?php ++$key; echo $key; ?></td>
                
                <td>{!! $item->payroll_type_field_title !!}</td>

                <td style="text-align: center">{!! $item->payroll_type_field_val !!}</td>

                <td style="text-align: center"> 

                    @if( $item->payroll_type_field_isvisible == $data['is']['show']) 
                        <i class="fa fa-eye status-eye" title='{{trans('front.payrolls.show_payroll_type_field')}}' ></i> 
                    @else 
                        <i class="fa fa-eye-slash" title='{{trans('front.payrolls.hide_payroll_type_field')}}'></i> 
                    @endif

                </td>

                <td style="text-align: center"> 

                    @if( $item->payroll_type_field_isvat == $data['is']['yes']) 
                        <i class="fa fa-check" title='{{trans('front.payrolls.payroll_type_field_vat_1')}}' ></i> 
                    @else 
                        <i class=""></i> 
                    @endif

                </td>

                <td style="text-align: center"> 

                    @if( $item->payroll_type_field_isinsurrance == $data['is']['yes']) 
                        <i class="fa fa-check" title='{{trans('front.payrolls.payroll_type_field_insurrance_yes')}}' ></i> 
                    @else 
                        <i class=""></i> 
                    @endif

                </td>

                <td>
                    <a href="{!! URL::route('hrm.edit_payrolltypefield', ['id' => $item->payroll_type_field_id]) !!}" title='{{trans('front.payrolls.edit_payroll_type_field')}}'><i class="fa fa-pencil-square-o fa-2x"></i></a>
                    <a href="{!! URL::route('hrm.delete_payrolltypefield',['id' =>$item->payroll_type_field_id, '_token' => csrf_token()]) !!}" class="margin-left-5 deletes" title='{{trans('front.payrolls.delete_payroll_type_field')}}'><i class="fa fa-trash-o fa-2x"></i></a>
                </td>

            </tr>
            @endforeach

        </tbody>

    </table>

@else
    <span class="text-warning"><h5>{!! trans('front.payrolls.not_have_payroll_types_field_table')!!}</h5></span>
@endif
@endif
<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('hrm.add_payrolltypefield') !!}" class="tch btn btn-info pull-right"><i class="fa fa-plus"></i> {!!trans('front.payrolls.payroll_type_field_add_new')!!}</a>
    </div>
</div>
