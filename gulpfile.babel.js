import gulp from "gulp";
import del from "del";
import browserify from "browserify";
import babelify from "babelify";
import source from "vinyl-source-stream";

const $ = require("gulp-load-plugins")();
const DIST  = process.env.FLATTIE_DIST || "./dist/";

gulp.task("clean", () =>
    del(["./dist/**"])
);

gulp.task("build:js", () =>
    browserify({ entries: ["./src/js/script.js"] })
        .transform(babelify)
        .bundle()
        .pipe(source("script.js"))
        .pipe(gulp.dest("./dev/js"))
);

gulp.task("build:css", () =>
    gulp.src("./src/scss/*.scss")
        .pipe($.sass({
            indentWidth: 4,
            outputStyle: "expanded",
            includePaths: [
                "./node_modules/bootstrap-sass/assets/stylesheets",
                "./node_modules/font-awesome/scss",
                "./node_modules/jquery-fancybox/source/scss",
            ],
        }))
        .pipe($.autoprefixer({ browsers: ["last 2 version"] }))
        .pipe(gulp.dest("./dev/css"))
);

gulp.task("minify:css", () =>
    gulp.src("./dev/css/*.css")
        .pipe($.csso())
        .pipe(gulp.dest(`${DIST}/`))
);

gulp.task("minify:js", () =>
    gulp.src("./dev/js/*.js")
        .pipe($.uglify({ preserveComments: "some" }))
        .pipe(gulp.dest(`${DIST}/js`))
);

gulp.task("theme", () =>
    gulp.src("./src/php/**/*")
        .pipe(gulp.dest(`${DIST}/`))
);

gulp.task("assets:img", () =>
    gulp.src("./node_modules/jquery-fancybox/source/img/*")
        .pipe(gulp.dest(`${DIST}/img/`))
);

gulp.task("assets:fonts", () =>
    gulp.src("./node_modules/font-awesome/fonts/*")
        .pipe(gulp.dest(`${DIST}/fonts/`))
);

gulp.task("default",
    gulp.series(
        gulp.parallel("build:js", "build:css", "theme", "assets:img", "assets:fonts"),
        gulp.parallel("minify:js", "minify:css")
    )
);
