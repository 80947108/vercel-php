<?php
//https://www.yangshipin.cn/#/tv/home
error_reporting(0);
header('Content-Type:text/json;charset=UTF-8');
date_default_timezone_set("Asia/Shanghai");
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv4k';
$n = [
    //央视
    'cctv4k' => [2022575203, 600002264], //CCTV-4k
    'cctv8k' => [2020603421, 600156816], //CCTV-8k
    'cctv1' => [2022576803, 600001859], //CCTV1
    'cctv2' => [2022576703, 600001800], //CCTV2
    'cctv3' => [2022576503, 600001801], //CCTV3(vip)
    'cctv4' => [2022576603, 600001814], //CCTV4
    'cctv5' => [2022576403, 600001818], //CCTV5
    'cctv5p' => [2022576303, 600001817], //CCTV5+
    'cctv6' => [2022574303, 600001802], //CCTV6(vip)
    'cctv6hd' => [2013693901, 600108442], //CCTV6(vip)
    'cctv7' => [2022576203, 600004092], //CCTV7
    'cctv8' => [2022576103, 600001803], //CCTV8(vip)
    'cctv9' => [2022576003, 600004078], //CCTV9
    'cctv10' => [2022573003, 600001805], //CCTV10
    'cctv11' => [2022575903, 600001806], //CCTV11
    'cctv12' => [2022575803, 600001807], //CCTV12
    'cctv13' => [2022575703, 600001811], //CCTV13
    'cctv14' => [2022575603, 600001809], //CCTV14
    'cctv15' => [2022575503, 600001815], //CCTV15
    'cctv16' => [2022575403, 600098637], //CCTV16
    'cctv16-4k' => [2022575103, 600099502], //CCTV16-4k(vip)
    'cctv17' => [2022575303, 600001810], //CCTV17
    //央视数字
    'bqkj' => [2012513403, 600099649], //CCTV兵器科技(vip)
    'dyjc' => [2012514403, 600099655], //CCTV第一剧场(vip)
    'hjjc' => [2012511203, 600099620], //CCTV怀旧剧场(vip)
    'fyjc' => [2012513603, 600099658], //CCTV风云剧场(vip)
    'fyyy' => [2012514103, 600099660], //CCTV风云音乐(vip)
    'fyzq' => [2012514203, 600099636], //CCTV风云足球(vip)
    'dszn' => [2012514003, 600099656], //CCTV电视指南(vip)
    'nxss' => [2012513903, 600099650], //CCTV女性时尚(vip)
    'whjp' => [2012513803, 600099653], //CCTV央视文化精品(vip)
    'sjdl' => [2012513303, 600099637], //CCTV世界地理(vip)
    'gefwq' => [2012512503, 600099659], //CCTV高尔夫网球(vip)
    'ystq' => [2012513703, 600099652], //CCTV央视台球(vip)
    'wsjk' => [2012513503, 600099651], //CCTV卫生健康(vip)
    //央视国际
    'cgtn' => [2022575001, 600014550], //CGTN
    'cgtnjl' => [2022574703, 600084781], //CGTN纪录
    'cgtne' => [2022571703, 600084744], //CGTN西语
    'cgtnf' => [2022574903, 600084704], //CGTN法语
    'cgtna' => [2022574603, 600084782], //CGTN阿语
    'cgtnr' => [2022574803, 600084758], //CGTN俄语
    //教育
    'cetv1' => [2022823801, 600171827], //教育1台
    //卫视
    'bjws' => [2000272103, 600002309], //北京卫视
    'dfws' => [2000292403, 600002483], //东方卫视
    'tjws' => [2019927003, 600152137], //天津卫视
    'cqws' => [2000297803, 600002531], //重庆卫视
    'hljws' => [2000293903, 600002498], //黑龙江卫视
    'lnws' => [2000281303, 600002505], //辽宁卫视
    'hbws' => [2000293403, 600002493], //河北卫视
    'sdws' => [2000294803, 600002513], //山东卫视
    'ahws' => [2000298003, 600002532], //安徽卫视
    'hnws' => [2000296103, 600002525], //河南卫视
    'hubws' => [2000294503, 600002508], //湖北卫视
    'hunws' => [2000296203, 600002475], //湖南卫视
    'jxws' => [2000294103, 600002503], //江西卫视
    'jsws' => [2000295603, 600002521], //江苏卫视
    'zjws' => [2000295503, 600002520], //浙江卫视
    'dnws' => [2000292503, 600002484], //东南卫视
    'gdws' => [2000292703, 600002485], //广东卫视
    'szws' => [2000292203, 600002481], //深圳卫视
    'gxws' => [2000294203, 600002509], //广西卫视
    'gzws' => [2000293303, 600002490], //贵州卫视
    'scws' => [2000295003, 600002516], //四川卫视
    'xjws' => [2019927403, 600152138], //新疆卫视
    'hinws' => [2000291503, 600002506], //海南卫视
    'btws' => [2022606701, 600170344],  // 兵团卫视
];
$cnlid = $n[$id][0];
$pid = $n[$id][1];
$guid = generateGuid();
$randomString = rand_str(10);
//获取当前毫秒级别时间
$currentTimeMillis = round(microtime(true) * 1000);
$request_id = "999999" . $randomString . $currentTimeMillis;

