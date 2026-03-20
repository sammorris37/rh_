<?php
/* =================================================================
 * Disable Gutenberg
================================================================= 
add_filter("use_block_editor_for_post_type", "disable_gutenberg_editor");
function disable_gutenberg_editor()
{
return false;
}*/

/* =================================================================
 * Disable widget block editor
================================================================= */
function example_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'example_theme_support' );