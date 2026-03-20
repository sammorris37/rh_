<?php 
/* =================================================================
* Declare WooCommerce Support
================================================================= */
function retroharbor_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'retroharbor_add_woocommerce_support' );

/* =================================================================
* Remove each style one by one.
================================================================= */
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
    // Remove the gloss
	unset( $enqueue_styles['woocommerce-general'] );

    // Remove the layout
	//unset( $enqueue_styles['woocommerce-layout'] );	

    // Remove the smallscreen optimisation	
	unset( $enqueue_styles['woocommerce-smallscreen'] );

	return $enqueue_styles;
}

