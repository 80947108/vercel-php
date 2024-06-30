<?php
header('Content-Type:text[表情]ain'); //纯文本格式
date_default_timezone_set("Asia/Shanghai");
$channel = empty($_GET['id']) ? "CCTV-1H265_4000" : trim($_GET['id']);
$array = explode("_", $channel);
if (isset($array[1])) {
    $stream = "https://58.216.99.148:80/live2.rxip.sc96655.com/live,{$array[0]}_hls_pull_{$array[1]}K/";
} else {
    $stream = "https://58.216.99.148:80/live2.rxip.sc96655.com/live,{$array[0]}_hls_pull_4000K/";
}
$timestamp = intval((time() - 100) / 6);
$current = "#EXTM3U" . "\r\n";
$current .= "#EXT-X-VERSION:3" . "\r\n";
$current .= "#EXT-X-TARGETDURATION:6" . "\r\n";
$current .= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}" . "\r\n";
for ($i = 0; $i < 10; $i++) {  
    $current .= "#EXTINF:6," . "\r\n";
    $current .= $stream . rtrim(chunk_split($timestamp, 3, "/"), "/") . ".ts" . "\r\n";
    $timestamp = $timestamp + 1;
}
echo $current;
?>
