<?php
/**
 * CBD Health Functions
 *
 * @package storefront-millerfarms-child
 */

/**
 * Assign the Storefront version to a var
 */
 
$theme              = wp_get_theme( 'storefront-millerfarms-child' );
$storefront_version = $theme['Version'];
 
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];

/**
 * Load the individual classes required by this theme
 */
 
require_once( 'inc/class-millerfarms-child-template.php' );

/**
 * Enqueue scripts, styles, and fonts.
 */

 
function millerfarms_scripts() {
    
    // unregister jquery loaded by WP - replace with 3.0 so caurousel will work - use jquery migrate to fix breaks from jquery 3.0
    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', '//code.jquery.com/jquery-3.0.0.min.js', array(), '3.0.0' );
    wp_enqueue_script( 'jquery-migrate', '//code.jquery.com/jquery-migrate-3.0.0.min.js', array(), '3.0.0' );
    
    // register bootstrap
    wp_register_style( 'bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' );
    wp_register_script( 'popper-js', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array( 'jquery' ), '1.12.3', true );
    wp_register_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
    
    //register custom javascript
    wp_register_script( 'custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), '1.0.0', true ); 
    
    //register google fonts
    wp_register_style( 'google-font', 'http://fonts.googleapis.com/css?family=Lobster' );
    
    // load scripts and styles
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'jquery-migrate' );
    wp_enqueue_style( 'bootstrap-css' );
    wp_enqueue_script( 'popper-js' );
    wp_enqueue_script( 'bootstrap-js' );
    wp_enqueue_script( 'custom-js' );
    wp_enqueue_style( 'google-font' );
}
add_action( 'wp_enqueue_scripts', 'millerfarms_scripts' );


/**
* Add sidebar for non-storefront pages
*/

add_action( 'widgets_init', 'millerfarms_widgets_init' );

function millerfarms_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar 2', 'storefront' ),
		'id'            => 'sidebar2',
		'description'   => __( 'Add here.', 'storefront' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Sidebar Contact', 'storefront' ),
		'id'            => 'sidebar-contact',
		'description'   => __( 'Add here.', 'storefront' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}


// replacing default storefront site-branding 
function storefront_site_title_or_logo( $echo = true ) {
    if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        $logo = get_custom_logo();
        $html = is_home() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;
        
        // add this as well when displaying logo
        if ( '' !== get_bloginfo( 'description' ) ) {
            $html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
        }
        
    } elseif ( function_exists( 'jetpack_has_site_logo' ) && jetpack_has_site_logo() ) {
        // Copied from jetpack_the_site_logo() function.
        $logo    = site_logo()->logo;
        $logo_id = get_theme_mod( 'custom_logo' ); // Check for WP 4.5 Site Logo
        $logo_id = $logo_id ? $logo_id : $logo['id']; // Use WP Core logo if present, otherwise use Jetpack's.
        $size    = site_logo()->theme_size();
        $html    = sprintf( '<a href="%1$s" class="site-logo-link" rel="home" itemprop="url">%2$s</a>',
            esc_url( home_url( '/' ) ),
            wp_get_attachment_image(
                $logo_id,
                $size,
                false,
                array(
                    'class'     => 'site-logo attachment-' . $size,
                    'data-size' => $size,
                    'itemprop'  => 'logo'
                )
            )
        );

        $html = apply_filters( 'jetpack_the_site_logo', $html, $logo, $size );
        
        // add this as well when displaying logo
        if ( '' !== get_bloginfo( 'description' ) ) {
            $html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
        }
        
    } else {
        $tag = is_home() ? 'h1' : 'div';

        $html = '<' . esc_attr( $tag ) . ' class="beta site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) .'>';

        if ( '' !== get_bloginfo( 'description' ) ) {
            $html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
        }
    }

    if ( ! $echo ) {
        return $html;
    }

    echo $html;
}


// add fields
add_action( 'woocommerce_after_checkout_billing_form', 'miller_select_field' );
 
// save fields to order meta
add_action( 'woocommerce_checkout_update_order_meta', 'miller_save_extra_fields' );

// remove 'ship to different address'
add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false');

// remove unneeded fields from checkout
add_filter( 'woocommerce_checkout_fields', 'miller_remove_fields', 9999 );

// make phone number required
add_filter( 'woocommerce_checkout_fields' , 'miller_required_fields', 9999 );

// make state and zip inline
add_filter( 'woocommerce_checkout_fields' , 'miller_checkout_fields_styling', 9999 );

// change order notes placeholder and City label
add_filter( 'woocommerce_checkout_fields' , 'miller_labels_placeholders', 9999 );

