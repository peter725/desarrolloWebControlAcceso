<?php

	include('../main/funciones/configuracion.php');

	//recuperamos usuario y lo filtramos
	$usu = $_POST['p_username'];
	$usu = addslashes($usu);
	$usu = strip_tags($usu);

	//recuperamos password y lo filtramos
	$pass = $_POST['p_password'];
	$pass = addslashes($pass);
	$pass = strip_tags($pass);

		
	//consulta a base de datos
	$result = $conn->query("SELECT * FROM usuarios WHERE USUARIO = '$usu' AND PASSWORD = '$pass' ");
	
	//verificando clave y contraseña
	if ($fila = $result->fetch_assoc()) {
		//asiganmos variables de sesion
		session_start();
		$_SESSION['nombre'] = $fila['NOMBRES'];
		$_SESSION['nivel'] = $fila['NIVEL'];
		$_SESSION['telefono'] = $fila['TELEFONO'];
		$_SESSION['id'] = $fila['ID_USUARIO'];

		define('PAGINA_INICIO', '../main/index.php');
		header('Location: '.PAGINA_INICIO);
	} else {
		//redireccionar a la pagina de inicio
		define('PAGINA_INICIO', '../index.php?mensaje=mensaje_error');
		header('Location: '.PAGINA_INICIO);
		
	}
	
?>