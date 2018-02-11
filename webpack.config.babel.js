import webpack from "webpack";
import path from "path";
import autoprefixer from "autoprefixer";
import CleanPlugin from "clean-webpack-plugin";
import CopyPlugin from "copy-webpack-plugin";

const dist = process.env.FLATTIE_DIST || path.join(__dirname, "dist");
module.exports = {
    entry: {
        "js/main": path.join(__dirname, "src/js/main.js"),
        "js/editor": path.join(__dirname, "src/js/editor.js"),
    },
    output: {
        path: dist,
        filename: "[name].js",
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: "style-loader",
                    },
                    {
                        loader: "css-loader",
                        options: {
                            url: false,
                            minimize: {
                                reduceInitial: false,
                            },
                        },
                    },
                    {
                        loader: "postcss-loader",
                        options: {
                            plugins: () => [
                                autoprefixer({
                                    browsers: ["last 2 versions"],
                                }),
                            ],
                        },
                    },
                    {
                        loader: "sass-loader",
                        options: {
                            includePaths: [
                                path.join(__dirname, "node_modules/bootstrap-sass/assets/stylesheets"),
                                path.join(__dirname, "node_modules/font-awesome/scss"),
                                path.join(__dirname, "node_modules/jquery-fancybox/source/scss"),
                            ],
                        },
                    },
                ],
            },
            {
                test: /\.js$/,
                exclude: /node_modules/,
                enforce: "post",
                use: [
                    { loader: "babel-loader" },
                ],
            },
            {
                test: /\.(png|jpe?g|gif|woff2?|ttf|eot|svg)(\?v=[\d.]+|\?[\s\S]+)?$/,
                use: [
                    {
                        loader: "file-loader",
                        options: {
                            name: "[hash].[ext]",
                            outputPath: "assets/",
                        },
                    },
                ],
            },
        ],
    },
    resolve: {
        alias: {
            "jquery-fancybox": "jquery-fancybox/source/js/jquery.fancybox",
        },
    },
    plugins: [
        new webpack.optimize.UglifyJsPlugin({
            mangle: false,
            parallel: true,
            sourceMap: false,
            compress: {
                warnings: false,
            },
            uglifyOptions: {
                mangle: false,
            },
        }),
        new CleanPlugin(path.join(dist, "**")),
        new CopyPlugin([
            {
                from: path.join(__dirname, "src/php/**"),
                to: dist,
                context: "src/php",
            },
            {
                from: path.join(__dirname, "src/style.css"),
                to: dist,
                context: "src",
            },
        ]),
    ],
};
