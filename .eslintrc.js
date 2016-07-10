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
    'no-console': [2, {allow: ['warn', 'error', 'log']}],
    'max-len': [2, 9999], //有些插件在使用时会有不得已的需要长字符串定义一些内容
    'prefer-template': 0, //可以字符串连接
    'no-trailing-spaces': 0,  //可以在行末出现空格和tab
    'no-script-url': 0, //可以使用javascript:void(0)
    'no-empty': [2, {'allowEmptyCatch': true}],   //禁止空语句块。但catch可以除外
    'no-unused-vars': [2, {
      'vars': 'local',  //仅仅检测本作用域中声明的变量是否使用，允许不使用全局环境中的变量。
      'args': 'none', //不检测参数是否有被使用
    }],
    'no-shadow': 0, //允许局部变量与外部变量名相同
    'no-param-reassign': [2, {'props': false}],   //不可以对非对象参数重新赋值，但可以对对象的节点赋值
    'new-parens': 2,  //要求调用无参构造函数时带括号 
    'no-whitespace-before-property': 2, //禁止调用属性的属性名前有空白
    'one-var': 0, //可以多次let、var、const
    // allow debugger during development
    'no-debugger': process.env.NODE_ENV === 'production' ? 2 : 0
  }
}