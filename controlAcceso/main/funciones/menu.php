<?php
	//mostrar el menu de administrador con varialble de sesion nivel = 1
	function getMenuAdministrador(){
		$resultado = '
			<nav class="menu">
				<ul>
					<li><a href="index.php" title="Inicio">Inicio</a></li>
					<li><a href="usuarios.php" title="Ususarios">Ususarios</a></li>
					<li><a href="clientes.php" title="Clientes">Clientes</a></li>
				</ul>
			</nav>
		';
		return $resultado;
	}

	//mostrar el menu de empleado con la variable de sesion = 2
	function getMenuEmpleado(){
		$resultado = '
			<nav class="menu">
				<ul>
					<li><a href="index.php" title="Inicio">Inicio</a></li>
					<li><a href="clientes.php" title="Clientes">Clientes</a></li>
				</ul>
			</nav>
		';
		return $resultado;
	}
?>