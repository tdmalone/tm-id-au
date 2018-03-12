
'use strict';

module.exports = {

  entry: [ './src/js/index.js', './src/sass/main.scss' ],

  output: {
    filename: 'bundle.js'
  },

  // @see https://github.com/webpack-contrib/sass-loader#examples
  module: {
    rules: [
      {
        test: /\.scss$/,
        use:[
          {
            loader: 'style-loader' // Creates style nodes from JS strings.
          },
          {
            loader: 'css-loader' // Translates CSS into CommonJS.
          },
          {
            loader: 'sass-loader' // Compiles Sass to CSS.
          }
        ]
      },
      {
        test: /\.svg$/,
        loader: 'svg-url-loader'
      }
    ]
  }

};
