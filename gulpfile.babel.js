import gulp from "gulp";
import del from "del";
import lazypipe from "lazypipe";

const $ = require("gulp-load-plugins")();

const DIST  = process.env.FLATTIE_DIST || "./dist/";
const WP_CSS = "<?= get_stylesheet_uri(); ?>";
const WP_DIR = "<?= get_template_directory_uri(); ?>";

const WP_META = `
/*
Theme Name: Flattie
Description: Flat designed WordPress theme.
Author: Chitoku
Version: 1.1.0
*/
`;

gulp.task("clean", () =>
    del(["./dist/**/*"])
);

gulp.task("coffee", () =>
    gulp.src("./src/coffee/*.coffee")
        .pipe($.coffee({ bare: true }))
        .pipe(gulp.dest("./dev/js"))
);

gulp.task("sass", () =>
    gulp.src("./src/scss/*.scss")
        .pipe($.sass({
            indentWidth: 4,
            outputStyle: "expanded",
        }))
        .pipe(gulp.dest("./dev/css"))
);

gulp.task("assets", () =>
    gulp.src("./src/php/*")
        .pipe($.useref())
        .pipe($.if(
            "*.js",
            lazypipe()
                .pipe($.uglify, { preserveComments: "some" })
                .pipe($.flatten)
                .pipe(gulp.dest, `${DIST}/js`)()
        ))
        .pipe($.if(
            "*.css",
            lazypipe()
                .pipe($.csso)
                .pipe($.header, WP_META)
                .pipe($.flatten)
                .pipe(gulp.dest, `${DIST}/`)()
        ))
        .pipe($.if(
            "*.php",
            lazypipe()
                .pipe($.replace, /href=(.)\.\.\/\.\.\/dest\/.*\.css/g, `href=$1${WP_CSS}`)
                .pipe($.replace, /src=(.)\.\.\/\.\.\/dest/g, `src=$1${WP_DIR}`)
                .pipe(gulp.dest, `${DIST}/`)()
        ))
);

gulp.task("images", () =>
    gulp.src(["./img/**", "!/**/Thumbs.db"])
        .pipe(gulp.dest(`${DIST}/img/`))
);

gulp.task("editor_css", () =>
    gulp.src("./dev/css/editor.css")
        .pipe(gulp.dest(`${DIST}/`))
);

gulp.task("fonts", () =>
    gulp.src("./node_modules/**/fonts/*")
        .pipe($.flatten())
        .pipe(gulp.dest(`${DIST}/fonts/`))
);

gulp.task("fancybox", () =>
    gulp.src("./node_modules/jquery-fancybox/source/img/*")
        .pipe(gulp.dest(`${DIST}/img/`))
);

gulp.task("default",
    gulp.series(
        gulp.parallel("coffee", "sass"),
        gulp.parallel("assets", "fancybox", "images", "fonts", "editor_css")
    )
);
