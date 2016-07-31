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

        <div class="column contact-form">

            <div role="form" class="wpcf7" id="wpcf7-f153-p22-o1" lang="en-US" dir="ltr">
                <div class="screen-reader-response"></div>
                {!! Form::open(['route'=>['usercontact.edit'], 'method' => 'post'])  !!}

                <div class="row clearfix">

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <span class="wpcf7-form-control-wrap text-355">
                            {!! Form::text('author_name',null, ['class' => 'wpcf7-form-control wpcf7-text wpcf7-validates-as-required', 'placeholder' => 'Name']) !!}
                            

                            <span class="text-danger"></span>
                        </span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        {!! Form::text('title',null, ['class' => 'wpcf7-form-control-wrap text-356', 'placeholder' => 'Title']) !!}
                        <span class="text-danger"></span>

                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                        {!! Form::textarea('description',null, ['class' => 'wpcf7-form-control wpcf7-textarea', 'placeholder' => 'Mesenger']) !!}
                        <span class="text-danger"></span>

                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12 form-group text-center">
                        {!! Form::submit('Save', array("class"=>"btn btn-info pull-right wpcf7-form-control wpcf7-submit")) !!}
                    </div>
                </div>
                <div class="wpcf7-response-output wpcf7-display-none"></div>
                {!! Form::close() !!}     
            </div>
        </div>
        <!--add information-->
        
        <!--end add information-->

        <!--Footer Content-->

        <div class="footer-content">

        </div>

    </div>

</section>
@stop
