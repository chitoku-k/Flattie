<?php get_header(); ?>
<div id="main-container" class="container">
    <div id="main-content-container" class="col-md-9">
        <article class="main-content">
            <nav id="sub-nav" class="navbar navbar-default">
                <ul class="nav navbar-nav">
                    <li class="col-sm-6"><a href="/programming/">プログラミング</a></li>
                    <li class="active col-sm-6"><a href="/programming/psp">PSP プログラミング</a></li>
                </ul>
            </nav>
        </article>
        <article class="main-content">
<?php
function show_posts_list( $posts ) {
    global $post;
    foreach ( $posts as $post ) {
        setup_postdata( $post );
?>
                <li><a href="<?= the_permalink() ?>"><?= the_title() ?></a></li>
<?php
    }
    wp_reset_query();
}
?>

            <div class="main-content-header">
                <h1>PSP プログラミング</h1>
                <p></p>
            </div>
            <div class="alert alert-info text-center" style="border-radius: 0;">現在記事の移行作業中です。
                <a href="http://chitoku.symphonic-net.com/pspprograming/">移転元のページ</a> もあわせてご覧ください。
            </div>
            <h2 style="margin-top: 0;">目次</h2>
            <ul>
    <?php
show_posts_list( get_posts( [
    'cat' => get_query_var( 'cat' ),
    'order' => 'ASC',
] ) );
?>
            </ul>
            <h2>資料</h2>
            <ul>
<?php
show_posts_list( get_posts( [
    'post_type' => 'page',
    'post_parent' => 85,
    'order' => 'ASC',
    'orderby' => 'menu_order',
] ) );
?>
            </ul>
        </article>
    </div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
