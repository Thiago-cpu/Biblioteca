<?php 
    $url =  $_SERVER["REQUEST_URI"];
    $url_components = parse_url($url); 
    parse_str($url_components['query'], $params); 
    $id = $params['id'];
    require_once("../src/conect.php");
    $removerimg = "SELECT libros.portadasrc, libros.autorsrc from libros where libros.id = $id";

    if ($resultado = mysqli_query($mysqli, $removerimg)) {

    
        $fila = mysqli_fetch_row($resultado);
        if (!unlink($fila[0])) {  
   
        }  
        else {  
            $consulta = "DELETE from libros where libros.id=$id";
            if ($mysqli->query($consulta) == TRUE) {
                header("location: ../Administracion/listado.php?borro=true");
            }
        }
        if (!unlink($fila[1])){

        }  else{
            
        }
        
    

        mysqli_free_result($resultado);
    }












?>