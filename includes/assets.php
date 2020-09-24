<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Boilerplate.WordPress.Theme
 */

add_action( 'wp_enqueue_scripts', function() {
	$is_compressed = ! defined( 'SCRIPT_DEBUG' ) || SCRIPT_DEBUG === false;
	$min           = $is_compressed ? '.min' : '';

	/**
	 * jQuery required*
	 *
	 * @url https://jquery.com/
	 */
	wp_deregister_script( 'jquery' );
	wp_register_script(
		'jquery',
		'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js',
		array(),
		'3.4.1'
	);
	wp_enqueue_script( 'jquery' );

	/**
	 * Modernizr. It can detect browser support.
	 *
	 * @url https://modernizr.com/
	 */
	// wp_enqueue_script( 'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js',
	// array(), '3.3.1' );

	/**
	 * Bootstrap framework.
	 *
	 * @url https://getbootstrap.com/
	 */
	wp_enqueue_script(
		'bootstrap',
		TPL . 'vendor/assets/bootstrap/bootstrap' . $min . '.js',
		array( 'jquery' ),
		'4.1',
		true
	);
	wp_enqueue_style( 'bootstrap-style', TPL . 'vendor/assets/bootstrap' . $min . '.css', array() );

	/**
	 * Hamburgers. Animated menu icons.
	 *
	 * @url https://jonsuh.com/hamburgers/
	 */
	wp_enqueue_style( 'hamburgers', TPL . 'vendor/assets/hamburgers' . $min . '.css' );

	/**
	 * Fancy box. Modern modals.
	 *
	 * @url http://fancyapps.com/
	 */
	// wp_enqueue_script('fancybox', TPL . 'vendor/assets/fancybox/jquery.fancybox.min.js', array('jquery'), '3', true);
	// wp_enqueue_style( 'fancybox-style', TPL . 'vendor/assets/fancybox/jquery.fancybox.min.css', array() );

	/**
	 * Slick. Easy slider.
	 *
	 * @url https://kenwheeler.github.io/slick/
	 */
	wp_enqueue_script( 'slick', TPL . 'vendor/assets/slick/slick.min.js', array( 'jquery' ), '1.8.1', true );
	wp_enqueue_style( 'slick-style', TPL . 'vendor/assets/slick/slick.css', array() );
	// wp_enqueue_style( 'slick-theme', TPL . 'vendor/assets/slick/slick-theme.css', array() );

	wp_enqueue_style( 'content-style', get_stylesheet_uri(), array(), BOILERPLATE_VERSION );
} );
