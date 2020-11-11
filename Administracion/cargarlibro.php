<?php
    require_once("../src/conect.php");
    if(isset($_FILES['libroimg']) && isset($_FILES['autorimg'])){
        $libro_name = $_FILES['libroimg']['name'];
        $libro_tmp = $_FILES['libroimg']['tmp_name'];
        $autor_name = $_FILES['autorimg']['name'];
        $autor_tmp = $_FILES['autorimg']['tmp_name'];
        $carpeta = "libros/";
        $carpeta2 = "autores/";
        $subirlibro = move_uploaded_file($libro_tmp, $carpeta .$libro_name);
        $subirautor = move_uploaded_file($autor_tmp, $carpeta2 .$autor_name);
        if($subirlibro && $subirautor){
            echo " file moved success ";
        }


    }


    $sql="INSERT INTO libros
    VALUES
    ('$_POST[titulo]', '$_POST[año]', '$_POST[idioma]', '$_POST[edit]', $_POST[pags], '$_POST[sinopsis]','$_POST[saga]','$_POST[encuadernado]', '$_POST[autores]', '$_POST[genero]','$carpeta$libro_name' ,'$carpeta2$autor_name', DEFAULT)";


    if ($mysqli->query($sql) === TRUE) {
        header("location: ../Administracion/index.php?=success");
    }
    $mysqli->close();
?>
