<?php
header("ACCESS-CONTROL-ALLOW-ORIGIN:*");
$id = isset($_GET['id'])?$_GET['id']:'cctv1';
$n = [
    'cctv1' => '488', //CCTV1综合
    'cctv2' => '061', //CCTV2财*
    'cctv3' => '062', //CCTV3综艺
    'cctv4' => '063', //CCTV4中文国际
    'cctv5' => '064', //CCTV5体育
    'cctv5p' => '246', //CCTV5+体育赛事
    'cctv6' => '065', //CCTV6电影
    'cctv7' => '127', //CCTV7国防军事
    'cctv8' => '066', //CCTV8电视剧
    'cctv9' => '128', //CCTV9纪录
    'cctv10' => '129', //CCTV10科教
    'cctv11' => '130', //CCTV11戏曲
    'cctv12' => '131', //CCTV12注会与法
    'cctv13' => '067', //CCTV13新闻
    'cctv14' => '132', //CCTV14少儿
    'cctv15' => '133', //CCTV15音乐
    'cctv17' => '204', //CCTV17农业农村
    
    'dszn' => '164', //CCTV电视指南
    'nxss' => '176', //CCTV女性时尚
    'sjdl' => '177', //CCTV世界地理
    
    'fxzl' => '151', //种养新影-发现之旅
    'lgs' => '166', //种养新影-老故事
    
    'sh' => '180', //书画
    'zgtq' => '160', //中国天气
    'yggw' => '079', //央广购物
    'cwjd' => '635', //重温经典

    'cgtn' => '134', //CGTN
    'cgtn2' => '305', //CGTN
    'cgtne' => '306', //CGTN西语
    'cgtnf' => '307', //CGTN法语
    'cgtna' => '308', //CGTN阿语
    'cgtnr' => '309', //CGTN俄语

    'bjws' => '083', //北京卫视
    'dfws' => '093', //东方卫视
    'tjws' => '084', //天津卫视
    'cqws' => '107', //重庆卫视
    'hljws' => '095', //黑龙江卫视
    'jlws' => '097', //吉林卫视
    'ybws' => '117', //延边卫视
    'lnws' => '058', //辽宁卫视
    'nmws' => '110', //内蒙古卫视
    'nxws' => '118', //宁夏卫视
    'gsws' => '119', //甘肃卫视
    'qhws' => '111', //青海卫视
    'sxws' => '114', //陕西卫视
    'sxws2' => '512', //陕西卫视2
    'nlws' => '122', //农林卫视
    'hbws' => '108', //河北卫视
    'sxiws' => '109', //山西卫视
    'sdws' => '099', //山东卫视
    'ahws' => '096', //安徽卫视
    'hnws2' => '339', //河南卫视
    'hubws' => '102', //湖北卫视
    'hunws' => '086', //湖南卫视
    'jxws' => '098', //江西卫视
    'jsws' => '085', //江苏卫视
    'zjws' => '094', //浙江卫视
    'dnws' => '483', //东南卫视
    'gdws' => '092', //广东卫视
    'szws' => '100', //深圳卫视
    'gxws' => '116', //广西卫视
    'ynws' => '482', //云南卫视
    'gzws' => '101', //贵州卫视
    'scws' => '103', //四川卫视
    'xjws' => '150', //新疆卫视
    'btws' => '124', //兵团卫视
    'xzws' => '121', //西藏卫视
    'hinws' => '473', //海南卫视

    'bjjskj' => '113', //北京纪实科教
    'kkse' => '106', //卡酷少儿
    'shdy' => '229', //四海钓鱼
    'cmpd' => '146', //车迷频道
    'hqly' => '147', //环球旅游
    'sthj' => '149', //生态环境
    'yybb' => '153', //优优宝贝
    'bxjk' => '219', //百姓健康
    'zhtc' => '158', //中华特产
    'jshqjx' => '078', //聚鲨环球精选*

    'fztd' => '162', //法治天地
    'xsj' => '249', //新视觉*

    'qm' => '168', //汽摩*

    'lq' => '237', //篮球*
    'jygw' => '082', //家有购物*
    'jtlc' => '139', //家庭理财
    'xdm' => '140', //新动漫*
    'wlqp' => '141', //网络棋牌
    'yxjj' => '142', //游戏竞技
    'dzty' => '143', //电子体育
    'bfds' => '187', //北方导视
    'lnds' => '068', //辽宁都市*
    'lnds' => '610', //辽宁都市*
    'lnysj' => '070', //辽宁影视剧
    'lnbf' => '071', //辽宁北方*
    'lnty' => '611', //辽宁体育
    'lnsh' => '073', //辽宁生活
    'lnjyqs' => '075', //辽宁教育青少
    'lnjj' => '076', //辽宁经济*
    'lnjj' => '480', //辽宁经济*
    'lngg' => '077', //辽宁公共*
    'lngg' => '481', //辽宁公共*
   
    'syxwzh' => '059', //沈阳新闻综合
    'fszh' => '275', //抚顺综合
    'asxwzh' => '274', //鞍山新闻综合
    'dlxwzh' => '273', //大连新闻综合
    'ddxwzh' => '276', //丹东新闻综合
    'jzxwzh' => '277', //锦州新闻综合
    'fxzh' => '279', //阜新综合
    'lyxwzh' => '280', //辽阳新闻综合
    'ykxwzh' => '278', //营口新闻综合
    'pjxwzh' => '283', //盘锦新闻综合
    'tlxwzh' => '281', //铁岭新闻综合
    'cyxwzh' => '282', //朝阳新闻综合
    'bxzh' => '312', //本溪综合
    'lsqzh' => '491', //连山区综合
    'lgqzh' => '490', //龙港区综合
    'hldxwzh' => '284', //葫芦岛新闻综合
];    
$head_httplive = 'http://httplive.slave.bfgd.com.cn:14311';
$head_httpstream = 'http://httpstream.slave.bfgd.com.cn:14312';
$playseek = $_GET['playseek']??'';
$starttime = $_GET['starttime']??'';
$endtime = $_GET['endtime']??'';
$header = [
    "user-agent: ".$_SERVER['HTTP_USER_AGENT']
];
$arr = [
	'R5F2408FEU3198804BK78052214IE73560DFP2BF4M340CE68V0Z339CBW1626D4D261E46FEA',
	'R621C86FCU319FA04BK783FB5EBIFA29A0DEP2BF4M340CAC5V0Z339C9W16D7E5AFCA1ADFD1',
    ];
