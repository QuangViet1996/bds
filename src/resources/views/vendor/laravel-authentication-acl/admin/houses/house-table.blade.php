<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('houses.add') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>{!!trans('front.houses.add_new')!!}</a>
    </div>
</div>
@if( ! $data['list']->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <th>{!!trans('front.houses.title')!!} </th>
            <th>{!!trans('front.houses.description')!!}</th>
            <th>{!!trans('front.houses.sq')!!}</th>
            <th>{!!trans('front.houses.build_year')!!}</th>
            <th>{!!trans('front.houses.perations')!!}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['list'] as $houses)
        <tr>
            <td style="width:20%">{!! $houses->real_estate_title !!}</td>
            <td style="width:30%">{!! $houses->real_estate_description !!}</td>
            <td style="width:10%">{!! $houses->real_estate_sq !!}</td>
            <td style="width:15%">{!! $houses->real_estate_year_build !!}</td>
            <td style="witdh:10%">
                 <a href="{!! URL::route('houses.edit', ['id' => $houses->real_estate_id]) !!}" title='{{ trans('front.houses.edit') }}' class="margin-left-5">
                     <i class="fa fa-pencil-square-o fa-2x"></i>
                 </a>
                 <a href="{!! URL::route('houses.delete',['id' =>$houses->real_estate_id, '_token' => csrf_token()]) !!}"  title='{{ trans('front.houses.delete') }} ' class="margin-left-5">
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