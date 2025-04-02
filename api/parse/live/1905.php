<?php
$url = "https://m.1905.com/m/xl/live/";
preg_match("|video:'(.*?)'|",file_get_contents($url),$p);
header("location:".$p[1]);
//echo $p[1];
?>