$salt = '0f$IVHi9Qno?G';
$platform = "5910204";
$key = hex2bin("48e5918a74ae21c972b90cce8af6c8be");
$iv = hex2bin("9a7e7d23610266b1d9fbf98581384d92");
$ts = time();
$randomNumber = rand() / mt_getrandmax();
$el = "|{$cnlid}|{$ts}|mg3c3b04ba|V1.0.0|{$guid}|{$platform}|[url]https://www.yangshipin.c[/url]|mozilla/5.0 (windows nt ||Mozilla|Netscape|Win32|";

$len = strlen($el);
$xl = 0;
for ($i = 0; $i < $len; $i++) {
    $xl = ($xl << 5) - $xl + ord($el[$i]);
    $xl &= $xl & 0xFFFFFFFF;
}

$xl = ($xl > 2147483648) ? $xl - 4294967296 : $xl;

$el = '|' . $xl . $el;
$ckey = "--01" . strtoupper(bin2hex(openssl_encrypt($el, "AES-128-CBC", $key, 1, $iv)));

$params = [
    "adjust" => 1,
    "appVer" => "V1.0.0",
    "app_version" => "V1.0.0",
    "cKey" => $ckey,
    "channel" => "ysp_tx",
    "cmd" => "2",
    "cnlid" => "{$cnlid}",
    "defn" => "fhd",
    "devid" => "devid",
    "dtype" => "1",
    "encryptVer" => "8.1",
    "guid" => $guid,
    "livepid" => "{$pid}",
    "otype" => "ojson",
    "platform" => $platform,
    "rand_str" => rand_str(10),
    "sphttps" => "1",
    "stream" => "2"
];
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $onlineip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $onlineip = $_SERVER['REMOTE_ADDR'];
}
$useragent = $_SERVER['HTTP_USER_AGENT'];
$userid = md5($onlineip . $useragent);
$cdns = array(
    'hlsliveali-cdn.ysp.cctv.cn',
    // 'hlslive-tx-cdn.ysp.cctv.cn',
    // 'bkhlsliveali-cdn.ysp.cctv.cn',
    // 'bkbktlivecloud-cdn.ysp.cctv.cn',
);
$cdn = $cdns[array_rand($cdns, 1)];

$mcdns = array(
    // 'bkmobilelive-cnc-cdn.ysp.cctv.cn',
    // 'mobileliveali-cdn.ysp.cctv.cn',
    'mobilelive-play.ysp.cctv.cn',
);

$mcdn = $mcdns[array_rand($mcdns, 1)];

$channels = [
    "2013693901",
    "2022606701",
    "2022823801"
];

$cacheFileName = 'url_cache_ysp_1_all.json';
$cachedUrls = [];
$header_1 = [
    "Referer: https://www.yangshipin.cn/",
    "user-agent: " . $useragent,
    // 'x-forwarded-for:' . $onlineip,
    // 'client-ip:' . $onlineip,
];

