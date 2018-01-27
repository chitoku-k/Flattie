<?php
require_once __DIR__ . '/../classes/class-flattie-nav-walker.php';
require_once __DIR__ . '/../classes/class-same-category-posts-widget.php';
require_once __DIR__ . '/../classes/class-share-button-widget.php';

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );

add_action( 'init', function () {
    global $error_code;
    if ( isset( $_GET['error'] ) ) {
        $error_code = $_GET['error'];
    }
}, 100 );

add_action( 'get_header', function () {
    global $error_code;
    if ( is_404() ) {
        $error_code = 404;
    }
}, 100 );

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_style( 'flattie-style', get_stylesheet_uri() );
    wp_enqueue_script( 'flattie-script', get_template_directory_uri() . '/js/main.js', array( 'jquery' ) );
} );

add_action( 'widgets_init', function () {
    register_widget( Same_Category_Posts_Widget::class );
    register_widget( Share_Button_Widget::class );
} );
