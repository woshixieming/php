<?php

function pregCh($test){  
//utf8下匹配中文  
    $rule ='/([\x{4e00}-\x{9fa5}]){1}/u';  
    preg_match_all($rule,$test,$result);  
    return $result;  
} 

function pregNumber($test){    
    $rule ='/\d+/';  
    preg_match_all($rule,$test,$result);  
    return $result; //数组
}



//第二种方法，使用in_array方法：
 
function findNum($str=''){
	$str=trim($str);
	if(empty($str)){return '';}
		$temp=array('1','2','3','4','5','6','7','8','9','0');
		$result='';
		for($i=0;$i<strlen($str);$i++){
			if(in_array($str[$i],$temp)){
				$result.=$str[$i];
			}
		}
	return $result;
}
 
 
//第三种方法，使用is_numeric函数：
 
function findNum($str=''){
	$str=trim($str);
	if(empty($str)){return '';}
	$result='';
	for($i=0;$i<strlen($str);$i++){
		if(is_numeric($str[$i])){
			$result.=$str[$i];
		}
	}
	return $result;
}