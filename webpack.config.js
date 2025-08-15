const defaultConfig = require("@wordpress/scripts/config/webpack.config");

const MiniCssExtractPlugin = require("mini-css-extract-plugin");

module.exports = {
  ...defaultConfig,
  mode: "development",
  devtool: false,
  module: {
    rules: [
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          { loader: MiniCssExtractPlugin.loader },
          { loader: "css-loader", options: { sourceMap: true } },
          {
            loader: "sass-loader",
            options: {
              sassOptions: { outputStyle: "expanded", sourceMap: true },
            },
          },
        ],
      },
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: ["babel-loader"],
      },
    ],
  },
};
