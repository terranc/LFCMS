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

namespace app\api\controller;

class Base
{
    use \app\common\traits\controller\Init;
    function __construct(){
        $this->run();
        //支持jsonp
        if(input(config('var_jsonp_handler'))){
            config('default_return_type','jsonp');
        }
    }
}
