<?php
/**
 * Enqueue scripts and styles.
 *
 * @package _s
 */

/**
 * Wp_enqueue_scripts hook.
 */
function _s_assets() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri(), array(), filemtime(get_stylesheet_directory() . '/style.css') );

	wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', '_s_assets' );
