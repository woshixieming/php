<?php
    /**
     * 检查字符串中是否包含子字符
     * @string $haystack 字符串
     * @string $needle 包含的子字符串
     * @return bool
     */
    function str_contains($haystack, $needle){
        if (empty($haystack) || empty($needle))
            return false;
        if (strpos($haystack, $needle) !== false) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 检查数组中是否完全包含子数组
     * @array $haystack 字符串
     * @array $needle 包含的子字符串
     * @return bool
     */
    function array_contains($haystack, $needle){
        if (!is_array($haystack) || !is_array($needle))
            return false;
        if (empty($haystack) || empty($needle))
            return false;
        if (count(array_intersect($needle, $haystack)) == count($needle)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 汉字转拼音
     * @param string $str 待转换的字符串
     * @param string $charset 字符串编码
     * @return string 返回结果
     */
    function pinyin($_String, $_Code='UTF8'){ //GBK页面可改为gb2312，其他随意填写为UTF8
        $_DataKey = "a|ai|an|ang|ao|ba|bai|ban|bang|bao|bei|ben|beng|bi|bian|biao|bie|bin|bing|bo|bu|ca|cai|can|cang|cao|ce|ceng|cha".
            "|chai|chan|chang|chao|che|chen|cheng|chi|chong|chou|chu|chuai|chuan|chuang|chui|chun|chuo|ci|cong|cou|cu|".
            "cuan|cui|cun|cuo|da|dai|dan|dang|dao|de|deng|di|dian|diao|die|ding|diu|dong|dou|du|duan|dui|dun|duo|e|en|er".
            "|fa|fan|fang|fei|fen|feng|fo|fou|fu|ga|gai|gan|gang|gao|ge|gei|gen|geng|gong|gou|gu|gua|guai|guan|guang|gui".
            "|gun|guo|ha|hai|han|hang|hao|he|hei|hen|heng|hong|hou|hu|hua|huai|huan|huang|hui|hun|huo|ji|jia|jian|jiang".
            "|jiao|jie|jin|jing|jiong|jiu|ju|juan|jue|jun|ka|kai|kan|kang|kao|ke|ken|keng|kong|kou|ku|kua|kuai|kuan|kuang".
            "|kui|kun|kuo|la|lai|lan|lang|lao|le|lei|leng|li|lia|lian|liang|liao|lie|lin|ling|liu|long|lou|lu|lv|luan|lue".
            "|lun|luo|ma|mai|man|mang|mao|me|mei|men|meng|mi|mian|miao|mie|min|ming|miu|mo|mou|mu|na|nai|nan|nang|nao|ne".
            "|nei|nen|neng|ni|nian|niang|niao|nie|nin|ning|niu|nong|nu|nv|nuan|nue|nuo|o|ou|pa|pai|pan|pang|pao|pei|pen".
            "|peng|pi|pian|piao|pie|pin|ping|po|pu|qi|qia|qian|qiang|qiao|qie|qin|qing|qiong|qiu|qu|quan|que|qun|ran|rang".
            "|rao|re|ren|reng|ri|rong|rou|ru|ruan|rui|run|ruo|sa|sai|san|sang|sao|se|sen|seng|sha|shai|shan|shang|shao|".
            "she|shen|sheng|shi|shou|shu|shua|shuai|shuan|shuang|shui|shun|shuo|si|song|sou|su|suan|sui|sun|suo|ta|tai|".
            "tan|tang|tao|te|teng|ti|tian|tiao|tie|ting|tong|tou|tu|tuan|tui|tun|tuo|wa|wai|wan|wang|wei|wen|weng|wo|wu".
            "|xi|xia|xian|xiang|xiao|xie|xin|xing|xiong|xiu|xu|xuan|xue|xun|ya|yan|yang|yao|ye|yi|yin|ying|yo|yong|you".
            "|yu|yuan|yue|yun|za|zai|zan|zang|zao|ze|zei|zen|zeng|zha|zhai|zhan|zhang|zhao|zhe|zhen|zheng|zhi|zhong|".
            "zhou|zhu|zhua|zhuai|zhuan|zhuang|zhui|zhun|zhuo|zi|zong|zou|zu|zuan|zui|zun|zuo";
        $_DataValue = "-20319|-20317|-20304|-20295|-20292|-20283|-20265|-20257|-20242|-20230|-20051|-20036|-20032|-20026|-20002|-19990".
            "|-19986|-19982|-19976|-19805|-19784|-19775|-19774|-19763|-19756|-19751|-19746|-19741|-19739|-19728|-19725".
            "|-19715|-19540|-19531|-19525|-19515|-19500|-19484|-19479|-19467|-19289|-19288|-19281|-19275|-19270|-19263".
            "|-19261|-19249|-19243|-19242|-19238|-19235|-19227|-19224|-19218|-19212|-19038|-19023|-19018|-19006|-19003".
            "|-18996|-18977|-18961|-18952|-18783|-18774|-18773|-18763|-18756|-18741|-18735|-18731|-18722|-18710|-18697".
            "|-18696|-18526|-18518|-18501|-18490|-18478|-18463|-18448|-18447|-18446|-18239|-18237|-18231|-18220|-18211".
            "|-18201|-18184|-18183|-18181|-18012|-17997|-17988|-17970|-17964|-17961|-17950|-17947|-17931|-17928|-17922".
            "|-17759|-17752|-17733|-17730|-17721|-17703|-17701|-17697|-17692|-17683|-17676|-17496|-17487|-17482|-17468".
            "|-17454|-17433|-17427|-17417|-17202|-17185|-16983|-16970|-16942|-16915|-16733|-16708|-16706|-16689|-16664".
            "|-16657|-16647|-16474|-16470|-16465|-16459|-16452|-16448|-16433|-16429|-16427|-16423|-16419|-16412|-16407".
            "|-16403|-16401|-16393|-16220|-16216|-16212|-16205|-16202|-16187|-16180|-16171|-16169|-16158|-16155|-15959".
            "|-15958|-15944|-15933|-15920|-15915|-15903|-15889|-15878|-15707|-15701|-15681|-15667|-15661|-15659|-15652".
            "|-15640|-15631|-15625|-15454|-15448|-15436|-15435|-15419|-15416|-15408|-15394|-15385|-15377|-15375|-15369".
            "|-15363|-15362|-15183|-15180|-15165|-15158|-15153|-15150|-15149|-15144|-15143|-15141|-15140|-15139|-15128".
            "|-15121|-15119|-15117|-15110|-15109|-14941|-14937|-14933|-14930|-14929|-14928|-14926|-14922|-14921|-14914".
            "|-14908|-14902|-14894|-14889|-14882|-14873|-14871|-14857|-14678|-14674|-14670|-14668|-14663|-14654|-14645".
            "|-14630|-14594|-14429|-14407|-14399|-14384|-14379|-14368|-14355|-14353|-14345|-14170|-14159|-14151|-14149".
            "|-14145|-14140|-14137|-14135|-14125|-14123|-14122|-14112|-14109|-14099|-14097|-14094|-14092|-14090|-14087".
            "|-14083|-13917|-13914|-13910|-13907|-13906|-13905|-13896|-13894|-13878|-13870|-13859|-13847|-13831|-13658".
            "|-13611|-13601|-13406|-13404|-13400|-13398|-13395|-13391|-13387|-13383|-13367|-13359|-13356|-13343|-13340".
            "|-13329|-13326|-13318|-13147|-13138|-13120|-13107|-13096|-13095|-13091|-13076|-13068|-13063|-13060|-12888".
            "|-12875|-12871|-12860|-12858|-12852|-12849|-12838|-12831|-12829|-12812|-12802|-12607|-12597|-12594|-12585".
            "|-12556|-12359|-12346|-12320|-12300|-12120|-12099|-12089|-12074|-12067|-12058|-12039|-11867|-11861|-11847".
            "|-11831|-11798|-11781|-11604|-11589|-11536|-11358|-11340|-11339|-11324|-11303|-11097|-11077|-11067|-11055".
            "|-11052|-11045|-11041|-11038|-11024|-11020|-11019|-11018|-11014|-10838|-10832|-10815|-10800|-10790|-10780".
            "|-10764|-10587|-10544|-10533|-10519|-10331|-10329|-10328|-10322|-10315|-10309|-10307|-10296|-10281|-10274".
            "|-10270|-10262|-10260|-10256|-10254";
        $_TDataKey   = explode('|', $_DataKey);
        $_TDataValue = explode('|', $_DataValue);
        $_Data = array_combine($_TDataKey, $_TDataValue);
        arsort($_Data);
        reset($_Data);
        if($_Code!= 'gb2312') $_String = _U2_Utf8_Gb($_String);
        $_Res = '';
        for($i=0; $i<strlen($_String); $i++) {
            $_P = ord(substr($_String, $i, 1));
            if($_P>160) {
                $_Q = ord(substr($_String, ++$i, 1)); $_P = $_P*256 + $_Q - 65536;
            }
            $_Res .= _Pinyin($_P, $_Data);
        }
        return preg_replace("/[^a-z0-9]*/", '', $_Res);
    }

    function _Pinyin($_Num, $_Data){
        if($_Num>0 && $_Num<160 ){
            return chr($_Num);
        }elseif($_Num<-20319 || $_Num>-10247){
            return '';
        }else{
            foreach($_Data as $k=>$v){ if($v<=$_Num) break; }
            return $k;
        }
    }

    function _U2_Utf8_Gb($_C){
        $_String = '';
        if($_C < 0x80){
            $_String .= $_C;
        }elseif($_C < 0x800) {
            $_String .= chr(0xC0 | $_C>>6);
            $_String .= chr(0x80 | $_C & 0x3F);
        }elseif($_C < 0x10000){
            $_String .= chr(0xE0 | $_C>>12);
            $_String .= chr(0x80 | $_C>>6 & 0x3F);
            $_String .= chr(0x80 | $_C & 0x3F);
        }elseif($_C < 0x200000) {
            $_String .= chr(0xF0 | $_C>>18);
            $_String .= chr(0x80 | $_C>>12 & 0x3F);
            $_String .= chr(0x80 | $_C>>6 & 0x3F);
            $_String .= chr(0x80 | $_C & 0x3F);
        }
        return iconv('UTF-8', 'GB2312', $_String);
    }

    function utf8togbk($elem){
        return mb_convert_encoding($elem,"GBK","UTF-8"); //"auto" = "ASCII,JIS,UTF-8,EUC-JP,SJIS".
    }

    /**
     * 字符串半角和全角间相互转换
     * @param string $str 待转换的字符串
     * @param int $type :转换为半角；，转换为全角
     * @return string  返回转换后的字符串
     */
    function str_fh($str, $type = 'H'){
        $dbc = array(
            '０', '１', '２', '３', '４',
            '５', '６', '７', '８', '９',
            'Ａ', 'Ｂ', 'Ｃ', 'Ｄ', 'Ｅ',
            'Ｆ', 'Ｇ', 'Ｈ', 'Ｉ', 'Ｊ',
            'Ｋ', 'Ｌ', 'Ｍ', 'Ｎ', 'Ｏ',
            'Ｐ', 'Ｑ', 'Ｒ', 'Ｓ', 'Ｔ',
            'Ｕ', 'Ｖ', 'Ｗ', 'Ｘ', 'Ｙ',
            'Ｚ', 'ａ', 'ｂ', 'ｃ', 'ｄ',
            'ｅ', 'ｆ', 'ｇ', 'ｈ', 'ｉ',
            'ｊ', 'ｋ', 'ｌ', 'ｍ', 'ｎ',
            'ｏ', 'ｐ', 'ｑ', 'ｒ', 'ｓ',
            'ｔ', 'ｕ', 'ｖ', 'ｗ', 'ｘ',
            'ｙ', 'ｚ', '－', '　', '：',
            '．', '，', '／', '％', '＃',
            '！', '＠', '＆', '（', '）',
            '＜', '＞', '＂', '＇', '？',
            '［', '］', '｛', '｝', '＼',
            '｜', '＋', '＝', '＿', '＾',
            '￥', '￣', '｀', '；'
        );
        $sbc = array( //半角
            '0', '1', '2', '3', '4',
            '5', '6', '7', '8', '9',
            'A', 'B', 'C', 'D', 'E',
            'F', 'G', 'H', 'I', 'J',
            'K', 'L', 'M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T',
            'U', 'V', 'W', 'X', 'Y',
            'Z', 'a', 'b', 'c', 'd',
            'e', 'f', 'g', 'h', 'i',
            'j', 'k', 'l', 'm', 'n',
            'o', 'p', 'q', 'r', 's',
            't', 'u', 'v', 'w', 'x',
            'y', 'z', '-', ' ', ':',
            '.', ',', '/', '%', ' #',
            '!', '@', '&', '(', ')',
            '<', '>', '"', '\'', '?',
            '[', ']', '{', '}', '\\',
            '|', '+', '=', '_', '^',
            '￥', '~', '`', ';'
        );
        if ($type == 'F') {
            return str_replace($sbc, $dbc, $str); //半角到全角
        } elseif ($type == 'H') {
            return str_replace($dbc, $sbc, $str); //全角到半角
        } else {
            return $str;
        }
    }

    /**
     * stdClass转换为array
     */
    function object_array($array){
        if (is_object($array)) {
            $array = (array)$array;
        }
        if (is_array($array)) {
            foreach ($array as $key => $value) {
                $array[$key] = object_array($value);
            }
        }
        return $array;
    }

    /**
     * unicode 转化为 utf-8
     */
    function unicode_utf8($str)
    {
        return html_entity_decode(preg_replace('/%u([0-9A-F]+)/', '&#x$1;', $str), ENT_COMPAT, 'UTF-8');
    }

    /**
     * 数据签名认证
     * @param  array $data 被认证的数据
     * @return string       签名
     */
    function data_auth_sign($data){
        //数据类型检测
        if (!is_array($data)) {
            $data = (array)$data;
        }
        ksort($data); //排序
        $code = http_build_query($data); //url编码并生成query字符串
        $sign = sha1($code); //生成签名
        return $sign;
    }

    /**
     * 计算日期相差天数
     *
     * 传入日期的格式为
     * $Date_1="2009-8-09";
     * echo $Date_1+1;
     * $Date_2="2009-06-08";
     *
     * */
    function get_diff_date($start_date, $end_date){
        $Date_List_a1 = explode("-", $start_date);
        $Date_List_a2 = explode("-", $end_date);
        $d1 = mktime(0, 0, 0, $Date_List_a1[1], $Date_List_a1[2], $Date_List_a1[0]);
        $d2 = mktime(0, 0, 0, $Date_List_a2[1], $Date_List_a2[2], $Date_List_a2[0]);
        $tmp = '';
        if ($d1 > $d2) {
            $tmp = $d2;
            $d2 = $d1;
            $d1 = $tmp;
        }
        $Days = round(($d2 - $d1) / 3600 / 24) + 1;
        return $Days;
    }

    /**
     * 字符串日期格式化显示
     */
    function display_date($time, $format = 'Y-m-d H:i:s'){
        if (empty($time)) {
            return '';
        }
        $format = str_replace('#', ':', $format);
        return date($format, strtotime($time));
    }

    /**
     * 生成订单序号
     */
    function generate_order_sn(){
        $year_code = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
        return $year_code[intval(date('Y')) - 2010] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
    }

    /**
     * 锁定表单
     *
     * @param int $life_time 表单锁的有效时间(秒). 如果有效时间内未解锁, 表单锁自动失效.
     * @return boolean 成功锁定时返回true, 表单锁已存在时返回false
     */
    function lockSubmit($life_time = null) {
        if (isset($_SESSION['LOCK_SUBMIT_TIME']) && intval($_SESSION['LOCK_SUBMIT_TIME']) > time() ) {
            return false;
        }else {
            $life_time = $life_time ? $life_time : 10;
            $_SESSION['LOCK_SUBMIT_TIME'] = time() + intval($life_time);
            return true;
        }
    }

    /**
     * 检查表单是否已锁定
     *
     * @return boolean 表单已锁定时返回true, 否则返回false
     */
    function isSubmitLocked() {
        return isset($_SESSION['LOCK_SUBMIT_TIME']) && intval($_SESSION['LOCK_SUBMIT_TIME']) > time();
    }

    /**
     * 表单解锁
     *
     * @return void
     */
    function unlockSubmit() {
        unset($_SESSION['LOCK_SUBMIT_TIME']);
    }

    /**
     * 获取指定表，指定字段信息
     * $field       当前字段名
     * $table       要查询的表
     * $placeField  $field对应的指定表的字段名称
     * $getField    要获取的表的字段
     **/
    function get_table_field($field,$table,$placeField,$getField='name'){
        if (empty($field)) return '';
        $result=M($table)->where($placeField.'="'.$field.'"')->getField($getField);
        if (empty($result)) return '';
        return $result;
    }

    //验证邮箱
    function isEmail($value){
        $regex='/^[^\W][a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
        if(preg_match($regex,$value)){
            return true;
        }else{
            return false;
        }
    }

    //验证手机
    function isMobile($value){
        $regex='/(13[0-9]|15[012356789]|18[0-9]|14[57]|17[0123456789])[0-9]{8}$/';
        if(preg_match($regex,$value)){
            return true;
        }else{
            return false;
        }
    }

    //unicode转码
    function replace_unicode_escape_sequence($match) {
        return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
    }

    //去除空格、转义空格字符、全角空格
    function removeEmpty($string){
        return preg_replace("/(\s|\&nbsp\;|　|\xc2\xa0)/","",trim($string));
    }

    /**
     * 数据流量转换
     */
    function calcDataTraffic($data){
        $t=floor($data/1024/1024/1024/1024);
        $g=floor($data/1024/1024/1024)%1024;
        $m=floor(($data/1024/1024)%1024);
        $k=floor(($data/1024)%1024);
        $b=$data%1024;
        $string='';
        $string .= $t >0 ? $t.'TB ' : '';
        $string .= $g >0 ? $g.'GB ' : '';
        $string .= $m >0 ? $m.'MB ' : '';
        $string .= $k >0 ? $k.'KB ' : '';
        $string .= $b >0 ? $b.'Byte' : '';
        return $string;
    }

    /**
     *判断是否移动端
     */
    function isMobileTerminal(){
        $theusagt = $_SERVER["HTTP_USER_AGENT"];
        if(stripos($theusagt , "iPhone") !== false || stripos($theusagt , "iPod") !== false){
            $is_mobile = true;
        }else if(stripos($theusagt , "Mac OS") !== false){
            $is_mobile = false;
        }else if(stripos($theusagt , "Mobile") !== false){
            $is_mobile = true;
        }else if(stripos($theusagt , "Android") !== false){
            $is_mobile = false;
        }else if(stripos($theusagt , "Windows Phone") !== false){
            $is_mobile = true;
        }else {
            $is_mobile = false;
        }
        return $is_mobile;
    }

    /**
     * curl请求
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
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);//终止从服务器端进行验证
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

    /**
     * 获取GUID
     */
    function create_guid(){
        $charid = strtoupper(md5(uniqid(mt_rand(), true)));
        $hyphen = chr(45);// "-"　
        $uuid = substr($charid, 6, 2).substr($charid, 4, 2).substr($charid, 2, 2).substr($charid, 0, 2).$hyphen.substr($charid, 10, 2).substr($charid, 8, 2).$hyphen.substr($charid,14, 2).substr($charid,12, 2).$hyphen.substr($charid,16, 4).$hyphen.substr($charid,20,12);
        return $uuid;
    }

    /**
     * 字符串截取，支持中文和其他编码
     */
    function msubstr($str, $start = 0, $length, $charset = "utf-8", $suffix = false){
        if(strlen($str)<=$length){
            $slice=$str;
        }else{
            if (function_exists("mb_substr")) {
                if ($suffix)
                    return mb_substr($str, $start, $length, $charset) . "...";
                else
                    return mb_substr($str, $start, $length, $charset);
            } elseif (function_exists('iconv_substr')) {
                if ($suffix)
                    return iconv_substr($str, $start, $length, $charset) . "...";
                else
                    return iconv_substr($str, $start, $length, $charset);
            }
            $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
            $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
            $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
            $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
            preg_match_all($re[$charset], $str, $match);
            $slice = join("", array_slice($match[0], $start, $length));
            if ($suffix) return $slice . "…";
        }
        return $slice;
    }