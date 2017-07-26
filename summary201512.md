### Title:该文档为每日工作总结，并不仅限于PHP技术  
### 12.01
##### Mysql binlog （1）
> `C:\wamp\bin\mysql\mysql5.6.17\bin>mysqlbinlog -v --base64-output=decode-rows c:/binlog/mysql-bin.00099 > c:/binlog/binlog599.sql`  

### 12.02  
##### localhost、127.0.0.1、本机IP的区别  

>localhost 是一个域名，可以解释为：本地服务器。  
>127.0.0.1在windows等系统中解释为:本机地址(本机服务器)  
>通过本机的host文件，windows自动将localhost解析为127.0.0.1  
>本机IP就是本机在外网的IP地址  
***
>localhost不通过网卡传输，不受网络防火墙和网卡的相关限制  
>127.0.0.1 和 本机IP 通过网卡传输，受网络防火墙和网卡的相关限制  
>127.0.0.1 只能通过本机访问，本机IP通过本机访问也能通过外部访问  
>有时候localhost和1270.0.1并不能通用  
>参考链接 http://www.zhihu.com/question/23940717

### 12.04 ###
##### Mysql binlog （2）
* 开启binlog （windows）
	>my.ini  
	>[mysqld]  
	>log-bin=[filename] 存放位置及文件名  
	>例：D:/wamp/logs/mysql-bin  生成的文件名为 **`mysql-bin.000001`** 和 **`mysql-bin.index`**  **.index**文件为所有日志文件的清单；在 _1、服务器重启、更新，2、日志达到了最大日志长度**`max_binlog_size`** ，3、日志被刷新**`mysql> flush logs`**_时，会重新生成一个新的日志文件  
	>SELECT 和 没有实际操作 不会写入日志


* 查看binlog日志
	>1.`mysql> SHOW BINARY LOG;` //显示所有的日志文件   
	>2.`mysql> SHOW BINLOG EVENTS [IN 'filename'][FROM pos] [LIMIT [offset,] row_count];` //显示文件的详细内容,不需要全路径,`'mysql-bin.000002'`   
	>3.`C:\wamp\bin\mysql\mysql5.6.17\bin>mysqlbinlog c:/wamp/logs/binlog/mysql-bin.000001;` //查看文件  
	>4.导出为可执行文件格式，参考 12.01 《mysql binlog（1）》
	
* 清除binlog日志
	>`mysql> PURGE MASTER LOGS TO 'mysql-bin.000006';` //清除TO之前的文件，不包含改文件  
	>`mysql> PURGE MASTER LOGS BEFORE '2015-12-04 17:46:00';` //按时间点清除，不会删除包含该日期的文件  
	>`mysql> RESET MASTER;` //清除之前所有的文件，并重新生成新的binlog，后缀从000001开始；主从服务器需要注意  
	>`binlog-do-db=test` 只记录test数据库的操作；`binlog-ignore-db=test` 记录除test数据库之外的数据库

### 12.17 ###
##### 一些PHP函数 ######

* str_split
	>array str_split ( string $string [, int $split_length = 1 ] )  
	>说明：将一个字符串转换为数组。  
	>参数：string 输入字符串。split\_length 每一段的长度。    
	>返回值：1 如果指定了可选的 split\_length 参数，返回数组中的每个元素均为一个长度为 split_length 的字符块，否则每个字符块为单个字符。2、如果 split\_length 小于 1，返回 FALSE。如果 split\_length 参数超过了 string 超过了字符串 string 的长度，整个字符串将作为数组仅有的一个元素返回。  
	>示例：  
	><?php  
	>$str = "Hello Friend";  
	>$arr1 = str\_split($str); //array('H','e','l','l','l','o',....'d');  
	>$arr2 = str\_split($str, 3); //array('Hel','lo','Fri','end');  
	>?>


* strrev()  
	>string strrev ( string $string )  
	>说明：返回 string 反转后的字符串。  
	>参数：string 待反转的原始字符串。  
	>返回值：返回反转后的字符串。  
	>示例：  
	><?php  
	>&nbsp;&nbsp;&nbsp;&nbsp;`echo strrev("Hello world!"); // 输出 "!dlrow olleH"`  
	>?>
