<?php
error_reporting(-1);
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv1';
$n = [
    'cctv1' => '608807420', //CCTV1综合
    'cctv2' => '631780532', //CCTV2财*
    'cctv3' => '624878271', //CCTV3综艺
    'cctv4' => '631780421', //CCTV4中文国际
    'cctv4a' => '608807416', //CCTV4美洲
    'cctv4o' => '608807419', //CCTV4欧洲
    'cctv5' => '641886683', //CCTV5体育
    'cctv5p' => '641886773', //CCTV5+体育赛事
    'cctv6' => '624878396', //CCTV6电影
    'cctv7' => '673168121', //CCTV7国防军事
    'cctv8' => '624878356', //CCTV8电视剧
    'cctv9' => '673168140', //CCTV9纪录
    'cctv10' => '624878405', //CCTV10科教
    'cctv11' => '667987558', //CCTV11戏曲
    'cctv12' => '673168185', //CCTV12社会与法
    'cctv13' => '608807423', //CCTV13新闻
    'cctv14' => '624878440', //CCTV14少儿
    'cctv15' => '673168223', //CCTV15音乐
    'cctv17' => '673168256', //CCTV17农业农村

    'fxzl' => '624878970', //CCTV发现之旅
    'lgs' => '884121956', //CCTV老故事
    'zxs' => '708869532', //CCTV中学生

    'cgtn' => '609017205', //CGTN
    'cgtnjl' => '609006487', //CGTN纪录
    'cgtne' => '609006450', //CCTV西班牙语
    'cgtnf' => '609006476', //CCTV法语
    'cgtna' => '609154345', //CCTV阿拉伯语
    'cgtnr' => '609006446', //CCTV俄语

    'dfws' => '651632648', //东方卫视x
    'cqws' => '738910914', //重庆卫视
    'jlws' => '738906889', //吉林卫视
    'lnws' => '630291707', //辽宁卫视
    'nmws' => '738911430', //内蒙古卫视
    'nxws' => '738910535', //宁夏卫视x
    'gsws' => '738910997', //甘肃卫视
    'qhws' => '738898486', //青海卫视
    'sxws' => '738910838', //陕西卫视
    'sdws' => '738910366', //山东卫视
    'hnws' => '790187291', //河南卫视
    'hubws' => '738906825', //湖北卫视
    'hunws' => '635491149', //湖南卫视x
    'jxws' => '783847495', //江西卫视
    'jsws' => '623899368', //江苏卫视
    'dnws' => '849116810', //东南卫视x
    'hxws' => '849119120', //海峡卫视
    'gdws' => '608831231', //广东卫视x
    'dwqws' => '608917627', //大湾区卫视
    'gxws' => '783844132', //广西卫视
    'ynws' => '783846580', //云南卫视
    'gzws' => '783845222', //贵州卫视
    'xjws' => '738910476', //新疆卫视
    'xzws' => '738910461', //西藏卫视
    'hinws' => '738906860', //海南卫视

    'shdy' => '895358641', //四海钓鱼

    'chcdzdy' => '644368714', //CHC动作电影
    'chcjtdy' => '644368373', //CHC家庭影院

    'dfys' => '617290047', //东方影视
    'shxwzh' => '651632657', //上海新闻综合
    'dycj' => '608780988', //上海第一财*
    'shjsrw' => '617289997', //上视纪实人文
    'shics' => '618954688', //上海外语
    'fztd' => '790188943', //法治天地
    'jbty' => '796071336', //劲爆体育
    'mlzq' => '796070308', //魅力足球
    'ly' => '796070452', //乐游
    'hxjc' => '790187880', //欢笑剧场
    'qcxj' => '796071456', //七彩戏剧
    'yxfy' => '790188417', //游戏风云

    'lttv' => '668225749', //临洮电视台

    'jscs' => '626064714', //江苏城市
    'jszy' => '626065193', //江苏综艺
    'jsys' => '626064697', //江苏影视
    'jsggxw' => '626064693', //江苏公共新闻
    'jsgj' => '626064674', //江苏国际
    'jsjy' => '628008321', //江苏教育
    'jstyxx' => '626064707', //江苏体育休闲
    'ymkt' => '626064703', //优漫卡通

    'njxwzh' => '838109047', //南京新闻综合
    'njkj' => '838153729', //南京教科
    'njsb' => '838151753', //南京十八

    'haxwzh' => '639731826', //淮安新闻综合
    'lygxwzh' => '639731715', //连云港新闻综合
    'szxwzh' => '639731952', //苏州新闻综合
    'tzxwzh' => '639731818', //泰州新闻综合
    'sqxwzh' => '639731832', //宿迁新闻综合
    'xzxwzh' => '639731747', //徐州新闻综合

    'gdys' => '614961829', //广东影视
    'jjkt' => '614952364', //嘉佳卡通

    'hllmc1' => '886916921',
    'hllmc29' => '746550517',
    'hllmc30' => '890213361',

    '24hyzb' => '895932793', //24小时亚洲杯频道
    'cbajd' => '788813182', //CBA经典
    'gdjys' => '631354620', //掼蛋精英赛
    'gqdp' => '629943678', //高清大片
    'hpjxss' => '780290695', //和平精英赛事
    'hslbt' => '713600957', //红色轮播台
    'jddhdjh' => '629942219', //经典动画大集合
    'jdxgdy' => '625703337', //经典深圳旁边电影
    'jsdp' => '617432318', //军事迷必看大片
    'ljcwhg' => '707671890', //历届春晚回顾
    'mg24hty' => '654102378', //咪咕24小时体育台
    'mglbt' => '788816794', //玫瑰轮播台
    'nbajd' => '788815380', //NBA经典
    'ozzqfy' => '788816794', //欧洲足球风云
    'qmpp' => '788818045', //全民乒乓
    'rjlb' => '629943613', //热剧联播
    'sszjd' => '646596895', //赛事最经典
    'ttmlh' => '629943305', //体坛名栏汇
    'ufcgdjx' => '788818804', //UFC格斗精选
    'wdlsjd' => '780288994', //五大联赛经典
    'xczx' => '713589837', //乡村振兴
    'xfzgn' => '617432318', //幸福中国年
    'xpfyt' => '619495952', //新片放映厅
    'yxlmss' => '780286989', //英雄联盟赛事
    'zjlxc' => '625133682', //周杰伦现场
    'zqzyp' => '629942228', //最强综艺趴

    'xmpd' => '609158151', //熊猫01高清
    'xm1' => '608933610', //熊猫1
    'xm2' => '608933640', //熊猫2
    'xm3' => '608934619', //熊猫3
    'xm4' => '608934721', //熊猫4
    'xm5' => '608935104', //熊猫5
    'xm6' => '608935797', //熊猫6
    'xm7' => '609169286', //熊猫7
    'xm8' => '609169287', //熊猫8
    'xm9' => '609169226', //熊猫9
    'xm10' => '609169285', //熊猫10

    'lsljtt' => '671441336', //龙胜龙脊梯田
    'dtx' => '671442114', //大藤峡
    'yc' => '671442018', //邕城
    'ylh' => '671653242', //遇龙河
    'kfjmgc' => '698638130', //开封金明广场
    'kfqmshyxm' => '698638118', //开封清明上河园西门
    'kflhgsgl' => '698638091', //开封连霍高速路口
    'kfgl' => '681448619', //开封鼓楼
    'whgg' => '670426991', //武汉光谷
    'whjhg' => '670426904', //武汉江汉关
    'whhhl' => '670427051', //武汉黄鹤楼

];

