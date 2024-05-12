<?php

$id = isset($_GET['id']) ? $_GET['id'] : 'cctv9';
$playseek = $_GET['playseek']??'';
$n = [
    'cctv1' => 'ZhongYangYiTaoHD_H264_MP2_2500000/2500000', //cccv1
    'cctv2' => 'ZhongYangErTaoHD_H264_MP2_2500000/2500000', //cccv2
    'cctv3' => 'ZhongYangSanTaoHD_H264_MP2_2500000/2500000', //cccv3
    'cctv4' => 'ZhongYangSiTaoHD_H264_MP2_2500000/2500000', //cccv4
    'cctv5' => 'ZhongYangWuTaoHD_H264_MP2_2500000/2500000', //cccv5
    'cctv5p' => 'CCTVZongHeHD_H264_MP2_2500000/2500000', //cccv5+
    'cctv6' => 'ZhongYangLiuTaoHD_H264_MP2_2500000/2500000', //cccv6
    'cctv7' => 'ZhongYangQiTaoHD_H264_MP2_2500000/2500000', //cccv7
    'cctv8' => 'ZhongYangBaTaoHD_H264_MP2_2500000/2500000', //cccv8
    'cctv9' => 'ZhongYangJiLuHD_H264_MP2_2500000/2500000', //cccv9
    'cctv10' => 'ZhongYangShiTaoHD_H264_MP2_2500000/2500000', //CCTV10
    'cctv11' => 'ZhongYangShiYiTao_H264_MP2_1900000/1900000', //CCTV11
    'cctv12' => 'ZhongYangShiErTaoHD_H264_MP2_2500000/2500000', //CCTV12
    'cctv13' => 'ZhongYangXinWenHD_H264_MP2_2500000/2500000', //CCTV13
    'cctv14' => 'ZhongYangShaoErHD_H264_MP2_2500000/2500000', //CCTV14
    'cctv15' => 'ZhongYangYinYueHD_H264_MP2_2500000/2500000', //CCTV15
    'cctv16' => 'CCTV16AoLinPiKeHD_H264_MP2_2500000/2500000', //CCTV16
    'cctv17' => 'ZhongYangShiQiTaoHD_H264_MP2_2500000/2500000', //CCTV17
    'cgtn' => 'CCTVGuoJi_H264_MP2_1900000/1900000', //CGTN
    'cwjd' => 'ChongWenJingDian_H264_MP2_2500000/2500000', //重温经典
    'cetv4' => 'ZhongGuoJiaoYuSiTao_H264_MP2_1900000/1900000', //CETV4
    'bjws' => 'BeiJingWeiShiHD_H264_MP2_2500000/2500000', //北京卫视
    'dfws' => 'DongFangWeiShiHD_H264_MP2_10000000/10000000', //东方卫视
    'tjws' => 'TianJinWeiShiHD_H264_MP2_2500000/2500000', //天津卫视
    'cqws' => 'ChongQingWeiShiHD_H264_MP2_2500000/2500000', //重庆卫视
    'hljws' => 'HeiLongJiangWeiShiHD_H264_MP2_2500000/2500000', //黑龙江卫视
    'jlws' => 'JiLinWeiShiHD_H264_MP2_2500000/2500000', //吉林卫视
    'lnws' => 'LiaoNingWeiShiHD_H264_MP2_2500000/2500000', //辽宁卫视
    'hbws' => 'HeBeiWeiShi_H264_MP2_1900000/1900000', //河北卫视
    'sdws' => 'ShanDongWeiShiHD_H264_MP2_2500000/2500000', //山东卫视
    'ahws' => 'AnHuiWeiShiHD_H264_MP2_2500000/2500000',//安徽卫视
    'hnws' => 'HeNanWeiShi_H264_MP2_1900000/1900000',//河南卫视
    'hubws' => 'HuBeiWeiShiHD_H264_MP2_2500000/2500000',//湖北卫视
    'hunws' => 'HuNanWeiShiHD_H264_MP2_2500000/2500000',//湖南卫视
    'jxws' => 'JiangXiWeiShiHD_H264_MP2_2500000/2500000',//江西卫视
    'jsws' => 'JiangSuWeiShiHD_H264_MP2_2500000/2500000',//江苏卫视
    'zjws' => 'ZheJiangWeiShiHD_H264_MP2_2500000/2500000',//浙江卫视
    'dnws' => 'DongNanWeiShiHD_H264_MP2_2500000/2500000',//东南卫视
    'gdws' => 'GuangDongWeiShiHD_H264_MP2_2500000/2500000',//广东卫视
    'szws' => 'ShenZhenWeiShiHD_H264_MP2_2500000/2500000',//深圳卫视
    'gxws' => 'GuangXiWeiShi_H264_MP2_1900000/1900000',//广西卫视
    'gzws' => 'GuiZhouWeiShiHD_H264_MP2_2500000/2500000',//贵州卫视
    'scws' => 'SiChuanWeiShiHD_H264_MP2_2500000/2500000',//四川卫视
    'ynws' => 'YunNanWeiShi_H264_MP2_1900000/1900000', //云南卫视
    'xjws' => 'XinJiangWeiShi_H264_MP2_1900000/1900000', //新疆卫视
    'btws' => 'BingTuanWeiShi_H264_MP2_1900000/1900000', //兵团卫视
    'xzws' => 'XiZangWeiShi_H264_MP2_1900000/1900000', //西藏卫视
    'hinws' => 'HaiNanWeiShi_H264_MP2_1900000/1900000',//海南卫视
    'ssws' => 'SanShaWeiShi_H264_MP2_2500000/2500000', //三沙卫视
    'nmgws' => 'NeiMengGuWeiShi_H264_MP2_1900000/1900000', //内蒙古卫视
    'nxws' => 'NingXiaWeiShi_H264_MP2_1900000/1900000', //宁夏卫视
    'gsws' => 'GanSuWeiShi_H264_MP2_1900000/1900000', //甘肃卫视
    'qhws' => 'QingHaiWeiShi_H264_MP2_1900000/1900000', //青海卫视
    'sxws' => 'ShanXiWeiShi_H264_MP2_1900000/1900000', //陕西卫视
    'sxtv' => 'ShanXiWeiShi-1_H264_MP2_1900000/1900000', //山西卫视
    'bjjs' => 'BeiJingJiShiKeJiao_H264_MP2_1900000/1900000', //北京纪实
    'shdy' => 'SiHaiDiaoYu_H264_MP2_1900000/1900000', //四海钓鱼
    'jyjs' => 'JinYingJiShi_H264_MP2_1900000/1900000', //金鹰纪实
    'zjqj' => 'QianJiangPinDaoHD_H264_MP2_2500000/2500000', //浙江钱江
    'zjjjsh' => 'ZheJiangJingShiHD_H264_MP2_2500000/2500000', //浙江经济生活
    'zjjkys' => 'ZheJiangJiaoKeYingShiHD_H264_MP2_2500000/2500000', //浙江教科影视
    'zjmsxx' => 'MinShengXiuXianHD_H264_MP2_2500000/2500000', //浙江民生休闲
    'zjxw' => 'ZheJiangXinWenHD_H264_MP2_2500000/2500000', //浙江新闻
    'zjse' => 'ZheJiangShaoErHD_H264_MP2_2500000/2500000', //浙江少儿
    'zjhyg' => 'HaoYiGouHD_H264_MP2_2500000/2500000', //浙江好易购
    'hzzh' => 'HangZhouZongHeHD_H264_MP2_2500000/2500000', //杭州综合
    'hzmz' => 'XiHuMingZhuHD_H264_MP2_2500000/2500000', //杭州明珠
    'hzsh' => 'HangZhouShengHuoHD_H264_MP2_2500000/2500000', //杭州生活
    'hzys' => 'HangZhouYingShiHD_H264_MP2_2500000/2500000', //杭州影视
    'hzse' => 'HangZhouYaYunPinDaoHD_H264_MP2_2500000/2500000', //杭州青少体育
    'hzds' => 'HangZhouDaoShiHD_H264_MP2_2500000/2500000', //杭州导视
    'lpxw' => 'KuaiLeChuiDiao_H264_MP2_1900000/1900000', //临平新闻
    'wasu' => 'HuaShuFuWuHD_H264_MP2_2500000/2500000', //华数频道
    'tywq' => 'TianYuanWeiQi_H264_MP2_1900000/1900000', //天元围棋
    'fhzw' => 'FengHuangZhongWenII_H264_MP2_1900000/1900000', //中文
    'fhzx' => 'FengHuangZiXun_H264_MP2_1900000/1900000', //资讯
];

