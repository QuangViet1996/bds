<div class="row form-group">
    <div class="col-md-12">
        {!!Form::label(trans('front.users.order').': ') !!}
    </div>
    <div class="col-md-12 margin-top-10">
        {!! Form::select('', ["" => trans('front.users.select_column'), "first_name" => trans('front.users.first_name'), "last_name" => trans('front.users.last_name'), "email" => trans('front.users.email'), "last_login" => trans('front.users.last_login'), "active" => trans('front.users.status')], $request->get('order_by',''), ['class' => 'form-control form-validable', 'id' => 'order-by-select']) !!}

        <span class="text-danger hidden form-error-message">The order by field is required.</span>
    </div>
    <div class="col-md-12 margin-top-10">
        {!! Form::select('', ["asc" => trans('front.users.ascending'), "desc" => trans('front.users.descending')], $request->get('ordering','asc'), ['class' =>'form-control']) !!}

    </div>
    <div class="col-md-12 margin-top-10">
        <a class="btn btn-default pull-right" id="add-ordering-filter"><i class="fa fa-plus"></i> Add</a>
    </div>
    <span id="append-sorting"></span>
    {!!Form::hidden('order_by',$request->get('order_by'),["id" => "order-by" ]) !!}
    {!!Form::hidden('ordering',$request->get('ordering'), ["id" => "ordering"]) !!}
</div>

@section('footer_scripts')
@parent
{!! HTML::script('packages/jacopo/laravel-authentication-acl/js/custom-ordering.js')  !!}
@stop