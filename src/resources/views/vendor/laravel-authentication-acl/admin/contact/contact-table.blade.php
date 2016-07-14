<div class="row">
    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('contact.add') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i>{!!trans('contact.add_new')!!}</a>
    </div>
</div>
@if( ! $data['list']->isEmpty() )
<table class="table table-hover">
    <thead>
        <tr>
            <th>{!!trans('contact.title')!!} </th>
            <th>{!!trans('contact.description')!!}</th>
            <th>{!!trans('contact.author')!!} </th>
            <th>{!!trans('contact.operations')!!}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['list'] as $contact)
        <tr>
            <td style="width:45%">{!! $contact->real_estate_contact_title !!}</td>
            <td style="width:45%">{!! $contact->real_estate_contact_description !!}</td>
            <td style="width:45%">{!! $contact->real_estate_contact_author_name !!}</td>
            <td style="witdh:10%">
                 <a href="{!! URL::route('contact.edit', ['id' => $contact->real_estate_contact_id]) !!}" title='{{ trans('contact.edit') }}' class="margin-left-5">
                     <i class="fa fa-pencil-square-o fa-2x"></i>
                 </a>
                 <a href="{!! URL::route('contact.delete',['id' =>$contact->real_estate_contact_id, '_token' => csrf_token()]) !!}"  title='{{ trans('contact.delete') }} ' class="margin-left-5">
                     <i class="fa fa-trash-o delete fa-2x"></i>
                 </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<span class="text-warning"><h5>{!!trans('contact.not_found_table')!!}</h5></span>

@endif
<div class="paginator">
    {!! $data['list']->appends($data['request']->except(['page']) )->render() !!}
</div>