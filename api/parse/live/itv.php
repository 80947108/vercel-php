<?php
//http://127.0.0.1/yditv.php?channel-id=ystenlive&Contentid=1000000005000265001&playseek=20240815190000-20240815193000
error_reporting(0);
date_default_timezone_set("PRC");
$ts = $_GET['ts']??'';
if ($ts){
	$decodedUts = urldecode($ts);
	$tsa = explode('AuthInfo=',$decodedUts);
	$authinfo = urlencode($tsa[1]);
	$decodedUts = $tsa[0].'AuthInfo='.$authinfo;
	$data = get($decodedUts);
	if ($data[1]!==200){
		$d = get($decodedUts)[0];
	} else {
		$d = $data[0];
	}
	header('Content-Type: video/MP2T');
} else {
	$u = $_GET['u']??'';
	$https = isset($_SERVER['HTTPS'])?'https':'http';//当前请求的主机使用的协议。
	$http_host = $_SERVER['HTTP_HOST'];//当前请求的主机名。
	$requestUri = $_SERVER['REQUEST_URI'];//获取当前请求的 URI
	$decodedUri = urldecode($requestUri);//URL解码
	$Uripath = explode('?',$decodedUri)[0];//strstr($decodedUri,'?',true);
	if ($u){
		$decodedU = urldecode($u);
		$urlpath = explode('index.m3u8',$decodedU)[0];
		$urlp = "{$https}://{$http_host}{$Uripath}?ts=";
		$m3u8 = get($decodedU)[0];
		if (strpos($m3u8,'EXTM3U')===false) $m3u8 = get($decodedU)[0];
		$m3u8s = explode("\n",trim($m3u8));
		$d = '';
		foreach($m3u8s as $m3u8l){
			if (strpos($m3u8l,'ts')!==false){
				$d .= $urlp.urlencode($urlpath.$m3u8l).PHP_EOL;
			} else {
				$d .= $m3u8l.PHP_EOL;
			}
		}
		header("Content-Type: application/vnd.apple.mpegURL");
		header("Content-Disposition: inline; filename=index.m3u8");
	} else {
		$channel_id = $_GET['channel-id']??'ystenlive';
		$Contentid = $_GET['Contentid']??'8785669936177902664';
		$playseek = $_GET['playseek']??'';
		if ($playseek) {
			$t_arr = str_split(str_replace('-','.0',$playseek).'.0',8);
			$starttime = $t_arr[0].'T'.$t_arr[1].'0Z';
			$endtime = $t_arr[2].'T'.$t_arr[3].'0Z';
			$url1 = "http://gslbserv.itv.cmvideo.cn/index.m3u8?channel-id={$channel_id}&Contentid={$Contentid}&livemode=4&stbId=4&starttime={$starttime}&endtime={$endtime}";
		} else {
			$url1 = "http://gslbserv.itv.cmvideo.cn/index.m3u8?channel-id={$channel_id}&Contentid={$Contentid}&livemode=1&stbId=4";
		}
		$url2 = get($url1,1)[0];
		$url3 = urlencode($url2);
		$url4 = "{$https}://{$http_host}{$Uripath}?u={$url3}";
		header("location:$url4");
		exit;
	}
}
print_r($d);
exit;
 
function get($url,$tran=0) {
	$host = [
		"cache.ott.ystenlive.itv.cmvideo.cn:80:39.135.122.181",
		"cache.ott.bestlive.itv.cmvideo.cn:80:39.135.122.181",
		"cache.ott.wasulive.itv.cmvideo.cn:80:39.135.122.181",
		"cache.ott.fifalive.itv.cmvideo.cn:80:39.135.122.181",
		"cache.ott.hnbblive.itv.cmvideo.cn:80:39.135.122.181",
 
		"cache.ott.ystenlive.itv.cmvideo.cn:80:39.134.142.148",
		"cache.ott.bestlive.itv.cmvideo.cn:80:39.135.57.47",
		"cache.ott.wasulive.itv.cmvideo.cn:80:39.136.135.241",
		"cache.ott.fifalive.itv.cmvideo.cn:80:39.134.91.238",
		"cache.ott.hnbblive.itv.cmvideo.cn:80:39.136.135.241",
 
		"cache.ott.ystenlive.itv.cmvideo.cn:80:39.134.149.187",
		"cache.ott.bestlive.itv.cmvideo.cn:80:39.137.24.22",
		"cache.ott.wasulive.itv.cmvideo.cn:80:39.135.188.235",
		"cache.ott.fifalive.itv.cmvideo.cn:80:39.135.188.237",
		"cache.ott.hnbblive.itv.cmvideo.cn:80:39.134.16.115",
	];
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36');
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
	curl_setopt($ch, CURLOPT_RESOLVE, $host);
	if($tran){
		curl_setopt($ch, CURLOPT_MAXREDIRS, 2);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_NOBODY, 1);
		curl_exec($ch);
		$data[0] = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
	} else {
		$data[0] = curl_exec($ch);
	}
	$data[1] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	return $data;
}
?>


ref(APA): wheiss.Wheiss&#039; Blog.https://www.wheiss.com. Retrieved 2024/10/29.
