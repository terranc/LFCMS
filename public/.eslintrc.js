module.exports = {
  root: true,
  parserOptions: {
    sourceType: 'module'
  },
  extends: 'airbnb-base',
  // required to lint *.vue files
  plugins: [
    'html'
  ],
  "env": {
    'browser': true,
    'jquery': true,
    'amd': true,
  },
  // add your custom rules here
  'rules': {
    'import/no-unresolved': 0,
    'max-len': ['error', 9999], //有些插件在使用时会有不得已的需要长字符串定义一些内容
    // "requireDollarBeforejQueryAssignment": false,
    // allow debugger during development
    'no-debugger': process.env.NODE_ENV === 'production' ? 2 : 0
  }
}
