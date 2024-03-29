<?php
/**
 * The template for displaying contact sidebar.
 *
 * Template Name: Contact Sidebar
 *
 * @package storefront
 */

get_header(); ?>

		<main id="main" class="site-main" role="main">
		    <div class="page-section container">
		        <div class="row">
                    <div class="col-md-6">

                        <?php while ( have_posts() ) : the_post();

                           // do_action( 'storefront_page_before' );

                            get_template_part( 'content', 'page' );

                            /**
                             * Functions hooked in to storefront_page_after action
                             *
                             * @hooked storefront_display_comments - 10
                             */
                           // do_action( 'storefront_page_after' );

                        endwhile; // End of the loop. ?>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-box">
                            <?php get_sidebar('sidebar-contact'); ?>
                        </div>
                    </div>
                </div>
            </div>
		</main><!-- #main -->

<?php
get_footer();
