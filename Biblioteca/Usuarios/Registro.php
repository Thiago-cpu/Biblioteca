<?php

if ($_POST['pass'] != $_POST['rpass']){
	//alert pass desigual
	header("location: ../Usuarios/SignUp.html?=errpass");

} else {


	require_once("../src/conect.php");

	$get = "SELECT * FROM usuarios where nickname = '$_POST[apodo]' or email = '$_POST[email]'";

	if ($resultado = $mysqli->query($get)) {
		if ($resultado->num_rows >= 1){
			// alert con usuario o gmail ya utilizado
			header("location: ../Usuarios/SignUp.html?=erruser");
		} else { // se crea el usuario
			$sql = "INSERT INTO usuarios(nombre,apellido,fecha_nac,nickname,email,contra)VALUES('$_POST[nomu]','$_POST[ape]' ,'$_POST[cumple]','$_POST[apodo]','$_POST[email]','$_POST[pass]')";

			if ($mysqli->query($sql) === TRUE) {
		
				header("location: login.html");
			} 
		}
		$resultado->close();
	}



	$mysqli->close();
}
?>