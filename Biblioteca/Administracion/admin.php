<?php
    require_once("../src/conect.php");
    $url =  $_SERVER["REQUEST_URI"];
    $url_components = parse_url($url); 
    parse_str($url_components['query'], $params); 
    $id = $params['id'];
    $aux = $params['aux'];
    echo $aux;
    if ($aux){
        $consulta = "UPDATE usuarios SET usuarios.admin = 1 where usuarios.id_user = $id";
        if (mysqli_query($mysqli, $consulta)) {
            header('location: ./admin_users.php');
        }

    } else {
        $consulta = "UPDATE usuarios SET usuarios.admin = 0 where usuarios.id_user = $id";
        if (mysqli_query($mysqli, $consulta)) {
            header('location: ./admin_users.php');
        }
    }
?>