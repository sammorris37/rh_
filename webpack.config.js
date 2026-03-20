const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');

module.exports = {
  entry: './src/js/bundle.js',

  output: {
    path: path.resolve(__dirname, 'assets/dist'),
    filename: 'js/bundle.js',
    clean: true,
  },

  module: {
    rules: [
      {
        test: /\.css$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
        ],
      },
    ],
  },

  plugins: [
    new MiniCssExtractPlugin({
      filename: 'css/bundle.css',
    }),
  ],

  optimization: {
    minimizer: [
      '...', // keeps default JS minification
      new CssMinimizerPlugin(),
    ],
  },
};
