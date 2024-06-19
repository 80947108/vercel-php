<?php
date_default_timezone_set("Asia/Shanghai");
header('Access-Control-Allow-Origin:*');
header('Content-Type:text/plain;charset=UTF-8');
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv1';
$n = [
  "cctv1" => "live1004", //CCTV1综合
  "cctv2" => "live1002", //CCTV2财经
  "cctv3" => "live1005",//CCTV3综艺
  "cctv4" => "live1003",//CCTV4中文国际
  "cctv5" => "live1001",//CCTV5体育
  "cctv6" => "live1007",//CCTV6电影
  "cctv7" => "live1008",//CCTV7国防军事
  "cctv8" => "live1117",//CCTV8电视剧
  "cctv9" => "live1006",//CCTV9纪录
  "cctv10" => "live1011",//CCTV10科教
  "cctv11" => "live1009",//CCTV11戏曲
  "cctv12" => "live1012",//CCTV12社会与法
  "cctv13" => "live1116",//CCTV13新闻
  "cctv14" => "live1014",//CCTV14少儿
  "cctv15" => "live1015",//CCTV15音乐
  "yxt" => "live1121",//易县台
  "hbgg" => "live1119",//河北公共
  "hbse" => "live1124",//河北少儿
  "hbjj" => "live1018",//河北经济
  "hbnm" => "live1020",//河北农民
  "zgjr" => "live1028",//CFC中国金融
  "fhzx" => "live1115",//凤凰资讯
  "fhws" => "live1113",//凤凰卫视
"zjws" => "live1024",//浙江卫视
"hnws" => "live1026",//湖南卫视
"jsws" => "live1030",//江苏卫视
"tjws" => "live1033",//天津卫视
"ahws" => "live1032",//安徽卫视
"bjws" => "live1031",//北京卫视
"hnws" => "live1041",//河南卫视
"jxws" => "live1042",//江西卫视
"gzws" => "live1036",//贵州卫视
"hljws" => "live1038",//黑龙江卫视
"ynws" => "live1039",//云南卫视
"dfws" => "live1044",//东方卫视
"lnws" => "live1034",//辽宁卫视
"gdws" => "live1045",//广东卫视
"gxws" => "live1047",//广西卫视
"dnws" => "live1046",//东南卫视
"scws" => "live1035",//四川卫视
"szws" => "live1037",//深圳卫视
"sdws" => "live1040",//山东卫视
"nxws" => "live1049",//宁夏卫视
"jlws" => "live1054",//吉林卫视
"sxws" => "live1052",//山西卫视
"shxws" => "live1050",//陕西卫视
"gsws" => "live1051",//甘肃卫视
"qhws" => "live1055",//青海卫视
"nmgws" => "live1053",//内蒙古卫视
"lyws" => "live1057",//旅游卫视
"cctvfyyy" => "live1064",//风云音乐
"cctvdyjc" => "live1061",//第一剧场
"cctvhjjc" => "live1063",//怀旧剧场
"xzws" => "live1056",//西藏卫视
"kkse" => "live1058",//卡酷动画
"fyjc" => "live1062",//风云剧场
"jykt" => "live1059",//金鹰卡通
"fzye" => "live1073",//方舟幼儿
"rbjc" => "live1068",//热播剧场
"iptv" => "live1071",//IPTV野外
"iptv3" => "live1075",//IPTV3+
"iptv5" => "live1072",//IPTV5+
"iptv6" => "live1070",//IPTV6+
"iptv8" => "live1065",//IPTV8+
"sszn" => "live1074",//收视指南
"iptvdzjc" => "live1066",//IPTV谍战剧场
"iptvfz" => "live1069",//IPTV法治
"jddy" => "live1076",//经典电影
"xsxp" => "live1067",//相声小品
"ly" => "live1077",//梨园
"gx" => "live1084",//国学
"zqjy" => "live1087",//早期教育
"cqws" => "live1086",//重庆卫视
"bbjj" => "live1094",//动画片-宝宝家教
"gfjs" => "live1098",//国防军事
"hbws" => "live4320",//河北卫视
"dsj" => "live1104",//电视剧-鬼吹灯之牧野诡事1
"cdlk" => "live1122",//村东路口
"sjgw" => "live4321",//三佳购物
"mld" => "live1123",//马路东

];

