<?php

$url =  $_SERVER["REQUEST_URI"];
$url_components = parse_url($url); 
parse_str($url_components['query'], $params); 
$id = $params['id'];

include("../src/Header/header.php");


require_once("../src/conect.php");
$consulta = "SELECT * FROM libros where libros.id = $id";

if ($resultado = mysqli_query($mysqli, $consulta)) {

    $fila = mysqli_fetch_row($resultado);

}//titulo-año-idioma-edit-pags-sinopsis-saga-encuadernado-autores-genero-portadasrc-autorsrc-id

echo "
<!DOCTYPE html>
<html style='height:100%;'>
<head>
    <title>Descripción</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    <link rel='stylesheet' type='text/css' href='style.css'/>
    <link rel='stylesheet' href='../src/Comentarios/comentario.css'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src='https://code.jquery.com/jquery-3.4.1.js'></script>
	<meta charset='UTF-8'>
</head>
<body>

<header> </header>

<form action='Conexion.php' class='libro'  method='get'>

<span class='imgl'>
    <h2> Foto portada </h2>
    <div class='img_align'>
    <img src='../Administracion/$fila[10]' width='90%' height='92%'>
    </div>
    </span>
<div style='text-align: center;'>
    <span class='titulo'>
        <h2>$fila[0]</h2>
    </span>
</div>


<span class='datos'>
	<h2> Datos del libro: </h2>
	<br>
	<p>
	Editorial: $fila[3]<br>
    Idioma: $fila[2]<br>
    Cantidad de páginas: $fila[4] <br>
    Género: $fila[9]<br>
    Fecha de publicación: $fila[1] <br>
    Encuadernación: $fila[7] <br>
	</p>	
</span>

<span class='aut'>

    <h2> Autor: $fila[8]</h2>
    <div class='img_align_autor'>    
    <img src='../Administracion/$fila[11]' width='70%' height='90%' >
    </div>
    </span>

<span class='desc'>
    <h2>Sinopsis:</h2>
    <textarea cols='30' style='border: none; background:none; font-size: 20px;' class='text-desc' rows='17' required disabled = 'True'>$fila[5]</textarea>
</span>

</form>



";
//insertar comentario de los comentarios
if(isset($_SESSION["apodo"])){

    
    $consulta = "SELECT * from usuarios where usuarios.id_user = $_SESSION[id]";
    
    if ($resultado = mysqli_query($mysqli, $consulta)) {
        $fila = mysqli_fetch_row($resultado);

    
        echo "
        <form class='inp-com' style = 'position: relative;top: 82%;' action='../src/Comentarios/cargarcomentario.php?id=$id' method='POST'>
        <div class='input-group'>
        <div class='input-group-prepend'>
            <span class='input-group-text'>
            <img src='../Administracion/$fila[7]' width='50px' height='50px'>
            </span>
        </div>

        <textarea name='com' class='form-control'autocapitalize='sentences' maxlength='500' rows ='3' cols='167' placeholder='escribe tu comentario...' aria-label='With textarea'></textarea>
        <button type='submit' class='btn btn-primary'>Enviar</button>

        </div>
        </form>
        </body>
        </html>
";
    }
}
$cargarcomentarios = "SELECT usuarios.nickname ,usuarios.user_img ,comentarios.comentario, comentarios.idcom from comentarios INNER JOIN usuarios where comentarios.id_lib = $id and usuarios.id_user = comentarios.id_user";
if ($ejecutarconsulta = mysqli_query($mysqli, $cargarcomentarios)){

    while ($comentarios = mysqli_fetch_row($ejecutarconsulta)) {
        
        echo "
        <div style='position:relative; top:82%' class='input-group comments' id= 'com-$comentarios[3]'>
        <div class='input-group-prepend'>
            <span class='input-group-text'>
            <img src='../Administracion/$comentarios[1]' width='50px' height='50px'>
            </span>
            
        </div> 
        
        <textarea name='com' class='form-control'autocapitalize='sentences'  rows ='3' cols='167'aria-label='With textarea' disabled='True'>
$comentarios[0]:
$comentarios[2]
        </textarea>";
        if (isset($_SESSION["apodo"])) {
            echo "
            <i class='far fa-thumbs-up like punt'  id='like-$comentarios[3]'><p></p></i>
            <i class='far fa-thumbs-down dislike punt'    id='disl-$comentarios[3]'><p></p></i>
            ";
        }
        echo"</div>";
        
    
    }
}
//cargar comentarios
?>
<script>
    const mostrarlikes = function(){
    let comentarios = document.querySelectorAll('.comments');

    let arrcom = {};
    let cont = 0
    comentarios.forEach(e => {
        arrcom['com' +cont] = e.id
        cont +=1
    }); 
    $.ajax({
            data: arrcom,
            url:`cantidadlikes.php`,
            type:"POST",
            dataType:"json",
            success:function(data){
                data.forEach(e => {
                    document.querySelector(`#like-${e[0]} > p`).textContent = e[1]
                    document.querySelector(`#disl-${e[0]} > p`).textContent = e[2]
                });
            }
            })
    }
    mostrarlikes()
</script>
<script>
    <?php echo "const lib = $id; const user = $_SESSION[id];"?>
    let link = `getlike.php?libro=${lib}&user=${user}`;
    $.ajax({
        url:link,
        type:"POST",
        dataType:"json",
        success:function(data){
            data = JSON.parse(data)
            let com;
            data.forEach(e => {
                if (e[3] == 1){
                    com = document.getElementById('like-'+e[1])
                    com.classList.remove("far")
                    com.classList.add("fas")
                } else {
                    com = document.getElementById('disl-'+e[1])
                    com.classList.remove("far")
                    com.classList.add("fas")
                }
                
            });
        }
    })
</script>
<script>
        <?php echo "const iduser = $_SESSION[id]; const libro = $id;" ?>
        let todos = document.querySelectorAll('.punt')
        todos.forEach(e => {
            e.onclick = () =>{
                let url;
                if(e.id.includes('like')){
                    if(e.classList.contains("far")){
                        url = `like.php?id=${e.id}&cont=sumar&iduser=${iduser}&libro=${libro}`
                        e.classList.remove("far")
                        e.classList.add("fas")
                        if (e.nextElementSibling.classList.contains("fas")){
                            e.nextElementSibling.classList.remove("fas")
                            e.nextElementSibling.classList.add("far")
                        }
                    } else {
                        url = `like.php?id=${e.id}&cont=restar&iduser=${iduser}&libro=${libro}`
                        e.classList.remove("fas")
                        e.classList.add("far")
                    }

                } else{
                    if(e.classList.contains("far")){
                        url = `like.php?id=${e.id}&cont=sumar&iduser=${iduser}&libro=${libro}`
                        e.classList.remove("far")
                        e.classList.add("fas")
                        if (e.previousElementSibling.classList.contains("fas")){
                            e.previousElementSibling.classList.remove("fas")
                            e.previousElementSibling.classList.add("far")
                        }
                    } else {
                        url = `like.php?id=${e.id}&cont=restar&iduser=${iduser}&libro=${libro}`
                        e.classList.remove("fas")
                        e.classList.add("far")
                    }
                }
                
                $.ajax({
                    url:url,
                    type:"POST",
                    dataType:"json",
                    success:function(data){
                        mostrarlikes()
                    }
                })
                
            }
        });
        

</script>