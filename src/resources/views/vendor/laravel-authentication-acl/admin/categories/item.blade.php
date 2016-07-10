<div class="row">

    <div class="col-md-12 margin-bottom-12">

        <span class="payroll-controll">
            <a href="{!! URL::route('categories.add') !!}" class="btn btn-info"><i class="fa fa-plus"></i> {!!trans('categories.category.view_category_add_new')!!}</a>

        </span>
        <!--Button edit payroll-->
        <span class="payroll-controll controll-edit">
            <a href="{!! URL::route('categories.edit', ['id' => $data['cat']->payroll_support_category_id]) !!}" class="btn btn-info"><i class="fa fa-pencil"></i> {!!trans('categories.category.view_category_edit')!!}</a>
        </span>

        <!--Button delete payroll-->
        <span class="payroll-controll controll-delete">
            <a href="{!! URL::route('categories.delete',['id' =>$data['cat']->payroll_support_category_id, '_token' => csrf_token()]) !!}" class="btn btn-info  payroll-delete"><i class="fa fa-times"></i> {!!trans('categories.category.view_category_delete')!!}</a>
        </span>

    </div>

</div>


@if( !empty($data['cat']) )

<!--Title-->
<div class="row payroll-view">
    <div class="payroll-item">
        <span class="item-title">{!! trans('categories.category.view_category_title') !!}</span>
        <div class="item-value">{!! $data['cat']->payroll_support_category_title !!}</div>
    </div>
</div>

<!--Description -->
<div class="row payroll-view">
    <div class="payroll-item">
        <span class="item-title">{!! trans('categories.category.view_category_description') !!}</span>
        <div class="item-value">{!! $data['cat']->payroll_support_category_description !!}</div>
    </div>
</div>


@endif

@section('footer_scripts')
<script>
    $(".payroll-delete").click(function(){
    return confirm('{!!trans('categories.category.get_category_delete')!!}');
    });
</script>
@stop