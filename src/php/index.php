<?php get_header(); ?>
<div id="main-container" class="container">
    <div id="main-content-container" class="col-sm-9"<?php
if ( is_search() ) {
    echo ' style="width: 100%;"';
}
echo '>';
get_template_part( 'loop' );
get_template_part( 'share-buttons' );
?>
    </div>
<?php
if ( !is_search() ) {
    get_sidebar();
}
?>
</div>
<?php get_footer(); ?>
