<?php
	//
	include('configuracion.php');

	if ($_SESSION['nivel'] == '1') {
		global $conn;
		$stmt = $conn->prepare("INSERT INTO usuarios (NOMBRES, APELLIDOS, USUARIO, PASSWORD, EMAIL, TELEFONO, 	NIVEL) VALUES (?, ?, ?, ?, ?, ?, ?) ");
		$stmt->bind_param("sssssss", $nombre,$apellidos,$usuario,$password,$email,$telefono,$nivel);

		//capturamos la variables enviadas en el eformulario
		$nombre = strip_tags(addslashes($_POST['nombre']));
		$apellidos = strip_tags(addslashes($_POST['apellidos']));
		$usuario = strip_tags(addslashes($_POST['usuario']));
		$password = strip_tags(addslashes($_POST['password']));
		$email = strip_tags(addslashes($_POST['email']));
		$telefono = strip_tags(addslashes($_POST['telefono']));
		$nivel = strip_tags(addslashes($_POST['nivel']));

		$stmt->execute();

		$stmt->close();

		define('PAGINA_INICIO', '../usuarios.php');
		header('Location: '.PAGINA_INICIO);

	}else{
		define('PAGINA_INICIO', '../../index.php?mensaje=sin_permiso');
		header('Location: '.PAGINA_INICIO);
	}
?>