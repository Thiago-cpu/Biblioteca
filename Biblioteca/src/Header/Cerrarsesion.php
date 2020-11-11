<?php
session_start();
session_destroy();
$url =  $_SERVER["REQUEST_URI"];
$url_components = parse_url($url); 
parse_str($url_components['query'], $params); 
$link = $params['link'];
header("location: $link");
?>