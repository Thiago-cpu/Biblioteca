<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    
    <!-- boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
<?php
    include("../src/Header/header.php");
?>

<form class="form-inline my-2 my-lg-0" action='buscar.php' method="POST">
      <input id="boton1"class="form-control col-sm-2" type="search" name='buscar' placeholder="Buscar por Titulo/Genero/Autor" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Buscar</button>
</form> 
<div id="contenedor_cartas"> 
<?php

require_once("../src/conect.php");
$url =  $_SERVER["REQUEST_URI"];
$url_components = parse_url($url); 
if (isset($url_components['query'])){
parse_str($url_components['query'], $params); 
}
if (isset($params['bus'])){
  $bus = $params['bus'];
  $bus = strtolower($bus);
  $consulta = "SELECT libros.titulo, libros.portadasrc, libros.genero, libros.autores, libros.id FROM libros where LOWER(libros.titulo) like '%$bus%' or LOWER(libros.genero) like '%$bus%' or LOWER(libros.autores) like '%$bus%'";
}
else {  
  $consulta = "SELECT libros.titulo, libros.portadasrc, libros.genero, libros.autores, libros.id FROM libros ";
 
}
if ($resultado = mysqli_query($mysqli, $consulta)) {
  
  if($resultado->num_rows < 1){
    $consulta = "SELECT libros.titulo, libros.portadasrc, libros.genero, libros.autores, libros.id FROM libros ";
    if ($resultado = mysqli_query($mysqli, $consulta)) {
      while ($fila = mysqli_fetch_row($resultado)) {

        echo "<div class='card mb-3' onclick = 'libro($fila[4])' id='$fila[4]' style='cursor: pointer; width: 30%;'>
        <div class='row no-gutters' style='height: 100%;'>
          <div class='col-md-4'>
            <img src='../Administracion/$fila[1]' style='height: 100%;' class='card-img' alt='...''>
          </div>
          <div class='col-md-8'>
            <div class='card-body'>
              <h5 class='card-title'>$fila[0]</h5>
              <p class='card-text'>$fila[2]</p>
              <p class='card-text'><small class='text-muted'>Publicado por $fila[3]</small></p>
            </div>
          </div>
        </div>
      </div>";


    }
  }
}

  while ($fila = mysqli_fetch_row($resultado)) {

      echo "<div class='card mb-3' onclick = 'libro($fila[4])' id='$fila[4]' style='cursor: pointer; width: 30%;'>
      <div class='row no-gutters' style='height: 100%;'>
        <div class='col-md-4'>
          <img src='../Administracion/$fila[1]' style='height: 100%;' class='card-img' alt='...''>
        </div>
        <div class='col-md-8'>
          <div class='card-body'>
            <h5 class='card-title'>$fila[0]</h5>
            <p class='card-text'>$fila[2]</p>
            <p class='card-text'><small class='text-muted'>Publicado por $fila[3]</small></p>
          </div>
        </div>
      </div>
    </div>";
  }

  mysqli_free_result($resultado);


}

?>

</div>

<script>
    let libro = function (id){
        window.location.href = window.location.href.substring(0, window.location.href.lastIndexOf("/")) + '/libro.php?id=' + id;
    }    

</script>
</body>

</html>