<?php
if (!class_exists('lessc')) {
    include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/properties.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/properties.css');
?>
<section class="gallery-section full-width">

    <!--TAB MENU-->
    <div class="auto-container">
        <div class="sec-title">
            <h2>Dự án <span class="theme_color">Mới</span></h2>
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
    <!--/TAB MENU-->

    <!--TAB CONTENT-->
    <div class="realestatemanager1 container">
        <div class="basictable-1 basictable row">
            <div class="tab-content">

                <!--ALL-->
                <div class="featured_houses tab-pane fade in active" id="All">

                    <div class="section-more-re">
                        <div class="newest-properties padding-top padding-bottom">
                            <div class="container">
                                <div class="sunhouse-title">
                                    <div class="icon-image">
                                        <img src="images/logo-title-1.png" class="img-responsive">
                                    </div>
                                    <h2 class="main-title">Newest Properties</h2>
                                    <p class="sub-title">Haven't you heard about the recession: Topten reasons why you should properties</p>
                                </div>
                                <div class="row">
                                    <div class="newest-properties-content">
                                        @foreach($more_re as $item)
                                        <?php $counter = 0; ?>

                                        @foreach ($item['re'] as $re)
                                        <?php
                                        if ($counter > 1)
                                            break;
                                        $counter++;
                                        ?>
                                        <div class="col-md-4 col-xs-6">
                                            <div class="sunhouse-item">
                                                <a href="#" class="wrapper-image">
                                                    <img src="images/house-1.jpg" alt="" class="img-responsive layout-1">
                                                    <img src="images/house-9.jpg" alt="" class="img-responsive layout-2">
                                                </a>
                                                <div class="note for-sale">
                                                    <p class="text">for sale</p>
                                                </div>
                                                <div class="wrapper-content">
                                                    <div class="info-house">
                                                        <div class="info">
                                                            <i class="fa fa-university" aria-hidden="true"></i>
                                                            <p>{!! $re->real_estate_sq !!} Sq Ft</p>
                                                        </div>
                                                        <div class="info">
                                                            <i class="fa fa-university" aria-hidden="true"></i>
                                                            <p>{!! $re->real_estate_bedroom !!} bedroom</p>
                                                        </div>
                                                        <div class="info">
                                                            <i class="fa fa-university" aria-hidden="true"></i>
                                                            <p>{!! $re->real_estate_bathroom !!} bathroom</p>
                                                        </div>
                                                    </div>
                                                    <div class="about-house">
                                                        <a href="{!! URL::route('re.view',['id' => $re->real_estate_id])!!}" class="title">
                                                            {!! $re->real_estate_title !!}
                                                        </a>
                                                        <p class="text">{!! $re->real_estate_overview !!}</p>
                                                    </div>
                                                    <div class="more-info-house">
                                                        <div class="place-house">
                                                            <i class="fa fa-map-marker"></i>
                                                            <a href="#">{!! $re->real_estate_map_address !!}</a>
                                                        </div>
                                                        <div class="price">VNĐ {!! $re->real_estate_cost !!}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!--/ALL-->

                <!--ITEM-->
                <!--########################################################-->
                @foreach($more_re as $item)

                <div class="featured_houses tab-pane fade" id="cat_{!! $item['category']->real_estate_category_id !!}">
                    <div class="section-more-re">
                        <div class="newest-properties padding-top padding-bottom">
                            <div class="container">
                                <div class="sunhouse-title">
                                    <div class="icon-image">
                                        <img src="images/logo-title-1.png" class="img-responsive">
                                    </div>
                                    <h2 class="main-title">Newest Properties</h2>
                                    <p class="sub-title">Haven't you heard about the recession: Topten reasons why you should properties</p>
                                </div>
                                <div class="row">
                                    <div class="newest-properties-content">


                                        @foreach($item['re'] as $re)
                                        <!-- ITEM 1 -->
                                        <div class="col-md-4 col-xs-6">
                                            <div class="sunhouse-item">
                                                <a href="#" class="wrapper-image">
                                                    <img src="images/house-1.jpg" alt="" class="img-responsive layout-1">
                                                    <img src="images/house-9.jpg" alt="" class="img-responsive layout-2">
                                                </a>
                                                <div class="note for-sale">
                                                    <p class="text">for sale</p>
                                                </div>
                                                <div class="wrapper-content">
                                                    <div class="info-house">
                                                        <div class="info">
                                                            <i class="fa fa-university" aria-hidden="true"></i>
                                                            <p>{!! $re->real_estate_sq !!} Sq Ft</p>
                                                        </div>
                                                        <div class="info">
                                                            <i class="fa fa-university" aria-hidden="true"></i>
                                                            <p>{!! $re->real_estate_bedroom !!} bedroom</p>
                                                        </div>
                                                        <div class="info">
                                                            <i class="fa fa-university" aria-hidden="true"></i>
                                                            <p>{!! $re->real_estate_bathroom !!} bathroom</p>
                                                        </div>
                                                    </div>
                                                    <div class="about-house">
                                                        <a href="{!! URL::route('re.view',['id' => $re->real_estate_id])!!}" class="title">
                                                            {!! $re->real_estate_title !!}
                                                        </a>
                                                        <p class="text">{!! $re->real_estate_overview !!}</p>
                                                    </div>
                                                    <div class="more-info-house">
                                                        <div class="place-house">
                                                            <i class="fa fa-map-marker"></i>
                                                            <a href="#">{!! $re->real_estate_map_address !!}</a>
                                                        </div>
                                                        <div class="price">VNĐ {!! $re->real_estate_cost !!}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>

                                    <!--/ITEM-->
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--########################################################-->
                <!--/ITEM-->

            </div>
        </div>
    </div>
    <!--/TAB CONTENT-->


</div>
</section>