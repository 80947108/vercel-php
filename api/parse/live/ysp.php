<?php
error_reporting(E_ALL & ~E_NOTICE);

define('PLATFORM', '5910204');
define('AUTH_SALT', '7s07jbb2Bwy31iPD');
define('LIVE_SALT', '0f$IVHi9Qno?G');
define('KEY', hex2bin('48e5918a74ae21c972b90cce8af6c8be'));
define('IV', hex2bin('9a7e7d23610266b1d9fbf98581384d92'));

function generateRandomString($length = 10)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $randomString = '';
    $charLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charLength - 1)];
    }
    return $randomString;
}

function signData($data, $salt)
{
    ksort($data);
    $signature = http_build_query($data) . $salt;
    return md5($signature);
}

function generateInput($data)
{
    uksort($data, 'strcasecmp');
    return md5(http_build_query($data));
}

function getSequence()
{
    $filePath = 'sequence.txt';
    $sequenceID = file_exists($filePath) ? (int) file_get_contents($filePath) + 1 : 1;
    file_put_contents($filePath, $sequenceID);
    return $sequenceID;
}

function getToken($livepid, $guid, $request_id)
{
    $seq_id = getSequence();
    $param = [
        "pid" => $livepid,
        "guid" => $guid,
        "appid" => "ysp_pc",
        "rand_str" => generateRandomString(10),
    ];
    $signature = signData($param, AUTH_SALT);
    $param["signature"] = $signature;

    $authUrl = "https://player-api.yangshipin.cn/v1/player/auth";
    $headers = [
        "Content-Type: application/x-www-form-urlencoded;charset=UTF-8",
        "Referer: https://www.yangshipin.cn/",
        "Cookie: guid={$guid}; versionName=99.99.99; versionCode=999999; vplatform=109; platformVersion=Chrome; deviceModel=125; newLogin=1; updateProtocol=1; nseqId={$seq_id}; nrequest-id={$request_id}",
        "Yspappid: 519748109",
    ];
    $ch = curl_init($authUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));
    $data = curl_exec($ch);
    curl_close($ch);
    $json_data = json_decode($data);
    return $json_data->data->token ?? null;
}

function getApiToken($guid)
{
    $url = 'https://h5access.yangshipin.cn/web/open/token?yspappid=519748109&guid=' . $guid . '&vappid=59306155&vsecret=b42702bf7309a179d102f3d51b1add2fda0bc7ada64cb801&raw=1&ts=' . round(microtime(true) * 1000);
    $data = file_get_contents($url);
    $json_data = json_decode($data);
    return $json_data->data->token ?? null;
}

