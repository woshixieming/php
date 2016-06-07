### Title:该文档为每日工作总结，并不仅限于PHP技术  
### 2016.01.07
##### DNS CDN
1.	DNS：Domain Name System，域名系统  
    * 域名结构：通常 Internet 主机域名的一般结构为：主机名.三级域名.二级域名.顶级域名。 Internet 的顶级域名由 Internet网络协会域名注册查询负责网络地址分配的委员会进行登记和管理，它还为 Internet的每一台主机分配唯一的 IP 地址。全世界现有三个大的网络信息中心： 位于美国的 Inter-NIC，负责美国及其他地区； 位于荷兰的RIPE-NIC，负责欧洲地区；位于日本的APNIC ，负责亚太地区  
    * 查询方法：在Windows平台下，使用命令行工具，输入`nslookup`，返回的结果包括域名对应的IP地址（A记录）、别名（CNAME记录）等。然后输入要查询的域名，正常会返回该域名的IP地址  
    * 参考[维基百科](https://zh.wikipedia.org/wiki/%E5%9F%9F%E5%90%8D%E7%B3%BB%E7%BB%9F "维基百科")，[百度百科](http://baike.baidu.com/link?url=CEDydP2oA4_KF3Sf_5rQ2Enf3OL01GcSikhGd58RYegEhS4cC6j70_9zQH1ptVIMl0VVfFPGDTf21o2f20Ki4FWs8fB43rJrQBIepY_37Qy)
2. CDN：Content Delivery Network，内容分发网络。
	* 说明：是指一种通过互联网互相连接的电脑网络系统，利用最靠近每位用户的服务器，更快、更可靠地将音乐、图片、影片、应用程序及其他文件发送给用户，来提供高性能、可扩展性及低成本的网络内容传递给用户。
	* 原理：CDN的基本原理是广泛采用各种缓存服务器，将这些缓存服务器分布到用户访问相对集中的地区或网络中，在用户访问网站时，利用全局负载技术将用户的访问指向距离最近的工作正常的缓存服务器上，由缓存服务器直接响应用户请求。
	* 参考：[维基百科](https://zh.wikipedia.org/wiki/%E5%85%A7%E5%AE%B9%E5%82%B3%E9%81%9E%E7%B6%B2%E8%B7%AF) [百度百科](http://baike.baidu.com/view/21895.htm)
 
##### $_SERVER
>例：www.xm4021.com/Index/index.html  

*	`SERVER_ADDR` 当前运行脚本所在的服务器的 IP 地址。
*	`SERVER_NAME` 当前运行脚本所在的服务器的主机名。如果脚本运行于虚拟主机中，该名称是由那个虚拟主机所设置的值决定。 //www.xm4021.com
*	`SERVER_SOFTWARE` 服务器标识字符串，在响应请求时的头信息中给出。//Apache/2.4.9 (Win32) PHP/5.5.12
*	`REQUEST_METHOD` 访问页面使用的请求方法；例如，“GET”, “HEAD”，“POST”，“PUT”。※ 如果请求方法为 HEAD，PHP 脚本将在发送 Header 头信息之后终止(这意味着在产生任何输出后，不再有输出缓冲)。
*	`DOCUMENT_ROOT` 当前运行脚本所在的文档根目录。在服务器配置文件中定义。
*	`HTTP_HOST` 当前请求头中 Host: 项的内容，如果存在的话。[与SERVER_NAME的区别](http://mimiz.cn/index.php/php/php-http_host-server_name-difference/)
*	`HTTP_USER_AGENT` 当前请求头中 User-Agent: 项的内容，如果存在的话。该字符串表明了访问该页面的用户代理的信息。一个典型的例子是：Mozilla/4.5 [en] (X11; U; Linux 2.2.9 i586)。
*	`REMOTE_ADDR` 浏览当前页面的用户的 IP 地址。