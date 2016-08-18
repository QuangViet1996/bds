<?php
if (! class_exists ( 'lessc')) {
   include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/menu.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/menu.css');
?>
<div class="preloader" style="display: none;"></div>
<header class="main-header header-style-two">
    <!-- Header Top -->

    <div class="header-top">
        <div class="auto-container clearfix">

            <!-- Top Right -->
            <div class="top-right">
                <ul class="info pull-left clearfix">
                    <li class="email"><a href="#"><span class="icon fa fa-envelope-o"></span> companymail@gmailcom</a></li>
                    <li class="phone"><a href="tel:(880) 172 380 1729"><span class="icon fa fa-phone"></span> (880) 172 380 1729 </a></li>
                </ul>

                <!--Social Links-->
                <div class="social-links pull-left clearfix">
                    <a title="Facebook" href="#"><span class="fa fa-facebook"></span></a>
                    <a title="Twitter" href="#"><span class="fa fa-twitter"></span></a>
                    <a title="Linked in" href="#"><span class="fa fa-linkedin"></span></a>
                    <a title="Google Plus" href="#"><span class="fa fa-google-plus"></span></a>
                </div>
            </div>

        </div>
    </div>

    <!-- Header Lower -->
    <div class="header-lower">
        <div class="auto-container">
            <div class="lower-outer clearfix">
                <!--Logo-->
                <div class="logo">
                    <a href="#"><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/cotienxanh.png') !!}" alt="Bulldozer" title="Dream Land"></a>
                </div>

                <!--Right Container-->

                <!--MAIN MENU-->
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse clearfix collapse" aria-expanded="false" style="height: 2px;">

                        <!--NAVIGATION-->
                        <ul class="navigation">

                            <!--HOME-->
                            <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                <a title="Home" href="{!! URL::route('re.home')!!}" class="hvr-underline-from-left1" aria-expanded="false" data-scroll="" data-options="easing: easeOutQuart">
                                    <?php echo trans('clients.home') ?>
                                </a>
                            </li>

                            <!--SERVICE-->
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-185 dropdown">
                                <a title="Pages" href="#" class="hvr-underline-from-left1" aria-expanded="false" data-scroll="" data-options="easing: easeOutQuart">
                                    <?php echo trans('clients.service') ?>
                                </a>
                                <ul role="menu" class="submenu" style="display: none;">

                                    <li id="menu-item-106" class="menu-item menu-item-type-post_type menu-item-object-page">
                                        <a title="Video Tour" href="{!! URL::route('re.categories')!!}">
                                            Danh mục
                                        </a>
                                    </li>

                                    <li id="menu-item-106" class="menu-item menu-item-type-post_type menu-item-object-page">
                                        <a title="Video Tour" href="{!! URL::route('reg_re.add')!!}">
                                            Add
                                        </a>
                                    </li>
                                    <li id="menu-item-104" class="menu-item menu-item-type-post_type menu-item-object-page">
                                        <a title="Gallery" href="#">
                                            Gallery
                                        </a>
                                    </li>
                                    <li id="menu-item-213" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
                                        <a title="Sidebar Page" href="#">
                                            Sidebar Page
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <!--CONTACT-->
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a title="About US" href="{!! URL::route('re.contact')!!}" class="hvr-underline-from-left1" data-scroll="" data-options="easing: easeOutQuart">
                                    <?php echo trans('clients.contact') ?>
                                </a>
                            </li>

                            <!--REGISTER-->
                            <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-101">
                                <a title="Contact Us" href="{!! URL::route('re.contact')!!}" class="hvr-underline-from-left1" data-scroll="" data-options="easing: easeOutQuart">
                                    <?php echo trans('clients.register') ?>
                                </a>
                            </li>

                        </ul>
                        <!--END NAVIGATION-->

                    </div>
                </nav>
                <!--END MAIN MENU-->

            </div>
        </div>

    </div>

</header>
<div class="scroll-to-top" style="display: block;"><span class="fa fa-arrow-up"></span></div>

