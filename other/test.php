<?php
    /**
     * Created by PhpStorm.
     * User: xieming
     * Date: 2016/3/14
     * Time: 11:46
     */

//    $number = 123;
//    $txt = sprintf("%o",$number);
//    echo $txt;

    $str1 = "Hello";
    $str2 = "中华人民共和国中央人民广播电台!";

    echo sprintf("[%s]",$str1)."<br>";
    echo sprintf("[%8s]",$str1)."<br>";
    echo sprintf("[%-8s]",$str1)."<br>";
    echo sprintf("[%08s]",$str1)."<br>";
    echo sprintf("[%'*8s]",$str1)."<br>";
    echo sprintf("[%.15s]",$str2)."<br>";
    echo sprintf("%.4s",'3.1415926')."<br>";
    echo sprintf("%.4f",'3.1415926')."<br>";