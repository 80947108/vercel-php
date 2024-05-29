<?php
$vid = isset($_GET['id']) ? $_GET['id'] : 'gdws';
$n =array(
   'gdws'=>1182, //广东卫视
   'dwqws'=>1197, //大湾区卫视
   'dwqws2'=>1191, //大湾区卫视（海外版）
   'gdfc'=>1192, //大湾区卫视（海外版）
   'gdzj'=>1183, //广东珠江
   'gdms'=>1185, //广东民生
   'gdxw'=>1186, //广东新闻
   'gdzy'=>1198, //广东综艺
   'gdty'=>1184, //广东体育
   'gdys'=>1199, //广东影视
   'gdjjkj'=>1196, //广东经济科教
   'gdse'=>1200, //广东少儿
   'gdyd'=>2463, //广东移动
   'jjkt'=>1187, //嘉佳卡通
   'gdwh'=>2511, //GRTN文化
   'nfgw'=>2393,//南方购物
   'xdjy'=>2436,//现代教育
   //河源
   'hyzh'=>2402, //河源综合
   'hygg'=>2496, //河源公共
   'dytv'=>2497, //东源台
   'hptv'=>2492, //和平台
   'lpzh'=>2520, //连平综合
   'zjtv'=>2452, //紫金台
   //阳江
   'yjtv1'=>2505, //阳江-1
   'yjtv2'=>2506, //阳江-2
   'yczh'=>2458, //阳春综合
   'yxzh'=>2476, //阳西综合
   //汕尾
   'hftv'=>2413, //海丰县电视台
   //清远
   'lzzh'=>2455, //连州综合
   'ydzh'=>2447, //英德新闻综合
   //肇庆
   'zqzh'=>1232, //肇庆综合
   'zqshfw'=>2525, //肇庆生活服务
   'gnzh'=>2414, //广宁综合
   'hjzh'=>2462, //怀集综合
   //惠州
   'hdzh'=>2404, //惠东综合
   'hytv'=>2470, //惠阳电视台
   //湛江
   'ljzh'=>2445, //廉江台
   'sxtv'=>2488, //遂溪台
   'wczh'=>2499, //吴川综合
   //江门
   'hszh'=>2441, //鹤山综合
   'kpzh'=>2405, //开平综合
   'kpsh'=>2406, //开平生活
   'tstv'=>2479, //台山台
   'xhzh'=>2490, //新会综合
   //茂名
   'xytv1'=>2471, //信宜综合
   'hzzh'=>2440, //化州综合
   //韶关
   'lctv'=>2503, //乐昌电视台
   //潮州
   'cazh'=>2523, //潮安综合
   //揭阳
   'pnzh'=>2450, //普宁台
   //云浮
   'ldzh'=>2491, //罗定综合
   //西藏
   'gbjd'=>2439, //工布江达电视台
  ); 
$url = 'https://api.itouchtv.cn:8090/liveservice/v1/tvChannelcontent?sid='.$n[$vid];
$timestamp=time();
$str ="GET\n".$url."\n".$timestamp."\n";  
$key = 'HGXimfS2hcAeWbsCW19JQ7PDasYOgg1lY2UWUDVX8nNmwr6aSaFznnPzKrZ84VY1';  
$hash = hash_hmac('SHA256', $str, $key, true);
$sign = base64_encode($hash);  
$headers =array(  
    'X-ITOUCHTV-Ca-Key: 28778826534697375418351580924221',  
    'X-ITOUCHTV-Ca-Signature: ' . $sign,  
    'X-ITOUCHTV-Ca-Timestamp: ' . $timestamp,  
    'X-ITOUCHTV-CLIENT: ews_APP',  
    'X-ITOUCHTV-DEVICE-ID: IMEI_867464032598278',  
    'X-ITOUCHTV-TS: ' . $timestamp,  
);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0" );
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        $data = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($data);
    $m3u8=$json->tvChannel->videoUrl;
        header('location:'.$m3u8);
?>
