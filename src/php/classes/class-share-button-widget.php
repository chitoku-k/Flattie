<?php
class Share_Button_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'share_button',
            __( '共有ボタン', 'share_button' ),
            [
                'description' => __( '', 'share_button' ),
            ]
        );
    }

    public function widget( $args, $instance ) {
        global $title;
        $permalink = ( is_ssl() ? 'https://' : 'http://' ) . filter_input( INPUT_SERVER, 'HTTP_HOST' ) . filter_input( INPUT_SERVER, 'REQUEST_URI' );
        $twitter_url = 'https://twitter.com/share?text=%s&amp;url=%s&amp;related=java_shit';
        $facebook_url = 'https://www.facebook.com/sharer.php?u=%s';
        $google_plus_url = 'https://plus.google.com/share?url=%s';
        $hatena_url = 'https://b.hatena.ne.jp/add?mode=confirm&amp;url=%s';
        $tumblr_url = 'https://www.tumblr.com/share/link?url=%s';
?>
        <div>
            <h2><?= esc_html( $instance['title'] ) ?></h2>
            <div class="share-buttons-container">
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
        </div>
<?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags( $new_instance['title'] );
        return $instance;
    }

    public function form( $instance ) {
?>
        <p>
            <label for="<?= esc_attr( $this->get_field_id( 'title' ) ) ?>">タイトル:</label>
            <input type="text" class="widefat" id="<?= esc_attr( $this->get_field_id( 'title' ) ) ?>" name="<?= esc_attr( $this->get_field_name( 'title' ) ) ?>" value="<?= esc_attr( $instance['title'] ) ?>">
        </p>
<?php
    }
}
