const config = require("./config");
const del = require("del");
const webpack = require("webpack");
const { VueLoaderPlugin } = require("vue-loader");
const TerserPlugin = require("terser-webpack-plugin");

module.exports = async () => {
  await del(config.js.dest);

  const dropConsole = config.mode == "production" ? true : false;
  const webpackConfig = {
    cache: true,
    watch: false,
    mode: "production",
    entry: config.js.entry,
    output: {
      path: config.js.dest,
      filename: "[name].js",
    },
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          exclude: /node_modules\/(?!(dom7|ssr-window|swiper)\/).*/,
          use: ["babel-loader"] 
				},
				{
          test: /\.(frag|vert|glsl)$/,
          exclude: '/node_modules/',
          use: [
              'raw-loader',
              'glslify-loader'
          ]
      },
        {
          test: /\.css/,
          use: [
            {
              loader: "css-loader",
            },
          ],
        },
      ],
    },
    optimization: {
      minimize: true,
      minimizer: [
        new TerserPlugin({
          parallel: true,
          extractComments: false,
          // terserOptions: {
          // 	compress: {
          // 		drop_console: dropConsole
          // 	}
          // }
        }),
      ],
    },
    resolve: {
      extensions: [".js", ".json", ".jsx"],
    },
    // plugins: [new VueLoaderPlugin()],
    // performance: {
    //   hints: false,
    // },
  };

  if (config.mode != "production") {
    webpackConfig.devtool = "inline-source-map";
  }

  return webpackConfig;
};