<?php
//https://www.yangshipin.cn/#/tv/home
error_reporting(0);
header('Content-Type:text/json;charset=UTF-8');
date_default_timezone_set("Asia/Shanghai");
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv4k';
$n = [
    //央视
    'cctv4k' => [2022575201, 600002264], //cccv-4k
    'cctv8k' => [2020603421, 600156816], //cccv-8k
    'cctv1' => [2022576801, 600001859], //cccv1
    'cctv2' => [2022576703, 600001800], //cccv2
    'cctv3' => [2022576503, 600001801], //cccv3(vip)
    'cctv4' => [2022576603, 600001814], //cccv4
    'cctv5' => [2022576403, 600001818], //cccv5
    'cctv5p' => [2022576303, 600001817], //cccv5+
    'cctv6' => [2022574303, 600001802], //cccv6(vip)
    'cctv6hd' => [2013693901, 600108442], //cccv6(vip)
    'cctv7' => [2022576203, 600004092], //cccv7
    'cctv8' => [2022576103, 600001803], //cccv8(vip)
    'cctv9' => [2022576003, 600004078], //cccv9
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
// $guid = rand_str(6); //随意字符或字符串
$guid = generateGuid(11);
// $guid = "ls87wrn9_b5itawc1on7";
$randomString = rand_str(10);

$seq_id = 1;
//获取当前毫秒级别时间
$currentTimeMillis = round(microtime(true) * 1000);
$request_id = "999999" . $randomString . $currentTimeMillis;
$salt = '0f$IVHi9Qno?G';
$platform = "5910204";
$key = hex2bin("48e5918a74ae21c972b90cce8af6c8be");
$iv = hex2bin("9a7e7d23610266b1d9fbf98581384d92");
$ts = time();
$randomNumber = rand() / mt_getrandmax();
//$el = "|{$cnlid}|{$ts}|mg3c3b04ba|V1.0.0|{$guid}|{$platform}|https://www.yangshipin.c|mozilla/5.0 (windows nt ||Mozilla|Netscape|Win32|";
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
$cacheFileName = 'url_cache_ysplive_all.json';
$cachedUrls = [];
$header_1 = [
    "content-type: application/json",
    "referer: https://www.yangshipin.cn/",
    "user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36",
    'x-forwarded-for:' . $onlineip,
    'client-ip:' . $onlineip,
];

$headers = [
    "Referer: https://www.yangshipin.cn/",
    "Cookie: guid=$guid; versionName=99.99.99; versionCode=999999; platformVersion=Chrome; deviceModel=122; vplatform=109; newLogin=1; gr_user_id=1; nseqId=$seq_id; nrequest-id={$request_id}",
    "Yspappid: 519748109",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0",
    "Request-Id: $request_id",
    "Seqid: $seq_id",
    'x-forwarded-for:' . $onlineip,
    'client-ip:' . $onlineip,
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
            "referer: https://dtrace.ysp.cctv.cn/",
            "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36 Edg/124.0.0.0",
            "Host: dtrace.ysp.cctv.cn",
            "Connection: keep-alive",
            'x-forwarded-for:' . $onlineip,
            'client-ip:' . $onlineip,
        ];
        $kvparams = [
            "BossId" => 9150,
            "Pwd" => 1999332929,
            "_dc" => $randomNumber,
            "cdn" => "waibao",
            "cmd" => 263,
            "defn" => "fhd",
            "downspeed" => 7.1,
            "durl" => $finalUrl,
            "errcode" => "-",
            "fact1" => "ysp_pc_live_b",
            "firstreport" => 1,
            "fplayerver" => 180,
            "ftime" => date("Y-m-d H:i:s", time()),
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
        // 如果当前时间戳减去缓存时间戳大于1分钟（即60秒），请求接口
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
        if ($sed1 > 236) {
            unset($cachedUrls[$userid][$id]);
        }
    }

    file_put_contents($cacheFileName, json_encode($cachedUrls));
}

