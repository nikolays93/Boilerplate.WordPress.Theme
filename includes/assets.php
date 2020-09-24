<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Boilerplate.WordPress.Theme
 */

add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( '_s-style', get_stylesheet_uri(), array(), BOILERPLATE_VERSION );
} );
