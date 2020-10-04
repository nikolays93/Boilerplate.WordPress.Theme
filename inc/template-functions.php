<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package _s
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function _s_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', '_s_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function _s_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', '_s_pingback_header' );

/**
 * Add container to page class
 *
 * @param string[] $classes An array of page class names.
 * @param string[] $class   An array of additional class names added to the page.
 * @return string[] Array of class names.
 */
function _s_built_in_page_class( $classes, $class ) {
	array_push( $classes, 'container' );

	return $classes;
}
add_filter( 'page_class', '_s_built_in_page_class', 10, 2 );
