<?php
date_default_timezone_set("Asia/Shanghai");
header('Access-Control-Allow-Origin:*');

$id = isset($_GET['id']) ? $_GET['id'] : 'cctv1'; 
header("Content-Type:application/vnd.apple.mpegurl;");
header("Content-Disposition:inline;filename={$id}.m3u8");
if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $onlineip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $onlineip = $_SERVER['REMOTE_ADDR'];
}
$userid = md5($onlineip);
$cacheFileName = 'url_cache_all.json';
$ipua = isset($_GET['ip']) ? $_GET['ip'] : ''; 
$iplive = explode(':', $ipua)[0].":5003";

$header = [
    "Host: ".$ipua,
    "Referer: http://".$ipua."/player-live.html",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.289 Safari/537.36",
];
$headers = [
    "Host: ".$iplive,
    "Origin: http://".$ipua,
    "Referer: http://".$ipua."/player-live.html",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.289 Safari/537.36",
];
$header_1 = [
    "Host: ".$ipua,
    "Referer: http://".$ipua."/player-live.html",
    "Accept:application/json, text/javascript, */*; q=0.01",
    "Accept-Encoding:gzip, deflate",
    "Accept-Language:zh-CN,zh;q=0.9",
    "Connection:keep-alive",
    "Dnt:1",
    "X-Requested-With:XMLHttpRequest",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.5735.289 Safari/537.36",
];
if (isset($_GET['ip']) && !isset($_GET['id']) ) {
    header('Content-Type:text/plain;charset=UTF-8');
	$mac = getMac();
	$jsonurl="http://".$ipua."/HSAndroidLogin.ecgi?ty=json&mac_address1=&mac_address2=".$mac."&hotel_id=1&room=101&net_account=10000100001&opentype=0";
    $json = json_decode(get_data($jsonurl, $header_1));
    $token = $json->Token;
    if (isset($token)) {
        $url = "http://{$ipua}/getplaylist.ecgi?ty=json&usercode=10000100001&grpcode=10000&token={$token}&_=".getMillisecond();
        $jscid = json_decode(getJsons($url, $header),true)['Programs'];
        $current = '';
        $currentUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        foreach((array)$jscid as $value){    
            $current .= $value['Name'].",".$currentUrl."&id=".$value['Cid']."\n";
        }       
        echo $current;
        exit;
    } else {
        echo "获取失败！";
        exit;
    }
}
if (file_exists($cacheFileName)) {
    $currentTime = time();
    $cachedUrls = json_decode(file_get_contents($cacheFileName), true);

    // Ensure 'mk' key exists
    if (!isset($cachedUrls['mk'])) {
        $cachedUrls['mk'] = [];
    }

    // 清理过期或无效的缓存项
    foreach ($cachedUrls['mk'] as $userIds => $channels) {
        foreach ($channels as $channelId => $time) {
            if ($currentTime - $time['pidtamp'] > 180 || !isset($time['token'])) {
                unset($cachedUrls['mk'][$userIds][explode(':', $ipua)[0]][$channelId]);
            }
        }
        // 移除空的用户ID项
        if (empty($cachedUrls['mk'][$userIds][explode(':', $ipua)[0]])) {
            unset($cachedUrls['mk'][$userIds][explode(':', $ipua)[0]]);
        }
    }

    // 保存清理后的缓存数据
    file_put_contents($cacheFileName, json_encode($cachedUrls));
    $cachedUrls = json_decode(file_get_contents($cacheFileName), true);
}

// 继续处理缓存数据
if (isset($cachedUrls['mk'][$userid]) && isset($cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id])) {
    $mac = $cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id]['mac'];
    $timestamp = $cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id]['timestamp'];
    $pidtamp = $cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id]['pidtamp'];
    $token = $cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id]['token'];

    if ($currentTime - $timestamp > 25) {
        $url = "http://".$ipua."/ualive?token=".$token."&_=".getMillisecond();
        $json = json_decode(get_data($url, $header));
        $Ret = $json->Ret;
        if ($Ret == 0) {
            $cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id] = [
                'token' => $token,
                'mac' => $mac,
                'timestamp' => time(),
                'pidtamp' => $pidtamp,
                'times' => $cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id]['times']
            ];
            file_put_contents($cacheFileName, json_encode($cachedUrls));
        } else {
            unset($cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id]);
            file_put_contents($cacheFileName, json_encode($cachedUrls));
        }
    }

    if ($currentTime - $pidtamp > 45) {
        $url = "http://".$ipua."/webapi/app_client?item=alive&hotel_id=1&room=101&type=2&mac=".$mac."&playing=".$id."&_=".getMillisecond();
        $json = json_decode(get_data($url, $header));
        $Ret = $json->Ret;
        if ($Ret == 0) {
            $cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id] = [
                'token' => $token,
                'mac' => $mac,
                'timestamp' => $timestamp,
                'pidtamp' => time(),
                'times' => $cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id]['times']
            ];
            file_put_contents($cacheFileName, json_encode($cachedUrls));
        } else {
            unset($cachedUrls['mk'][$userid][$id]);
            file_put_contents($cacheFileName, json_encode($cachedUrls));
        }
    }

    $urllive = "http://".$iplive."/".$id.".m3u8?token=".$cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id]['token'];
    $live = getJsons($urllive, $headers);
    if (strpos($live, '无效') !== false) {
        $live = "";
        unset($cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id]);
        file_put_contents($cacheFileName, json_encode($cachedUrls));
    }
}

if (isset($live)) {
    $current = preg_replace("/(.*?.ts)/i", "http://".$iplive."/"."$1", $live);
    echo $current;
} else {
	$mac = getMac();
	$jsonurl="http://".$ipua."/HSAndroidLogin.ecgi?ty=json&mac_address1=&mac_address2=".$mac."&hotel_id=1&room=101&net_account=10000100001&opentype=0";
    $json = json_decode(get_data($jsonurl, $header_1));
    $token = $json->Token;
    if (isset($token)) {
        $url = "http://".$ipua."/ualive?cid=".$id."&token=".$token."&_=".getMillisecond();
        $jscid = getJsons($url, $header);
        $cachedUrls['mk'][$userid][explode(':', $ipua)[0]][$id] = [
            'token' => $token,
            'mac' => $mac,
            'timestamp' => time(),
            'pidtamp' => time(),
            'times' => time()
        ];
        file_put_contents($cacheFileName, json_encode($cachedUrls));
        $urllive = "http://".$iplive."/".$id.".m3u8?token=".$token;
        $live = getJsons($urllive, $headers);
        $current = preg_replace("/(.*?.ts)/i", "http://".$iplive."/"."$1", $live);
        echo $current;
    } else {
        echo "获取失败！";
    }
}

function getMillisecond() {
    list($t1, $t2) = explode(' ', microtime());
    return (float)sprintf('%.0f', (floatval($t1) + floatval($t2)) * 1000);
}

function getJsons($url, $header) {
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

function get_data($url, $header = array()) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function getMac() {
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
?>
