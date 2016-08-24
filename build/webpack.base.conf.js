var path = require('path')
var webpack = require('webpack')
var config = require('../config')
var utils = require('./utils')
var projectRoot = path.resolve(__dirname, '../')

module.exports = {
  entry: {
    'common': [path.resolve(projectRoot, './src/main.js')],
  },
  output: {
    path: config.build.assetsRoot,
    publicPath: config.build.assetsPublicPath,
    filename: '[name].js'
  },
  resolve: {
    extensions: ['', '.js', '.vue'],
    fallback: [path.join(__dirname, '../node_modules')],
    alias: {
      'src': path.resolve(__dirname, '../src'),
      'assets': path.resolve(__dirname, '../src/assets'),
      'libs': path.resolve(__dirname, '../src/assets/js/libs'),
      'components': path.resolve(__dirname, '../src/components'),
      'pages': path.resolve(__dirname, '../src/pages'),
      'vux-components': 'vux/src/components',
      'vue': 'vue/dist/vue.min',
      'vue-router': 'vue-router/dist/vue-router.min',
      'vue-resource': 'vue-resource/dist/vue-resource.min',
      'weui.js': 'weui.js/dist/weui.min',
      'lf-components': path.resolve(__dirname, '../src/components/lf-components'),
      'lf-vuex': path.resolve(__dirname, '../src/vuex'),
    }
  },
  resolveLoader: {
    fallback: [path.join(__dirname, '../node_modules')]
  },
  module: {
    preLoaders: [
      {
        test: /\.vue$/,
        loader: 'eslint',
        include: projectRoot,
        exclude: /node_modules/
      },
      {
        test: /\.js$/,
        loader: 'eslint',
        include: projectRoot,
        exclude: /node_modules/
      }
    ],
    loaders: [
      {
        test: /vux.src.*?js$/,
        loader: 'babel'
      },
      {
        test: require.resolve('jquery'),
        loader: 'imports'
      },
      {
        test: /\.vue$/,
        loader: 'vue'
      },
      {
        test: /\.js$/,
        loader: 'babel',
        include: projectRoot,
        exclude: /node_modules/
      },
      {
        test: /\.json$/,
        loader: 'json'
      },
      {
        test: /\.html$/,
        loader: 'vue-html'
      },
      {
        test: /\.(png|jpe?g|gif|svg)(\?.*)?$/,
        loader: 'url',
        query: {
          limit: 10000,
          name: utils.assetsPath('images/[name].[contenthash:6].[ext]')
        }
      },
      {
        test: /\.(woff2?|eot|ttf|otf)(\?.*)?$/,
        loader: 'url',
        query: {
          limit: 10000,
          name: utils.assetsPath('fonts/[name].[contenthash:6].[ext]')
        }
      }
    ]
  },
  externals: {
    // 'jquery': 'jQuery',
    // 'vue': 'Vue',
  },
  eslint: {
    formatter: require('eslint-friendly-formatter')
  },
  vue: {
    loaders: utils.cssLoaders()
  },
  plugins: [
    new webpack.ProvidePlugin({// 全局依赖jQuery,不需要import了  
      $ : "jquery",  
      jQuery : "jquery",  
      "window.jQuery" : "jquery"  
    })
  ]
}
