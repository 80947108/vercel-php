<?php
// 定义频道链接
$channels = [


"Banana" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//奧視香蕉臺
"Amazing" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//奧視驚艷臺
"Pandora" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//潘朵啦高畫質玩美台
"RAINBOW" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//彩虹Movie台
"Sonsee1" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//松視1臺
"Sonsee2" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//松視2臺
"Sonsee3" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//松視3臺
"XZT" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//写真臺
"XZT1" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//写真臺
"Jstar" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//JStar極限台電影頻道
"HAPPY" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//HAPPY頻道
"RainbowE" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//彩虹E台
"KChannel" => "https://heyunfei.eu.org/tishi1/playlist.m3u8",//K頻道



];

// 获取请求中的id参数
$id = $_GET['id'] ?? '';

// 检查id是否存在并返回相应的链接
if (array_key_exists($id, $channels)) {
    header('Location: ' . $channels[$id]);
    exit; // 确保重定向后停止执行
} else {
    // 如果没有找到频道，跳转到指定链接 abc
    header('Location: https://heyunfei.eu.org/tishi/playlist.m3u8');
    exit; // 确保跳转后停止执行后续代码
}
?>
