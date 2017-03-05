<?php get_header(); ?>
<div id="main-container" class="container">
    <div class="row">
        <div id="main-content-container" class="col-sm-9">
            <article class="main-content">
                <div class="row">
                    <div class="home-menu-link col-xs-6 col-md-4">
                        <a href="<?= get_home_url();?>/programming/psp/" id="pspprogramming-link" class="home-menu-link-image" title="PSP プログラミング">
                            <div class="home-menu-link-container"></div>
                            <h2>PSP プログラミング</h2>
                        </a>
                        <p>SONY のゲーム機、PSP で動作するソフトウェアを作成するためのプログラミング講座です。放置された PSP、活用するなら今しかありません！</p>
                    </div>
                    <div class="home-menu-link col-xs-6 col-md-4">
                        <a href="<?= get_home_url();?>/softwares/soarer/" id="soarer-link" class="home-menu-link-image" title="Soarer for Windows">
                            <div class="home-menu-link-container"></div>
                            <h2>Soarer for Windows</h2>
                        </a>
                        <p>Windows 用の Twitter クライアントです。小さなウィンドウでも快適に Twitter を楽しむことができます。現在鋭意開発続行中です！</p>
                    </div>
                    <div class="clearfix visible-sm-block visible-xs-block"></div>
                    <div class="home-menu-link col-xs-6 col-md-4">
                        <a href="https://recotw.chitoku.jp/" id="recotw-link" class="home-menu-link-image" target="_blank" title="RecoTw Explorer">
                            <div class="home-menu-link-container"></div>
                            <h2>RecoTw Explorer</h2>
                        </a>
                        <p>RecoTw の閲覧 / 登録用 Web アプリケーションです。RecoTw は G2 氏制作の黒歴史ツイート登録サービスです。</p>
                    </div>
                    <div class="clearfix visible-md-block visible-lg-block"></div>
                    <div class="home-menu-link col-xs-6 col-md-4">
                        <a href="<?= get_home_url();?>/windows" id="windows-link" class="home-menu-link-image" title="Windows">
                            <div class="home-menu-link-container"></div>
                            <h2>Windows</h2>
                        </a>
                        <p>Windows のデスクトップ向けフリーソフトの紹介コーナーです。でも最近は Windows を使っていません……。</p>
                    </div>
                    <div class="clearfix visible-sm-block visible-xs-block"></div>
                    <div class="home-menu-link col-xs-6 col-md-4">
                        <a href="<?= get_home_url();?>/gadgets" id="psp-smartphone-link" class="home-menu-link-image" title="ガジェット">
                            <div class="home-menu-link-container"></div>
                            <h2>ガジェット</h2>
                        </a>
                        <p>周辺機器やガジェットを使ってみた感想を書いてみます。</p>
                    </div>
                    <div class="home-menu-link col-xs-6 col-md-4">
                        <a href="<?= get_home_url();?>/programming" id="programming-link" class="home-menu-link-image" title="プログラミング">
                            <div class="home-menu-link-container"></div>
                            <h2>プログラミング</h2>
                        </a>
                        <p>WPF、C#、Twitter、CSS、JavaScript など。</p>
                    </div>
                </div>
            </article>
<?php get_template_part( 'share-buttons' ); ?>
        </div>
<?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>
