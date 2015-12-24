<?php
    //两两位置互换

    function exchangeTwoCharacte($string){
        $string='5753536733453647D2';

        //方式一：
        $arr=str_split($string);
        $newString='';
        foreach($arr as $k => $v){
            if($k%2==1){
                $newString .=$v[$k-1];
            }else{
                $newString .=$v[$k+1];
            }
        }
        //end 方式一

        //方式二
        $arr2=str_split($string,2);
        $newString2='';
        foreach($arr2 as $k =>$v){
            $newString2 .=strrev($v);
        }
        //end 方式二
    }