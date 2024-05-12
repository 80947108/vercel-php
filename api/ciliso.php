<?php
//error_reporting(0);
header('content-type:application/json');
//get_wuji_id(); exit;

$from = isset($_GET['from'])?$_GET['from']:'ttcl';
$ids = isset($_GET['ids'])?$_GET['ids']:null;
$type = isset($_GET['t'])?$_GET['t']:null;
$wd = isset($_GET['wd'])?$_GET['wd']:null;
$page = isset($_GET['pg'])?$_GET['pg']:1;


if ($ids) {
    if ($from == 'wuji') {
        get_vod_info_wuji($ids, $from);
    } elseif ($from == 'btfox2') {
        get_vod_info_btfox2($ids, $from);
    } else {
        get_vod_info($ids, $from);
    }
} elseif ($type) {
    get_vod_list($type, $page);
} elseif ($wd) {
    get_wd($wd, $from);
} else {
    //get_type();
}


function get_vod_info($ids, $from = 'duo5') {
    $ret['list'][0]['vod_id'] = $ids;
    $ret['list'][0]['vod_name'] = $ids;
    $ret['list'][0]['vod_pic'] = 'https://s1.ax1x.com/2023/02/01/pSBLamF.png';
    $ret['list'][0]['vod_year'] = '';
    $ret['list'][0]['vod_area'] = '';
    $ret['list'][0]['vod_remarks'] = $from;
    $ret['list'][0]['vod_content'] = '磁力播放测试';
    $ret['list'][0]['vod_actor'] = $from;
    $ret['list'][0]['vod_director'] = $from;
    $ret['list'][0]['vod_play_from'] = 'magnet';
    $ret['list'][0]['vod_play_url'] = 'magnet:?xt=urn:btih:'.$ids;
    echo json_encode($ret, 256);
}

function get_wd($wd, $from) {
    $do_function = 'get_wd_'.$from;
    $page = 1;
    $do_function($wd, $page);
}

function get_wd_ttcl($wd = '成龙', $page = '1') {
    $wd = urlencode($wd);
    $ret = [];
    $ret['code'] = 200;
    for ($page = 1; $page <= 2; $page++) {
        $api = "https://tt.ttcl.cc/search?key={$wd}&page={$page}";
        $headers[] = 'Referer: https://tt.ttcl.cc/';
        $code = get_curl_contents($api, $headers);
        preg_match_all('|<div class="panel panel-default search-panel">(.*?)</div></div></div><div>|', $code, $temp_list);
        foreach ($temp_list[0] as $k => $v) {
            preg_match('|<a class="list-title" href="/bt/(.*?)">(.*?)</a></h3></div>|',$v,$id_name);
            preg_match('|文件大小: <span class="info-item">(.*?)</span>|',$v,$size);
            if($id_name){
            $list = [];
            $list['vod_id'] = $id_name[1];
            $list['vod_name'] = '['.urldecode($wd).']'. strip_tags($id_name[2]);
            $list['vod_pic'] = '';
            $list['vod_remarks'] = $size[1];
            $ret['list'][] = $list;
            }
        }
    }
    echo json_encode($ret, 256);
}

function get_wd_duo5($wd = '成龙', $page = '1') {
    $wd = urlencode($wd);
    $ret = [];
    $ret['code'] = 200;
    for ($page = 1; $page <= 2; $page++) {
        $api = "https://doc.htmcdn.com:39988/search-{$wd}-rel-{$page}.html";
        $headers[] = 'Referer: https://doc.htmcdn.com:39988/?host=duo5.link&v=1';
        $code = get_curl_contents($api, $headers);

        preg_match_all('|<div class="title"><h3>(.*?)<a target="_blank" href="/doc/(.*?)">(.*?)</a></h3>|', $code, $temp_list);
        preg_match_all('|<span>大小：<b class="cpill yellow-pill">(.*?)</b></span>|', $code, $size_list);

        foreach ($temp_list[2] as $k => $v) {
            $list = [];
            $list['vod_id'] = $v;
            $list['vod_name'] = '['.urldecode($wd).']'. strip_tags($temp_list[3][$k]);
            $list['vod_pic'] = '';
            $list['vod_remarks'] = $size_list[1][$k];
            $ret['list'][] = $list;
        }

    }
    echo json_encode($ret, 256);
}

