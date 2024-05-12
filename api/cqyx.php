<?php
//查看CURL的版本
var_dump(curl_version());exit;
//Rewrite by absentfriend
$cityId = '5A';
$playId= $_GET['id']??'cctv1HD';
$relativeId = $playId;
$type='1';
$appId = "kdds-chongqingdemo";
$url ='http://portal.centre.bo.cbnbn.cn/others/common/playUrlNoAuth?cityId=5A&playId='.$playId.'&relativeId='.$relativeId.'&type=1';
$curl = curl_init();
$timestamps = round(microtime(true) * 1000);
$sign = md5('aIErXY1rYjSpjQs7pq2Gp5P8k2W7P^Y@appId' . $appId . "cityId" . $cityId. "playId" . $playId . "relativeId" . $relativeId . "timestamps" . $timestamps . "type" . $type);
curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'appId: kdds-chongqingdemo',
    'sign: '.$sign,
    'timestamps:'.$timestamps,
    'Content-Type: application/json;charset=utf-8'
  ),
  ));

$response = curl_exec($curl);
curl_close($curl);
$url = (json_decode($response));
$codes = $url->data->result->protocol[0]->transcode[0]->url;
//echo $codes;//exit;


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $codes);
curl_setopt($ch, CURLOPT_TIMEOUT, 3);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
//curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, 0);
curl_setopt($ch, CURLOPT_DNS_USE_GLOBAL_CACHE, false);
curl_setopt($ch, CURLOPT_RESOLVE, ["live.cbncdn.cn:80:118.24.228.117"]);
//curl_setopt($ch, CURLOPT_CONNECT_TO, ["live.cbncdn.cn:80:118.24.228.117"]);
curl_setopt($ch, CURLOPT_HEADER, true);
//curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:39.0) Gecko/20100101 Firefox/39.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果把这行注释掉的话,就会直接输出
$result=curl_exec($ch);
curl_close($ch);

preg_match('|Location:(.*)|',$result,$temp);
$play_url=trim($temp[1]);
echo $play_url;exit;
header('location:'.$play_url);
?>
