<?php
	//利用curl登陆并获取一个网页信息
	$data='username=xxxx&password=xxxx&remember=1';
	$curlobj=curl_init(); //初始化
	curl_setopt($curlobj, CURLOPT_URL,"http://www.weibo.com/login");//设置网页URL
	curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, TRUE);//执行之后不直接打印出来
	
	//Cookie相关设置
	date_default_timezone_set('PRC');//设置时区
	curl_setopt($curlobj, CURLOPT_COOKIESESSION,TRUE);
	curl_setopt($curlobj, CURLOPT_COOKIEFILE, 'cookiefile'); //cookie保存位置
	curl_setopt($curlobj, CURLOPT_COOKIEJAR, 'cookiefile');  //cookie读取
	curl_setopt($curlobj, CURLOPT_COOKIE, session_name().'='.session_id());
	curl_setopt($curlobj, CURLOPT_HEADER, 0);//不打印头部信息
	curl_setopt($curlobj, CURLOPT_FOLLOWLOCATION, 1);//让curl支持页面跳转
	
	curl_setopt($curlobj, CURLOPT_POST, 1);
	curl_setopt($curlobj, CURLOPT_POSTFIELDS, $data);
	curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("application/x-www-form-urlencoded;charset=utf-8","Content-length:".strlen($data)));
	curl_exec($curlobj);
	
	
	curl_setopt($curlobj, CURLOPT_URL, "http://www.baidu.com/space/index");
	curl_setopt($curlobj, CURLOPT_POST, 0);
	curl_setopt($curlobj, CURLOPT_HTTPHEADER, array("Content-type:text/xml"));
	$output=curl_exec($curlobj);
	curl_close($curlobj);
	echo $output;

		
?>