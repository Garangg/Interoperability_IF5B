<?php

$url = $_SERVER['REQUEST_URI'];

$urlArray = explode("index.php", $url);
if (count($urlArray) >= 2) {
    $url = $urlArray[1];
}

if(strpos($url, "/")!== 0){
    $url = "/".$url;
}

if($url == '/' && $_SERVER['REQUEST_METHOD'] == 'GET'){
    echo json_encode(array('service_name' => 'PHP Service App', 'status' => 'Running'));
}