const path = require('path');

module.exports = {
  mode: 'production',
  entry: './assets/webpack/compile.js',
  output: {
    filename: 'bundle.js',
    path: path.resolve(__dirname, 'assets/webpack'),
  },
  module: {
    rules: [
      {
        test: /\.(scss)$/,
        use: [{
          // inject CSS to page
          loader: 'style-loader'
        }, {
          // translates CSS into CommonJS modules
          loader: 'css-loader'
        }, 
        {
          // compiles Sass to CSS
          loader: 'sass-loader'
        }]
      },
      {
        test: /\.css$/i,
        use: ["style-loader", "css-loader"],
      },
      {
        test: /\.(woff|woff2|svg)$/,
        use: {
          loader: 'file-loader',
        },
      }
    ],
  },
};