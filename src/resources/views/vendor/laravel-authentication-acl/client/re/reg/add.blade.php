@extends('laravel-authentication-acl::client.re.layouts.base')

@section('title')
Trang lien he
@stop


<?php
if (!class_exists('lessc')) {
    include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/reg_re_add.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/reg_re_add.css');
?>

@section('section')
<section class="page-title">

    <div class="auto-container">

        <div class="content-box">

            <h1>Contact Us</h1>

            <div class="bread-crumb">

                <ul class="breadcrumb pull-right"><li><a href="#">Home</a></li><li>Contact Us</li></ul>
            </div>

        </div>

    </div>

</section>

<section class="section  general-row">
    <div class="wpb_column col-md-12">
        <!--Info Section-->

        <section class="info-section contact-section">

            <div class="auto-container">

                <h2>It’s Easy to Find Us</h2>

                <!--Text-->

                <div class="desc-text bitter-font">

                    <p><em>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been<br>
                            the industry's standard dummy text ever since the 1500s, when an unknownto.</em> </p>

                </div>
                <!--Contact Info-->

                <div class="contact-info">

                    <div class="row clearfix">

                        <!--Column-->

                        <div class="column col-md-4 col-sm-6 col-xs-12">

                            <span class="icon"><i class="fa fa-book" aria-hidden="true"></i></span>

                            <h3>ADDRESS</h3>

                            <p>Mirpur New Bazar Road, Block-c,<br>
                                Dhaka-1210</p>

                        </div>

                        <!--Column-->

                        <div class="column col-md-4 col-sm-6 col-xs-12">

                            <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>

                            <h3>PHONE</h3>

                            <p>(732) 803-01 03, (732) 806-01 04, (880)172380129</p>

                        </div>

                        <!--Column-->

                        <div class="column col-md-4 col-sm-6 col-xs-12">

                            <span class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>

                            <h3>EMAIL</h3>

                            <p>info@companyname.com, otheremail@gmail.com</p>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>

    <div class="clearfix"></div>
</section>

<section class="default-section faded-section contact-section" style="background-image:url('../../../images/contact-bg.jpg');">

    <div class="auto-container small-container">

        <div class="sec-title">

            <h2>Contact Form</h2>

            <div class="text"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknownto </p></div>

        </div>

        <!--Contact Form-->

        <div class="column reg-re-add col-md-12">
            <form action="#" method="post" name="save_add" id="save_add" enctype="multipart/form-data">
                <div class="span12 col-md-12">
                    <div class="rem_house">
                        <div class="house_titlebox">
                            Overview                    
                        </div>

                        <div class="row_add_house" id="title_label">
                            <span>Title:*</span>
                            <input id="alert_title" class="inputbox" type="text" name="htitle" size="60" value="">
                        </div>

                        <div class="row_add_house" id="category_label">
                            <div id="alert_category"></div>
                            <span>Category:*</span>
                            <span><select id="catid" name="catid[]" class="inputbox" multiple="">
                                    <option value="50">Cottage </option>
                                    <option value="49">Manufactured</option>
                                    <option value="48">Family House</option>
                                    <option value="47">Townhouse</option>
                                    <option value="46">Apartment</option>
                                </select>
                            </span>
                        </div>

                        <div class="row_add_house">
                            <span>Description:</span>
                            <div class="editor_area"><textarea name="description" id="description" cols="70" rows="10" style="width: 300px; height: 50px;"></textarea></div>
                            <!--<textarea name="description" cols="50" rows="8" ></textarea>-->
                        </div>

                        <div class="row_add_house" id="houseid_label">
                            <span>Property ID:*</span>
                            <input class="inputbox" type="text" id="houseid" name="houseid" size="20" maxlength="20" value="19">
                            <input type="hidden" name="idtrue" id="idtrue" value="">
                        </div>

                    </div>
                    <div class="rem_house col-md-12">
                        <div class="house_titlebox">
                            Photos    </div>

                        <div class="row_add_house">
                            <div id="image_link_alert"></div>
                            <span>Add a main photo:*</span>
                            <input class="box" type="file" name="image_link" value="" size="25" maxlength="250">
                        </div>

                        <div class="row_add_house">
                            <span></span>    </div>
                        <!--/////////////////////////////////////////////////upload other foto -->
                        <div class="row_add_house">
                            <span> Add more photos:</span>

                            <div id="items">
                                <span><input type="file" multiple="true" name="new_photo_file[]" value="" size="45"><br></span>
                            </div>
                        </div>
                        <!--/////////////////////////////////////////////////end to upload photos gallery -->


                    </div>
                    <div class="rem_house col-md-12">
                        <div class="house_titlebox">
                            Pricing    </div>
                        <div class="row_add_house">
                            <span>Listing type:</span>
                            <span><select id="listing_type" name="listing_type" class="inputbox" size="1">
                                    <option value="0">---select---</option>
                                    <option value="1">House for rent</option>
                                    <option value="2">House for sale</option>
                                </select>
                            </span>
                        </div>

                        <div class="row_add_house">
                            <span>Listing status:</span>
                            <span><select id="listing_status" name="listing_status" class="inputbox" size="1">
                                    <option value="0">---select---</option>
                                    <option value="1">Active</option>
                                    <option value="2">Offer</option>
                                    <option value="3">Contract</option>
                                    <option value="4">Closed</option>
                                    <option value="5">Withdrawn</option>
                                </select>
                            </span>
                        </div>

                        <div class="row_add_house" id="price_alert">
                            <div id="price_alert_warning"></div>
                            <span>Price:*</span>
                            <div style="display:inline-block;">
                                <input class="inputbox" type="text" id="price" name="price" size="15" value="">
                                <select id="priceunit" name="priceunit" class="inputbox" size="1">
                                    <option value="USD">USD</option>
                                    <option value="EUR">EUR</option>
                                    <option value="CAD">CAD</option>
                                </select>
                            </div>
                        </div>
                        <div class="row_add_house">
                            <div class="rem_specprice">
                                <!-- begin sp price -->
                                <div class="accordion" id="accordion2">
                                    <div class="accordion-group">
                                        <div class="accordion-heading" id="rem_house_titlebox">
                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                                Add special price          </a>
                                        </div>
                                        <div id="collapseTwo" class="accordion-body collapse">
                                            <div class="accordion-inner">
                                                <div class="price_col">
                                                    <div>
                                                        <div style="display:inline-block">
                                                            <div>Check In</div>
                                                            <p><input type="text" id="price_from" name="price_from" class="hasDatepicker"></p>
                                                        </div>

                                                        <div style="display:inline-block">
                                                            <div>Check Out</div>
                                                            <p><input type="text" id="price_to" name="price_to" class="hasDatepicker"></p>
                                                        </div>

                                                    </div>
                                                    <div style="display:inline-block">
                                                        <div>Price</div>
                                                        <input id="special_price" class="box price" type="text" name="special_price" size="15" value="">
                                                    </div>

                                                    <div>
                                                        <div>Comment</div>
                                                        <textarea id="comment_price" rows="5" cols="25" name="comment_price"></textarea>
                                                    </div>

                                                    <div>
                                                        <input id="subPrice" class="box" type="button" name="new_price" value="Add special price">
                                                    </div>
                                                </div>
                                                <div id="message-here" style="color: red; font-size: 14px;"></div>
                                                <div id="SpecialPriseBlock">
                                                    <table class="adminlist adminlist_04" width="100%" align="center">
                                                        <tbody><tr>
                                                                <th class="title" width="15%" align="center">Price per day</th>
                                                                <th class="title" align="center" width="20%">From</th>
                                                                <th class="title" align="center" width="20%">To</th>
                                                                <th class="title" align="center" width="30%">Comment</th>
                                                                <th class="title" align="center" width="15%">Select to remove</th>
                                                            </tr>
                                                        </tbody></table>
                                                </div>
                                                <!--******************************************************-->
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div> 
                        </div> 

                    </div>
                    <div class="rem_house col-md-12">
                        <div class="house_titlebox">
                            Amenities        </div>

                        <div class="row_house_checkbox row_add_house">
                            <div class="rem_features_category"> Exterior</div>
                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="321">Yard                                    </div>


                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="320">Garden                                    </div>


                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="319">Patio                                    </div>


                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="328">Garage                                    </div>

                            <div class="rem_features_category"> Specific</div>
                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="322">Pool                                    </div>


                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="326">Balcony                                    </div>


                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="327">Gym                                    </div>


                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="330">Guest Quarters                                    </div>

                            <div class="rem_features_category">Interior</div>
                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="323">Fully Furnished                                    </div>


                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="324">Heating                                    </div>


                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="325">Fireplace                                    </div>


                            <div class="rem_features_name">
                                <input type="checkbox" name="feature[]" value="329">Air Conditioning                                    </div>

                        </div>
                    </div>
                    <div class="rem_house col-md-12">
                        <div class="house_titlebox">
                            Location  </div>
                        <div class="row-fluid">
                            <div class="span5 col-md-6 rem_addlocation">
                                <div class="row_add_house">
                                    <span>Country:</span>
                                    <input class="inputbox" type="text" id="hcountry" name="hcountry" size="30" value="">
                                </div>

                                <div class="row_add_house">
                                    <span>Address:*</span>
                                    <input class="inputbox" type="text" id="hlocation" name="hlocation" size="60" value="">
                                </div>

                                <div class="row_add_house">
                                    <span>City:</span>
                                    <input class="inputbox" type="text" id="hcity" name="hcity" size="30" value="">
                                </div>

                                <div class="row_add_house">
                                    <span>Region:</span>
                                    <input class="inputbox" type="text" id="hregion" name="hregion" size="30" value="">
                                </div>

                                <div class="row_add_house">
                                    <span>Zipcode:</span>
                                    <input class="inputbox" type="text" id="hzipcode" name="hzipcode" size="30" value="">
                                </div>

                                <div class="row_add_house" style="display:none">
                                    <input class="inputbox" type="text" id="hlatitude" name="hlatitude" size="20" value="" readonly="">
                                </div>

                                <div class="row_add_house" style="display:none">
                                    <input class="inputbox" type="text" id="hlongitude" name="hlongitude" size="20" value="" readonly="">
                                    <input type="hidden" id="map_zoom" name="map_zoom" value="1">
                                </div>

                                <div class="row_add_house">
                                    <span style="visibility:hidden">Get geographic coordinates</span>
                                    <input type="button" id="button_show_address" value="Show address on map" onclick="codeAddress()">
                                </div>
                            </div>
                            <div class="span7 col-md-6">
                                <div class="rem_addlocation_map">
                                    <div id="map_canvas" class="re_map_canvas" style="position: relative; overflow: hidden; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;"><div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default;"><div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0); will-change: transform;"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; position: absolute; left: 54px; top: -107px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 54px; top: 149px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -202px; top: -107px;"></div><div style="width: 256px; height: 256px; position: absolute; left: -202px; top: 149px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 310px; top: -107px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 310px; top: 149px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 566px; top: -107px;"></div><div style="width: 256px; height: 256px; position: absolute; left: 566px; top: 149px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 54px; top: -107px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 54px; top: 149px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -202px; top: -107px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -202px; top: 149px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 310px; top: -107px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 310px; top: 149px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 566px; top: -107px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 566px; top: 149px;"></div></div></div></div><div style="position: absolute; z-index: 0; left: 0px; top: 0px;"><div style="overflow: hidden;"></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div aria-hidden="true" style="position: absolute; left: 0px; top: 0px; z-index: 1; visibility: inherit;"><div style="position: absolute; left: 54px; top: -107px; transition: opacity 200ms ease-out;"><img src="http://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i1!2i0!3i0!4i256!2m3!1e0!2sm!3i359028489!3m9!2svi-VN!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=64369" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 54px; top: 149px; transition: opacity 200ms ease-out;"><img src="http://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i1!2i0!3i1!4i256!2m3!1e0!2sm!3i359028489!3m9!2svi-VN!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=100390" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -202px; top: 149px; transition: opacity 200ms ease-out;"><img src="http://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i1!2i1!3i1!4i256!2m3!1e0!2sm!3i359028489!3m9!2svi-VN!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=120133" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -202px; top: -107px; transition: opacity 200ms ease-out;"><img src="http://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i1!2i1!3i0!4i256!2m3!1e0!2sm!3i359028489!3m9!2svi-VN!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=84112" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 310px; top: -107px;"><img src="http://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i1!2i1!3i0!4i256!2m3!1e0!2sm!3i359028489!3m9!2svi-VN!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=84112" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 310px; top: 149px;"><img src="http://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i1!2i1!3i1!4i256!2m3!1e0!2sm!3i359028489!3m9!2svi-VN!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=120133" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 566px; top: -107px;"><img src="http://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i1!2i0!3i0!4i256!2m3!1e0!2sm!3i359028489!3m9!2svi-VN!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=64369" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 566px; top: 149px;"><img src="http://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i1!2i0!3i1!4i256!2m3!1e0!2sm!3i359028489!3m9!2svi-VN!3sUS!5e18!12m1!1e47!12m3!1e37!2m1!1ssmartmaps!4e0&amp;token=100390" draggable="false" alt="" style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div class="gm-style-pbc" style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%; transition-duration: 0.3s; opacity: 0; display: none;"><p class="gm-style-pbt">Sử dụng hai ngón tay để di chuyển bản đồ</p></div><div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; height: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 4; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" href="https://maps.google.com/maps?ll=0,0&amp;z=1&amp;t=m&amp;hl=vi-VN&amp;gl=US&amp;mapclient=apiv3" title="Nhấp để xem khu vực này trên Google Maps" style="position: static; overflow: visible; float: none; display: inline;"><div style="width: 66px; height: 26px; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div><div style="padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 256px; height: 148px; position: absolute; left: 160px; top: 59px; background-color: white;"><div style="padding: 0px 0px 10px; font-size: 16px;">Dữ liệu Bản đồ</div><div style="font-size: 13px;">Dữ liệu bản đồ ©2016</div><div style="width: 13px; height: 13px; overflow: hidden; position: absolute; opacity: 0.7; right: 12px; top: 12px; z-index: 10000; cursor: pointer;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/mapcnt6.png" draggable="false" style="position: absolute; left: -2px; top: -336px; width: 59px; height: 492px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 221px; bottom: 0px; width: 109px;"><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a style="color: rgb(68, 68, 68); text-decoration: none; cursor: pointer; display: none;">Dữ liệu Bản đồ</a><span style="">Dữ liệu bản đồ ©2016</span></div></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Dữ liệu bản đồ ©2016</div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; -webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 115px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/vi-VN_US/help/terms_maps.html" target="_blank" style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Điều khoản sử dụng</a></div></div><div style="width: 25px; height: 25px; overflow: hidden; display: none; margin: 10px 14px; position: absolute; top: 0px; right: 0px;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/sv5.png" draggable="false" class="gm-fullscreen-control" style="position: absolute; left: -52px; top: -86px; width: 164px; height: 112px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px;"></div><div draggable="false" class="gm-style-cc" style="-webkit-user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="width: auto; height: 100%; margin-left: 1px; background-color: rgb(245, 245, 245);"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_new" title="Báo cáo lỗi trong bản đồ đường hoặc hình ảnh đến Google" href="https://www.google.com/maps/@0,0,1z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); text-decoration: none; position: relative;">Báo cáo một lỗi bản đồ</a></div></div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" controlwidth="28" controlheight="93" style="margin: 10px; -webkit-user-select: none; position: absolute; bottom: 107px; right: 28px;"><div class="gmnoprint" controlwidth="28" controlheight="55" style="position: absolute; left: 0px; top: 38px;"><div draggable="false" style="-webkit-user-select: none; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; width: 28px; height: 55px; background-color: rgb(255, 255, 255);"><div title="Phóng to" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: 0px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div><div style="position: relative; overflow: hidden; width: 67%; height: 1px; left: 16%; top: 0px; background-color: rgb(230, 230, 230);"></div><div title="Thu nhỏ" style="position: relative; width: 28px; height: 27px; left: 0px; top: 0px;"><div style="overflow: hidden; position: absolute; width: 15px; height: 15px; left: 7px; top: 6px;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl.png" draggable="false" style="position: absolute; left: 0px; top: -15px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 120px; height: 54px;"></div></div></div></div><div class="gm-svpc" controlwidth="28" controlheight="28" style="box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-radius: 2px; width: 28px; height: 28px; cursor: url(&quot;http://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;) 8 8, default; position: absolute; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: 1px;"></div><div style="position: absolute; left: 1px; top: 1px;"></div><div style="position: absolute; left: 1px; top: 1px;"></div><div style="position: absolute; left: 1px; top: 1px;"><div aria-label="Kiểm soát người hình mắc áo trong chế độ xem phố" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -26px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Người hình mắc áo ở đầu Bản đồ" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -52px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div aria-label="Kiểm soát người hình mắc áo trong chế độ xem phố" style="width: 26px; height: 26px; overflow: hidden; position: absolute; left: 0px; top: 0px; visibility: hidden;"><img src="http://maps.gstatic.com/mapfiles/api-3/images/cb_scout5.png" draggable="false" style="position: absolute; left: -147px; top: -78px; width: 215px; height: 835px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" controlwidth="28" controlheight="0" style="display: none; position: absolute;"><div title="Xoay bản đồ 90 độ" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; cursor: pointer; display: none; background-color: rgb(255, 255, 255);"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: 6px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div class="gm-tilt" style="width: 28px; height: 28px; overflow: hidden; position: absolute; border-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; top: 0px; cursor: pointer; background-color: rgb(255, 255, 255);"><img src="http://maps.gstatic.com/mapfiles/api-3/images/tmapctrl4.png" draggable="false" style="position: absolute; left: -141px; top: -13px; width: 170px; height: 54px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div><div class="gmnoprint" style="margin: 10px; z-index: 0; position: absolute; cursor: pointer; left: 0px; top: 0px;"><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Hiển thị bản đồ phố" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-left-radius: 2px; border-top-left-radius: 2px; -webkit-background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; min-width: 34px; font-weight: 500; background-color: rgb(255, 255, 255); background-clip: padding-box;">Bản đồ</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; left: 0px; top: 31px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Hiển thị bản đồ phố với địa hình" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden; display: none;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Địa hình</label></div></div></div><div class="gm-style-mtc" style="float: left;"><div draggable="false" title="Hiển thị hình ảnh qua vệ tinh" style="direction: ltr; overflow: hidden; text-align: center; position: relative; color: rgb(86, 86, 86); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 8px; border-bottom-right-radius: 2px; border-top-right-radius: 2px; -webkit-background-clip: padding-box; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; border-left-width: 0px; min-width: 34px; background-color: rgb(255, 255, 255); background-clip: padding-box;">Vệ tinh</div><div style="z-index: -1; padding: 2px; border-bottom-left-radius: 2px; border-bottom-right-radius: 2px; box-shadow: rgba(0, 0, 0, 0.298039) 0px 1px 4px -1px; position: absolute; right: 0px; top: 31px; text-align: left; display: none; background-color: white;"><div draggable="false" title="Hiển thị hình ảnh có tên phố" style="color: rgb(0, 0, 0); font-family: Roboto, Arial, sans-serif; -webkit-user-select: none; font-size: 11px; padding: 6px 8px 6px 6px; direction: ltr; text-align: left; white-space: nowrap; background-color: rgb(255, 255, 255);"><span role="checkbox" style="box-sizing: border-box; position: relative; line-height: 0; font-size: 0px; margin: 0px 5px 0px 0px; display: inline-block; border: 1px solid rgb(198, 198, 198); border-radius: 1px; width: 13px; height: 13px; vertical-align: middle; background-color: rgb(255, 255, 255);"><div style="position: absolute; left: 1px; top: -2px; width: 13px; height: 11px; overflow: hidden;"><img src="http://maps.gstatic.com/mapfiles/mv/imgs8.png" draggable="false" style="position: absolute; left: -52px; top: -44px; -webkit-user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none; width: 68px; height: 67px;"></div></span><label style="vertical-align: middle; cursor: pointer;">Nhãn</label></div></div></div></div></div></div>
                                    <!--Image google map-->
                                    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
                                    <script type="text/javascript">
                                        setTimeout(function () {
                                            vm_initialize();
                                        }, 20);
                                        function vm_initialize() {
                                            var map;
                                            var lastmarker = null;
                                            var marker = null;
                                            var mapOptions;
                                            var myOptions = {
                                                zoom: 1,
                                                center: new google.maps.LatLng(0, 0),
                                                scrollwheel: false,
                                                zoomControlOptions: {
                                                    style: google.maps.ZoomControlStyle.LARGE
                                                },
                                                mapTypeId: google.maps.MapTypeId.ROADMAP
                                            };
                                            geocoder = new google.maps.Geocoder();
                                            var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                            var bounds = new google.maps.LatLngBounds();
                                            //If the zoom, then store it in the field map_zoom
                                            google.maps.event.addListener(map, "zoom_changed", function () {
                                                document.getElementById("map_zoom").value = map.getZoom();
                                            });
                                            google.maps.event.addListener(map, "click", function (e) {
                                                //Initialize marker
                                                marker = new google.maps.Marker({
                                                    position: new google.maps.LatLng(e.latLng.lat(), e.latLng.lng())
                                                });
                                                //Delete marker
                                                if (lastmarker)
                                                    lastmarker.setMap(null);
                                                ;
                                                //Add marker to the map
                                                marker.setMap(map);
                                                //Output marker information
                                                document.getElementById("hlatitude").value = e.latLng.lat();
                                                document.getElementById("hlongitude").value = e.latLng.lng();
                                                //Memory marker to delete
                                                lastmarker = marker;
                                            });

                                        }
                                        function updateCoordinates(latlng)
                                        {
                                            if (latlng)
                                            {
                                                document.getElementById('hlatitude').value = latlng.lat();
                                                document.getElementById('hlongitude').value = latlng.lng();
                                                document.getElementById("map_zoom").value = map.getZoom();
                                            }
                                        }



                                        function toggleBounce() {

                                            if (marker.getAnimation() != null) {
                                                marker.setAnimation(null);
                                            } else {
                                                marker.setAnimation(google.maps.Animation.BOUNCE);
                                            }
                                        }


                                        function codeAddress() {
                                            var marker;
                                            myOptions = {
                                                zoom: 14,
                                                scrollwheel: false,
                                                zoomControlOptions: {
                                                    style: google.maps.ZoomControlStyle.LARGE
                                                },
                                                mapTypeId: google.maps.MapTypeId.ROADMAP
                                            }
                                            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                            var address = document.getElementById('hlocation').value + " " +
                                                    document.getElementById('hcountry').value + " " +
                                                    document.getElementById('hregion').value + " " +
                                                    document.getElementById('hcity').value + " " +
                                                    document.getElementById('hzipcode').value + " " +
                                                    document.getElementById('hlatitude').value + " " +
                                                    document.getElementById('hlongitude').value;
                                            geocoder.geocode({'address': address}, function (results, status) {
                                                if (status == google.maps.GeocoderStatus.OK) {
                                                    map.setCenter(results[0].geometry.location);
                                                    updateCoordinates(results[0].geometry.location);
                                                    if (marker)
                                                        marker.setMap(null);
                                                    marker = new google.maps.Marker({
                                                        map: map,
                                                        position: results[0].geometry.location,
                                                        draggable: true,
                                                        animation: google.maps.Animation.DROP
                                                    });
                                                    google.maps.event.addListener(marker, 'click', toggleBounce);
                                                    google.maps.event.addListener(marker, "dragend", function () {
                                                        updateCoordinates(marker.getPosition());
                                                    });



                                                } else {
                                                    vm_initialize();
                                                    alert("Please check the accuracy of Address");
                                                }
                                            });
                                        }

                                    </script>
                                    <span>Click on the map to choose the house location:</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="rem_house col-md-12">
                        <div class="house_titlebox">
                            Details            </div> 
                        <div class="row_add_house col-md-12">
                            <span>Property type:</span>
                            <span><select id="property_type" name="property_type" class="inputbox" size="1">
                                    <option value="0">---select---</option>
                                    <option value="1">Apartment</option>
                                    <option value="2">Commercial</option>
                                    <option value="3">Condo</option>
                                    <option value="4">Coop</option>
                                    <option value="5">Farm</option>
                                    <option value="6">Land</option>
                                    <option value="7">Manufactured</option>
                                    <option value="8">Multifamily</option>
                                    <option value="9">Ranch</option>
                                    <option value="10">Single family</option>
                                    <option value="11">Tic</option>
                                    <option value="12">Townhouse</option>
                                </select>
                            </span>
                        </div>

                        <div class="row_add_house col-md-6" id="rooms_alert">
                            <div id="lot_size_alert"></div>
                            <span>Lot size, Sqrt:</span>
                            <input class="inputbox" type="text" id="lot_size" name="lot_size" size="30" value="">
                        </div>

                        <div class="row_add_house col-md-6">
                            <div id="house_size_alert"></div>
                            <span>House size, Sqrt:*</span>
                            <input class="inputbox" type="text" id="house_size" name="house_size" size="30" value="">
                        </div>

                        <div class="row_add_house col-md-6">
                            <div id="rooms_alert"></div>
                            <span>Rooms:*</span>
                            <input class="inputbox" type="text" id="rooms" name="rooms" size="10" value="">
                        </div>

                        <div class="row_add_house col-md-6">
                            <div id="bathrooms_alert"></div>  
                            <span>Bathrooms:</span>
                            <input class="inputbox" type="text" id="bathrooms" name="bathrooms" size="10" value="">
                        </div>

                        <div class="row_add_house col-md-6">
                            <div id="bedrooms_alert"></div>
                            <span>Bedrooms:*</span>
                            <input class="inputbox" type="text" id="bedrooms" name="bedrooms" size="10" value="">
                        </div>

                        <div class="row_add_house col-md-6">
                            <div id="garages_alert"></div>
                            <span>Garages:</span>
                            <input class="inputbox" type="text" id="garages" name="garages" size="30" value="">
                        </div>

                        <div class="row_add_house">
                            <div id="alert_year"></div>
                            <span>Built year:*</span>
                            <span>
                                <select name="year" id="year" class="inputbox" size="1">
                                    <option value="">---select---</option><option value="1900">1900</option><option value="1901">1901</option><option value="1902">1902</option><option value="1903">1903</option><option value="1904">1904</option><option value="1905">1905</option><option value="1906">1906</option><option value="1907">1907</option><option value="1908">1908</option><option value="1909">1909</option><option value="1910">1910</option><option value="1911">1911</option><option value="1912">1912</option><option value="1913">1913</option><option value="1914">1914</option><option value="1915">1915</option><option value="1916">1916</option><option value="1917">1917</option><option value="1918">1918</option><option value="1919">1919</option><option value="1920">1920</option><option value="1921">1921</option><option value="1922">1922</option><option value="1923">1923</option><option value="1924">1924</option><option value="1925">1925</option><option value="1926">1926</option><option value="1927">1927</option><option value="1928">1928</option><option value="1929">1929</option><option value="1930">1930</option><option value="1931">1931</option><option value="1932">1932</option><option value="1933">1933</option><option value="1934">1934</option><option value="1935">1935</option><option value="1936">1936</option><option value="1937">1937</option><option value="1938">1938</option><option value="1939">1939</option><option value="1940">1940</option><option value="1941">1941</option><option value="1942">1942</option><option value="1943">1943</option><option value="1944">1944</option><option value="1945">1945</option><option value="1946">1946</option><option value="1947">1947</option><option value="1948">1948</option><option value="1949">1949</option><option value="1950">1950</option><option value="1951">1951</option><option value="1952">1952</option><option value="1953">1953</option><option value="1954">1954</option><option value="1955">1955</option><option value="1956">1956</option><option value="1957">1957</option><option value="1958">1958</option><option value="1959">1959</option><option value="1960">1960</option><option value="1961">1961</option><option value="1962">1962</option><option value="1963">1963</option><option value="1964">1964</option><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option>                                </select>
                            </span>
                        </div>


                        <div class="row_add_house">
                            <div id="alert_edoc"></div>
                            <span>Upload edocument:</span>
                            <input class="inputbox" type="file" name="edoc_file" value="" size="25" maxlength="250" onclick="document.save_add.edok_link.value = '';">
                        </div>

                        <div class="row_add_house">
                            <span>edocument Download Link URL:</span>
                            <input class="inputbox" type="text" name="edok_link" value="" size="50" maxlength="250">
                        </div>

                        <div>
                            <span id="error_video"></span>
                        </div>
                        <!--<div class="row_add_house"><span>Video:</span><div id="v_items"> <input id="v_add" type="button" name="new_video" value="Add new video file" onclick="new_videos()"></div></div><div class="row_add_house"><span>Track for video:</span><span id="t_items"><input id="t_add" type="button" name="new_track" value="Add new track" onclick="new_tracks()"></span></div>--><table>
                        </table>

                        <!--******************************************************************-->

                        <!--**************************************************************-->

                    </div>
                    <div class="rem_house col-md-12">
                        <div class="house_titlebox">
                            Agent info            </div> 
                        <div class="row_add_house">
                            <span>Agent name:</span>
                            <input class="box" type="text" name="agent" size="30" value="" width="300px">
                        </div>

                        <div class="row_add_house">
                            <span>Contacts:</span>
                            <input class="box" type="text" name="contacts" size="40" value="" width="300px">
                        </div>

                        <div class="row_add_house">
                            <span>Username:</span>

                            <span>
                                <input class="inputbox" type="text" name="name" readonly="">

                            </span>
                        </div>
                        <div class="row_add_house" id="owneremail_alert">
                            <div id="owneremail_alert"></div>
                            <span>Email:*</span>
                            <span>
                                <input class="inputbox" type="text" name="owneremail" id="owneremail" value="" width="300px">
                            </span>
                        </div>
                    </div>
                    <div class="rem_house col-md-12">
                        <div class="house_titlebox">
                            Language        </div> 
                        <div class="row_add_house">
                            <span>Language associate houses:</span> 
                            <span>This property only for houses with language</span> 

                        </div>


                        <div class="row_add_house">
                            <span class="admin_col_01">Language:</span>
                            <span class="admin_col_02"><select id="language" name="language" class="inputbox" size="1">
                                    <option value="*">All</option>
                                    <option value="en-GB">English (UK)</option>
                                </select>
                            </span>
                        </div>
                    </div>
                </div>
                <input type="button" name="submit2" value=" Save " class="saveit" onclick="">
            </form>
        </div>




        <!--Footer Content-->

        <div class="clearfix">

        </div>

    </div>

</section>
@stop
