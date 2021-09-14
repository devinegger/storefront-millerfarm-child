<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package storefront
 */

get_header(); ?>

	<div id="primary" class="content-area">
	    <div id="mainCarousel" class="carousel slide" style="color: #27a79d;" data-interval="6000">
            <ol class="carousel-indicators">
                <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#mainCarousel" data-slide-to="1"></li>
                <li data-target="#mainCarousel" data-slide-to="2"></li>
                <li data-target="#mainCarousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item white active" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/carousel/farm-slide-1.png');">
                    <div class="carousel-content overlay center">                   
                        <div style="width: 80%; margin: 0 auto; text-align: center;">
                            <h2 style="color: #fff !important;">Miller Farms Delivery</h2>
                            <p>It's like a farmers market to your doorstep.</p>
                            <p>Available for delivery are bags of mixed vegetables as well as bags of tomatoes, eggs by the dozen, tortilla chips, corn and flour tortillas.</p>
                            <p>Delivering is a new venture for us. We will get orders out as efficient as possible.</p>
                            <p><a href="/farm-to-doorstep-delivery/" style="color: #ffbc3f !important;">Click Here to Order.</a></p>  
                            <p>Thank you. The Miller family.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/carousel/farm-slide-2.jpeg');">
                    <div class="carousel-content overlay center" >
                        <div style="width: 80%; margin: 0 auto; text-align: center;">
                            <h2 style="color: #fff !important;">Whole/Half Pig and Cow Orders</h2>
                            <p>We are temporarily out of beef and pork until May.</p>
                            <p>If you are interested in a half or whole cow or pig it is $5.50 per pound hang weight. We will contact you when we have animals available. It will come on a first come, first serve basis.We do not do quarter shares of meat. </p>
                            <p><a href="https://docs.google.com/forms/d/e/1FAIpQLScOtjkpRB4DekfCH-UVj6gkau2NfCV8atahu_KnXCe0jsm9ag/viewform" target="_blank" style="color: #ffbc3f !important;">Click Here to go to our beef/pork interest form</a></p>  
                            <p>Thank you. The Miller family.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/carousel/farm-slide-4.jpeg');">
                    <div class="carousel-content overlay center">
                        <div style="width: 80%; margin: 0 auto;">
                        </div>
                    </div>
                </div>
                <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/carousel/farm-slide-6.jpeg');">
                    <div class="carousel-content overlay center">
                        <div style="width: 80%; margin: 0 auto;">
                        </div>
                    </div>
                </div>
            </div>
              <!--<ol class="carousel-indicators">
                    <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#mainCarousel" data-slide-to="1"></li>
                    <li data-target="#mainCarousel" data-slide-to="2"></li>
                    <li data-target="#mainCarousel" data-slide-to="3"></li>
                    <li data-target="#mainCarousel" data-slide-to="4"></li>
                    <li data-target="#mainCarousel" data-slide-to="5"></li>
                    <li data-target="#mainCarousel" data-slide-to="6"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                    <div class="carousel-item white active" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/carousel/farm-slide-1.png');">
                        <div class="carousel-content overlay center">                   
                            <div style="width: 80%; margin: 0 auto;">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/carousel/farm-slide-2.jpeg');">
                        <div class="carousel-content overlay center" >
                            <div style="width: 80%; margin: 0 auto;">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/carousel/farm-slide-3.jpeg');">
                        <div class="carousel-content overlay center" >
                            <div style="width: 80%; margin: 0 auto;">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/carousel/farm-slide-4.jpeg');">
                        <div class="carousel-content overlay center">
                            <div style="width: 80%; margin: 0 auto;">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/carousel/farm-slide-5.jpeg');">
                        <div class="carousel-content overlay center">
                            <div style="width: 80%; margin: 0 auto;">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/carousel/farm-slide-6.jpeg');">
                        <div class="carousel-content overlay center">
                            <div style="width: 80%; margin: 0 auto;">
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item white" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/carousel/farm-slide-7.jpeg');">
                        <div class="carousel-content overlay center">
                            <div style="width: 80%; margin: 0 auto;">
                            </div>
                        </div>
                    </div>
              </div>-->
              <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div> <!-- #mainCarousel -->
        
        <!--  leave this commented out until Fall Festival next year 
        <div class="container front-page-section">
            <div class="row center" style="clear: both;">
                <div class="center" style="margin-top: 5%; margin-bottom: 5%;">
                	<h2>Farm Festival 2019</h2>
                	<h4>Join us for Colorado’s favorite Fall Harvest Festival!!!</h4>
                	<img src="<?php echo get_stylesheet_directory_uri(); ?>/img/miller-farms-farm-festival.jpg');" />
                	<p>Take part in a one of a kind experience that gives everyone the the opportunity to come out and not only see a real live farm in action, but harvest your own vegetables right from the farm!</p>
                	<p>The Farm Festival features:
                	<br/>&bull; A hayride through 180 acres of fields where you can pick your own vegetables
                    <br/>&bull; Farm picnic area where your whole class can have lunch
                	<br/>&bull; Antique Alley that features farm equipment and oddities from the ages
                	<br/>&bull; Kids play areas, antique tractors, peddle tractors, a hay pyramid, farm animals, and a whole lot more!</p>
                	<p class="center" style="margin-top: 25px;">
                		<a class="box-button" href="<?php echo home_url();?>/fall-festival">Learn More</a>
                	</p>
                </div>
            </div>
        </div>
        -->
        <div class="container front-page-section">
            <div class="row center" style="clear: both;">
                <div class="center" style="margin: 10% auto; width: 600px;">
                	<h2>Summer CSA Sign Up</h2>
                	<p class="center" style="margin-top: 25px;">
                		<a class="box-button" target="_blank" href="https://millerfarms.wufoo.com/forms/x1445bmh1mgdzp1/">Sign Up Here</a>
                	</p>
					<!--
					<h2>Miller Farms CSA</h2>
                	<p>Our 2020 CSA runs mid June through October or 20 weeks worth of pickups. If your market ends before you finish your pickups you can visit another farmer's market or come and see us at the farm. The full share is $800, half share $500, and the quarter share is $300. We accept cash, check, credit card and snap/EBT for your CSA payment</p>
					<div class="csa-frontpage">
						<div class="csa-frontpage-inner">
							<?php echo do_shortcode('[products category="csa"]'); ?>
						</div>
					</div>
                	<p class="center" style="margin-top: 25px;">
                		<a class="box-button" href="<?php echo home_url();?>/csa">Learn More</a>
                	</p>
					-->
                </div>
            </div>
        </div>
        
        <div class="container front-page-section">
            <div class="row center" style="clear: both;">
                <div class="col-md-6 left" >
                    <div style="padding: 10%;">
                        <h3>Farm to Door Delivery</h3>
                        <p>It's like a farmers market to your doorstep.<br/><br/>
							Available for delivery are bags of mixed vegetables as well as bags of tomatoes, eggs by the dozen, tortilla chips, corn and flour tortillas, and much more.</p>
                        <p class="center" style="margin-top: 25px;">
                            <a class="box-button" href="/farm-to-doorstep-delivery/">Order Now</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 left">
                    <div>
                        <img src="/wp-content/uploads/2020/05/miller-farms-delivery.jpg"/>
                    </div>
                </div>
            </div>
        </div>
		
        
        <!--<div class="container front-page-section">
            <div class="row center" style="clear: both;">
                <div class="col-md-6 left" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/miller-beef-front.jpg');">
                    <div class="window">
                        <h3>Beef, Pork, & More</h3>
                        <p>Our fresh Pork and Angus Beef are raised right here on the farm.  With no hormones or antibiotics, our meats are FRESH, which makes all the difference in taste.</p>
                        <p class="center" style="margin-top: 25px;">
                            <a class="box-button" href="<?php echo home_url();?>/beef-pork">Order</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 left" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/csa-vegetables-sm.jpg');">
                    <div class="window">
                        <h3>Farmers Markets</h3>
                        <p>One of the best ways to support local growers are Farmers' Markets.   These non-profit groups provide easy access to farmers and seasonal produce in your area.</p>
                        <p class="center" style="margin-top: 25px;">
                            <a class="box-button" href="<?php echo home_url();?>/farmers-markets">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="container front-page-section">
            <div class="row center" style="clear: both;">
                <div class="col-md-6 left" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/miller-pumpkin-patch.jpg');">
                    <div class="window">
                        <h3>Fall Festival</h3>
                        <p>Our farm is a busy place—from early spring until late fall! Each year, we work hard to improve our events to create a fun learning environment for folks of all ages.</p>
                        <p class="center" style="margin-top: 25px;">
                            <a class="box-button" href="<?php echo home_url();?>/fall-festival">See More</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 left" style="background: url('<?php echo get_stylesheet_directory_uri(); ?>/img/antique-alley.jpg');">
                    <div class="window">
                        <h3>Farmers Markets</h3>
                        <p>One of the best ways to support local growers are Farmers' Markets.   These non-profit groups provide easy access to farmers and seasonal produce in your area.</p>
                        <p class="center" style="margin-top: 25px;">
                            <a class="box-button" href="<?php echo home_url();?>/farmers-markets">More Info</a>
                        </p>
                    </div>
					<!--
					<div class="window">
                        <h3>Antique Alley</h3>
                        <p>Our farm is a unique treasure known throughout Colorado.  Not only a working farm, but also an educational rural amusement park fun for kids age 2 to 92!</p>
                        <p class="center" style="margin-top: 25px;">
                            <a class="box-button" href="<?php echo home_url();?>/antique-alley">Gallery</a>
                        </p>
                    </div>
					-->
                </div>
            </div>
        </div>
	</div><!-- #primary -->

<?php
get_footer();
