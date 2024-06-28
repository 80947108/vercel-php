<?php
//https://www.yangshipin.cn/tv/home?pid=600001859
error_reporting(0);
header('Access-Control-Allow-Origin:*');
header('Content-Type:text/plain;charset=UTF-8');
date_default_timezone_set("Asia/Shanghai");
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv1';
$n = [
    //央视
	'cctv1' => [2022576803,600001859],//cccv1
    'cctv2' => [2022576703,600001800],//cccv2
    'cctv3' => [2022576503,600002264],//cccv3(vip)
    'cctv4' => [2022576603,600001814],//cccv4
    'cctv5' => [2022576403,600001818],//cccv5
    'cctv5p' => [2022576303,600001817],//cccv5+
    'cctv6' => [2022574303, 600001802], //cccv6(vip)
    'cctv6hd' => [2013693901, 600108442], //cccv6(vip)	
    'cctv7' => [2022576203,600004092],//cccv7
    'cctv8' => [2022576103,600002264],//cccv8(vip)
    'cctv9' => [2022576003,600004078],//cccv9
    'cctv10' => [2022573003,600001805],//CCTV10
    'cctv11' => [2022575903,600001806],//CCTV11
    'cctv12' => [2022575803,600001807],//CCTV12
    'cctv13' => [2022575703,600001811],//CCTV13
    'cctv14' => [2022575603,600001809],//CCTV14
    'cctv15' => [2022575503,600001815],//CCTV15
    'cctv16' => [2022575403,600098637],//CCTV16
    'cctv16-4k' => [2022575103,600002264],//CCTV16-4k(vip)
    'cctv17' => [2022575303,600001810],//CCTV17
	'cctv4k' => [2022575203,600002264],//cccv-4k
    'cctv8k' => [2020603421,600156816],//cccv-8k
    //央视数字
    'bqkj' => [2012513403,600002264],//CCTV兵器科技(vip)
    'dyjc' => [2012514403,600002264],//CCTV第一剧场(vip)
    'hjjc' => [2012511203,600002264],//CCTV怀旧剧场(vip)
    'fyjc' => [2012513603,600002264],//CCTV风云剧场(vip)
    'fyyy' => [2012514103,600002264],//CCTV风云音乐(vip)
    'fyzq' => [2012514203,600002264],//CCTV风云足球(vip)
    'dszn' => [2012514003,600002264],//CCTV电视指南(vip)
    'nxss' => [2012513903,600002264],//CCTV女性时尚(vip)
    'whjp' => [2012513803,600002264],//CCTV央视文化精品(vip)
    'sjdl' => [2012513303,600002264],//CCTV世界地理(vip)
    'gefwq' => [2012512503,600002264],//CCTV高尔夫网球(vip)
    'ystq' => [2012513703,600002264],//CCTV央视台球(vip)
    'wsjk' => [2012513503,600002264],//CCTV卫生健康(vip)
    //央视国际
    'cgtn' => [2022575001,600014550],//CGTN
    'cgtnjl' => [2022574703,600084781],//CGTN纪录
    'cgtne' => [2022571703,600084744],//CGTN西语
    'cgtnf' => [2022574903,600084704],//CGTN法语
    'cgtna' => [2022574603,600084782],//CGTN阿语
    'cgtnr' => [2022574803,600084758],//CGTN俄语
    //教育
    'cetv1' => [2022823801,600171827],//教育1台
    //卫视
    'bjws' => [2000272103,600002309],//北京卫视
    'dfws' => [2000292403,600002483],//东方卫视
    'tjws' => [2019927003,600152137],//天津卫视
    'cqws' => [2000297803,600002531],//重庆卫视
    'hljws' => [2000293903,600002498],//黑龙江卫视
    'lnws' => [2000281303,600002505],//辽宁卫视
    'hbws' => [2000293403,600002493],//河北卫视
    'sdws' => [2000294803,600002513],//山东卫视
    'ahws' => [2000298003,600002532],//安徽卫视
    'hnws' => [2000296103,600002525],//河南卫视
    'hubws' => [2000294503,600002508],//湖北卫视
    'hunws' => [2000296203,600002475],//湖南卫视
    'jxws' => [2000294103,600002503],//江西卫视
    'jsws' => [2000295603,600002521],//江苏卫视
    'zjws' => [2000295503,600002520],//浙江卫视
    'dnws' => [2000292503,600002484],//东南卫视
    'gdws' => [2000292703,600002485],//广东卫视
    'szws' => [2000292203,600002481],//深圳卫视
    'gxws' => [2000294203,600002509],//广西卫视
    'gzws' => [2000293303,600002490],//贵州卫视
    'scws' => [2000295003,600002516],//四川卫视
    'xjws' => [2019927403,600152138],//新疆卫视
    'hinws' => [2000291503,600002506],//海南卫视
    'btws' => [2022606701,600170344], // 兵团卫视*/
];
$cnlid = $n[$id][0];
$pid = $n[$id][1];
$guid = generateGuid();
$randomString = rand_str(10);
$currentTimeMillis = round(microtime(true) * 1000);
$request_id = "999999" . $randomString . $currentTimeMillis;
$tgw_l7_route = generateRandomString();
$platform = "5910204";
$Auth_Salt = "PUlOFD%XM9jEdvuR";
$Get_Live_Info_Salt = '0f$IVHi9Qno?G';
$Ticket_Key = "zaTIoAwiY366Kk*7";
$Ticket_Iv = "5HvQ8qPE7%dY3QGB";
$key = hex2bin("48e5918a74ae21c972b90cce8af6c8be");
$iv = hex2bin("9a7e7d23610266b1d9fbf98581384d92");
$ts = time();
$randomNumber = rand() / mt_getrandmax();
$el = "|{$cnlid}|{$ts}|mg3c3b04ba|V1.0.0|{$guid}|{$platform}|[url]https://www.yangshipin.c[/url]|mozilla/5.0 (windows nt ||Mozilla|Netscape|Win32|";
$len = strlen($el);
$xl = 0;
for ($i = 0; $i < $len; $i++) {
    $xl = ($xl << 5) - $xl + ord($el[$i]);
    $xl &= $xl & 0xFFFFFFFF;
}
$xl = ($xl > 2147483648) ? $xl - 4294967296 : $xl;
$el = '|' . $xl . $el;
$ckey = "--01" . strtoupper(bin2hex(openssl_encrypt($el, "AES-128-CBC", $key, 1, $iv)));
$params = [
    "adjust" => 1,
    "appVer" => "V1.0.0",
    "app_version" => "V1.0.0",
    "cKey" => $ckey,
    "channel" => "ysp_tx",
    "cmd" => "2",
    "cnlid" => "{$cnlid}",
    "defn" => "fhd",
    "devid" => "devid",
    "dtype" => "1",
    "encryptVer" => "8.1",
    "guid" => $guid,
    "livepid" => "{$pid}",
    "otype" => "ojson",
    "platform" => $platform,
    "rand_str" => rand_str(10),
    "sphttps" => "1",
    "stream" => "2"
];
$sdkinput = [
    "adjust" => 1,
    "app_version" => "V1.0.0",	
    "appVer" => "V1.0.0",
    "channel" => "ysp_tx",
    "cKey" => $ckey,
    "cmd" => "2",
    "cnlid" => "{$cnlid}",
    "defn" => "fhd",
    "devid" => "devid",
    "dtype" => "1",
    "encryptVer" => "8.1",
    "guid" => $guid,
    "livepid" => "{$pid}",
    "otype" => "ojson",
    "platform" => $platform,
    "sphttps" => "1",
    "stream" => "2"
];

