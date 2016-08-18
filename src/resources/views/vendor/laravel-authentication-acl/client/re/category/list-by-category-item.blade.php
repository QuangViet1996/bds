<?php
if (!class_exists('lessc')) {
    include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/cat.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/cat.css');

$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/properties.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/properties.css');

$categories = @$data['categories'];
?>

<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>{!! $category->real_estate_category_title !!}</h1>
            <div class="bread-crumb">
                <ul class="breadcrumb pull-right"><li><a href="#">Home</a></li><li><a href="#">Archive for January, 2016</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="gallery-section full-width sidebar-page">
    <div class="realestatemanager1 container">
        <div class="basictable-1 basictable row">

            <!--LIST OF CATEGORIES-->
            <div class="tab-content col-md-9 col-sm-8 col-xs-12">
                   @foreach($real_estates as $re)
                    <div class="featured_houses_block col-md-6 col-sm-6 col-xs-12">
                        <div style="position:relative">
                            <a href="{!! URL::route('re.view',['id' => $re->real_estate_id])!!}" target="_self"> <img src="../images/3.jpg" alt="Avenel House" border="0"></a>
                            <div class="col_rent">
                                For sale
                            </div><!-- col_rent -->
                        </div>
                        <div class="feature_texthouse">

                            <!--TITLE-->
                            <h4 class="featured_houses_title">
                                <a href="{!! URL::route('re.view',['id' => $re->real_estate_id])!!}" target="_self">{!! $re->real_estate_title !!}</a>
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
                                    {!! $category->real_estate_category_title !!}
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

            <div class="col-md-3 col-sm-4 col-xs-12">
                <aside class="side">
                    <form class="gsearchform" method="get" role="search">
                        <div id="search-2" class="">
                            <div class="form-group gsub-location">
                                <div class="label-select">
                                    <select class="form-control">
                                        <option>All Sub-locations</option>
                                        <option>Central New York</option>
                                        <option>GreenVille</option>
                                        <option>Long Island</option>
                                        <option>New York City</option>
                                        <option>West Side</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group gstatus">
                                <div class="label-select">
                                    <select class="form-control">
                                        <option>All Status</option>
                                        <option>Open house</option>
                                        <option>Rent</option>
                                        <option>Sale</option>
                                        <option>Sold</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group gtype">
                                <div class="label-select">
                                    <select class="form-control">
                                        <option>All Type </option>
                                        <option>Apartment</option>
                                        <option>Co-op</option>
                                        <option>Condo</option>
                                        <option>Single Family Home</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group gbed">
                                <div class="label-select">
                                    <select class="form-control">
                                        <option>No. of Bedrooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group gbath">
                                <div class="label-select">
                                    <select class="form-control">
                                        <option>No. of Bathrooms</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <form action="#" method="POST">
                                    <!--PRICE-->
                                    <div class="group-item">
                                        <input type="text" id="price" name="price" value="" />
                                        <input type="hidden" name="price_from" id="price_from">
                                        <input type="hidden" name="price_to" id="price_to">
                                    </div>
                                    <!--END PRICE-->
                                </form>
                            </div>
                            <div class="form-group">
                                <form action="#" method="POST">
                                    <!--AREA-->
                                    <div class="group-item">
                                        <input type="text" id="area" name="area" value="" />
                                        <input type="hidden" name="area_from" id="area_from">
                                        <input type="hidden" name="area_to" id="area_to">
                                    </div>
                                    <!--END AREA-->
                                </form>
                            </div>
                        </div>
                        <div class="gsearch-action">
                            <div class="gsubmit">
                                <a class="btn btn-deault" href="#">Search Property</a>
                            </div>
                        </div>
                    </form>
                    <div id="categories-2" class="widget sidebar_widget widget_categories"><div class="side-title"><h3>Categories</h3></div>		<ul>
                            <li class="cat-item cat-item-12"><a href="{!! URL::route('re.list')!!}">Apartment</a>
                            </li>
                            <li class="cat-item cat-item-32"><a href="#">Bedroom</a>
                            </li>
                            <li class="cat-item cat-item-36"><a href="#">Kitchen</a>
                            </li>
                            <li class="cat-item cat-item-34"><a href="#">Living Room</a>
                            </li>
                        </ul>
                    </div>
            </div>
            </aside>

        </div>
        <div>&nbsp;</div>
    </div>

</div>
</section>
@section('footer_scripts_form_search')
<script type="text/javascript">
    $(document).ready(function () {
        $("#price").ionRangeSlider({
            type: "double",
            grid: true,
            min: 0,
            max: 1000,
            from: 200,
            to: 800,
            prefix: "$ ",
            onChange: function (data) {
                $('#price_from').val(data.from);
                $('#price_to').val(data.to);
            }
        });

        $("#area").ionRangeSlider({
            type: "double",
            grid: true,
            min: 0,
            max: 1000,
            from: 200,
            to: 800,
            prefix: "m<sup>2</sup> ",
            onChange: function (data) {
                $('#area_from').val(data.from);
                $('#area_to').val(data.to);
            }
        });
    });
</script>
@stop