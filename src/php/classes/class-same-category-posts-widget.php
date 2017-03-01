<?php
class Same_Category_Posts_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'same_category_posts',
            __( '同じカテゴリーの投稿', 'same_category_posts' ),
            [
                'description' => __( '', 'same_category_posts' ),
            ]
        );
    }

    function widget( $args, $instance ) {
        global $post;
        if ( is_home() || ! isset( $post ) ) {
            return;
        }
        if ( is_page() && $post->post_parent ) {
            $url = get_permalink( $post->post_parent );
            $this->print_list( get_the_title( $post->post_parent ), $url, wp_list_pages( [
                'sort_column' => 'menu_order',
                'child_of' => $post->post_parent,
                'echo' => false,
                'title_li' => '',
            ] ) );
        } else if ( is_single() && ! is_uncategorized() ) {
            [ $cat ] = get_the_category();
            $url = get_category_link( $cat->cat_ID );
            $this->print_list( $cat->name, $url, get_posts( [
                'category' => $cat->cat_ID,
            ] ) );
        }
    }

    function print_list( $name, $url, $posts ) {
?>
        <div>
            <h2>
                <a href="<?= esc_url( $url ) ?>"><?= esc_html( $name ) ?></a>
            </h2>
            <ul>
<?php
        if ( is_array( $posts ) ) {
            foreach ( $posts as $post ) {
?>
                <li><a href="<?= get_permalink( $post->ID ); ?>"><?= esc_html( get_the_title( $post->ID ) ); ?></a></li>
<?php
            }
        } else {
            echo $posts;
        }
?>
            </ul>
        </div>
<?php
    }
}
