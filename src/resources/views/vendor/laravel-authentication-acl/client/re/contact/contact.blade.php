@extends('laravel-authentication-acl::client.re.layouts.base')

@section('title')
Trang lien he
@stop


<?php
if (!class_exists('lessc')) {
    include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/contact.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/contact.css');
?>

@section('section')
<section class="page-title">

    <div class="auto-container">

        <div class="content-box">

            <h1>Contact Us</h1>

            <div class="bread-crumb">

                <ul class="breadcrumb pull-right"><li><a href="http://wp1.themexlab.com/wp/dreamland/">Home</a></li><li>Contact Us</li></ul>
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

                            <span class="icon flaticon-location74"></span>

                            <h3>ADDRESS</h3>

                            <p>Mirpur New Bazar Road, Block-c,<br>
                                Dhaka-1210</p>

                        </div>

                        <!--Column-->

                        <div class="column col-md-4 col-sm-6 col-xs-12">

                            <span class="icon flaticon-telephone51"></span>

                            <h3>PHONE</h3>

                            <p>(732) 803-01 03, (732) 806-01 04, (880)172380129</p>

                        </div>

                        <!--Column-->

                        <div class="column col-md-4 col-sm-6 col-xs-12">

                            <span class="icon flaticon-envelope126"></span>

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
<style>
    #map {
        width: 100%;
        height: 400px;
    }
</style>
<div id="map"></div>
<script>



    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 17,
            center: {lat: 10.851235, lng: 106.758409},
        });

        var image = '{!! URL::asset("/packages/jacopo/laravel-authentication-acl/images/marker.jpg") !!}';
        var beachMarker = new google.maps.Marker({
            position: {lat: 10.851235, lng: 106.758409},
            map: map,
            icon: image
        });
    }


</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAJYfhex947Oo_2BAo7a5vWmc68dfvTIF0&callback=initMap">
</script>
<section class="default-section faded-section contact-section" style="background-image:url('http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2015/12/contact-bg.jpg');">

    <div class="auto-container small-container">

        <div class="sec-title">

            <h2>Contact Form</h2>

            <div class="text"><p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknownto </p></div>

        </div>

        <!--Contact Form-->

        <div class="column contact-form">

            <div role="form" class="wpcf7" id="wpcf7-f153-p22-o1" lang="en-US" dir="ltr">
                <div class="screen-reader-response"></div>
                <form action="/wp/dreamland/?page_id=22#wpcf7-f153-p22-o1" method="post" class="wpcf7-form" novalidate="novalidate">
                    <div style="display: none;">
                        <input type="hidden" name="_wpcf7" value="153">
                        <input type="hidden" name="_wpcf7_version" value="4.4">
                        <input type="hidden" name="_wpcf7_locale" value="en_US">
                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f153-p22-o1">
                        <input type="hidden" name="_wpnonce" value="f783a50988">
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                            <span class="wpcf7-form-control-wrap text-355"><input type="text" name="text-355" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Name"></span>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                            <span class="wpcf7-form-control-wrap email-856"><input type="email" name="email-856" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Email"></span>
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12 form-group">
                            <span class="wpcf7-form-control-wrap text-356"><input type="text" name="text-356" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Subject"></span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <span class="wpcf7-form-control-wrap textarea-483"><textarea name="textarea-483" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Message"></textarea></span>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group text-center">
                            <input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit"><img class="ajax-loader" src="http://wp1.themexlab.com/wp/dreamland/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;">
                        </div>
                    </div>
                    <div class="wpcf7-response-output wpcf7-display-none"></div></form></div>
        </div>



        <!--Separator-->

        <div class="separator big-separator"></div>

        <!--Footer Content-->

        <div class="footer-content">

        </div>

    </div>

</section>
@stop
