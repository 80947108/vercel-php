<?php
//https://www.yangshipin.cn/#/tv/home?pid=600001859
error_reporting(0);
header("Content-Type:application/json;charset=utf-8");
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv1';
$n = [
    'cctv1' => '2022576803-600001859',
    'cctv2' => '2022576703-600001800',
    'cctv4' => '2022576603-600001814',
    'cctv5' => '2022576403-600001818',
    'cctv5p' => '2022576303-600001817',
    'cctv7' => '2022576203-600004092',
    'cctv9' => '2022576003-600004078',
    'cctv10' => '2022573003-600001805',
    'cctv11' => '2022575903-600001806',
    'cctv12' => '2022575803-600001807',
    'cctv13' => '2022575703-600001811',
    'cctv14' => '2022575603-600001809',
    'cctv15' => '2022575503-600001815',
    'cctv16' => '2022575403-600098637',
    'cctv17' => '2022575303-600001810',
    'cctv4K' => '2022575203-600002264',
    'cctv8K' => '2020603423-600156816',
    '北京卫视' => '2000272103-600002309',
    '辽宁卫视' => '2000281303-600002505',
    '湖南卫视' => '2000296203-600002475',
    '浙江卫视' => '2000295503-600002520',
    '江苏卫视' => '2000295603-600002521',
    '安徽卫视' => '2000298003-600002532',
    '东方卫视' => '2000292403-600002483',
    '湖北卫视' => '2000294503-600002508',
    '天津卫视' => '2019927003-600152137',
    '黑龙江卫视' => '2000293903-600002498',
    '东南卫视' => '2000292503-600002484',
    '山东卫视' => '2000294803-600002513',
    '广东卫视' => '2000292703-600002485',
    '广西卫视' => '2000294203-600002509',
    '贵州卫视' => '2000293303-600002490',
    '江西卫视' => '2000294103-600002503',
    '河北卫视' => '2000293403-600002493',
    '河南卫视' => '2000296103-600002525',
    '四川卫视' => '2000295003-600002516',
    '重庆卫视' => '2000297803-600002531',
    '深圳卫视' => '2000292203-600002481',
    '海南卫视' => '2000291503-600002506',
    '新疆卫视' => '2019927403-600152138',
    '兵团卫视' => '2022606703-600170344',
    'CETV1' => '2022823803-600171827',
    'CGTN英语' => '2022575003-600014550',
    'CGTN纪录' => '2022574703-600084781',
    'CGTN俄语' => '2022574803-600084758',
    'CGTN西语' => '2022571703-600084744',
    'CGTN阿语' => '2022574603-600084782',
    'CGTN法语' => '2022574903-600084704',
];

$ids = $n[$id];
if ($ids == "" || !strpos($ids, "-")) die("404");
$ctip = rand_ip();
$mstrs = file_get_contents("./cache/#" . $ids . ".txt");
if (time() - explode("|", $mstrs)[0] > 60) {
    $purl = get_vurl($ids, $ctip);
} else {
    $purl = explode("|", $mstrs)[1];
}
$m3u8 = cj_url($purl, "", "", "");
$time = cj_cut("-SEQUENCE:", "\n", $m3u8) - 8;
$url_ts = str_replace("https", "http", explode(".m3u8", $purl)[0]);
$url_ts = str_replace("outlivecloud-cdn", "hlslive-tx-cdn", $url_ts);
$ranzui = getsjs(8);
$pm3u8 = "#EXTM3U\n#EXT-X-VERSION:3\n#EXT-X-TARGETDURATION:10\n#EXT-X-MEDIA-SEQUENCE:{$time}\n";
for ($i = 0; $i < 10; $i++) {
    $pm3u8 .= "#EXTINF:10.0," . "\n";
    $pm3u8 .= $url_ts . "-" . $time . ".ts?token=" . $ranzui . "\n";
    $time = $time + 1;
}
header('Content-Type:application/vnd.apple.mpegurl');
die($pm3u8);