if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $onlineip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $onlineip = $_SERVER['REMOTE_ADDR'];
}
$useragent = $_SERVER['HTTP_USER_AGENT'];
$userid = md5($onlineip . $useragent);
$cookiekey = 'ysp_'.$id.'_cookie';
$header = [
    "Referer: https://www.yangshipin.cn/",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0",
];
$headers = [
    "Referer: https://www.yangshipin.cn/",
    "Cookie: guid=$guid; versionName=99.99.99; versionCode=999999; vplatform=109; platformVersion=Chrome; deviceModel=114; newLogin=1; nseqId=0; nrequest-id={$request_id}",
    "Yspappid: 519748109",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.289 Safari/537.36",
];
$cachedUrls = json_decode(getCookie($cookiekey), true);
$currentTime = time();
if ($currentTime - $cachedUrls['timestamp'] > 300 or $cachedUrls['seq'] == 240) {
	unset($cachedUrls);
}	
if (isset($cachedUrls) && is_array($cachedUrls) && count($cachedUrls) > 0) {
	$finalUrl = $cachedUrls['url'];
	$guuid = $cachedUrls['guuid'];
	$timestamp = $cachedUrls['timestamp'];
	$seq=$cachedUrls['seq'] + 1;
	$timeold=time() - $_COOKIE["ysp-".$id];
	// 如果用户观看记录缓存时间大于1分钟（即60秒），则提交数据到接口
	if ($currentTime - $timestamp > 60 && isset($cachedUrls)) {
		$kvurl = "https://dtrace.ysp.cctv.cn/kvcollect";
		$headers = [
			"Content-Type: application/x-www-form-urlencoded",
			"referer: https://www.yangshipin.cn/",	
			"user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36",
			"Host: dtrace.ysp.cctv.cn",
			"Connection: keep-alive"
		];	
		$data = [
			"BossId" => 9150,
			"Pwd" => 1999332929,
			"_dc" => $randomNumber,
			"cdn" => "waibao",
			"cmd" => 263,
			"defn" => "fhd",
			"downspeed" => 7.1,
			"durl" => $finalUrl,
			"errcode" => "-",
			"fact1" => "ysp_pc_live_b",
			"firstreport" => 1,
			"fplayerver" => 180,
			"ftime" => date("Y-m-d H:i:s", $timestamp + 60),
			"geturltime" => "-",
			"guid" => "$guuid",
			"hc_openid" => "-",
			"hh_ua" => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36",
			"live_type" => "-",
			"livepid" => "{$pid}",
			"login_type" => "-",
			"open_id" => "-",
			"openid" => "-",
			"platform" => 5910204,
			"playno" => rand_str(10),
			"prd" => "60000",
			"prog" => "{$cnlid}",
			"rand_str" => rand_str(10),
			"sRef" => "-",
			"sUrl" => "https://www.yangshipin.cn/#/tv/home?pid=$pid",
			"sdtfrom" => "ysp_pc_01",
			"seq" => $seq,
			"url" => $finalUrl,
			"viewid" => "{$cnlid}"
		];
		$authmd = md5(http_build_query($data));
		$data["signature"] = $authmd;
		$auth = http_build_query($data);
		$kvj = get_data($kvurl, $headers, $auth);
		$cachedUrls = [
			'seq' => $seq,
			'time' => str_pad(floor($timeold / 3600), 2, '0', STR_PAD_LEFT).":".str_pad(floor(($timeold % 3600) / 60), 2, '0', STR_PAD_LEFT).":".str_pad(floor(($timeold % 3600)% 60), 2, '0', STR_PAD_LEFT),
			'timestamp' => $timestamp + 60,
			'guuid' => $guuid,
			'url' => $finalUrl
		];	
		saveCookie($cookiekey,json_encode($cachedUrls));	
	}
	$burl = dirname($finalUrl) . "/";
	header("Content-Type: application/vnd.apple.mpegurl");
	header("Content-Disposition: inline; filename={$id}.m3u8");
	print_r(preg_replace("/(.*?.ts)/i", $burl . "$1", get_data($finalUrl, $header)));
	exit;
}else{
    $data = [
        "appid" => "ysp_pc",
        "guid" => $guid,
        "pid" => "$pid",
        "rand_str" => rand_str(10)
    ];
    $authmd5 = md5(http_build_query($data) . $Auth_Salt);
    $data["signature"] = $authmd5;
    $auth = http_build_query($data);
    $PostAuthUrl = "https://player-api.yangshipin.cn/v1/player/auth";
    $Postjson = json_decode(get_data($PostAuthUrl, $headers, $auth));
    $Auth_token = $Postjson->data->token;
	$Auth_ts = $Postjson->data->ts;
	if (!isset($Auth_token)) {
		exit("auth接口获取失败");
	}
    $PostUrls = "https://h5access.yangshipin.cn/web/open/token?yspappid=519748109&guid=".$guid."&vappid=59306155&vsecret=b42702bf7309a179d102f3d51b1add2fda0bc7ada64cb801&raw=1&ts=".$currentTimeMillis;
	$Postheaders = [
		"Host: h5access.yangshipin.cn",
		"Referer: https://www.yangshipin.cn/",
		"cookie: guid=$guid; versionName=99.99.99; versionCode=999999; vplatform=109; platformVersion=Chrome; deviceModel=124",
		"user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.289 Safari/537.36",
	];
    $Postjsons = json_decode(get_data($PostUrls, $Postheaders));
    $H5_token = $Postjsons->data->token;
	if (!isset($H5_token)) {
		exit("h5access接口获取失败");
	}
	$nseqId ='0';
    $Get_Live_Info_Md5 = md5(http_build_query($params) . $Get_Live_Info_Salt);
	$Yspsdkinput = md5(http_build_query($sdkinput));
	$Yspsdksign = md5('yspappid:519748109;host:www.yangshipin.cn;protocol:https:;token:'.$H5_token.';input:'.$Yspsdkinput.'-'.$guid.'-'.$nseqId.'-'.$request_id.';');
	$yspticket = encrypt_aes_128_ctr($pid . "&" . $Auth_ts . "&" . $guid . "&519748109&V1.0.0",$Ticket_Key,$Ticket_Iv);
	$yspticket=substr($yspticket,0, 96);
	$params["signature"] = $Get_Live_Info_Md5;
    $params = json_encode($params);
    $headers[] = "Content-Type: application/json";
	$headers[] = "Host: player-api.yangshipin.cn";
	$headers[] = "Seqid: 0";
	$headers[] = "Yspplayertoken: $Auth_token";
    $headers[] = "Request-Id: $request_id";
	$headers[] = "Yspsdkinput: $Yspsdkinput";
	$headers[] = "Yspsdksign: $Yspsdksign";
	$headers[] = "yspticket: $yspticket";
    $bstrURL = "https://player-api.yangshipin.cn/v1/player/get_live_info";
    $json = json_decode(get_data($bstrURL, $headers, $params));
    $live = $json->data->playurl;
    $chanll = json_decode($json->data->chanll);
    $tmpcode = base64_decode($chanll->code);
    preg_match('/var des_key = "(.*?)"/', $tmpcode, $deskey);
    preg_match('/var des_iv = "(.*?)"/', $tmpcode, $desiv);
    $plain = '{"mver": "1","subver": "1.2","host": "www.yangshipin.cn/#/tv/home","referer": "","canvas": "YSPANGLE(Google,Vulkan1.3.0(SwiftShaderDevice(Subzero)(0x0000C0DE)),SwiftShaderdriver)"}';
    $revoi = openssl_encrypt($plain, "DES-EDE3-CBC", base64_decode($deskey[1]), 1, base64_decode($desiv[1]));
    $revoi = strtoupper(bin2hex($revoi));
    $exinfo = $json->data->extended_param;
    if (isset($live)) {
		$finalUrl = $live . "&revoi=" . $revoi . $exinfo;	
		$burl = dirname($finalUrl) . "/";
		$get_live = get_data($finalUrl, $header);
        print_r(preg_replace("/(.*?.ts)/i", $burl . "$1", $get_live));	
        $cachedUrls = [
			'seq' => 0,
			'time' => "00:00:".str_pad(rand(0, 10), 2, '0', STR_PAD_LEFT),
			'guuid' => $guid,
			'timestamp' => time(),
            'url' => $finalUrl
        ];
		saveCookie("ysp-".$id,time());
		saveCookie($cookiekey,json_encode($cachedUrls));
        header("Content-Type: application/vnd.apple.mpegurl");
        header("Content-Disposition: inline; filename={$id}.m3u8");
		$kvurl = "https://dtrace.ysp.cctv.cn/kvcollect";
		$headers = [
			"Content-Type: application/x-www-form-urlencoded",
			"referer: https://www.yangshipin.cn/",	
			"user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36",
			"Host: dtrace.ysp.cctv.cn",
			"Connection: keep-alive"
		];
		$data = [
			"BossId" => 9150,
			"Pwd" => 1999332929,
			"_dc" => $randomNumber,
			"cdn" => "waibao",
			"cmd" => 263,
			"defn" => "fhd",
			"downspeed" => 7.1,
			"durl" => $finalUrl,
			"errcode" => "-",
			"fact1" => "ysp_pc_live_b",
			"firstreport" => 1,
			"fplayerver" => 180,
			"ftime" => date("Y-m-d H:i:s", time()),
			"geturltime" => "-",
			"guid" => "$guid",
			"hc_openid" => "-",
			"hh_ua" => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36",
			"live_type" => "-",
			"livepid" => "{$pid}",
			"login_type" => "-",
			"open_id" => "-",
			"openid" => "-",
			"platform" => 5910204,
			"playno" => rand_str(10),
			"prd" => "60000",
			"prog" => "{$cnlid}",
			"rand_str" => rand_str(10),
			"sRef" => "-",
			"sUrl" => "https://www.yangshipin.cn/#/tv/home?pid=$pid",
			"sdtfrom" => "ysp_pc_01",
			"seq" => 0,
			"url" => $finalUrl,
			"viewid" => "{$cnlid}"
		];
		$authmd = md5(http_build_query($data));
		$data["signature"] = $authmd;
		$auth = http_build_query($data);
		$kvj = get_data($kvurl, $headers, $auth);
        exit;
    }else{
		echo json_encode($json);
	}	
}
function encrypt_aes_128_ctr($data, $key, $iv){
    $encrypted = openssl_encrypt($data,"aes-128-ctr",$key,OPENSSL_RAW_DATA,$iv);
    if ($encrypted === false) {
        throw new RuntimeException(
            "Encryption failed: " . openssl_error_string()
        );
    }
    return bin2hex($encrypted);
}
function get_data($url, $header, $post = null){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    if (!empty($post)) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function rand_str($k){
    $e = "ABCDEFGHIJKlMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $i = 0;
    $str = "";
    while ($i < $k) {
        $str .= $e[mt_rand(0, 61)];
        $i++;
    }
    return $str;
}

function saveCookie($key,$value){
	setcookie($key,$value,0,'/');
}
function getCookie($key){
	if(isset($_COOKIE[$key]) && !empty($_COOKIE[$key])){
		return $_COOKIE[$key];
	}
}
function generateGuid(){
    $timestamp = base_convert((string) round(microtime(true) * 1000), 10, 36);
    $randomPart = substr(base_convert((string) mt_rand(), 10, 36), 0, 9);
    while (strlen($randomPart) < 11) {
        $randomPart .= substr(base_convert((string) mt_rand(), 10, 36), 0, 1);
    }
    $e = "abcdefghijklmnopqrstuvwxyz";
    $b = $e[rand(0, strlen($e) - 1)];
    $guid = str_replace('lv', 'l' . $b, $timestamp . "_" . $randomPart);
    return $guid;
}


function generateRandomString($length = 32){
    $characters = '0123456789abcdef';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
