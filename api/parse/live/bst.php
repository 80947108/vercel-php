<?php
header("Content-Disposition: attachment; filename=playlist.m3u8");
//header('Content-Type:text/json;charset=UTF-8');
$id = $_GET['id']??'cctv1';
$n = [
    'cctv1' => 'cctv1hd8m/8000000',//CCTV-1HD
    'cctv2' => 'cctv2hd8m/8000000',//CCTV-2
    'cctv3' => 'cctv38m/8000000',//CCTV-3HD
    'cctv4' => 'cctv4hd8m/8000000',//CCTV-4
    'cctv5' => 'cctv58m/8000000',//CCTV-5HD
    'cctv5p' => 'cctv5hd8m/8000000',//CCTV-5+HD
    'cctv5p2' => 'cctv5phd8m/8000000',//CCTV-5+HD2
    'cctv6' => 'cctv6hd8m/8000000',//CCTV-6HD
    'cctv7' => 'cctv7hd8m/8000000',//CCTV-7
    'cctv8' => 'cctv8hd8m/8000000',//CCTV-8HD
    'cctv9' => 'cctv9hd8m/8000000',//CCTV-9
    'cctv10' => 'cctv10hd8m/8000000',//CCTV-10HD
    'cctv11' => 'cctv11hd8m/8000000',//CCTV-11
    'cctv12' => 'cctv12hd8m/8000000',//CCTV-12
    'cctv13' => 'cctv13xwhd8m/8000000',//CCTV-13
    'cctv14' => 'cctvsehd8m/8000000',//CCTV-14HD
    'cctv15' => 'cctv15hd8m/8000000',//CCTV-15
    'cctv16' => 'cctv16hd8m/8000000',//CCTV-16HD
    'cctv164k' => 'cctv16hd4k/15000000',//CCTV-16HD4k
    'cctv17' => 'cctv17hd8m/8000000',//CCTV-17HD
    'cctv4k' => 'cctv4k/15000000',//CCTV4K

    'cgtn' => 'ottcctvnews/1300000',//CGTN

    'cetv1' => 'zgjy1t8m/8000000',//CETV1HD
    'cetv2' => 'cetv2/2500000',//CETV2
    'cetv4' => 'zgjy4hd8m/8000000',//CETV4HD

    'zgtq' => 'zgqx/1300000',//中国天气

    'bjws' => 'bjwshd8m/8000000',//北京卫视HD
    'dfws' => 'dfwshd8m/8000000',//东方卫视HD 
    'tjws' => 'tjwshd8m/8000000',//天津卫视HD 
    'cqws' => 'cqws8m/8000000',//重庆卫视HD
    'hljws' => 'hljwshd8m/8000000',//黑龙江卫视HD 
    'jlws' => 'jlwshd8m/8000000',//吉林卫视HD 
    'lnws' => 'lnwshd8m/8000000',//辽宁卫视HD 
    'nmws' => 'nmgws/1300000',//内蒙古卫视 
    'nxws' => 'nxws/1300000',//宁夏卫视  
    'gsws' => 'gswshd8m/8000000',//甘肃卫视HD 
    'qhws' => 'qhws/1300000',// 青海卫视
    'sxws' => 'sxws/1300000',//陕西卫视 
    'hbws' => 'hbwshd8m/8000000',//河北卫视HD 
    'sxiws' => 'shanxiws/1300000',//山西卫视 
    'sdws' => 'sdws8m/8000000',//山东卫视HD 
    'ahws' => 'ahwshd8m/8000000',//安徽卫视HD 
    'hnws' => 'hnwshd8m/8000000',//河南卫视HD
    'hubws' => 'hubeiws8m/8000000',//湖北卫视HD 
    'hunws' => 'hunanwshd8m/8000000',//湖南卫视HD 
    'jxws' => 'jxws8m/8000000',//江西卫视HD 
    'jsws' => 'jswshd8m/8000000',//江苏卫视HD
    'zjws' => 'zjwshd8m/8000000',//浙江卫视HD
    'dnws' => 'dnwshd8m/8000000',//东南卫视HD
    'xmws' => 'xmws/1300000',//厦门卫视 
    'gdws' => 'gdwshd8m/8000000',//广东卫视HD 
    'szws' => 'szwshd8m/8000000',//深圳卫视HD
    'gxws' => 'gxwshd8m/8000000',//广西卫视HD
    'ynws' => 'ynwshd8m/8000000',//云南卫视HD
    'gzws' => 'gzwshd8m/8000000',//贵州卫视 
    'scws' => 'scwshd/8000000',//四川卫视 
    'kbws' => 'kbws/2500000',//康巴卫视
    'xjws' => 'xjws/1300000',//新疆卫视 
    'btws' => 'btws/1300000',//兵团卫视 
    'xzws' => 'xzws/2500000',//西藏卫视 
    'xzwszy' => 'xzwszy/2500000',//西藏藏语卫视 
    'hinws' => 'hainanwshd8m/8000000',//海南卫视 

    'bjjskj' => 'dajs8m/8000000',//北京纪实科教
    'bjkk' => 'kkse8m/8000000',//卡酷少儿

    'dfcj' => 'dfcjhd8m/8000000',//东方财*
    'dfys' => 'dfyshd8m/8000000',//东方影视
    'dfgw' => 'dfgwsxhd8m/8000000',//东方购物
    'dycj' => 'dycjhd8m/8000000',//第一财*
    'shxwzh' => 'xwzhhd8m/8000000',//上海新闻综合
    'shds' => 'dshd8m/8000000',//上海都市HD
    'shjsrw' => 'jspdhd/4000000',//上海纪实人文
    'shics' => 'icshd8m/8000000',//上海ICS
    'hhxd' => 'hhxd8m/8000000',//哈哈炫动
    'wxty' => 'wxtyhd8m/8000000',//五星体育 
    'fztd' => 'fztd8m/8000000',//法治天地
    'hxjc' => 'hxjc8m/8000000',//欢笑剧场
    'hxjc4k' => 'hxjc4k/15000000',//欢笑剧场4K
    'dsjc' => 'dsjc8m/8000000',//都市剧场
    'qcxj' => 'qcxjhd8m/8000000',//七彩戏剧
    'dmxc' => 'dmxc8m/8000000',//动漫秀场HD
    'jbty' => 'jbtyhd8m/8000000',//劲爆体育
    'xsj' => 'xsjhd8m/8000000',//新视觉
    'yxfy' => 'yxfy8m/8000000',//游戏风云
    'shss' => 'shss8m/8000000',//生活时尚
    'jspd' => 'jingsepd8m/8000000',//金色学堂
    'qjs' => 'qjshd8m/8000000',//乐游HD
    'mlzq' => 'mlyyhd8m/8000000',//魅力足球
    'shjy' => 'setvhd/8000000',//上海教育
    'pdtv' => 'hhse/2500000',//浦东电视台

    'zqpd' => 'zqpd8m/8000000',//足球频道

    'cpd' => 'cpdhdavs8m/8000000',//茶频道
    'klcd' => 'klcd8m/8000000',//快乐垂钓
    'jyjs' => 'jyjs8m/8000000',//金鹰纪实
    'jykt' => 'jykt/1300000',//金鹰卡通
    'tcpd' => 'taocihd/8000000',//陶瓷频道
    'jjkt' => 'jjkt/1300000',//嘉佳卡通

    'cftx' => 'cftx/2500000',//财富天下

    'xqjx' => 'xqjx8m/8000000',//戏曲精选
    'rmzy' => 'rmzy8m/8000000',//热门综艺
    'cjty' => 'qcsj8m/8000000',//超级体育
    'jkys' => 'jkys8m/8000000',//健康养生
    'bbkt' => 'bbkt8m/8000000',//百变课堂
    'ktxjx' => 'ktxjx8m/8000000',//看天下精选
    'hyyy' => 'hyyy8m/8000000',//华语影院
    'djtt' => 'djtt8m/8000000',//电竞天堂
    'qcdm' => 'qcdm8m/8000000',//青春动漫
    'bbdh' => 'bbdh8m/8000000',//宝宝动画
    'xgyy' => 'xgyy8m/8000000',//星光影院
    'dzjc' => 'dzjc8m/8000000',//谍战剧场
    'qqdp' => 'qqdp8m/8000000',//全球大片
    'rmjc' => 'rmjc8m/8000000',//热门剧场
    'qcsj' => 'qcsj8m/8000000',//汽车世界

    'kzkt1' => 'kkyinj/1300000',//空中课堂一年级
    'kzkt2' => 'kkernj/1300000',//空中课堂二年级
    'kzkt3' => 'kksannj/1300000',//空中课堂三年级
    'kzkt4' => 'kksinj/1300000',//空中课堂四年级
    'kzkt5' => 'kkwunj/1300000',//空中课堂五年级
    'kzkt6' => 'kkliunj/1300000',//空中课堂六年级
    'kzkt7' => 'kkqinj/1300000',//空中课堂七年级
    'kzkt8' => 'kkbanj/1300000',//空中课堂八年级
    'kzkt9' => 'kkjiunj/1300000',//空中课堂九年级
    'kzktg1' => 'kkgaoyinj/1300000',//空中课堂高一
    'kzktg2' => 'kkgaoernj/1300000',//空中课堂高二
    'kzktg3' => 'kkgaosannj/1300000',//空中课堂高三
     ];
date_default_timezone_set("Asia/Shanghai");
$date = date('YmdH');
$timestamp = substr(time(), 0, 9)-7;//intval((time()-50)/10);
$stream = 'http://cqby.live.bestvcdn.com.cn/live/program/live/'.$n[$id].'/'.$date.'/';
$current = "#EXTM3U"."\r\n";
$current.= "#EXT-X-VERSION:3"."\r\n";
$current.= "#EXT-X-TARGETDURATION:3"."\r\n";
$current.= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}"."\r\n";
for ($i=0; $i<3; $i++) {
    $current.= "#EXTINF:3.000,"."\r\n";
    $current.= $stream.$timestamp.".ts"."\r\n";
    $timestamp = $timestamp + 1;
    }
print_r($current);
?>
