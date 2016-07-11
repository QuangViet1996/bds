@extends('laravel-authentication-acl::client.bds.layouts.base')

@section('title')
Chi tiết danh mục
@stop

@section('section')
<section class="page-title">
    <div class="auto-container">
        <div class="content-box">
            <h1>Details cata</h1>
            <div class="bread-crumb">
                <ul class="breadcrumb pull-right"><li><a href="#">Home</a></li><li><a href="#">Archive for January, 2016</a></li></ul>			</div>
        </div>
    </div>
</section>

<section class="gallery-section full-width sidebar-page">
    <div class="realestatemanager1 container">
        
        <div class="basictable-1 basictable row"> 
            <div class="tab-content col-md-12 col-sm-6 col-xs-12">
                <!-- All -->
                <div class="featured_houses tab-pane fade in active" id="All">
                    <div class="featured_houses_block col-md-4 col-sm-6 col-xs-12">
                        <div style="position:relative">
                            <a href="#" target="_self"> <img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/41.jpg') !!}" alt="Avenel House" border="0"></a>    <div class="col_rent">
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
                            <a href="#" target="_self"> <img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/41.jpg') !!}" alt="Ocean Home" border="0"></a>    <div class="col_rent">
                                For sale                </div><!-- col_rent -->
                        </div>
                        <div class="feature_texthouse">
                            <h4 class="featured_houses_title">
                                <a href="#" target="_self">Ocean Home</a>        </h4>
                            <div class="featured_houses_location"><i class="fa fa-map-marker"></i> Hawaii, Kapalua&nbsp;</div>              <div class="featured_houses_category">
                                <i class="fa fa-tag"></i>
                                <a href="#" class="category">
                                    Apartment</a>
                            </div>
                            <div class="featured_houses_size featured_houses_inline"><i class="fa fa-expand"></i> 5000&nbsp;Sqrt</div><div class="featured_houses_rooms featured_houses_inline"><i class="fa fa-building-o"></i> Rooms: 5&nbsp;</div><div class="featured_houses_year featured_houses_inline"><i class="fa fa-tint"></i> Built year: 2005&nbsp;</div><div class="featured_houses_bedrooms featured_houses_inline"><i class="fa fa-inbox"></i> Bedrooms: 2&nbsp;</div><div class="featured_houses_hits featured_houses_inline"><i class="fa fa-eye"></i> Hits: 99</div>    </div>
                        <div class="rem_house_viewlist">
                            <a href="#" target="_self" style="display: block">
                                <div class="featured_houses_price ">9.000.000,00&nbsp;USD</div><div class="featured_houses_viewlisting">View listing</div>                </a>
                            <div style="clear: both;"></div>
                        </div>
                    </div>


                    <div class="featured_houses_block col-md-4 col-sm-6 col-xs-12">
                        <div style="position:relative">
                            <a href="#" target="_self"> <img src="{!! URL::asset('/packages/jacopo/laravel-authentication-acl/images/41.jpg') !!}" alt="House in Bel Air" border="0"/></a>    <div class="col_rent">
                                For sale                </div><!-- col_rent -->
                        </div>
                        <div class="feature_texthouse">
                            <h4 class="featured_houses_title">
                                <a href="#" target="_self">House in Bel Air</a>        </h4>
                            <div class="featured_houses_location"><i class="fa fa-map-marker"></i> USA, California, Bel Air&nbsp;</div>              <div class="featured_houses_category">
                                <i class="fa fa-tag"></i>
                                <a href="#" class="category">
                                    Apartment</a>
                            </div>
                            <div class="featured_houses_size featured_houses_inline"><i class="fa fa-expand"></i> 2700&nbsp;Sqrt</div><div class="featured_houses_rooms featured_houses_inline"><i class="fa fa-building-o"></i> Rooms: 12&nbsp;</div><div class="featured_houses_year featured_houses_inline"><i class="fa fa-tint"></i> Built year: 2014&nbsp;</div><div class="featured_houses_bedrooms featured_houses_inline"><i class="fa fa-inbox"></i> Bedrooms: 3&nbsp;</div><div class="featured_houses_hits featured_houses_inline"><i class="fa fa-eye"></i> Hits: 73</div>    </div>
                        <div class="rem_house_viewlist">
                            <a href="#" target="_self" style="display: block">
                                <div class="featured_houses_price ">11.000.000,00&nbsp;USD</div><div class="featured_houses_viewlisting">View listing</div>                </a>
                            <div style="clear: both;"></div>
                        </div>
                    </div>
                </div>
                <div class="pager-outer container">
                    <ul class="pagination col-md-12">
                        <ul class="pagination">
                            <li><span class="page-numbers current">1</span></li>
                            <li><a class="page-numbers" href="#">2</a></li>
                            <li><a class="page-numbers" href="#">3</a></li>
                            <li><a class="next page-numbers" href="#">»</a></li>
                        </ul>
                    </ul>
                </div>
            </div>

            <div>&nbsp;</div>
        </div>

    </div>
</section>

</div>
@stop
