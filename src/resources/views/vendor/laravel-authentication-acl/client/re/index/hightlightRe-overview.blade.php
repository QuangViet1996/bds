<?php
if (!class_exists('lessc')) {
    include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/aboutproperty.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/aboutproperty.css');
?>


<!--FAVORITES PRODUCT - OVERVIEW-->
<section class="section  general-row">
    <div class="wpb_column col-md-12">
        <!--Properties Section-->
        <section class="properties-section">
            <div class="auto-container">
                <!--Section Title-->
                <div class="sec-title">
                    <h2>Dự án <span class="theme_color">Nỗi bật</span></h2>
                    <div class="separator small-separator"></div>
                    <div class="text"><p>Cô Tiên Xanh là đối tác chính trong dự án này.</p></div>
                </div>
                <!--Full Image Box-->
                <div class="five-col-theme">
                    <div class="row clearfix">
                        <!--BEDROOMS-->
                        <article class="column">
                            <div class="inner-box">
                                <div class="icon"><span class="fa fa-bed"><i class="fa fa-university" aria-hidden="true"></i></span></div>
                                <h4 class="title"><?php echo trans('clients.re_bedroom') ?></h4>
                                <h3 class="count">3</h3>
                            </div>
                        </article>
                        <!--SQUARE FEET-->
                        <article class="column">
                            <div class="inner-box">
                                <div class="icon"><span class="fa fa-puzzle-piece"></span></div>
                                <h4 class="title"><?php echo trans('clients.re_square') ?></h4>
                                <h3 class="count">2530</h3>
                            </div>
                        </article>
                        <!--BATHS-->
                        <article class="column">
                            <div class="inner-box">
                                <div class="icon"><span class="fa fa-child"></span></div>
                                <h4 class="title"><?php echo trans('clients.re_bath') ?></h4>
                                <h3 class="count">2</h3>
                            </div>
                        </article>
                        <!--YEAR BUILD-->
                        <article class="column">
                            <div class="inner-box">
                                <div class="icon"><span class="fa fa-calendar"></span></div>
                                <h4 class="title"><?php echo trans('clients.re_year') ?></h4>
                                <h3 class="count">2010</h3>
                            </div>
                        </article>
                        <!--CAR PARKING-->
                        <article class="column">
                            <div class="inner-box">
                                <div class="icon"><span class="fa fa-glass"></span></div>
                                <h4 class="title"><?php echo trans('clients.re_parking') ?></h4>
                                <h3 class="count">5</h3>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="clearfix"></div>
</section>