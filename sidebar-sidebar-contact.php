<?php
/**
 * The sidebar containing contact from - must use shortcode in text widget.
 *
 * @package storefront
 */

if ( ! is_active_sidebar( 'sidebar-contact' ) ) {
	return;
}

dynamic_sidebar( 'sidebar-contact' );
?>

