<?php
$id = isset($_GET['id']) ? $_GET['id'] : 'ys';
$n = ['ws' => 0, 'zy' => 1, 'ys' => 2];//西藏卫视、西藏藏语、西藏影视
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,  "https://api.vtibet.cn/xizangmobileinf/rest/xz/cardgroups");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'json=%7B%22cardgroups%22%3A%22LIVECAST%22%2C%22paging%22%3A%7B%22page_no%22%3A%221%22%2C%22page_size%22%3A%22100%22%7D%2C%22version%22%3A%221.0.0%22%7D');
$result = curl_exec($ch);
curl_close($ch);
$data = json_decode($result);
$playurl = $data->cardgroups[1]->cards[$n[$id]]->video->url_hd;
header('Location:'.$playurl);
?>
