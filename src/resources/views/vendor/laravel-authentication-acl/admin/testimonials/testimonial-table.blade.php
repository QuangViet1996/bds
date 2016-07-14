<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('testimonials.add') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>{!!trans('front.testimonials.add_new')!!}</a>
    </div>
</div>
@if( ! $data['list']->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <th>{!!trans('front.testimonials.title')!!} </th>
            <th>{!!trans('front.testimonials.description')!!}</th>
            <th>{!!trans('front.testimonials.author')!!} </th>
            <th>{!!trans('front.testimonials.perations')!!}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['list'] as $testimonial)
        <tr>
            <td style="width:45%">{!! $testimonial->real_estate_testimonial_title !!}</td>
            <td style="width:45%">{!! $testimonial->real_estate_testimonial_description !!}</td>
            <td style="width:45%">{!! $testimonial->real_estate_testimonial_author_name !!}</td>
            <td style="witdh:10%">
                 <a href="{!! URL::route('testimonials.edit', ['id' => $testimonial->real_estate_testimonial_id]) !!}" title='{{ trans('front.testimonials.edit') }}' class="margin-left-5">
                     <i class="fa fa-pencil-square-o fa-2x"></i>
                 </a>
                 <a href="{!! URL::route('testimonials.delete',['id' =>$testimonial->real_estate_testimonial_id, '_token' => csrf_token()]) !!}"  title='{{ trans('front.testimonials.delete') }} ' class="margin-left-5">
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