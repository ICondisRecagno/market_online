<?php

if( isset( $_GET["action"] ) ){
	include("../init.php");
	include("functions.php");

	
	$action = $_GET["action"];

	switch ($action) {
		case 'addUser':
			$nombre = $_POST["nombre"];
			$apellido = $_POST["apellido"];
			$email = $_POST["email"];
			$pass = $_POST["pass"];

			registrarUsuario($nombre, $apellido, $email, $pass);
		break;

		case 'activeUser':
			$email = $_GET["u"];
			$clave = $_GET["k"];
			activarUsuario($email, $clave);
		break;
	}
}

?>