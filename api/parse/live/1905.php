<?php
//https://www.1905.com/cctv6/live/
error_reporting(0);
$id = $_GET['id']??'cctv6';
$n = [
    'cctv6' => ['LIVENLPG8RMKR5TW6','8610274828f804c4e10e39b01a496357b852a326'],//CCTV6电影频道
    '1905a' => ['LIVENCOI8M4RGOOJ9','42eb78debea1e7525597384f64eec95b26e3e9f8'],//1905国内电影
    '1905b' => ['LIVE8J4LTCXPI7QJ5','a7a1d67d98944b7880b3593d3ea677727656952c'],//1905国外电影
    ];

$post = '{"cid":999999,"expiretime":"2000000600","nonce":"2000000000","page":"https://www.1905.com","playerid":"12345678","streamname":"'.$n[$id][0].'","uuid":"1","appid":"GEalPdWA"}';
$ch = curl_init('https://profile.m1905.com/mvod/liveinfo.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_HTTPHEADER,['Authorization:'.$n[$id][1]]);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data);
$playurl = "http://hlslive.1905.com/live/{$n[$id][0]}/index.m3u8".$json->data->sign->hd->sign;
header("Content-Type: application/vnd.apple.mpegURL");
header('location:'.$playurl);
//echo $playurl;
?>