if (file_exists($cacheFileName)) {
    $cachedUrls = json_decode(file_get_contents($cacheFileName), true);
    if (isset($cachedUrls[$userid]) && isset($cachedUrls[$userid][$id])) {
        foreach ($cachedUrls as $userId => $userInfo) {
            if (isset($userInfo['times']) && $userInfo['times'] < $threshold) {
                unset($cachedUrls[$userId]); // 如果times大于24小时前，则删除该节点  
            }
        }
        $times = $cachedUrls[$userid]['times'];
        $timestamp = $cachedUrls[$userid][$id]['timestamp'];
        $currentTime = time();
        // 判断是否换台换台重新获取
        if ($timestamp < $times) {
            unset($cachedUrls[$userid][$id]);
        }
        // 判断第一次开机定格频道大于5分钟进行清理
        if ($currentTime - $timestamp > 300) {
            unset($cachedUrls[$userid][$id]);
        }
    }
    if (isset($cachedUrls[$userid]) && isset($cachedUrls[$userid][$id])) {
        $current_time = time();
        $finalUrl = $cachedUrls[$userid][$id]['url'];
        $threshold = $current_time - (24 * 60 * 60);
        $guuid = $cachedUrls[$userid][$id]['guuid'];
        $seq = $cachedUrls[$userid][$id]['seq'] + 1;
        $timestamp = $cachedUrls[$userid][$id]['timestamp'];
        $sed1 = $cachedUrls[$userid][$id]['seq'];
        $currentTime = time();
        $headers_2 = [
            "Content-Type: application/x-www-form-urlencoded;charset=UTF-8",
            "referer: https://www.yangshipin.cn/",
            "user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36",
            "Host: dtrace.ysp.cctv.cn",
            "Connection: keep-alive",
            // "Accept: */*",
            // "Host: player-api.yangshipin.cn",
            // "Connection: keep-alive"
            // 'x-forwarded-for:' . $onlineip,
            // 'client-ip:' . $onlineip,
        ];
        $kvparams = [
            "BossId" => 9141,
            "Pwd" => 1137850982,
            "_dc" => $randomNumber,
            "cdn" => "waibao",
            "cmd" => 263,
            "defn" => "fhd",
            "downspeed" => 10,
            "durl" => $finalUrl,
            "errcode" => "-",
            "fact1" => "ysp_pc_live_b",
            "firstreport" => "-",
            "fplayerver" => 100,
            "ftime" => date("Y-m-d H:i:s"),
            "geturltime" => "-",
            "guid" => "$guuid",
            "hc_openid" => "-",
            "hh_ua" => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36",
            "live_type" => "-",
            "livepid" => "{$pid}",
            "login_type" => "-",
            "open_id" => "-",
            "openid" => "-",
            "platform" => 5910204,
            "playno" => rand_str(10),
            "prd" => "60000",
            "prog" => "{$cnlid}",
            "rand_str" => rand_str(10),
            "sRef" => "-",
            "sUrl" => "https://www.yangshipin.cn/#/tv/home?pid=$pid",
            "sdtfrom" => "ysp_pc_01",
            "seq" => $seq,
            "url" => $finalUrl,
            "viewid" => "{$cnlid}"
        ];
        $authkv = md5(http_build_query($kvparams));
        $kvparams["signature"] = $authkv;
        $kvpa = http_build_query($kvparams);
        $kvurl = "https://dtrace.ysp.cctv.cn/kvcollect";

        // 如果当前时间戳减去缓存时间戳大于1分钟（即60秒），请求存活接口
        if ($currentTime - $timestamp > 60) {
            $kvj = get_data($kvurl, $headers_2, $kvpa);
            $cachedUrls[$userid]['times'] = time();
            $cachedUrls[$userid][$id] = [
                'seq' => $seq,
                'guuid' => $guuid,
                'timestamp' => time(),
                'url' => $finalUrl
            ];
        }
        
        // 存活循环次数10小时 上面请求60秒一次 36000秒10小时也是36001次 第一次不请求接口第二分钟开始请求
        if ($sed1 > 36000) {
            unset($cachedUrls[$userid][$id]);
        }
    }

    file_put_contents($cacheFileName, json_encode($cachedUrls));
}

