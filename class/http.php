<?php 
header('content-type: text/html; charset=utf-8');


$url = 'http://ip.taobao.com/service/getIpInfo.php';
$params = array('ip'=>'');
$data = http($url, $params, 'GET');
var_dump($data);
exit;


/**
 * [http 发送HTTP请求方法]
 * @author xiexinzhong <xiexinzhong@yuewen.com>
 * @since  2014-08-12
 * @param  [type]     $url    [请求URL]
 * @param  [type]     $params [请求参数]
 * @param  string     $method [请求方法GET/POST]
 * @param  array      $header [自定义header信息]
 * @param  boolean    $multi  [description]
 * @return [type]             [响应数据]
 */
function http($url, $params = null, $method = 'GET', $header = array(), $multi = false){
    $opts = array(
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => $header
        );

    /* 根据请求类型设置特定参数 */
    switch(strtoupper($method)){
        case 'GET':
            $params_url = '';
            if ($params) {
                $params_url = ((strpos($url, '?') !== false)?'&':'?').http_build_query($params);
            }
            $opts[CURLOPT_URL] = $url.$params_url;
            break;
        case 'POST':
        //判断是否传输文件
            $params = $multi ? $params : http_build_query($params);
            $opts[CURLOPT_URL]        = $url;
            $opts[CURLOPT_POST]       = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
            break;
        default:
            return array(
                'status' => false,
                'info'   => '不支持的请求方式！',
            );
    }

    /* 初始化并执行curl请求 */
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
     //https免签调用方式
    if(strlen($opts[CURLOPT_URL]) >5 && strtolower(substr($opts[CURLOPT_URL], 0, 5)) == 'https'){  
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, fasle);//终止从服务器端进行验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    }
    $data  = curl_exec($ch);
    $error = curl_error($ch);
    $info  = curl_getinfo($ch);
    curl_close($ch);
    if($error){
        return array(
            'status' => false,
            'info'   => '请求发生错误：' . $error,
        );
    }

    $res = array(
        'status' => true,
        'http_code'    => $info['http_code'],
        'request_size' => $info['request_size'],
        'data'         => $data,
    );
    return  $res;
}
?>