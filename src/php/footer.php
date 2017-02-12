    <footer class="text-center">&copy; Chitoku 2014.</footer>
<?php
wp_footer();
if( !is_preview() ) {
    include dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/lunalys/analyzer/tracker.php';
?>
    <script type="text/javascript" src="/lunalys/analyzer/add.js"></script>
<?php
}
?>
    <!-- build:js ../../dest/js/script.min.js -->
    <script type="text/javascript" src="../../dev/js/script.js"></script>
    <script type="text/javascript" src="../../bower_components/fancybox/source/jquery.fancybox.js"></script>
    <!-- endbuild -->
</body>
</html>
