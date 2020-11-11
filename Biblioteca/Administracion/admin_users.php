<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        html, body{
            width: 100%;
            height:100%;

        }    
    </style>
</head>
<body>
    <?php
        require_once("../src/conect.php");
        include("../src/Header/header.php");
        $consulta = "SELECT usuarios.id_user, usuarios.admin, usuarios.nickname from usuarios";
        if ($resultado = mysqli_query($mysqli, $consulta)) {
            while ($fila = mysqli_fetch_row($resultado)){
                echo "<form  id='form-$fila[0]' method='POST'></form>";
            }
        }
    ?>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Usuario</th>
                <th scope="col">Administrador</th>
                <th scope="col">Sacar permisos</th>
                <th scope="col">Dar permisos</th>
            </tr>
        </thead>
    <tbody>
    <?php

        if (isset($_SESSION['id'])){
            if ($_SESSION['admin'] == 1){
                if ($resultado = mysqli_query($mysqli, $consulta)) {
                    while ($fila = mysqli_fetch_row($resultado)){
                        echo "<form action='editarlibro.php?id=$fila[0]' method='POST'>
                            <tr id='libro-$fila[0]' >    
                                    <td><input class='normal' type='text' name='id' value='$fila[0]' disabled ='true' form='form-$fila[0]' ></td>
                                    <td><input class='normal' type='text' name='usuario' value='$fila[2]' disabled ='true' form='form-$fila[0]'></td>
                                    <td><input class='normal' type='text' name='Administrador' value='$fila[1]' disabled ='true' form='form-$fila[0]'></td>
                                    <td><button form='form-$fila[0]' formaction='admin.php?id=$fila[0]&aux=0'>❌</button></td>
                                    <td><button formaction='admin.php?id=$fila[0]&aux=1' id='edit-$fila[0]' form='form-$fila[0]'>✔</button></td>
                                
                            </tr>
                            </form>";
                    }
                }
            } 
        }
    ?>
</body>
</html>