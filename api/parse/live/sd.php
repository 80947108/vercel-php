<?php
//https://v.iqilu.com/
error_reporting(0);
$id = isset($_GET['id'])?$_GET['id']:'sdws';
$n = [
     'sdws' => ["24581","Jgxu5EzCksptMXafVQXDgJuXMPYIliTdz9bkyADdEFY="], //山东卫视
     'sdql' => ["24584","Jgxu5EzCksptMXafVQXDgOOqQNTGRCNf5bLqi5gLj24="], //山东齐鲁
     'sdxw' => ["24602","Jgxu5EzCksptMXafVQXDgJ+m73Epjyg41JZnafiUtQQ="], //山东新闻
     'sdty' => ["24587","Jgxu5EzCksptMXafVQXDgLBbSE6SsFOakT101sLajRo="], //山东体育休闲
     'sdsh' => ["24596","Jgxu5EzCksptMXafVQXDgNUeDvj7+Rr/jYdpDBC1A6g="], //山东生活
     'sdzy' => ["24593","Jgxu5EzCksptMXafVQXDgJ+hbHVZnhqwetpKRSSzCIQ="], //山东综艺
     'sdnk' => ["24599","Jgxu5EzCksptMXafVQXDgJ3lABl0ACBUifR499aheEY="], //山东农科
     'sdwl' => ["24590","Jgxu5EzCksptMXafVQXDgL8lOzQFSk0yU9YWfHFkS2Y="], //山东文旅
     'sdse' => ["24605","Jgxu5EzCksptMXafVQXDgEJNceqP7QfTz4BnKbHzdeY="], //山东少儿
     ];

$target = $n[$id][0];
$t = getMillisecond();
$s = md5($target.$t."FMRVPTYUGRXZTKBZ");
$url = "http://feiying.litenews.cn/api/v1/auth/exchange?t=$t&s=$s";
$data = $n[$id][1];
$str = post($url,$data);
$live = json_decode(aesdecrypt($str),1)['data'];

$m3u8 = strstr(get($live),'https');
$burl = explode('playlist',$m3u8)[0];
$php = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

$ts = $_GET['ts'];
if(empty($ts)){
   header("Content-Type: application/vnd.apple.mpegurl");
   $p = str_replace("&", "%26",get(trim($m3u8)));
   print_r(preg_replace("/(.*?.ts)/i", $php."?ts=$burl$0",$p));
   } else {
     $data = get(trim($ts));
     header('Content-Type: video/MP2T');
     echo $data;
     }

function getMillisecond() {
  list($t1, $t2) = explode(' ', microtime());
  return (float)sprintf('%.0f',(floatval($t1)+floatval($t2))*1000);
}

function post($url,$data){
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_REFERER, 'https://v.iqilu.com/');
  curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: text/plain','Origin: [url]https://v.iqilu.com[/url]','User-Agent: Mozilla/5.0 (Windows NT 6.1)']);
  $str = curl_exec($ch);
  curl_close($ch);
  return $str;
}

function aesdecrypt($str) {
  $cipher = "AES-128-CBC";
  $key = "MLZWBUJLILAPLQXN";
  $iv = "0000000000000000";
  $decryptedText = openssl_decrypt(base64_decode($str), $cipher, $key, OPENSSL_RAW_DATA, $iv);
  return $decryptedText;
  }

function get($url){
     $ch = curl_init($url);
     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
     curl_setopt($ch, CURLOPT_REFERER, 'https://v.iqilu.com/');
     $res = curl_exec($ch);
     curl_close($ch);
     return $res;
     }
?>
