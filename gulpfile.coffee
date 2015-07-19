gulp      = require("gulp")
$         = require("gulp-load-plugins")()
run       = require("run-sequence")
pipe      = require("multipipe")

ROOT      = "../httpdocs/www"
WORDPRESS = "#{ROOT}/wordpress"
FLATTIE   = "#{WORDPRESS}/wp-content/themes/flattie"

WP_CSS    = "<?= get_stylesheet_uri(); ?>"
WP_DIR    = "<?= get_template_directory_uri(); ?>"

WP_META   = """
/*
Theme Name: Flattie
Description: Flat designed WordPress theme.
Author: Chitoku
Version: 1.0.0
*/
"""

gulp.task("coffee", ->
    gulp.src("./src/coffee/*.coffee")
        .pipe($.coffee(bare: true))
        .pipe(gulp.dest("./dest/js"))
)

gulp.task("sass", ->
    gulp.src("./src/scss/*.scss")
        .pipe($.sass(
            indentWidth: 4
            outputStyle: "expanded"
        ))
        .pipe(gulp.dest("./dest/css"))
)

minify_js = ->
    pipe($.uglify(preserveComments: "some"),
         $.flatten(),
         gulp.dest("#{FLATTIE}/js"))

minify_css = ->
    pipe($.csso(),
         $.header(WP_META),
         $.flatten(),
         gulp.dest("#{FLATTIE}/"))

replace_url = ->
    pipe($.replace(/href=(.)\.\.\/\.\.\/dest\/.*\.css/g, "href=$1#{WP_CSS}"),
         $.replace(/src=(.)\.\.\/\.\.\/dest/g, "src=$1#{WP_DIR}"),
         gulp.dest("#{FLATTIE}/"))

gulp.task("assets", ->
    assets = $.useref.assets()
    gulp.src("./src/php/*")
        .pipe(assets)
        .pipe($.if("*.js", minify_js()))
        .pipe($.if("*.css", minify_css()))
        .pipe(assets.restore())
        .pipe($.useref())
        .pipe($.if("*.php", replace_url()))
)

gulp.task("images", ->
    gulp.src(["./img/**", "!/**/Thumbs.db"])
        .pipe(gulp.dest("#{FLATTIE}/img/"))
)

gulp.task("fonts", ->
    gulp.src("./bower_components/**/fonts/*")
        .pipe($.flatten())
        .pipe(gulp.dest("#{FLATTIE}/fonts/"))
)

gulp.task("fancybox", ->
    gulp.src(["./bower_components/fancybox/source/*.*", "!**/*.js", "!**/*.css", "!**/Thumbs.db"])
        .pipe(gulp.dest("#{FLATTIE}/"))
)

gulp.task("default", (cb) -> run(["coffee", "sass"], ["assets", "fancybox", "images", "fonts"], cb))
