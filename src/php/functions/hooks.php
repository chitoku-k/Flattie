<?php
/**
 * Hooks relating to scripts loaded by WordPress
 *
 * The WP_Scripts class outputs script elements with type attribute attached.
 * In HTML5, it is advised to omit type attribute and replacing the functions
 * `print_extra_script` and `print_inline_script` did the trick.
 */
$wp_scripts = new class extends WP_Scripts {
    public function print_extra_script( $handle, $echo = true ) {
        $output = parent::print_extra_script( $handle, false );

        if ( ! $output ) {
            return;
        }
        if ( ! $echo ) {
            return $output;
        }

        echo "<script>\n{$output}\n</script>\n";
        return true;
    }

    public function print_inline_script( $handle, $position = 'after', $echo = true ) {
        $output = parent::print_inline_script( $handle, $position, false );

        if ( ! $output ) {
            return false;
        }
        if ( $echo ) {
            echo "<script>\n{$output}\n</script>\n";
        }

        return $output;
    }
};

/**
 * Hooks relating to scripts loaded by All in One SEO Pack
 *
 * The All in One SEO Pack outputs script elements with type attribute attached.
 * In HTML5, it is advised to omit type attribute and replacing the function
 * `universal_analytics` in aioseop_google_analytics did the trick.
 */
if ( class_exists( 'aioseop_google_analytics' ) ) {
    add_filter( 'init', function () use ( $aiosp ) {
        // Remove the action that prints Google Analytics
        remove_action( 'aioseop_modules_wp_head', [ $aiosp, 'aiosp_google_analytics' ] );

        // Add an action replacing the type attribute
        add_action(
            'aioseop_modules_wp_head',
            function () {
                new class extends aioseop_google_analytics {
                    public function universal_analytics() {
                        return str_replace( ' type="text/javascript" ', '', parent::universal_analytics() );
                    }
                };
            },
            apply_filters( 'aioseop_wp_head_priority', 1 )
        );
    } );
}
