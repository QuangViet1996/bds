<?php
if (! class_exists ( 'lessc')) {
   include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/aboutagent.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/aboutagent.css');
?>
<section class="section  general-row">
    <div class="wpb_column col-md-12">



        <!--Agent Section-->

        <section class="agent-section">

            <div class="auto-container">

                <div class="row clearfix">



                    <div class="column col-md-5 col-sm-12 col-xs-12">

                        <figure class="agent-image wow rollIn" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: rollIn;"><a href="#"><img src="http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2015/12/image-1.jpg" class="img-circle" alt=""></a></figure>

                    </div>



                    <div class="column col-md-7 col-sm-12 col-xs-12">

                        <!--Bordered Title-->

                        <div class="bordered-title">

                            <h2>ABOUT <span class="theme_color">AGENT </span></h2>                  

                        </div>



                        <!--Agent Title-->

                        <div class="agent-headers">

                            <h3 class="name">Mark Pine</h3>

                            <p class="designation">Senior Agent of Dream land</p>                  

                        </div>



                        <div class="desc-text">

                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and the praising pain was born and I will give you a complete account of the system, and ip expound the actual teachings of the great explorer </p>

                        </div>



                        <!--Info Box-->

                        <div class="info-box">

                            <ul class="clearfix">

                                <li class="address">

                                    <div class="icon"><span class="flaticon-location74"></span></div>

                                    <h4>ADDRESS</h4>

                                    Mirpur New Bazar Road, Block-c, Dhaka-1210 
                                </li>

                                <li class="contact-info">

                                    <div class="icon"><span class="flaticon-telephone51"></span></div>

                                    <h4>PHONE</h4>

                                    (732) 803-01 03, (732) 806-01 04, (880)172380129 
                                </li>

                            </ul>



                            <a href="#" class="theme-btn btn-style-one">Contact Now</a>

                        </div>



                    </div>

                </div>

            </div>

        </section>
    </div>
    <div class="clearfix"></div>
</section>
<div class="scroll-to-top" style="display: block;"><span class="fa fa-arrow-up"></span></div>