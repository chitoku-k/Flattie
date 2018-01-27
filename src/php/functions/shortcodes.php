<?php
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
