<?php
if (! class_exists ( 'lessc')) {
   include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/CT.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/CT.css');
?>

<section class="section  general-row">
    <div class="wpb_column col-md-12">
        <!--Intro Section-->

        <section class="intro-section">

            <div class="auto-container">

                <div class="outer-box clearfix">

                    <span class="anim-image wow fadeInUp animated" data-wow-delay="0ms" data-wow-duration="1000ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 0ms; animation-name: fadeInUp;"><img src="http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2015/12/logo-2.png" alt=""></span>

                    <div class="col-md-9 col-sm-7 col-xs-12">

                        <p>Real Estate agents are Property consisting of land and the buildings on it, along with its seds naturals resources such seds as crops, minerals, or water.</p>

                    </div>

                    <div class="col-md-3 col-sm-5 col-xs-12 text-right">

                        <a href="#" class="theme-btn btn-style-two">Contact Now </a>

                    </div>

                </div>

            </div>

        </section>
    </div>

    <div class="clearfix"></div>
</section>