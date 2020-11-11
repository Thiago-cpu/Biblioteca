<?php
    session_start();
    require_once("../conect.php");
    $url =  $_SERVER["REQUEST_URI"];
    $url_components = parse_url($url); 
    parse_str($url_components['query'], $params); 
    $id = $params['id'];
    $consulta = "INSERT INTO comentarios values (DEFAULT,$_SESSION[id] ,$id ,'$_POST[com]')";
    if ($_POST['com'] == '')
    {header("location: ../../Buscador/libro.php?id=$id");} elseif 
    ($mysqli->query($consulta) === TRUE) {
        echo"se subio correctamente";
        header("location: ../../Buscador/libro.php?id=$id");
    }
    $mysqli->close();







    
?>