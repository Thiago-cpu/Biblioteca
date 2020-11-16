<?php
    require_once("../src/conect.php");
    $consulta = "SELECT * from libros";
    $resultado = mysqli_query($mysqli, $consulta);
    
?>
<!DOCTYPE html>
<html lang="en" style="width: fit-content";>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <style>
        html, body{
            width: 100%;
            height:100%;

        }
        .normal{
            background: none;
            border:none;
            color:inherit;

        }
        .img{
            height:50px;
            width:50px;
            object-fit:cover;
        }  
    </style>
</head>
<body>
    <?php
    include("../src/Header/header.php");
    if ($resultado = mysqli_query($mysqli, $consulta)) {
        while ($fila = mysqli_fetch_row($resultado)){
            echo "<form  id='form-$fila[12]' method='POST'></form>";
        }
    }
    
    ?>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Título</th>
            <th scope="col">Año</th>
            <th scope="col">Idioma</th>
            <th scope="col">Editorial</th>
            <th scope="col">Páginas</th>
            <th scope="col">Sinopsis</th>
            <th scope="col">Saga</th>
            <th scope="col">Encuadernado</th>
            <th scope="col">Autor</th>
            <th scope="col">Género</th>
            <th scope="col">Portada</th>
            <th scope="col">Retrato</th>
            <th scope="col">Borrar</th>
            <th scope="col">Editar</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_SESSION['admin'])){
            if ($_SESSION['admin'] == 1){
                if ($resultado = mysqli_query($mysqli, $consulta)) {
                    while ($fila = mysqli_fetch_row($resultado)){
                        echo "<form action='editarlibro.php?id=$fila[12]' method='POST'>
                            <tr id='libro-$fila[12]' >    
                                    <td><input class='normal' type='text' name='titulo' value='$fila[0]' disabled ='true' form='form-$fila[12]' ></td>
                                    <td><input class='normal' type='date' name='año' value='$fila[1]' disabled ='true' form='form-$fila[12]'></td>
                                    <td><input class='normal' type='text' name='idioma' value='$fila[2]' disabled ='true' form='form-$fila[12]'></td>
                                    <td><input class='normal' type='text' name='edit' value='$fila[3]' disabled ='true' form='form-$fila[12]'></td>
                                    <td><input class='normal' type='number' name='pags' onkeydown='return event.keyCode !== 69' value='$fila[4]' disabled ='true' form='form-$fila[12]' ></td>
                                    <td><input class='normal' type='text' name='sinopsis' value='$fila[5]' disabled ='true' form='form-$fila[12]'></td>
                                    <td><input class='normal' type='text' name='saga' value='$fila[6]' disabled ='true' form='form-$fila[12]'></td>
                                    <td><input class='normal' type='text' name='encuadernado' value='$fila[7]' disabled ='true' form='form-$fila[12]'></td>
                                    <td><input class='normal' type='text' name='autores' value='$fila[8]' disabled ='true' form='form-$fila[12]'></td>
                                    <td><input class='normal' type='text' name='genero' value='$fila[9]' disabled ='true' form='form-$fila[12]'></td>
                                    <td><img class='img' src='./$fila[10]' /></td>
                                    <td><img class='img' src='./$fila[11]' /></td>
                                    <td><button form='form-$fila[12]' formaction='borrarlibro.php?id=$fila[12]'>🗑</button></td>
                                    <td><button type ='button' formaction='editarlibro.php?id=$fila[12]' id='edit-$fila[12]' onclick='mostrar($fila[12])' form='form-$fila[12]'>🖊</button></td>
                                
                            </tr>
                            </form>";
                    }
                }
            } 
        }
        ?>
    </tbody>
    </table >
    <script>
        let mostrar = function (id){
            const btn = document.getElementById(`edit-${id}`)
            //btn.type = 'submit'
            btn.parentNode.innerHTML = `<button type ='submit' formaction='editarlibro.php?id=${id}' form='form-${id}'>✔</button>`
            const filas = document.querySelectorAll(`#libro-${id} > td > input`)
            console.log(filas)
            for (let i = 0; i < filas.length; i++) {
                const fila = filas[i];
                fila.disabled = false
            }
        }
    </script>
</body>
</html>