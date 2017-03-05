        <footer class="text-center">&copy; Chitoku 2014.</footer>
    </div>
<?php
wp_footer();
if ( ! is_preview() ) {
?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-91844602-1', 'auto');
        ga('send', 'pageview');
    </script>
<?php
}
?>
    <!-- build:js ../../dest/js/script.min.js -->
    <script type="text/javascript" src="../../dev/js/script.js"></script>
    <script type="text/javascript" src="../../node_modules/jquery-fancybox/source/js/jquery.fancybox.js"></script>
    <!-- endbuild -->
</body>
</html>
