<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
   
    <!--Estilos-->
    <link rel="stylesheet" type="text/css" href="Style.css"/>
    <link rel="stylesheet" type="text/css" href="../src/alert.css">
    <!--Javascript-->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="mostrarimg.js"></script>


</head>
<body>

    <script>
        $(function(){
         $("#alert").load("/Biblioteca/src/alert.html", function(){
            $('.msg').html('¡El libro se subió correctamente!')
         });

         
        });  
     </script>
    <div class="alert hide" id="alert">
        
    </div>
    <?php
        include("../src/Header/header.php");
    if (isset($_SESSION['id'])){
        if ($_SESSION['admin'] == 1){
            echo "
    <form action='cargarlibro.php' method='POST' enctype='multipart/form-data'>

<span class='imgl'>
    <h2> Foto portada: </h2>
    <br>
    
    <input type='file' onchange='mostrarimg(event, name)' name='libroimg' required>
    <div class='img_align'>
    <img id='libroimg' width='200' height='300' />
    </div>
</span>

<span class='titulo'>	
    <h2> Titulo del libro: <input type='text'  name='titulo' required> </h2>
    <input type='submit' class='boton1' value='Cargar libros'>

</span>

<span class='datos'>
	<h2> Datos del libro </h2>
	<br>
	<p>
	Editorial: <input type='text'  name='edit' required><br>
    Idioma: <input type='text'  name='idioma' required><br>
    Páginas: <input type='number'  name='pags' required><br>
    Género: <input type='text'  name='genero' required><br>
    Saga: <input type='text' name='saga' required> <br>
    Publicación: <input type='date'  name='año' required><br>
    Encuadernación: <input type='text'  name='encuadernado' required><br>
	</p>	
</span>

<span class='aut'>
     
    <h2> Autor/a: </h2>
     
    <input  type='text' name='autores' required>
    <br>
    <br>

    <input type='file' onchange='mostrarimg(event, name)' name='autorimg'  required>
    <div class='img_align_autor'>
    <img id='autorimg' width='200' height='200' />
    </div>
</span>

<span class='desc'>
    <h2 style='text-align:center;'>Sinopsis</h2>
    <textarea name='sinopsis' cols='30' rows='10' maxlength='512' required></textarea>
</span>

</form>
";
        }
    }
    
?>

<script>

    if(window.location.href.substring(window.location.href.lastIndexOf("/")) == "/index.php?=success"){
        mostraralert()

    }

</script>
<style>
        .navbar{
            position:absolute;
            top:0;
            width:100%;
            z-index: 3;
        }
    </style>
</body>

</html>
