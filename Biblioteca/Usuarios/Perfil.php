
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body>
 <style>
     html,body{
         width:100%;
         height:100%;
     }
     #formulario{
         display:flex;
         justify-content:space-around;
     }
     .img_align{
       display:flex;
       justify-content:Center;
     }
 </style>

<?php

include("../src/Header/header.php");

if (isset($_SESSION['id'])){
echo "
<form id='formulario' action ='modificarperfil.php' method='POST' enctype='multipart/form-data'>
    <div>
    <label for='staticEmail' class='col-sm-3 col-form-label'>Imagen</label>
    <input type='file' value ='$_SESSION[user_img]' onchange='mostrarimg(event, name)' id='inp_id' name='user_img'>
    <div class='img_align'>
    <img id='user_img' width='250' height='300'>
    </div>
    <div id='form-2'>
  <div class='form-group row'>
    <label for='staticEmail' class='col-sm-3 col-form-label'>Nombre</label>
    <div class='col-sm-10'>
      <input type='text' name='nombre' class='form-control' maxlength='50' id='staticEmail' value='$_SESSION[nombre]' required>
    </div>
  </div>
  <div class='form-group row'>
    <label for='inputPassword' class='col-sm-3 col-form-label'>Apellido</label>
    <div class='col-sm-10'>
      <input type='text' name= 'apellido' class='form-control' maxlength='50' id='inputPassword' value='$_SESSION[apellido]' required>
    </div>
  </div>
  <div class='form-group row'>
    <label for='inputPassword' class='col-sm-3 col-form-label'>Nickname</label>
    <div class='col-sm-10'>
      <input type='text' name='nickname' class='form-control' maxlength='15' id='inputPassword' value='$_SESSION[apodo]' required>
    </div>
  </div>
  <div class='form-group row'>
    <label for='staticEmail' class='col-sm-3 col-form-label'>Email</label>
    <div class='col-sm-10'>
        <input type='email' name='email' class='form-control' maxlength='50' id='staticEmail' value='$_SESSION[mail]' required>
    </div>
  </div>
    <div class='form-group row'>
        <label for='inputPassword' class='col-sm-3 col-form-label'>Contraseña</label>
        <div class='col-sm-10'>
            <input type='text' name = 'contra' class='form-control' minlength='6' maxlength='20' id='inputPassword' value='$_SESSION[contra]' requireds>
        </div>
    </div>

</div>
<input type='submit' value='Cambiar'>
</form>
<script>
    document.getElementById('user_img').src='../Administracion/$_SESSION[user_img]';

</script>

";
} else {
  echo "necesitas usuario pa";
}

?>
    <script src="../Administracion/mostrarimg.js"></script>

</body>
</html>

