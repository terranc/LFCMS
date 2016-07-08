<?php

/**
 * 友好的时间显示
 *
 * @param int    $sTime 待显示的时间
 * @param string $type  类型. normal | mohu | full | ymd | other
 * @return string
 */
function friendly_date($sTime=0, $type = 'normal', $default='-') {
	if(!$sTime) return $default;
	//sTime=源时间，cTime=当前时间，dTime=时间差
	$cTime = time();
	$dTime = $cTime - $sTime;
	//$dDay     =   intval(date("Ymd",$cTime)) - intval(date("Ymd",$sTime));
	$dDay = $dTime / 3600 / 24;
	$dYear = intval(date("Y", $cTime)) - intval(date("Y", $sTime));
	//normal：n秒前，n分钟前，n小时前，日期
	if ($type == 'normal') {
		if ($dTime < 0) {
			if ($dYear == 0) {
				return date("m月d日 H:i", $sTime);
			} else {
				return date("Y-m-d H:i", $sTime);
			}
		}
		if ($dTime < 3) {
			return "刚刚";
		}elseif ($dTime < 60) {
			return $dTime . "秒前";
		} elseif ($dTime < 3600) {
			return intval($dTime / 60) . "分钟前";
		} elseif ($dTime >= 3600 && $dDay == 0) {
			//return intval($dTime/3600)."小时前";
			return '今天' . date('H:i', $sTime);
		} elseif ($dYear == 0) {
			return date("m月d日 H:i", $sTime);
		} else {
			return date("Y-m-d H:i", $sTime);
		}
	} elseif ($type == 'short_date') {
	   if ($dYear == 0) {
			return date("m-d", $sTime);
		} else {
			return date("Y-m-d", $sTime);
		}
	} elseif ($type == 'mohu') {
		if ($dTime < 0) {
			return date("未来", $sTime);
		}
		if ($dTime < 3) {
			return "刚刚";
		}elseif ($dTime < 60) {
			return $dTime . "秒前";
		} elseif ($dTime < 3600) {
			return intval($dTime / 60) . "分钟前";
		} elseif ($dTime >= 3600 && $dDay == 0) {
			return intval($dTime / 3600) . "小时前";
		} elseif ($dDay > 0 && $dDay <= 7) {
			return intval($dDay) . "天前";
		} elseif ($dDay > 7 && $dDay <= 30) {
			return ceil($dDay / 7) . '周前';
		} elseif ($dDay > 30 && $dYear < 1) {
			return ceil($dDay / 30) . '个月前';
		}else if($$dYear > 0){
			return $dYear . '年前';
		}
		//full: Y-m-d , H:i:s
	} elseif ($type == 'full') {
		return date("Y-m-d H:i:s", $sTime);
	} elseif ($type == 'ymd') {
		return date("Y-m-d", $sTime);
	} elseif ($type == 'chinese') {
		if ($dYear == 0) {
			return date("m月d日", $sTime);
		}else{
			return date("Y年m月d日", $sTime);
		}
	} else {
		return date($type, $sTime);
	}
}

//计算时间间隔
function datediff($part, $begin, $end) {
	$diff = $end - $begin;
	switch ($part) {
		case "y":
			$retval = bcdiv($diff, (60 * 60 * 24 * 365), 0);
			break;
		case "m":
			$retval = bcdiv($diff, (60 * 60 * 24 * 30), 0);
			break;
		case "w":
			$retval = bcdiv($diff, (60 * 60 * 24 * 7), 0);
			break;
		case "d":
			$retval = bcdiv($diff, (60 * 60 * 24), 0);
			break;
		case "h":
			$retval = bcdiv($diff, (60 * 60), 0);
			break;
		case "n":
			$retval = bcdiv($diff, 60, 0);
			break;
		case "s":
			$retval = $diff;
			break;
	}
	return round($retval);
}
//时间计算
function dateadd($part, $number, $date) {
	$date_array = getdate(strtotime($date));
	$hor = $date_array["hours"];
	$min = $date_array["minutes"];
	$sec = $date_array["seconds"];
	$mon = $date_array["mon"];
	$day = $date_array["mday"];
	$yar = $date_array["year"];

	switch ($part) {
		case "y":
			$yar+= $number;
			break;
		case "q":
			$mon+= ($number * 3);
			break;
		case "m":
			$mon+= $number;
			break;
		case "w":
			$day+= ($number * 7);
			break;
		case "d":
			$day+= $number;
			break;
		case "h":
			$hor+= $number;
			break;
		case "n":
			$min+= $number;
			break;
		case "s":
			$sec+= $number;
			break;
	}
	return date("Y-m-d H:i:s", mktime($hor, $min, $sec, $mon, $day, $yar));
}


