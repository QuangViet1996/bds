<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('custom.add') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>{!!trans('front.custom.add_new')!!}</a>
    </div>
</div>
@if( ! $data['list']->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <th>{!!trans('front.custom.title')!!} </th>
            <th>{!!trans('front.custom.description')!!}</th>
            <th>{!!trans('front.custom.author')!!} </th>
            <th>{!!trans('front.custom.perations')!!}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['list'] as $custom)
        <tr>
            <td style="width:45%">{!! $custom->real_estate_custom_html_title !!}</td>
            <td style="width:45%">{!! $custom->real_estate_custom_html_slug !!}</td>
            <td style="width:45%">{!! $custom->real_estate_custom_html_content !!}</td>
            <td style="witdh:10%">
                 <a href="{!! URL::route('custom.edit', ['id' => $custom->real_estate_custom_html_id]) !!}" title='{{ trans('front.custom.edit') }}' class="margin-left-5">
                     <i class="fa fa-pencil-square-o fa-2x"></i>
                 </a>
                 <a href="{!! URL::route('custom.delete',['id' =>$custom->real_estate_custom_html_id, '_token' => csrf_token()]) !!}"  title='{{ trans('front.custom.delete') }} ' class="margin-left-5">
                     <i class="fa fa-trash-o delete fa-2x"></i>
                 </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<span class="text-warning"><h5>No permissions found.</h5></span>
@endif
@endif
<div class="paginator">
    {!! $data['list']->appends($data['request']->except(['page']) )->render() !!}
</div>