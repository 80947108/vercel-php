<?php
///https://www.1905.com/cctv6/live/?index3
error_reporting(0);
header('Content-Type: application/x-javascript; charset=utf-8');
$id = isset($_GET['id'])?$_GET['id']:'cctv6';
$n = [
    'cctv6' => ['LIVEI56PNI726KA7A'],//CCTV6电影频道
    '1905b' => ['LIVE8J4LTCXPI7QJ5'],//1905国外电影
    '1905a' => ['LIVENCOI8M4RGOOJ9'],//1905国内电影
];
    $salt = "733491c04838307328c3ca158213040d06c3924f"; // 盐  
    $url = "https://profile.m1905.com/mvod/liveinfo.php";
    $StreamName = $n[$id][0];
    $sign = $n[$id][1];
    $ts = time();
    $playid = substr($ts,-4).'12312345678';
    $params = [
        'cid'=> 999999,
        'expiretime'=> 2000000600,
        'nonce'=> 2000000000,
        'page'=> 'https://www.1905.com',
        'playerid'=> $playid, 
        'streamname'=> $StreamName,
        'uuid'=> 1
    ];
    $sign = sha1(http_build_query($params).'.'.$salt);
    $params['appid'] = 'Lbv73h6w';
    $headers = [
        'Authorization: '.$sign,
        'Content-Type: application/json',
    ];
    $data=curl($url,$params,$headers);
    $json = json_decode($data,true);
                //print_r($data);die;

    $playURL = $json['data']['quality']['hd']['host'].$json['data']['path']['hd']['path'].$json['data']['sign']['hd']['sign'];
    header('location:'.$playURL);
function curl($url,$params,$headers){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_POST,true);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($params));
    $data = curl_exec($ch);
    curl_close($ch);
        return $data;
  }
function createNewGUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }
?>