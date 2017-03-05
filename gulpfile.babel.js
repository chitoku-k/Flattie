import gulp from "gulp";
import del from "del";
import lazypipe from "lazypipe";

const $ = require("gulp-load-plugins")();
const DIST  = process.env.FLATTIE_DIST || "./dist/";
const WP_CSS = "<?= get_stylesheet_uri(); ?>";
const WP_DIR = "<?= get_template_directory_uri(); ?>";

gulp.task("clean", () =>
    del(["./dist/**/*"])
);

gulp.task("build", () =>
    gulp.src("./src/js/*.js")
        .pipe($.babel())
        .pipe(gulp.dest("./dev/js"))
);

gulp.task("sass", () =>
    gulp.src("./src/scss/*.scss")
        .pipe($.sass({
            indentWidth: 4,
            outputStyle: "expanded",
            includePaths: [
                "./node_modules/bootstrap/scss",
                "./node_modules/font-awesome/scss",
                "./node_modules/jquery-fancybox/source/scss",
            ],
        }))
        .pipe(gulp.dest("./dev/css"))
);

gulp.task("assets", () =>
    gulp.src("./src/php/**/*")
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

gulp.task("editor_css", () =>
    gulp.src("./dev/css/editor.css")
        .pipe(gulp.dest(`${DIST}/`))
);

gulp.task("fonts", () =>
    gulp.src("./node_modules/font-awesome/fonts/*")
        .pipe($.flatten())
        .pipe(gulp.dest(`${DIST}/fonts/`))
);

gulp.task("fancybox", () =>
    gulp.src("./node_modules/jquery-fancybox/source/img/*")
        .pipe(gulp.dest(`${DIST}/img/`))
);

gulp.task("default",
    gulp.series(
        gulp.parallel("build", "sass"),
        gulp.parallel("assets", "fancybox", "fonts", "editor_css")
    )
);
