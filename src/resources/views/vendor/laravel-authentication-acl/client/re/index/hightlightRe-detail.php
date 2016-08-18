<?php
if (! class_exists ( 'lessc')) {
   include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/property_details.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/property_details.css');
?>

<!--FAVORITES PRODUCT - DETAIL-->
<section class="section  general-row">
    <div class="wpb_column col-md-12">
        <!--Tabs Section-->
        <section class="property-details" style="background-image:url('/packages/images/image-21.jpg');">
            <div class="auto-container">
                <div class="row clearfix">
                    <!--Left Column-->
                    <div class="col-md-7 col-sm-12 col-xs-12 left-column">
                        <h2><?php echo trans('clients.re_detail') ?></h2>
                        <!--Tabs Box-->
                        <div class="tabs-box">
                            <!--Tab Buttons-->
                            <div class="tab-buttons clearfix">
                                <a href="#tab-one179" class="tab-btn active-btn"><?php echo trans('clients.re_intro') ?></a>

                                <a href="#tab-one178" class="tab-btn "><?php echo trans('clients.re_paypal') ?></a>

                                 <a href="#tab-one181" class="tab-btn "><?php echo trans('clients.re_rating') ?></a>

                            </div>
                            <!--Tabs Content-->
                            <div class="tab-content">

                                <!--Tab / Active Tab-->
                                <div class="tab active-tab" id="tab-one179" style="display: block">
                                    <h3><?php echo $hightlight_re->real_estate_title ?></h3>
                                    <div class="text">
                                        <?php echo $hightlight_re->real_estate_overview ?>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="column col-xs-12">
                                            <ul class="styled-list">
                                                <li>Địa chỉ : <?php echo $hightlight_re->real_estate_map_address ?></li>
                                                <li><a href="#">Xem chi tiết >></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!--Tab / Active Tab-->
                                <div class="tab " id="tab-one178">
                                    <h3>Các hình thức thanh toán được liệt kê bên dưới</h3>
                                    <div class="text">
                                        Chúng tôi cam kết là đơn vị uy tín, các thông tin đưa ra hoàn toàn chính xác
                                    </div>
                                    <div class="row clearfix">
                                        <div class="column col-md-4 col-sm-4 col-xs-12">
                                            <ul class="styled-list">
                                                <?php echo $hightlight_re->real_estate_pay ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!--Tab / Active Tab-->
                                <div class="tab " id="tab-one181">
                                    <h3>Từ khách hàng</h3>
                                    <div class="text">
                                        <?php echo $hightlight_re->real_estate_rating ?>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="column col-md-4 col-sm-4 col-xs-12"><!--Styled List-->
                                            <ul class="styled-list">
                                                <li>Lượt xem: <?php echo $hightlight_re->real_estate_views  ?></li>
                                                <li>Lượt likes: <?php echo $hightlight_re->real_estate_likes  ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="clearfix"></div>
</section>