if (isset($cachedUrls[$userid]) && isset($cachedUrls[$userid][$id])) {
    $finalUrl = $cachedUrls[$userid][$id]['url'];
    $burl = dirname($finalUrl) . "/";
    header("Content-Type: application/vnd.apple.mpegurl");
    header("Content-Disposition: inline; filename=index.m3u8");
    print_r(preg_replace("/(.*?.ts)/i", $burl . "$1", get_data($finalUrl, $header_1)));
    exit;
} else {
    $data = [
        "appid" => "ysp_pc",
        "guid" => $guid,
        "pid" => "$pid",
        "rand_str" => rand_str(10)
    ];

    $authmd5 = md5(http_build_query($data) . 's22G7JTmNr7JdBLu');
    $data["signature"] = $authmd5;
    $auth = http_build_query($data);
    $PostUrl = "https://player-api.yangshipin.cn/v1/player/auth";
    $Postjson = json_decode(get_data($PostUrl, $headers, $auth));
    $jsonts = $Postjson->data->ts;
    $token = $Postjson->data->token;
    $h5url = 'https://h5access.yangshipin.cn/web/open/token?yspappid=519748109&guid=' . $guid . '&vappid=59306155&vsecret=b42702bf7309a179d102f3d51b1add2fda0bc7ada64cb801&raw=1&ts=' . round(microtime(true) * 1000);
    $Postheaders = [
        "Host: h5access.yangshipin.cn",
        "Referer: https://www.yangshipin.cn/",
        "cookie: guid=$guid; versionName=99.99.99; versionCode=999999; vplatform=109; platformVersion=Chrome; deviceModel=124",
        "user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.289 Safari/537.36",
    ];
    $apijson = json_decode(get_data($h5url, $Postheaders));
    $apiToken = $apijson->data->token;
    $input = generateInput($params);
    $info = 'yspappid:519748109;host:www.yangshipin.cn;protocol:https:;token:' . $apiToken . ';input:' . $input . '-' . $guid . '-' . $seq_id . '-' . $request_id . ';';
    $sign = md5($info);
    $Yspticket = encrypt_aes_128_ctr($pid . "&" . $jsonts . "&" . $guid . "&519748109", "MB#9oKOYU2dBpDcu", "Yswd8@YtNNCAKRm7");
    $signData = md5(http_build_query($params) . $salt);
    $params["signature"] = $signData;
    $params = json_encode($params);
    $headers[] = "Content-Type: application/json";
    $headers[] = "Yspplayertoken: $token";
    $headers[] = "Yspsdkinput: $input";
    $headers[] = "Yspsdksign: $sign";
    $headers[] = "Yspticket: $Yspticket";
    $bstrURL = "https://player-api.yangshipin.cn/v1/player/get_live_info";

    $json = json_decode(get_data($bstrURL, $headers, $params));
    $live = $json->data->playurl;
    $chanll = json_decode($json->data->chanll);
    $tmpcode = base64_decode($chanll->code);
    preg_match('/var des_key = "(.*?)"/', $tmpcode, $deskey);
    preg_match('/var des_iv = "(.*?)"/', $tmpcode, $desiv);
    $plain = '{"mver": "1","subver": "1.2","host": "www.yangshipin.cn/#/tv/home","referer": "","canvas":"' . $useragent . '"}';
    // print_r($headers);
    // print_r($apijson);
    $revoi = openssl_encrypt($plain, "DES-EDE3-CBC", base64_decode($deskey[1]), 1, base64_decode($desiv[1]));
    $revoi = strtoupper(bin2hex($revoi));
    $exinfo = $json->data->extended_param;
    if (!empty($live)) {
        $finalUrl = $live . "&revoi=" . $revoi . $exinfo;
        if (!isset($cachedUrls[$userid])) {
            $cachedUrls[$userid] = [
                'times' => time(),
                $id => [
                    'seq' => $seq_id,
                    'guuid' => $guid,
                    'reuuid' => $request_id,
                    'timestamp' => time(),
                    'url' => $live . "&revoi=" . $revoi . $exinfo
                ]
            ];
        } else {
            $cachedUrls[$userid]['times'] = time();

            $cachedUrls[$userid][$id] = [
                'seq' => $seq_id,
                'guuid' => $guid,
                'reuuid' => $request_id,
                'timestamp' => time(),
                'url' => $live . "&revoi=" . $revoi . $exinfo
            ];
        }
        file_put_contents($cacheFileName, json_encode($cachedUrls));
        $burl = dirname($live) . "/";
        header("Content-Type: application/vnd.apple.mpegurl");
        header("Content-Disposition: inline; filename=index.m3u8");
        print_r(preg_replace("/(.*?.ts)/i", $burl . "$1", get_data($live . "&revoi=" . $revoi . $exinfo, $header_1)));
        $kvurl = "https://dtrace.ysp.cctv.cn/kvcollect";
        $headers_4 = [
            "Content-Type: application/x-www-form-urlencoded",
            "referer: https://www.yangshipin.cn/",
            "user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36",
            "Host: dtrace.ysp.cctv.cn",
            "Connection: keep-alive"
        ];
        $data = [
            "BossId" => 9150,
            "Pwd" => 1999332929,
            "_dc" => $randomNumber,
            "cdn" => "waibao",
            "cmd" => 263,
            "defn" => "fhd",
            "downspeed" => 7.1,
            "durl" => $finalUrl,
            "errcode" => "-",
            "fact1" => "ysp_pc_live_b",
            "firstreport" => 1,
            "fplayerver" => 180,
            "ftime" => date("Y-m-d H:i:s", time()),
            "geturltime" => "-",
            "guid" => "$guid",
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
            "seq" => 0,
            "url" => $finalUrl,
            "viewid" => "{$cnlid}"
        ];
        $authmd = md5(http_build_query($data));
        $data["signature"] = $authmd;
        $auth = http_build_query($data);
        $kvj = get_data($kvurl, $headers_4, $auth);
    }
    exit;
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


function generateGuid($nu)
{
    $timestamp = base_convert((string) round(microtime(true) * 1000), 10, 36);
    $randomPart = substr(base_convert((string) mt_rand(), 10, 36), 0, 9);

    while (strlen($randomPart) < $nu) {
        $randomPart .= substr(base_convert((string) mt_rand(), 10, 36), 0, 1);
    }

    $guid = str_replace('lv', 'ls', $timestamp . "_" . $randomPart);

    return $guid;
}

function generateInput($data)
{
    uksort($data, 'strcasecmp');
    return md5(http_build_query($data));
}

function encrypt_aes_128_ctr($data, $key, $iv)
{
    $encrypted = openssl_encrypt(
        $data,
        "aes-128-ctr",
        $key,
        OPENSSL_RAW_DATA,
        $iv
    );
    if ($encrypted === false) {
        throw new RuntimeException(
            "Encryption failed: " . openssl_error_string()
        );
    }

    return bin2hex($encrypted);
}
