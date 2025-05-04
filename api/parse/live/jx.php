<?php
error_reporting(0);
$n = [
'cctv1' => 'CCTV1HD', //CCTV1综合
'cctv2' => 'CCTV2HD', //CCTV2财经
'cctv3' => 'CCTV3', //CCTV3综艺
'cctv4' => 'CCTV4HD', //CCTV4中文国际
'cctv5' => 'CCTV5', //CCTV5体育
'cctv6' => 'CCTV6', //CCTV6电影
'cctv8' => 'CCTV8', //CCTV8电视剧
'cctv9' => 'CCTV9HD', //CCTV9纪录
'cctv10' => 'CCTV10HD', //CCTV10科教
'cctv11' => 'CCTV11', //CCTV11戏曲
'cctv12' => 'CCTV12HD', //CCTV12社会与法
'cctv13' => 'CCTV13', //CCTV13新闻
'cctv14' => 'CCTV14HD', //CCTV14少儿
'ccctv15' => 'CCTV15', //CCTV15音乐
'cetv1' => 'CETV1HD', //中国教育台1
'cetv4' => 'CETV4', //中国教育台4
'bjws' => 'BEIJHD', //北京卫视
'dfws' => 'DONGFHD', //东方卫视
'tjws' => 'TIANJHD', //天津卫视
'cqws' => 'CHONGQHD', //重庆卫视
'hljws' => 'HEILJHD', //黑龙江卫视
'jlws' => 'JILHD', //吉林卫视
'lnws' => 'LIAONHD', //辽宁卫视
'nmws' => 'NMGWS', //内蒙古卫视
'nxws' => 'NXWS', //宁夏卫视
'gsws' => 'GSWS', //甘肃卫视
'qhws' => 'QHWS', //青海卫视
'sxws' => 'SXTV', //陕西卫视
'hbws' => 'HAIBHD', //河北卫视
'sxiws' => 'SXWS', //山西卫视
'sdws' => 'SHANDHD', //山东卫视
'ahws' => 'ANHUIHD', //安徽卫视
'hnws' => 'HENHD', //河南卫视
'hubws' => 'HUBEIHD', //湖北卫视
'hunws' => 'HUNANHD', //湖南卫视
'jxws' => 'JXWSHD', //江西卫视
'jsws' => 'JIANGSHD', //江苏卫视
'zjws' => 'ZHEJHD', //浙江卫视
'dnws' => 'DONGNHD', //东南卫视
'gdws' => 'GUANGDHD', //广东卫视
'szws' => 'SHENZHD', //深圳卫视
'gxws' => 'GUANGXHD', //广西卫视
'ynws' => 'YUNNHD', //云南卫视
'gzws' => 'GUIZHD', //贵州卫视
'scws' => 'SICHD', //四川卫视
'xjws' => 'XJWS', //新疆卫视
'btws' => 'BTWS', //兵团卫视
'xzws' => 'XZWS', //西藏卫视
'hinws' => 'HAINHD', //海南卫视
'xdkt' => 'XDKT', //炫动卡通
'jyjs' => 'JYJSHD', //金鹰纪实
'jykt' => 'JXKT', //金鹰卡通
'jxds' => 'JXDS', //江西都市
'jxgg' => 'JXGGNY', //江西公共农业
'jxjs' => 'JXJJSH', //江西经济生活
'jxse' => 'JXSE', //江西少儿
'jxxw' => 'JXXWHD', //江西新闻
'jxys' => 'JXYS', //江西影视旅游
'fsgw' => 'FSGW', //风尚购物
'jxjy' => 'JXJY', //江西教育
];
$id = $_GET['id']??'cctv1';
$url = "https://api-playerlive-jx.skysrt.com/rights/getChannelPlayUrl?appId=cc725834911498506790&channelId={$n[$id]}&token=9369b7b3d27936006480582ca7dc1518";
$data = get($url);
$json = json_decode($data,1);
$live = $json['data']['playUrlModel']['url']."&us=9369b7b3d27936006480582ca7dc1518";
$burl = dirname($live)."/";
$php = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$ts = $_GET['ts'];
if(empty($ts)) {
     header('Content-Type: application/vnd.apple.mpegurl');
     print_r(preg_replace("/(.*?.ts)/i",$php."?ts=$burl$1",get($live)));
     } else {
       $data = get($ts);
       header('Content-Type: video/MP2T');
       echo $data;
       }
function get($url){
     $ch = curl_init($url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
     curl_setopt($ch, CURLOPT_HTTPHEADER,['User-Agent:com.coocaa.iptv.IPTVApplication']);
     $res = curl_exec($ch);
     curl_close($ch);
     return $res;
     }
?>
