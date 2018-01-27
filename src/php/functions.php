<?php
spl_autoload_register( function ( $class ) {
    $filename = 'class-' . strtolower( str_replace( '_', '-', $class ) ) . '.php';
    $path = __DIR__ . '/classes/' . $filename;

    if ( file_exists( $path ) ) {
        require $path;
    }
} );

$wp_scripts = new Flattie_Scripts();

function is_uncategorized() {
    return count( get_the_category() ) === 0 || in_category( '1' );
}

require_once __DIR__ . '/functions/init.php';
require_once __DIR__ . '/functions/actions.php';
require_once __DIR__ . '/functions/filters.php';
require_once __DIR__ . '/functions/shortcodes.php';
