<aside class="main-content share-buttons-container">
<?php
global $title;
$twitter_url = 'https://twitter.com/share?text=%s&amp;url=%s&amp;related=java_shit';
$facebook_url = 'https://www.facebook.com/sharer.php?u=%s';
$google_plus_url = 'https://plus.google.com/share?url=%s';
$hatena_url = 'https://b.hatena.ne.jp/add?mode=confirm&amp;url=%s';
$tumblr_url = 'https://www.tumblr.com/share/link?url=%s';
?>
    <a href="<?= sprintf($twitter_url, urlencode( html_entity_decode( $title, ENT_QUOTES, 'UTF-8' ) ), get_permalink() ) ?>" target="_blank" class="share-button twitter-icon">
        <i class="fa fa-twitter"></i>
    </a>
    <a href="<?= sprintf($facebook_url, get_permalink() ) ?>" target="_blank" class="share-button facebook-icon">
        <i class="fa fa-facebook"></i>
    </a>
    <a href="<?= sprintf($google_plus_url, get_permalink() ) ?>" target="_blank" class="share-button google-plus-icon">
        <i class="fa fa-google-plus"></i>
    </a>
    <a href="<?= sprintf($hatena_url, get_permalink() ) ?>" target="_blank" class="share-button hatena-icon">
        <i class="fa fa-hatena"></i>
    </a>
    <a href="<?= sprintf($tumblr_url, urlencode( get_permalink() ) ) ?>" target="_blank" class="share-button tumblr-icon">
        <i class="fa fa-tumblr"></i>
    </a>
</aside>
