import webpack from "webpack";
import path from "path";
import autoprefixer from "autoprefixer";
import ExtractTextWebpackPlugin from "extract-text-webpack-plugin";
import CleanWebpackPlugin from "clean-webpack-plugin";
import CopyWebpackPlugin from "copy-webpack-plugin";

const dist = process.env.FLATTIE_DIST || path.join(__dirname, "dist");
module.exports = {
    entry: {
        main: path.join(__dirname, "src/js/main.js"),
        editor: path.join(__dirname, "src/js/editor.js"),
    },
    output: {
        path: dist,
        filename: "js/[name].js",
    },
    module: {
        rules: [
            {
                test: /\.scss$/,
                use: ExtractTextWebpackPlugin.extract({
                    fallback: "style-loader",
                    use: [
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
                }),
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
    externals: {
        "jquery": "jQuery",
    },
    plugins: [
        new webpack.optimize.UglifyJsPlugin(),
        new ExtractTextWebpackPlugin({
            filename: getPath => getPath("[name].css").replace(/main\.css$/, "style.css"),
        }),
        new CleanWebpackPlugin(path.join(dist, "**/*")),
        new CopyWebpackPlugin([
            {
                from: path.join(__dirname, "src/php/**/*"),
                to: dist,
                context: "src/php",
            },
        ]),
    ],
};