function get_wd_btfox($wd = '成龙', $page = '1') {
    $wd = urlencode($wd);
    $ret = [];
    $ret['code'] = 200;
    for ($page = 1; $page <= 2; $page++) {
        $api = "https://cache.foxs.top/search?word={$wd}&page={$page}"; //&sort=size
        $headers[] = "Referer: https://cache.foxs.top/search?word={$wd}";
        //$api="https://btfox2.vip/s?wd={$wd}&page={$page}";
        $code = get_curl_contents($api, $headers);
        //echo $api; echo $code; exit;
        preg_match_all('|<a href="/doc/(.*?)" title="(.*?)">|', $code, $temp_list);
        preg_match_all('|<p>文件大小： <span>(.*?)</span></p>|', $code, $size_list);
        preg_match_all('|<p>资源热度： <span>(.*?)</span></p>|', $code, $hot_list);
        preg_match_all('|<p>最近更新： <span>(.*?)</span></p>|', $code, $time_list);
        preg_match_all('|<p>文件数量： <span>(.*?)</span></p>|', $code, $num_list);
        //var_dump($temp_list);
        foreach ($temp_list[1] as $k => $v) {
            $list = [];
            $list['vod_id'] = $v;
            $list['vod_name'] = '['.urldecode($wd).']'. strip_tags($temp_list[2][$k]);
            $list['vod_pic'] = '';
            $list['vod_remarks'] = $size_list[1][$k];
            $ret['list'][] = $list;
        }

    }
    echo json_encode($ret, 256);
}

function get_wd_wuji($wd = '成龙', $page = '1') {
    $wd = urlencode($wd);
    $ret = [];
    $ret['code'] = 200;
//https://www.wuji1.pw/list?key=xWOBtC75B309uYLxLi5oCw==
    $api = "https://3ci.li/search?q={$wd}";
    $code = get_curl_contents($api);
    $code = get_between($code, '<tbody>', '</tbody>');
    preg_match_all('|<a href="(.*?)">|', $code, $temp_list);
    preg_match_all('|<p class="sample">(.*?)</p>|', $code, $name_list);
    preg_match_all('|<td class="td-size">(.*?)</td>|', $code, $size_list);

    //var_dump($name_list);
    //exit;

    foreach ($temp_list[1] as $k => $v) {
        $list = [];
        $list['vod_id'] = $v;
        $list['vod_name'] = '['.urldecode($wd).']'. strip_tags($name_list[1][$k]);
        $list['vod_pic'] = '';
        $list['vod_remarks'] = $size_list[1][$k];
        $ret['list'][] = $list;
    }
    echo json_encode($ret, 256);
}

function get_vod_info_wuji($ids = '/!eG8F', $from = 'wuji') {
    $api = "https://3ci.li{$ids}";
    $code = get_curl_contents($api);
    preg_match('|<dd>(.*?){40}</dd>|', $code, $temp_id);
    $ret['list'][0]['vod_id'] = $ids;
    $ret['list'][0]['vod_name'] = $ids;
    $ret['list'][0]['vod_pic'] = 'https://s1.ax1x.com/2023/02/01/pSBLamF.png';
    $ret['list'][0]['vod_year'] = '';
    $ret['list'][0]['vod_area'] = '';
    $ret['list'][0]['vod_remarks'] = $from;
    $ret['list'][0]['vod_content'] = '磁力播放测试';
    $ret['list'][0]['vod_actor'] = $from;
    $ret['list'][0]['vod_director'] = $from;
    $ret['list'][0]['vod_play_from'] = 'magnet';
    $ret['list'][0]['vod_play_url'] = 'magnet:?xt=urn:btih:'.$temp_id[1];
    echo json_encode($ret, 256);
}

