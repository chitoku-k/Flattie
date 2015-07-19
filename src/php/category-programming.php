<?php get_header(); ?>
<div id="main-container" class="container">
    <div id="main-content-container" class="col-sm-9">
        <article class="main-content">
            <nav id="sub-nav" class="navbar navbar-default">
                <ul class="nav navbar-nav">
                    <li class="active col-sm-6"><a href="/programming/">プログラミング</a></li>
                    <li class="col-sm-6"><a href="/programming/psp">PSP プログラミング</a></li>
                </ul>
            </nav>
        </article>
<?php
query_posts( array(
    'category__and' => array( get_query_var( 'cat' ) ),
    'paged' => get_query_var( 'paged' ),
) );
get_template_part( 'loop' );
get_template_part( 'share-buttons' );
?>
    </div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
