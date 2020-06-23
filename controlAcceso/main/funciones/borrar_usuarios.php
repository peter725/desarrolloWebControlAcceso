<?php
	//
	include('configuracion.php');

	if ($_SESSION['nivel'] == '1') {
		global $conn;
		
		$id = $_GET['id'];
		$sql="DELETE FROM usuarios WHERE ID_USUARIO='$id'";

		$conn->query($sql);

		define('PAGINA_INICIO', '../usuarios.php');
		header('Location: '.PAGINA_INICIO);

	}else{
		define('PAGINA_INICIO', '../../index.php?mensaje=sin_permiso');
		header('Location: '.PAGINA_INICIO);
	}
?>