<?php
//https://www.1905.com/cctv6/live/
error_reporting(0);
$id = $_GET['id']??'cctv6';
$n = [
    'cctv6' => ['LIVEI56PNI726KA7A','b8558226f5aec4827d6215e9394c05051717628b'],//CCTV6电影频道
    '1905a' => ['LIVENCOI8M4RGOOJ9','c9192fe1342f8b2f453c78ba49c418707a4b7d11'],//1905国内电影
    '1905b' => ['LIVE8J4LTCXPI7QJ5','fbb52770b2b642177bcbbcbb1bc7b21d5a61e625'],//1905国外电影
    ];

$post = '{"cid":999999,"expiretime":2000000600,"nonce":2000000000,"page":"https:\/\/www.1905.com\/","playerid":12345678,"streamname":"'.$n[$id][0].'","uuid":1,"appid":"GEalPdWA"}';

$ch = curl_init('http://profile.m1905.com/mvod/liveinfo.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER,['Authorization:'.$n[$id][1],'Origin: https://www.1905.com']);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data);
$path = $json->data->path->hd->path;
$sign = $json->data->sign->hd->sign;
$playurl = "http://hlslive.1905.com{$path}".$sign;
header("Content-Type: application/vnd.apple.mpegURL");
header('location:'.$playurl);
//echo $playurl;
?>
