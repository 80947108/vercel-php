<?php
// 定义频道链接
$channels = [
"1" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003864351.m3u8",//CCTV1
"2" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870745.m3u8",//CCTV2
"3" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870746.m3u8",//CCTV3
"4" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870747.m3u8",//CCTV4
"5" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870748.m3u8",//CCTV5
"6" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870759.m3u8",//CCTV5+
"7" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870749.m3u8",//CCTV6
"8" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870750.m3u8",//CCTV7
"9" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870838.m3u8",//CCTV8
"10" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870752.m3u8",//CCTV9
"11" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870753.m3u8",//CCTV10
"12" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870754.m3u8",//CCTV11
"13" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870755.m3u8",//CCTV12
"14" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000004796248.m3u8",//CCTV13
"15" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870756.m3u8",//CCTV14
"16" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870757.m3u8",//CCTV15
"17" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000004972604.m3u8",//CCTV16
"18" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870758.m3u8",//CCTV17
"19" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870776.m3u8",//北京卫视
"20" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003904597.m3u8",//卡酷少儿
"21" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873458.m3u8",//湖南卫视
"22" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873461.m3u8",//江苏卫视
"23" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873462.m3u8",//东方卫视
"24" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873464.m3u8",//浙江卫视
"25" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873465.m3u8",//湖北卫视
"26" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873466.m3u8",//天津卫视
"27" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873467.m3u8",//山东卫视
"28" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873468.m3u8",//辽宁卫视
"29" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873469.m3u8",//安徽卫视
"30" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873470.m3u8",//黑龙江卫视
"31" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873471.m3u8",//贵州卫视
"32" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873473.m3u8",//东南卫视
"33" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000004796458.m3u8",//重庆卫视
"34" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000004796511.m3u8",//江西卫视
"35" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873459.m3u8",//广东卫视
"36" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873460.m3u8",//河北卫视
"37" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003873474.m3u8",//深圳卫视
"38" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000004972569.m3u8",//吉林卫视
"39" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887270.m3u8",//河南卫视
"40" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887274.m3u8",//四川卫视
"41" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887382.m3u8",//河北卫视
"42" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887394.m3u8",//广西卫视
"43" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887404.m3u8",//陕西卫视
"44" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887413.m3u8",//山西卫视
"45" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887427.m3u8",//内蒙古卫视
"46" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887430.m3u8",//青海卫视
"47" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000004796877.m3u8",//海南卫视
"48" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887433.m3u8",//宁夏卫视
"49" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887434.m3u8",//西藏卫视
"50" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887448.m3u8",//新疆卫视
"51" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887450.m3u8",//甘肃卫视
"52" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887452.m3u8",//三沙卫视
"53" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887453.m3u8",//云南卫视
"54" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887454.m3u8",//厦门卫视
"55" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887456.m3u8",//兵团卫视
"56" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000004796942.m3u8",//金鹰卡通
"57" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887459.m3u8",//嘉佳卡通
"58" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887494.m3u8",//BTV-重温经典
"59" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887495.m3u8",//萌宠TV
"60" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887496.m3u8",//淘BABY
"61" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887497.m3u8",//淘剧场
"62" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887498.m3u8",//淘电影
"63" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887499.m3u8",//淘娱乐
"64" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003887500.m3u8",//北京IPTV4K
"65" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000004270524.m3u8",//北京体育休闲
"66" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000004270525.m3u8",//北京体育休闲
"67" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870779.m3u8",//北京体育休闲
"68" => "http://jilin-02.tosunsoft.com:35455/bptv/10000100000000050000000003870780.m3u8",//北京新闻

];

// 获取请求中的id参数
$id = $_GET['id'] ?? '';

// 检查id是否存在并返回相应的链接
if (array_key_exists($id, $channels)) {
    header('Location: ' . $channels[$id]);
    exit; // 确保重定向后停止执行
} else {
    // 如果没有找到频道，跳转到指定链接 abc
    header('Location: https://heyunfei.eu.org/error.mp4');
    exit; // 确保跳转后停止执行后续代码
}
?>
