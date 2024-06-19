<?php
error_reporting(0);
header('Content-Type: application/json; charset=utf-8');
function datac($str1,$str2){
    $cdata="aHR0cDovLzIyMi4yMTEuNzMuMTAwOjE1ODMzL2NxeXgvYy1kYXRlL2NxeXgtYXBpLnBocD9pZD0=";
    $cxdata="JnRva2VuPQ==";
    $codnu=base64_decode($cdata).$str1.base64_decode($cxdata).$str2;
    return  $codnu ; 
  }
function wrtcache($str1,$str2) {
    file_put_contents($str1,$str2); 
}
function wrtcount($str1,$str2,$str3,$str4) {
      do{
             $liveurl=file_get_contents(datac($str4,get_to($str4)));
         }while($liveurl==""||$liveurl=="404");
             $str3++;
             $content="$liveurl\n$str3\n$str2";
             wrtcache($str1,$content);
             return  $liveurl;
}
function get_to($str){
    $tdate="aHR0cDovLzIyMi4yMTEuNzMuMTAwOjE1ODMzL2NxeXgvYy1kYXRlL2NxeXgtYXBpLnBocD9yZXM9MSZpZD0=";
    $to=file_get_contents(base64_decode($tdate).$str);
    return $to ; 
}
function readcache($str1,$str2,$str3){
   if(get_yes($str3)!==true){
        if (!file_exists($str1) || filesize($str1) == 0){
           $count=0;
           $liveurl= wrtcount($str1,$str2,$count,$str3);
        }else{
              $lines =file($str1, FILE_IGNORE_NEW_LINES);
              list($curl,$ccount,$ctime) = array_pad($lines, 3, ''); 
              $timeDiff = $str2 - trim($ctime);
                 if($timeDiff>=1200||trim($ccount)>12){
                    $count=0;
                    $liveurl= wrtcount($str1,$str2,$count,$str3);
                 }else{
                     $liveurl=trim($curl);
                     $count=trim($ccount);
                     $count++;
                     $content="$liveurl\n$count\n$str2";
                     wrtcache($str1,$content);
                 }
        }
   }else{
        $liveurl=file_get_contents(datac($str3,get_to($str3)));
       
   }
   return base64_decode($liveurl);
}
function get_yes($str){
    $lastTwoChars = substr($str, -2);
    $result = $lastTwoChars === "hd" && ctype_lower($lastTwoChars[0]) && ctype_lower($lastTwoChars[1]);
    return $result; 
}
$n =[
    "cctv1" => "cctv1HD", //CCTV1
    "cctv2" => "cctv2HD", //CCTV2
    "cctv3" => "cctv3HD", //CCTV3
    "cctv4" => "cctv4HD",//CCTV4
    "cctv5" => "cctv5HD",//CCTV5
    "cctv5p" => "cctv5SportHD", //CCTV5+
    "cctv6" => "cctv6HD",//CCTV6
    "cctv7" => "cctv7HD",//CCTV7
    "cctv8" => "cctv8HD",//CCTV8
    "cctv9" => "cctv9HD",//CCTV9
    "cctv10" => "cctv10HD", //CCTV110
    "cctv11" => "cctv11HD", //CCTV11
    "cctv12" => "cctv12HD", //CCTV12
    "cctv13" => "CCTVNewsHD",//CCTV13
    "cctv14" => "cctvseHD",//CCTV14
    "cctv15" => "cctv15HD",//CCTV15
    "cctv16" => "cctv16HD", //CCTV16
    "cctv17" => "cctv17HD",//CCTV17
    "cctv4k"=> "cctv4K",//CCTV4K
    "cctv16_4k"=>"cctv16_4K",//CCTV16-4K
    "bqkj" => "bqkjHD", //CCTV兵器科技
    "dyjc" => "diyijuchangHD",//CCTV第一剧场
    "hjjc" => "hjjcHD",//CCTV怀旧剧场
    "fyjc" => "fyjcHD",//CCTV风云剧场
    "fyyy" => "fyyyHD", //CCTV风云音乐
    "fyzq" => "fyzqHD", //CCTV风云足球
    "whjp" => "yswhHD", //CCTV央视文化精品
    "nxss" => "nvxing", //CCTV女性时尚
    "gefwq" => "golfHD",//CCTV高尔夫网球
    "ystq" => "ystqHD",//CCTV央视台球
    "zxs" => "qicai", //中央新影中学生
    "fxzl" => "faxian", //中央新影发现之旅
    "lgs" => "gushi", //中央新影老故事
    "sh" => "shuhua", //书画
    "zgtq" => "tianqiSD",//中国天气
    "cgtn" => "cgtnSD", //CGTN
    "cetv1" => "cetv-1SD", //CETV1
    "cetv4" => "cetv-4SD",//CETV4
    "zqjy" => "zaojiaoHD", //早期教育
    "chcgq" => "chcgqdyHD", //CHC影迷电影
    "chcdz" => "chcdzdyHD", //CHC动作电影
    "chcjt" => "chcjtyyHD",//CHC家庭影院
    "bjws" => "beijingHD", //北京卫视
    "dfws" => "shanghaiHD", //东方卫视
    "tjws" => "tianjinHD", //天津卫视
    "cqws" => "chongqingHD", //重庆卫视
    "hljws" => "heilongjiangHD",//黑龙江卫视
    "jlws" => "jilinHD", //吉林卫视
    "lnws" => "liaoningHD", //辽宁卫视
    "nmws" => "neimengkuSD", //内蒙古卫视
    "nxws" => "ningxia", //宁夏卫视
    "qhws" => "qinghaiSD",//青海卫视
    "hbws" => "hebeiSD",//河北卫视
    "ahws" => "anhuiSD", //安徽卫视
    "hnws" => "henanHD", //河南卫视
    "hubws" => "hubeiSD", //湖北卫视
    "hunws" => "hunanHD", //湖南卫视
    "jxws" => "jiangxiHD", //江西卫视
    "jsws" => "jiangsuHD", //江苏卫视
    "zjws" => "zhejiangHD", //浙江卫视
    "dnws" => "dongnanHD", //东南卫视
    "gdws" => "guangdongHD",//广东卫视
    "szws" => "shenzhenHD", //深圳卫视
    "gxws" => "guangxiHD", //广西卫视
    "ynws" => "yunnanSD", //云南卫视
    "gzws" => "guizhouHD",//贵州卫视
    "scws" => "sichuanHD", //四川卫视
    "xjws" => "xinjiangSD", //新疆卫视
    "btws" => "bingtuanSD", //兵团卫视
    "xzws" => "xizangSD", //西藏卫视
    "hinws" => "hainanSD", //海南卫视
    "ssws" => "sanshaSD", //三沙卫视
    "bjjskj" => "bjayjsSD", //纪实科教
    "bjkk" => "bjkakuSD", //卡酷少儿
    "zhtc" => "techan", //中华特产
    "sthj" => "shengtai", //生态环境
    "shdy" => "diaoyu",//四海钓鱼
    "cmpd" => "doxtv",//车迷频道
    "bxjk" => "jiankangSD", //百姓健康
    "hqqg" => "car", //环球奇观
    "hqly" => "huanqiulvyou", //环球旅游
    "yybb" => "youxi",//优优宝贝
    "jshqjx" => "jusha", //聚鲨环球精选
    "dfcj" => "dfcj", //东方财经
    "hxjc" => "hxjc_4K", //欢笑剧场
    "dsjc" => "dsjcHD", //都市剧场
    "mlzq" => "mlzqHD",//魅力足球
    "dmxc" => "dmxcHD",//动漫秀场
    "yxfy" => "yxfyHD",//游戏风云
    "shss" => "shenghuo", //生活时尚
    "fztd" => "fazhi",//法治天地
    "jsxt" => "jinse",//金色学堂
    "cqxw" => "CQTVNewsHD",//重庆新闻
    "cqkj" => "CQTVkejiaoHD",//重庆科教
    "cqys" => "cqyingshiHD",//重庆影视
    "cqwtyl" => "cqwtylHD", //重庆文体娱乐
    "cqse" => "cqseHD", //重庆少儿
    "cqsssh" => "cqssgwHD", //重庆时尚生活
    "cqxnc" => "cqggncHD",//重庆新农村
    "cqshyf" => "CQTVTrendyHD", //重庆社会与法
    "cqyd" => "mryyHD", //重庆移动
    "cqqm" => "cqcarSD", //重庆汽摩
    "cgrm" => "cqrongmei",//重广融媒
    "akds" => "aikanHD", //爱看导视
    "hczh" => "hechuan", //合川综合
    "cszh" => "changshou", //长寿综合
    "yyzh" => "youyang", //酉阳综合
    "yunyzh" => "jiangjinHD",//云阳综合
    "tlzh" => "tongliangzongheHD", //铜梁综合
    "jygw" => "jygw", //家有购物
    "xdm" => "dongman",//新动漫
    "zqfw" => "jiazheng",//证券服务
    "sdjy" => "sdjiaoyuSD", //山东教育卫视
    "sctx" => "soucang",//收藏天下
    "gxpd" => "guoxue", //国学频道
    "klcd" => "klcdHD", //快乐垂钓
    "jykt" => "jinyingSD",//金鹰卡通
    "xfpy" => "xianfeng", //先锋乒羽
    "cftx" => "caifu", //财富天下
    "tywq" => "weiqi", //天元围棋
    'sypd' => 'sheying', //摄影频道
    "cwjd" => "cwjdHD", //重温经典
    "qsjl" => "qsjlHD", //求索记录
    "fhzw"=> "fhzwhd",//凤凰中文
    "fhzx"=> "fhzxhd",//凤凰资讯
    "fhhk"=> "fhhkhd",//凤凰香港
    ];
$id = isset($_GET['id']) ? $_GET['id'] : '';
if($id==""||!array_key_exists($id,$n)){
        http_response_code(403);
        die("403 Forbidden :参数错误");
    }
if(!is_dir('./cache/')) {
    mkdir('./cache/', 0777, true);}
$cachepath='./cache/#'.$id.'.txt';
$aid=$n[$id];$time=time();
$purl=readcache($cachepath,$time,$aid);
header('Location: ' . $purl);
exit;
