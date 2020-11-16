<?php
    require_once("../src/conect.php");
    $id = $_POST['id'];
    $idcom = substr($id, 5);
    $user = $_POST['iduser'];
    $cont = $_POST['cont'];
    $libro = $_POST['libro'];
    $data = ['id' => $id, 'name' => $cont, 'data' => $id[0]];
    if ($cont == 'sumar'){
        $sql = "SELECT case 
        when exists (
             SELECT 1 from likes l where l.idcom = $idcom and l.iduser = $user
        ) 
        then 1
        else 0
     end ";
     if ($res = $mysqli->query($sql)){
         $bool = $res->fetch_row()[0];
     }
    }
    if ($id[0] == 'l'){
        if ($cont == 'sumar'){
            if ($bool == 1){
                $cons = "UPDATE likes SET likes.likes = 1, likes.dislikes = 0 WHERE likes.idcom = $idcom and likes.iduser = $user";
            } else {
            $cons = "INSERT INTO likes values(default,$idcom, $user, 1, 0, $libro)";
            }
            

        } else {
            $cons = "UPDATE likes SET likes.likes = 0, likes.dislikes = 0 where likes.idcom = $idcom and likes.iduser = $user";
        }
        
    } else {
        if ($cont == 'sumar'){
            if ($bool == 1){
                $cons = "UPDATE likes SET likes.likes = 0, likes.dislikes = 1 WHERE likes.idcom = $idcom and likes.iduser = $user";
            } else {
                $cons = "INSERT INTO likes values(default, $idcom, $user, 0, 1, $libro)";
            }
        } else {
            $cons = "UPDATE likes SET likes.likes = 0, likes.dislikes = 0 where likes.idcom = $idcom and likes.iduser = $user";
        }
    }
    if ($mysqli->query($cons) === TRUE) {
        print json_encode($data);
    }
    $mysqli->close();
?>