if (isset($cachedUrls[$userid]) && isset($cachedUrls[$userid][$id])) {
    $finalUrl = $cachedUrls[$userid][$id]['url'];
    $host = parse_url($finalUrl)['host'];

    if (in_array($n[$id][0], $channels)) {
        $m3u8 = preg_replace("/{$host}/", $mcdn, $finalUrl);
    } else {
        $m3u8 = preg_replace("/{$host}/", $cdn, $finalUrl);
    }
    $burl = dirname($m3u8) . "/";
    header("Content-Type: application/vnd.apple.mpegurl");
    header("Content-Disposition: inline; filename=index.m3u8");
    print_r(preg_replace("/(.*?.ts)/i", $burl . "$1", get_data($m3u8, $header_1)));
    exit;
} else {
    $headers = [
        "Referer: https://www.yangshipin.cn/",
        "Cookie: guid=$guid; versionName=99.99.99; versionCode=999999; platformVersion=Chrome; deviceModel=122; vplatform=109; updateProtocol=1; seqId=1; request-id={$request_id}",
        "Yspappid: 519748109",
        "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0",
        // "Accept: */*",
        // "Host: player-api.yangshipin.cn",
        // "Connection: keep-alive"
        // 'x-forwarded-for:' . $onlineip,
        // 'client-ip:' . $onlineip,
    ];

    $auth = "appid=ysp_pc&guid=" . $guid . "&pid=" . $pid . "&rand_str=" . rand_str(10);
    $auth = $auth . "&signature=" . md5($auth . 'Q0uVOpuUpXTOUwRn');
    $PostUrl = "https://player-api.yangshipin.cn/v1/player/auth";

    $Postjson = json_decode(get_data($PostUrl, $headers, $auth));

    $token = $Postjson->data->token;

    $sign = md5(http_build_query($params) . $salt);
    $params["signature"] = $sign;
    $params = json_encode($params);
    $headers[] = "Content-Type: application/json";
    $headers[] = "Yspplayertoken: $token";
    $bstrURL = "https://player-api.yangshipin.cn/v1/player/get_live_info";

    $json = json_decode(get_data($bstrURL, $headers, $params));
    $live = $json->data->playurl;

    $host = parse_url($live)['host'];

    if (in_array($n[$id][0], $channels)) {
        $m3u8 = preg_replace("/{$host}/", $mcdn, $live);
    } else {
        $m3u8 = preg_replace("/{$host}/", $cdn, $live);
    }
    $chanll = json_decode($json->data->chanll);
    $tmpcode = base64_decode($chanll->code);
    preg_match('/var des_key = "(.*?)"/', $tmpcode, $deskey);
    preg_match('/var des_iv = "(.*?)"/', $tmpcode, $desiv);
    $plain = '{"mver": "1","subver": "1.2","host": "www.yangshipin.cn/#/tv/home","referer": "","canvas":"' . $useragent . '"}';

    $revoi = openssl_encrypt($plain, "DES-EDE3-CBC", base64_decode($deskey[1]), 1, base64_decode($desiv[1]));
    $revoi = strtoupper(bin2hex($revoi));
    $exinfo = $json->data->extended_param;
    if ($json->data->iretcode == 0) {
        if (!isset($cachedUrls[$userid])) {
            $cachedUrls[$userid] = [
                'times' => time(),
                $id => [
                    'seq' => 0,
                    'guuid' => $guid,
                    'timestamp' => time(),
                    'url' => $m3u8 . "&revoi=" . $revoi . $exinfo
                ]
            ];
        } else {
            $cachedUrls[$userid]['times'] = time();

            $cachedUrls[$userid][$id] = [
                'seq' => 0,
                'guuid' => $guid,
                'timestamp' => time(),
                'url' => $m3u8 . "&revoi=" . $revoi . $exinfo
            ];
        }

        file_put_contents($cacheFileName, json_encode($cachedUrls));

        $burl = dirname($m3u8) . "/";

        header("Content-Type: application/vnd.apple.mpegurl");
        header("Content-Disposition: inline; filename=index.m3u8");
        print_r(preg_replace("/(.*?.ts)/i", $burl . "$1", get_data($m3u8 . "&revoi=" . $revoi . $exinfo, $header_1)));
        exit;
    }
}
function get_data($url, $header, $post = null)
{
    $maxAttempts = 5; // 设置最大尝试次数
    $attempt = 0;

    do {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 1); // 设置超时时间
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        if (!empty($post)) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        $data = curl_exec($ch);
        curl_close($ch);
        $attempt++;
    } while (empty($data) && $attempt < $maxAttempts);

    return $data;
}

function rand_str($k)
{
    $e = "ABCDEFGHIJKlMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $i = 0;
    $str = "";
    while ($i < $k) {
        $str .= $e[mt_rand(0, 61)];
        $i++;
    }
    return $str;
}


function generateGuid()
{
    $timestamp = base_convert((string) round(microtime(true) * 1000), 10, 36);
    $randomPart = substr(base_convert((string) mt_rand(), 10, 36), 0, 9);

    while (strlen($randomPart) < 11) {
        $randomPart .= substr(base_convert((string) mt_rand(), 10, 36), 0, 1);
    }

    $e = "abcdefghijklmnopqrstuvwxyz";
    $b = $e[rand(0, strlen($e) - 1)];
    $guid = str_replace('lv', 'l' . $b, $timestamp . "_" . $randomPart);

    return $guid;
}
