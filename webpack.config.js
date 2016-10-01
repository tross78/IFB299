var webpack = require('webpack');
//entry: ["./webroot/js/entry.js", "./webroot/js/jquery.min.js", "./webroot/js/bootstrap.min.js"],
module.exports = {
  entry: ["./webroot/js/entry.js"],
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