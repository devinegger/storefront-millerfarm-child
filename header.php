<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sahti
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123898643-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-123898643-1');
	</script>

<!-- Global site tag (gtag.js) - Google Ads: 757655357 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-757655357"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-757655357');
</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<?php do_action( 'storefront_before_site' ); ?>

<div id="page" class="hfeed site">
    
    <?php do_action( 'storefront_before_header' ); ?>
    
	<header id="masthead" class="site-header" role="banner" style="<?php storefront_header_styles(); ?>">

			<?php
			/**
			 * Functions hooked into storefront_header action
			 *
			 * @hooked storefront_skip_links                       - 0
			 * @hooked storefront_social_icons                     - 10
			 * @hooked storefront_secondary_navigation             - 30
			 * @hooked storefront_site_branding                    - 40
			 * @hooked storefront_primary_navigation_wrapper       - 42
			 * @hooked storefront_primary_navigation               - 50
			 * @hooked storefront_product_search                   - 60
			 * @hooked storefront_header_cart                      - 65
			 * @hooked storefront_primary_navigation_wrapper_close - 68
			 */
			do_action( 'storefront_header' ); ?>
	</header><!-- #masthead -->
	
		<?php
	/**
	 * Functions hooked in to storefront_before_content
	 *
	 * @hooked storefront_header_widget_region - 10
	 */
	do_action( 'storefront_before_content' ); ?>
	
	<?php 
	    $class = '';
	    if ( ! is_front_page() ) {
	        $class = 'not-home';
	    }
	?>

	<div id="content" class="site-content <?php echo $class;?>" tabindex="-1">

		<?php
		/**
		 * Functions hooked in to storefront_content_top
		 *
		 * @hooked woocommerce_breadcrumb - 10
		 */
		do_action( 'storefront_content_top' );
