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
    $a = str_repeat("Hello", 5000); //重复5000次
    echo 'End:'.memory_get_usage() . "<br />"; // 57960
    unset($a);
    echo 'Unset:'.memory_get_usage() . "<br />"; // 36744

    echo "<hr />";

    /*
     * mixed microtime ([ bool $get_as_float ] )
     * 说明：当前 Unix 时间戳以及微秒数。本函数仅在支持 gettimeofday() 系统调用的操作系统下可用
     * 如果调用时不带可选参数，本函数以 "msec sec" 的格式返回一个字符串，
     * 其中 sec 是自 Unix 纪元（0:00:00 January 1, 1970 GMT）起到现在的秒数，msec 是微秒部分。
     * 字符串的两部分都是以秒为单位返回的。
     * 文档：http://php.net/microtime
     */
    //example
    echo strtoupper('microtime') . "<br /><br />";

    function microtime_float(){
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
    $time_start = microtime_float();
    // Sleep for a while
    usleep(10000);
    $time_end = microtime_float();
    $time = $time_end - $time_start;

    echo "Did nothing in $time seconds\n";

    echo "<hr />";


    /*
     * SQL的效率可以使用打开慢查询查看日志分析
     *
     * SQL 找到有瓶颈的使用EXPLAIN 来分析
     */
