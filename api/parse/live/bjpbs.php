<?php
$id = $_GET['id']??'cctv1';
$n = [
    'cctv1' => 'CCTV1hd-8M',  // CCTV1
    'cctv2' => 'CCTV2hd-8M',  // CCTV2
    'cctv3' => 'CCTV3hd-8M',  // CCTV3
    'cctv4' => 'CCTV4hd-8M',  // CCTV4
    'cctv5' => 'CCTV5hd-8M',  // CCTV5
    'cctv5p' => 'CCTV5+hd-8M',  // CCTV5+
    'cctv6' => 'CCTV6hd-8M',  // CCTV6
    'cctv7' => 'CCTV7hd-8M',  // CCTV7
    'cctv8' => 'CCTV8hd-8M',  // CCTV8
    'cctv9' => 'CCTV9hd-8M',  // CCTV9
    'cctv10' => 'CCTV10hd-8M',  // CCTV10
    'cctv11' => 'CCTV11hd-8M',  // CCTV11
    'cctv12' => 'CCTV12hd-8M',  // CCTV12
    'cctv13' => 'CCTV13hd-8M',  // CCTV13
    'cctv14' => 'CCTV14hd-8M',  // CCTV14
    'cctv15' => 'CCTV15hd-8M',  // CCTV15
    'cctv16' => 'CCTV16hd-8M',  // CCTV16
    'cctv17' => 'CCTV17hd-8M',  // CCTV17
    'hunws' => 'HuNWShd-8M',  // 湖南卫视
    'henws' => 'HeNWS-1500k',  // 河南卫视
    'bjws' => 'BJWShd-8M',  // 北京卫视
    'dfws' => 'DFWShd-8M',  // 东方卫视
    'tjws' => 'TJWShd-8M',  // 天津卫视
    'cqws' => 'CQWShd-8M',  // 重庆卫视
    'hljws' => 'HLJWShd-8M',  // 黑龙江卫视
    'jlws' => 'JLWShd-8M',  // 吉林卫视
    'lnws' => 'LNWShd-8M',  // 辽宁卫视
    'nmgws' => 'NMGWS-1500k',  // 内蒙卫视
    'nxws' => 'NXWS-1500k',  // 宁夏卫视
    'gsws' => 'GSWS-1500k',  // 甘肃卫视
    'qhws' => 'QHWS-1500k',  // 青海卫视
    'sxws3' => 'SXWS3-1500k',  // 陕西卫视
    'hebws' => 'HeBWShd-8M',  // 河北卫视
    'sxws1' => 'SXWS1-1500k',  // 山西卫视
    'sdws' => 'SDWShd-8M',  // 山东卫视
    'ahws' => 'AHWShd-8M',  // 安徽卫视
    'hubws' => 'HuBWShd-8M',  // 湖北卫视
    'jxws' => 'JXWShd-8M',  // 江西卫视
    'jsws' => 'JSWShd-8M',  // 江苏卫视
    'zjws' => 'ZJWShd-8M',  // 浙江卫视
    'dnws' => 'DNWShd-8M',  // 东南卫视
    'xmws' => 'XMWS-1500k',  // 厦门卫视
    'gdws' => 'GDWShd-8M',  // 广东卫视
    'szws' => 'SZWShd-8M',  // 深圳卫视
    'gxws' => 'GXWS-1500k',  // 广西卫视
    'ynws' => 'YNWS-1500k',  // 云南卫视
    'gzws' => 'GZWShd-8M',  // 贵州卫视
    'scws' => 'SCWS-1500k',  // 四川卫视
    'xjws' => 'XJWS-1500k',  // 新疆卫视
    'btws' => 'BTWS-1500k',  // 兵团卫视
    'nlws' => 'NLWS-1500k',  // 农林卫视
    'nfws' => 'NFWS-1500k',  // 大湾区卫视
    'xzws' => 'XZWS-1500k',  // 西藏卫视
    'lyws' => 'LYWS-1500k',  // 海南卫视
    'ssws' => 'SSWS-1500k',  // 三沙卫视
    'jsrw' => 'JSRWhd-8M',  // 纪实文人
    'jyjs' => 'JYJShd-8M',  // 金鹰纪实
    'xdkt' => 'XDKT-1500k',  // 哈哈炫动
    'jykt' => 'JYKT-1500k',  // 金鹰卡通
    'jjkt' => 'JJKT-1500k',  // 嘉佳卡通
    'cftx' => 'CFTX-1500k',  // 财富天下
    'cntv' => 'CCTVNEWS-1500k',  // CNTV
    'cetv1' => 'CETV1hd-8M',  // CETV1
    'cetv2' => 'CETV2-1500k',  // CETV2
    'cetv3' => 'CETV3-1500k',  // CETV3
    'cetv4' => 'CETV4-1500k',  // CETV4
    'btvwy' => 'BTVWYhd-5M',  // 北京文艺
    'btvty' => 'BTVTYhd-8M',  // 北京体育休闲
    'btvys' => 'BTVYShd-5M',  // 北京影视
    'btvcj' => 'BTVCJhd-5M',  // 北京财经
    'btvsh' => 'BTVSHhd-5M',  // 北京生活
    'btvxw' => 'BTVXWhd-5M',  // 北京新闻
    'btvkj' => 'BTVKJhd-8M',  // 北京纪实科教
    'btvgj' => 'BTVGJ-1500k',  // 北京国际

];

$userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3';
$m3u8 = "http://124.205.11.197:81/live/$n[$id]/live.m3u8";
$domain_prefix = "http://124.205.11.197:81/live/$n[$id]/";
header("Content-Type: application/vnd.apple.mpegurl");
header("Content-Disposition: inline; filename=index.m3u8");

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $m3u8);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // 允许重定向
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, false); // 不返回请求结果，直接重定向
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_VERBOSE, true);

$m3u8_content = curl_exec($ch);

$processed_m3u8_content = preg_replace_callback('/(.*\.ts)/', function($matches) use ($domain_prefix) {
    return $domain_prefix . $matches[1];
}, $m3u8_content);

echo $processed_m3u8_content;

curl_close($ch);
