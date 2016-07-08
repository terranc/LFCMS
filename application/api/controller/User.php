<?php
namespace app\api\controller;

use Overtrue\Socialite\SocialiteManager;

class User extends Base
{

    /**
     * 社会化登录url，默认wechat
     * todo: 可以返回api | redirect url.
     * @param string $type
     * @return \think\response\Redirect
     */
    public function socialite($type = "wechat")
    {
        $socialite = new SocialiteManager(config("socialite"));

        $response = $socialite->driver($type)->redirect();
        //return redirect(url("login", ["case" => "wechat","id"=>"o4Rtlw3Q_v47OlSoKxVXz4_6YdD4","nickname"=>"t00"],false));
        return $response->send();
    }

    /**
     * 登录接口
     * @param string $type
     * @param string $user_id
     * @param string $token
     * @param string $expires_in
     * @return \think\response\Json 返回一个本系统的token,后续接口调用都需带上
     */
    public function login($type = "", $user_id = "", $access_token = "", $expires_in = "")
    {
        if (empty($type) || !intval($user_id) || empty($access_token)) {
            return api_return(-505,'缺少参数');
        }

        $logic = logic('User');

        if ($logic->exist($user_id)) {

            $user_id = $logic->login($type, $access_token, $expires_in);
        } else {
            $user_id = $logic->create($user_id, $type, $access_token, $expires_in);
        }

        return api_return(1,'',array_merge(["token" => get_token($user_id)], $logic->get($user_id)));
    }


    /**
     * 社会化登录的转回url
     * @param string $type
     * @return \think\response\Json
     */
    public function callback($type = "wechat")
    {
        $socialite = new SocialiteManager(config("socialite"));

        $user = $socialite->driver($type)->user();
        /*
                $user->getId();        // 1472352
                $user->getNickname();  // "overtrue"
                $user->getName();      // "安正超"
                $user->getEmail();     // "anzhengchao@gmail.com"
        */

        return $this->login($type, $user->getId(), $user->getNickname(), $user->getAvatar());
    }
}
