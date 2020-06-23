<?php
	include('funciones/menu.php');
	include('funciones/configuracion.php');



	//session_start();
	//restringir acceso sin hacer login
	if ($_SESSION['nivel'] == '1') {

		$id = $_GET['id'];
		$result = $conn->query("SELECT * FROM usuarios WHERE ID_USUARIO = '$id'");
		while($row = $result->fetch_assoc()){
			$id = $row['ID_USUARIO'];
			$nombre = $row['NOMBRES'];
			$apellidos = $row['APELLIDOS'];
			$usuario = $row['USUARIO'];
			$password = $row['PASSWORD'];
			$email = $row['EMAIL'];
			$telefono = $row['TELEFONO'];
			$nivel = $row['NIVEL'];
		}
		
		$menu = getMenuAdministrador();
		$perfil = 'ADMINISTRADOR';
		

	
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
			</div><!-- fin div cerrar sesion-->
		</header>
		<?= $menu ?>
		<div class="clearfix"></div>
				

		<h2>Editar Usuarios </h2>	
		<div class="formulario">
			<form action="funciones/editar_usuarios_servidor.php?id=<?= $id ?>" method="post" id="form_home">
				<label for="nombre">Nombres</label>
				<input type="text" name="nombre" id="nombre" value="<?= $nombre ?>">
				<label for="apellidos">Apellidos</label>
				<input type="text" name="apellidos" id="apellidos" value="<?= $apellidos?>">
				<label for="usuario">Usuario</label>
				<input type="text" name="usuario" id="usuario" value="<?= $usuario ?>">
				<label for="password">Contraseña</label>
				<input type="text" name="password" id="password" value="<?= $password ?>">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="<?= $email ?>">
				<label for="telefono">Telefono</label>
				<input type="text" name="telefono" id="telefono" value="<?= $telefono ?>">
				<label for="nivel">Nivel</label>
				<input type="text" name="nivel" id="nivel" value="<?= $nivel ?>">

				<input type="submit" value="Actualizar Usuario" class="b_inicio"/>

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
