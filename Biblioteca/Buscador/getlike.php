<?php
    require_once("../src/conect.php");
    $url =  $_SERVER["REQUEST_URI"];
    $url_components = parse_url($url); 
    parse_str($url_components['query'], $params); 
    $libro = $params['libro'];
    $user = $params['user'];
    $data = ['libro' => $libro,'user' => $user];
    $cons = "SELECT * from likes where likes.iduser = $user and likes.idlibro = $libro";
    if ($resultado = mysqli_query($mysqli, $cons)) {
        $arr = $resultado->fetch_all();
        $json = json_encode($arr);
    }
    print json_encode($json);
?>