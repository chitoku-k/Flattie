<?php
global $error_code;
global $title;
$title = get_bloginfo( 'name' );
if ( is_search() ) {
    echo $title = '検索結果: ' . get_search_query() . ' - ' . $title;
} else if ( isset( $error_code ) ) {
    switch ( $error_code ) {
        case 401: echo $title = '401 Not Authorized - ' . $title; break;
        case 403: echo $title = '403 Forbidden - ' . $title; break;
        case 404: echo $title = '404 Not Found - ' . $title; break;
        case 500: echo $title = '500 Internal Server Error - ' . $title; break;
    }
} else {
    echo $title = wp_title( '-', false, 'right' ) . $title;
}