$ip_arr = [
        '125.210.150.56',
        '125.210.150.57',
        '125.210.150.58',
];
$ip = $ip_arr[array_rand($ip_arr)];
$timestamp = intval((time() - 100)/5);
$stream = "http://$ip:9090/live/wasu/hzzx_BMH_$n[$id]/";

if (empty($playseek)) {

//*以下为直播切片
$current = "#EXTM3U" . PHP_EOL;
$current .= "#EXT-X-VERSION:3" . PHP_EOL;
$current .= "#EXT-X-TARGETDURATION:4" . PHP_EOL;
$current .= "#EXT-X-MEDIA-SEQUENCE:{$timestamp}" . PHP_EOL;
for ($i = 0; $i < 5; $i++) {
    $current .= "#EXTINF:5.000000," . PHP_EOL;
    $current .= $stream . $timestamp . ".ts" . PHP_EOL;
    $timestamp = $timestamp + 1;
}
header("Content-Type: application/vnd.apple.mpegurl");
header("Content-Disposition: inline; filename=index.m3u8");
echo $current;

} else {//回看
        /*$playseek处理*/
                $t_arr=explode('-',$playseek);
                $starttime = strtotime($t_arr[0]);
                $endtime = strtotime($t_arr[1]);
        /*媒体序列号获取*/
        $x = '5';
        $y = '0';
        $s_t = intval($starttime/$x)+$y;
        $e_t = intval($endtime/$x)+$y;
        /*m3u8列表生成*/
        $m3u8 = "#EXTM3U".PHP_EOL."#EXT-X-VERSION:3".PHP_EOL."#EXT-X-ALLOW-CACHE:YES".PHP_EOL."#EXT-X-TARGETDURATION:5".PHP_EOL."#EXT-X-MEDIA-SEQUENCE:{$s_t}".PHP_EOL;//前5行
        for (; $s_t < $e_t; $s_t++) {
                $m3u8 .= "#EXTINF:5.0,".PHP_EOL."{$stream}{$s_t}.ts".PHP_EOL;
        }
        $m3u8 .= "#EXT-X-ENDLIST";//结束标志

        header("Content-Type: application/vnd.apple.mpegURL");
        header("Content-Disposition: inline; filename=index.m3u8");
        echo $m3u8;

        }
?>
