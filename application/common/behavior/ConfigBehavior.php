<?php
namespace common\behavior;
class ConfigBehavior{
	public function run(&$data){
        $this->configInit();
	}
    function configInit($refresh=false){
    	if(S('config') && $refresh == false && !APP_DEBUG){
    		C(S('config'));
    	}else{
    		C($this->configRefresh());
    	}
    }
	function configRefresh(){
        $data = S('config');
        if(!$data || APP_DEBUG){
            $data = API('Config')->lists();
            S('config', $data);
        }
		return $data;
	}
}