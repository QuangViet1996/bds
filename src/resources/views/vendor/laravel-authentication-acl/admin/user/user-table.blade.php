<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-list-alt"></i> 
            {!! $request->all() ? trans('front.users_search.search_results').':' : trans('front.users.list') !!}
            <a href="{!! URL::route('hrm.export_users') !!}" class="filter-heading" style="margin-left: 10px;text-decoration: none;"><i class="fa fa-download"></i> {!!trans('front.routename_export_list_user')!!}</a>

        </h3>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-9">
                {!! Form::open(['method' => 'get', 'class' => 'form-inline']) !!}
                <div class="form-group">
                    {!! Form::select('order_by', ["" => trans('front.users.select_column'), "first_name" => trans('front.users.first_name'), "last_name" => trans('front.users.last_name'), "email" => trans('front.users.email'), "last_login" => trans('front.users.last_login'), "active" => trans('front.users.status')], $request->get('order_by',''), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::select('ordering', ["asc" => trans('front.users.ascending'), "desc" => trans('front.users.descending')], $request->get('ordering','asc'), ['class' =>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit(trans('front.users.order'), ['class' => 'btn btn-default']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
                <a href="{!! URL::route('users.edit') !!}" class="btn btn-info btn-addnv"><i class="fa fa-plus"></i> {!! trans('front.users.add_new')!!}</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @if(! $users->isEmpty() )
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>{!!trans('front.users.id_user') !!}</th>
                            <th class="hidden-xs">{!!trans('front.users.first_name')!!}</th>
                            <th class="hidden-xs">{!!trans('front.users.last_name')!!}</th>
                            <th>{!!trans('front.users.status')!!}</th>
                            <th class="hidden-xs">{!!trans('front.users.last_login')!!}</th>
                            <th>{!!trans('front.users.operation')!!}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{!! $user->uid !!}</td>
                            <td class="hidden-xs">{!! $user->first_name !!}</td>
                            <td class="hidden-xs">{!! $user->last_name !!}</td>
                            <td>{!! $user->activated ? '<i class="fa fa-circle green"></i>' : '<i class="fa fa-circle-o red"></i>' !!}</td>
                            <td class="hidden-xs">{!! $user->last_login ? $user->last_login : 'not logged yet.' !!}</td>
                            <td>
                                @if(! $user->protected)
                                <a href="{!! URL::route('users.edit', ['id' => $user->id]) !!}"><i class="fa fa-pencil-square-o fa-2x"></i></a>
                                <a href="{!! URL::route('users.delete',['id' => $user->id, '_token' => csrf_token()]) !!}" class="margin-left-5 delete"><i class="fa fa-trash-o fa-2x"></i></a>
                                @else
                                <i class="fa fa-times fa-2x light-blue"></i>
                                <i class="fa fa-times fa-2x margin-left-12 light-blue"></i>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <div class="paginator">
                    {!! $users->appends($request->except(['page']) )->render() !!}
                </div>
                @else
                <span class="text-warning"><h5>{!!trans('front.users_search.not_search_results')!!}</h5></span>
                @endif
            </div>
        </div>
    </div>
</div>
