<?php
if (! class_exists ( 'lessc')) {
   include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/FAQ.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/FAQ.css');
?>
<section class="section  general-row">
    <div class="wpb_column col-md-12">
        <!--FAQ Section-->
        <section class="faq-section">
            <div class="auto-container">
                <!--Sec Title-->
                <div class="sec-title">
                    <h2>FA<span class="theme_color">Q</span></h2>
                    <div class="separator small-separator"></div>
                    <div class="text"><p>Contrary to popular belief, Lorem Ipsum is not simply random text. It’s long establised text</p></div>
                </div>
                <br>
                <div class="row clearfix">
                    <!--Column-->
                    <div class="column col-md-4 col-sm-6 col-xs-12">
                        <!--Faq Block-->
                        <div class="faq-block">
                            <div class="question"><h3>This is a simple question?</h3></div>
                            <div class="answer">
                                <p>Real Estate agents are Property consisting of land and the buildings on it, along with its seds naturals resources such seds as crops, minerals, or water; immovable property of this nature.</p>
                            </div>
                        </div>
                    </div>
                    <!--Column-->
                    <div class="column col-md-4 col-sm-6 col-xs-12">
                        <!--Faq Block-->
                        <div class="faq-block">
                            <div class="question"><h3>This is a simple question?</h3></div>
                            <div class="answer">
                                <p>Real Estate agents are Property consisting of land and the buildings on it, along with its seds naturals resources such seds as crops, minerals, or water; immovable property of this nature.</p>
                            </div>
                        </div>
                    </div>
                    <!--Column-->
                    <div class="column col-md-4 col-sm-6 col-xs-12">
                        <!--Faq Block-->
                        <div class="faq-block">
                            <div class="question"><h3>This is a simple question?</h3></div>
                            <div class="answer">
                                <p>Real Estate agents are Property consisting of land and the buildings on it, along with its seds naturals resources such seds as crops, minerals, or water; immovable property of this nature.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="clearfix"></div>
</section>