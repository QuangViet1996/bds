<div class="row">

    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('categories.add') !!}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i> {!!trans('categories.category.add_support')!!}
        </a>
    </div>

</div>
@if( isset($data['categories']) )
    @if( ! $data['categories']->isEmpty() )

        <table class="table table-hover">

            <thead>
                <tr>
                    <th >STT</th>
                    <th >{!!trans('categories.category.title')!!}</th>
                    <th>{!!trans('categories.category.description')!!}</th>
                    <th>{!!trans('front.payrolls.operations')!!}</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $nav = $data['categories']->toArray();
                $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
                ?>
                @foreach($data['categories'] as $cat)

                <tr>
                    <!--STT -->
                    <td style="witdh:2%"> <?php echo $counter;$counter++; ?></td>

                    <!-- Category title-->
                    <td style="width:35%"><a href="{!! URL::route('categories.view', ['id' => $cat->payroll_support_category_id]) !!}">{!! $cat->payroll_support_category_title !!}</a></td>

                    <!--Category description -->
                    <td  style="witdh:40%">{!! $cat->payroll_support_category_description !!}</td>

                    <td  style="witdh:23%">
                        <a href="{!! URL::route('categories.view', ['id' => $cat->payroll_support_category_id]) !!}" title='{{ trans('categories.category.view_support') }}'><i class="fa fa-eye fa-2x"></i></a>
                        <a href="{!! URL::route('categories.edit', ['id' => $cat->payroll_support_category_id]) !!}" title='{{ trans('categories.category.edit_support') }}' class="margin-left-5"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                        <a href="{!! URL::route('categories.delete',['id' =>$cat->payroll_support_category_id, '_token' => csrf_token()]) !!}"  title='{{ trans('categories.category.delete_support') }} ' class="margin-left-5"><i class="fa fa-trash-o delete fa-2x"></i></a>

                    </td>

                </tr>
                @endforeach

            </tbody>

        </table>

@else
    <span class="text-warning"><h5>{!! trans('categories.category.list_not_found')!!}</h5></span>
@endif
@endif
<div class="paginator">
    {!! $data['categories']->appends($data['request']->except(['page']) )->render() !!}
</div>