if (!empty($n[$id])) {
    $contId = $n[$id];
} else {
    $contId = $id;
}

$jsonData = file_get_contents('migu.json');

$datajson = json_decode($jsonData, true);


$data = array(
    "sourceID" => $datajson['sourceID'],
    "appType" => $datajson['appType'],
    "relayState" => $datajson['relayState'],
    "captcha" => $datajson['captcha'],
    "imgcodeType" => $datajson['imgcodeType'],
    "isAsync" => $datajson['isAsync'],
    "loginID" => $datajson['loginID'],
    "enpassword" => $datajson['enpassword'],
    "fingerPrint" => $datajson['fingerPrint'],
    "fingerPrintDetail" => $datajson['fingerPrintDetail'],
);

$postData = http_build_query($data);

$authnUrl = 'https://passport.migu.cn/authn';

$config = array(
    "Content-Type: application/x-www-form-urlencoded",
    "User-Agent: MiguVideo/2500090320 (iPhone; iOS 15.1.1; Scale/2.00)"
);

$autjson = json_decode(get_data($authnUrl, $config, $postData));

$miguToken = $autjson->result->token;

$deviceId = md5(uniqid('', true));
$timestamp = time();
$loginType = 'PWD';
$clientId = getUuid2();

$signData = [
    'miguToken' => $miguToken,
    'deviceId' => $deviceId,
    'timestamp' => $timestamp,
    'loginType' => $loginType,
];

