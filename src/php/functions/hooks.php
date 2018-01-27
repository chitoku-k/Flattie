<?php
// Hooks relating to scripts
$wp_scripts = new Flattie_Scripts();

// Hooks relating to All in One SEO Pack
if ( class_exists( 'All_in_One_SEO_Pack' ) ) {
    add_filter( 'init', function () use ( $aiosp ) {
        remove_action( 'aioseop_modules_wp_head', [ $aiosp, 'aiosp_google_analytics' ] );

        $aiosp = new class extends All_in_One_SEO_Pack {
            public function aiosp_google_analytics() {
                new class extends aioseop_google_analytics {
                    public function universal_analytics() {
                        return str_replace( ' type="text/javascript" ', '', parent::universal_analytics() ) . "\n";
                    }
                };
            }
        };

        add_action( 'wp_head', [ $aiosp, 'aiosp_google_analytics' ], apply_filters( 'aioseop_wp_head_priority', 1 ) );
    } );
}
