<?php
date_default_timezone_set("Asia/Shanghai");
$type = empty($_GET['type']) ? "nojson" : trim($_GET['type']);
$id = empty($_GET['id']) ? "11342412" : trim($_GET['id']);
$cdn = empty($_GET['cdn']) ? "alicdn" : trim($_GET['cdn']);
$roomurl = "https://mp.huya.com/cache.php?m=Live&do=profileRoom&roomid=" . $id;


function get_content($apiurl, $flag)
{
    if ($flag == "mobile") {
        $headers = array(
            'Content-Type: application/x-www-form-urlencoded',
            'User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.3 Mobile/15E148 Safari/604.1'
        );
    } else {
        $arr = [
            "appId" => 5002,
            "byPass" => 3,
            "context" => "",
            "version" => "2.4",
            "data" => new stdClass(),
        ];
        $postData = json_encode($arr);
        $headers = array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($postData),
            'upgrade-insecure-requests: 1',
            'user-agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/107.0.0.0 Safari/537.36'
        );
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiurl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    if ($flag == "uid") {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    }
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

$jsonStr = json_decode(get_content($roomurl, "mobile"), true);
$realdata = $jsonStr["data"];
$uid = json_decode(get_content("https://udblgn.huya.com/web/anonymousLogin", "uid"), true)["data"]["uid"];
$mediaurl = "http://devimages.apple.com.edgekey.net/streaming/examples/bipbop_16x9/gear5/prog_index.m3u8";

function process_anticode($anticode, $uid, $streamname)
{
    parse_str($anticode, $q);
    $q["t"] = '';
    $q["ctype"] = 'huya_live';
    $q["wsTime"] = dechex(time() + 21600);
    $q["ver"] = "1";
    $q["sv"] = date('YmdH');
    $q["seqid"] = strval(intval($uid) + intval(microtime(true) * 1000));
    $q["u"] = strval($uid);
    $ss = md5("{$q["seqid"]}|{$q["ctype"]}|{$q["t"]}");
    $q["fm"] = base64_decode($q["fm"]);
    $q["fm"] = str_replace(["$0", "$1", "$2", "$3"], [$q["u"], $streamname, $ss, $q["wsTime"]], $q["fm"]);
    $q["wsSecret"] = md5($q["fm"]);
    unset($q["fm"]);
    $q["fs"] = "bgct";
    $q["ratio"] = "0";
    return http_build_query($q);
}

function format($realdata, $uid)
{
    $stream_info = [];
    $cdn_type = ['AL' => 'alicdn', 'HY' => 'hycdn', 'TX' => 'txcdn', 'HW' => 'hwcdn', 'HS' => 'hscdn', 'WS' => 'wscdn'];
    foreach ($realdata["stream"]["baseSteamInfoList"] as $s) {
        if ($s["sHlsUrl"]) {
            $stream_info[$cdn_type[$s["sCdnType"]]] = $s["sHlsUrl"] . '/' . $s["sStreamName"] . '.' . $s["sHlsUrlSuffix"] . '?' . process_anticode($s["sHlsAntiCode"], $uid, $s["sStreamName"]);
        }
    }
    return $stream_info;
}

if ($jsonStr["status"] == 200) {
    $realurl = format($realdata, $uid);

    if ($type == "json") {
        echo json_encode($realurl);
        exit();
    }

    switch ($cdn) {
        case $cdn:
            $mediaurl = str_replace("http://", "https://", $realurl[$cdn]);
            break;
        default:
            $mediaurl = str_replace("http://", "https://", $realurl["hwcdn"]);
            break;
    }

    header('location:' . $mediaurl);
    exit();
} else {
    header('location:' . $mediaurl);
    exit();
}
