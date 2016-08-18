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
            <h2>Dự án <span class="theme_color">Khác</span></h2>
            <div class="separator small-separator"></div>
            <div class="text"><p>Các dự án nỗi bật khác</p></div>
        </div>
        <!--Filter-->
        <div class="filters">
            <ul class="filter-tabs clearfix anim-3-all nav nav-tabs">
                <li class="filter"><a data-toggle="tab" href="#All">All</a></li>
                @foreach($more_re as $item)
                <li class="filter">
                    <a data-toggle="tab" href="#cat_{!! $item['category']->real_estate_category_id!!}">
                        {!! $item['category']->real_estate_category_title  !!}
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    <div class="realestatemanager1 container">
        <div class="basictable-1 basictable row">
            <div class="tab-content">
                <!-- All -->
                <div class="featured_houses tab-pane fade in active" id="All">
                    @foreach($more_re as $item)

                        <?php $counter = 0;  ?>
                        @foreach ($item['re'] as $real_estate)
                        <?php if($counter > 1) break;  $counter++;?>
                        <div class="featured_houses_block col-md-4 col-sm-6 col-xs-12">
                            <div style="position:relative">
                                <a href="{!! URL::route('re.view',['id' => $real_estate->real_estate_id])!!}" target="_self">
                                    <img src="images/3.jpg" alt="Avenel House" border="0">
                                </a>
                                <div class="col_rent">
                                    For sale
                                </div><!-- col_rent -->
                            </div>
                            <div class="feature_texthouse">

                                <h4 class="featured_houses_title">
                                    <a href="{!! URL::route('re.view',['id' => $real_estate->real_estate_id])!!}" target="_self">
                                        {!!$real_estate->real_estate_title!!}
                                    </a>
                                </h4>

                                <div class="featured_houses_location">
                                    <i class="fa fa-map-marker"></i>
                                    {!! $real_estate->real_estate_map_address !!}
                                </div>

                                <div class="featured_houses_category">
                                    <i class="fa fa-tag"></i>
                                    <a href="#" class="category">
                                        {!! $item['category']->real_estate_category_title !!}
                                    </a>
                                </div>

                                <div class="featured_houses_size featured_houses_inline">
                                    <i class="fa fa-expand"></i>
                                    {!!$real_estate->real_estate_sq!!}&nbsp;Sqrt
                                </div>

                                <div class="featured_houses_year featured_houses_inline">
                                    <i class="fa fa-tint"></i>
                                    Build year: {!!$real_estate->real_estate_year_build!!} &nbsp;
                                </div>
                                <div class="featured_houses_bedrooms featured_houses_inline">
                                    <i class="fa fa-inbox"></i>
                                    Bedrooms: {!!$real_estate->real_estate_bedroom!!} &nbsp;
                                </div>
                                <div class="featured_houses_bathrooms featured_houses_inline">
                                    <i class="fa fa-inbox"></i> Bathrooms: {!!$real_estate->real_estate_bathroom!!} &nbsp;
                                </div>
                            </div>
                            <div class="rem_house_viewlist">
                                <a href="{!! URL::route('re.view',['id' => $real_estate->real_estate_id])!!}" target="_self" style="display: block">
                                    <div class="featured_houses_price ">7.000.000,00&nbsp;USD</div><div class="featured_houses_viewlisting">View listing</div>                </a>
                                <div style="clear: both;"></div>
                            </div>
                        </div>
                        @endforeach

                    @endforeach
                </div>
                <!-- Apartment -->

                @foreach($more_re as $item)
                <div class="featured_houses tab-pane fade" id="cat_{!! $item['category']->real_estate_category_id !!}">

                    @foreach($item['re'] as $re)
                    <div class="featured_houses_block col-md-4 col-sm-6 col-xs-12">
                        <div style="position:relative">
                            <a href="{!! URL::route('re.view',['id' => $re->real_estate_id])!!}" target="_self"> <img src="../images/3.jpg" alt="Avenel House" border="0"></a>
                            <div class="col_rent">
                                For sale
                            </div><!-- col_rent -->
                        </div>
                        <div class="feature_texthouse">

                            <!--TITLE-->
                            <h4 class="featured_houses_title">
                                <a href="#" target="_self">{!! $re->real_estate_title !!}</a>
                            </h4>

                            <!--LOCATION-->
                            <div class="featured_houses_location">
                                <i class="fa fa-map-marker"></i>
                                {!! $re->real_estate_map_address !!}
                            </div>

                            <!--CATEGORY-->
                            <div class="featured_houses_category">
                                <i class="fa fa-tag"></i>
                                <a href="#" class="category">
                                    {!! $item['category']->real_estate_category_title !!}
                                </a>
                            </div>

                            <!--SQRT-->
                            <div class="featured_houses_size featured_houses_inline">
                                <i class="fa fa-expand"></i>
                                {!! $re->real_estate_sq !!}
                            </div>

                            <!--BEDROOMS-->
                            <div class="featured_houses_rooms featured_houses_inline">
                                <i class="fa fa-building-o"></i>
                                Rooms: {!! $re->real_estate_bedroom !!}
                            </div>

                            <!--BATHROOMS-->
                            <div class="featured_houses_bedrooms featured_houses_inline">
                                <i class="fa fa-inbox"></i>
                                Bedrooms: {!! $re->real_estate_bathroom !!}
                            </div>

                             <!--YEAR-->
                            <div class="featured_houses_year featured_houses_inline">
                                <i class="fa fa-tint"></i>
                                Built year: {!! $re->real_estate_year_build !!}
                            </div>

                            <!--HITS-->
                            <div class="featured_houses_hits featured_houses_inline">
                                <i class="fa fa-eye"></i>
                                Hits: {!! $re->real_estate_views !!}
                            </div>

                        </div>
                        <div class="rem_house_viewlist">
                            <a href="#" target="_self" style="display: block">
                                <div class="featured_houses_price ">
                                    {!! $re->real_estate_cost !!} VNĐ
                                </div>
                                <div class="featured_houses_viewlisting">Xem chi tiết</div>
                            </a>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                    @endforeach

                </div>
                @endforeach

            </div>
        </div>
        <div>&nbsp;</div>
    </div>
</div>
</section>