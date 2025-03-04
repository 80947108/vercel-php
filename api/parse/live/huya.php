<?php
error_reporting(0);
$id = $_GET['id'];//房间号(lProfileRoom)
if (empty($_GET['id'])) $id ="11342412";

$c = ['tx','hw','hs','hy'];
$c_rand  = $c[array_rand($c)];
$n = [0,1,2,3];
$n_rand  = $n[array_rand($n)];

$roomurl = "https://mp.huya.com/cache.php?m=Live&do=profileRoom&roomid=$id";
$json = json_decode(file_get_contents($roomurl),1);
$data = $json["data"];
$uid = $data['profileInfo']['uid'];
$streamname = $data['stream']['baseSteamInfoList'][0]['sStreamName'];

$url = $data['stream']['flv']['multiLine'][$n_rand]['url'];
$burl = explode('?', $url)[0];

$fm = "DWq8BcJ3h6DJt6TY_$0_$1_$2_$3";
$seqid = strval(intval($uid) + intval(microtime(true) * 1000));
$ctype = 'tars_wap';
$t = '102';    
$ss = md5("{$seqid}|{$ctype}|{$t}");
$wsTime = dechex(time() + 21600);
$fm = str_replace(["$0", "$1", "$2", "$3"], [$uid, $streamname, $ss, $wsTime], $fm);
$wsSecret = md5($fm);
$s = [];
$s["wsSecret"] = $wsSecret;
$s["wsTime"] = $wsTime;
$s["ctype"] = $ctype;
$s["seqid"] = $seqid;
$s["uid"] = $uid;
$s["fs"] = "bgct";
$s["ver"] = "1";
$s["t"] = $t;

$p = http_build_query($s);

$playurl = $burl.'?'.$p;

header("location:".$playurl);
//print_r($playurl);
?>