function get_zodiac($date){
	if (strstr ( $date, '-' ) === false && strlen ( $date ) !== 8)
		$date = date ( "Y-m-d", $date );
	if (strlen ( $date ) === 8) {
		if (eregi ( '([0-9]{4})([0-9]{2})([0-9]{2})$', $date, $bir ))
			$date = "{$bir[1]}-{$bir[2]}-{$bir[3]}";
	}
	if (strlen ( $date ) < 8)
		return false;
	$tmpstr = explode ( '-', $date );
	if (count ( $tmpstr ) !== 3)
		return false;
	$month =substr($date,5,2); //取出月份
	$day   =substr($date,8,2); //取出日期
	$y = ( int ) $tmpstr [0];
	$m = ( int ) $tmpstr [1];
	$d = ( int ) $tmpstr [2];
	$result = array ();
	$xzdict = array ('摩羯', '宝瓶', '双鱼', '白羊', '金牛', '双子', '巨蟹', '狮子', '处女', '天秤', '天蝎', '射手' );
	$zone = array (1222, 122, 222, 321, 421, 522, 622, 722, 822, 922, 1022, 1122, 1222 );
	if ((100 * $m + $d) >= $zone [0] || (100 * $m + $d) < $zone [1]) {
		$i = 0;
	} else {
		for($i = 1; $i < 12; $i ++) {
			if ((100 * $m + $d) >= $zone [$i] && (100 * $m + $d) < $zone [$i + 1])
				break;
		}
	}
	$result ['xz'] = $xzdict [$i] . '座';
	$gzdict = array (array ('甲', '乙', '丙', '丁', '戊', '己', '庚', '辛', '壬', '癸' ), array ('子', '丑', '寅', '卯', '辰', '巳', '午', '未', '申', '酉', '戌', '亥' ) );
	$i = $y - 1900 + 36;
	$result ['gz'] = $gzdict [0] [($i % 10)] . $gzdict [1] [($i % 12)];

	$sxdict = array ('鼠', '牛', '虎', '兔', '龙', '蛇', '马', '羊', '猴', '鸡', '狗', '猪' );
	$result ['sx'] = $sxdict [(($y - 4) % 12)];
	return $result;
}

/**作用：统计字符长度包括中文、英文、数字
 * 参数：需要进行统计的字符串、编码格式目前系统统一使用UTF-8
 * 时间：2009-07-15
 * 修改记录:
		 $str = "kds";
		echo sstrlen($str,'utf-8');
 * */
 function mbstrlen($str) {
	return ceil((strlen($str) + mb_strlen($str,"UTF8")) / 2);
}

