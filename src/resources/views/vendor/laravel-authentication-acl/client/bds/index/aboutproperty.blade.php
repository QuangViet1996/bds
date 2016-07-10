<?php
if (! class_exists ( 'lessc')) {
   include (public_path() . '/packages/jacopo/laravel-authentication-acl/less/lessc.inc.php');
}
$less = new lessc;
$less->compileFile(public_path() . '/packages/jacopo/laravel-authentication-acl/less/aboutproperty.less', public_path() . '/packages/jacopo/laravel-authentication-acl/_css/aboutproperty.css');
?>

<section class="section  general-row">
		<div class="wpb_column col-md-12">		
<!--Properties Section-->
    <section class="properties-section">
    	<div class="auto-container">
            <!--Section Title-->
            <div class="sec-title">
                <h2>About <span class="theme_color">Property</span></h2>
                <div class="separator small-separator"></div>
                <div class="text"><p>Real Estate agents are Property consisting of land and the buildings on it.</p></div>
            </div>        
            <!--Full Image Box-->
            <div class="five-col-theme">
                <div class="row clearfix">              
<!--Column-->
<article class="column">
    <div class="inner-box">
        <div class="icon"><span class="fa fa-bed"></span></div>
        <h4 class="title">Bedrooms</h4>
        <h3 class="count">3</h3>
    </div>
</article>

<!--Column-->

<article class="column">

    <div class="inner-box">

        <div class="icon"><span class="fa fa-puzzle-piece"></span></div>

        <h4 class="title">Square Feet</h4>

        <h3 class="count">2530</h3>

    </div>

</article>






<!--Column-->

<article class="column">

    <div class="inner-box">

        <div class="icon"><span class="fa fa-child"></span></div>

        <h4 class="title">Baths</h4>

        <h3 class="count">2</h3>

    </div>

</article>






<!--Column-->

<article class="column">

    <div class="inner-box">

        <div class="icon"><span class="fa fa-calendar"></span></div>

        <h4 class="title">Year Build</h4>

        <h3 class="count">2010</h3>

    </div>

</article>






<!--Column-->

<article class="column">

    <div class="inner-box">

        <div class="icon"><span class="fa fa-glass"></span></div>

        <h4 class="title">Car Parking</h4>

        <h3 class="count">5</h3>

    </div>

</article>




                </div>

            </div>

            

        </div>

    </section>




	</div>

	<div class="clearfix"></div>
	</section>