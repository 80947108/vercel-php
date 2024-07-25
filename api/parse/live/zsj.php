<?php
$id = isset($_GET['id'])?$_GET['id']:'zjws';
$n = [
    'zjws' => '01',  //浙江卫视
    'zjqj' => '02',  //浙江钱江
    'zjjjsh' => '03',  //浙江经济生活
    'zjjkys' => '04',  //浙江教科影视
    'zjmsxx' => '06',  //浙江民生休闲
    'zjxw' => '07',  //浙江新闻
    'zjse' => '08',  //浙江少儿
    'zjgj' => '10',  //浙江国际
    'zjhyg' => '11',  //浙江好易购
    'zjzjjl' => '12',  //浙江之江纪录
    ];
$pathname = '/channel'.$n[$id].'/1080p.m3u8';
$e = time();
$rand = md5(mt_rand());
$key = '9T08yiAoqM4eeCwV';
$r= md5($pathname.'-'.$e.'-'.$rand .'-0-'.$key);
$auth_key = $e.'-'.$rand.'-0-'.$r;
$m3u8 = 'https://zhfivel02.cztv.com/channel'.$n[$id].'/1080p.m3u8?auth_key='.$auth_key;
header('location:'.$m3u8);
//echo $m3u8;
?>
