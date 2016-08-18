<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('realestates.add') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>{!!trans('re.add_new')!!}</a>
    </div>
</div>
@if( ! $data['list']->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <td>#</td>
            <th>{!!trans('re.title')!!} </th>
            <th>{!!trans('re.sq')!!}</th>
            <th>{!!trans('re.build_year')!!}</th>
            <th>{!!trans('re.Operations')!!}</th>
        </tr>
    </thead>
    <tbody>
         <?php
        $nav = $data['list']->toArray();
        $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
        ?>
        @foreach($data['list'] as $houses)
        <tr>
            <td><?php echo $counter; $counter++ ?></td>
            <td>{!! $houses->real_estate_title !!}</td>
            <td>{!! $houses->real_estate_sq !!}</td>
            <td>{!! $houses->real_estate_year_build !!}</td>
            <td>
                 <a href="{!! URL::route('realestates.edit', ['id' => $houses->real_estate_id]) !!}" title='{{ trans('re.edit') }}' class="margin-left-5">
                     <i class="fa fa-pencil-square-o fa-2x"></i>
                 </a>
                 <a href="{!! URL::route('realestates.delete',['id' =>$houses->real_estate_id, '_token' => csrf_token()]) !!}"  title='{{ trans('re.delete') }} ' class="margin-left-5">
                     <i class="fa fa-trash-o delete fa-2x"></i>
                 </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<span class="text-warning"><h5>{!!trans('re.not_found')!!}</h5></span>
@endif

<div class="paginator">
    {!! $data['list']->appends($data['request']->except(['page']) )->render() !!}
</div>