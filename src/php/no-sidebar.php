<?php
/*
Template Name: サイドバーなしテンプレート
*/
get_header();
?>
<div id="main-container" class="container">
    <div id="main-content-container" class="col-md-9" style="width: 100%;">
<?php
get_template_part( 'loop' );
?>
    </div>
</div>
<?php get_footer(); ?>
