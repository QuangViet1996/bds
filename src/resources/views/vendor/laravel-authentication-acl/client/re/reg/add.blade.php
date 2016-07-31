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

        <div class="column reg-re-add">
            <div class="span12">
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
                <div class="rem_house">
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
                <div class="rem_house">
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
                <div class="rem_house">
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
            </div>
        </div>



        <!--Separator-->

        <div class="separator big-separator"></div>

        <!--Footer Content-->

        <div class="footer-content">

        </div>

    </div>

</section>
@stop
