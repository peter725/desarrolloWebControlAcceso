<?php
	$error="";
	if (isset($_GET['mensaje']) && $_GET['mensaje']=='mensaje_error') {
		$error = 'Usuario o Contraseña incorrectos';
	}
	if (isset($_GET['mensaje']) && $_GET['mensaje']=='gracias') {
		$error = 'Gracias por utilizar nuestra pagina web, vuelve pronto.';
	}
	if (isset($_GET['mensaje']) && $_GET['mensaje']=='sin_permiso') {
		$error = 'Debe iniciar sesion para aceeder al contenido.';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inicio Intranet</title>
	<link rel="stylesheet" type="text/css" href="estilosControlAcceso.css">
	<script type="text/javascript" src="intranet.js"></script>
</head>
<body>
	<div id="form_home">
		<form action="login/autenticar.php" method="post" onsubmit="return validacion_index()" id="f_inicio" name="f_inicio">
			<label for="email" class="email">Usuario</label>
			<input type="text" name="p_username" id="p_username"/>
			<label for="pass" class="pass">Contraseña</label>
			<input type="password" name="p_password" id="p_password"/>

			<br class="clearFloat">

			<input type="submit" name="b_inicio" id="b_inicio" class="b_inicio" value="Entrar">

		</form>

		<p class="rojo"><?php echo $error; ?></p>
	</div>
</body>
</html>