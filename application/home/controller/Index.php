<?php
namespace app\home\controller;

/**
* 首页
*/
class Index extends Base
{
	
	function index(){
		$data['str'] = 'Hello world!';
		$data['hash'] = gen_password('123123');
		return view('',$data);
	}
}