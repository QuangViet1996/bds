<?php
if (! class_exists ( 'lessc')) {
   include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/client_say.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/client_say.css');
?>

<section class="section  general-row">
    <div class="wpb_column col-md-12">
        <section class="testimonials-section" style="background-image:url('http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2015/12/testimonials-bg.jpg');">
            <div class="auto-container">
                <div class="sec-title">
                    <h2>WHAT CLIENT SAY </h2>
                    <div class="separator small-separator"></div>

                    <div class="text">Real Estate agents are Property consisting of land and the buildings on it, along with its seds naturals resources such seds as crops, minerals, or water<p></p></div>
                </div>
                <!--Slider-->      
                <div class="testimonials-slider column-carousel three-column owl-carousel owl-theme owl-loaded">
                    <div class="owl-stage-outer"><div class="owl-stage slider4" style="transform: translate3d(-3200px, 0px, 0px); transition: 0.7s; width: 6000px;">
                            <div class="slide">
                                <div class="owl-item cloned"><article class="slide-item">
                                        <figure class="image-box"><img width="90" height="90" src="http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2015/12/testi-image-1.jpg" class="img-responsive wp-post-image" alt="testi-image-1" srcset="" sizes="(max-width: 90px) 100vw, 90px"></figure>
                                        <div class="info-box">
                                            <h3>Missar Hub</h3>
                                            <p class="designation">Co- Founder at Houzz</p>
                                        </div>
                                        <div class="slide-text">
                                            <p>“We know that sometimes it’s difficult to get to the phone if you are in the middle of something and you don’t want to miss.�?/p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="owl-item cloned">
                                    <article class="slide-item">
                                        <figure class="image-box"><img width="90" height="90" src="http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2015/12/testi-image-2.jpg" class="img-responsive wp-post-image" alt="testi-image-2" srcset="" sizes="(max-width: 90px) 100vw, 90px"></figure>
                                        <div class="info-box">
                                            <h3>Jack Willshere</h3>
                                            <p class="designation">Co- Founder at Houzz</p>
                                        </div>         
                                        <div class="slide-text">
                                            <p>“We know that sometimes it’s difficult to get to the phone if you are in the middle of something and you don’t want to miss.�?/p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="owl-item cloned"><article class="slide-item">
                                        <figure class="image-box"><img width="90" height="90" src="http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2015/12/testi-image-3.jpg" class="img-responsive wp-post-image" alt="testi-image-3" srcset="" sizes="(max-width: 90px) 100vw, 90px"></figure>
                                        <div class="info-box">
                                            <h3>Mark Pine</h3>
                                            <p class="designation">Co- Founder at Houzz</p>
                                        </div>              
                                        <div class="slide-text">
                                            <p>“We know that sometimes it’s difficult to get to the phone if you are in the middle of something and you don’t want to miss.�?/p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="slide">
                                <div class="owl-item"><article class="slide-item">
                                        <figure class="image-box"><img width="90" height="90" src="http://wp1.themexlab.com/wp/dreamland/wp-content/uploads/2015/12/testi-image-1.jpg" class="img-responsive wp-post-image" alt="testi-image-1" srcset="" sizes="(max-width: 90px) 100vw, 90px"></figure>
                                        <div class="info-box">
                                            <h3>Missar Hub</h3>
                                            <p class="designation">Co- Founder at Houzz</p>
                                        </div>
                                        <div class="slide-text">
                                            <p>“We know that sometimes it’s difficult to get to the phone if you are in the middle of something and you don’t want to miss.�?/p>
                                        </div>
                                    </article>
                                </div>
                            </div>
                           
                        </div>
                    </div>


                </div>
            </div>    
        </section>
    </div>
    <div class="clearfix"></div>
</section>
@section('footer_scripts_part2')
<script>
    
        $('.slider4').bxSlider({
            slideWidth: 370,
            minSlides: 2,
            maxSlides: 3,
            moveSlides: 1,
            slideMargin: 30,
            auto: true,
            autoControls: true
        });
  
</script>
@stop
