<?php
	include('funciones/menu.php');
	include('funciones/consultas.php');



	//session_start();
	//restringir acceso sin hacer login
	if ($_SESSION['nivel'] == '1') {
		
		$menu = getMenuAdministrador();
		$perfil = 'ADMINISTRADOR';
		$usuarios = getUsuarios();

	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Intranet</title>
	<link rel="stylesheet" type="text/css" href="estilosIndexMain.css">
	<script type="text/javascript">
		function confirmar(){
			if (!confirm("¿Seguro Desea Borrar Este Usuario?")) {
				return false;
			}
		}
	</script>
</head>
<body>
	<div class="container">
		<header>
			<h1>Intranet megacursos.com</h1>
			<h2>Bienvenido a la intranet, <?= $_SESSION['nombre'] ?></h2>
			<div class="cerrar_sesion">
				<a href="../login/salir.php">Cerrar Sesion</a>
			</div><!-- fin div cerrar sesion-->
		</header>
		<?= $menu ?>
		<div class="clearfix"></div>
		<h2  >Usuarios Activos</h2>		
		<?= $usuarios ?>		

		<h2  >Alta de Usuarios </h2>	
		<div class="formulario">
			<form action="funciones/crear_usuario.php" method="post" id="form_home">
				<label for="nombre">Nombres</label>
				<input type="text" name="nombre" id="nombre">
				<label for="apellidos">Apellidos</label>
				<input type="text" name="apellidos" id="apellidos">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario">
				<label for="password">Contraseña</label>
				<input type="text" name="password" id="password">
				<label for="email">Email</label>
				<input type="text" name="email" id="email">
				<label for="telefono">Telefono</label>
				<input type="text" name="telefono" id="telefono">
				<label for="nivel">Nivel</label>
				<input type="text" name="nivel" id="nivel">

				<input type="submit" value="Guardar Usuario" class="b_inicio"/>

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