// add pickup location to emails
add_action( 'woocommerce_email_order_meta', 'miller_add_email_order_meta', 10, 3 );

// add pickup location to thank you page and order details page
add_action( 'woocommerce_thankyou', 'miller_view_order_and_thankyou_page', 20 );
add_action( 'woocommerce_view_order', 'miller_view_order_and_thankyou_page', 20 );


// add pickup location to thank you page and order details page
function miller_view_order_and_thankyou_page( $order_id ){  ?>
    <h2>Pickup Location</h2>
    <p><?php echo get_post_meta( $order_id, 'pickupLocation', true ); ?></p>
<?php }


// add pickup location to emails
function miller_add_email_order_meta( $order_obj, $sent_to_admin, $plain_text ){
 
	$pickupLocation = get_post_meta( $order_obj->get_order_number(), 'pickupLocation', true );
 
 
	if ( $plain_text === false ) {
 
		// you shouldn't have to worry about inline styles, WooCommerce adds them itself depending on the theme you use
		echo '<h2>Pickup Location</h2>
		<p>' . $pickupLocation . '</p>';
 
	} else {
 
		echo "PICKUP LOCATION\n
		Gift Wrap: $pickupLocation";
	}
}



// change order notes placeholder and city label
function miller_labels_placeholders( $f ) {

	$f['order']['order_comments']['placeholder'] = 'How can we help you?';
	$f['billing']['billing_city']['label'] = 'City';
 
	return $f;
 }


// make state and zip inline
function miller_checkout_fields_styling( $f ) {
 
	$f['billing']['billing_state']['class'][0] = 'form-row-first';
	$f['billing']['billing_postcode']['class'][0] = 'form-row-last';
 
	return $f;
}
 

// make phone required
function miller_required_fields( $f ) {
 
	$f['billing']['billing_phone']['required'] = true;
 
	return $f;
}


// remove company, country, and address from checkout
function miller_remove_fields( $woo_checkout_fields_array ) {

	unset( $woo_checkout_fields_array['billing']['billing_company'] );
	unset( $woo_checkout_fields_array['billing']['billing_country'] );
 
	return $woo_checkout_fields_array;
}

 
// select pickup location
function miller_select_field( $checkout ){

    $markets = array('Miller Farms' => 'Miller Farms');

    $args = array( 
        'post_type' => 'markets',
        'post_status' => 'publish', 
        'posts_per_page' => '-1', 
        'orderby' => 'name', 
        'order' => 'ASC'
    );
    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();
        
        $title = get_the_title();
    
        $markets[$title] = $title;
        
    endwhile;
    
    echo '</br>';
 
	woocommerce_form_field( 'pickupLocation', array(
		'type'          => 'select', // text, textarea, select, radio, checkbox, password, about custom validation a little later
		'required'	=> false, // actually this parameter just adds "*" to the field
		'class'         => array('miller-field', 'form-row-wide'), // array only, read more about classes and styling in the previous step
		'label'         => 'Pickup Location - CSA and Meat Orders Only',
		'label_class'   => 'miller-label', // sometimes you need to customize labels, both string and arrays are supported
		'options'	=> $markets
	), $checkout->get_value( 'pickupLocation' ) );
	
	echo '<p>Select which farmers market at which you would like to pick your CSA or Meat Order - or choose "Miller Farms" to pick up at our farm.
	<br/><br/><b>PLEASE NOTE:</b> Due to current situations, farmers markets may have different schedules.  Please check with your local market for updates.</p>';
}

 
// save field values
function miller_save_extra_fields( $order_id ){
 
	if( !empty( $_POST['pickupLocation'] ) )
		update_post_meta( $order_id, 'pickupLocation', sanitize_text_field( $_POST['pickupLocation'] ) );
}

// add pickup location to order details
add_action( 'woocommerce_admin_order_data_after_billing_address', 'miller_editable_order_meta_billing' );	 	
function miller_editable_order_meta_billing( $order ){	 	 
	$pickupLocation = get_post_meta( $order->get_order_number(), 'pickupLocation', true );
	?>
	<div class="location">
		<p<?php if( !$contactmethod ) echo ' class="none_set"' ?>>
			<strong>Pickup Location:</strong><br/>
			<?php echo $pickupLocation; ?>
		</p>
	</div>
    <?php 
}


function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


// change default footer credit
function storefront_credit() {
?>
    <div class="site-info">
        <span>&copy;2020 Miller Farms | Built by <a href="https://dreamscapedevelopment.net" target="_blank" style="font-size: 1em !important; color: #ffbc3f !important;">Dreamscape Development</a></span>
    </div>
<?php
}

