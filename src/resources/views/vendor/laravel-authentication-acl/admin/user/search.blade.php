<?php $input = @$request->all(); ?>
<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i> {!!trans('front.users_search.search_user')!!}</h3>
    </div>
    <div class="panel-body">
        {!! Form::open(['route' => 'users.list','method' => 'get']) !!}
        <!-- email text field -->
        <div class="form-group">
            {!! Form::label('email',trans('front.users.email').': ') !!}
            {!! Form::text('email', @$input['email'], ['class' => 'form-control', 'placeholder' =>trans('front.users.email')]) !!}
        </div>
        <span class="text-danger">{!! $errors->first('email') !!}</span>
        <!-- first_name text field -->
        <div class="form-group">
            {!! Form::label('first_name',trans('front.users.first_name').': ') !!}
            {!! Form::text('first_name', @$input['first_name'], ['class' => 'form-control', 'placeholder' => trans('front.users.first_name')]) !!}
        </div>
        <span class="text-danger">{!! $errors->first('first_name') !!}</span>
        <!-- last_name text field -->
        <div class="form-group">
            {!! Form::label('last_name',trans('front.users.last_name').':') !!}
            {!! Form::text('last_name', @$input['last_name'], ['class' => 'form-control', 'placeholder' => trans('front.users.last_name')]) !!}
        </div>
        <span class="text-danger">{!! $errors->first('last_name') !!}</span>
        <!-- code text field -->
        <div class="form-group">
            {!! Form::label('activated', trans('front.users.status').': ') !!}
            {!! Form::select('activated', ['' => 'Any', 1 => 'Yes', 0 => 'No'], $request->get('activated',''), ["class" => "form-control"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('banned',trans('front.users.banned').': ') !!}
            {!! Form::select('banned', ['' => 'Any', 1 => 'Yes', 0 => 'No'], $request->get('banned',''), ["class" => "form-control"]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('group_id', trans('front.users.groups').': ') !!}
            <?php $group_values[""] = "Any"; ?>
            {!! Form::select('group_id', $group_values, $request->get('group_id',''), ["class" => "form-control"]) !!}
        </div>
        @include('laravel-authentication-acl::admin.user.partials.sorting')
        <div class="form-group">
            <a href="{!! URL::route('users.list') !!}" class="btn btn-default search-reset">{!!trans('front.users_search.reset')!!}</a>
            {!! Form::submit(trans('front.users_search.search'), ["class" => "btn btn-info", "id" => "search-submit"]) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>