<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('custom.add') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>{!!trans('custom.add_new')!!}</a>
    </div>
</div>
@if( ! $data['list']->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <th>{!!trans('custom.title')!!} </th>
            <th>{!!trans('custom.slug')!!}</th>
            <th>{!!trans('custom.operations')!!}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['list'] as $custom)
        <tr>
            <td style="width:45%">{!! $custom->real_estate_custom_html_title !!}</td>
            <td style="width:45%">{!! $custom->real_estate_custom_html_slug !!}</td>
            <td style="witdh:10%">
                 <a href="{!! URL::route('custom.edit', ['id' => $custom->real_estate_custom_html_id]) !!}" title='{{ trans('custom.edit') }}' class="margin-left-5">
                     <i class="fa fa-pencil-square-o fa-2x"></i>
                 </a>
                 <a href="{!! URL::route('custom.delete',['id' =>$custom->real_estate_custom_html_id, '_token' => csrf_token()]) !!}"  title='{{ trans('custom.delete') }} ' class="margin-left-5">
                     <i class="fa fa-trash-o delete fa-2x"></i>
                 </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<span class="text-warning"><h5>{!!trans('custom.not_found_table')!!}.</h5></span>
@endif
<div class="paginator">
    {!! $data['list']->appends($data['request']->except(['page']) )->render() !!}
</div>