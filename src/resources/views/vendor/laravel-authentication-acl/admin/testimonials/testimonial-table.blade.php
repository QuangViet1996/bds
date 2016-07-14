<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('testimonials.add') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>{!!trans('testimonials.add_new')!!}</a>
    </div>
</div>
@if( ! $data['list']->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <th style="witdh:10%">{!!trans('testimonials.author')!!} </th>
            <th style="width:30%">{!!trans('testimonials.title')!!} </th>
            <th style="width:50%">{!!trans('testimonials.description')!!}</th>
            <th style="witdh:10%">{!!trans('testimonials.operations')!!}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['list'] as $testimonial)
        <tr>
            <td >{!! $testimonial->real_estate_testimonial_author_name !!}</td>
            <td>{!! $testimonial->real_estate_testimonial_title !!}</td>
            <td>{!! $testimonial->real_estate_testimonial_description !!}</td>
            <td>
                <a href="{!! URL::route('testimonials.edit', ['id' => $testimonial->real_estate_testimonial_id]) !!}" title='{{ trans('testimonials.edit') }}' class="margin-left-5">
                    <i class="fa fa-pencil-square-o fa-2x"></i>
                </a>
                <a href="{!! URL::route('testimonials.delete',['id' =>$testimonial->real_estate_testimonial_id, '_token' => csrf_token()]) !!}"  title='{{ trans('testimonials.delete') }} ' class="margin-left-5">
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