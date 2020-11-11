<?php 
    $url =  $_SERVER["REQUEST_URI"];
    $url_components = parse_url($url); 
    parse_str($url_components['query'], $params); 
    $id = $params['id'];
    require_once("../src/conect.php");
    //titulo año idioma edit pags sinopsis saga encuadernado autores genero portadasrc autorsrc
    $consulta = "UPDATE libros SET libros.titulo='$_POST[titulo]', libros.año='$_POST[año]', libros.idioma='$_POST[idioma]', libros.edit='$_POST[edit]', libros.pags=$_POST[pags], libros.sinopsis='$_POST[sinopsis]', libros.saga='$_POST[saga]', libros.encuadernado='$_POST[encuadernado]', libros.autores='$_POST[autores]', libros.genero='$_POST[genero]' WHERE libros.id = $id";
    if (mysqli_query($mysqli, $consulta)) {
        echo $consulta;
        header("location: ./listado.php?edito=true");
        mysqli_free_result($consulta);
      }
      else { 
        echo $consulta;

        echo mysqli_error($mysqli); 
    } 
    mysqli_close($mysqli);
?>