function getLive($cnlid, $livepid, $guid, $request_id)
{
    $seq_id = getSequence();
    $ts = time();
    $el = "|{$cnlid}|{$ts}|mg3c3b04ba|V1.0.0|{$guid}|" . PLATFORM . "|https://www.yangshipin.c|mozilla/5.0 (windows nt ||Mozilla|Netscape|Win32|";
    $len = strlen($el);
    $xl = 0;
    for ($i = 0; $i < $len; $i++) {
        $xl = ($xl << 5) - $xl + ord($el[$i]);
        $xl &= 0xFFFFFFFF;
    }
    $xl = ($xl > 2147483648) ? $xl - 4294967296 : $xl;
    $el = '|' . $xl . $el;

    $ckey = "--01" . strtoupper(bin2hex(openssl_encrypt($el, "AES-128-CBC", KEY, OPENSSL_RAW_DATA, IV)));

    $params = [
        "cnlid" => (string) $cnlid,
        "livepid" => (string) $livepid,
        "stream" => "2",
        "guid" => $guid,
        "cKey" => $ckey,
        "adjust" => 1,
        "sphttps" => "1",
        "platform" => PLATFORM,
        "cmd" => "2",
        "encryptVer" => "8.1",
        "dtype" => "1",
        "devid" => "devid",
        "otype" => "ojson",
        "appVer" => "V1.0.0",
        "app_version" => "V1.0.0",
        "channel" => "ysp_tx",
        "defn" => "fhd",
    ];

    $token = getToken($livepid, $guid, $request_id);
    if (!$token) {
        return null; // Handle token retrieval failure
    }

    $input = generateInput($params);

    $params['rand_str'] = generateRandomString(10);
    $params['signature'] = signData($params, LIVE_SALT);

    $apiToken = getApiToken($guid);
    if (!$apiToken) {
        return null; // Handle API token retrieval failure
    }

    $info = 'yspappid:519748109;host:www.yangshipin.cn;protocol:https:;token:' . $apiToken . ';input:' . $input . '-' . $guid . '-' . $seq_id . '-' . $request_id . ';';
    $sign = md5($info);

    $headers = [
        "Content-Type: application/json",
        "Referer: https://www.yangshipin.cn/",
        "Cookie: guid={$guid}; versionName=99.99.99; versionCode=999999; vplatform=109; platformVersion=Chrome; deviceModel=125; newLogin=1; updateProtocol=1; nseqId={$seq_id}; nrequest-id={$request_id}",
        "Yspappid: 519748109",
        "Request-Id: {$request_id}",
        "Seqid: {$seq_id}",
        "Yspplayertoken: {$token}",
        "Yspsdkinput: {$input}",
        "Yspsdksign: {$sign}",
    ];

    $bstrURL = "https://player-api.yangshipin.cn/v1/player/get_live_info";
    $ch = curl_init($bstrURL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

function encryptData($data, $desKey, $desIv)
{
    $plaintext = json_encode($data, JSON_UNESCAPED_SLASHES);
    $key = base64_decode($desKey);
    $iv = base64_decode($desIv);
    $encrypted = openssl_encrypt($plaintext, 'des-ede3-cbc', $key, OPENSSL_RAW_DATA, $iv);
    return strtoupper(bin2hex($encrypted));
}

// Main code
$id = $_GET["id"] ?? "cctv1";
$channels = [
    "cctv4k" => [2022575203, 600002264],
    "cctv8k" => [2020603421, 600002259],
    "cctv1" => [2022576803, 600001859],
    "cctv2" => [2022576703, 600001800],
    "cctv3" => [2022576503, 600001801], //vip
    "cctv4" => [2022576603, 600001814],
    "cctv5" => [2022576403, 600001818],
    "cctv5p" => [2022576303, 600001817],
    "cctv6" => [2022574303, 600001802], //vip
    "cctv7" => [2022576203, 600004092],
    "cctv8" => [2022576103, 600001803], //vip
    "cctv9" => [2022576003, 600004078],
    "cctv10" => [2022573003, 600001805],
    "cctv11" => [2022575903, 600001806],
    "cctv12" => [2022575803, 600001807],
    "cctv13" => [2022575703, 600001811],
    "cctv14" => [2022575603, 600001809],
    "cctv15" => [2022575503, 600001815],
    "cctv16" => [2022575403, 600098637],
    "cctv16-4k" => [2022575103, 600099502], //vip
    "cctv17" => [2022575303, 600001810],
    "bqkj" => [2012513403, 600099649], //从这里开始
    "dyjc" => [2012514403, 600099655],
    "hjjc" => [2012511203, 600099620],
    "fyjc" => [2012513603, 600099658],
    "fyyy" => [2012514103, 600099660],
    "fyzq" => [2012514203, 600099636],
    "dszn" => [2012514003, 600099656],
    "nxss" => [2012513903, 600099650],
    "whjp" => [2012513803, 600099653],
    "sjdl" => [2012513303, 600099637],
    "gefwq" => [2012512503, 600099659],
    "ystq" => [2012513703, 600099652],
    "wsjk" => [2012513503, 600099651], //到这里结束，都是vip
    "cgtn" => [2022575003, 600014550],
    "cgtnjl" => [2022574703, 600084781],
    "cgtne" => [2022574803, 600084744],
    "cgtnf" => [2022574903, 600051659],
    "cgtna" => [2022574603, 600084704],
    "cgtnr" => [2022574803, 600084758],
    "bjws" => [2000272103, 600002309],
    "dfws" => [2000292403, 600002483],
    //'tjws' => [2019927003, 600058659],//天津
    "cqws" => [2000297803, 600002531],
    "hljws" => [2000293903, 600002498],
    "lnws" => [2000281303, 600002505],
    "hbws" => [2000293403, 600002493],
    "sdws" => [2000294803, 600002513],
    "ahws" => [2000298003, 600002532],
    "hnws" => [2000296103, 600002525],
    "hubws" => [2000294503, 600002508],
    "hunws" => [2000296203, 600002475],
    "jxws" => [2000294103, 600002503],
    "jsws" => [2000295603, 600002521],
    "zjws" => [2000295503, 600002520],
    "dnws" => [2000292503, 600002484],
    "gdws" => [2000292703, 600002485],
    "szws" => [2000292203, 600002481],
    "gxws" => [2000294203, 600002509],
    "gzws" => [2000293303, 600002490],
    "scws" => [2000295003, 600002516],
    //'xjws' => [2019927403, 600085259],//新疆
    "hinws" => [2000291503, 600002506],
];

$cnlid = $channels[$id][0];
$livepid = $channels[$id][1];
$guid = "lvm8gvuy_" . generateRandomString(11);

// 获取当前毫秒级别时间
$currentTimeMillis = round(microtime(true) * 1000);
$request_id = "999999" . generateRandomString(10) . $currentTimeMillis;

$data = getLive($cnlid, $livepid, $guid, $request_id);
$json = json_decode($data);
$live = $json->data->playurl;
$extended_param = $json->data->extended_param;
$chanllCode = json_decode($json->data->chanll)->code;
$decodeChanll = base64_decode($chanllCode);

// 定义正则表达式来匹配des_key和des_iv的赋值语句
$patternKey = '/var des_key = "(.*?)";/';
$patternIv = '/var des_iv = "(.*?)";/';

// 初始化变量用于存储提取的值
$desKey = "";
$desIv = "";

// 使用正则表达式提取des_key的值
if (preg_match($patternKey, $decodeChanll, $matchesKey)) {
    $desKey = $matchesKey[1];
}

// 使用正则表达式提取des_iv的值
if (preg_match($patternIv, $decodeChanll, $matchesIv)) {
    $desIv = $matchesIv[1];
}
//定义待加密数组
$jsonString = '{"mver":"1","subver":"1.2","host":"www.yangshipin.cn/#/tv/home?pid=","referer":"","canvas":"YSPANGLE(Intel,Intel(R)Iris(R)XeGraphics(0x000046A6)Direct3D11vs_5_0ps_5_0,D3D11)"}';
$data = json_decode($jsonString, true);

//定义变量保存revoi值
$encryptedHex = encryptData($data, $desKey, $desIv);
$live = $live . "&revoi=" . $encryptedHex . $extended_param;
preg_match('/^(.*\/)/', $live, $matches);
$burl = $matches[1];
$d = file_get_contents($live);
$str = preg_replace("/(.*?.ts)/", $burl . "$1", $d);
header("Content-Type: application/vnd.apple.mpegurl");
header("Content-Disposition: inline; filename=index.m3u8");
echo $str;
?>
