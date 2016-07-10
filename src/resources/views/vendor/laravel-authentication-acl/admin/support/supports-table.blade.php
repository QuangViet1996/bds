<div class="row">

    <div class="col-md-12 margin-bottom-12">
        <a href="{!! URL::route('support.add_support') !!}" class="btn btn-info pull-right"><i class="fa fa-plus"></i> {!!trans('supports.support.add_support')!!}</a>
    </div>

</div>
@if( isset($data['supports']) )
    @if( ! $data['supports']->isEmpty() )

        <table class="table table-hover">

            <thead>
                <tr>
                    <th >STT</th>
                    <th style="width:25%">{!!trans('supports.support.title')!!}</th>
                    <th style="witdh:15%">{!!trans('supports.support.created_date')!!}</th>
                    <th style="witdh:35%">{!!trans('supports.support.overview')!!}</th>
                    <th style="">{!!trans('front.payrolls.operations')!!}</th>
                </tr>
            </thead>

            <tbody>

                <?php
                    $nav = $data['supports']->toArray();
                    $counter = ($nav['current_page'] - 1) * $nav['per_page'] + 1;
                ?>
                @foreach($data['supports'] as $support)

                <tr>

                        <!--STT -->
                        <td> <?php echo $counter; $counter++; ?></td>

                        <!-- Support title-->
                        <td><a href="{!! URL::route('support.view_support', ['id' => $support->payroll_support_id]) !!}">{!! $support->payroll_support_title !!}</a></td>

                        <!--Support created date -->
                        <td style="width:13%">{!! date('d-m-Y', $support->payroll_support_created_date) !!}</td>
                        
                        <!-- Support overview -->
                        <td>{!! $support->payroll_support_overview !!}</td>

                        <!-- Support operation -->
                        <td style="width: 12%">
                            <a href="{!! URL::route('support.view_support', ['id' => $support->payroll_support_id]) !!}" title='{{ trans('supports.support.view_support') }}'><i class="fa fa-eye fa-2x"></i></a>
                            <a href="{!! URL::route('support.edit_support', ['id' => $support->payroll_support_id]) !!}" title='{{ trans('supports.support.edit_support') }}' class="margin-left-5"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                            <a href="{!! URL::route('support.delete_support',['id' =>$support->payroll_support_id, '_token' => csrf_token()]) !!}"  title='{{ trans('supports.support.delete_support') }} ' class="margin-left-5"><i class="fa fa-trash-o delete fa-2x"></i></a>

                        </td>

                    </tr>
                @endforeach

            </tbody>

        </table>

    @else
        <span class="text-warning"><h5>{!! trans('supports.support.list_not_found')!!}</h5></span>
    @endif
@endif

<div class="paginator">
    {!! $data['supports']->appends($data['request']->except(['page']) )->render() !!}
</div>