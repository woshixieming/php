<?php
//	$html=file_get_contents('http://www.baidu.com');
//	print_r($http_response_header);
//	
//	$fp=fopen('http://www.baidu.com', 'r');
//	print_r(stream_get_meta_data($fp));	

$data=array('foo'=>'bar');
$data=http_build_query($data);
$opts=array(
	'http'=>array(
		'method'=>'POST',
		'header'=>"Content-type:application/x-www-form-urlencoded\r\n".
				  "Content-Length:".strlen($data)."\r\n",
		'content'=>$data
	),
);
$context=stream_context_create($opts);
$html=file_get_contents('http://www.example.com',false,$context);
echo $html;

?>