<?php
/*
Template Name: サイドバーなしテンプレート
*/
get_header();
?>
<div id="main-container" class="container">
    <div class="row">
        <div id="main-content-container" class="col-sm-9" style="width: 100%;">
<?php
get_template_part( 'loop' );
get_template_part( 'share-buttons' );
?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
