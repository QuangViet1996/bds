<?php
$less = new lessc();
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/sidebar-left.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/sidebar-left.css');
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/afix.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/afix.css');
?>
<aside class="main-sidebar">
    <section class="sidebars" style="height: auto;">
        <div class="user-panel">
            <div class="pull-left image">
                @include('laravel-authentication-acl::admin.layouts.partials.avatar', ['size' => 30])
            </div>
            <div class="pull-left info">
                <p>{!! isset($logged_user) ? $logged_user->email : 'User' !!}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">{!!trans('front.routename_menu')!!}</li>

            @if(isset($menu_items_detail) && $menu_items_detail)

            @foreach($menu_items_detail as $menu_item)
            <li class="treeview">
                <a href="#">
                    <i class="{!! $menu_item['icon']  !!}"></i> <span>{!! $menu_item['name'] !!}</span> <i class="fa fa-angle-left pull-right"></i>
                </a>

                @if (isset($menu_item['sub_items']) && $menu_item['sub_items'])
                <ul class="treeview-menu" >
                    @foreach($menu_item['sub_items'] as $key => $item)

                    <li>
                        <a href="{!! $item['url'] !!}">
                            {!! $item['icon'] !!}  {!! $key !!}</ <i class="fa fa-angle-left pull-right"></i>
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </li>

            @endforeach

            @endif
        </ul>
    </section>
</aside>
