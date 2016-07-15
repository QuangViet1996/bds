@if( !empty($data['cat']) )

<!--Title-->
<div class="row payroll-view">
    <div class="payroll-item">
        <span class="item-title">{!! trans('categories.title') !!}</span>
        <div class="item-value">{!! $data['cat']->real_estate_category_title !!}</div>
    </div>
</div>

<!--Description -->
<div class="row payroll-view">
    <div class="payroll-item">
        <span class="item-title">{!! trans('categories.description') !!}</span>
        <div class="item-value">{!! $data['cat']->real_estate_category_description !!}</div>
    </div>
</div>


@endif

@section('footer_scripts')
<script>
    $(".payroll-delete").click(function(){
    return confirm('{!!trans('categories.you_want_delete')!!}');
    });
</script>
@stop