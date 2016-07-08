<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$
return [
    'app_debug' => true,
    'app_status' => 'dev',  //dev:开发环境；留空:正式环境
    'extra_config_list'      => ['validate'],
    'extra_file_list'        => [THINK_PATH . 'helper' . EXT, APP_PATH . 'helper' . EXT],
	'default_module' => 'home',
    'root_namespace' => [],
    'url_route_on' => false,
    'log'          => [
        'type' => 'file', // 支持 socket trace file
        'path'=> LOG_PATH
    ],
    'url_common_param'       => false,
    'secret_key' => '(#(*^sdjkFS',
    'database' => [
        'type'        => 'mysql',
        // 数据库连接DSN配置
        'dsn'         => '',
        // 服务器地址
        'hostname'    => 'dev.lookfeel.co',
        // 数据库名
        'database'    => '',
        // 数据库用户名
        'username'    => '',
        // 数据库密码
        'password'    => '',
        // 数据库连接端口
        'hostport'    => '',
        // 数据库连接参数
        'params'      => [],
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库表前缀
        'prefix'      => 'sw_',
        // 数据库调试模式
        'debug'       => false,
        // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
        'deploy'      => 0,
        // 数据库读写是否分离 主从式有效
        'rw_separate' => false,
        // 读写分离后 主服务器数量
        'master_num'  => 1,
        // 指定从服务器序号
        'slave_no'    => '',
    ],
    'cache'  => [
        'type'   => 'Redis',
        'path'   => CACHE_PATH,
        'prefix' => 'sw_',
        'expire' => 0,
    ],
    'template'               => [
        // 模板引擎类型 支持 php think 支持扩展
        'type'         => 'Think',
        // 模板路径
        'view_path'    => '',
        // 模板后缀
        'view_suffix'  => 'html',
        // 模板文件名分隔符
        'view_depr'    => DS,
        // 模板引擎普通标签开始标记
        'tpl_begin'    => '{',
        // 模板引擎普通标签结束标记
        'tpl_end'      => '}',
        // 标签库标签开始标记
        'taglib_begin' => '{',
        // 标签库标签结束标记
        'taglib_end'   => '}',

        'layout_item'   =>  '{{__CONTENT__}}',
    ],
    'view_replace_str' => [
        '__PUBLIC__' => '/static',
        '__UPLOAD__' => '', //上传URL
        '__UPLOAD_PATH__' => '', //上传目录
        '__ROOT__' => '/',
        '__SELF__' => strip_tags($_SERVER['REQUEST_URI']),
    ],
    'dispatch_success_tmpl'  => APP_PATH . 'common/view/Public/dispatch_jump.html',
    'dispatch_error_tmpl'    => APP_PATH . 'common/view/Public/dispatch_jump.html',
    'default_return_type'=>'html',

    "socialite" => [
        'wechat' => [
            'client_id' => 'wxb583037a8eced61f',
            'client_secret' => '003518cb8a6a4dad9f930cb92458e84e',
            'redirect' => think\Request::instance()->domain() . '/api/index/callback/case/wechat',
        ],
    ],
    "easywechat"=>[
        // 前面的appid什么的也得保留哦
        'app_id' => 'xxxx',
        // ...

        // payment
        'payment' => [
            'merchant_id'        => 'your-mch-id',
            'key'                => 'key-for-signature',
            'cert_path'          => 'path/to/your/cert.pem', // XXX: 绝对路径！！！！
            'key_path'           => 'path/to/your/key',      // XXX: 绝对路径！！！！
            'notify_url'         => '默认的订单回调地址',       // 你也可以在下单时单独设置来想覆盖它
            // 'device_info'     => '013467007045764',
            // 'sub_app_id'      => '',
            // 'sub_merchant_id' => '',
            // ...
        ],
    ],
];