$accesstoken = $arr[array_rand($arr)];    
if (empty($playseek) && empty($starttime)) {//直播
    $url = 'http://slave.bfgd.com.cn/media/channel/get_info?chnlid=4200000' . $n[$id] . '&accesstoken=' . $accesstoken;
    $result = file_get_contents($url);
    $json = json_decode($result);
    $playtoken = isset($json->play_token) ? $json->play_token : 'ABCDEFGH';
    $playurl = $head_httplive . '/playurl?playtype=live&protocol=hls&accesstoken=' . $accesstoken . '&programid=4200000' . $n[$id] . '&playtoken=' . $playtoken;
    $m3u8 = get_data($playurl,$header);
    echo preg_replace('/(http):\/\/([^\/]+)/i', $head_httplive, $m3u8);
}else {
    $url = 'http://slave.bfgd.com.cn/media/event/get_info?accesstoken=' . $accesstoken . '&eventid=' . $n[$id];
    $result = file_get_contents($url);
    $json = json_decode($result);
    $_playtoken = $json->play_token;
    $playurl = $head_httpstream . '/playurl?playtype=lookback&protocol=hls&starttime=' . $starttime . '&endtime=' . $endtime . '&accesstoken=' . $accesstoken . '&programid=' . $n[$id] . '&playtoken=' . $_playtoken;
    $m3u8 = getcurl($playurl,$header);
    echo preg_replace('/(http):\/\/([^\/]+)/i', $head_httpstream, $m3u8);
}

function get_data($url, $header, $post = null){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 2);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    if (!empty($post)) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
?>
