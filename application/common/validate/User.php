<?php
namespace app\common\validate;

use think\Validate;

class User extends Validate
{
    protected $rule = [
        'user_id'  =>  'require|number',
        'nickname' =>  'length:2,45',
        'avatar' =>  'url',
        'user_Id' =>  'require|length:2,45',
    ];

    protected $message = [
        'user_id'  =>  'user_id 必须为数字',
        'nickname' =>  'nickname 值的长度必须为2到45位',
        'avatar' =>  'avatar 必须是 URL',
        'user_Id' =>  'user_Id 值的长度必须为2到45位',
    ];

    protected $scene = [
        'save'   =>  ['avatar','nickname'],
        'wx_login'   =>  ['nickname'],
        'login'   =>  ['user_Id'],
    ];
}