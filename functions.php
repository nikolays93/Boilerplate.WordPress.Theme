<?php
/**
 * Boilerplate WordPress theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Boilerplate.WordPress.Theme
 */

if ( ! defined( 'BOILERPLATE_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'BOILERPLATE_VERSION', '0.0.1' );
}

if ( 'require_template_file' ) :
	/**
	 * Get boilerplate theme path in directory
	 */
	function require_template_file( $path = '' ) {
		require get_template_directory() . $path;
	}
endif;

array_map('require_template_file', array(
	// Setup theme supports.
	'/includes/setup.php',
	// Register widgets.
	'/includes/widgets.php',
	// Add assets enqueue.
	'/includes/assets.php',
	// Implement the Custom Header feature.
	'/includes/custom-header.php',
	// Custom template tags for this theme.
	'/includes/template-tags.php',
	// Functions which enhance the theme by hooking into WordPress.
	'/includes/template-functions.php',
	// Customizer additions.
	'/includes/customizer.php',
) );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require_template_file( '/includes/jetpack.php' );
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require_template_file( '/includes/woocommerce.php' );
}
