<?php
if (!class_exists('lessc')) {
    include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/detail.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/detail.css');
?>

<section class="section  general-row">

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
                    <div class="image-row">
                        <div class="image-set row">
                            <div class="col-md-3">
                                <a class="example-image-link" href="images/cau3.jpg" data-lightbox="cau3" data-title="Click the right half of the image to move forward.">
                                    <img class="example-image" src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/41.jpg') !!}" alt="Golden Gate Bridge with San Francisco in distance" style="width: 100%">
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a class="example-image-link" href="images/cau3.jpg" data-lightbox="cau3" data-title="Or press the right arrow on your keyboard.">
                                    <img class="example-image" src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/41.jpg') !!}" alt="Forest with mountains behind" style="width: 100%">
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a class="example-image-link" href="images/cau3.jpg" data-lightbox="cau3" data-title="The next image in the set is preloaded as you're viewing.">
                                    <img class="example-image" src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/41.jpg') !!}" alt="Bicyclist looking out over hill at ocean" style="width: 100%">
                                </a>
                            </div>

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
                            <div id="map_canvas" class="re_map_canvas re_map_canvas_02" style="position: relative; overflow: hidden; transform: translateZ(0px); background-color: rgb(229, 227, 223);">
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
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="rem_house_contacts">
                    <div id="rem_house_titlebox">
                        Contact agent        </div>    

                    <span class="col_02">Thdsadsadsa<br>pykun6@gmail.com</span>

                </div>
                <div class="rem_buying_house">

                    <div id="rem_house_titlebox">
                        Send message    </div>
                    <div id="show_buying">


                        <div class="row">
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


