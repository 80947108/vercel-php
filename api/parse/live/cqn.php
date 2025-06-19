<?php
error_reporting(0);
$cityId = '5A';
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv1';
$n = [
    //央视
    "cctv1" => ["cctv1HD"], //CCTV1综合
    "cctv2" => ["cctv2HD"], //CCTV2财*
    "cctv3" => ["cctv3HD"], //CCTV3综艺
    "cctv4" => ["cctv4HD"], //CCTV4中文国际
    "cctv5" => ["cctv5HD"], //CCTV5体育
    "cctv5p" => ["cctv5SportHD"], //CCTV5+体育赛事
    "cctv6" => ["cctv6HD"], //CCTV6电影
    "cctv7" => ["cctv7HD"], //CCTV7国防军事
    "cctv8" => ["cctv8HD"], //CCTV8电视剧
    "cctv9" => ["cctv9HD"], //CCTV9纪录
    "cctv10" => ["cctv10HD"], //CCTV10科教
    "cctv11" => ["cctv11HD"], //CCTV11戏曲
    "cctv12" => ["cctv12HD"], //CCTV12社会与法
    "cctv13" => ["CCTVNewsHD"], //CCTV13新闻
    "cctv14" => ["cctvseHD"], //CCTV14少儿
    "cctv15" => ["cctv15HD"], //CCTV15音乐
    "cctv16" => ["cctv16HD"], //CCTV16奥林匹克
    "cctv17" => ["cctv17HD"], //CCTV17农业农村
    "cctv4k" => ["CCTV4K"], //CCTV4K 高清
    "cctv16-4k" => ["CCTV16_4K"], //CCTV16-4K 高清

    "bqkj" => ["bqkjHD"], //CCTV兵器科技
    "dyjc" => ["diyijuchangHD"], //CCTV第一剧场
    "hjjc" => ["hjjcHD"], //CCTV怀旧剧场
    "fyjc" => ["fyjcHD"], //CCTV风云剧场
    "fyyy" => ["fyyyHD"], //CCTV风云音乐
    "fyzq" => ["fyzqHD"], //CCTV风云足球
    "whjp" => ["yswhHD"], //CCTV央视文化精品
    "nxss" => ["nvxing"], //CCTV女性时尚
    "gefwq" => ["golfHD"], //CCTV高尔夫网球
    "ystq" => ["ystqHD"], //CCTV央视台球
    "yggw" => ["yggw"], //CCTV央广购物
    "zsgw" => ["ysgw"], //CCTV中视购物

    "zxs" => ["qicai"], //种养新影-中学生
    "fxzl" => ["faxian"], //种养新影-发现之旅
    "lgs" => ["gushi"], //种养新影-老故事

    "sh" => ["shuhua"], //书画
    "zgtq" => ["tianqiSD"], //中国天气

    "cgtn" => ["cgtnSD"], //CGTN
    //中国教育
    "cetv1" => ["cetv-1SD"], //CETV1中教1台
    "cetv4" => ["cetv-4SD"], //CETV4中教4台
    "zqjy" => ["zaojiaoHD"], //CETV早期教育
    //CHC系列
    "chcgq" => ["chcgqdyHD"], //CHC高清电影
    "chcdz" => ["chcdzdyHD"], //CHC动作电影
    "chcjt" => ["chcjtyyHD"], //CHC家庭影院
    //卫视
    "bjws" => ["beijingHD"], //北京卫视
    "dfws" => ["shanghaiHD"], //东方卫视
    "tjws" => ["tianjinHD"], //天津卫视
    "cqws" => ["chongqingHD"], //重庆卫视
    "hljws" => ["heilongjiangHD"], //黑龙江卫视
    "jlws" => ["jilinHD"], //吉林卫视
    "lnws" => ["liaoningHD"], //辽宁卫视
    "nmws" => ["neimengkuSD"], //内蒙古卫视
    "nxws" => ["ningxia"], //宁夏卫视
    "qhws" => ["qinghaiSD"], //青海卫视
    "hbws" => ["hebeiSD"], //河北卫视
    "sxiws" => ["shanxiSD"], //山西卫视
    "ahws" => ["anhuiSD"], //安徽卫视
    "hnws" => ["henanHD"], //河南卫视
    "hubws" => ["hubeiSD"], //湖北卫视
    "hunws" => ["hunanHD"], //湖南卫视
    "jxws" => ["jiangxiHD"], //江西卫视
    "jsws" => ["jiangsuHD"], //江苏卫视
    "zjws" => ["zhejiangHD"], //浙江卫视
    "dnws" => ["dongnanHD"], //东南卫视
    "gdws" => ["guangdongHD"], //广东卫视
    "szws" => ["shenzhenHD"], //深圳卫视
    "gxws" => ["guangxiHD"], //广西卫视
    "ynws" => ["yunnanSD"], //云南卫视
    "gzws" => ["guizhouHD"], //贵州卫视
    "scws" => ["sichuanHD"], //四川卫视
    "xjws" => ["xinjiangSD"], //新疆卫视
    "btws" => ["bingtuanSD"], //兵团卫视
    "xzws" => ["xizangSD"], //西藏卫视
    "hinws" => ["hainanSD"], //海南卫视
    "ssws" => ["sanshaSD"], //三沙卫视
    //北京
    "bjjskj" => ["bjayjsSD"], //北京纪实科教
    "bjkk" => ["bjkakuSD"], //北京卡酷
    "zhtc" => ["techan"], //中华特产
    "sthj" => ["shengtai"], //生态环境
    "shdy" => ["diaoyu"], //四海钓鱼
    "cmpd" => ["doxtv"], //车迷频道
    "bxjk" => ["jiankangSD"], //百姓健康
    "hqqg" => ["car"], //环球奇观
    "hqly" => ["huanqiulvyou"], //环球旅游
    "yybb" => ["youxi"], //优优宝贝
    "jshwjx" => ["jusha"], //聚鲨环球精选
    //上海
    "dfcj" => ["dfcj"], //东方财*
    "hxjc" => ["hxjc_4K"], //欢笑剧场
    "dsjc" => ["dsjcHD"], //都市剧场
    "mlxq" => ["mlzqHD"], //魅力足球
    "dmxc" => ["dmxcHD"], //动漫秀场
    "yxfy" => ["yxfyHD"], //游戏风云
    "shss" => ["shenghuo"], //生活时尚
    "fztd" => ["fazhi"], //法治天地
    "jsxt" => ["jinse"], //金色学堂
    //重庆
    "cqxw" => ["CQTVNewsHD"], //重庆新闻
    "cqkj" => ["CQTVkejiaoHD"], //重庆科教
    "cqys" => ["cqyingshiHD"], //重庆影视
    "cqwtyl" => ["cqwtylHD"], //重庆文体娱乐
    "cqse" => ["cqseHD"], //重庆少儿
    "cqsssh" => ["cqssgwHD"], //重庆时尚生活
    "cqxnc" => ["cqggncHD"], //重庆新农村
    "cqshyf" => ["CQTVTrendyHD"], //重庆社会与法
    "cqyd" => ["mryyHD"], //重庆移动
    "cqqm" => ["cqcarSD"], //重庆汽摩
    "cgrm" => ["cqrongmei"], //重广融媒
    "akds" => ["aikanHD"], //爱看导视
    "hczh" => ["hechuan"], //合川综合
    "cszh" => ["changshou"], //长寿综合
    "yyzh" => ["youyang"], //酉阳综合
    "yunyzh" => ["jiangjinHD"], //云阳综合
    "tlzh" => ["tongliangzongheHD"], //铜梁综合
    //其他
    "jygw" => ["jygw"], //家有购物
    "xdm" => ["dongman"], //新动漫
    "zqfw" => ["jiazheng"], //证券服务
    "sdjy" => ["sdjiaoyuSD"], //山东教育
    "sctx" => ["soucang"], //收藏天下
    "gxpd" => ["guoxue"], //国学频道
    "klcd" => ["klcdHD"], //快乐垂钓
    "jykt" => ["jinyingSD"], //金鹰卡通
    "xfpy" => ["xianfeng"], //先锋乒羽
    "fsgw" => ["fsgw"], //风尚购物
    "cftx" => ["caifu"], //财富天下
    "tywq" => ["weiqi"], //天元围棋
    "sypd" => ["sheying"], //摄影频道
    "qsjl" => ["qsjlHD"], //求索纪录
    "cwjd" => ["cwjdHD"], //重温经典
];
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $onlineip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $onlineip = $_SERVER['REMOTE_ADDR'];
}

