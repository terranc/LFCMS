module.exports = {
  root: true,
  parserOptions: {
    sourceType: 'module'
  },
  // extends: 'airbnb-base',
  extends: 'standard',
  // required to lint *.vue files
  plugins: [
    'html'
  ],
  "env": {
    'browser': true,
    'jquery': true,
    'amd': true,    
    'node': true,
    'es6': true
  },
  // add your custom rules here
  'rules': {
    'semi': [2, "always", {"omitLastInOneLineBlock": true}],
    'comma-dangle': [2, "always-multiline"],
    'space-before-function-paren': 0,
    'space-unary-ops': 0,
    'no-multiple-empty-lines': [2, {'max': 2, 'maxEOF': 1 }],
    'import/no-unresolved': 0,
    'indent': [2, 2, { 'SwitchCase': 1, 'VariableDeclarator': {'var': 2, 'let': 2, 'const': 3} }],
    // 'no-console': [2, {allow: ['warn', 'error', 'log']}],
    'no-trailing-spaces': 0,  //可以在行末出现空格和tab
    // allow debugger during development
    'no-debugger': process.env.NODE_ENV === 'production' ? 2 : 0,
  }
}
