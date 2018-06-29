<?php

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nsa_setup() {
	load_theme_textdomain( 'nsa' );

	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'nsa' ),
	) );
	
	add_editor_style( array( 'assets/css/editor-style.css', nsa_fonts_url() ) );

}
add_action( 'after_setup_theme', 'nsa_setup' );

/**
 * Register custom fonts.
 */
function nsa_fonts_url() {
	$fonts_url = '';
	
	$font_families = array();
	$font_families[] = 'Open Sans:400,800|Open Sans Condensed:300,700';

	$query_args = array(
		'family' => urlencode( implode( '|', $font_families ) ),
		'subset' => urlencode( 'cyrillic-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		

	return esc_url_raw( $fonts_url );
}


function nsa_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'nsa-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'nsa_resource_hints', 10, 2 );


/**
 * Enqueue scripts and styles.
 */
function nsa_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'nsa-fonts', nsa_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'nsa-style', get_stylesheet_uri() );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/js/html5shiv.min.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'nsa-global', get_theme_file_uri( '/js/wow.js' ), array(), '1.0' );

}
add_action( 'wp_enqueue_scripts', 'nsa_scripts' );



