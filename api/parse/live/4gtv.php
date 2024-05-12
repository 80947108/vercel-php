<?php
//error_reporting(0);
echo 'error';
exit;

//https://php.vercel.stncp.top/live/4gtv.php?id=litv-longturn03
$channel = isset($_GET['id']) ?$_GET['id']: "litv-longturn03";
$ts = isset($_GET['ts']) ?$_GET['ts']: null;
if ($ts) {
    get_ts($ts);
} else {
    get_m3u8($channel);
}

function get_m3u8($channel) {
    $url = "https://app.4gtv.tv/Data/HiNet/GetURL.ashx?Type=LIVE&Content={$channel}";
    $code = curl_get($url);
    $code = findString($code, "{", "}");
    $json = json_decode($code, true);
    $data = $json['VideoURL'];
    $key = "VxzAfiseH0AbLShkQOPwdsssw5KyLeuv";
    $iv = substr($data, 0, 16);
    $streamurl = openssl_decrypt(base64_decode(substr($data, 16)), "AES-256-CBC", $key, 1, $iv);
    //echo $streamurl;
    $m3u8_list = curl_get($streamurl);
    $m3u8_arr = explode("\n", $m3u8_list);
    $count = count($m3u8_arr);
    //echo $count;var_dump($m3u8_arr);
    $streamurl = $m3u8_arr[$count-2];
    $domain="https://4gtvfreehinetpc-cds.cdn.hinet.net/live/pool/{$channel}/4gtv-live-mid/";
    $code = curl_get($domain.$streamurl);
    $code = preg_replace_callback('/(.*).ts\?token=(.*)/', 'forReplace', $code);
    header("Content-Type: text/plain");
    //header('Content-Type: application/vnd.apple.mpegurl');
    //header("Content-Disposition: attachment; filename=mnf.m3u8");
    echo $code;
}

function forReplace($m) {
    //$domain = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
    //echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    $domain = 'https://php.vercel.stncp.top/live/4gtv.php';
    return $domain.'?ts='.base64_encode($m[1].'.ts&token='.$m[2]);
}


function get_ts($ts = '') {
    //$ts = 'bGl0di1sb25ndHVybjAzLWF1ZGlvXzIwMDAwPTY0MDAwLXZpZGVvPTI5MzYwMDAtNjY4OTgxNzcudHMmdG9rZW49SEt6dmQ3dG80YUVDcHJRSGQwNzVfQSZleHBpcmVzPTE2ODc3MDY4MjEmdG9rZW4xPUJRS0JjNzNGcFplMDR6MTlLQ2RqMlEmZXhwaXJlczE9MTY4NzcwNjgyMQ==';
    $ts = base64_decode($ts);
    $arr = explode('-', $ts);
    $channel = $arr[0].'-'.$arr[1];
    $domain = "https://4gtvfreehinetpc-cds.cdn.hinet.net/live/pool/{$channel}/4gtv-live-mid/";
    $ts_url = $domain.$ts;
    $ts_url = str_replace('.ts&token=', '.ts?token=', $ts_url);
    //echo $ts_url;exit;
    preg_match('|([0-9]+).ts|', $ts_url, $_temp);
    $ts_name = $_temp[0];
    $code = curl_get($ts_url);
    header('Content-Type: application/octet-stream');
    header("Content-Transfer-Encoding: Binary");
    header("Content-disposition: attachment; filename={$ts_name}");
    //readfile($ts_url);
    echo $code;
}




function curl_get($url) {
    $header = [
        "User-Agent: okhttp/3.12.11"
    ];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_TIMEOUT, 120);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    //curl_setopt($curl, CURLOPT_PROXY, '142.4.112.151'); //http代理服务器地址
    //curl_setopt($curl, CURLOPT_PROXYPORT, '44667'); //http代理服务器端口
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_ENCODING, '');
    $data = curl_exec($curl);
    if (curl_error($curl)) {
        return "Error: " . curl_error($curl);
    } else {
        curl_close($curl);
        return $data;
    }
}

function findString($str, $start, $end) {
    $from_pos = strpos($str, $start);
    $end_pos = strpos($str, $end);
    return substr($str, $from_pos, ($end_pos - $from_pos + 1));
}

function get_ch() {
    $ch4g = array(
        "litv-ftv13" => "民視新聞台",
        "litv-longturn14" => "寰宇新聞台",
        "4gtv-4gtv052" => "華視新聞資訊台",
        "4gtv-4gtv012" => "空中英語教室",
        "litv-ftv07" => "民視旅遊台",
        "litv-ftv15" => "i-Fun動漫台",
        "4gtv-live206" => "幸福空間居家台",
        "4gtv-4gtv070" => "愛爾達娛樂台",
        "litv-longturn17" => "亞洲旅遊台",
        "4gtv-4gtv025" => "MTV Live HD",
        "litv-longturn15" => "寰宇新聞台灣台",
        "4gtv-4gtv001" => "民視台灣台",
        "4gtv-4gtv074" => "中視新聞台",
        "4gtv-4gtv011" => "影迷數位電影台",
        "4gtv-4gtv047" => "靖天日本台",
        "litv-longturn11" => "龍華日韓台",
        "litv-longturn12" => "龍華偶像台",
        "4gtv-4gtv042" => "公視戲劇",
        "litv-ftv12" => "i-Fun動漫台3",
        "4gtv-4gtv002" => "民視無線台",
        "4gtv-4gtv027" => "CI 罪案偵查頻道",
        "4gtv-4gtv013" => "CNEX紀實頻道",
        "litv-longturn03" => "龍華電影台",
        "4gtv-4gtv004" => "民視綜藝台",
        "litv-longturn20" => "ELTV英語學習台",
        "litv-longturn01" => "龍華卡通台",
        "4gtv-4gtv040" => "中視無線台",
        "litv-longturn02" => "Baby First",
        "4gtv-4gtv003" => "民視第一台",
        "4gtv-4gtv007" => "大愛電視台",
        "4gtv-4gtv076" => "SMART 知識頻道",
        "4gtv-4gtv030" => "CNBC",
        "litv-ftv10" => "半島電視台"
    );
}
