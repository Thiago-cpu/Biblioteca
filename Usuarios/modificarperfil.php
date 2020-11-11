<?php
    require_once("../src/conect.php");
    session_start();

    if(isset($_FILES['user_img'])){
        $userimg_name = $_FILES['user_img']['name'];
        $userimg_tmp = $_FILES['user_img']['tmp_name'];
        if ($userimg_name == ''){
            $userimg_name = substr($_SESSION["user_img"], 9, strlen($_SESSION["user_img"]));
        }
        $carpeta = "../Administracion/usuarios/";
        $carpeta2= "usuarios/";
        $subiruserimg = move_uploaded_file($userimg_tmp, $carpeta .$userimg_name);

        if($subiruserimg){
            echo " file moved success ";
        }
        //hay un caso feo que es cuando no cambian la foto de perfil se ingresa un vacio y yo lo que puse es que si esta vacio que mande el default pero en ese caso dejaría de utilizar la foto que tenía antes
    } else {
        echo "chau";
    }
    $get = "SELECT * FROM usuarios where (usuarios.nickname = '$_POST[nickname]' or usuarios.email = '$_POST[email]') and usuarios.id_user != $_SESSION[id] ";
    
	if ($resultado = $mysqli->query($get)) {
		if ($resultado->num_rows >= 1){
			header("location: ./Perfil.php?edit=false");
        } else{
            $actualizar = "UPDATE usuarios SET usuarios.nombre='$_POST[nombre]', usuarios.apellido='$_POST[apellido]', usuarios.nickname='$_POST[nickname]', usuarios.email='$_POST[email]', usuarios.contra='$_POST[contra]', usuarios.user_img='$carpeta2$userimg_name' WHERE usuarios.id_user = $_SESSION[id]";
            if (mysqli_query($mysqli, $actualizar)) {
                $_SESSION["nombre"] = $_POST['nombre'];
                $_SESSION["apellido"] = $_POST['apellido'];
                $_SESSION["apodo"]=$_POST['nickname'];
                $_SESSION["mail"]=$_POST['email'];
                $_SESSION["contra"]=$_POST['contra'];
                $_SESSION["user_img"]=$carpeta2 . $userimg_name;
                header("location: ./Perfil.php?edit=true");

              }
              else { 
                echo $actualizar;
        
                echo mysqli_error($mysqli); 
            } 

        }
    
    
    
    }

    mysqli_close($mysqli);

?>