<?php
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/header-main.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/header-main.css');
?>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <header class="main-header">
        <a href="#" class="logo">
            <span class="logo-mini"><b>A</b>LT</span>
            <span class="logo-lg"><b>{!! $logged_user->uid !!}</b></span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/logo.jpg') !!}" width="30" class="img-circle" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="drop message-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">1</span>
                        </a>
                        <ul class="drop-menu">
                            <li class="header">Bạn có 1 tin nhắn</li>
                            <li>
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="/*overflow: hidden*/; width: 100%; height: 200px;">

                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/logo.jpg') !!}" width="30" class="img-circle">                                            </div>
                                                <h4>
                                                   Tra cứu giao dịch
                                                    <small><i class="fa fa-clock-o"></i></small>
                                                </h4>
                                                <p>Đã nhận các khoản thu nhập</p>
                                            </a>
                                        </li>

                                    </ul>
                                    <div class="slimScrollBar" style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div>
                                    <div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                            </li>
                            <li class="footer"><a href="#">Xem tất cả</a></li>
                        </ul>
                    </li>
                    <li class="drop notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">3</span>
                        </a>
                        <ul class="drop-menu">
                            <li class="header">Bạn có 3 thông báo</li>
                            <li>
                                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 200px;"><ul class="menu" style="overflow: hidden; width: 100%; height: 200px;">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> Xem giao dịch
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Cập nhật thông tin
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> Bảo mật tài khoản
                                            </a>
                                        </li>
                                        
                                    </ul><div class="slimScrollBar" style="width: 3px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; background: rgb(0, 0, 0);"></div><div class="slimScrollRail" style="width: 3px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; opacity: 0.2; z-index: 90; right: 1px; background: rgb(51, 51, 51);"></div></div>
                            </li>
                            <li class="footer"><a href="#">Xem tất cả</a></li>
                        </ul>
                    </li>

                    <li class="drop user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-gears"></i>
                            <span class="hidden-xs"></span>
                        </a>
                        <ul class="drop-menu">
                            <li class="user-header">
                                @include('laravel-authentication-acl::admin.layouts.partials.avatar', ['size' => 17])
                                <p>
                                    {!! isset($logged_user) ? $logged_user->email : 'User' !!}
                                    <small></small>
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{!! URL::route('users.selfprofile.edit') !!}" class="btn btn-default btn-flat">{!!trans('front.routename_user_profile')!!}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{!! URL::route('user.logout') !!}" class="btn btn-default btn-flat">{!!trans('front.routename_user_logout')!!}</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
</div>

