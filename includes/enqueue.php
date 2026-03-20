<?php

function custom_theme_asset_version( $path ) {
	$file = get_template_directory() . $path;
	return file_exists( $file ) ? (string) filemtime( $file ) : wp_get_theme()->get( 'Version' );
}

function custom_theme_enqueue_frontend_assets() {
	wp_enqueue_style(
		'custom-theme-style',
		get_template_directory_uri() . '/assets/dist/css/bundle.css',
		array(),
		custom_theme_asset_version( '/assets/dist/css/bundle.css' )
	);

	wp_enqueue_script(
		'custom-theme-frontend',
		get_template_directory_uri() . '/assets/dist/js/bundle.js',
		array(),
		custom_theme_asset_version( '/assets/dist/js/bundle.js' ),
		true
	);
}
add_action( 'wp_enqueue_scripts', 'custom_theme_enqueue_frontend_assets' );