function cutstr($string, $length, $dot = '...') {
	if(mbstrlen($string) <= $length) {
		return $string;
	}
	$pre = chr(1);
	$end = chr(1);
	$string = str_replace(array('&amp;', '&quot;', '&lt;', '&gt;'), array($pre.'&'.$end, $pre.'"'.$end, $pre.'<'.$end, $pre.'>'.$end), $string);

	$strcut = '';
	$n = $tn = $noc = 0;
	while($n < strlen($string)) {

		$t = ord($string[$n]);
		if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
			$tn = 1; $n++; $noc++;
		} elseif(194 <= $t && $t <= 223) {
			$tn = 2; $n += 2; $noc += 2;
		} elseif(224 <= $t && $t <= 239) {
			$tn = 3; $n += 3; $noc += 2;
		} elseif(240 <= $t && $t <= 247) {
			$tn = 4; $n += 4; $noc += 2;
		} elseif(248 <= $t && $t <= 251) {
			$tn = 5; $n += 5; $noc += 2;
		} elseif($t == 252 || $t == 253) {
			$tn = 6; $n += 6; $noc += 2;
		} else {
			$n++;
		}
		if($noc >= $length) {
			break;
		}
	}
	if($noc > $length) {
		$n -= $tn;
	}
	$strcut = substr($string, 0, $n);
	$strcut = str_replace(array($pre.'&'.$end, $pre.'"'.$end, $pre.'<'.$end, $pre.'>'.$end), array('&amp;', '&quot;', '&lt;', '&gt;'), $strcut);

	$pos = strrpos($strcut, chr(1));
	if($pos !== false) {
		$strcut = substr($strcut,0,$pos);
	}
	return $strcut.$dot;
}
/**
 * 获取同名键值的所有元素（支持二维数组)
 */
function array_get_by_key($array, $key){
	if (!trim($key)) return false;
	preg_match_all("/\"" . $key . "\";\w{1}:(?:\d+:|)\"?(.*?)\"?;/", serialize($array), $res);
	return $res[1];
}
//根据IP获取位置
function get_ip_place($ip){
	$ret = file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=" . $ip);
	return json_decode($ret, true);
}

//删除xss
function remove_xss($val) {
   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
   // this prevents some character re-spacing such as <java\0script>
   // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);

   // straight replacements, the user should never need these since they're normal characters
   // this prevents like <IMG SRC=@avascript:alert('XSS')>
   $search = 'abcdefghijklmnopqrstuvwxyz';
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $search .= '1234567890!@#$%^&*()';
   $search .= '~`";:?+/={}[]-_|\'\\';
   for ($i = 0; $i < strlen($search); $i++) {
      // ;? matches the ;, which is optional
      // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

      // @ @ search for the hex values
      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
      // @ @ 0{0,7} matches '0' zero to seven times
      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
   }

   // now the only remaining whitespace attacks are \t, \n, and \r
   $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
   $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
   $ra = array_merge($ra1, $ra2);

   $found = true; // keep replacing as long as the previous round replaced something
   while ($found == true) {
      $val_before = $val;
      for ($i = 0; $i < sizeof($ra); $i++) {
         $pattern = '/';
         for ($j = 0; $j < strlen($ra[$i]); $j++) {
            if ($j > 0) {
               $pattern .= '(';
               $pattern .= '(&#[xX]0{0,8}([9ab]);)';
               $pattern .= '|';
               $pattern .= '|(&#0{0,8}([9|10|13]);)';
               $pattern .= ')*';
            }
            $pattern .= $ra[$i][$j];
         }
         $pattern .= '/i';
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
         if ($val_before == $val) {
            // no replacements were made, so exit the loop
            $found = false;
         }
      }
   }
   return $val;
}

/**
 * 把返回的数据集转换成Tree
 * @param array $list 要转换的数据集
 * @param string $pid parent标记字段
 * @param string $level level标记字段
 * @return array
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function list_to_tree($list, $pk='id', $parent_id = 'parent_id', $child = '_child', $root = 0) {
    // 创建Tree
    $tree = array();
    if(is_array($list)) {
        // 创建基于主键的数组引用
        $refer = array();
        foreach ($list as $key => $data) {
            $refer[$data[$pk]] =& $list[$key];
        }
        foreach ($list as $key => $data) {
            // 判断是否存在parent
            $parentId =  $data[$parent_id];
            if ($root == $parentId) {
                $tree[] =& $list[$key];
            }else{
                if (isset($refer[$parentId])) {
                    $parent =& $refer[$parentId];
                    $parent[$child][] =& $list[$key];
                }
            }
        }
    }
    return $tree;
}

/**
 * 对查询结果集进行排序
 * @access public
 * @param array $list 查询结果
 * @param string $field 排序的字段名
 * @param array $sortby 排序类型
 * asc正向排序 desc逆向排序 nat自然排序
 * @return array
 */
