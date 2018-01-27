<?php
add_editor_style( 'editor.css' );
register_nav_menu( 'header-menu', 'ヘッダーメニュー' );

register_sidebar( [
    'name' => 'サイドバーウィジット',
    'id' => 'sidebar',
    'description' => 'サイドバーのウィジットです。',
    'before_widget' => '<div id="%1$s" class="%2$s">',
    'after_widget' => '</div>',
] );
