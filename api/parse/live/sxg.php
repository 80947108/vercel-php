<?php
date_default_timezone_set("Asia/Shanghai");
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv1';
$n = [
  //央视
  "emdy4k" => ["emdy4k", "8000"],  //4K超高清
  "cctv1" => ["CCTV-1H265", "4000"],  //CCTV1
  "cctv2" => ["CCTV-2H265", "4000"],  //CCTV2
  "cctv3" => ["CCTV-3H265", "4000"],  //CCTV3
  "cctv4" => ["CCTV-4H265", "4000"],  //CCTV4
  "cctv5" => ["CCTV-5H265", "4000"],  //CCTV5
  "cctv5p" => ["CCTV-5plusH265", "4000"],  //CCTV5+
  "cctv6" => ["CCTV-6H265", "4000"],  //CCTV6
  "cctv7" => ["CCTV-7H265", "4000"],  //CCTV7
  "cctv8" => ["CCTV-8H265", "4000"],  //CCTV8
  "cctv9" => ["CCTV-9H265", "4000"],  //CCTV9
  "cctv10" => ["CCTV-10H265", "4000"],  //CCTV10
  "cctv11" => ["CCTV-11-H265", "4000"],  //CCTV11
  "cctv12" => ["CCTV-12H265", "4000"],  //CCTV12
  "cctv13" => ["CCTV-xw", "4000"],  //CCTV13
  "cctv14" => ["CCTV-14H265", "4000"],  //CCTV14
  "cctv15" => ["CCTV-15-yyH265", "4000"],  //CCTV15
  "cctv16" => ["CCTV-16", "4000"],  //CCTV16
  "cctv17" => ["CCTV-17", "4000"],  //CCTV17
  "cctv4k" => ["ys4Kcq", "2000"],  //CCTV-4K 超高清
  "cctv16-4k" => ["CCTV-16-4K", "8000"],  //CCTV-16 奥林匹克 4K
  "cetv1" => ["CETV-1H264", "4000"],  //CETV1
  "cetv2" => ["CETV-2", "4000"],  //CETV2
  "chcdz" => ["wqCHCdzdyH265", "4000"],  //CHC动作电影
  "chcgq" => ["lnwsCHC-HDH265", "4000"],  //CHC高清电影
  "chcjt" => ["jbtygqCHCjtyyH265", "4000"],  //CHC家庭影院
  //卫视
  "bjws" => ["bjwsH265", "4000"],  //北京卫视
  "ahws" => ["ahwsH265", "4000"],  //安徽卫视
  "dfws" => ["dfwsH265", "4000"],  //东方卫视
  "dnws" => ["dnwsfjwsH265", "4000"],  //东南卫视
  "gdws" => ["gdwsH265", "4000"],  //广东卫视
  "gzws" => ["gzwsH265", "4000"],  //贵州卫视
  "hnws" => ["hnws35", "4000"],  //河南卫视
  "hljws" => ["hljwsH265", "4000"],  //黑龙江卫视
  "hbws" => ["hbwsH265", "4000"],  //湖北卫视
  "hunws" => ["hnwsH265", "4000"],  //湖南卫视
  "jlws" => ["jlwsH265", "4000"],  //吉林卫视
  "jsws" => ["jswsH265", "4000"],  //江苏卫视
  "jxws" => ["jxwsH265", "4000"],  //江西卫视
  "lnws" => ["lnwsHDH264", "4000"],  //辽宁卫视
  "sdws" => ["sdwsH265", "4000"],  //山东卫视
  "szws" => ["szwsH265", "4000"],  //深圳卫视
  "scws" => ["scwsH265", "4000"],  //四川卫视
  "tjws" => ["tjwsH265", "4000"],  //天津卫视
  "zjws" => ["zjwsH265", "4000"],  //浙江卫视
  "cqws" => ["cqwsH265", "4000"],  //重庆卫视
  "qhws" => ["qhwsH264", "2000"],  //青海卫视
  "btws" => ["btws", "4000"],  //兵团卫视
  "gsws" => ["gsws", "4000"],  //甘肃卫视
  "gxws" => ["gxws", "4000"],  //广西卫视
  "hanws" => ["hnws", "4000"],  //海南卫视
  "kbws" => ["kbwsH264", "2000"],  //康巴卫视
  "nmws" => ["nmgws", "4000"],  //内蒙古卫视
  "sdjy" => ["sdjy", "4000"],  //山东教育卫视
  "sxiws" => ["sxws42", "4000"],  //山西卫视
  "sxws" => ["sxws", "4000"],  //陕西卫视
  "xzws" => ["xzwsH264", "2000"],  //西藏卫视
  "ynws" => ["ynws", "4000"],  //云南卫视
  "fhws" => ["test1", "4000"],  //凤凰中文
  "fhzx" => ["test2", "4000"],  //凤凰资讯
  //地方
  "abwy" => ["wypdgqH265", "4000"],  //阿坝文艺
  "abzh" => ["abxwzhpdgq", "2000"],  //阿坝综合
  "ayzh" => ["ayxwzh", "4000"],  //安岳综合
  "azzh" => ["azgq", "2000"],  //安州综合
  "baz" => ["bzxw", "4000"],  //巴州
  "bxzh" => ["bxdst", "2000"],  //宝兴综合
  "bchzh" => ["bcxwHD", "2000"],  //北川综合
  "cxzh" => ["cxxwgqH265", "4000"],  //苍溪综合
  "cpd" => ["cpd", "4000"],  //茶频道
  "chtzh" => ["ctxwzh", "2000"],  //朝天综合
  "chdgx" => ["cdgxdstgq", "2000"],  //成都高新区
  "chdgg" => ["CDTV-5", "4000"],  //成都公共
  "chdxw" => ["CDTV-1", "4000"],  //成都新闻
  "chzzh" => ["czyt", "4000"],  //崇州综合
  "cwdh" => ["cwdsHDH264", "4000"],  //川网导视
  "chszh" => ["csxw", "2000"],  //船山综合
  "dcxw" => ["dcxwzh", "2000"],  //达川新闻
  "dcds" => ["dzds", "2000"],  //达州导视
  "dztc" => ["tcq", "2000"],  //达州通川
  "dzwh" => ["dzgg", "2000"],  //达州文化
  "dzxw" => ["dzxwzh", "2000"],  //达州新闻
  "day" => ["dyytH265", "4000"],  //大邑
  "dyxw" => ["dyxwzhH265", "4000"],  //大英新闻
  "dfcj" => ["dfcj", "4000"],  //东方财经
  "dmxch" => ["yybb-dmxc-H265", "4000"],  //动漫秀场
  "dusjc" => ["yxfydsjcHDH265", "4000"],  //都市剧场
  "ebzh" => ["ebdst", "2000"],  //峨边综合
  "emzh" => ["emsxw", "2000"],  //峨眉综合
  "emdy" => ["emdygqH265", "4000"],  //峨嵋电影
  "eyxw" => ["eyxw", "2000"],  //恩阳新闻
  "fztd" => ["fztx", "4000"],  //法治天地
  "pczh" => ["fcgq", "2000"],  //涪城综合
  "gzzh" => ["gzxwzh", "2000"],  //甘孜综合
  "gx" => ["gxt", "2000"],  //高县
  "gxxw" => ["gxzh", "2000"],  //珙县新闻
  "glxw" => ["glxwzhgq", "2000"],  //古蔺新闻
  "guwh" => ["gyggH265", "4000"],  //广元文化
  "gyzh" => ["gyzhH265", "4000"],  //广元综合
  "hyxw" => ["hyzh", "2000"],  //洪雅新闻
  "jjxw" => ["jjxw", "2000"],  //夹江新闻
  "jgzh" => ["jgxwzhH265", "4000"],  //剑阁综合
  "jkhzh" => ["jkhdst", "2000"],  //金口河综合
  "jnbq" => ["jnyx", "2000"],  //金牛 标清
  "jsxt" => ["jspd", "4000"],  //金色学堂
  "jit" => ["jtzhpd", "2000"],  //金堂
  "jyjs" => ["jyjsHDH265", "4000"],  //金鹰纪实
  "jykt" => ["jykt", "2000"],  //金鹰卡通
  "jbty" => ["lqhxjcHDH265", "4000"],  //劲爆体育
  "jpds" => ["jpdsH265", "4000"],  //精品导视
  "jyxw" => ["jyxwzh162", "2000"],  //井研新闻
  "kjxw" => ["kjxwzh", "2000"],  //开江新闻
  "kd" => ["gzkdxwzh", "2000"],  //康定
  "klcd" => ["fyzqklcdHDH265", "4000"],  //快乐垂钓
  "lswl" => ["lsggpd", "4000"],  //乐山文旅
  "lsxw" => ["lsxwzh", "4000"],  //乐山新闻
  "ly" => ["qjs-HDH265", "4000"],  //乐游
  "lzzh" => ["lezhixwzh", "4000"],  //乐至综合
  "lypd" => ["ly", "4000"],  //梨园频道
  "lzzh" => ["lzxwzh", "2000"],  //利州综合
  "lsxw" => ["lsxwHDH265", "4000"],  //凉山新闻
  "lsyyzh" => ["yyzh", "2000"],  //凉山彝语综合
  "lczh" => ["lcxw", "2000"],  //隆昌综合
  "lszh" => ["lszh", "2000"],  //庐山综合
  "ldzh" => ["ldxw", "4000"],  //泸定综合
  "mbzh" => ["mbxwzh", "2000"],  //马边综合
  "msgg" => ["msgg", "2000"],  //眉山公共
  "mszh" => ["msxwzhgq", "2000"],  //眉山综合
  "mlzq" => ["mlyy", "4000"],  //魅力足球
  "myzh" => ["myxwzh", "2000"],  //米易综合
  "mykj" => ["myetH265", "4000"],  //绵阳科技
  "myxw" => ["myytH265", "4000"],  //绵阳新闻
  "ms" => ["msdstH265", "2000"],  //名山
  "mul" => ["mltHD", "4000"],  //木里
  "mczh" => ["mcxw", "2000"],  //沐川综合
  "ncgg" => ["ncgg", "4000"],  //南充公共
  "nczh" => ["ncxwzh", "2000"],  //南充综合
  "nj" => ["njxw", "2000"],  //南江
  "nxzh" => ["nxt", "2000"],  //南溪综合
  "pgxw" => ["pgxwzh", "2000"],  //攀钢新闻
  "pzhxw" => ["pzhytH265", "4000"],  //攀枝花新闻
  "pszh" => ["pszh", "2000"],  //彭山综合
  "pzzh" => ["pzxwzh", "2000"],  //彭州综合
  "pxixw" => ["pxxw", "2000"],  //蓬溪新闻
  "pxxw" => ["pxds1", "2000"],  //郫县新闻
  "pczh" => ["pcxw", "2000"],  //平昌综合
  "pwzh" => ["pwgq", "4000"],  //平武综合
  "pshzh" => ["psxwzh", "2000"],  //屏山综合
  "pjzh" => ["pjxw", "4000"],  //蒲江综合
  "jbjzh" => ["qbjxwzh", "2000"],  //青白江综合
  "qszh" => ["qszh", "2000"],  //青神综合
  "qlzh" => ["qlds1t", "2000"],  //邛崃综合
  "qxxw" => ["qxxwzh", "2000"],  //渠县新闻
  "rhxw" => ["rhxwH264", "2000"],  //仁和新闻
  "rszh" => ["msrszh", "2000"],  //仁寿综合
  "rxzh" => ["rxzh", "2000"],  //荣县综合
  "stzh" => ["stxwHD", "2000"],  //三台综合
  "swrm" => ["swxwzh", "2000"],  //沙湾融媒
  "sfxw" => ["sfx", "2000"],  //什邡新闻
  "shss" => ["shssH265", "4000"],  //生活时尚
  "scfn" => ["SCTV-7-", "4000"],  //四川妇女
  "scjj" => ["SCTV-2-H265", "4000"],  //四川经济
  "scjk" => ["SCTV-ggSCTV-8", "4000"],  //四川科教
  "scwh" => ["SCTV-3-H265", "4000"],  //四川文化
  "scxc" => ["SCTV-kjSCTV-9-", "4000"],  //四川乡村
  "scxw" => ["SCTV-4H265", "4000"],  //四川新闻
  "scys" => ["SCTV-5-scysH265", "4000"],  //四川影视
  "spzh" => ["spxwzhpdH264", "2000"],  //松潘综合
  "snwh" => ["sngggq", "2000"],  //遂宁文化
  "snzh" => ["snxwzhHDH265", "4000"],  //遂宁综合
  "tqxw" => ["tqzh", "2000"],  //天泉新闻
  "tjzh" => ["tjxwH265", "4000"],  //通江综合
  "wy" => ["wyxwzh", "2000"],  //万源
  "wczh" => ["wcxwzhH265", "4000"],  //旺苍综合
  "wjzh" => ["wjytH264", "2000"],  //温江综合
  "wwbk" => ["wwbk", "4000"],  //文物宝库
  "wtq" => ["wtqxwzh", "2000"],  //五通桥
  "wssj" => ["wssj", "4000"],  //武术世界
  "xc" => ["xctHD", "2000"],  //西昌
  "xczh" => ["xczh", "2000"],  //西充综合
  "xdzh" => ["xdzhpd", "2000"],  //新都综合
  "xj" => ["xjzh", "4000"],  //新津
  "xw" => ["xwt", "2000"],  //兴文
  "xhzh" => ["xhxwzh", "2000"],  //宣汉综合
  "yagg" => ["yagg", "2000"],  //雅安公共
  "yaxw" => ["yazh", "2000"],  //雅安新闻
  "yb" => ["ybtgq", "2000"],  //盐边
  "ytzh" => ["ytzh", "2000"],  //盐亭综合
  "yj" => ["yjxw", "2000"],  //雁江
  "ybds" => ["ybds", "2000"],  //宜宾导视
  "xjd" => ["xjdst", "2000"],  //荥经
  "ysxw" => ["ysxw", "2000"],  //营山
  "ycxw" => ["ycxw", "2000"],  //岳池
  "yxzh" => ["yxt", "4000"],  //越西综合
  "cnzh" => ["znzh", "2000"],  //长宁综合
  "zhzh" => ["zhxwzh", "2000"],  //昭化综合
  "zjzh" => ["zjxwzh", "2000"],  //中江综合
  "zyxw" => ["zyxwzh", "2000"],  //资阳新闻
  "zzzh" => ["zzzh", "2000"],  //资中综合
  "ztgq" => ["ztgq", "2000"],  //梓潼综合
  "zgsh" => ["zggg", "4000"],  //自贡生活
  "zgzh" => ["zgxw", "4000"],  //自贡综合
  "cwjd" => ["CWJD", "4000"],  //重温经典
  "xsj" => ["ycxsjH265", "4000"], //新视觉
  "qyzh" => ["qyzh", "4000"] //青羊
];

