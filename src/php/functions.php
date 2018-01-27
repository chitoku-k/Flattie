<?php
function remove_ver_query( $url ) {
    return remove_query_arg( 'ver', $url );
}

function is_uncategorized() {
    return count( get_the_category() ) == 0 || in_category( '1' );
}

require_once __DIR__ . '/functions/init.php';
require_once __DIR__ . '/functions/actions.php';
require_once __DIR__ . '/functions/filters.php';
require_once __DIR__ . '/functions/shortcodes.php';
