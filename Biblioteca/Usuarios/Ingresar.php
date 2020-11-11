<?php
    require_once("../src/conect.php");

    $get = "SELECT * from usuarios where usuarios.nickname = '$_POST[apodo]' && usuarios.email = '$_POST[email]' && usuarios.contra = '$_POST[pass]'";
    //Nombre-Apellido-fecha_nac-nickname-email-contra-id_user-user_img
    if ($resultado = $mysqli->query($get) ) {
        if ($resultado->num_rows >= 1){
            $fila = mysqli_fetch_row($resultado);
            echo 'usuario correcto';          
           
             session_start();
             
             $_SESSION["nombre"] = $fila[0];
             $_SESSION["apellido"] = $fila[1];
             $_SESSION["fecha_nac"]=$fila[2];
             $_SESSION["apodo"]=$fila[3];
             $_SESSION["mail"]=$fila[4];
             $_SESSION["contra"]=$fila[5];
             $_SESSION["id"]=$fila[6];
             $_SESSION["user_img"]=$fila[7];
             $_SESSION["admin"] =$fila[8];

             header("location: ../Buscador/index.php"); // va al menu en realidad
 
        } else{
            header("location: ../Usuarios/Login.html?=error");
        }
    }
    $mysqli->close();

?>