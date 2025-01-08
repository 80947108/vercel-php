<?php
error_reporting(-1);
$id = isset($_GET['id']) ? $_GET['id'] : '11342412'; //房间号

$h = array(
    'Content-Type: application/x-www-form-urlencoded',
    "Referer: https://www.huya.com/",
    'Origin: https://www.huya.com',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36 Edg/120.0.0.0',
);
$bstrURL = 'https://www.huya.com/' . $id;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $bstrURL);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $h);
curl_setopt($ch, CURLOPT_ENCODING, '');
$data = curl_exec($ch);
curl_close($ch);
// echo $data;
if (preg_match('/"sStreamName":"([^"]+)".*?"sFlvUrl":"([^"]+)".*?"sFlvUrlSuffix":"([^"]+)".*?"sFlvAntiCode":"([^"]+)"/s', $data, $matches)) {


    $sStreamName = $matches[1];
    // $sFlvUrl = $matches[2];
    $sFlvUrl = "http://182.40.120.229/test-txdwk.flv.huya.com/src";
    $sFlvUrlSuffix = $matches[3];
    $sFlvAntiCode = $matches[4];
    // echo $sHlsAntiCode;
    $url = $sFlvUrl . '/' . $sStreamName . '.' . $sFlvUrlSuffix . '?' . $sFlvAntiCode;

    // print_r($url);
    header("Content-Type: application/vnd.apple.mpegurl");
    header("Location: $url");
}
