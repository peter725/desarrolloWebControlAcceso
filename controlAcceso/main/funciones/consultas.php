<?php

//en este php se centralizan todas las consultas de la intranet
include('configuracion.php');

//consultar usuarios
	function getUsuarios(){
		
		
		global $conn;
		$result = $conn->query("SELECT * FROM usuarios");
		if ($result->num_rows > 0){
			
			$resultado ='<table>
							<tr>
								<th>ID</th>
								<th>NOMBRES</th>
								<th>APELLIDOS</th>
								<th>USER</th>
								<th>PASS.</th>
								<th>EMAIL</th>
								<th>TELEF.</th>
								<th>NIV.</th>
								<th></th>
								<th></th>
							</tr>';
			while($row = $result->fetch_assoc()){
				$resultado .=	'<tr>
									<td>'.$row['ID_USUARIO'].'</td>
									<td>'.$row['NOMBRES'].'</td>
									<td>'.$row['APELLIDOS'].'</td>
									<td>'.$row['USUARIO'].'</td>
									<td>'.$row['PASSWORD'].'</td>
									<td><a href="mailto:'.$row['EMAIL'].'">'.$row['EMAIL'].'</a></td>
									<td><a href="tel:'.$row['TELEFONO'].'">'.$row['TELEFONO'].'</a></td>
									<td>'.$row['NIVEL'].'</td>
									<td><a href="editar_usuarios.php?id='.$row['ID_USUARIO'].'" class="enlace_rojo">Editar</a></td>
									<td><a href="funciones/borrar_usuarios.php?id='.$row['ID_USUARIO'].'" class="enlace_rojo" onclick="return confirmar()">Borrar</a></td>
								</tr>';
			}

			$resultado .= '</table>';
		}
		return $resultado;
	}//fin de getUSuarios()

?>