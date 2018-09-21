<?php
function remove_ver_query( $url ) {
    return remove_query_arg( 'ver', $url );
}

remove_filter( 'template_redirect', 'redirect_canonical' );
add_filter( 'style_loader_src', 'remove_ver_query', 9999 );
add_filter( 'script_loader_src', 'remove_ver_query', 9999 );

add_filter( 'style_loader_tag', function ( $tag ) {
    return str_replace( "type='text/css' ", '', $tag );
} );
add_filter( 'script_loader_tag', function ( $tag ) {
    return str_replace( "type='text/javascript'", '', $tag );
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

add_filter( 'wp_default_scripts', function ( $scripts ) {
    if ( is_admin() ) {
        return;
    }

    // Remove jQuery and pretend that it was loaded
    $scripts->remove( 'jquery' );
    $scripts->add( 'jquery', '' );
} );

add_filter( 'pre_option_upload_url_path', function () {
    return 'https://cdn.chitoku.jp/uploads';
} );
