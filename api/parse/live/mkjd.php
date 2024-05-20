<?php
error_reporting(0);
$id = isset($_GET['id']) ? $_GET['id'] : 'cctv1'; 
function generateRandomMacAddress() {
       $ranmac = implode(':', array_map(function() {
        return dechex(mt_rand(0, 255));
    }, range(0, 5))); 
    if (hexdec($ranmac[0]) % 2 != 0) { 
        $firstByteHex = dechex((hexdec($ranmac[0]) & 0xFE) | 0x02);
        $ranmac = $firstByteHex . substr($ranmac, 3); 
        }
    return $ranmac;
}
$ranmac=generateRandomMacAddress();
$currentTimestamp = time();
$adjustedTimestamp = $currentTimestamp-135;
$millisecondTimestamp = $adjustedTimestamp * 1000;
$oktime=$millisecondTimestamp;
$url = "http://183.203.143.227:8014/HSAndroidLogin.ecgi?ty=json&mac_address1=&mac_address2={$ranmac}&opentype=0&hotel_id=1&room=101&net_account=10000100001&_={$oktime}";
$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Host: 183.203.143.227:8014',
    'Connection: keep-alive',
    'Accept: application/json, text/javascript, */*; q=0.01',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/97.0.4692.99 Safari/537.36',
    'X-Requested-With: XMLHttpRequest',
    'Referer: http://183.203.143.227:8014/player-live.html',
    'Accept-Encoding: gzip, deflate',
    'Accept-Language: zh-CN,zh;q=0.9,en-GB;q=0.8,en-US;q=0.7,en;q=0.6'
)); 
$response = curl_exec($ch); 
$errno = curl_errno($ch);
$error = curl_error($ch);
curl_close($ch); 
$responseData = json_decode($response, true);
if (isset($responseData['Token'])) {
            $token = $responseData['Token'];
          }else{http_response_code(404); 
die("404: Token not found"); }
$newtoken=$token;
$turl="http://183.203.143.227:8014/ualive?cid={$id}&token={$newtoken}&_={$oktime}";
$response = file_get_contents("$turl");
$liveurl="http://183.203.143.227:5003/{$id}.m3u8?token={$newtoken}";
$ch = curl_init($liveurl);
curl_setopt($ch, CURLOPT_FAILONERROR, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt($ch, CURLOPT_TIMEOUT, 20);
$response = curl_exec($ch);
$string = "$response";
curl_close($ch);
$newurl=preg_replace('/((.*).ts)/',"http://183.203.143.227:5003/".'$1',$string);
  header("Content-Type: application/vnd.apple.mpegurl");
  die($newurl) ;   
?>
