<?php
/**
 * Created by PhpStorm.
 * User: binwei
 * Date: 16/06/22
 * Time: 12:46
 */

namespace app\common\logic;


class User
{
    protected $wxUser;

    public function exist($openid)
    {
        $wx_users = db("auth_token")->where('openid', $openid)->select();
        if (count($wx_users)) {

            $this->wxUser = $wx_users[0];
            return true;
        }
        return false;
    }

    public function create($openid, $type, $access_token, $expires_in)
    {
        $data = ["create_time" => NOW_TIME];

        $user_id = db('user')->insertGetId($data);

        $data = ["openid" => $openid, "user_id" => $user_id,
            "access_token" => $access_token, "expires_in" => $expires_in,
            "type" => $type];
        db("auth_token")->insert($data);

        return $user_id;
    }

    public function login($type, $access_token, $expires_in)
    {
        $user_id = $this->wxUser["user_id"];
        $data = ["last_login_time" => NOW_TIME];
        db('user')->where("user_id", $user_id)->update($data);

        $data = ["access_token" => $access_token, "expires_in" => $expires_in,
            "type" => $type];
        db("auth_token")->where("user_id", $user_id)->update($data);
        return $user_id;
    }

    public function save($user_id = 0, $data)
    {

        if ($user_id == 0) {
            $user_id = db('user')->insertGetId($data);
        } else { // update

            db('user')->where('user_id', $user_id)->update($data);
        }

        return $this;
    }

    public function get($user_id)
    {
        return array_merge(db('user')->field(['password'], true)->find($user_id),
            db("auth_token")->field(['user_id', 'nickname'], true)
                ->where(['user_id' => $user_id])->find()
        );
    }
}