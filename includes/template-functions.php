<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Boilerplate.WordPress.Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
add_filter( 'body_class', function ( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
} );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
add_action( 'wp_head', function () {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
} );

function built_in_content_class( $class ) {
	$clesses = array( 'site__content' );

	if ( ! $class ) {
		array_push( $clesses, 'container' );
	}

	return $clesses;
}

add_filter( 'content-class', 'built_in_content_class', 10, 1 );

function is_first_char_class_allowed( $str = '' ) {
	return preg_match("/^[A-Za-z_]/", $str ) > 0;
}

function get_content_class( $class = '' ) {
	if ( is_string( $class ) ) {
		$class = explode( ' ', $class );
	}

	/**
	 * Filters the list of CSS content wrapper class names for the current post or page.
	 *
	 * @param string[] $classes An array of content wrapper class names.
	 * @param string[] $class   An array of additional class names added to the content wrapper.
	 */
	$classes = apply_filters( 'content-class', $classes, $class );

	// Validate class attribute.
	$classes = array_map( 'esc_attr', array_filter( ( array ) $class, 'is_first_char_class_allowed' ) );

	return array_unique( $classes );
}

function content_class( $class = '' ) {
	echo 'class="' . join( ' ', get_content_class( $class ) ) . '"';
}