function list_sort_by($list,$field, $sortby='asc') {
   if(is_array($list)){
       $refer = $resultSet = array();
       foreach ($list as $i => $data)
           $refer[$i] = &$data[$field];
       switch ($sortby) {
           case 'asc': // 正向排序
                asort($refer);
                break;
           case 'desc':// 逆向排序
                arsort($refer);
                break;
           case 'nat': // 自然排序
                natcasesort($refer);
                break;
       }
       foreach ( $refer as $key=> $val)
           $resultSet[] = &$list[$key];
       return $resultSet;
   }
   return false;
}

/**
 * 在数据列表中搜索
 * @access public
 * @param array $list 数据列表
 * @param mixed $condition 查询条件
 * 支持 array('name'=>$value) 或者 name=$value
 * @return array
 */
function list_search($list,$condition) {
    if(is_string($condition))
        parse_str($condition,$condition);
    // 返回的结果集合
    $resultSet = array();
    foreach ($list as $key=>$data){
        $find   =   false;
        foreach ($condition as $field=>$value){
            if(isset($data[$field])) {
                if(0 === strpos($value,'/')) {
                    $find   =   preg_match($value,$data[$field]);
                }elseif($data[$field]==$value){
                    $find = true;
                }
            }
        }
        if($find)
            $resultSet[]     =   &$list[$key];
    }
    return $resultSet;
}
//输出安全的html
function html($text, $tags = null) {
	$text = trim($text);
	//完全过滤注释
	$text = preg_replace('/<!--?.*-->/','',$text);
	//完全过滤动态代码
	$text = preg_replace('/<\?|\?'.'>/','',$text);
	//完全过滤js
	$text = preg_replace('/<script?.*\/script>/','',$text);

	$text = str_replace('[','&#091;',$text);
	$text = str_replace(']','&#093;',$text);
	$text = str_replace('|','&#124;',$text);
	//过滤换行符
	$text = preg_replace('/\r?\n/','',$text);
	//br
	$text = preg_replace('/<br(\s\/)?'.'>/i','[br]',$text);
	$text = preg_replace('/(\[br\]\s*){10,}/i','[br]',$text);
	$text = preg_replace('/<p(\s\/)?'.'>/i','[br]',$text);
	//过滤危险的属性，如：过滤on事件lang js
	while(preg_match('/(<[^><]+)( lang|on|action|background|codebase|dynsrc|lowsrc)[^><]+/i',$text,$mat)){
		$text=str_replace($mat[0],$mat[1],$text);
	}
	while(preg_match('/(<[^><]+)(window\.|javascript:|js:|about:|file:|document\.|vbs:|cookie)([^><]*)/i',$text,$mat)){
		$text=str_replace($mat[0],$mat[1].$mat[3],$text);
	}
	if(empty($tags)) {
		$tags = 'table|td|th|tr|i|b|u|strong|img|p|br|div|strong|em|ul|ol|li|dl|dd|dt|a';
	}
	//允许的HTML标签
	$text = preg_replace('/<('.$tags.')( [^><\[\]]*)?>/i','[\1\2]',$text);
	$text = preg_replace('/<\/('.$tags.')>/Ui','[/\1]',$text);
	//过滤多余html
	$text = preg_replace('/<\/?(html|head|meta|link|base|basefont|body|bgsound|title|style|script|form|iframe|frame|frameset|applet|id|ilayer|layer|name|script|style|xml)[^><]*>/i','',$text);
	//过滤合法的html标签
	while(preg_match('/<([a-z]+)[^><\[\]]*>[^><]*<\/\1>/i',$text,$mat)){
	$text=str_replace($mat[0],str_replace('>',']',str_replace('<','[',$mat[0])),$text);
	}
	//转换引号
	while(preg_match('/(\[[^\[\]]*=\s*)(\"|\')([^\2=\[\]]+)\2([^\[\]]*\])/i',$text,$mat)){
		$text=str_replace($mat[0],$mat[1].'|'.$mat[3].'|'.$mat[4],$text);
	}
	//过滤错误的单个引号
	while(preg_match('/\[[^\[\]]*(\"|\')[^\[\]]*\]/i',$text,$mat)){
		$text=str_replace($mat[0],str_replace($mat[1],'',$mat[0]),$text);
	}
	//转换其它所有不合法的 < >
	$text = str_replace('<','&lt;',$text);
	$text = str_replace('>','&gt;',$text);
	$text = str_replace('"','&quot;',$text);
	//反转换
	$text = str_replace('[','<',$text);
	$text = str_replace(']','>',$text);
	$text = str_replace('|','"',$text);
	//过滤多余空格
	$text = str_replace('  ',' ',$text);
	return $text;
}
/**
 * 产生随机字串，可用来自动生成密码 默认长度6位 字母和数字混合
 * @param string $len 长度
 * @param string $type 字串类型
 * 0 字母 1 数字 其它 混合
 * @param string $addChars 额外字符
 * @return string
 */
