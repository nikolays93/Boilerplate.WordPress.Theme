<?php
/**
 * Boilerplate WordPress theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Boilerplate.WordPress.Theme
 * @version 1.0
 */

if ( ! defined( 'BOILERPLATE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BOILERPLATE_VERSION', '1.0.0' );
}

/**
 * Get boilerplate theme path in directory
 */
function get_boilerplate_directory( $path = '' ) {
	require get_template_directory() . $path;
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

array_map('get_boilerplate_directory', array(
	// Setup theme supports.
	'/inc/setup.php',
	// Register widgets.
	'/inc/widgets.php',
	// Add assets enqueue.
	'/inc/assets.php',
	// Implement the Custom Header feature.
	'/inc/custom-header.php',
	// Custom template tags for this theme.
	'/inc/template-tags.php',
	// Functions which enhance the theme by hooking into WordPress.
	'/inc/template-functions.php',
	// Customizer additions.
	'/inc/customizer.php',
) );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
