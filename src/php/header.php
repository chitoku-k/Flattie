<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title><?php get_template_part( 'title' ); ?></title>
    <!-- build:css ../../dest/css/style.css -->
    <link rel="stylesheet" type="text/css" href="../../dev/css/style.css">
    <!-- endbuild -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div id="wrapper">
        <header id="header-container" class="container">
            <div id="header-title" class="pull-left">
                <h1>
                    <a href="<?= get_home_url(); ?>">
                        <span id="header-title-text"><?= get_bloginfo( 'name' ); ?></span>
                        <svg viewBox="0 0 330 33">
                            <path style="fill:#2f4255;" d="m 0,9.9 c 0.1,2.1e-5 0.2,2.1e-5 0.2,0 0.1,-7.2e-4 0.3,7.7e-4 0.4,0 0.1,0 0.4,0 0.6,0 0.9,0 1.8,0.1 2.7,0.1 0.8,0 1.7,0 2.7,0 -0.2,0.9 -0.6,2.1 -1.2,3.6 -0.5,1.4 -1.1,2.9 -1.7,4.3 -0.2,0.6 -0.5,1.2 -0.8,1.7 -0.2,0.5 -0.5,1 -0.8,1.4 l 4.3,1.5 c 0.3,-0.4 0.6,-0.8 1,-1.1 0.3,-0.3 0.9,-0.6 1.5,-0.9 1.1,-0.5 2.4,-0.9 3.7,-1.3 1.3,-0.3 2.6,-0.4 4,-0.4 1.9,0 3.4,0.3 4.4,0.8 1,0.5 1.5,1.4 1.5,2.5 -0,1.4 -0.8,2.6 -2.3,3.4 -1.5,0.8 -3.6,1.2 -6.2,1.2 -1.5,3e-6 -3,-0.1 -4.5,-0.4 -1.5,-0.2 -3.1,-0.7 -4.7,-1.2 0.1,0.8 0.2,1.5 0.3,2.1 0,0.6 0,1.4 0,2.3 1.4,0.4 2.8,0.7 4.4,0.9 1.5,0.2 3.1,0.3 4.7,0.3 3.9,-0 7.1,-0.8 9.4,-2.3 2.3,-1.5 3.5,-3.6 3.5,-6.3 -0,-2.3 -0.9,-4 -2.6,-5.3 -1.7,-1.2 -4.2,-1.9 -7.4,-1.9 -1.7,7.6e-4 -3.4,0.1 -4.9,0.5 -1.5,0.3 -2.9,0.9 -4.1,1.7 l 0,-0 c 0.3,-0.7 0.8,-1.7 1.4,-3.1 0.5,-1.4 1,-2.7 1.4,-4.1 2.1,-0 4.2,-0.1 6.1,-0.2 1.9,-0.1 4.1,-0.3 6.7,-0.6 0.4,-0 0.8,-0 1,-0.1 0.2,-0 0.6,-0 1,-0 L 26,4.8 c -0.5,0.1 -1.1,0.3 -1.7,0.4 -0.6,0.1 -1.5,0.2 -2.8,0.4 -1.2,0.1 -2.7,0.2 -4.4,0.4 -1.7,0.1 -3.2,0.2 -4.7,0.2 0,-0.2 0.1,-0.5 0.2,-0.9 0,-0.3 0.2,-1.1 0.5,-2.4 0.1,-0.6 0.2,-1.1 0.3,-1.3 0,-0.2 0.1,-0.4 0.2,-0.7 L 8.8,0.4 C 8.8,1.1 8.7,2 8.5,2.9 8.4,3.8 8.1,4.9 7.8,6.3 6,6.3 4.4,6.3 3.1,6.2 1.9,6.1 0.8,5.9 0,5.7 z" />
                            <path style="fill:#2f4255;" d="m 38.9,1.3 c 0,0.2 0.1,0.4 0.2,0.7 0,0.2 0.1,0.7 0.3,1.6 0.4,2.1 0.8,3.9 1.2,5.4 0.3,1.4 0.7,2.9 1.2,4.3 -1.1,0.5 -2,1 -2.7,1.5 -0.7,0.4 -1.4,0.9 -2,1.5 -1,0.8 -1.8,1.8 -2.3,2.9 -0.5,1.1 -0.8,2.2 -0.8,3.4 0,1.3 0.2,2.4 0.8,3.5 0.5,1 1.3,1.8 2.3,2.4 1.1,0.6 2.5,1.1 4.2,1.5 1.6,0.3 3.7,0.4 6.2,0.4 1.2,0 2.4,-0 3.6,-0.1 1.2,-0 2.8,-0.2 4.7,-0.4 0.9,-0.1 1.5,-0.1 1.8,-0.2 0.3,-0 0.6,-0 1,-0 l -0.3,-4.9 c -1.3,0.4 -3,0.8 -5.1,1 -2,0.2 -4.2,0.3 -6.4,0.3 -2.8,0 -4.9,-0.2 -6.2,-0.8 -1.3,-0.5 -1.9,-1.5 -1.9,-2.8 -9e-6,-1.2 0.6,-2.5 1.9,-3.6 1.3,-1.1 3.2,-2.2 5.9,-3.1 2,-0.7 4.1,-1.4 6.2,-2 2.1,-0.6 3.9,-1 5.6,-1.4 l -1.5,-4.5 c -0.2,0.1 -0.4,0.2 -0.6,0.2 -0.1,0 -0.4,0.1 -0.7,0.2 -2.2,0.7 -3.9,1.2 -5,1.6 -1,0.3 -1.8,0.6 -2.4,0.8 -0.5,0.1 -1.1,0.4 -1.9,0.6 C 45.3,9.9 44.8,7.9 44.3,5.7 43.9,3.6 43.6,1.9 43.5,0.6 z" />
                            <path style="fill:#2f4255;" d="M 82.1,0.3 C 81.8,0.7 81.5,1.1 81.2,1.5 80.8,1.9 80.3,2.5 79.5,3.3 78.3,4.4 77.1,5.5 75.9,6.5 74.6,7.6 73.1,8.8 71.2,10.3 c -1.2,0.9 -2,1.5 -2.4,1.8 -0.3,0.2 -0.5,0.5 -0.7,0.7 -0.7,0.8 -1.1,1.8 -1.1,2.9 -0,0.7 0.1,1.5 0.6,2.1 0.4,0.6 1.2,1.4 2.4,2.2 1.8,1.4 3.2,2.5 4.3,3.3 1,0.8 1.9,1.5 2.6,2.2 0.7,0.6 1.4,1.3 2.3,2 1.2,1.1 2.1,2 2.9,2.8 0.7,0.7 1.3,1.4 1.7,2.1 l 3.7,-3.7 C 87.3,28.9 87.1,28.8 87,28.7 86.8,28.5 86.6,28.4 86.5,28.2 85,26.8 83.7,25.7 82.7,24.8 c -1,-0.8 -2,-1.7 -3.1,-2.6 -1.1,-0.8 -2.5,-2 -4.3,-3.3 -1.5,-1.1 -2.4,-1.8 -2.8,-2.1 -0.3,-0.3 -0.4,-0.5 -0.4,-0.8 -0,-0.1 0,-0.3 0.2,-0.5 0.1,-0.2 0.5,-0.5 1.1,-0.9 2,-1.5 3.8,-2.9 5.1,-4 1.3,-1 2.4,-2 3.3,-2.8 1.5,-1.4 2.5,-2.3 3.1,-2.9 0.5,-0.5 1,-0.8 1.2,-1 z" />
                            <path style="fill:#e11010;" d="m 112.6,7.1 c 0.7,0 1.4,0.1 1.9,0.3 0.5,0.1 1.1,0.4 1.6,0.7 1.4,0.8 2.5,1.9 3.2,3.3 0.7,1.3 1.1,2.9 1.1,4.6 -0,1.9 -0.4,3.7 -1.3,5.2 -0.8,1.5 -2,2.8 -3.6,3.7 -0.8,0.4 -1.8,0.8 -2.9,1.1 -1.1,0.3 -2.5,0.5 -4.1,0.7 0.5,0.7 0.9,1.3 1.3,1.9 0.3,0.5 0.6,1.3 0.8,2.2 1.2,-0.2 2.2,-0.4 3.1,-0.6 0.8,-0.2 1.6,-0.5 2.5,-0.8 2.7,-1.1 4.9,-2.8 6.4,-5.2 1.5,-2.3 2.2,-5 2.3,-8.2 -0,-4.1 -1.3,-7.3 -3.8,-9.7 -2.5,-2.3 -5.9,-3.5 -10.3,-3.6 -2.5,0 -4.8,0.4 -6.9,1.2 -2,0.8 -3.8,2.1 -5.4,3.7 -1.2,1.4 -2.2,3 -2.9,4.8 -0.6,1.7 -1,3.6 -1,5.6 0,2.9 0.7,5.3 1.9,7.1 1.2,1.8 2.9,2.7 5,2.8 1.4,0 2.7,-0.5 3.9,-1.6 1.1,-1.1 2.2,-2.8 3.3,-5.1 0.9,-2 1.6,-4.2 2.2,-6.7 0.6,-2.4 1.1,-5.1 1.4,-7.9 z m -4.3,0 c -0.2,2 -0.6,4.2 -1.1,6.3 -0.5,2.1 -1.1,4.1 -1.8,5.7 -0.6,1.5 -1.2,2.7 -1.8,3.4 -0.6,0.7 -1.2,1.1 -1.8,1.1 -0.8,-0 -1.4,-0.5 -2,-1.5 -0.5,-0.9 -0.8,-2.2 -0.8,-3.7 0,-1.9 0.4,-3.7 1.3,-5.4 0.8,-1.7 2,-3.1 3.5,-4.2 0.7,-0.5 1.4,-0.9 2.1,-1.1 0.7,-0.2 1.5,-0.4 2.4,-0.5 z" />
                            <path style="fill:#2f4255;" d="m 143.4,6.6 -7.9,0 c -1.1,0 -2,-0 -2.7,-0 -0.6,-0 -1.2,-0.1 -1.8,-0.2 l 0,4.4 c 0.5,-0 1.2,-0.1 1.8,-0.1 0.6,-0 1.5,-0 2.6,-0 l 7.9,0 0,17.4 c 0,0.9 -0,1.6 -0,2.3 -0,0.6 -0,1.2 -0.1,1.7 l 4.8,0 c -0,-0.5 -0.1,-1.1 -0.1,-1.7 -0,-0.6 -0,-1.3 -0,-2.2 l 0,-17.4 8.3,0 c 1.1,-0 2,0 2.7,0 0.6,0 1.2,0 1.8,0.1 l 0,-4.4 c -0.6,0.1 -1.2,0.1 -1.9,0.2 -0.6,0 -1.5,0 -2.7,0 l -8.2,0 0,-1.9 c -7.7e-4,-1 0,-1.8 0,-2.3 0,-0.4 0,-0.9 0.1,-1.4 l -4.8,0 c 0,0.4 0.1,1 0.1,1.5 0,0.5 0,1.2 0,2.1 z m -8,6.5 c -0,0.6 -0.1,1.3 -0.3,2 -0.1,0.6 -0.3,1.4 -0.7,2.4 -0.6,2 -1.3,3.7 -2.1,5.2 -0.7,1.4 -1.7,2.8 -2.8,4.2 0.8,0.3 1.5,0.6 2.1,0.9 0.5,0.3 1.2,0.7 2,1.3 1.4,-1.9 2.6,-4 3.6,-6.3 0.9,-2.2 1.8,-4.8 2.4,-7.5 0,-0.3 0.1,-0.5 0.1,-0.6 0,-0.1 0,-0.2 0.1,-0.4 z m 16.1,1 c 0.1,0.2 0.2,0.4 0.2,0.6 0,0.1 0.1,0.5 0.3,1 0.8,2.7 1.6,5.2 2.5,7.2 0.8,2 2,4.1 3.3,6.2 0.7,-0.5 1.4,-1 1.9,-1.3 0.5,-0.3 1.2,-0.7 2.1,-1.1 -1,-1.3 -1.9,-2.7 -2.7,-4.2 -0.7,-1.4 -1.5,-3.2 -2.3,-5.4 -0.3,-0.9 -0.6,-1.6 -0.8,-2.2 -0.1,-0.5 -0.3,-1.1 -0.4,-1.7 z" />
                            <path style="fill:#2f4255;" d="m 165.1,18.8 c 0.6,-0 1.2,-0.1 1.9,-0.1 0.6,-0 1.9,-0 3.9,-0 l 19.1,0 c 1.9,-0 3.2,0 3.9,0 0.6,0 1.3,0 1.9,0.1 l 0,-5 c -0.7,0.1 -1.4,0.1 -2.1,0.2 -0.7,0 -1.9,0 -3.6,0 l -19.1,0 c -1.7,0 -2.9,-0 -3.6,-0 -0.7,-0 -1.4,-0.1 -2.1,-0.2 z" />
                            <path style="fill:#2f4255;" d="m 209,1 c -0.1,1 -0.3,2.2 -0.7,3.7 -0.4,1.5 -1,3.5 -1.8,6.1 -0.9,2.9 -1.7,5.4 -2.5,7.7 -0.8,2.2 -1.6,4.5 -2.6,6.7 -0.7,0 -1.3,0 -1.8,0 -0.4,0 -0.9,0 -1.2,0 -0.1,5e-6 -0.3,5e-6 -0.4,0 -0,5e-6 -0.2,5e-6 -0.4,0 l 0.6,4.8 c 0.3,-0 0.7,-0.1 1.1,-0.2 0.4,-0 1.1,-0.1 2.1,-0.2 5.3,-0.5 9.6,-0.9 12.8,-1.3 3.2,-0.4 5.7,-0.7 7.5,-1.1 0.3,-0 0.6,-0.1 0.7,-0.1 0.1,-0 0.3,-0 0.5,-0.1 0.5,1.4 0.9,2.3 1.1,2.7 0.1,0.4 0.3,1 0.5,1.6 l 4.3,-2.2 c -1.1,-2.8 -2.4,-5.7 -3.9,-8.6 -1.5,-2.8 -3,-5.5 -4.7,-8 l -4,1.5 c 0.5,0.7 1,1.5 1.5,2.3 0.4,0.7 1,1.9 1.8,3.3 0.4,0.7 0.7,1.4 1,1.9 0.2,0.4 0.4,0.9 0.6,1.3 -1.6,0.3 -3.8,0.6 -6.5,0.9 -2.7,0.3 -5.5,0.6 -8.4,0.8 1.1,-2.7 2.2,-5.7 3.4,-8.9 1.1,-3.2 2.3,-7.1 3.7,-11.5 0.2,-0.8 0.4,-1.3 0.5,-1.6 0.1,-0.2 0.2,-0.5 0.4,-0.9 z" />
                            <path style="fill:#2f4255;" d="m 233.2,23.1 c 0.2,-0.3 0.4,-0.5 0.5,-0.7 0.1,-0.2 0.3,-0.4 0.6,-0.7 1.2,-1.5 2.4,-2.9 3.5,-4.3 1.1,-1.3 2,-2.6 2.8,-3.6 0.7,-0.9 1.1,-1.5 1.4,-1.7 0.2,-0.2 0.5,-0.3 0.7,-0.3 0.2,-0 0.5,0 0.8,0.3 0.3,0.2 1,0.9 2,2.2 2,2.2 3.8,4.1 5.1,5.5 1.3,1.4 2.8,2.8 4.3,4.2 1.4,1.4 3.3,3.1 5.7,5.3 l 2.2,-4.9 c -0.4,-0.2 -0.8,-0.5 -1.3,-0.9 -0.4,-0.3 -1.1,-0.9 -2.1,-1.7 -2.1,-1.8 -4.1,-3.6 -6,-5.5 -1.9,-1.8 -3.7,-3.8 -5.6,-5.9 -1.3,-1.5 -2.3,-2.5 -3,-2.9 -0.7,-0.4 -1.4,-0.7 -2.3,-0.6 -0.4,-0 -0.8,0 -1.2,0.1 -0.4,0.1 -0.8,0.2 -1.1,0.5 -0.3,0.2 -0.7,0.5 -1.1,0.9 -0.4,0.4 -0.9,1 -1.5,1.8 -1,1.3 -2.1,2.7 -3.5,4.3 -1.3,1.5 -2.3,2.6 -2.9,3.3 -0.2,0.2 -0.4,0.4 -0.5,0.5 -0.1,0.1 -0.4,0.3 -0.7,0.5 z m 23.7,-19.5 c -1.1,0 -2,0.4 -2.8,1.1 -0.7,0.7 -1.1,1.6 -1.1,2.8 0,1.1 0.4,2 1.1,2.7 0.7,0.7 1.6,1.1 2.7,1.1 1.1,-0 2,-0.4 2.8,-1.1 0.7,-0.7 1.1,-1.6 1.1,-2.8 -0,-1.1 -0.4,-2 -1.1,-2.8 -0.7,-0.7 -1.6,-1.1 -2.8,-1.1 z m 0,1.9 c 0.5,0 1,0.2 1.4,0.5 0.3,0.3 0.5,0.8 0.5,1.4 -0,0.5 -0.2,1 -0.6,1.4 -0.3,0.3 -0.8,0.5 -1.4,0.6 -0.5,-0 -1,-0.2 -1.4,-0.6 -0.3,-0.3 -0.5,-0.8 -0.6,-1.4 0,-0.5 0.2,-1 0.6,-1.4 0.3,-0.3 0.8,-0.5 1.4,-0.6 z" />
                            <path style="fill:#2f4255;" d="m 264,18.8 c 0.6,-0 1.2,-0.1 1.9,-0.1 0.6,-0 1.9,-0 3.9,-0 l 19.1,0 c 1.9,-0 3.2,0 3.9,0 0.6,0 1.3,0 1.9,0.1 l 0,-5 c -0.7,0.1 -1.4,0.1 -2.1,0.2 -0.7,0 -1.9,0 -3.6,0 l -19.1,0 c -1.7,0 -2.9,-0 -3.6,-0 -0.7,-0 -1.4,-0.1 -2.1,-0.2 z" />
                            <path style="fill:#2f4255;" d="m 301.5,5.5 c 3.1,1 6.3,2.7 9.6,4.9 l 2.3,-3.9 c -1.4,-0.9 -3,-1.7 -4.5,-2.4 -1.5,-0.7 -3.2,-1.4 -5,-2.1 z m -2.8,8.7 c 1.8,0.7 3.5,1.4 5.1,2.3 1.6,0.8 3.1,1.8 4.5,2.8 l 2.2,-4 c -1.5,-0.9 -3,-1.8 -4.5,-2.6 -1.5,-0.7 -3.1,-1.5 -5,-2.2 z m 2,17.3 c 0.3,-0.1 0.6,-0.2 1,-0.2 0.3,-0 0.8,-0.1 1.4,-0.3 4.4,-0.8 8.1,-2.1 11.3,-3.7 3.1,-1.6 5.9,-3.8 8.1,-6.4 1,-1.2 2,-2.6 2.9,-4 0.8,-1.4 1.6,-3.1 2.4,-5 -0.8,-0.5 -1.4,-1 -1.9,-1.4 -0.4,-0.4 -1,-1 -1.7,-1.7 -0.5,1.5 -1.1,2.9 -1.7,4.2 -0.6,1.2 -1.4,2.4 -2.3,3.7 -1.4,1.8 -2.9,3.4 -4.6,4.7 -1.6,1.2 -3.5,2.3 -5.7,3.1 -1.9,0.7 -3.7,1.2 -5.5,1.7 -1.8,0.4 -3.4,0.6 -4.8,0.6 z M 320.3,3.4 c 0.6,0.7 1.2,1.4 1.7,2.1 0.5,0.7 1,1.6 1.6,2.6 l 2.6,-1.5 C 325.8,5.6 325.3,4.8 324.8,4.1 324.3,3.4 323.7,2.7 323,2 z m 9.8,1 C 329.7,3.5 329.2,2.7 328.7,2.1 328.2,1.4 327.6,0.7 326.9,0 l -2.5,1.4 c 0.6,0.7 1.2,1.4 1.7,2.1 0.5,0.7 1,1.5 1.5,2.4 z" />
                        </svg>
                    </a>
                </h1>
            </div>
        </header>
        <div id="nav-container">
            <nav class="navbar navbar-navy container">
<?php
wp_nav_menu( [
    'theme_location' => 'header-menu',
    'container' => '',
    'menu_class' => '',
    'items_wrap' => '                <ul class="nav navbar-nav">' . "\n" . '%3$s' . "\n",
    'walker' => new Flattie_Nav_Walker(),
] );
?>
                    <li class="nav-icon"><a id="search-link" class="search-icon"><i class="fa fa-search"></i></a></li>
                </ul>
<?php get_search_form(); ?>
            </nav>
        </div>