function rand_string($len=6,$type='',$addChars='') {
    $str ='';
    switch($type) {
        case 0:
            $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.$addChars;
            break;
        case 1:
            $chars= str_repeat('0123456789',3);
            break;
        case 2:
            $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ'.$addChars;
            break;
        case 3:
            $chars='abcdefghijklmnopqrstuvwxyz'.$addChars;
            break;
        case 4:
            $chars = "们以我到他会作时要动国产的一是工就年阶义发成部民可出能方进在了不和有大这主中人上为来分生对于学下级地个用同行面说种过命度革而多子后自社加小机也经力线本电高量长党得实家定深法表着水理化争现所二起政三好十战无农使性前等反体合斗路图把结第里正新开论之物从当两些还天资事队批点育重其思与间内去因件日利相由压员气业代全组数果期导平各基或月毛然如应形想制心样干都向变关问比展那它最及外没看治提五解系林者米群头意只明四道马认次文通但条较克又公孔领军流入接席位情运器并飞原油放立题质指建区验活众很教决特此常石强极土少已根共直团统式转别造切九你取西持总料连任志观调七么山程百报更见必真保热委手改管处己将修支识病象几先老光专什六型具示复安带每东增则完风回南广劳轮科北打积车计给节做务被整联步类集号列温装即毫知轴研单色坚据速防史拉世设达尔场织历花受求传口断况采精金界品判参层止边清至万确究书术状厂须离再目海交权且儿青才证低越际八试规斯近注办布门铁需走议县兵固除般引齿千胜细影济白格效置推空配刀叶率述今选养德话查差半敌始片施响收华觉备名红续均药标记难存测士身紧液派准斤角降维板许破述技消底床田势端感往神便贺村构照容非搞亚磨族火段算适讲按值美态黄易彪服早班麦削信排台声该击素张密害侯草何树肥继右属市严径螺检左页抗苏显苦英快称坏移约巴材省黑武培著河帝仅针怎植京助升王眼她抓含苗副杂普谈围食射源例致酸旧却充足短划剂宣环落首尺波承粉践府鱼随考刻靠够满夫失包住促枝局菌杆周护岩师举曲春元超负砂封换太模贫减阳扬江析亩木言球朝医校古呢稻宋听唯输滑站另卫字鼓刚写刘微略范供阿块某功套友限项余倒卷创律雨让骨远帮初皮播优占死毒圈伟季训控激找叫云互跟裂粮粒母练塞钢顶策双留误础吸阻故寸盾晚丝女散焊功株亲院冷彻弹错散商视艺灭版烈零室轻血倍缺厘泵察绝富城冲喷壤简否柱李望盘磁雄似困巩益洲脱投送奴侧润盖挥距触星松送获兴独官混纪依未突架宽冬章湿偏纹吃执阀矿寨责熟稳夺硬价努翻奇甲预职评读背协损棉侵灰虽矛厚罗泥辟告卵箱掌氧恩爱停曾溶营终纲孟钱待尽俄缩沙退陈讨奋械载胞幼哪剥迫旋征槽倒握担仍呀鲜吧卡粗介钻逐弱脚怕盐末阴丰雾冠丙街莱贝辐肠付吉渗瑞惊顿挤秒悬姆烂森糖圣凹陶词迟蚕亿矩康遵牧遭幅园腔订香肉弟屋敏恢忘编印蜂急拿扩伤飞露核缘游振操央伍域甚迅辉异序免纸夜乡久隶缸夹念兰映沟乙吗儒杀汽磷艰晶插埃燃欢铁补咱芽永瓦倾阵碳演威附牙芽永瓦斜灌欧献顺猪洋腐请透司危括脉宜笑若尾束壮暴企菜穗楚汉愈绿拖牛份染既秋遍锻玉夏疗尖殖井费州访吹荣铜沿替滚客召旱悟刺脑措贯藏敢令隙炉壳硫煤迎铸粘探临薄旬善福纵择礼愿伏残雷延烟句纯渐耕跑泽慢栽鲁赤繁境潮横掉锥希池败船假亮谓托伙哲怀割摆贡呈劲财仪沉炼麻罪祖息车穿货销齐鼠抽画饲龙库守筑房歌寒喜哥洗蚀废纳腹乎录镜妇恶脂庄擦险赞钟摇典柄辩竹谷卖乱虚桥奥伯赶垂途额壁网截野遗静谋弄挂课镇妄盛耐援扎虑键归符庆聚绕摩忙舞遇索顾胶羊湖钉仁音迹碎伸灯避泛亡答勇频皇柳哈揭甘诺概宪浓岛袭谁洪谢炮浇斑讯懂灵蛋闭孩释乳巨徒私银伊景坦累匀霉杜乐勒隔弯绩招绍胡呼痛峰零柴簧午跳居尚丁秦稍追梁折耗碱殊岗挖氏刃剧堆赫荷胸衡勤膜篇登驻案刊秧缓凸役剪川雪链渔啦脸户洛孢勃盟买杨宗焦赛旗滤硅炭股坐蒸凝竟陷枪黎救冒暗洞犯筒您宋弧爆谬涂味津臂障褐陆啊健尊豆拔莫抵桑坡缝警挑污冰柬嘴啥饭塑寄赵喊垫丹渡耳刨虎笔稀昆浪萨茶滴浅拥穴覆伦娘吨浸袖珠雌妈紫戏塔锤震岁貌洁剖牢锋疑霸闪埔猛诉刷狠忽灾闹乔唐漏闻沈熔氯荒茎男凡抢像浆旁玻亦忠唱蒙予纷捕锁尤乘乌智淡允叛畜俘摸锈扫毕璃宝芯爷鉴秘净蒋钙肩腾枯抛轨堂拌爸循诱祝励肯酒绳穷塘燥泡袋朗喂铝软渠颗惯贸粪综墙趋彼届墨碍启逆卸航衣孙龄岭骗休借".$addChars;
            break;
        default :
            // 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
            $chars='ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789'.$addChars;
            break;
    }
    if($len>10 ) {//位数过长重复字符串一定次数
        $chars= $type==1? str_repeat($chars,$len) : str_repeat($chars,5);
    }
    if($type!=4) {
        $chars   =   str_shuffle($chars);
        $str     =   substr($chars,0,$len);
    }else{
        // 中文随机字
        for($i=0;$i<$len;$i++){
          $str.= msubstr($chars, floor(mt_rand(0,mb_strlen($chars,'utf-8')-1)),1);
        }
    }
    return $str;
}
/**
 * 字节格式化 把字节数格式为 B K M G T 描述的大小
 * @return string
 */
