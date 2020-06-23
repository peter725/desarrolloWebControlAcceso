<?php
	//
	include('configuracion.php');

	if ($_SESSION['nivel'] == '1') {
		global $conn;
		
		//captura de variable pasada por la url
		$id = $_GET['id'];
		//capturamos la variables enviadas en el eformulario
		$nombre = strip_tags(addslashes($_POST['nombre']));
		$apellidos = strip_tags(addslashes($_POST['apellidos']));
		$usuario = strip_tags(addslashes($_POST['usuario']));
		$password = strip_tags(addslashes($_POST['password']));
		$email = strip_tags(addslashes($_POST['email']));
		$telefono = strip_tags(addslashes($_POST['telefono']));
		$nivel = strip_tags(addslashes($_POST['nivel']));

		$sql = "UPDATE usuarios SET NOMBRES='$nombre', APELLIDOS='$apellidos', USUARIO='$usuario', PASSWORD='$password', EMAIL='$email', TELEFONO='$telefono', NIVEL='$nivel' WHERE ID_USUARIO='$id'";

		$conn->query($sql);

		define('PAGINA_INICIO', '../usuarios.php');
		header('Location: '.PAGINA_INICIO);

	}else{
		define('PAGINA_INICIO', '../../index.php?mensaje=sin_permiso');
		header('Location: '.PAGINA_INICIO);
	}
?>