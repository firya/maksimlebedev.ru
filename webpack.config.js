const webpack = require('webpack');
const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const SpriteLoaderPlugin = require('svg-sprite-loader/plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const historyApiFallback = require('connect-history-api-fallback');
const postcssPresetEnv = require('postcss-preset-env');
const postcssImport = require('postcss-import');

module.exports = {
  entry: [
    './src/js/scripts.js',
    './src/css/styles.css'
  ],
  output: {
    publicPath: `/`,
    path: path.resolve(__dirname, `theme/`),
    filename: 'js/scripts.js',
  },
  module: {
    rules: [
      {
        test: /\.(js|jsx)?$/,
        exclude: /(node_modules|bower_components)/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env', "@babel/preset-react"],
            plugins: [
              [
                "@babel/plugin-proposal-decorators",
                { legacy: true }
              ],
              [
                "@babel/plugin-proposal-class-properties",
                {
                  decoratorsBeforeExport: false,
                  legacy: true
                }
              ]

            ]
          }
        }
      },
      {
        test: /\.css$/,
        include: path.resolve(__dirname, "src"),
        use: [
          {
            loader: MiniCssExtractPlugin.loader,
            options: {}
          },
          {
            loader: "css-loader",
            options: {
              sourceMap: true,
              url: false
            }
          },
          {
            loader: "postcss-loader",
            options: {
              ident: "postcss",
              sourceMap: true,
              plugins: () => [
                postcssImport(),
                postcssPresetEnv({
                  browsers: 'last 2 versions',
                  features: {
                    'nesting-rules': true
                  },
                }),
                require("cssnano")({
                  preset: [
                    "default",
                    {
                      discardComments: {
                        removeAll: true
                      }
                    }
                  ]
                })
              ]
            }
          }
        ]
      }, {
        test: /\.svg$/,
        use: [
          {
            loader: 'svg-sprite-loader',
            options: {
              extract: true,
              spriteFilename: 'images/icons.svg', // this is the destination of your sprite sheet
            }
          },
          {
            loader: 'svgo-loader',
            options: {
              plugins: [
                { removeViewBox: false },
                { cleanupIDs: false },
                { removeTitle: true },
                { removeUselessStrokeAndFill: true },
                { removeAttrs: { attrs: ['fill', 'stroke'] } }
              ]
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "css/styles.css",
    }),
    new SpriteLoaderPlugin({
      plainSprite: true
    })
  ],
  watchOptions: {
    ignored: ['node_modules']
  }
};
