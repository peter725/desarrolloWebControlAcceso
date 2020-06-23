<?php
	//borrar la variables de sesion
	unset($_SESSION);

	//borrar la sesion
	session_destroy();

	//redireccionar a la pagina de inicio
	define('PAGINA_INICIO', '../index.php?mensaje=gracias');
	header('Location: '.PAGINA_INICIO);
	
?>