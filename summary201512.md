### Title:该文档为每日工作总结，并不仅限于PHP技术  
### 12.01
##### Mysql binlog：
* `C:\wamp\bin\mysql\mysql5.6.17\bin>mysqlbinlog -v --base64-output=decode-rows c:/binlog/mysql-bin.00099 > c:/binlog/binlog599.sql`

### 12.02 ###
##### localhost、127.0.0.1、本机IP的区别
* localhost 是一个域名，可以解释为：本地服务器。
* 127.0.0.1在windows等系统中解释为:本机地址(本机服务器)
* 通过本机的host文件，windows自动将localhost解析为127.0.0.1
* 本机IP就是本机在外网的IP地址
* 
* localhost不通过网卡传输，不受网络防火墙和网卡的相关限制。
* 127.0.0.1 和 本机IP 通过网卡传输，受网络防火墙和网卡的相关限制。
* 127.0.0.1 只能通过本机访问，本机IP通过本机访问也能通过外部访问
* 有时候localhost和1270.0.1并不能通用
* 参考链接 http://www.zhihu.com/question/23940717
