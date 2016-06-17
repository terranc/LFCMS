# LFCMS 前端项目实施方案（初稿）

目前该方案只是一个初步设想，随着更多的讨论和项目的推进可能会有较大改动。

## 编码规范

- [SCSS & HTML 编码规范](http://codeguide.bootcss.com/)
- [ES6 编码规范](https://github.com/yuche/javascript)
- [文案规范](http://open.leancloud.cn/copywriting-style-guide.html)

## 选型

- 视图层 vue 
 - [项目地址](https://github.com/vuejs/vue)
 - [文档地址](http://vuejs.org/)
- UI 组件 vux
 - [项目地址](https://github.com/airyland/vux)
 - [文档地址](https://vuxjs.gitbooks.io/vux/content/)
- 状态管理 vuex
 - [项目地址](https://github.com/vuejs/vuex)
 - [文档地址](http://vuex.vuejs.org/zh-cn/index.html)
- 路由 vue-router
 - [项目地址](https://github.com/vuejs/vue-router)
 - [文档地址](http://router.vuejs.org/zh-cn/index.html)
- 数据交换 vue-resource
 - [项目地址](https://github.com/vuejs/vue-resource)
 - [文档地址](https://github.com/vuejs/vue-resource/tree/master/docs)
- 构建工具 webpack
 - [项目地址](https://github.com/webpack/webpack)
 - [文档地址](https://webpack.github.io/docs/)
- 单元测试 mocha
 - [项目地址](https://github.com/mochajs/mocha)
 - [文档地址](http://mochajs.org/)
- 集成测试 nightwatch
 - [项目地址](https://github.com/nightwatchjs/nightwatch)
 - [文档地址](http://nightwatchjs.org/)
- 样式 scss
 - [文档地址](http://sass-lang.com/documentation/file.SASS_REFERENCE.html)

## 目录划分

<pre>
.
├── README.md           
├── index.html         // 项目入口文件
├── package.json       // 项目配置文件
├── build              // 构建脚本
├── src                // 生产目录
│   ├── assets         // 资源文件（样式，脚本，图片，字体）
│   ├── components     // 可复用的 VUE 组件
│   ├── pages          // 页面
│   ├── filters.js     // 过滤器
│   └── main.js        // Webpack 预编译入口，路由配置
├── static             // 构建好的文件
├── config             // 项目配置文件目录
├── test               // 测试文件目录
│   ├── e2e            // 端到端测试
│   └── unit           // 单元测试
</pre>

## 运行

``` bash
# 运行下面指令安装依赖
npm install

# 开发环境启动
npm run dev

# 构建项目
npm run build

# 运行单元测试
npm run unit

# 运行集成测试
npm run e2e

# 同时运行单元测试与集成测试
npm test
```

## 可参考项目

- [vue-cnode](https://github.com/shinygang/Vue-cnodejs)
- [vue-hackernews](https://github.com/vuejs/vue-hackernews)
