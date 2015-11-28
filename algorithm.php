<?php
/**
 * Created by PhpStorm.
 * User: xieming
 * Date: 15-11-24
 * Time: 下午9:41
 */

    $array=array(1,43,38,54,62,11,21,66,32,50,78,36,76,39);

    //冒泡排序
    function mp($arr){
        $length=count($arr);
        for($i=0;$i<$length;$i++){
            for($j=0;$j<$length-$i;$j++){
                if($arr[$j]>$arr[$j+1]){
                    $tmp=$arr[$j+1]; //两数对比，小的获取
                    $arr[$j+1]=$arr[$j];
                    $arr[$j]=$tmp;
                }
            }
        }
        return $arr;
    }
//    print_r(mp($array));

    //选择排序
    function choose($arr){
        $len=count($arr);
        for($i=0;$i<$len-1;$i++){
            $p=$i; //假设最小值的位置
            //和$i后面的比较
            for($j=$i+1;$j<$len;$j++){
                //$arr[$p]是当前已知最小值
                if($arr[$p]>$arr[$j]){
                    $p=$j;//比较，发现更小的，记录下最小值位置，在下次比较时，采用已知最小值进行比较
                }
            }
            //已经确定了当前最小值的位置，保存到$p中，如果发现最小值的位置与当前假设的位置$i不同，则位置互换；
            if($p!=$i){
                $tmp=$arr[$p];
                $arr[$p]=$arr[$i];
                $arr[$i]=$tmp;
            }
        }
        return $arr;
    }
//    print_r(choose($array));

    //插入排序
    function insert($arr){
        $len=count($arr);
        for($i=0;$i<$len;$i++){
            $tmp=$arr[$i];//获得当前需要比较的值
            for($j=$i-1;$j>=0;$j--){
                //$arr[$i]需要插入的元素；$arr[$j]需要比较的元素
                if($tmp<$arr[$j]){
                    //发现插入的元素要小，则交换位置；
                    $arr[$j+1]=$arr[$j];
                    //将前面的数设置为当前需要交换的数
                    $arr[$j]=$tmp;
                }else{ //不需要移动
                    break;
                }
            }
        }
        return $arr;
    }
//    print_r(insert($array));

    //快速排序
    function quick($arr){
        $len=count($arr);
        if($len<=1) return $arr;

        //选择标尺，第一个元素
        $base=$arr[0];
        //遍历除了标尺外的所有元素，按照大小关系放入两个数组内
        //初始化
        $left_arr=array();
        $right_arr=array();
        for($i=1;$i<$len;$i++){
            if($base>$arr[$i]){
                $left_arr[]=$arr[$i];
            }else{
                $right_arr[]=$arr[$i];
            }
        }
        //递归调用
        $left_arr = quick($left_arr);
        $right_arr = quick($right_arr);
        return array_merge($left_arr,array($base),$right_arr);
    }

//    print_r(quick($array));