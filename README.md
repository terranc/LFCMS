# LFCMS

# LFCMS 1.0之前我们需要做的

@(Lookfeel)[LFCMS]

## Front
- [ ] 基于Bootstrap 3 + vue + vue-router 重构后台页面
> 现在：http://gonghui.tukeji.com/lfcms/kit

- [ ] 基于Vux设计一套前台UI Kit
> https://github.com/airyland/vux
> http://weui.github.io/weui/

- [ ] 前台页面基于Webpack 打包
- [ ] 通用文章详情页（包括留言）与微信自带样式保持一致
- [ ] 通用文章列表页
- [ ] 一个简单易配的route

## Server
- [ ] ThinkPHP 5.0 重构
- [ ] 整合Easy Wechat 
> https://easywechat.org/

- [ ] 基础通用模块
    - [ ] 用户管理
    - [ ] 评论管理
    - [ ] 文章管理
        - 可配置模块后台管理页模板
        - 可通过配置文件+数据扩展表来扩展成其他模块，如：下载、活动
    - [ ] 类别管理
    - [ ] 权限管理
- [ ] 通过Hook可以插件的形式扩展功能模块
- [ ] 全站前台均采用API接口方式搭建
