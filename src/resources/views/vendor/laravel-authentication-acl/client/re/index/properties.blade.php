<?php
if (!class_exists('lessc')) {
    include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/properties.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/properties.css');
?>
<section class="gallery-section full-width">

    <div class="auto-container">    
        <!--Section Title-->
        <div class="sec-title">               
            <h2>Photo <span class="theme_color">Gallery</span></h2>
            <div class="separator small-separator"></div>               
            <div class="text"><p>Real Estate agents are Property consisting of land and the buildings on it, along with its seds naturals resources such seds as crops, minerals, or water</p></div>
        </div>           
        <!--Filter-->
        <div class="filters">

            <ul class="filter-tabs clearfix anim-3-all nav nav-tabs">
                <li class="filter"><a data-toggle="tab" href="#All">All</a></li>
                <li class="filter"><a data-toggle="tab" href="#Apartment">Apartment</a></li>
                <li class="filter"><a data-toggle="tab" href="#LivingRoom">Living Room</a></li>

            </ul>
        </div>
    </div>
    <div class="realestatemanager1 container">
        <div class="basictable-1 basictable row"> 
            <div class="tab-content">
                <!-- All -->
                <div class="featured_houses tab-pane fade in active" id="All">
                    @foreach($data['real_estates'] as $real_estates)
                    <div class="featured_houses_block col-md-4 col-sm-6 col-xs-12">
                        <div style="position:relative">
                            <a href="{!! URL::route('re.view')!!}" target="_self"> <img src="http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2016/01/3.jpg" alt="Avenel House" border="0"></a>    <div class="col_rent">
                                For sale                </div><!-- col_rent -->
                        </div>
                        <div class="feature_texthouse">
                            <h4 class="featured_houses_title">
                                <a href="{!! URL::route('re.view')!!}" target="_self">{!!$real_estates->real_estate_title!!}</a>        </h4>
                            <div class="featured_houses_location"><i class="fa fa-map-marker"></i> USA, Avenel&nbsp;</div>              <div class="featured_houses_category">
                                <i class="fa fa-tag"></i>
                                <a href="#" class="category">
                                    Apartment</a>
                            </div>
                            
                            <div class="featured_houses_size featured_houses_inline">
                                <i class="fa fa-expand"></i> {!!$real_estates->real_estate_sq!!}&nbsp;Sqrt
                            </div>
                            
                            <div class="featured_houses_rooms featured_houses_inline">
                                <i class="fa fa-building-o"></i> Rooms: 4&nbsp;
                            </div>
                            
                            <div class="featured_houses_year featured_houses_inline">
                                <i class="fa fa-tint"></i> Build year: {!!$real_estates->real_estate_year_build!!} &nbsp;
                            </div>
                            
                            <div class="featured_houses_bedrooms featured_houses_inline">
                                <i class="fa fa-inbox"></i> Bedrooms: {!!$real_estates->real_estate_bedroom!!} &nbsp;
                            </div>
                            
                            <div class="featured_houses_bathrooms featured_houses_inline">
                                <i class="fa fa-inbox"></i> Bathrooms: {!!$real_estates->real_estate_bathroom!!} &nbsp;
                            </div>
                            
                            
                        </div>
                        <div class="rem_house_viewlist">
                            <a href="{!! URL::route('re.view')!!}" target="_self" style="display: block">
                                <div class="featured_houses_price ">7.000.000,00&nbsp;USD</div><div class="featured_houses_viewlisting">View listing</div>                </a>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                     @endforeach
                </div>
                <!-- 1 -->


                <div class="featured_houses tab-pane fade" id="Apartment">
                    <div class="featured_houses_block col-md-4 col-sm-6 col-xs-12">
                        <div style="position:relative">
                            <a href="#" target="_self"> <img src="http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2016/01/3.jpg" alt="Avenel House" border="0"></a>    <div class="col_rent">
                                For sale                </div><!-- col_rent -->
                        </div>
                        <div class="feature_texthouse">
                            <h4 class="featured_houses_title">
                                <a href="#" target="_self">Avenel House</a>        </h4>
                            <div class="featured_houses_location"><i class="fa fa-map-marker"></i> USA, Avenel&nbsp;</div>              <div class="featured_houses_category">
                                <i class="fa fa-tag"></i>
                                <a href="#" class="category">
                                    Apartment</a>
                            </div>
                            <div class="featured_houses_size featured_houses_inline"><i class="fa fa-expand"></i> 3500&nbsp;Sqrt</div><div class="featured_houses_rooms featured_houses_inline"><i class="fa fa-building-o"></i> Rooms: 4&nbsp;</div><div class="featured_houses_year featured_houses_inline"><i class="fa fa-tint"></i> Built year: 2004&nbsp;</div><div class="featured_houses_bedrooms featured_houses_inline"><i class="fa fa-inbox"></i> Bedrooms: 2&nbsp;</div><div class="featured_houses_hits featured_houses_inline"><i class="fa fa-eye"></i> Hits: 162</div>    </div>
                        <div class="rem_house_viewlist">
                            <a href="#" target="_self" style="display: block">
                                <div class="featured_houses_price ">7.000.000,00&nbsp;USD</div><div class="featured_houses_viewlisting">View listing</div>                </a>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                </div>
                <!-- 2 -->
                <div class="featured_houses tab-pane fade" id="LivingRoom">
                    <div class="featured_houses_block col-md-4 col-sm-6 col-xs-12">
                        <div style="position:relative">
                            <a href="#" target="_self"> <img src="http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2016/01/3.jpg" alt="Avenel House" border="0"></a>    <div class="col_rent">
                                For sale                </div><!-- col_rent -->
                        </div>
                        <div class="feature_texthouse">
                            <h4 class="featured_houses_title">
                                <a href="#" target="_self">Avenel House</a>        </h4>
                            <div class="featured_houses_location"><i class="fa fa-map-marker"></i> USA, Avenel&nbsp;</div>              <div class="featured_houses_category">
                                <i class="fa fa-tag"></i>
                                <a href="#" class="category">
                                    Apartment</a>
                            </div>
                            <div class="featured_houses_size featured_houses_inline"><i class="fa fa-expand"></i> 3500&nbsp;Sqrt</div><div class="featured_houses_rooms featured_houses_inline"><i class="fa fa-building-o"></i> Rooms: 4&nbsp;</div><div class="featured_houses_year featured_houses_inline"><i class="fa fa-tint"></i> Built year: 2004&nbsp;</div><div class="featured_houses_bedrooms featured_houses_inline"><i class="fa fa-inbox"></i> Bedrooms: 2&nbsp;</div><div class="featured_houses_hits featured_houses_inline"><i class="fa fa-eye"></i> Hits: 162</div>    </div>
                        <div class="rem_house_viewlist">
                            <a href="#" target="_self" style="display: block">
                                <div class="featured_houses_price ">7.000.000,00&nbsp;USD</div><div class="featured_houses_viewlisting">View listing</div>                </a>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                    <div class="featured_houses_block col-md-4 col-sm-6 col-xs-12">
                        <div style="position:relative">
                            <a href="#" target="_self"> <img src="http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2016/01/3.jpg" alt="Avenel House" border="0"></a>    <div class="col_rent">
                                For sale                </div><!-- col_rent -->
                        </div>
                        <div class="feature_texthouse">
                            <h4 class="featured_houses_title">
                                <a href="#" target="_self">Avenel House</a>        </h4>
                            <div class="featured_houses_location"><i class="fa fa-map-marker"></i> USA, Avenel&nbsp;</div>              <div class="featured_houses_category">
                                <i class="fa fa-tag"></i>
                                <a href="#" class="category">
                                    Apartment</a>
                            </div>
                            <div class="featured_houses_size featured_houses_inline"><i class="fa fa-expand"></i> 3500&nbsp;Sqrt</div><div class="featured_houses_rooms featured_houses_inline"><i class="fa fa-building-o"></i> Rooms: 4&nbsp;</div><div class="featured_houses_year featured_houses_inline"><i class="fa fa-tint"></i> Built year: 2004&nbsp;</div><div class="featured_houses_bedrooms featured_houses_inline"><i class="fa fa-inbox"></i> Bedrooms: 2&nbsp;</div><div class="featured_houses_hits featured_houses_inline"><i class="fa fa-eye"></i> Hits: 162</div>    </div>
                        <div class="rem_house_viewlist">
                            <a href="#" target="_self" style="display: block">
                                <div class="featured_houses_price ">7.000.000,00&nbsp;USD</div><div class="featured_houses_viewlisting">View listing</div>                </a>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div>&nbsp;</div>
    </div>
</div>
</section>