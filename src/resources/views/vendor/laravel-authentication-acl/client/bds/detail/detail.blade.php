<?php
if (!class_exists('lessc')) {
    include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/detail.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/detail.css');
?>


<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>Detail BDS</h1>
            <div class="bread-crumb">
                <ul class="breadcrumb pull-right"><li><a href="http://wp1.themexlab.com/wp/dreamland/">Home</a></li><li><a href="http://wp1.themexlab.com/wp/dreamland/?m=201601">Archive for January, 2016</a></li></ul>			</div>
        </div>
    </div>
</section>
<section class="section general-row sidebar-page">
    <div class="container">
        <div class="row" jstcache="0">
            <div class="col-md-9" jstcache="0">
                <div id="rem_house_galery">

                    <div class="componentheading ">

                        <span class="col_text_2">Avenel House</span>

                        <div class="rem_house_price">
                            <div class="pricemoney">
                                <span class="money">7.000.000,00</span><span class="price">&nbsp;USD</span></div><div class="pricemoney"><span class="money">6.230.000,00</span><span class="price">&nbsp;EUR</span></div><div class="pricemoney"><span class="money">8.400.000,00</span><span class="price">&nbsp;CAD</span></div>    </div>
                    </div>
                    <div style="clear:both"></div>


                    <div class="rem_house_location">
                        <i class="fa fa-map-marker"></i>
                        <span class="col_02">USA, Avenel</span>.

                    </div>
                    <div class="image-row col-md-12">
                        <ul class="bxslider">
                            <li><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/h_hill_fence.jpg') !!}" style="width: 100%"/></li>
                            <li><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/h_hill_fence.jpg') !!}" style="width: 100%"/></li>
                            <li><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/h_hill_fence.jpg') !!}" style="width: 100%"/></li>
                            <li><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/h_hill_fence.jpg') !!}" style="width: 100%"/></li>
                            <li><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/h_hill_fence.jpg') !!}" style="width: 100%"/></li>
                            <li><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/h_hill_fence.jpg') !!}" style="width: 100%"/></li>
                        </ul>

                        <div id="bx-pager" class="bx" style="text-align: center">
                            <a data-slide-index="0" href=""><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/hill_fence.jpg') !!}" /></a>
                            <a data-slide-index="1" href=""><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/hill_fence.jpg') !!}" /></a>
                            <a data-slide-index="2" href=""><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/hill_fence.jpg') !!}" /></a>
                            <a data-slide-index="3" href=""><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/hill_fence.jpg') !!}" /></a>
                            <a data-slide-index="4" href=""><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/hill_fence.jpg') !!}" /></a>
                            <a data-slide-index="5" href=""><img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/hill_fence.jpg') !!}" /></a>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                </div>

                <div id="rem_house_property">
                    <div class="row_text">
                        <span class="col_text_1">Listing status:</span>
                        <span class="col_text_2">Active</span>
                    </div>

                    <div class="row_text">
                        <span class="col_text_1">Property type:</span>
                        <span class="col_text_2">Townhouse</span>
                    </div>

                    <div class="row_text">
                        <span class="col_text_1">Property ID:</span>
                        <span class="col_text_2">6</span>
                    </div>
                    <div class="row_text">
                        <span class="col_text_icon"></span>
                        <span class="col_01">Listing type:</span>
                        <span class="col_02">House for sale</span>
                    </div>
                </div>
                <div class="tabs_buttons">
                    <ul id="countrytabs" class="shadetabs">
                        <li>
                            <a href="#" rel="country1" class="selected">Description            </a>
                        </li>

                    </ul>
                </div>

                <div id="tabs" jstcache="0">
                    <div id="country1" class="tabcontent" style="display: block;">
                        <div class="rem_type_house">
                            <div class="row_text col-md-4 col-sm-6 col-xs-12">
                                <i class="fa fa-building-o"></i>
                                <span class="col_text_1">Rooms:</span>
                                <span class="col_text_2">4</span>
                            </div>
                            <div class="row_text col-md-4 col-sm-6 col-xs-12">
                                <i class="fa fa-tint"></i>
                                <span class="col_text_1">Bathrooms:</span>
                                <span class="col_text_2">2</span>
                            </div>
                            <div class="row_text col-md-4 col-sm-6 col-xs-12">
                                <i class="fa fa-inbox"></i>
                                <span class="col_text_1">Bedrooms:</span>
                                <span class="col_text_2">2</span>
                            </div>
                            <div class="row_text col-md-4 col-sm-6 col-xs-12">
                                <i class="fa fa-calendar"></i>
                                <span class="col_text_1">Built year:</span>
                                <span class="col_text_2">2004</span>
                            </div>
                            <div class="row_text col-md-4 col-sm-6  col-xs-12">
                                <i class="fa fa-truck"></i>
                                <span class="col_text_1">Garages:</span>
                                <span class="col_text_2">1</span>
                            </div>
                            <div class="row_text col-md-4 col-sm-6 col-xs-12">
                                <i class="fa fa-arrows-alt"></i>
                                <span class="col_text_1">Lot size:</span>
                                <span class="col_text_2">
                                    6000 Sqrt                    </span>
                            </div>
                            <div class="row_text col-md-4 col-sm-6 col-xs-12">
                                <i class="fa fa-expand"></i>
                                <span class="col_text_1">House size:</span>
                                <span class="col_text_2">
                                    3500 Sqrt                    </span>
                            </div>
                            <div class="clear" style="clear: both"></div>
                            <div class="rem_house_desciption"><p>Situated on an expansive property in Central Victoria, the design of this four-bedroom house has been inspired by the dynamic landscape elements apparent at this exposed rural setting. These ecological conditions have been used to generate formal and spatial qualities of the design. The modeling of these dynamic forces—wind and sun - on the skin of the building has produced a performance envelope. The Avenel house combines a lightweight metal skin with a more grounded stone and concrete base. Strathbogie granite has been quarried from the site, cut and laid to form a strong relationship between the house and the landscape.</p></div>
                        </div>
                        <div class="table_tab_01 table_03">


                            <div class="table_country3 ">
                            </div>

                        </div>
                    </div>
                    <div id="country2" class="tabcontent" jstcache="0" style="display: none;">


                        <div class="table_latitude table_04" jstcache="0">
                            <div id="map_canvas" class="re_map_canvas re_map_canvas_02" style="position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; transform: translateZ(0px); position: absolute; left: -209px; top: -71px;"></div></div></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; transform: translateZ(0px); position: absolute; left: -209px; top: -71px;"><canvas draggable="false" height="256" width="256" style="-webkit-user-select: none; position: absolute; left: 0px; top: 0px; height: 256px; width: 256px;"></canvas></div></div></div><div style="width: 49px; height: 52px; overflow: hidden; position: absolute; left: -25px; top: -33px; z-index: 1000000;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: 0px; top: -104px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div style="position: absolute; z-index: 0; transform: translateZ(0px); left: 0px; top: 0px;"><div style="overflow: hidden;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"></div></div></div><div class="gm-style-pbc" style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%; transition-duration: 0.3s; opacity: 0; display: none;"><p class="gm-style-pbt">Sử dụng hai ngón tay để di chuyển bản đồ</p></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 4; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><div class="gmnoprint" title="" style="width: 49px; height: 52px; overflow: hidden; position: absolute; opacity: 0.01; cursor: pointer; left: -25px; top: -33px; z-index: 1000000;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: 0px; top: -104px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=40.575973,-74.271576&amp;z=14&amp;t=m&amp;hl=vi-VN&amp;gl=US&amp;mapclient=apiv3" title="Nhấp để xem khu vực này trên Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 0px; height: 0px; position: absolute; left: 5px; top: 5px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Dữ liệu Bản đồ</div><div style="font-size: 13px;"></div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 0px; bottom: 0px; width: 12px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Dữ liệu Bản đồ</a><span style="display: none;"></span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);"></div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; -webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/vi-VN_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Điều khoản sử dụng</a></div></div><div style="display: none; margin: 10px 14px; position: absolute; top: 0px; right: 0px;"></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px; display: none; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Báo cáo lỗi trong bản đồ đường hoặc hình ảnh đến Google" href="https://www.google.com/maps/@40.5759725,-74.2715758,14z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Báo cáo một lỗi bản đồ</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="0" controlheight="0" style="margin: 10px; -webkit-user-select: none; position: absolute; display: none; bottom: 0px; right: 0px;"><div class="gmnoprint" style="display: none; position: absolute;"><div draggable="false" style="-webkit-user-select: none; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255);"><div title="Phóng to" style="position: relative;"><div style="overflow: hidden; position: absolute;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; background-color: rgb(230, 230, 230);"></div><div title="Thu nhỏ" style="position: relative;"><div style="overflow: hidden; position: absolute;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div></div></div><div class="gm-svpc" controlwidth="28" controlheight="28" style="box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default; display: none; position: absolute; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: 1px;"></div></div><div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;"><div title="Xoay bản đồ 90 độ" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; cursor: pointer; display: none; background-color: rgb(255, 255, 255);"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div class="gm-tilt" style="width: 0px; height: 0px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; top: 0px; cursor: pointer; background-color: rgb(255, 255, 255);"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; display: none; left: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Hiển thị bản đồ phố" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; font-weight: 500; background-color: rgb(255, 255, 255); background-clip: padding-box;">Bản đồ</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; left: 0px; top: 0px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Hiển thị bản đồ phố với địa hình" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Địa hình</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Hiển thị hình ảnh qua vệ tinh" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-left-width: 0px; background-color: rgb(255, 255, 255); background-clip: padding-box;">Vệ tinh</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; right: 0px; top: 0px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Hiển thị hình ảnh có tên phố" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Nhãn</label></div></div></div></div></div></div>
                            <div id="map_pano" class="re_map_canvas re_map_canvas_02" jstcache="0" style="position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);"><div class="gm-style" jstcache="0" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 1;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; background-color: rgb(229, 227, 223);"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; height: 100%; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;"><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div><canvas width="0" height="0"></canvas><div class="gmnoprint" style="position: absolute; left: 0px; top: 0px; z-index: 2; font-family: Roboto, Arial, sans-serif;"><svg version="1.1" width="0px" height="0px" viewBox="0 0 0 0" style="position: absolute; left: 0px; top: 0px; pointer-events: none;"><ellipse fill="white" fill-rule="evenodd" visibility="hidden"></ellipse><path fill="white" fill-rule="evenodd" visibility="hidden"></path><path fill="black" fill-rule="evenodd" fill-opacity="0.5" stroke="none" d="M 0 -100 L 40 -60 L 30 -50 L 0 -82 L -30 -50 L -40 -60" transform="translate(0 0) scale(1 0.271872165881481) rotate(-116.61457824707031) " style="pointer-events: all;"></path><path fill="white" fill-rule="evenodd" fill-opacity="1" stroke="none" d="M 0 -100 L 40 -60 L 30 -50 L 0 -82 L -30 -50 L -40 -60" transform="translate(0 -3) scale(1 0.271872165881481) rotate(-116.61457824707031) " style="pointer-events: all;"></path><path fill="white" fill-rule="evenodd" fill-opacity="0" stroke="none" d="M 0 -120 L 60 -60 L 40 -30 L -40 -30 L -60 -60 L 0 -120" pano="GQ7QWdsyd3DGEMpyi-LThA" cursor="pointer" transform="translate(0 -3) scale(1 0.271872165881481) rotate(-116.61457824707031) " style="pointer-events: all;"></path><text fill="white" fill-rule="evenodd" stroke="none" x="0" y="-140" font-size="20px" text-anchor="end" pano="GQ7QWdsyd3DGEMpyi-LThA" cursor="pointer" transform="translate(0 -46) rotate(-116.61457824707031) rotate(109 0 -140)">Co Rd 650</text><path fill="black" fill-rule="evenodd" fill-opacity="0.5" stroke="none" d="M 0 -100 L 40 -60 L 30 -50 L 0 -82 L -30 -50 L -40 -60" transform="translate(0 0) scale(1 0.271872165881481) rotate(63.38542175292969) " style="pointer-events: all;"></path><path fill="white" fill-rule="evenodd" fill-opacity="1" stroke="none" d="M 0 -100 L 40 -60 L 30 -50 L 0 -82 L -30 -50 L -40 -60" transform="translate(0 -3) scale(1 0.271872165881481) rotate(63.38542175292969) " style="pointer-events: all;"></path><path fill="white" fill-rule="evenodd" fill-opacity="0" stroke="none" d="M 0 -120 L 60 -60 L 40 -30 L -40 -30 L -60 -60 L 0 -120" pano="V75NGBvsm48SA1yYAP3OhA" cursor="pointer" transform="translate(0 -3) scale(1 0.271872165881481) rotate(63.38542175292969) " style="pointer-events: all;"></path><text fill="white" fill-rule="evenodd" stroke="none" x="0" y="-140" font-size="20px" text-anchor="start" pano="V75NGBvsm48SA1yYAP3OhA" cursor="pointer" transform="translate(0 46) rotate(63.38542175292969) rotate(-71 0 -140)">Co Rd 650</text></svg></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps/@40.5759641,-74.2716334,0a,73.7y,34h,100t/data=!3m4!1e1!3m2!1stAvdhZvur_2tHqD0SxkXjA!2e0?source=apiv3" title="Nhấp để xem khu vực này trên Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/google_white5.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 0px; height: 0px; position: absolute; left: 5px; top: 5px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Dữ liệu Bản đồ</div><div style="font-size: 13px;">© 2016 Google</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 0px; bottom: 0px; width: 12px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(0, 0, 0);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(255, 255, 255); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer;">Dữ liệu Bản đồ</a><span style="display: none;">© 2016 Google</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">© 2016 Google</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; -webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(0, 0, 0);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(255, 255, 255); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/vi-VN_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(255, 255, 255);">Điều khoản sử dụng</a></div></div><div style="margin: 10px 20px; position: absolute; top: 0px; right: 0px;"></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="0" controlheight="0" jstcache="0" style="margin: 10px; -webkit-user-select: none; position: absolute; display: none; bottom: 0px; right: 0px;"><div class="gmnoprint" style="display: none; position: absolute;"><div draggable="false" style="-webkit-user-select: none; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(34, 34, 34);"><div title="Phóng to" style="position: relative;"><div style="overflow: hidden; position: absolute;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; background-color: rgb(26, 26, 26);"></div><div title="Thu nhỏ" style="position: relative;"><div style="overflow: hidden; position: absolute;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div></div></div><div dir="ltr" controlwidth="48" controlheight="48" jstcache="0" style="visibility: hidden; position: absolute;"><div jstcache="68" class="iv-tactile-compass"> <div class="gm-compass-icon iv-tactile-compass-background"></div> <div jstcache="34" jsaction="tactileCompass.north" class="gm-compass-icon iv-tactile-compass-needle" style="-webkit-transform: rotate(326deg);-ms-transform: rotate(326deg);-moz-transform: rotate(326deg);transform: rotate(326deg)" jsan="7.gm-compass-icon,7.iv-tactile-compass-needle,4.style,22.jsaction"></div> <div jsaction="tactileCompass.counterclockwise" class="gm-compass-icon iv-tactile-compass-turn"></div> <div jsaction="tactileCompass.clockwise" class="gm-compass-icon iv-tactile-compass-turn iv-tactile-compass-turn-opposite"></div> <div> <div class="iv-tactile-compass-tooltip-text">Xoay chế độ xem</div> <div class="iv-tactile-compass-arrow-right iv-tactile-compass-arrow-right-outer"></div> <div class="iv-tactile-compass-arrow-right iv-tactile-compass-arrow-right-inner"></div> </div> </div></div><div draggable="false" controlwidth="25px" style="-webkit-user-select: none; font-family: Roboto, Arial, sans-serif; font-size: 11px; width: 25px; text-align: center; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; cursor: pointer; display: none; position: absolute;"></div></div><div dir="ltr" jstcache="0" style="position: absolute; display: none; left: 0px; top: 0px;"><div jstcache="45" class="gm-iv-container gm-iv-small-container" jsan="t-_EPk2VOG1I0,7.gm-iv-container,7.gm-iv-small-container"> <div jsaction="closeControl.click" class="gm-iv-close"> <div class="gm-iv-back"> <div jstcache="42" class="gm-iv-back-icon-background gm-iv-back-icon" jsan="7.gm-iv-back-icon-background,7.gm-iv-back-icon"> </div> </div> </div> </div></div><div dir="ltr" style="position: absolute; left: 0px; top: 0px;" jstcache="0"><div jstcache="69" class="gm-iv-address" jsan="t-bDow0pNywiw,7.gm-iv-address"> <div class="gm-iv-address-description"> <div jstcache="47" class="gm-iv-short-address-description" jsan="7.gm-iv-short-address-description">Co Rd 650</div> <div jstcache="48" class="gm-iv-long-address-description" jsan="7.gm-iv-long-address-description">Woodbridge Township, New Jersey</div> <div jstcache="49" class="gm-iv-profile-url" style="display:none"> <a target="_blank" jstcache="50"> <div jstcache="51" class="gm-iv-profile-link" jsan="7.gm-iv-profile-link"></div> </a> </div> </div> <div jstcache="52" class="gm-iv-address-link"> <a target="_blank" jstcache="53" href="https://www.google.com/maps/@40.5759641,-74.2716334,0a,73.7y,34h,100t/data=!3m4!1e1!3m2!1stAvdhZvur_2tHqD0SxkXjA!2e0?source=apiv3">Xem trên Google Maps</a> </div> <div jstcache="54" class="gm-iv-address-custom" style="display:none"> <p>Custom Imagery</p> </div> <div jstcache="55" class="gm-iv-vertical-separator"></div> <div jstcache="56" class="gm-iv-marker"> <a target="_blank" jstcache="57" href="https://www.google.com/maps/@40.57596409172967,-74.27163344354733,13z?hl=vi-VN&amp;gl=US"> <div class="gm-iv-marker-icon gm-iv-marker-icon-background"></div> </a> </div> <div jstcache="58" jsaction="timeline.show" class="gm-iv-timeline" style="display:none"> <div class="gm-iv-horizontal-separator"></div> <div jstcache="59" class="gm-iv-timeline-icon-wrapper" style="display:none"> <div class="gm-iv-timeline-icon gm-iv-timeline-icon-background"></div> </div> <div class="gm-iv-timeline-description"> <div jstcache="60" class="gm-iv-timeline-description-details" jsan="7.gm-iv-timeline-description-details"></div> <div class="gm-iv-timeline-description-separator">-</div> <div jstcache="61" class="gm-iv-timeline-description-details" jsan="7.gm-iv-timeline-description-details"></div> </div> </div> </div></div><div draggable="false" style="color: white; font-family: Roboto, Arial, sans-serif; padding: 4px; border: 2px solid white; -webkit-user-select: none; display: none; position: absolute; left: 0px; top: 0px; background-color: black;">Hình ảnh này hiện không còn</div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(0, 0, 0);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(255, 255, 255); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Báo cáo vấn đề về hình ảnh ở Chế độ xem phố với Google" href="https://www.google.com/cbk?cb_client=apiv3&amp;output=report&amp;panoid=tAvdhZvur_2tHqD0SxkXjA&amp;cbp=1,34,,0,-10&amp;hl=vi-VN" style="text-decoration: none; color: rgb(255, 255, 255);">Báo cáo vấn đề</a></div></div></div></div>
                        </div>
                    </div>
                    <div id="country4" class="tabcontent" style="display: none;">
                        No reviews for house                    <div id="hidden_review">
                            <form action="#" method="post" name="review_house"> 
                                <input type="hidden" name="user_name" value="">
                                <input type="hidden" name="fk_userid" value="0">
                                <input type="hidden" name="user_email" value="">
                                <div class="componentheading">
                                    <hr>
                                    Add Review                </div>

                                <div class="add_table_review table_09">
                                    <div class="row_01">Title</div>
                                    <div class="row_02">
                                        <input class="inputbox" type="text" name="title" size="80" value=""> 
                                    </div>
                                    <div class="row_03">Comment</div>
                                    <div class="row_04">
                                        <textarea name="comment" cols="50" rows="8"></textarea>
                                    </div>
                                    <div class="row_rating_j3">
                                        <span class="lable_rating">Rating</span>
                                        <span id="star" style="cursor: pointer; width: 250px;"><img src="http://ordasvit.com/joomla-sweet-home//components/com_realestatemanager/images/star-off.png" alt="1" title="bad">&nbsp;<img src="http://ordasvit.com/joomla-sweet-home//components/com_realestatemanager/images/star-off.png" alt="2" title="poor">&nbsp;<img src="http://ordasvit.com/joomla-sweet-home//components/com_realestatemanager/images/star-off.png" alt="3" title="regular">&nbsp;<img src="http://ordasvit.com/joomla-sweet-home//components/com_realestatemanager/images/star-off.png" alt="4" title="good">&nbsp;<img src="http://ordasvit.com/joomla-sweet-home//components/com_realestatemanager/images/star-off.png" alt="5" title="gorgeous"><input type="hidden" name="rating"></span>
                                    </div>



                                    <div class="row_capcha">


                                    </div>
                                    <div class="row_05">Type the characters you see in the picture above into the box below.</div>
                                    <div class="row_06">
                                        <input class="inputbox" type="text" name="keyguest" size="6" maxlength="6">
                                    </div>


                                    <div class="row_button_review">
                                        <span class="button_save"> 

                                            <input class="button" type="button" value=" Save ">
                                        </span>
                                    </div>

                                </div>

                                <input type="hidden" name="fk_houseid" value="10">
                                <input type="hidden" name="catid" value="51">
                            </form>
                        </div> 

                    </div>
                </div> 

            </div>

            <div class="col-md-3">
                <div class="rem_house_contacts">
                    <div id="rem_house_titlebox">
                        Contact agent        </div>    

                    <span class="col_02">Thế Lộc<br>pykun6@gmail.com</span>

                </div>
                <div class="rem_buying_house">




                    <div id="rem_house_titlebox">
                        Send message    </div>
                    <div id="show_buying">


                        <div class="row" style="margin: 0!important">
                            <div class="col-md-12 col">
                                <div id="customer_name_warning"></div>
                                <span class="col-md-12"><input id="alert_name_buy" class="inputbox" type="text" name="customer_name" maxlength="80" placeholder="Name*"></span>
                            </div>
                            <div class="col-md-12 col">
                                <div id="customer_email_warning"></div>
                                <span class="col-md-12"><input id="alert_mail_buy" class="inputbox" type="text" name="customer_email" maxlength="80" placeholder="Email*"></span>
                            </div>

                            <div class="col-md-12 col">
                                <div id="customer_phone_warning"></div>
                                <span class="col-md-12">
                                    <input class="inputbox" type="text" id="customer_phone" name="customer_phone" maxlength="80" placeholder="Phone">
                                </span>
                            </div>
                            <div class="col-md-12 col">
                                <textarea name="customer_comment" rows="8" placeholder="Description"></textarea>        
                                <input type="hidden" name="bid[]" value="10">
                            </div>

                            <div class="col-md-12 bu col-sm-12 col-xs-12">
                                <span class="col-md-12 bu col-sm-12 col-xs-12">
                                    <input type="button" value="Send message" class="button">
                                </span> 
                            </div>
                        </div>

                    </div>

                </div>
            </div> 
        </div>
    </div>
</section>

@section('footer_scripts_part2')
<script>
    $('.bxslider').bxSlider({
        pagerCustom: '#bx-pager'
    });
</script>
@stop

