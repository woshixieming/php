<?php

function pregCh($test){  
//utf8��ƥ������  
    $rule ='/([\x{4e00}-\x{9fa5}]){1}/u';  
    preg_match_all($rule,$test,$result);  
    return $result;  
} 

function pregNumber($test){    
    $rule ='/\d+/';  
    preg_match_all($rule,$test,$result);  
    return $result; //����
}



//�ڶ��ַ�����ʹ��in_array������
 
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
 
 
//�����ַ�����ʹ��is_numeric������
 
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