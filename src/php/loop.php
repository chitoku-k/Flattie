<?php
while ( have_posts() ) {
    the_post();
?>
    <article id="<?php the_ID(); ?>" <?php post_class('main-content') ?>>
        <div class="main-content-header">
            <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <p>
<?php
    if ( is_page() ) {
        $current_post = $post;
        if ( $current_post->post_parent ) {
            $parent_posts = [ get_the_title( $current_post ) ];
            while ( $current_post->post_parent ) {
                $title = get_the_title( $current_post->post_parent );
                $parent_posts[] = '<a href="' . get_permalink( $current_post->post_parent ) . '" title="' . $title . '">' . $title . '</a>';
                $current_post = get_post( $current_post->post_parent );
            }
?>
                <i class="fa fa-folder-open-o"></i>
<?php
            echo implode( ' &gt; ', array_reverse( $parent_posts ) );
        }
    } else {
        if ( !is_uncategorized() ) {
?>
                <i class="fa fa-folder-open-o"></i>
<?php
            the_category( ', ' );
        }
        the_tags( '&nbsp;&nbsp;&nbsp;<i class="fa fa-tags"></i> ' );
?>
                &nbsp;&nbsp;<i class="fa fa-calendar-o"></i>
<?php
        the_time( get_option( 'date_format' ) );
    }
?>
            </p>
        </div>
<?php the_content( '続きを読む &raquo;' ); ?>
    </article>
<?php
}
?>
