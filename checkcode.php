<?php
    /**
     * Created by PhpStorm.
     * User: xieming
     * Date: 2015/11/17
     * Time: 17:40
     */

    /*
     * 一些常用的PHP检测
     *
     * int memory_get_usage ([ bool $real_usage = false ] )
     * 说明：返回分配给 PHP 的内存量，单位是字节（byte）
     * 参数：real_usage 如果设置为 TRUE，获取系统分配的真实内存尺寸。如果未设置或者设置为 FALSE，将是 emalloc() 报告使用的内存量。
     * 返回值：返回内存量字节数
     * 文档：http://www.php.net/manual/zh/function.memory-get-usage.php
     */

    //only example
    echo strtoupper('memory_get_usage') . "<br /><br />";

    echo 'Start:'.memory_get_usage() . "<br />"; // 36640
    $a = str_repeat("Hello", 4242);
    echo 'End'.memory_get_usage() . "<br />"; // 57960
    unset($a);
    echo 'Unset:'.memory_get_usage() . "<br />"; // 36744

    echo "<hr />";

    /*
     * microtime
     */