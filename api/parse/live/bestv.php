<?php
date_default_timezone_set("Asia/Shanghai");
$id = isset($_GET['id'])?$_GET['id']:'dfyshd8m@8000000';
$id = str_replace('@', '/', $id);
$playseek = isset($_GET['playseek'])?$_GET['playseek']:'';
$domain = 'http://203.205.137.42:80/1.h2.smtcdns.net/fjnetv51.live.bestvcdn.com.cn';
if ($playseek != '') {
    $palyseek_arr = explode('-', $playseek);
    $s_time = $palyseek_arr[0];
    $e_time = $palyseek_arr[1];
    get_tvback($domain, $id, $s_time, $e_time);
} else {
    get_live($domain, $id);
}



function get_live($domain, $id = 'dfyshd8m/8000000') {
    $date = date('YmdH');
    $timestamp = intval((time()-50)/10);
    $stream = $domain.'/live/program/live/'.$id.'/'.$date.'/';
    $current = "#EXTM3U"."\r\n";
    $current .= "#EXT-X-VERSION:3"."\r\n";
    $current .= "#EXT-X-TARGETDURATION:3"."\r\n";
    $current .= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}"."\r\n";
    for ($i = 0; $i < 3; $i++) {
        $current .= "#EXTINF:10.000,"."\r\n";
        $current .= $stream.$timestamp.".ts"."\r\n";
        $timestamp = $timestamp + 1;
    }
    header("Content-Type: text/plain");
    //header('Content-Type: application/vnd.apple.mpegurl');
    //header("Content-Disposition: attachment; filename=mnf.m3u8");
    echo $current;
}

//回看
function get_tvback($domain, $id, $s_time, $e_time) {
    $st = ceil(strtotime($s_time)/10);
    $et = ceil(strtotime($e_time)/10);
    $http = $domain.'/live/program/live/';
    $m3u8 = '#EXTM3U'; $m3u8 .= PHP_EOL;
    $m3u8 .= '#EXT-X-VERSION:3'; $m3u8 .= PHP_EOL;
    $m3u8 .= '#EXT-X-TARGETDURATION:10'; $m3u8 .= PHP_EOL;
    $m3u8 .= '#EXT-X-MEDIA-SEQUENCE:'.$st; $m3u8 .= PHP_EOL;
    for ($i = $st; $i < $et; $i++) {
        $ymdh = date('YmdH', $i*10);
        $url = sprintf('%s/%s/%s/%s.ts', $http, $id, $ymdh, $i);
        $m3u8 .= '#EXTINF:10,'; $m3u8 .= PHP_EOL;
        $m3u8 .= $url; $m3u8 .= PHP_EOL;
    }
    $m3u8 .= '#EXT-X-ENDLIST';
    header("Content-Type: text/plain");
    //header('Content-Type: application/vnd.apple.mpegurl');
    //header("Content-Disposition: attachment; filename=mnf.m3u8");
    echo $m3u8;
}




?>
