<?php
error_reporting(0);
$id = $_GET["id"] ?? "cctv6";
$n = [
        "cctv6" => "LIVEOCTI36HXJXB9U",
        "1905a" => "LIVENCOI8M4RGOOJ9",
        "1905b" => "LIVE8J4LTCXPI7QJ5",
];
$ts = time();
$salt = "2bcc2c6ab75dac016d20181bfcd1ee0697c78018";
$playerId = substr($ts, 6) . substr(rand(), -3) . substr(rand(), -8);
$uuid = strtolower(
        sprintf(
                "%04X%04X-%04X-%04X-%04X-%04X%04X%04X",
                mt_rand(0, 65535),
                mt_rand(0, 65535),
                mt_rand(0, 65535),
                mt_rand(16384, 20479),
                mt_rand(32768, 49151),
                mt_rand(0, 65535),
                mt_rand(0, 65535),
                mt_rand(0, 65535)
        )
);
$params = [
        "cid" => 999999,
        "expiretime" => $ts + 600,
        "nonce" => $ts,
        "page" => "https://www.1905.com/",
        "playerid" => $playerId,
        "streamname" => $n[$id],
        "uuid" => $uuid,
];
$sign = sha1(http_build_query($params) . "." . $salt);
$params["appid"] = "GEalPdWA";
$post = json_encode($params);
$url = "https://profile.m1905.com/mvod/liveinfo.php";
$headers = ["Authorization: " . $sign, "Content-Type: application/json"];
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data);
$playurl =
        "https://hlslive.1905.com/live/$n[$id]/index.m3u8" .
        $json->data->sign->hd->sign;
header("Content-Type: application/vnd.apple.mpegURL");
header("location:" . $playurl);
