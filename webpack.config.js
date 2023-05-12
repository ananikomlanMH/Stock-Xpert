const path = require('path')
const TerserPlugin = require("terser-webpack-plugin");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const {WebpackManifestPlugin} = require('webpack-manifest-plugin');
const {CleanWebpackPlugin} = require("clean-webpack-plugin");
const { WebpackLaravelMixManifest } = require('webpack-laravel-mix-manifest');

const dev = process.env.NODE_ENV === "dev"

const cssLoaders = [
    // Creates `style` nodes from JS strings
    dev ? "style-loader" : MiniCssExtractPlugin.loader,

    // Translates CSS into CommonJS
    {
        loader: "css-loader",
        options: {importLoaders: 1},
    },
    {
        loader: "postcss-loader",
        options: {
            postcssOptions: {
                plugins: [
                    [
                        "postcss-preset-env",
                        {
                            // Options
                        },
                    ],
                ],
            },
        },
    },
]

let config_webpack = {
    mode: "development",
    entry: {
        app: ['./public/vendors/css/app.css', './resources/js/src/app.js']
    },
    watch: dev,
    output: {
        path: path.resolve(__dirname, "public/vendors/dist"),
        publicPath: path.resolve(__dirname, "public/vendors/js/dist"),
        filename: dev ? '[name].js' : '[name].[chunkhash:8].js',
        clean: true,
    },
    devtool: dev ? "cheap-module-source-map" : "source-map",
    module: {
        rules: [
            {
                test: /\.js$/,
                exclude: /node_modules/,
                use: ["babel-loader"]
            },
            {
                test: /\.css$/i,
                use: cssLoaders
            },
            {
                test: /\.s[ac]ss$/i,
                use: [
                    ...cssLoaders,
                    // Compiles Sass to CSS
                    "sass-loader",
                ],
            },
            {
                test: /\.(png|jpe?g|gif|svg)$/i,
                type: 'asset',
                parser: {
                    dataUrlCondition: {
                        maxSize: 10 * 1024 // 10kb
                    }
                },
                generator: {
                    filename: 'images/[hash][ext][query]'
                }
            }
        ]
    },
    optimization: {
        minimize: !dev,
        minimizer: [
            new TerserPlugin({
                terserOptions: {
                    sourceMap: true,
                },
            }),
            new CssMinimizerPlugin(),
        ],
    },
    plugins: []
}

config_webpack.plugins.push(new MiniCssExtractPlugin({
    filename: dev ? '[name].css' : '[name].[contenthash:8].css',
}))

if (!dev) {
    config_webpack.plugins.push(new WebpackManifestPlugin({
        publicPath: "",
        // fileName: path.resolve(__dirname, 'public/manifest.json'),
    }))

    config_webpack.plugins.push(new CleanWebpackPlugin({
        dry: true,
        verbose: true,
    }))
}

module.exports = config_webpack
