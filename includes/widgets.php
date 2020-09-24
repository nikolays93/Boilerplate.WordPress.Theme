<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package Boilerplate.WordPress.Theme
 */

add_action( 'widgets_init', function() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', '_s' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', '_s' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
} );
