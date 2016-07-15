<div class="row">

    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('positions.add') !!}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i> {!!trans('positions.add')!!}
        </a>
    </div>

</div>
@if( isset($data['positions']) )
    @if( ! $data['positions']->isEmpty() )

        <table class="table table-hover">

            <thead>
                <tr>
                    <th style="witdh:5%">STT</th>
                    <th style="width:60%">{!!trans('positions.title')!!}</th>
                    <th style="witdh:20%">{!!trans('positions.operations')!!}</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $nav = $data['positions']->toArray();
                $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
                ?>
                @foreach($data['positions'] as $position)

                <tr>
                    <!--STT -->
                    <td > <?php echo $counter;$counter++; ?></td>

                    <!-- Category title-->
                    <td >{!! $position->real_estate_page_position_title !!}</a></td>


                    <td  >
                        <a href="{!! URL::route('positions.edit', ['id' => $position->real_estate_page_position_id]) !!}" title='{{ trans('positions.edit') }}' class="margin-left-5"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                        <a href="{!! URL::route('positions.delete',['id' =>$position->real_estate_page_position_id, '_token' => csrf_token()]) !!}"  title='{{ trans('positions.delete') }} ' class="margin-left-5"><i class="fa fa-trash-o delete fa-2x"></i></a>

                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

@else
    <span class="text-warning"><h5>{!! trans('positions.list_not_found')!!}</h5></span>
@endif
@endif
<div class="paginator">
    {!! $data['positions']->appends($data['request']->except(['page']) )->render() !!}
</div>