$file_contents = file('xg.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// 初始化数组
$ipList = array();

// 将每一行的内容添加到数组中
foreach ($file_contents as $line) {
  $ipList[] = trim($line);
}

$timestamp = intval((time() - 60) / 6);
$mh = curl_multi_init(); // Initialize multi cURL handler
$chArray = [];

foreach ($ipList as $ip) {
  $playurl = "http://" . $ip . "/live2.rxip.sc96655.com/live/" . $n[$id][0] . "_" . $n[$id][1] . ".m3u8?E=1&U=1&A=1&K=1&P=1&S=1";
  //$playurl = "http://" . $ip . "/live2.rxip.sc96655.com/live/8ne5i_sccn," . $n[$id][0] . "_hls_pull_" . $n[$id][1] . "K/" . rtrim(chunk_split($timestamp, 3, "/"), "/") . ".ts?E=1&U=1&A=1&K=1&P=1&S=1";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $playurl);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1); // Increased timeout to 1 second
  curl_setopt($ch, CURLOPT_TIMEOUT, 1); // Increased timeout to 1 second
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Disable SSL verification
  curl_setopt($ch, CURLOPT_USERAGENT, "user-agent:" . $_SERVER['HTTP_USER_AGENT']);
  curl_multi_add_handle($mh, $ch); // Add cURL handle to multi handler
  $chArray[$ip] = $ch;
  // print_r($playurl);
}

$running = null;
do {
  curl_multi_exec($mh, $running);
} while ($running > 0);

$fastestIP = "58.216.99.148:80";
$fastestTime = PHP_INT_MAX;

foreach ($chArray as $ip => $ch) {
  $info = curl_getinfo($ch);
  if ($info['http_code'] == 200) {
    $time_end = microtime(true);
    $execution_time = $info['total_time'];
    if ($execution_time < $fastestTime) {
      $fastestIP = $ip;
      $fastestTime = $execution_time;
    }
  }
  curl_multi_remove_handle($mh, $ch); // Remove handle from multi handler
  curl_close($ch);
}

curl_multi_close($mh); // Close multi handler
// if (!empty($fastestIP)) {
//   if (isset($n[$id][1])) {
//     $stream = "http://$fastestIP/live2.rxip.sc96655.com/live/8ne5i_sccn,{$n[$id][0]}_hls_pull_{$n[$id][1]}K/";
//   } else {
//     $stream = "http://$fastestIP/live2.rxip.sc96655.com/live/8ne5i_sccn,{$n[$id][0]}_hls_pull_4000K/";
//   }
//   $current = "#EXTM3U" . "\r\n";
//   $current .= "#EXT-X-VERSION:3" . "\r\n";
//   $current .= "#EXT-X-TARGETDURATION:6" . "\r\n";
//   $current .= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}" . "\r\n";
//   for ($i = 0; $i < 6; $i++) {
//     $current .= "#EXTINF:6," . "\r\n";
//     $current .= $stream . rtrim(chunk_split($timestamp, 3, "/"), "/") . ".ts?E=1&U=1&A=1&K=1&P=1&S=1" . "\r\n";
//     $timestamp = $timestamp + 1;
//   }
//   header("Content-Disposition: attachment; filename=index.m3u8");
//   echo $current;
// } else {
//   // Handle case where no valid IP is found
//   echo "No valid IP found.";
// }
if (!empty($fastestIP)) {
  $playseek = $_GET['playseek'] ?? '';
  $starttime = $_GET['starttime'] ?? '';
  $endtime = $_GET['endtime'] ?? '';
  if (empty($playseek) && empty($starttime)) { //直播
    $stream = "http://" . $fastestIP . "/live2.rxip.sc96655.com/live/" . $n[$id][0] . "_" . $n[$id][1] . ".m3u8?E=1&U=1&A=1&K=1&P=1&S=1";
    header("Content-Type: application/vnd.apple.mpegurl");
    header('location:' . $stream);
  } else {
    $stream = "http://" . $fastestIP . "/live2.rxip.sc96655.com/live/8ne5i_sccn,{$n[$id][0]}_hls_pull_{$n[$id][1]}K/";
    $t_arr = explode('-', $playseek);
    $starttime = strtotime($t_arr[0]);
    $endtime = strtotime($t_arr[1]);

    /*媒体序列号获取*/
    $x = '6';
    $y = '0';
    $s_t = round($starttime / $x) + $y;
    $e_t = round($endtime / $x) + $y;

    $current = "#EXTM3U" . "\r\n";
    $current .= "#EXT-X-VERSION:3" . "\r\n";
    $current .= "#EXT-X-TARGETDURATION:6" . "\r\n";
    $current .= "#EXT-X-MEDIA-SEQUENCE:{$s_t}" . "\r\n";

    for (; $s_t < $e_t; $s_t++) {
      $current .= "#EXTINF:6," . "\r\n";
      $current .= $stream . rtrim(chunk_split($s_t, 3, "/"), "/") . ".ts?E=1&U=1&A=1&K=1&P=1&S=1" . "\r\n";
    }
    $current .= "#EXT-X-ENDLIST"; //结束标志
    header("Content-Type: application/vnd.apple.mpegURL");
    header("Content-Disposition: attachment; filename=qist.m3u8");
    echo $current;
  }
} else {
  // Handle case where no valid IP is found
  echo "No valid IP found.";
}
