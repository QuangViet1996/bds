<div class="row">

    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('comments.add') !!}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i> {!!trans('comments.add')!!}
        </a>
    </div>

</div>
@if( isset($data['comments']) )

    @if( ! $data['comments']->isEmpty() )

        <table class="table table-hover">

            <thead>
                <tr>
                    <th >STT</th>
                    <th >{!!trans('comments.title')!!}</th>
                    <th>{!!trans('comments.description')!!}</th>
                    <th>{!!trans('comments.operations')!!}</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $nav = $data['comments']->toArray();
                $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
                ?>
                @foreach($data['comments'] as $cmt)
                <tr>
                    <!--STT -->
                    <td style="witdh:2%"> <?php echo $counter;$counter++; ?></td>

                    <!-- Category title-->
                    <td style="width:35%">{!! $cmt->real_estate_comment_title !!}</a></td>

                    <!--Category description -->
                    <td  style="witdh:40%">{!! $cmt->real_estate_comment_description !!}</td>

                    <td  style="witdh:23%">
                        <a href="{!! URL::route('comments.edit', ['id' => $cmt->real_estate_comment_id]) !!}" title='{{ trans('comments.edit') }}' class="margin-left-5"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                        <a href="{!! URL::route('comments.delete',['id' =>$cmt->real_estate_comment_id, '_token' => csrf_token()]) !!}"  title='{{ trans('comments.delete') }} ' class="margin-left-5"><i class="fa fa-trash-o delete fa-2x"></i></a>

                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

@else
    <span class="text-warning"><h5>{!! trans('comments.list_not_found')!!}</h5></span>
@endif
@endif
<div class="paginator">
    {!! $data['comments']->appends($data['request']->except(['page']) )->render() !!}
</div>