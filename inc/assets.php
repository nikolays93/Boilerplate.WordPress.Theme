<?php
/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
    wp_enqueue_style( '_s-style', get_stylesheet_uri(), array(), BOILERPLATE_VERSION );
    wp_style_add_data( '_s-style', 'rtl', 'replace' );

    wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), BOILERPLATE_VERSION, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );