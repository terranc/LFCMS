<?php
/**
 * 公共函数
 */
/*
 *  禁止浏览器cache
 */
function no_cache(){
	header("Expires: Mon, 26 Jul 1990 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
}
/*
 *  禁止显示debug信息
 */
function no_debug() {
	config([
		'SHOW_RUN_TIME' => false, // 运行时间显示
		'SHOW_ADV_TIME' => false, // 显示详细的运行时间
		'SHOW_DB_TIMES' => false, // 显示数据库查询和写入次数
		'SHOW_CACHE_TIMES' => false, // 显示缓存操作次数
		'SHOW_USE_MEM' => false, // 显示内存开销
		'SHOW_PAGE_TRACE' => false, // 显示页面Trace信息 由Trace文件定义和Action操作赋值
	]);
}
/**
 * 快速打印调试&结束
 */
function pe($a){
	if(input('request.debug')){
		cookie('debug', input('request.debug'));
	}
	if(config('app_debug') || cookie('debug') || $_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
		dump($a);
		exit;
	}
}
//密码生成
function gen_password($password=''){
	$hash_password = \think\helper\Hash::make($password);
	return $hash_password;
}
/**
 * 密钥验证
 * @param  string $password     密码明文
 * @param  string $hashpassword 比对Hash值
 * @return bool
 */
function check_password($password='', $hashpassword=''){
	return \think\helper\Hash::check($password, $hashpassword);
}

//生成一个订单号
function order_maker(){
	$year_code = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
	return $year_code[intval(date('Y')) - 2010] .
			strtoupper(dechex(date('m'))) . date('d') .
			substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%d', rand(0, 99));
}
// \think\Route::bind('api');
function logic($controller=''){
	return controller('common/' . $controller, 'logic');
}
/**
 * 分段打印
 */
function hp($a){
	echo('<!--');
	dump($a);
	echo('-->');
}

function api_return($code = 0, $message = '', $data = null)
{
    if (is_array($code)) {
        return array(
            'code' => $code['code'],
            'message' => $code['message'],
            'data' => is_int($code['data']) ? intval($code['data']) : (is_float($code['data']) ? floatval($code['data']) : $code['data']),
        );
    } else {
        return array(
            'code' => $code,
            'message' => $message,
            'data' => is_int($data) ? intval($data) : (is_float($data) ? floatval($data) : $data),
        );
    }
}