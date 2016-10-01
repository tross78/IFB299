var webpack = require('webpack');

module.exports = {
  entry: ["./webroot/js/jquery.min.js", "./webroot/js/bootstrap.min.js"],
  output: {
    filename: "./webroot/js/bundle.js"
  },
  plugins: [
        new webpack.ProvidePlugin({
           $: "./jquery.min.js",
           jQuery: "./jquery.min.js"
       })
    ]
}