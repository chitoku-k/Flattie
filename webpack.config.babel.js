import webpack from "webpack";
import path from "path";
import autoprefixer from "autoprefixer";
import CleanPlugin from "clean-webpack-plugin";
import CopyPlugin from "copy-webpack-plugin";

module.exports = {
    mode: "production",
    entry: {
        "js/main": path.join(__dirname, "src/js/main.js"),
        "js/editor": path.join(__dirname, "src/js/editor.js"),
    },
    output: {
        path: path.join(__dirname, "dist"),
        filename: "[name].js",
    },
    module: {
        rules: [
            {
                test: /\.css$/,
                use: [
                    {
                        loader: "style-loader",
                    },
                    {
                        loader: "css-loader",
                        options: {
                            minimize: {
                                reduceInitial: false,
                            },
                        },
                    },
                ],
            },
            {
                test: /\.scss$/,
                use: [
                    {
                        loader: "style-loader",
                    },
                    {
                        loader: "css-loader",
                        options: {
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
                            publicPath: process.env.FLATTIE_PATH + "assets/" || "/assets/",
                        },
                    },
                ],
            },
        ],
    },
    resolve: {
        alias: {
            "jquery": "jquery/src/jquery",
            "jquery-fancybox": "jquery-fancybox/source/js/jquery.fancybox",
        },
    },
    plugins: [
        new CleanPlugin(path.join(__dirname, "dist", "**")),
        new CopyPlugin([
            {
                from: path.join(__dirname, "src/php/**"),
                to: path.join(__dirname, "dist"),
                context: "src/php",
            },
            {
                from: path.join(__dirname, "src/style.css"),
                to: path.join(__dirname, "dist"),
                context: "src",
            },
        ]),
    ],
};
