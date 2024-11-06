<?php
/**
 * 检查给定的主机是否在线。
 *
 * @param string $host    主机名称或 IP 地址
 * @param int    $port    端口号
 * @param int    $timeout 超时时间（默认为 5 秒）
 *
 * @return bool 如果主机在线则返回 true，否则返回 false
 */
function isHostOnline($host, $port, $timeout = 5) {
    $socket = @fsockopen($host, $port, $errno, $errstr, $timeout);
    if (!$socket) {
        return false; // 主机不在线或连接超时
    } else {
        fclose($socket);
        return true; // 主机在线
    }
}


/**
 * 检查给定的 IPv4 地址是否属于公共网络地址，而不是私有网络地址。
 *
 * @param string $ip IPv4 地址
 *
 * @return bool 如果是公共网络地址则返回 true，否则返回 false
 */
function isPublicIPv4Address($ip) {
    // 定义私有网络地址范围
    $privateIPs = [
        '10.0.0.0/8',
        '172.16.0.0/12',
        '192.168.0.0/16',
    ];

    // 将 IPv4 地址转换为长整数
    $ipLong = ip2long($ip);

    if ($ipLong !== false) {
        foreach ($privateIPs as $privateIP) {
            list($network, $subnet) = explode('/', $privateIP);
            $networkLong = ip2long($network);
            $subnetMask = -1 << (32 - $subnet);

            // 检查是否在私有网络地址范围内
            if (($ipLong & $subnetMask) == ($networkLong & $subnetMask)) {
                return false; // IPv4 在私有网络地址范围内
            }
        }
    }

    return true; // IPv4 是外网地址
}


/**
 * 判断给定的主机地址是否是域名、IPv4地址或未知类型的地址。
 *
 * @param string $host 主机地址
 *
 * @return int 1 表示域名，0 表示IPv4地址，-1 表示未知类型
 */
function isDomainOrIPv4($host) {
    // 正则表达式匹配域名的模式
    $domainPattern = '/^(?:(?:[a-zA-Z0-9-]+\.){1,}[a-zA-Z]{2,}(?::\d+)?|localhost(?::\d+)?)$/';

    // 正则表达式匹配IPv4地址的模式
    $ipv4Pattern = '/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/';

    if (preg_match($domainPattern, $host)) {
        // 匹配到域名
        return 1;
    } elseif (preg_match($ipv4Pattern, $host)) {
        // 匹配到IPv4地址
        return 0;
    } else {
        // 未匹配到，表示未知类型
        return -1;
    }
}


/**
 * 检测通道URL是否可达，并根据条件进行处理
 *
 * @param string $channelUrl 通道URL
 * @param string $srcHost 源主机
 * @param int $srcPort 源端口
 * @return string|false 处理后的URL或false
 */
function isChannelUrlReachable($channelUrl, $srcHost, $srcPort) {
    // 使用正则表达式匹配可能的地址
    $pattern = '/^(http|https|udp|rtp|rtmp|rtsp):\/\/([^\/: ]+)(?::(\d+))?(\/[^# ]*)?/';
    preg_match($pattern, $channelUrl, $matches);
    
    if (isset($matches[0])) {
        $address = $matches[0];   // 完整匹配的地址
        $protocol = $matches[1];  // 协议（http、https、udp、rtp、rtmp、rtsp）
        $host = $matches[2];      // 主机名或IP地址
        $port = $matches[3];      // 端口号（如果存在）
        $path = $matches[4];      // 路径（如果存在）
        
        if (!($protocol == "udp" || $protocol == "rtp" || $protocol == "rtmp" || $protocol == "rtsp")) {
           // 判断主机类型（域名或IPv4）
            if (isDomainOrIPv4($host) == 0) {
                // 使用源主机地址和源端口构建URL
                return "$protocol://$srcHost:$srcPort$path";
            } else if (isDomainOrIPv4($host) == 1) {
                // 域名类型，直接返回原始地址
                return "$address";
            } else {
                // 未知类型
                return "未知类型";
            }
        } else {
            // udp、rtp、rtmp、rtsp协议类型，直接返回频道地址
            return "$channelUrl";
        }
    } else {
        return false; // 未找到匹配的地址
    }
}


/**
 * 验证输入的主机地址是否有效，并解析主机名和端口。
 *
 * @param string $src 输入的主机地址
 *
 * @return array|false 如果地址有效，则返回包含主机名和端口的关联数组；否则返回 false。
 */
function isValidHost($src) {
    // 使用正则表达式匹配可能的格式
    $pattern = '/^((?:[a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]+)(?::(\d+))?$/';

    if (preg_match($pattern, $src, $matches)) {
        // 如果匹配成功，提取主机名和端口
        $host = isset($matches[1]) ? $matches[1] : "localhost"; // 默认主机名为 "localhost"
        $port = isset($matches[2]) ? $matches[2] : 80; // 默认端口为 80

        // 返回包含主机名和端口的关联数组
        return array("host" => $host, "port" => $port);
    } else {
        // 如果地址无效，返回 false
        return false;
    }
}


/**
 * 解析输入的主机地址，并检测其可达性，根据解析结果构建新的地址。
 *
 * @param string $src 输入的主机地址
 * @param string $channelUrl 频道地址需要解析和检测
 *
 * @return string 生成的新地址或错误消息
 */
