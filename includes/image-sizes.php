<?php
/* ==========================================
 * Custom Image Sizes
========================================== */
add_action( 'after_setup_theme', function() {

    // 1. Small square thumbnail (avatars, icons, lists)
    add_image_size( 'thumb-square', 300, 300, true );

    // 2. Medium card image (blog cards, CPT grids)
    add_image_size( 'card-medium', 600, 600, true );

    // 3. Large card image (feature grids, homepage)
    add_image_size( 'card-large', 800, 800, true );

    // 4. Landscape card (news, blog listings)
    add_image_size( 'card-landscape', 800, 500, true );

    // 5. Portrait card (profiles, editorial)
    add_image_size( 'card-portrait', 600, 800, true );

    // 6. Content image (inside post body – no crop)
    add_image_size( 'content-large', 1200, 0, false );

    // 7. Wide hero banner (headers, page heroes)
    add_image_size( 'hero-wide', 1920, 700, array( 'center', 'top' ) );

    // 8. Extra-wide banner (full-bleed sections)
    add_image_size( 'banner-wide', 1600, 600, true );

    // 9. WooCommerce / product tile
    add_image_size( 'product-square', 600, 600, true );

    // 10. Gallery lightbox / large display
    add_image_size( 'gallery-large', 1800, 0, false );

});

/* ==========================================
 * Disable Default Sizes
========================================== */
add_filter( 'intermediate_image_sizes_advanced', function( $sizes ) {

    // Core sizes
    unset( $sizes['thumbnail'] );
    unset( $sizes['medium'] );
    unset( $sizes['medium_large'] );
    unset( $sizes['large'] );

    return $sizes;
});

add_action( 'admin_menu', function() {
    remove_submenu_page( 'options-general.php', 'options-media.php' );
}, 999 );