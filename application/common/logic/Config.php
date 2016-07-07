<?php
/**
 *    ConfigApi.class.php
 *    Api of addon.
 *    @author     terranc <[terran.chao@qq.com]>
 *    @version    141203:2
 */
// namespace 
namespace app\common\logic;
/**
 *    class ConfigApi
 */
class Config {
    /**
     * 获取数据库中的配置列表
     * @return array 配置数组
     */
    public static function lists(){
        $map    = array('status' => 1);
        $data   = db('config')->where($map)->field('type,name,value')->select();
        $config = array();
        if($data && is_array($data)){
            foreach ($data as $value) {
                $config[strtolower($value['name'])] = self::parse($value['type'], $value['value']);
            }
        }
        return $config;
    }

    
    /**
     * 根据配置类型解析配置
     * @param  integer $type  配置类型
     * @param  string  $value 配置值
     */
    public static function parse($type='', $value=''){
        switch ($type) {
            case 2: //解析数组
                $array = preg_split('/[;\r\n]+/', trim($value, ";\r\n"));
                if(strpos($value,':')){
                    $value  = array();
                    foreach ($array as $val) {
                        list($k, $v) = explode(':', $val);
                        $v = explode('|||', $v);
                        if(count($v) > 1){
                            $value[strtolower($k)] = $v;
                        }else{
                            $value[strtolower($k)]   = $v[0];
                        }
                    }
                }else{
                    $value =    $array;
                }
                break;
        }
        return $value;
    } 
}

?>