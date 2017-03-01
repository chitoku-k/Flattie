<?php
class Share_Button_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'share_button',
            __( '共有ボタン', 'share_button' ),
            [
                'description' => __( '', 'share_button' ),
            ]
        );
    }

    function widget( $args, $instance ) {
        global $title;
        $permalink = ( is_ssl() ? 'https://' : 'http://' ) . filter_input( INPUT_SERVER, 'HTTP_HOST' ) . filter_input( INPUT_SERVER, 'REQUEST_URI' );
        $twitter_url = 'https://twitter.com/share?text=%s&amp;url=%s&amp;related=java_shit';
        $facebook_url = 'https://www.facebook.com/sharer.php?u=%s';
        $google_plus_url = 'https://plus.google.com/share?url=%s';
        $hatena_url = 'https://b.hatena.ne.jp/add?mode=confirm&amp;url=%s';
        $tumblr_url = 'https://www.tumblr.com/share/link?url=%s';
?>
        <div class="main-content share-buttons-container">
            <h2><?= esc_html( $instance['title'] ) ?></h2>
            <a href="<?= esc_url( sprintf($twitter_url, urlencode( html_entity_decode( $title, ENT_QUOTES, 'UTF-8' ) ), $permalink ) ) ?>" target="_blank" class="share-button twitter-icon">
                <i class="fa fa-twitter"></i>
            </a>
            <a href="<?= esc_url( sprintf($facebook_url, $permalink ) ) ?>" target="_blank" class="share-button facebook-icon">
                <i class="fa fa-facebook"></i>
            </a>
            <a href="<?= esc_url( sprintf($google_plus_url, $permalink ) ) ?>" target="_blank" class="share-button google-plus-icon">
                <i class="fa fa-google-plus"></i>
            </a>
            <a href="<?= esc_url( sprintf($hatena_url, $permalink ) ) ?>" target="_blank" class="share-button hatena-icon">
                <i class="fa fa-hatena"></i>
            </a>
            <a href="<?= esc_url( sprintf($tumblr_url, urlencode( $permalink ) ) ) ?>" target="_blank" class="share-button tumblr-icon">
                <i class="fa fa-tumblr"></i>
            </a>
        </div>
<?php
    }
}