function getsjs($lens = 10)
{
    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $charslen = strlen($chars);
    $rnds = "";
    $rnds = substr(str_shuffle(str_repeat($chars, ceil($lens / $charslen))), 0, $lens);
    return $rnds;
}
function encrypt_aes_128_ctr($data, $key, $iv)
{
    $encrypted = openssl_encrypt($data, "aes-128-ctr", $key, OPENSSL_RAW_DATA, $iv);
    return bin2hex($encrypted);
}
function cj_url($url, $hdr, $ck, $data)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if ($hdr != "") curl_setopt($ch, CURLOPT_HTTPHEADER, $hdr);
    if ($ck != "") curl_setopt($ch, CURLOPT_COOKIE, $ck);
    if ($data != "") curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $cj_tempz = curl_exec($ch);
    curl_close($ch);
    return $cj_tempz;
}
function cj_cut($start, $end, $str)
{
    $temp = explode($start, $str, 2);
    $content = explode($end, $temp[1], 2);
    return $content[0];
}
function f_urltxt($mstr, $file)
{
    if ($mstr != '') {
        $w_file = fopen($file, 'w');
        fwrite($w_file, $mstr);
        fclose($w_file);
    }
}
function get_vurl($ids, $ctip)
{
    $yid = explode("-", $ids)[0];
    $pid = explode("-", $ids)[1];
    if ($yid == "" || $pid == "") die("404");
    $ctip = rand_ip();
    $rand = getsjs(10);
    $guid = getsjs(8) . "_" . getsjs(11);
    $hstime = round(microtime(true) * 1000);
    $rid = "999999" . $rand . $hstime;
    $seqId = 123;
    $hdr = ["Content-Type:application/x-www-form-urlencoded;charset=UTF-8", "Referer:https://www.yangshipin.cn/", "Cookie:guid={$guid};versionName=99.99.99;versionCode=999999;vplatform=109;platformVersion=Chrome;deviceModel=124;updateProtocol=1", "Yspappid:519748109", "X-FORWARDED-FOR:" . $ctip];
    $auth = "appid=ysp_pc&guid=" . $guid . "&pid=" . $pid . "&rand_str=" . $rand;
    $auth = $auth . "&signature=" . md5($auth . 'kPEl8C5ZSe26IN57');
    $token1 = cj_url("https://player-api.yangshipin.cn/v1/player/auth", $hdr, "", $auth);
    $token1_j = json_decode($token1);
    $token1 = $token1_j->data->token;
    $token1_ts = $token1_j->data->ts;
    $token2 = cj_url("https://h5access.yangshipin.cn/web/open/token?yspappid=519748109&guid={$guid}&vappid=59306155&vsecret=b42702bf7309a179d102f3d51b1add2fda0bc7ada64cb801&raw=1&ts={$hstime}", "", "", "");
    $token2 = json_decode($token2);
    $token2 = $token2->data->token;
    if ($token2 == "") die("404");
    $salt = '0f$IVHi9Qno?G';
    $platform = "5910204";
    $key = hex2bin("48e5918a74ae21c972b90cce8af6c8be");
    $iv = hex2bin("9a7e7d23610266b1d9fbf98581384d92");
    $t = time();
    $el = "|{$yid}|{$t}|mg3c3b04ba|V1.0.0|{$guid}|{$platform}|www.yangshipin.cn|mozilla/5.0|Mozilla|Netscape|Win32|";
    $len = strlen($el);
    $xl = 0;
    for ($i = 0; $i < $len; $i++) {
        $xl = ($xl << 5) - $xl + ord($el[$i]);
        $xl &= $xl & 0xFFFFFFFF;
    }
    $xl = ($xl > 2147483648) ? $xl - 4294967296 : $xl;
    $el = '|' . $xl . $el;
    $ckey = "--01" . strtoupper(bin2hex(openssl_encrypt($el, "AES-128-CBC", $key, 1, $iv)));
    $params = ["adjust" => 1, "appVer" => "V1.0.0", "app_version" => "V1.0.0", "cKey" => "{$ckey}", "channel" => "ysp_tx", "cmd" => "2", "cnlid" => "{$yid}", "defn" => "fhd", "devid" => "devid", "dtype" => "1", "encryptVer" => "8.1", "guid" => "{$guid}", "livepid" => "{$pid}", "otype" => "ojson", "platform" => "{$platform}", "rand_str" => "{$rand}", "sphttps" => "1", "stream" => "2"];
    $sign = md5(http_build_query($params) . $salt);
    $sdkinput = ["adjust" => 1, "app_version" => "V1.0.0", "appVer" => "V1.0.0", "channel" => "ysp_tx", "cKey" => "{$ckey}", "cmd" => "2", "cnlid" => "{$yid}", "defn" => "fhd", "devid" => "devid", "dtype" => "1", "encryptVer" => "8.1", "guid" => "{$guid}", "livepid" => "{$pid}", "otype" => "ojson", "platform" => "{$platform}", "sphttps" => "1", "stream" => "2"];
    $yspticket = encrypt_aes_128_ctr($pid . "&" . $token1_ts . "&" . $guid . "&519748109", "kh*&pwlc&Zic5XAz", "j4baeXReLWtVV!py");
    $params["signature"] = $sign;
    $postdata = json_encode($params);
    $seqId = 1;
    $yspsdkinput = md5("adjust=1&app_version=V1.0.0&appVer=V1.0.0&channel=ysp_tx&cKey=" . $ckey . "&cmd=2&cnlid=" . $yid . "&defn=fhd&devid=devid&dtype=1&encryptVer=8.1&guid=" . $guid . "&livepid=" . $pid . "&otype=ojson&platform=" . $platform . "&sphttps=1&stream=2");
    $Yspsdksign = md5("yspappid:519748109;host:www.yangshipin.cn;protocol:https:;token:{$token2};input:{$yspsdkinput}-{$guid}-{$seqId}-{$rid};");
    $hdr = ["Content-Type:application/json;charset=UTF-8", "Referer:https://www.yangshipin.cn", "Cookie:guid={$guid};versionName=99.99.99;versionCode=999999;vplatform=109;platformVersion=Chrome;deviceModel=124;updateProtocol=1;seqId={$seqId};request-id={$rid}", "Yspappid:519748109", "Yspplayertoken:{$token1}", "Yspsdkinput:{$yspsdkinput}", "Yspsdksign:{$Yspsdksign}", "Yspticket:{$yspticket}", "X-FORWARDED-FOR:" . $ctip];
    $data = cj_url("https://player-api.yangshipin.cn/v1/player/get_live_info", $hdr, "", $postdata);
    $data = json_decode($data);
    $purl = $data->data->playurl;
    if ($purl == "") die("404");
    $pvtime = cj_cut("svrtime=", "&", $purl);
    f_urltxt($pvtime . "|" . explode("?", $purl)[0], "./cache/#" . $ids . ".txt");
    return $purl;
}
function rand_ip()
{
    $ipLongRanges = [
        ['607649792', '608174079'],
        ['975044608', '977272831'],
        ['999751680', '999784447'],
        ['1019346944', '1019478015'],
        ['1038614528', '1039007743'],
        ['1783627776', '1784676351'],
        ['1947009024', '1947074559'],
        ['1987051520', '1988034559'],
        ['2035023872', '2035154943'],
        ['2078801920', '2079064063'],
        ['-569376768', '-564133889'],
    ];

    $randKey = array_rand($ipLongRanges);
    $ip = long2ip(mt_rand($ipLongRanges[$randKey][0], $ipLongRanges[$randKey][1]));
    return $ip;
}

