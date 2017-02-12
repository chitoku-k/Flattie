gulp    = require("gulp")
$       = require("gulp-load-plugins")()
run     = require("run-sequence")
pipe    = require("multipipe")

DIST    = process.env.FLATTIE_DIST || "./dist/"
WP_CSS  = "<?= get_stylesheet_uri(); ?>"
WP_DIR  = "<?= get_template_directory_uri(); ?>"

WP_META = """
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
        .pipe(gulp.dest("./dev/js"))
)

gulp.task("sass", ->
    gulp.src("./src/scss/*.scss")
        .pipe($.sass(
            indentWidth: 4
            outputStyle: "expanded"
        ))
        .pipe(gulp.dest("./dev/css"))
)

minify_js = ->
    pipe($.uglify(preserveComments: "some"),
         $.flatten(),
         gulp.dest("#{DIST}/js"))

minify_css = ->
    pipe($.csso(),
         $.header(WP_META),
         $.flatten(),
         gulp.dest("#{DIST}/"))

replace_url = ->
    pipe($.replace(/href=(.)\.\.\/\.\.\/dest\/.*\.css/g, "href=$1#{WP_CSS}"),
         $.replace(/src=(.)\.\.\/\.\.\/dest/g, "src=$1#{WP_DIR}"),
         gulp.dest("#{DIST}/"))

gulp.task("assets", ->
    gulp.src("./src/php/*")
        .pipe($.useref())
        .pipe($.if("*.js", minify_js()))
        .pipe($.if("*.css", minify_css()))
        .pipe($.if("*.php", replace_url()))
)

gulp.task("images", ->
    gulp.src(["./img/**", "!/**/Thumbs.db"])
        .pipe(gulp.dest("#{DIST}/img/"))
)

gulp.task("editor_css", ->
    gulp.src("./dev/css/editor.css")
        .pipe(gulp.dest("#{DIST}/"))
)

gulp.task("fonts", ->
    gulp.src("./bower_components/**/fonts/*")
        .pipe($.flatten())
        .pipe(gulp.dest("#{DIST}/fonts/"))
)

gulp.task("fancybox", ->
    gulp.src(["./bower_components/fancybox/source/*.*", "!**/*.js", "!**/*.css", "!**/Thumbs.db"])
        .pipe(gulp.dest("#{DIST}/"))
)

gulp.task("default", (cb) -> run(["coffee", "sass"], ["assets", "fancybox", "images", "fonts", "editor_css"], cb))