function get_wd_btfox2($wd = '成龙', $page = '1') {
    $wd = urlencode($wd);
    $ret = [];
    $ret['code'] = 200;

    $api = "https://btfox2.vip/s?wd={$wd}&page={$page}";
    $code = get_curl_contents($api);
    $code = get_between($code, '<div class="search_nav">', '<div class="multi">');
    //echo $code;exit;
    preg_match_all('|<div><a href="(.*?)"|', $code, $temp_list);
    preg_match_all('|title="(.*?)"|', $code, $name_list);
    preg_match_all('|length：</span>(.*?)&nbsp;|', $code, $size_list);

    //var_dump($name_list);
    //exit;

    foreach ($temp_list[1] as $k => $v) {
        $list = [];
        $list['vod_id'] = $v;
        $list['vod_name'] = '['.urldecode($wd).']'. strip_tags($name_list[1][$k]);
        $list['vod_pic'] = '';
        $list['vod_remarks'] = $size_list[1][$k];
        $ret['list'][] = $list;
    }
    echo json_encode($ret, 256);
}

function get_vod_info_btfox2($ids = '/!eG8F', $from = 'wuji') {
    $api = "https://btfox2.vip{$ids}";
    $code = get_curl_contents($api);
    preg_match('|urn:btih:(.*?)<|', $code, $temp_id);
    $ret['list'][0]['vod_id'] = $ids;
    $ret['list'][0]['vod_name'] = $ids;
    $ret['list'][0]['vod_pic'] = 'https://s1.ax1x.com/2023/02/01/pSBLamF.png';
    $ret['list'][0]['vod_year'] = '';
    $ret['list'][0]['vod_area'] = '';
    $ret['list'][0]['vod_remarks'] = $from;
    $ret['list'][0]['vod_content'] = '磁力播放测试';
    $ret['list'][0]['vod_actor'] = $from;
    $ret['list'][0]['vod_director'] = $from;
    $ret['list'][0]['vod_play_from'] = 'magnet';
    $ret['list'][0]['vod_play_url'] = 'magnet:?xt=urn:btih:'.$temp_id[1];
    echo json_encode($ret, 256);
}



function get_between($input, $start, $end) {
    $substr = substr($input, strlen($start)+strpos($input, $start), (strlen($input) - strpos($input, $end))*(-1));
    return $substr;
}

function getSubstr($str, $leftStr, $rightStr) {
    $left = strpos($str, $leftStr);
    //echo '左边:'.$left;
    $right = strpos($str, $rightStr, $left);
    //echo '<br>右边:'.$right;
    if ($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}

//取源码
function get_curl_contents($url, $headers = '', $post = '', $header = 0, $nobody = 0) {
    if (!function_exists('curl_init')) die('php.ini未开启php_curl.dll');
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_TIMEOUT, 30); //5秒超时
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($c, CURLOPT_HEADER, $header); //如果你想把一个头包含在输出中，设置这个选项为一个非零值。
    curl_setopt($c, CURLOPT_NOBODY, $nobody); //如果你不想在输出中包含body部分，设置这个选项为一个非零值。
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true); //设定是否显示头信息
    if ($headers) {
        curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
    }
    if ($post) {
        curl_setopt($c, CURLOPT_POST, 1); // POST数据
        curl_setopt($c, CURLOPT_POSTFIELDS, $post); // 把post的变量加上
    }
    //var_dump($headers);var_dump($post);
    $res = curl_exec($c);
    $errorno = curl_errno($c);
    if ($errorno) {
        return $errorno;
    }
    curl_close($c);
    return $res;
}


/*

https://www.btsearch.love/search?keyword=%E6%88%90%E9%BE%99
https://tt.ttcl.cc/search?key=%E6%88%98%E9%BE%99&ap=1

http://clb2.one/?from=clbbiz?from=clb06vip
https://xunleis.vip/favorites/cilisousuo
*/