$play = "https://webapi.miguvideo.com/userCenterLogin/login/migutokenforencrypt?sign=abcde&signType=AES&clientId={$clientId}";

$signpost = json_encode($signData);

$signheader = array(
    "Content-Type: application/json",
    "User-Agent: MiguVideo/2500090320 (iPhone; iOS 15.1.1; Scale/2.00)"
);

$signjson = json_decode(get_data($play, $signheader, $signpost));

$Userid = $signjson->userInfo->userId;
$Usertoken = $signjson->userInfo->userToken;
$Sign = $signjson->sign;
$Userinfo = json_encode($signjson->userInfo);
$mobile = $signjson->userInfo->mobile;

$timestamps = round(microtime(true) * 1000);
$salt = substr($timestamps, 4, 6) . "96";
$signID = getSign($contId);
$uuid = getUuid2();
$version= "2500090320";
$data = generateRandomString();
$channel= "0116_25000000-99000-100300010010001";

$playURL = "https://play.miguvideo.com/playurl/v1/play/playurl?audio=false&contId={$contId}&ott=true&dolby=true&drm=true&flvEnable=true&h265=true&isMultiView=true&isRaming=0&isbox=false&nt=4&os=15.1.1&ott=false&rateType=7&salt={$salt}&serialNo=0&sign={$signID}&startPlay=true&timestamp={$timestamps}&ua=iPhone13%2C3&vivid=1&vr=true&xavs2=true&xh265=false";

$headers = array(
    "Content-Type: application/json",
    "User-Agent: MiguVideo/2500090320 (iPhone; iOS 15.1.1; Scale/2.00)", // Set the User-Agent to simulate a browser
    "Userid:" . $Userid,
    "Usertoken:" . $Usertoken,
    "Sign:" . $Sign,
    'Userinfo: ' . "$Userinfo",
    "Mobile:" . $mobile,
    "Connection: keep-alive",
    "Accept-Language: zh-CN,zh;q=0.9,en;q=0.8,en-GB;q=0.7,en-US;q=0.6",
    "Accept: */*",
    "Accept-Encoding: deflate",
    "APP-VERSION-CODE:" . $version,
    "appVersion:"  . $version,
    "clientId: " . $data,
    "SDKCEId: " . $uuid,
    "X-UP-CLIENT-CHANNEL-ID: " . $channel,
    "csessionId: " . $data . $timestamps,
);

$playjson = json_decode(get_data($playURL, $headers));

$live = $playjson->body->urlInfo->url;

// print_r($json);

header("Content-Type: application/vnd.apple.mpegURL");
header('Location:' . $live);

function get_data($url, $header, $post = null)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($ch, CURLOPT_TIMEOUT, 1); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    if (!empty($post)) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function getUuid2(): string
{
    $e = "0123456789abcdef";
    $s = [];
    for ($i = 0; $i < 36; $i++) {
        $s[$i] = substr($e, mt_rand(0, 15), 1);
    }
    $s[14] = "4";
    $s[19] = substr($e, 8 | hexdec($s[19]), 1);

    $s[8] = $s[13] = $s[18] = $s[23] = "-";
    return implode($s);
}

function getSign($contId)
{
    $tm = round(microtime(true) * 1000);
    $appVersion = "2500090320";
    $md5string = md5($tm . $contId . substr($appVersion, 0, 8));
    $salt = substr(strval($tm), 4, 6) . "96";
    $sign = md5($md5string . '9100fcd3470f4c0f88b403f12eaaf65amigu' . substr($salt, 0, 4));
    return $sign;
}

function generateRandomString($length = 32)
{
    $characters = '0123456789abcdef';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
