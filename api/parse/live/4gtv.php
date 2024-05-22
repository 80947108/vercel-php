<?php
	/*
	墙内反代免翻php
	食用方法4g-litv.php?id=4gtv-4gtv001
	此php适用于墙内成功部署了pixman/4gtv容器，根据每个人的网络状况具体修改两处，搜索'http://192.168.0.86:5000'替换成自己的容器地址,
	再搜索'http://192.168.0.83:7890'替换成自己的代理地址。
	*/
	header('Content-Type: text/plain; charset=utf-8');
	$php='http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$id = isset($_GET['id'])?$_GET['id']:'litv-longturn14';
	$n=array(
		'4gtv-4gtv001' => [1, 6],//民视台湾台
		'4gtv-4gtv002' => [1, 10],//民视
		'4gtv-4gtv003' => [1, 6],//民视第一台
		'4gtv-4gtv004' => [1, 8],//民视综艺
		'4gtv-4gtv006' => [1, 9],//猪哥亮歌厅秀
		'4gtv-4gtv009' => [2, 7],//中天新闻
		'4gtv-4gtv010' => [1, 2],//非凡新闻
		'4gtv-4gtv011' => [1, 6],//影迷數位電影台
		'4gtv-4gtv013' => [1, 2],//視納華仁紀實頻道
		'4gtv-4gtv014' => [1, 5],//时尚运动X
		'4gtv-4gtv016' => [1, 6],//GLOBETROTTER
		'4gtv-4gtv017' => [1, 6],//amc电影台
		'4gtv-4gtv018' => [1, 10],//达文西频道
		'4gtv-4gtv034' => [1, 6],//八大精彩台
		'4gtv-4gtv039' => [1, 7],//八大综艺台
		'4gtv-4gtv040' => [1, 6],//中视
		'4gtv-4gtv041' => [1, 6],//华视
		'4gtv-4gtv042' => [1, 6],//公视戏剧
		'4gtv-4gtv043' => [1, 6],//客家电视台
		'4gtv-4gtv044' => [1, 8],//靖天卡通台
		'4gtv-4gtv045' => [1, 6],//靖洋戏剧台
		'4gtv-4gtv046' => [1, 8],//靖天综合台
		'4gtv-4gtv047' => [1, 8],//靖天日本台
		'4gtv-4gtv048' => [1, 2],//非凡商业
		'4gtv-4gtv049' => [1, 8],//采昌影剧
		'4gtv-4gtv051' => [1, 6],//台视新闻
		'4gtv-4gtv052' => [1, 8],//华视新闻
		'4gtv-4gtv053' => [1, 8],//GinxTV
		'4gtv-4gtv054' => [1, 8],//靖天欢乐台
		'4gtv-4gtv055' => [1, 8],//靖天映画
		'4gtv-4gtv056' => [1, 2],//台视财经
		'4gtv-4gtv057' => [1, 8],//靖洋卡通台
		'4gtv-4gtv058' => [1, 8],//靖天戏剧台
		'4gtv-4gtv059' => [1, 6],//古典音乐台
		'4gtv-4gtv061' => [1, 7],//靖天电影台
		'4gtv-4gtv062' => [1, 8],//靖天育乐台
		'4gtv-4gtv063' => [1, 6],//靖天国际台
		'4gtv-4gtv064' => [1, 8],//中视菁采
		'4gtv-4gtv065' => [1, 8],//靖天资讯台
		'4gtv-4gtv066' => [1, 2],//台视
		'4gtv-4gtv067' => [1, 8],//tvbs精采台
		'4gtv-4gtv068' => [1, 7],//tvbs欢乐台
		'4gtv-4gtv070' => [1, 7],//爱尔达娱乐
		'4gtv-4gtv072' => [1, 2],//tvbs新闻台
		'4gtv-4gtv073' => [1, 8],//tvbs
		'4gtv-4gtv074' => [1, 8],//中视新闻
		'4gtv-4gtv075' => [1, 6],//镜新闻
		'4gtv-4gtv076' => [1, 2],//CATCHPLAY电影台
		'4gtv-4gtv077' => [1, 7],//TRACE SPORTS STARS
		'4gtv-4gtv079' => [1, 2],//阿里郎
		'4gtv-4gtv080' => [1, 5],//中视经典
		'4gtv-4gtv082' => [1, 7],//TRACE URBAN
		'4gtv-4gtv083' => [1, 6],//MEZZO LIVE
		'4gtv-4gtv084' => [1, 6],//国会频道1
		'4gtv-4gtv085' => [1, 5],//国会频道2
		'4gtv-4gtv101' => [1, 6],//智林体育台
		'4gtv-4gtv104' => [1, 7],//国际财经
		'4gtv-4gtv109' => [1, 7],//第1商業台
		'4gtv-4gtv152' => [1, 6],//东森新闻
		'4gtv-4gtv153' => [1, 6],//东森财经新闻
		'4gtv-4gtv155' => [1, 6],//民视
		'4gtv-4gtv156' => [1, 2],//民视台湾台
		'litv-ftv03' => [1, 7],//美国之音
		'litv-ftv07' => [1, 7],//民视旅游
		'litv-ftv09' => [1, 7],//民视影剧
		'litv-ftv10' => [1, 7],//半岛新闻
		'litv-ftv13' => [1, 7],//民视新闻台
		'litv-ftv15' => [1, 7],//爱放动漫
		'litv-ftv16' => [1, 2],//好消息
		'litv-ftv17' => [1, 2],//好消息2台
		'litv-longturn01' => [4, 2],//龙华卡通
		'litv-longturn03' => [5, 2],//龙华电影
		'litv-longturn04' => [5, 2],//博斯魅力
		'litv-longturn05' => [5, 2],//博斯高球1
		'litv-longturn06' => [5, 2],//博斯高球2
		'litv-longturn07' => [5, 2],//博斯运动1
		'litv-longturn08' => [5, 2],//博斯运动2
		'litv-longturn09' => [5, 2],//博斯网球
		'litv-longturn10' => [5, 2],//博斯无限
		'litv-longturn11' => [5, 2],//龙华日韩
		'litv-longturn12' => [5, 2],//龙华偶像
		'litv-longturn13' => [4, 2],//博斯无限2
		'litv-longturn14' => [1, 6],//寰宇新闻台
		'litv-longturn15' => [5, 2],//寰宇新闻台湾台
		'litv-longturn17' => [5, 2],//亚洲旅游台
		'litv-longturn18' => [5, 2],//龙华戏剧
		'litv-longturn19' => [5, 2],//Smart知识台
		'litv-longturn20' => [5, 2],//生活英语台
		'litv-longturn21' => [5, 2],//龙华经典
		'litv-longturn22' => [5, 2],//台湾戏剧台
		);
	$m=array(
    		'4gtv-live208'=>139,//Love Nature
    		'4gtv-live201'=>160,//車迷TV
   	 	'4gtv-live206'=>168,//幸福空間居家台
    		'4gtv-live207'=>169,//三立綜合台
    		'4gtv-live047'=>173,//東森購物一台
   		'4gtv-live046'=>174,//東森購物二台
    		'4gtv-live121'=>175,//LUXE TV Channel
    		'4gtv-live157'=>176,//My Cinema Europe HD 我的歐洲電影
    		'4gtv-live122'=>178,//TV5MONDE STYLE HD 生活時尚
    		'4gtv-live138'=>180,//ROCK Action
    		'4gtv-live109'=>181,//TechStorm
    		'4gtv-live110'=>182,//Pet Club TV
    		'4gtv-live105'=>185,//尼克兒童頻道
    		'4gtv-live620'=>186,//HITS頻道
    		'4gtv-live030'=>188,//LiveABC互動英語頻道
    		'4gtv-live021'=>201,//經典電影台
    		'4gtv-live022'=>202,//經典卡通台
    		'4gtv-live024'=>204,//精選動漫台
    		'4gtv-live007'=>209,//大愛電視
    		'4gtv-live008'=>210,//人間衛視
    		'4gtv-live023'=>212,//影迷數位紀實台
    		'4gtv-live025'=>213,//MTV Live HD 音樂頻道
    		'4gtv-live026'=>214,//History 歷史頻道
    		'4gtv-live027'=>215,//CI 罪案偵查頻道
    		'4gtv-live029'=>217,//Lifetime 娛樂頻道
    		'4gtv-live031'=>218,//電影原聲台CMusic
    		'4gtv-live032'=>219,//Nick Jr. 兒童頻道
    		'4gtv-live050'=>223,//XTR亞太台
    		'4gtv-live060'=>224,//SBN全球財經台
    		'4gtv-live069'=>225,//CinemaWorld
    		'4gtv-live071'=>226,//DW德國之聲
    		'4gtv-live089'=>229,//三立新聞iNEWS  
    		'4gtv-live106'=>230,//大愛二台  
    		'4gtv-live107'=>231,//MOMO親子台  
    		'4gtv-live130'=>235,//CNBC Asia 財經台  
    		'4gtv-live144'=>236,//金光布袋戲  
    		'4gtv-live120'=>237,//愛爾達生活旅遊台  
    		'4gtv-live006'=>244,//戲劇免費看 2台  
    		'4gtv-live005'=>245,//電影免費看 2台  
   	 	'4gtv-live215'=>246,//民視  
    		'4gtv-live012'=>249,//滾動力rollor
    		'4gtv-live112'=>252,//Global Trekker  
    		'4gtv-live403'=>254,//民視第一台
    		'4gtv-live401'=>255,//民視台灣台
    		'4gtv-live452'=>256,//華視新聞
    		'4gtv-live413'=>257,//民視新聞台
    		'4gtv-live474'=>258,//中視新聞
    		'4gtv-live409'=>260,//中天新聞台
   	 	'4gtv-live417'=>261,//亞洲旅遊台
    		'4gtv-live408'=>262,//寰宇新聞台
    		'4gtv-live405'=>264,//博斯高球台
    		'4gtv-live404'=>265,//博斯運動一台
    		'4gtv-live407'=>266,//博斯無限台
    		'4gtv-live406'=>267,//博斯網球台
    		'4gtv-live009'=>269,//兒童卡通台
    		'4gtv-live010'=>270,//戲劇免費看 1台
   		'4gtv-live014'=>273,//原住民族電視台
    		'4gtv-live011'=>274,//fun探索娛樂台
    		'4gtv-live080'=>275,//ROCK Entertainment
    		'4gtv-live410'=>276,//八大綜藝台
    		'4gtv-live411'=>277,//時尚運動X
    		'4gtv-live015'=>278,//超人力霸王整套看
    		'4gtv-live016'=>279,//花系列 經典劇場
    		'4gtv-live017'=>282,//DreamWorks 夢工廠動畫
    		'4gtv-live059'=>283,//Bloomberg TV
    		'4gtv-live087'=>284,//TVBS綜藝台
    		'4gtv-live088'=>285,//TVBS台劇台
    		'4gtv-live301'=>289,//番茄直擊台
    		'4gtv-live302'=>290,//芭樂直擊台
		);
	if(isset($n[$id])){
		$timestamp = intval(time()/4-355017625);
		$t=$timestamp*4;
		$current = "#EXTM3U"."\r\n";
		$current.= "#EXT-X-VERSION:3"."\r\n";
		$current.= "#EXT-X-TARGETDURATION:4"."\r\n";
		$current.= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}"."\r\n";
		for ($i=0; $i<3; $i++) {
    			$current.= "#EXTINF:4,"."\r\n";
    			$current.= "https://litvpc-hichannel.cdn.hinet.net/live/pool/{$id}/litv-pc/{$id}-avc1_6000000={$n[$id][0]}-mp4a_134000_zho={$n[$id][1]}-begin={$t}0000000-dur=40000000-seq={$timestamp}.ts"."\n";
    			$timestamp = $timestamp + 1;
			$t=$t+4;
    			}
   		$m3u8=$current;
		}
	elseif(isset($m[$id])){
		$burl='https://hyf000.eu.org';
		$url=$burl.'/4gtv/'.$m[$id];
		$url=curl_request($url,1,0);
		$url=explode("\n", $url)[6];
		$url=explode("url=", $url)[1];
		$url=trim(urldecode($url));
		$m3u8=curl_request($url,0,1);
		}
	else die('没有找到合法id!');
	if(empty($_GET['ts'])){
		$m3u8=str_replace('&','%26',$m3u8);
		$m3u8=preg_replace("/(.*?.ts)/i",$php.'?ts='. "$1", $m3u8);
		header('Content-Type: application/vnd.apple.mpegurl'); 
		header('Content-Disposition: inline; filename='.$id.'.m3u8');
		header('Content-Length: ' . strlen($m3u8)); 
		echo $m3u8;
		}else{
		echo curl_request($_GET['ts'],0,1);
		}

	function curl_request($url,$taga,$tagb){
		$header = array();
		$header[]='Connection: keep-alive';
		$header[]='User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36';
		$ch=curl_init ();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_HEADER, $taga);
		if($tagb==1){
			curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);
        			curl_setopt($ch, CURLOPT_PROXY, "https://hyf000.eu.org/live");
			}
		$out = curl_exec ( $ch );
		curl_close ( $ch );
		return $out;
		}