$cacheFileName = 'url_cache_cqn_all.json';
$cachedUrls = [];

$headers = [
    'user-agent: Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_1_2 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7D11 Safari/528.16',
    // 'x-forwarded-for:' . $onlineip,
    // 'client-ip:' . $onlineip,
];
if (file_exists($cacheFileName)) {
    $cachedUrls = json_decode(file_get_contents($cacheFileName), true);

    if (isset($cachedUrls[$id])) {
        $finalUrl = $cachedUrls[$id]['url'];
        $httpResponseCode = get_http_response_code($finalUrl, $headers);
        if ($httpResponseCode !== 200) {
            unset($cachedUrls[$id]);
        }
    }

    file_put_contents($cacheFileName, json_encode($cachedUrls));
}

if (isset($cachedUrls[$id])) {
    $finalUrl = $cachedUrls[$id]['url'];
    header("Content-Type: application/vnd.apple.mpegurl");
    header('Location: ' . $finalUrl);
    exit;
} else {
    $playId = $n[$id][0];
    $relativeId = $playId;
    $type = '1';
    $appId = "kdds-chongqingdemo";
    $url = 'http://portal.centre.bo.cbnbn.cn/others/common/playUrlNoAuth?cityId=5A&playId=' . $playId . '&relativeId=' . $relativeId . '&type=1';
    $timestamps = round(microtime(true) * 1000);
    $sign = md5('aIErXY1rYjSpjQs7pq2Gp5P8k2W7P^Y@appId' . $appId . "cityId" . $cityId . "playId" . $playId . "relativeId" . $relativeId . "timestamps" . $timestamps . "type" . $type);
    $header_4 = [
        'appId: kdds-chongqingdemo',
        'sign: ' . $sign,
        'timestamps:' . $timestamps,
        'Content-Type: application/json;charset=utf-8',
        'user-agent: Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_1_2 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobile/7D11 Safari/528.16',
        // 'x-forwarded-for:' . $onlineip,
        // 'client-ip:' . $onlineip,
    ];
    $url = json_decode(get_data($url, $header_4));
    $codes = isset($url->data->result->protocol[0]->transcode[0]->url) ? $url->data->result->protocol[0]->transcode[0]->url : '';

    if (!$codes) {
        echo 'Error: No video URL found in response';
    }
            header("Content-Type: application/vnd.apple.mpegurl");
            header('Location: ' . $codes);
            exit;

}
function get_data($url, $header, $host = null)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    if (!empty($host)) {
        curl_setopt($ch, CURLOPT_RESOLVE, $host);
        curl_exec($ch);
        $data = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    } else {
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, "CURL_HTTP_VERSION_1_1");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $data = curl_exec($ch);
    }
    curl_close($ch);
    return $data;
}

function get_http_response_code($url, $header)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 1); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_exec($ch);
    $httpResponseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $httpResponseCode;
}
