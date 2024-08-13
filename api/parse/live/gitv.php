<?php
function geturl($play_id){
        $url = 'http://gdcucc-livod.dispatcher.gitv.tv/gitv_live/'.$play_id.'/'.$play_id.'.m3u8?p=GITV&area=GD_CUCC&gMac';
        $headerArray = [];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_HTTPHEADER,$headerArray);
        $output = curl_exec($ch);
        curl_close($ch);
        $output = json_decode($output,true);
        return $output['data'][0]['url'];
}
$REQUEST_URI = $_SERVER['REQUEST_URI'];
$PLAY_ID = explode('/', $REQUEST_URI)[2];
$PLAY_URL = geturl($PLAY_ID);
header('Location: '.$PLAY_URL);
exit();
