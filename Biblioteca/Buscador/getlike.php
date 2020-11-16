<?php
    require_once("../src/conect.php");
    $libro = $_POST['libro'];
    $user = $_POST['user'];
    $data = ['libro' => $libro,'user' => $user];
    $cons = "SELECT * from likes where likes.iduser = $user and likes.idlibro = $libro";
    if ($resultado = mysqli_query($mysqli, $cons)) {
        $arr = $resultado->fetch_all();
        $json = json_encode($arr);
    }
    print json_encode($json);
?>