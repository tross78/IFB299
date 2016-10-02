var path = require('path');
var webpack = require('webpack');
//entry: ["./webroot/js/entry.js", "./webroot/js/jquery.min.js", "./webroot/js/bootstrap.min.js"],
module.exports = {
  entry: ["./webroot/js/entry.js"],
  output: {
    filename: "./webroot/js/bundle.js"
  },
  module: {
         loaders: [
             {
                 test: /\.js$/,
                 loader: 'babel-loader',
                 query: {
                     presets: ['es2015', 'react']
                 }
             }
         ]
     },
  plugins: [
    //  new webpack.DefinePlugin({
    //   // A common mistake is not stringifying the "production" string.
    //   'process.env.NODE_ENV': JSON.stringify('production')
    // }),
    // new webpack.optimize.UglifyJsPlugin({
    //   compress: {
    //     warnings: false
    //   }
    // }),
        new webpack.ProvidePlugin({
           $: "./jquery.min.js",
           jQuery: "./jquery.min.js"
       })
    ]
}