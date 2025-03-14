<?php
// 检查是否通过 GET 方法传递了 id 参数
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // 构造请求的 URL
    $requestUrl = "http://interface.yy.com/hls/get/stream/15013/xv_{$id}_{$id}_0_0_0/15013/xa_{$id}_{$id}_0_0_0?source=h5player&type=flv";

    // 初始化 cURL 会话
    $ch = curl_init();
    // 设置 cURL 选项
    curl_setopt($ch, CURLOPT_URL, $requestUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // 执行 cURL 请求
    $response = curl_exec($ch);

    // 检查 cURL 请求是否成功
    if ($response === false) {
        // 输出错误信息
        echo 'cURL 错误: '. curl_error($ch);
    } else {
        // 解析 JSON 响应
        $data = json_decode($response, true);
        if ($data && isset($data['hls'])) {
            // 提取 hls 字段的值
            $hlsUrl = $data['hls'];
            // 执行重定向
            header("Location: $hlsUrl");
            exit;
        } else {
            // 输出错误信息
            echo '无法解析响应或未找到 hls 字段。';
        }
    }

    // 关闭 cURL 会话
    curl_close($ch);
} else {
    // 输出错误信息
    echo '请提供 id 参数。';
}
?>
