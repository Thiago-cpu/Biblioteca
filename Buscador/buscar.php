<?php

$bus = strval($_POST['buscar']);
function eliminar_tildes($cadena){
    //Ahora reemplazamos las letras
    $cadena = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a'),
        $cadena
    );
  
    $cadena = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'e', 'e', 'e', 'e'),
        $cadena );
  
    $cadena = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'i', 'i', 'i', 'i'),
        $cadena );
  
    $cadena = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'o', 'o', 'o', 'o'),
        $cadena );
  
    $cadena = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'u', 'u', 'u', 'u'),
        $cadena );
    return $cadena;
  }
$bus = eliminar_tildes($bus);


header("location: index.php?bus=$bus");

?>