$pid = $id;
$cid = $n[$id];
// print_r($pid);
header("Content-Type:application/vnd.apple.mpegurl;");
header("Content-Disposition:inline;filename={$cid}.m3u8");
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $onlineip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $onlineip = $_SERVER['REMOTE_ADDR'];
}
$useragent = $_SERVER['HTTP_USER_AGENT'];
$userid = md5($onlineip . $useragent);
$cacheFileName = 'url_cache_hbmklive_all.json';
$ipua = "120.2.68.45:10000";
$iplive = "120.2.68.45:5003";
$account = "100001000040";
$mac = "94:60:81:93:48:a8";
//$header = array(
$header = array(
  "Host: " . $ipua,
  "Referer: http://" . $ipua . "/player-live.html",
  "user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.289 Safari/537.36",
);
$headers = array(
  "Host: " . $iplive,
  "Origin: http://" . $ipua,
  "Referer: http://" . $ipua . "/player-live.html",
  "user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.289 Safari/537.36",
);
$header_1 = [
  "Host: " . $ipua,
  "Referer: http://" . $ipua . "/player-live.html",
  "Accept:application/json, text/javascript, */*; q=0.01",
  "Accept-Encoding:gzip, deflate",
  "Accept-Language:zh-CN,zh;q=0.9",
  "Connection:keep-alive",
  "Dnt:1",
  "X-Requested-With:XMLHttpRequest",
  "user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.289 Safari/537.36",
];
if (file_exists($cacheFileName)) {
  $currentTime = time();
  $cachedUrls = json_decode(file_get_contents($cacheFileName), true);
  foreach ($cachedUrls as $userIds => $pid) {
    foreach ($pid as  $times => $time) {
      //if ($currentTime - $time['timestamp'] > 30 || $currentTime - $time['pidtamp'] > 60 || $currentTime - $time['times'] > 1800 || !isset($time['token'])) {
      if ($currentTime - $time['pidtamp'] > 180 || !isset($time['token'])) {
        unset($cachedUrls[$userIds][$times]); // 如果缓存内包含大于5分钟或大于30分钟的节点，则删除该节点，避免提交数据以下接口
      }
    }
    $cachedUrls = array_filter($cachedUrls); // 清空无数据用户缓存
    file_put_contents($cacheFileName, json_encode($cachedUrls));
    $cachedUrls = json_decode(file_get_contents($cacheFileName), true);
  }

  if (isset($cachedUrls[$userid]) && isset($cachedUrls[$userid][$cid])) {
    $mac = $cachedUrls[$userid][$cid]['mac'];
    $timestamp = $cachedUrls[$userid][$cid]['timestamp'];
    $pidtamp = $cachedUrls[$userid][$cid]['pidtamp'];
    $token = $cachedUrls[$userid][$cid]['token'];
    if ($currentTime - $timestamp > 25) {
      $url = "http://" . $ipua . "/ualive?token=" . $token . "&_=" . getMillisecond();
      $json = json_decode(get_data($url, $header));
      $Ret = $json->Ret;
      if ($Ret == 0) {
        $cachedUrls[$userid][$cid] = [
          'token' => $token,
          'mac' => $mac,
          'timestamp' => time(),
          'pidtamp' => $pidtamp,
          'times' => $cachedUrls[$userid][$cid]['times']
        ];
        file_put_contents($cacheFileName, json_encode($cachedUrls));
      } else {
        unset($cachedUrls[$userid][$cid]);
      }
    }
    if ($currentTime - $pidtamp > 45) {
      $url = "http://" . $ipua . "/webapi/app_client?item=alive&hotel_id=1&room=101&type=2&mac=" . $mac . "&playing=" . $cid . "&_=" . getMillisecond();
      $json = json_decode(get_data($url, $header));
      $Ret = $json->ret;
      if ($Ret == 0) {
        $cachedUrls[$userid][$cid] = [
          'token' => $token,
          'mac' => $mac,
          'timestamp' => $timestamp,
          'pidtamp' => time(),
          'times' => $cachedUrls[$userid][$cid]['times']
        ];
        file_put_contents($cacheFileName, json_encode($cachedUrls));
      } else {
        unset($cachedUrls[$userid][$cid]);
      }
    }
      $urllive = "http://" . $iplive . "/" . $cid . ".m3u8?token=" . $token;
      $live = getJsons($urllive, $headers);
      if (strpos($live, '无效') !== false) {
        $live = "";
        unset($cachedUrls[$userid][$cid]);
      }
    }
    file_put_contents($cacheFileName, json_encode($cachedUrls));
    $cachedUrls = json_decode(file_get_contents($cacheFileName), true);
  }
  if (isset($live)) {
    $current = preg_replace("/(.*?.ts)/i", "http://" . $iplive . "/" . "$1", $live);
    echo $current;
} else {
  // $mac = getMac();
  //$mac=rand(0, 9);
  $jsonurl = "http://" . $ipua . "/HSAndroidLogin.ecgi?ty=json&mac_address1=&mac_address2=" . $mac . "&hotel_id=1&room=101&net_account=" . $account . "&opentype=0";

  $json = json_decode(get_data($jsonurl, $header_1));
  $token = $json->Token;
  if (isset($token)) {
    $url = "http://" . $ipua . "/ualive?cid=" . $cid . "&token=" . $token . "&_=" . getMillisecond();
    $jscid = getJsons($url, $header);
    $cachedUrls[$userid][$cid] = [
      'token' => $token,
      'mac' => $mac,
      'timestamp' => time(),
      'pidtamp' => time(),
      'times' => time()
    ];
    file_put_contents($cacheFileName, json_encode($cachedUrls));
    $urllive = "http://" . $iplive . "/" . $cid . ".m3u8?token=" . $token;
    $live = getJsons($urllive, $headers);
    $current = preg_replace("/(.*?.ts)/i", "http://" . $iplive . "/" . "$1", $live);
    echo $current;
  } else {
    echo "获取失败！";
  }
}
function getMillisecond()
{
  list($t1, $t2) = explode(' ', microtime());
  return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
}
function getJsons($url, $header)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_TIMEOUT, 5);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

function get_data($url, $header = array())
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);                                    //要访问网页 URL 地址
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);              //返回字符串，而非直接输出到屏幕上
  curl_setopt($ch, CURLOPT_HTTPHEADER, $header);              //常用的HTTP请求头与响应头
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);                        //不检查 SSL 证书来源
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);                        //不检查 证书中 SSL 加密算法是否存在  
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);                            //标识如果服务器10秒内没有响应
  $output = curl_exec($ch);
  curl_close($ch);
  return $output;
}
function getMac()
{
  $char1 = str_split("abcdef");
  $char2 = str_split("0123456789");
  $mBuffer = "";
  for ($i = 0; $i < 6; $i++) {
    $t = rand(0, count($char1) - 1);
    $y = rand(0, count($char2) - 1);
    $key = rand(0, 1);
    if ($key == 0) {
      $mBuffer .= $char2[$y] . $char1[$t];
    } else {
      $mBuffer .= $char1[$t] . $char2[$y];
    }
    if ($i != 5) {
      $mBuffer .= ":";
    }
  }
  return $mBuffer;
}