function remove_default_hooks() {

remove_action( 'storefront_header', 'storefront_header_container', 0 );
remove_action( 'storefront_header', 'storefront_header_container_close', 0 );

}

add_action( 'init', 'remove_default_hooks' );


add_action( 'init', 'millerfarms_remove_storefront_header_defaults' );

function millerfarms_remove_storefront_header_defaults() {
    remove_action( 'storefront_header', 'storefront_header_container', 0);
    remove_action( 'storefront_header', 'storefront_site_branding', 20);
    remove_action( 'storefront_header', 'storefront_product_search', 40);
    remove_action( 'storefront_header', 'storefront_header_container_close', 41);
    remove_action( 'storefront_header', 'storefront_header_cart', 60);
}


add_action( 'init', 'millerfarms_replace_storefront_headers' );

function millerfarms_replace_storefront_headers() {
  add_action( 'storefront_header', 'storefront_site_branding', 40);
}



//market locations shortcode
//[marketlocations]

function marketlocations_func( $atts ){

    // WP_Query arguments
    $args = array (
        'post_type'              => 'markets',
        'posts_per_page'         => '-1',
        'order'                  => 'ASC'
    );

    // The Query
    $markets = new WP_Query( $args );

    $output = '<div class="row">';
    
    // The Loop
    while ( $markets->have_posts() ) { $markets->the_post();
    
        $address = get_field('address');
        $market = get_the_title();
        $start_time = get_field('start_time');
        $end_time = get_field('end_time');
        
        $output .= '<div class="col-lg-4 col-md-6 col-sm-12" style="padding: 20px 5px;">' .
        
        '<h5>' . $market . '</h5>' .
        '<p>' . $address .
        '<br/>' . $start_time . ' - ' . $end_time . 
        '</div>'; 
    }
 
    $output .= '</div>';    
        
    return $output;

    // Restore original Post Data
    wp_reset_postdata();
	
}

add_shortcode( 'marketlocations', 'marketlocations_func' );

add_action('wp_head', 'AW_page_load_tag');


function  AW_page_load_tag() {
    if(is_page(729)) {
        echo"<!-- Event snippet for Ad Click - Coupon Page conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-757655357/MG_2CMyy5qoBEL3Oo-kC'});
</script>";
    }
}


function  do_mailchimp_signup( $atts ) {
	$code = '<!-- Begin Mailchimp Signup Form -->
<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
	/* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="https://millerfarms.us18.list-manage.com/subscribe/post?u=ec467f6a326d1410cd6959023&amp;id=741e475713" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_ec467f6a326d1410cd6959023_741e475713" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Submit" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

<!--End mc_embed_signup-->';

	return $code;

}

add_shortcode( 'mailchimp_signup', 'do_mailchimp_signup' );

// remove all product data tabs
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );


// set minimum $20 order for delivery orders


add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
add_action( 'woocommerce_before_cart' , 'wc_minimum_order_amount' );
 
function wc_minimum_order_amount() {
    // Set this variable to specify a minimum order value
    $minimum = 20;

    if ( WC()->cart->total < $minimum ) {
        
        // Set $cat_in_cart to false
        $cat_in_cart = false;
 
        // Loop through all products in the Cart        
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
 
            // If Cart has category "delivery", set $cat_in_cart to true
            if ( has_term( 'delivery', 'product_cat', $cart_item['product_id'] ) ) {
                $cat_in_cart = true;
                break;
            }
        }
   
        // If category "delivery" is in the Cart, check minimum order amount      
        if ( $cat_in_cart ) {

            if( is_cart() ) {

                wc_print_notice( 
                    sprintf( 'Your current delivery order total is %s — you must have an order with a minimum of %s for delivery.' , 
                        wc_price( WC()->cart->total ), 
                        wc_price( $minimum )
                    ), 'error' 
                );

            } else {

                wc_add_notice( 
                    sprintf( 'Your current delivery order total is %s — you must have an order with a minimum of %s for delivery.' , 
                        wc_price( WC()->cart->total ), 
                        wc_price( $minimum )
                    ), 'error' 
                );

            }
        }
    }
}

// disable adding to cart for delivery item
function remove_add_cart_button(){
    global $product;

    // Set HERE your category ID, slug or name (or an array)
    $category = 'delivery-item';

    //Remove Add to Cart button from product description of product with id 1234    
    if ( has_term( $category, 'product_cat', $product->id ) )
        remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

}
add_action('wp','remove_add_cart_button');