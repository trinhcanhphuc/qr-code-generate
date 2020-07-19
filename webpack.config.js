const PurifyCSSPlugin = require('purifycss-webpack')
const path = require('path')
const glob = require('glob-all')
const ExtractTextPlugin = require('extract-text-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
var tailwindcss = require('tailwindcss');

module.exports = {
  entry: './src/css/main.css',
  mode: process.env.NODE_ENV || 'development',
  module: {
    rules: [
      {
        test: /\.css$/,
        use: ExtractTextPlugin.extract({
          fallback: 'style-loader',
          use: [
            { loader: 'css-loader', options: { importLoaders: 1 } },
            'postcss-loader',
          ],
        }),
      },
    ],
  },
  output: {
    path: path.resolve(__dirname, 'web/css'),
  },
  plugins: [
    new ExtractTextPlugin('app.bundle.css'),
    new PurifyCSSPlugin({
      paths: glob.sync([
          path.join(__dirname, 'web/index.html')
      ]),
      minimize: true,
      purifyOptions: {
          whitelist: []
      }
    })
  ],
  devtool: false,
  performance: { hints: false }
}