function byte_format($size, $dec=2) {
	$a = array("B", "KB", "MB", "GB", "TB", "PB");
	$pos = 0;
	while ($size >= 1024) {
		 $size /= 1024;
		   $pos++;
	}
	return round($size,$dec)." ".$a[$pos];
}

function html_encode($str){
    return htmlspecialchars($str);
}

function html_decode($str){
    return htmlspecialchars_decode($str);
}
/**
 * 字符串转换为数组，主要用于把分隔符调整到第二个参数
 * @param  string $str  要分割的字符串
 * @param  string $glue 分割符
 * @return array
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function str2arr($str, $glue = ','){
  return explode($glue, $str);
}

/**
 * 数组转换为字符串，主要用于把分隔符调整到第二个参数
 * @param  array  $arr  要连接的数组
 * @param  string $glue 分割符
 * @return string
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function arr2str($arr, $glue = ','){
  return implode($glue, $arr);
}

//格式化字符串
function str_format($string, $array)
{
  if(is_array($array) && !empty($array)){
    $keys    = array_keys($array);
    $keysmap = array_flip($keys);
    $values  = array_values($array);

    while (preg_match('/%\(([a-zA-Z0-9_ -]+)\)/', $string, $m))
    {
      if (!isset($keysmap[$m[1]]))
      {
        echo "No key $m[1]\n";
        return false;
      }

      $string = str_replace($m[0], '%' . ($keysmap[$m[1]] + 1) . '$', $string);
    }
    array_unshift($values, $string);
    return call_user_func_array('sprintf', $values);
  }else if(is_string($array) || is_int($array)){
    return sprintf($string, $array);
  }else{
    return $string;
  }
}

if(!function_exists('array_column')){
	function array_column(array $input, $columnKey, $indexKey = null) {
		$result = array();
		if (null === $indexKey) {
			if (null === $columnKey) {
				$result = array_values($input);
			} else {
				foreach ($input as $row) {
					$result[] = $row[$columnKey];
				}
			}
		} else {
			if (null === $columnKey) {
				foreach ($input as $row) {
					$result[$row[$indexKey]] = $row;
				}
			} else {
				foreach ($input as $row) {
					$result[$row[$indexKey]] = $row[$columnKey];
				}
			}
		}
		return $result;
	}
}
//按数组元素排序
if(!function_exists('array_sort')){
	function array_sort($array,$sort_key,$sort=SORT_ASC){
		if(is_array($array)){
			foreach ($array as $row_array){
				if(is_array($row_array)){
					$key_array[] = $row_array[$sort_key];
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
		$sort = $sort == 'asc' ? SORT_ASC : SORT_DESC;
		$data = array_multisort($key_array,$sort,SORT_NUMERIC,$array);
		return $array;
	}
}
//获取星期几
function get_week($timestamp=0,$flag='chinese'){
    $week = date('w',$timestamp);
	if($flag == 'chinese'){
		$week_arr = array("日","一","二","三","四","五","六");
        return $week_arr[$week];
	}
	return $week;
}
/**
 * 递归转换数组中的键值为大写字母
 * @param  [type] $arr [description]
 * @return [type]      [description]
 */
function array_change_key_case_recursive($arr)
{
    return array_map(function($item){
        if(is_array($item))
            $item = array_change_key_case_recursive($item);
        return $item;
    },array_change_key_case($arr));
}
function jsonp_decode($jsonp, $assoc = false) { 
    // PHP 5.3 adds "depth" as third parameter to json_decode
    if($jsonp[0] !== '[' && $jsonp[0] !== '{') { // we have JSONP
        $jsonp = substr($jsonp, strpos($jsonp, '('));
    }
    return json_decode(trim($jsonp,'();'), $assoc);
}