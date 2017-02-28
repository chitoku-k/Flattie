<?php
require_once __DIR__ . '/Flattie_Nav_Walker.php';

remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'rsd_link' );
register_nav_menu( 'header-menu' , 'ヘッダーメニュー' );

add_filter( 'the_content_more_link', function ( $output, $more_link_text ) {
    return '<div class="read-more-container"><a href="' . get_permalink() . '" class="read-more-button">' . $more_link_text . '</a></div>';
}, 10, 2 );

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

add_editor_style( 'editor.css' );
add_filter( 'tiny_mce_before_init', function ( $settings ) {
    $settings[ 'body_class' ] = 'editor-area';
    return $settings;
} );

function remove_ver_query( $url ) {
    return remove_query_arg( 'ver', $url );
}

add_filter( 'style_loader_src', 'remove_ver_query', 9999 );
add_filter( 'script_loader_src', 'remove_ver_query', 9999 );
