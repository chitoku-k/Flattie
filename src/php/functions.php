<?php
require_once __DIR__ . '/classes/class-flattie-nav-walker.php';
require_once __DIR__ . '/classes/class-same-category-posts-widget.php';
require_once __DIR__ . '/classes/class-share-button-widget.php';

function remove_ver_query( $url ) {
    return remove_query_arg( 'ver', $url );
}

function is_uncategorized() {
    return count( get_the_category() ) == 0 || in_category( '1' );
}


/**
 * Initialization
 */
add_editor_style( 'editor.css' );
register_nav_menu( 'header-menu', 'ヘッダーメニュー' );

register_sidebar( [
    'name' => 'サイドバーウィジット',
    'id' => 'sidebar',
    'description' => 'サイドバーのウィジットです。',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
] );

/**
 * Actions
 */
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


/**
 * Filters
 */
remove_filter( 'template_redirect', 'redirect_canonical' );
add_filter( 'style_loader_src', 'remove_ver_query', 9999 );
add_filter( 'script_loader_src', 'remove_ver_query', 9999 );

add_filter( 'style_loader_tag', function ( $tag ) {
    return str_replace( "type='text/css' ", '', $tag );
} );
add_filter( 'script_loader_tag', function ( $tag ) {
    return str_replace( "type='text/javascript'", 'defer', $tag );
} );

add_filter( 'the_content_more_link', function ( $output, $more_link_text ) {
    return '<div class="read-more-container"><a href="' . get_permalink() . '" class="read-more-button">' . $more_link_text . '</a></div>';
}, 10, 2 );

add_filter( 'tiny_mce_before_init', function ( $settings ) {
    $settings[ 'body_class' ] = 'editor-area';
    return $settings;
} );

add_filter( 'post_class', function ( $classes = '' ) {
    global $post;
    if ( isset( $post ) && is_page( $post->ID ) ) {
        $classes[] = 'page-' . $post->post_name;
        if ( $post->post_parent ) {
            $classes[] = 'page-' . get_page( $post->post_parent )->post_name . '-child';
        }
    }
    return $classes;
} );


/**
 * Shortcodes
 */
add_shortcode( 'index', function ( $atts ) {
    global $post;
    if ( ! isset( $post ) ) {
        return;
    }
    $atts = shortcode_atts( [
        'ordered' => 'true',
    ], $atts );
    $list = wp_list_pages( [
        'sort_column' => 'menu_order',
        'child_of' => $post->ID,
        'echo' => false,
        'title_li' => '',
    ] );
    switch ( $atts['ordered'] ) {
        case 'TRUE':
        case 'true':
        case '1':
            return "<ol>\n" . $list . '</ol>';
        default:
            return "<ul>\n" . $list . '</ul>';
    }
} );

add_shortcode( 'menu', function ( $atts ) {
    $atts = shortcode_atts( [
        'name' => 'ヘッダーメニュー',
    ], $atts );
    wp_nav_menu( [ 'menu' => $atts['name'] ] );
} );
