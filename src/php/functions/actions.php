<?php
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );

add_action( 'init', function () {
    $GLOBALS['error_code'] = $_GET['error'] ?? null;
}, 100 );

add_action( 'get_header', function () {
    if ( is_404() ) {
        $GLOBALS['error_code'] = 404;
    }
}, 100 );

add_action( 'wp_enqueue_scripts', function () {
    wp_enqueue_script( 'flattie-script', get_template_directory_uri() . 'js/main.js' );

    if ( ! is_page( 'mail' ) ) {
        wp_deregister_style( 'contact-form-7' );
        wp_dequeue_script( 'contact-form-7' );
        wp_dequeue_script( 'google-recaptcha' );
    }
} );

add_action( 'widgets_init', function () {
    register_widget( Same_Category_Posts_Widget::class );
    register_widget( Share_Button_Widget::class );
} );
