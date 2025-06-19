<?php
//使用方法：http://192.168.1.123/mq.php?id=cctv1&ip=122.136.214.64:8014
//id和ip自己找，试了几个群里分享的ip都可以的，应该是通用了，本php基于安哥源码的hbmklive.php修改，作者不详
//标准IP  122.136.214.164:8014，122.137.222.42:8014,119.62.32.202:8014(cctv10),223.199.37.17:8086,218.9.116.223:8014,113.110.166.236:8014
//非标ip可能使用live1116，live1117这样的id,如http://120.2.68.13:10000
//WW的4433端口系列代码改动更大，且不使用5003端口，需自行查看修改。
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv1';
$ip = isset($_GET['ip']) ? $_GET['ip'] : '122.136.214.164:8014';
$iplive = preg_replace('/:\d+$/', ':5003', $ip);
$account = "10000100001";
$mac = getMac();

header("Content-Type:application/vnd.apple.mpegurl;");
header("Content-Disposition:inline;filename={$id}.m3u8");
$jsonurl = "http://" . $ip . "/HSAndroidLogin.ecgi?ty=json&mac_address1=&mac_address2=" . $mac . "&hotel_id=1&room=101&net_account=" . $account . "&opentype=0";
$json = json_decode(get_data($jsonurl));
$token = $json->Token;
if (isset($token)) {
	$url = "http://" . $ip . "/ualive?cid=" . $id . "&token=" . $token . "&_=" . getMillisecond();
	$jscid = get_data($url);
	$urllive = "http://" . $iplive . "/" . $id . ".m3u8?token=" . $token;
	$live = get_data($urllive);
	$current = preg_replace("/(.*?.ts)/i", "http://" . $iplive . "/" . "$1", $live);
	echo $current;
} else {
	echo "获取token失败！";
}

function get_data($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HTTPHEADER, "User-Agent: okhttp/3.15");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}
function getMillisecond(){
	list($t1, $t2) = explode(' ', microtime());
	return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
}
function getMac(){
	$char1 = str_split("abcdef");
	$char2 = str_split("0123456789");
	$mBuffer = "";
	for ($i = 0; $i < 6; $i++) {
		$t = rand(0, count($char1) - 1);
		$y = rand(0, count($char2) - 1);
		$key = rand(0, 1);
		if ($key == 0) {
			$mBuffer .= $char2[$y] . $char1[$t];
		} else {
			$mBuffer .= $char1[$t] . $char2[$y];
		}
		if ($i != 5) {
			$mBuffer .= ":";
		}
	}
	return $mBuffer;
}
