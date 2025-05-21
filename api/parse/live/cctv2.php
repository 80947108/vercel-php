<?php
$url = "https://vdn.cctv.cn/cctvmobileinf/rest/cctv/videoliveUrl/getstream";
$data = "url=https%3A%2F%2Flivealiop-finance.cctv.cn%2Fhls%2FCCTV28bee868714f04ea2af79947bb9b46fc3H%2Fplaylist.m3u8";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$d = curl_exec($ch);
curl_close($ch);
$p = json_decode($d,1)["url"];
header("location:".$p);
?>