/* 
CCTV1,http://你的域名或IP/ysp.php?id=cctv1
CCTV2,http://你的域名或IP/ysp.php?id=cctv2
CCTV4,http://你的域名或IP/ysp.php?id=cctv4
CCTV5,http://你的域名或IP/ysp.php?id=cctv5
CCTV5+,http://你的域名或IP/ysp.php?id=cctv5p
CCTV7,http://你的域名或IP/ysp.php?id=cctv7
CCTV9,http://你的域名或IP/ysp.php?id=cctv9
CCTV10,http://你的域名或IP/ysp.php?id=cctv10
CCTV11,http://你的域名或IP/ysp.php?id=cctv11
CCTV12,http://你的域名或IP/ysp.php?id=cctv12
CCTV13,http://你的域名或IP/ysp.php?id=cctv13
CCTV14,http://你的域名或IP/ysp.php?id=cctv14
CCTV15,http://你的域名或IP/ysp.php?id=cctv15
CCTV16,http://你的域名或IP/ysp.php?id=cctv16
CCTV17,http://你的域名或IP/ysp.php?id=cctv17
CCTV4K,http://你的域名或IP/ysp.php?id=cctv4K
CCTV8K,http://你的域名或IP/ysp.php?id=cctv8K
北京卫视,http://你的域名或IP/ysp.php?id=北京卫视
辽宁卫视,http://你的域名或IP/ysp.php?id=辽宁卫视
湖南卫视,http://你的域名或IP/ysp.php?id=湖南卫视
浙江卫视,http://你的域名或IP/ysp.php?id=浙江卫视
江苏卫视,http://你的域名或IP/ysp.php?id=江苏卫视
安徽卫视,http://你的域名或IP/ysp.php?id=安徽卫视
东方卫视,http://你的域名或IP/ysp.php?id=东方卫视
湖北卫视,http://你的域名或IP/ysp.php?id=湖北卫视
天津卫视,http://你的域名或IP/ysp.php?id=天津卫视
黑龙江卫视,http://你的域名或IP/ysp.php?id=黑龙江卫视
东南卫视,http://你的域名或IP/ysp.php?id=东南卫视
山东卫视,http://你的域名或IP/ysp.php?id=山东卫视
广东卫视,http://你的域名或IP/ysp.php?id=广东卫视
广西卫视,http://你的域名或IP/ysp.php?id=广西卫视
贵州卫视,http://你的域名或IP/ysp.php?id=贵州卫视
江西卫视,http://你的域名或IP/ysp.php?id=江西卫视
河北卫视,http://你的域名或IP/ysp.php?id=河北卫视
河南卫视,http://你的域名或IP/ysp.php?id=河南卫视
四川卫视,http://你的域名或IP/ysp.php?id=四川卫视
重庆卫视,http://你的域名或IP/ysp.php?id=重庆卫视
深圳卫视,http://你的域名或IP/ysp.php?id=深圳卫视
海南卫视,http://你的域名或IP/ysp.php?id=海南卫视
新疆卫视,http://你的域名或IP/ysp.php?id=新疆卫视
兵团卫视,http://你的域名或IP/ysp.php?id=兵团卫视
CETV1,http://你的域名或IP/ysp.php?id=CETV1
CGTN英语,http://你的域名或IP/ysp.php?id=CGTN英语
CGTN纪录,http://你的域名或IP/ysp.php?id=CGTN纪录
CGTN俄语,http://你的域名或IP/ysp.php?id=CGTN俄语
CGTN西语,http://你的域名或IP/ysp.php?id=CGTN西语
CGTN阿语,http://你的域名或IP/ysp.php?id=CGTN阿语
CGTN法语,http://你的域名或IP/ysp.php?id=CGTN法语 
*/
