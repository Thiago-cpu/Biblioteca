<?php
require_once("../src/conect.php");
$cont = 0;
$arr = [];
foreach ($_POST as $post_var) {
    $idcom = substr($post_var, 4);
    $cons = "SELECT likes.idcom, sum(likes.likes) AS likes, sum(likes.dislikes) AS dislikes from likes where likes.idcom = $idcom";
    if ($res = $mysqli->query($cons)){
        $arr[$cont] = $res->fetch_row();
        $cont +=1;
    }
}
print(JSON_encode($arr));
?>