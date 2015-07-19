<?php
global $error_code;
if ( $error_code == 403 ) {
    header( 'HTTP/1.0 403 Forbidden' );
    include TEMPLATEPATH . '/403.php';
    exit;
}
get_header();
?>
<div id="main-container" class="container">
    <div id="main-content-container" class="col-sm-9">
        <article class="main-content">
            <div class="main-content-header">
                <h1>記事がありません</h1>
                <p></p>
            </div>
            <p>お探しの記事が見つかりませんでした。URL が変更された、または記事が削除された可能性があります。ご不便おかけして申し訳ありません。<br>次の方法をお試しください。</p>
            <ul>
                <li style="margin-bottom: .8em"><a href="/">トップページ</a> に移動する</li>
                <li style="margin-bottom: .8em"><a href="/mail">管理人</a> に文句を言う</li>
                <li style="margin-bottom: .8em">
                    <div style="margin-bottom: .4em">サイト内を検索する</div>
                    <form class="form-inline" role="search" method="get" action="<?= home_url('/'); ?>">
                        <input type="search" class="form-control" name="s" style="display: inline-block; width: auto; vertical-align: middle; font-size: 16px">
                        <input type="submit" class="btn btn-primary" value="検索">
                    </form>
                </li>
                <li style="margin-bottom: .8em">あきらめる</li>
                <li>Twitterで <a href="https://twitter.com/java_shit" target="_blank">@java_shit</a> をフォローする</li>
            </ul>
        </article>
    </div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>

