<div class="panel panel-info">

    <div class="panel-heading">
        <h3 class="panel-title bariol-thin"><i class="fa fa-search"></i> {!! trans('front.routename_hrm_search')!!}</h3>
    </div>

    <div class="panel-body">
        <?php $input = $data['request']->all(); ?>
        {!! Form::open(['route' => 'support.list','method' => 'get']) !!}

        <!-- Search keyword -->
        <div class="form-group">

            {!! Form::label('keyword',trans('supports.support.keyword'),': *') !!}
            {!! Form::text('keyword',  @$input['keyword'], ['class' => 'form-control', 'placeholder' =>trans('supports.support.keyword')]) !!}

            <span class="text-danger">{!! $errors->first('keyword') !!}</span>
        </div>

        <!-- List categories -->
        <div class="form-group">
            <div class="controls">

                {!! Form::label('payroll_support_category_id',trans('supports.support.get_supports_edit_category'),': *') !!}
                {!! Form::select('payroll_support_category_id',$data['payroll_support_categories'],@$input['payroll_support_category_id'], ['class' => 'form-control']) !!}

                <span class="text-danger">{!! $errors->first('payroll_support_category_id') !!}</span>

            </div>
        </div>

        <input type="submit" name="search" value="{!! trans('front.routename_hrm_search') !!}" class='btn btn-info pull-left'>

        {!! Form::close() !!}
    </div>
</div>
