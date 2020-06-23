<?php
	include('funciones/menu.php');

	session_start();
	//restringir acceso sin hacer login
	if ($_SESSION['nivel'] == '1' || $_SESSION['nivel'] == '2') {
		
		$url_imagen = $_SESSION['id'].'.jpg';
		if ($_SESSION['nivel'] == '1') {
			$menu = getMenuAdministrador();
			$perfil = 'ADMINISTRADOR';
		}else{
			$menu = getMenuEmpleado();
			$perfil = 'EMPLEADO';
		}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Intranet</title>
	<link rel="stylesheet" type="text/css" href="estilosIndexMain.css">
	
</head>
<body>
	<div class="container">
		<header>
			<h1>Intranet megacursos.com</h1>
			<h2>Bienvenido a la intranet, <?= $_SESSION['nombre'] ?></h2>
			<div class="cerrar_sesion">
				<a href="../login/salir.php">Cerrar Sesion</a>
			</div>
		</header>
		<?= $menu ?>
		<div class="clearfix"></div>
		<h2 class="principal">Inicio</h2>	
		<div class="avatar">
			<img src="uploads/<?= $url_imagen ?>">			
		</div>
		<div class="formulario">
			<form action="funciones/upload.php" method="post" enctype="multipart/form-data" class="inicio"	>
				<p>Selecciona una foto con tamaño inferior a 2MB</p>
				<input type="file" name="foto">
				<br>
				<input type="submit" name="ok" value="Enviar" class="b_inicio">
			</form>
		</div>	
			
		
	</div><!--cierra container-->
	<footer>
		<div class="left">
			Telefono: <strong><a href="tel: <?= $_SESSION['telefono'] ?>"><?= $_SESSION['telefono'] ?></a></strong>
		</div><!-- fin de left-->
		<div class="right">
			<?= $_SESSION['nombre'] ?>, has inigresado con el perfil de <strong><?= $perfil ?></strong>
		</div><!--fin de right-->
		</footer>
</body>
</html>

<?php

}else{
	define('PAGINA_INICIO', '../index.php?mensaje=sin_permiso');
	header('Location: '.PAGINA_INICIO);
}
?>
