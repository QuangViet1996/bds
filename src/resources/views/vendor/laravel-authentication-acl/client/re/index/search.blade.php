<div class='re-search-box'>
    <section id="search-box" class="wrap search-box">
        <div class="gsearch">
            <div class="container">
                <div class="row">
                    <div class="gsearch-info">
                        <h4 class="gsearch-info-title">Find Your Place</h4>
                        <div class="gsearch-info-content">Instantly find your desired place from your own idea of location, at any price <br> and other elements just by starting your search now</div>
                    </div>
                    <div class="gsearch-wrap">
                        <form class="gsearchform" method="get" role="search">
                            <div class="gsearch-content">
                                <div class="gsearch-field">
                                    <div class="form-group glocation">
                                        <div class="label-select">
                                            <select class="form-control">
                                                <option>All Locations</option>
                                                <option>New Jersey</option>
                                                <option>New York</option>
                                            </select>
                                        </div>
                                    </div>
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
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

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