function parseAddress($srcHost, $srcPort, $channelUrl) {
    // 调用 isChannelUrlReachable 函数，检查频道地址的可达性
    $url = isChannelUrlReachable($channelUrl, $srcHost, $srcPort);
    if ($url) {
        return $url; // 如果频道地址可达，返回频道地址
    } else {
        // 使用正则表达式匹配频道地址中可能的地址，提取出路径
        // 正则表达式匹配以斜杠开头的路径部分，忽略了 "#" 之后的内容
        $pattern = '/^(?:(https?|udp|rtp|rtmp|rtsp)[^\/]*)?(.*)/';
        preg_match($pattern, $channelUrl, $matches);
        
        if (isset($matches[0])) {
            $protocol = $matches[1];  // 协议（http、https、udp、rtp、rtmp、rtsp）
            $path = $matches[2];      // 路径（如果存在）
            if (!empty($protocol)) {
                return "$channelUrl";
            } else {
                return "http://$srcHost:$srcPort$path";
            }
        } else {
            return "未找到匹配的地址"; // 如果没有找到匹配的路径，返回错误消息
        }
    }

}

// 主函数，处理用户输入和展示酒店直播源信息
function processHotelLiveSource() {
    // 获取来自前端的src参数值
    $src = isset($_GET['src']) ? $_GET['src'] : "";

    // 获取当前页面的URL地址
    $currentUrl = "http" . (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "s" : "") . "://" . $_SERVER['HTTP_HOST'];

    if (empty($src)) {
        // 如果没有提供src参数，则显示表单
        echo <<<EOL
        <body style="margin: 0; padding: 0; background: linear-gradient(to bottom, #3498db, #2980b9);">
            <div style="height: 100vh; display: flex; justify-content: center; align-items: center;">
                <form method="post">
                    <div style="text-align: center;">
                        <p style="font-size: 18px; font-weight: bold; margin-right: 10px; color: #fff;">酒店直播源地址：</p>
                        <input type="text" name="src" placeholder="42.176.185.28:9901" required style="padding: 8px; font-size: 16px; border-radius: 5px 0 0 5px; border: 1px solid #ccc; border-right: none; height: 40px; outline: none;"><input type="submit" name="submit" value="检测" style="padding: 6px 12px; font-size: 16px; background-color: #007bff; color: #fff; border: none; border-radius: 0 5px 5px 0; cursor: pointer; height: 40px; margin: 0;">
                    </div>
                </form>
            </div>
        </body>
EOL;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // 检查是否提交了表单
            if (isset($_POST["submit"])) {
                // 获取输入框的值
                $src = $_POST["src"];
                
                // 重定向当前页面，并附带src参数
                header("Location: " . $currentUrl . "?src=" . $src);
                exit; // 确保页面立即终止执行
            }
        }
    } else {
        // 处理用户提供的地址
        $address = isValidHost($src);
        if ($address) {
            $srcHost = $address['host'];
            $srcPort = $address['port'];
            
            // 设置超时时间为1秒，多数酒店源可用，个别酒店源服务器因响应速度太慢，可设置成10秒或者30秒
            $context = stream_context_create(['http' => ['timeout' => 1]]);
            // 尝试从主URL获取JSON数据
            $url = @file_get_contents("http://" . $src . "/iptv/live/1000.json", false, $context);
            
            // 检查是否成功获取JSON数据
            if ($url === false || empty($url)) {
                // 尝试备用URL（与主URL相同）
                $backupUrl = "http://" . $src . "/ZHGXTV/Public/json/live_interface.txt";
            
                // 尝试从备用URL获取JSON数据
                $json = @file_get_contents($backupUrl, false, $context);
                
                // 在备用URL上执行正则表达式替换
                $json = preg_replace("/\s+/", "<br>", $json);
                // print_r($json);
                // 输出格式化后的URL
                if ($json === false || empty($json)) {
                    echo "未找到酒店直播源<br>";
                    exit; // 停止执行代码
                } else {
                    // 解析JSON数据并展示酒店直播源信息
                    $channels = explode("<br>", $json);
                    array_pop($channels); // 移除最后一个元素
                    
                    foreach ($channels as $channel) {
                        $channelInfo = explode(",", $channel);
                        
                        $channelName = $channelInfo[0];
                        $channelUrl = $channelInfo[1];
                        
                        // 输出格式化后的URL
                        echo $channelName . "," . parseAddress($srcHost, $srcPort, $channelUrl) . "<br>";
                    }
                }
            } else {
                // 使用正则表达式提取JSON数据中的名称字段
                preg_match_all('|"name":\s*"(.*?)"|', $url, $nameMatches);
                
                if (!empty($nameMatches[1])) {
                    // 使用正则表达式提取JSON数据中的URL字段
                    preg_match_all('|"url":\s*"(.*?)"|', $url, $urlMatches);
                
                    // 将名称数组和URL数组合并为关联数组
                    $channelData = array_combine($nameMatches[1], $urlMatches[1]);
                    
                    // 遍历关联数组，输出名称和完整URL
                    foreach ($channelData as $channelName => $channelUrl) {
                        // 输出格式化后的URL
                        echo $channelName . "," . parseAddress($srcHost, $srcPort, $channelUrl) . "<br>";
                    }
                } else {
                    // 处理没有匹配结果的情况
                    echo "未找到酒店直播源<br>";
                    exit; // 停止执行代码
                }
            }
        } else {
            // 处理无效的用户输入
            echo "请输入有效的域名或IP地址<br>";
            exit; // 停止执行代码
        }
    }
}
// 调用主函数
processHotelLiveSource();
?>
