<?php
error_reporting(0);
$id = isset($_GET['id'])?$_GET['id']:'cctv1';
$n = [
  "cctv1" => "cctv1",//CCTV-1综合
  "cctv2" => "cctv2",//CCTV-2财经
  "cctv4" => "cctv4",//CCTV-4中文国际
  "cctv6" => "cctv6hd",//CCTV-6电影
  "cctv7" => "cctv7",//CCTV-7国防军事
  "cctv10" => "cctv10",//CCTV-10科教
  "cctv12" => "cctv12",//CCTV-12社会与法
  "cctv13" => "cctv13",//CCTV-13新闻
  "cctv17" => "cctv17",//CCTV-17农业农村
  "cgtn" => "cgtn",//CGTN

  "cetv1" => "cetv1",//CETV-1中教1台

  "bjws" => "bjtv",//北京卫视
  "dfws" => "dftv",//东方卫视
  "tjws" => "tjtv",//天津卫视
  "cqws" => "cqtv",//重庆卫视
  "hljws" => "hljtv",//黑龙江卫视
  "jlws" => "jltv",//吉林卫视
  "ybws" => "ybtv",//延边卫视
  "lnws" => "lntv",//辽宁卫视
  "nmgws" => "nmhtv",//内蒙古卫视
  "nmmws" => "nmmtv",//内蒙古卫视蒙语
  "nxws" => "nxtv",//宁夏卫视
  "gsws" => "gstv",//甘肃卫视
  "qhws" => "qhtv",//青海卫视
  "adws" => "qhadtv",//安多卫视
  "sxws" => "shaanxitv",//陕西卫视
  "hbws" => "hebeitv",//河北卫视
  "sxiws" => "shanxitv",//山西卫视
  "sdws" => "sdtv",//山东卫视
  "ahws" => "ahtv",//安徽卫视
  "henws" => "henantv",//河南卫视
  "hubws" => "hubeitv",//湖北卫视
  "hunws" => "hunantv",//湖南卫视
  "jxws" => "jxtv",//江西卫视
  "jsws" => "jstv",//江苏卫视
  "zjws" => "zjtv",//浙江卫视
  "dnws" => "dntv",//东南卫视
  "hxws" => "hxtv",//海峡卫视
  "xmws" => "xmtv",//厦门卫视
  "gdws" => "gdtv",//广东卫视
  "szws" => "sztv",//深圳卫视
  "dwqws" => "nftv",//大湾区卫视
  "gxws" => "gxtv",//广西卫视
  "ynws" => "yntv",//云南卫视
  "gzws" => "gztv",//贵州卫视
  "scws" => "sctv",//四川卫视
  "kbws" => "kbtv",//康巴卫视
  "xjws" => "xjtv",//新疆卫视
  "btws" => "bttv",//兵团卫视
  "xzws" => "xztv",//西藏卫视
  "xzws" => "xzzytv",//西藏藏语卫视
  "hinws" => "lytv",//海南卫视

  "sdjy" => "sdetv",//山东教育
  ];

$url = "https://gw-proxy-api.xuexi.cn/v1/api/exchangeAuthUrl";
$res_url="https://live-pc.xuexi.cn/merged/{$n[$id]}_merge.m3u8";
$res_type='201';
$y_token= hash("sha256", $res_url.'_'.$res_type.'__1d66f6b2-442a-4834-ba8c-c265e8769931');

$post = '{"res_type":'.$res_type.',"res_url":"'.$res_url.'","request_id":"","item_id":"1","y_token":"'.$y_token.'"}';
$h = ['Content-Type: application/json','x-lwp-uid: 17083432466806794@pc-live',];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POST,1);
curl_setopt($ch, CURLOPT_HTTPHEADER,$h);
curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data,1);
$playurl = $json['data']['auth_url'];
header('Content-Type: application/vnd.apple.mpegurl');
header('location:'.$playurl);
//echo $playurl;
?>
