<div class="row">
    <div class="col-md-12 margin-bottom-12">
<!--        <a href="{!! URL::route('permission.edit') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New</a>-->
    </div>
</div>
@if( ! $data->isEmpty() )
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Testimonial description</th>
            <th>Testimonial name</th>
            <th>Testimonial othor</th>
            <th>Operations</th>
        </tr>
        </thead>
        <tbody>
            @foreach($data as $testimonial)
            <tr>
                <td style="width:45%">{!! $testimonial->real_estate_testimonial_title !!}</td>
                <td style="width:45%">{!! $testimonial->real_estate_testimonial_description !!}</td>
                <td style="width:45%">{!! $testimonial->real_estate_testimonial_author_name !!}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@else
<span class="text-warning"><h5>No permissions found.</h5></span>
@endif