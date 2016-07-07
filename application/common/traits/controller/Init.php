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

namespace app\common\traits\controller;

Trait Init
{
    use \traits\controller\Jump;
    public function run(){
        if(!defined("NOW_TIME")) define("NOW_TIME", $_SERVER['REQUEST_TIME']);

        if(config('site_close')){
            $this->result('',-403,'站点已经关闭，请稍后访问')->send();
        }
        $this->configInit();
    }
    protected function configInit($refresh = false){
    	if(cache('config') && $refresh == false && !config('app_debug')){
    		config(cache('config'));
    	}else{
    		config($this->configRefresh());
    	}
    }
	protected function configRefresh(){
        $data = cache('config');
        if(!$data || config('app_debug')){
            $data = logic('config')->lists();
            cache('config', $data);
        }
		return $data;
	}
}
